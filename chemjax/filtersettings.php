<?php
global $PAGE;
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    //$PAGE->requires->css('/filter/chemjax/styles.css');

    $item = new admin_setting_heading('filter_chemjax/config',
                new lang_string('chemjaxsettings', 'filter_chemjax'),
                new lang_string('chemjaxsettings_desc', 'filter_chemjax').
                new lang_string('description', 'filter_chemjax'));
    $settings->add($item);

    $item = new admin_setting_heading('filter_chemjax/options',                                 new lang_string('chemjaxoptions', 'filter_chemjax'), null);
    $settings->add($item);

    $default = 20;
    $item = new admin_setting_configtext('filter_chemjax/bondlen',
        new lang_string('bondlen', 'filter_chemjax'),
        new lang_string('bondlen_desc', 'filter_chemjax'),
        $default, PARAM_INT, 2);
    $settings->add($item);

}
