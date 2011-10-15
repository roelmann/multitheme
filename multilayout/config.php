<?php

$THEME->name = 'multilayout';               // Name of the theme

$THEME->parents = array('base');            // Parent theme
$THEME->parents_exclude_sheets  = array(    // Any style sheets that are not needed from the parent theme
    'base'=>array('pagelayout'),            // We will be including our own layout css file so we do not need the base one
);

$THEME->sheets = array(                     // List of stylesheets within this theme
    'mjt_stacked_layout',                   // Pagelayout stylesheet
    'menu',                                 // custommenu stylesheet
    'core',                                 // Main css stylesheet for the theme - in this theme this will be minimal as it concentrates on the layout
);

$THEME->enable_dock = false;                // Disable dock - this theme is to work with IE6 and there have been reports that the dock does not consistently work in IE6 - this can be overwritten in child themes, although this would also require adjustments to the layout css files

$THEME->layouts = array(                    // Layouts to be used for different page types
    'base' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'side-post', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-post',
    ),
    'stacked-columns' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'side-post', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-post',
    ),
    'course' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'side-post', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu'=>true),
    ),
    'coursecategory' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'side-post', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-post',
    ),
    'incourse' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'side-post', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-pre',
    ),
    'frontpage' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'side-post', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-post',
        'options' => array('langmenu'=>true),
    ),
    'admin' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-pre',
    ),
    'mydashboard' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'side-post', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-post',
        'options' => array('langmenu'=>true),
    ),
    'mypublic' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'side-post', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-post',
    ),
    'login' => array(
        'file' => 'general_layouts.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
    ),
    'popup' => array(
        'file' => 'embedded.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'noblocks'=>true, 'nonavbar'=>true),
    ),
    'frametop' => array(
        'file' => 'general_layouts.php',
        'regions' => array(),
        'options' => array('nofooter'=>true),
    ),
    'maintenance' => array(
        'file' => 'general_layouts.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true),
    ),
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true),
    ),
    'print' => array(
        'file' => 'general_layouts.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>false),
    ),
    'report' => array(
        'file' => 'general_layouts.php',
        'regions' => array('side-pre', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
        'defaultregion' => 'side-pre',
    ),
);
