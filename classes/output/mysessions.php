<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Class containing data for mysessions block.
 *
 * @package    block_mysessions
 * @copyright  2020 Edunao SAS (contact@edunao.com)
 * @author     rcolet <remi.colet@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_mysessions\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;

require_once($CFG->dirroot . '/local/mentor_core/lib.php');

/**
 * Class containing data for mysessions block.
 *
 * @copyright  2020 Edunao SAS (contact@edunao.com)
 * @author     rcolet <remi.colet@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mysessions implements renderable, templatable {

    /**
     * @var object An object containing the configuration information for the current instance of this block.
     */
    protected $config;

    /**
     * Constructor.
     *
     * @param object $config An object containing the configuration information for the current instance of this block.
     */
    public function __construct($config) {
        $this->config = $config;
    }

    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param \renderer_base $output
     * @return \stdClass
     * @throws \dml_exception
     * @throws \moodle_exception
     */
    public function export_for_template(renderer_base $output) {
        global $USER, $CFG, $DB;
        
        require_once($CFG->dirroot . '/local/mentor_core/api/session.php');

        //Check if user has role externaluser
        $externalrole = $DB->get_record('role', array('shortname' => 'utilisateurexterne'), '*', MUST_EXIST);
        $isExternalUser = $DB->get_records('role_assignments', array('userid' => $USER->id, 'roleid' => $externalrole->id));
        
        $searchText = optional_param('search',null,PARAM_RAW);
        // Get data for the block.
        $sessionsenrol = \local_mentor_core\session_api::get_user_sessions($USER->id, false, false,$searchText);

        usort($sessionsenrol, "local_mentor_core_usort_favourite_session_first");

        // Data for the training and session sheet.
        $trainings = [];
        $finalsessions = [];

        // If there is at least one full session.
        $hassessioncompleted = false;

        foreach ($sessionsenrol as $sessionenrol) {

            // Skip archived sessions or enrol user is enabled.
            if (
                $sessionenrol->status == \local_mentor_core\session::STATUS_ARCHIVED ||
                $sessionenrol->status == \local_mentor_core\session::STATUS_CANCELLED
            ) {
                continue;
            }

            // Default session is not completed.
            $sessionenrol->iscompleted = '';

            // Is completed if session has completed status or user has finished his progress.
            if (
                (isset($sessionenrol->completed) && $sessionenrol->completed) ||
                $sessionenrol->progress === 100
            ) {
                $sessionenrol->iscompleted = 'is-completed';
                $hassessioncompleted = true;
            }

            $finalsessions[] = $sessionenrol;
        }


        // Create data for the template block.
        $templateparams = new \stdClass();
        $templateparams->sessions = $finalsessions;
        $templateparams->sessionscount = count($finalsessions);
        $templateparams->catalogurl = $CFG->wwwroot . '/local/catalog/index.php';
        $templateparams->hassessioncompleted = $hassessioncompleted;
        $templateparams->isSearch = !is_null($searchText);
        $templateparams->isExternalUser = $isExternalUser;

        // Return data for the template block.
        return $templateparams;
    }
}
