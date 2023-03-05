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
 * Category enrolment plugin.
 *
 * @package    local_messagep
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function local_messagep_before_footer(){
    global $DB;
    $messages = $DB->get_records('local_messagep_message');
    $types = [
        '0' => 'success',
        '1' => 'warning',
        '2' => 'info',
        '3' => 'error',
    ];
    foreach ($messages as $message) {

        \core\notification::add($message->text,$types[$message->type]); // or just : 'success'
    }
}