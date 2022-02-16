<?php
//
//  Copyright (c) 2011, Maths for More S.L. http://www.wiris.com
//  This file is part of Moodle WIRIS Plugin.
//
//  Moodle WIRIS Plugin is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  Moodle WIRIS Plugin is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with Moodle WIRIS Plugin. If not, see <http://www.gnu.org/licenses/>.
//

defined('MOODLE_INTERNAL') || die();

class filter_chemjax extends moodle_text_filter {

    /*
     * Add the javascript to enable chemjax processing on this page.
     *
     * @param moodle_page $page The current page.
     * @param context $context The current context.
     */
    public function setup($page, $context) {

        // This only requires execution once per request.
        static $jsinitialised = false;

        if (empty($jsinitialised)) {
            $bondlen = get_config('filter_chemjax', 'bondlen');
            $page->requires->data_for_js('bondlen', $bondlen);
            $jsinitialised = true;
        }
    }

    public function filter($text, array $options = array()) {
        global $PAGE;

        return $text;
    }
}
