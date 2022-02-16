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
 * Atto chemjaxpv library functions
 *
 * @package    atto_chemjaxpv
 * @copyright  2018 Kenichi Miura <kenmiu3@gmail.co.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Set params for this plugin.
 *
 * @param string $elementid
 * @param stdClass $options - the options for the editor, including the context.
 * @param stdClass $fpoptions - unused.
 */
function atto_chemjaxpv_params_for_js($elementid, $options, $fpoptions) {
    global $CFG;
    $context = $options['context'];
    if (!$context) {
        $context = context_system::instance();
    }
    $displaytype = get_config('atto_chemjaxpv', 'display');
    return array('contextid' => $context->id, 'displaytype' => $displaytype, 
                 'notationurl' => $CFG->wwwroot . '/lib/editor/atto/plugins/chemjaxpv/notation.php');

}

/**
 * Initialise the js strings required for this module.
 */
function atto_chemjaxpv_strings_for_js() {
    global $PAGE;

    $PAGE->requires->strings_for_js(array('pluginname', 'notation'), 'atto_chemjaxpv');
}

