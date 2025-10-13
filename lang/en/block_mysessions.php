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
 * Strings for component 'block_mysessions', language 'en', branch 'MOODLE_20_STABLE'
 *
 * @package    block_mysessions
 * @copyright  2020 Edunao SAS (contact@edunao.com)
 * @author     rcolet <remi.colet@edunao.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['mysessions:addinstance'] = 'Add a new my sessions block';
$string['mysessions:myaddinstance'] = 'Add my sessions block to Dashboard';
$string['pluginname'] = 'Mes sessions';
$string['enroltosession'] = 'S\'inscrire à une session';
$string['no_sessions_enroltosession'] = 'Offre de formation Mentor';
$string['privacy:metadata'] = 'My sessions block only shows data stored in other locations.';
$string['no_sessions']
    = 'Pour vous inscrire à une session de formation, recherchez dans l\'offre en cliquant sur le bouton ci-dessous.';
$string['no-sessions-message-external_user'] = 'Vous n\'êtes inscrit à aucune session de formation.';
    
$string['no_search_result_sessions'] = 'Aucune session de formation ne correspond à votre demande. Vous pouvez modifier votre recherche ou consulter l\'offre en cliquant sur le bouton ci-dessous.';
$string['no_search_result_sessions_external_user'] = 'Aucune session de formation ne correspond à votre demande.';

$string['trainer'] = 'Formateur';
$string['tutor'] = 'Tuteur';
$string['designer'] = 'Concepteur';
$string['comingsoon'] = 'À venir {$a}';
$string['inprogress'] = 'En cours';
$string['completed'] = 'Achevée';
$string['on'] = 'le {$a}';
$string['next'] = 'Suivant';
$string['previous'] = 'Précédent';
$string['thumbnail'] = 'Vignette';
$string['progression'] = '{$a}%';
$string['session'] = 'Session';
$string['moreinfo'] = 'Plus d\'info sur {$a}';
$string['moreinfotile'] = 'En savoir plus';
$string['showcompletedsession'] = 'Afficher les sessions terminées';

$string['no-enroll-message-external_user'] = '
                <div class="mentor-card container-fluid important mentor-card-external-user-info">
                    <div class="col-md-2 col-lg-2 mentor-card-left" >
                        <div>Important</div>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    </div>
                    <div class="col-10 mentor-card-content" style="flex: 1;">
                            <h5><span style="font-weight: normal;">Votre compte sur la plateforme interministérielle de formation Mentor est basé sur une adresse de messagerie non reconnue comme celle d’un partenaire officiel du programme Mentor. Ce compte ne permet donc pas de consulter notre offre de formation.</span></h5>
                            <h5><span style="font-weight: normal;">Si vous êtes bien un agent de la fonction publique d’État mais que votre compte Mentor n’est pas lié à votre adresse de messagerie professionnelle. Vous pouvez modifier votre profil en toute autonomie en cliquant sur le lien suivant : <a href="{$a}/user/profile.php">{$a}/user/profile.php</a></span></h5>
                            <h5><span style="font-weight: normal;">Si vous n\'êtes pas un agent de la fonction publique d’État, vous ne faites pas partie du périmètre du programme Mentor. Votre compte sera alors supprimé automatiquement d\'ici quelques jours sans action de votre part.</span></h5>
                            <h5><span style="font-weight: normal;">Néanmoins, si vous estimez que votre adresse devrait être reconnue comme légitime car vous faites partie de la fonction publique d’État, vous devez alors prendre contact avec le représentant Mentor de votre ministère de tutelle pour clarifier la situation (<a href="{$a}/local/staticpage/view.php?page=contact">{$a}/local/staticpage/view.php?page=contact</a>).</span></h5>
                            <h5><span style="font-weight: normal;">Si vous souhaitez connaître les domaines de messagerie autorisés sur la plateforme Mentor, vous pouvez consulter la liste en bas de cette page : <a href="{$a}/local/staticpage/view.php?page=ensavoirplus">{$a}/local/staticpage/view.php?page=ensavoirplus</a></span></h5></div>
                    </div>  
                </div>';