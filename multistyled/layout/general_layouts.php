<?php

/* ---------------------------- SELECT LAYOUT ------------------------------ */
/* Layout is normally selected from the multistyles theme settings page. But */
/* this will be overriden if any of the lines below are uncommented.         */
/* This allows duplicate layout files to be created and referenced in the    */
/* config.php file with minimal recoding - simply choose whether to comment  */
/* out the chosen layout to overwrite the settings choice for that particular*/
/* page type.                                                                */
/* ------------------------------------------------------------------------- */             
if (!empty($PAGE->theme->settings->layout)) {
    $layout = $PAGE->theme->settings->layout;
} else {
    $layout = "3col_holygrail";
}

// $layout="1col_full";           /*SidePre/SidePost blocks will both be added full width below the main content */
// $layout="2col_left";           /*SidePre/SidePost blocks will both be added in one left hand sidebar column */
// $layout="2col_right";          /*SidePre/SidePost blocks will both be added in one right hand sidebar column */
// $layout="3col_blog";           /*SidePre/SidePost blocks will be added in 2 right hand sidebar columns */
// $layout="3col_holygrail";      /*SidePre/SidePost blocks will be added in one left and one right hand sidebar column */

if (!isset($layout)) {$layout="3col_holygrail";}        /* Catch-all error trap to ensure a layout is set - Do not comment out this line! */

/* Moodle options */
/*----------------*/
$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));

$hastopleft = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('top-left', $OUTPUT));
$hastopright = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('top-right', $OUTPUT));
$hasbottomleft = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('bottom-left', $OUTPUT));
$hasbottomright = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('bottom-right', $OUTPUT));

$haslogininfo = (empty($PAGE->layout_options['nologininfo']));

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}


/* Normal top of document lines */
echo $OUTPUT->doctype() ?>

<!-- Normal top of document <HTML> -->
<html <?php echo $OUTPUT->htmlattributes() ?>>

<!-- Normal top of document <HEAD> -->
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>

</head>

<!-- <BODY> Section -->
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">     <!-- Page Wrapper div -->

<!-- HEADER Section -->
<?php if ($hasheading || $hasnavbar) { ?>

    <div id="page-header" class="clearfix">
        <?php if ($hasheading) { ?>
        <div id="headerwrap">
        <div id="logo">
        <h1 class="headermain"><?php echo $PAGE->heading ?></h1>
        </div>    <!-- end div logo -->

        <div class="headermenu"><?php
            if ($haslogininfo) {
                echo $OUTPUT->login_info();
            }
            if (!empty($PAGE->layout_options['langmenu'])) {
                echo $OUTPUT->lang_menu();
            }
            echo $PAGE->headingmenu ?>
        </div><?php } ?>     <!-- end div headermenu -->

        <?php if ($hascustommenu) { ?>
                <div id="custommenu" class="javascript-disabled"><?php echo $custommenu; ?></div>
        <?php } ?>
        
        <?php if ($hasnavbar) { ?>
            <div class="navbar clearfix">
                <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                <div class="navbutton"> <?php echo $PAGE->button; ?></div>
            </div> <!-- end div navbar -->
        <?php } ?>
        </div> <!-- end of headerwrap -->
    </div>  <!-- end div page-header -->

<?php } ?>

<!-- END OF HEADER -->


<!--                       Below this are a series of layout sections                         -->
<!--         Each section is designed separately to suit the needs of that layout style       -->
<!--  Additional layouts may be added by copying and editing the 3colHolyGrail section below  -->
<!--     and renaming the colmask div - you will also need to add the necessary layout css    -->
<!--      in the mjt_stacked_layout.css file. As credited in the css file, these layouts      -->
<!-- have been adapted from Matthew James Taylor's Perfect Multi-Column Stacked Liquid Layout -->
<!--               http://matthewjamestaylor.com/blog/perfect-stacked-columns.htm             -->


<!-- 3col Holy Grail style layout -->

