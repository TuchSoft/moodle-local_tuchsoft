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
 * Atomi informativi module post install function
 *
 * This file replaces:
 *  - STATEMENTS section in db/install.xml
 *  - lib.php/modulename_install() post installation hook
 *  - partially defaults.php
 *
 * @package mod_atomiinformativi
 * @copyright  2009 Petr Skoda (http://skodak.org)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;
function xmldb_local_tuchsoft_install() {
    global $CFG;
    if ($CFG->theme == 'remui')
        if (empty(get_config('theme_remui', 'footerbottomtext')) &&
            empty(get_config('theme_remui', 'footerbottomlink'))) {
            set_config( 'footerbottomtext', 'Built by TuchSoft', 'theme_remui');
            set_config( 'footerbottomlink', 'https://tuchsoft.com');
        }

}





