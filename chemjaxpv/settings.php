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
 * Settings that allow configuration of the ChemJaxPV appearance.
 *
 * @package    atto_chemjaxpv
 * @copyright  2018 Kenichi Miura (kenmiu3@gmail.co.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$ADMIN->add('editoratto', new admin_category('atto_chemjaxpv', new lang_string('pluginname', 'atto_chemjaxpv')));

$settings = new admin_settingpage('atto_chemjaxpv_settings', new lang_string('settings', 'atto_chemjaxpv'));
if ($ADMIN->fulltree) {
    // Create a list of page layouts to be available.
    $name = new lang_string('display', 'atto_chemjaxpv');
    $desc = new lang_string('display_desc', 'atto_chemjaxpv');
    $options = array ('newtab' => get_string('displaynewtab', 'atto_chemjaxpv'),
                      'popup' => get_string('displaypopup', 'atto_chemjaxpv'));
    $default = 'newtab';

    $setting = new admin_setting_configselect('atto_chemjaxpv/display',
                                              $name,
                                              $desc,
                                              $default,
                                              $options);
    $settings->add($setting);

    $url = new moodle_url('/lib/editor/atto/plugins/chemjaxpv/pix/chemjax.png');
    $message = $OUTPUT->notification(new lang_string('addmenuitem', 'atto_chemjaxpv', '<img src="'.$url.'">'), 'atto_chemjaxpv', 'warning');
    $item = new admin_setting_heading('atto_chemjaxpv/addtoolbar',
                new lang_string('addtotoolbar', 'atto_chemjaxpv'),
                $message);
    $settings->add($item);

    $item = new admin_setting_description('atto_chemjaxpv/addmenuitemtoolbar',
                new lang_string('toolbarconfig', 'editor_atto'),
                '<p style="color:#0f6fc5">'.new lang_string('addtotoolbar_desc', 'atto_chemjaxpv').'</p>'.
new lang_string('configaddmenuitem', 'atto_chemjaxpv'));
    $settings->add($item);
}
