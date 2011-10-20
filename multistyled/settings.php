<?php

/**
 * Settings for the multistyled theme *** NOT YET IN USE ***
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

// Column Layout
$name = 'theme_multistyled/layout';
$title=get_string('layout','theme_multistyled');
$description = get_string('layoutdesc', 'theme_multistyled');
$default = '3col_holygrail';
$choices = array('3col_holygrail'=>'3 column holy-grail layout', '3col_blog'=>'3 column blog style layout', '2col_left'=>'2 columns - sidebar to left', '2col_right'=>'2 columns - sidebar to right', '1col_full'=>'1 column - full width');
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Body Width setting
$name = 'theme_multistyled/bodywidth';
$title=get_string('bodywidth_title','theme_multistyled');
$description = get_string('bodywidth', 'theme_multistyled');
$default = '100%';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Page Image
$name = 'theme_multistyled/pgimage';
$title=get_string('pgimage_title','theme_multistyled');
$description = get_string('pgimage', 'theme_multistyled');
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$settings->add($setting);

//Info for colour choices
$name = 'theme_multistyled/colourchoiceinfo';
$title=get_string('colourchoiceinfo','theme_multistyled');
$description = get_string('colourchoicedesc', 'theme_multistyled');
$setting = new admin_setting_heading($name, $title, $description);
$settings->add($setting);

//Headings Background colour
$name = 'theme_multistyled/bgheadings';
$title=get_string('bgheadings','theme_multistyled');
$description = get_string('bgheadingsdesc', 'theme_multistyled');
$default = '';
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$settings->add($setting);

//Sidebar Background colour
$name = 'theme_multistyled/bgsidebar';
$title=get_string('bgsidebar','theme_multistyled');
$description = get_string('bgsidebardesc', 'theme_multistyled');
$default = '';
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$settings->add($setting);

//Main background colour
$name = 'theme_multistyled/bgmain';
$title=get_string('bgmain','theme_multistyled');
$description = get_string('bgmaindesc', 'theme_multistyled');
$default = '';
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$settings->add($setting);

//Main Text colour
$name = 'theme_multistyled/maintxt';
$title=get_string('maintxt','theme_multistyled');
$description = get_string('maintxtdesc', 'theme_multistyled');
$default = '';
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$settings->add($setting);

//Off White
$name = 'theme_multistyled/headertxt';
$title=get_string('headertxt','theme_multistyled');
$description = get_string('headertxtdesc', 'theme_multistyled');
$default = '';
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$settings->add($setting);

// Custom CSS file
$name = 'theme_multistyled/customcss';
$title = get_string('customcss','theme_multistyled');
$description = get_string('customcssdesc', 'theme_multistyled');
$setting = new admin_setting_configtextarea($name, $title, $description, '');
$settings->add($setting);


}?>