<?php if ($layout=="3col_holygrail") {?>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
                        <div class="region-content">
                                            	<div id="top_block" class="clearfix">
                                            	  <?php if ($hastopleft) { ?>
                                                  <div id="topleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hastopright) { ?>
                                                  <div id="topright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                                                <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
                                                <div id="bottom_block" class="clearfix">
                                            	  <?php if ($hasbottomleft) { ?>
                                                  <div id="bottomleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hasbottomright) { ?>
                                                  <div id="bottomright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                        </div>
				<!-- Column 1 end -->
			</div>
		<?php if ($hassidepre) { ?>
			<div class="col2 block-region">
				<!-- Column 2 start -->
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
				<!-- Column 2 end -->
			</div>
	    <?php } ?>

        <?php if ($hassidepost) { ?>
			<div class="col3 block-region">
				<!-- Column 3 start -->
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
				<!-- Column 3 end -->
			</div>

            <?php } ?>
            </div>     <!-- end div colleft -->
        </div>     <!-- end div colmid -->
    </div>     <!-- end div colmask threecol -->
<?php } ?>
<!-- end 3col Holy Grail style layout -->   


<!-- 3col Holy Grail style layout -->
<?php if ($layout=="3col_blog") {?>
<div class="colmask blogstyle">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- Column 1 start -->
                        <div class="region-content">                           
                                            	<div id="top_block" class="clearfix">
                                            	  <?php if ($hastopleft) { ?>
                                                  <div id="topleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hastopright) { ?>
                                                  <div id="topright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                                                <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
                                                <div id="bottom_block" class="clearfix">
                                            	  <?php if ($hasbottomleft) { ?>
                                                  <div id="bottomleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hasbottomright) { ?>
                                                  <div id="bottomright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                        </div>
				<!-- Column 1 end -->
			</div>
		<?php if ($hassidepre) { ?>
			<div class="col2 block-region">
				<!-- Column 2 start -->
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
				<!-- Column 2 end -->
			</div>
	    <?php } ?>

        <?php if ($hassidepost) { ?>
			<div class="col3 block-region">
				<!-- Column 3 start -->
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
				<!-- Column 3 end -->
			</div>

            <?php } ?>
            </div>     <!-- end div colleft -->
        </div>     <!-- end div colmid -->
    </div>     <!-- end div colmask blogstyle -->
<?php } ?>
<!-- end 3col Blog style layout -->   


<!-- 2col left layout -->
<?php if ($layout=="2col_left") {?>
<div class="colmask leftmenu">
	<div class="colleft">
		<div class="col1">
			<!-- Column 1 start -->
                        <div class="region-content">                         
                                            	<div id="top_block" class="clearfix">
                                            	  <?php if ($hastopleft) { ?>
                                                  <div id="topleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hastopright) { ?>
                                                  <div id="topright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                                                <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
                                                <div id="bottom_block" class="clearfix">
                                            	  <?php if ($hasbottomleft) { ?>
                                                  <div id="bottomleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hasbottomright) { ?>
                                                  <div id="bottomright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                        </div>
			<!-- Column 1 end -->
		</div>
		<div class="col2">
			<!-- Column 2 start -->
             <?php if ($hassidepre) { ?>
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
            <?php } ?>

            <?php if ($hassidepost) { ?>
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
            <?php } ?>
			<!-- Column 2 end -->
		</div>
	</div>
</div>
<?php } ?>
<!-- end 2col left layout -->   

<!-- 2col right layout -->
<?php if ($layout=="2col_right") {?>
    <div class="colmask rightmenu">
	<div class="colleft">
		<div class="col1">
			<!-- Column 1 start -->
                        <div class="region-content">                          
                                            	<div id="top_block" class="clearfix">
                                            	  <?php if ($hastopleft) { ?>
                                                  <div id="topleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hastopright) { ?>
                                                  <div id="topright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                                                <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
                                                <div id="bottom_block" class="clearfix">
                                            	  <?php if ($hasbottomleft) { ?>
                                                  <div id="bottomleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hasbottomright) { ?>
                                                  <div id="bottomright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                        </div>
			<!-- Column 1 end -->
		</div>
		<div class="col2">
			<!-- Column 2 start -->
             <?php if ($hassidepre) { ?>
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
            <?php } ?>

            <?php if ($hassidepost) { ?>
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
            <?php } ?>
			<!-- Column 2 end -->
		</div>
	</div>
</div>
<?php } ?>
<!-- end 2col right layout -->  

<!-- 1col Full Width layout -->
<?php if ($layout=="1col_full") {?> 
    <div class="colmask fullpage">
        <div class="col1">
            <!-- Column 1 start -->
                        <div class="region-content">
                            
                                            	<div id="top_block" class="clearfix">
                                            	  <?php if ($hastopleft) { ?>
                                                  <div id="topleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hastopright) { ?>
                                                  <div id="topright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('top-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                                                <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
                                                <div id="bottom_block" class="clearfix">
                                            	  <?php if ($hasbottomleft) { ?>
                                                  <div id="bottomleft_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-left') ?></div>
                                                  <?php } ?>
                                                  <?php if ($hasbottomright) { ?>
                                                  <div id="bottomright_block" class="block-action"><?php echo $OUTPUT->blocks_for_region('bottom-right') ?></div>
                                                  <?php } ?>
	                                            </div>
                        </div>
            <?php if ($hassidepre) { ?>
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
            <?php } ?>

            <?php if ($hassidepost) { ?>
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
            <?php } ?>
            <!-- Column 1 end -->
        </div>
    </div>
<?php } ?>
<!-- end 1col Full width layout -->   

 
    
</div>     <!-- end page div -->   


        <!-- START OF FOOTER -->
        <div id="page-footer" >

            <?php
                echo $OUTPUT->login_info();
                echo $OUTPUT->home_link();
                echo $OUTPUT->standard_footer_html();
            ?>

            <div class="moodledocs">
                <?php echo page_doc_link(get_string('moodledocslink')); ?>
            </div>
        </div> <!-- end of page-footer or page-footer_noframe -->
<?php    echo $OUTPUT->standard_end_of_body_html(); ?> 
</body>
</html>

