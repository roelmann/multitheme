<?php

$THEME->name = 'multistyled';

$THEME->parents = array(
    'multilayout',
    'base'
);

$THEME->sheets = array(
    'multistyled_core',
    'multistyledmenu',
    'custom'
);

$THEME->enable_dock = false;

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

$THEME->csspostprocess = 'multistyled_process_css';
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
