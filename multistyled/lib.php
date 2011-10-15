<?php
function multistyled_process_css($css, $theme) {
global $CFG;
global $OUTPUT;

/*Set the defaults here  - easier than reading through all the code*/
$bgheadings= '#22dd22';
$bgmain= '#effffe';
$bgsidebar= '#ddffdd';
$headertxt= '#effffe';
$maintxt= '#002200';
$pgimage= $CFG->wwwroot.'/theme/multistyled/pix/logo.png';


/*********************************************************/
/*         MAIN BIT                                      */
/*********************************************************/

//any settings page adjustments go here

// Set background colour 1
    if (!empty($theme->settings->bgheadings)) {$bgheadings = $theme->settings->bgheadings;} 
    $css = multistyled_set_bgheadings($css, $bgheadings);
// Set background colour 2
    if (!empty($theme->settings->bgsidebar)) {$bgsidebar = $theme->settings->bgsidebar;} 
    $css = multistyled_set_bgsidebar($css, $bgsidebar);
// Set background colour 3
    if (!empty($theme->settings->bgmain)) {$bgmain = $theme->settings->bgmain;} 
    $css = multistyled_set_bgmain($css, $bgmain);
// Set Off-White colour
    if (!empty($theme->settings->headertxt)) {$headertxt = $theme->settings->headertxt;}
    $css = multistyled_set_headertxt($css, $headertxt);
// Set Off-Black colour
    if (!empty($theme->settings->maintxt)) {$maintxt = $theme->settings->maintxt;}
    $css = multistyled_set_maintxt($css, $maintxt);
// Set the background image for the page
    if (!empty($theme->settings->pgimage)) {$pgimage = $theme->settings->pgimage;}
    $css = multistyled_set_pgimage($css, $pgimage);
    
    if (!empty($theme->settings->customcss)) {
    $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = multistyled_set_customcss($css, $customcss);
    
// Send back adjusted css
return $css;
};
/****************************************************************************************************/
//Functions to set replacement values in the css

function multistyled_set_bgheadings($css, $bgheadings) {
    $tag = '[[setting:bgheadings]]';
    $replacement = $bgheadings;
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
function multistyled_set_bgsidebar($css, $bgsidebar) {
    $tag = '[[setting:bgsidebar]]';
    $replacement = $bgsidebar;
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
function multistyled_set_bgmain($css, $bgmain) {
    $tag = '[[setting:bgmain]]';
    $replacement = $bgmain;
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
function multistyled_set_headertxt($css, $headertxt) {
    $tag = '[[setting:headertxt]]';
    $replacement = $headertxt;
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
function multistyled_set_maintxt($css, $maintxt) {
    $tag = '[[setting:maintxt]]';
    $replacement = $maintxt;
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
function multistyled_set_pgimage($css, $pgimage) {
	$tag = '[[setting:pgimage]]';
	$replacement = $pgimage;
	$css = str_replace($tag, $replacement, $css);
	return $css;
}
function multistyled_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
?>
