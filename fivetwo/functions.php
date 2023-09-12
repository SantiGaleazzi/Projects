<?php

require 'virtuous/autoload.php';

use VirtuousConnector\vo\VirtuousContactVO;
use VirtuousConnector\vo\VirtuousContactMethodVO;
use VirtuousConnector\vo\VirtuousContactAddressVO;
use VirtuousConnector\VirtuousAPI\VirtuousConnection;
use VirtuousConnector\VirtuousAPI\VirtuousAPIController;

// Virtuous tags must already exist on the CRM to be used
define ('V_TAG_DL_CONTACT', 'DL Contact');
define ('V_TAG_GATED_CONTENT', 'Gated Content');
define ('V_TAG_LEADER_ASSESSMENT', 'Leader Assessment');
define ('V_TAG_MEMBER_ASSESSMENT', 'Member Assessment');
define ('V_TAG_PASTOR_CONTACT', 'Pastor Contact');
define ('V_TAG_QUIZ', 'Quiz');
define ('V_TAG_QUIZ_SERIES', 'Quiz Series');
define ('V_TAG_SCHOLARSHIP', 'Scholarship');
define ('V_TAG_TRAINING', 'Training ');
define ('V_TAG_E_MAIL_SIGNUP', 'eMail Signup');
define ('V_TAG_AD_WEBINAR', 'AD Webinar');
define ('V_TAG_AD_INCUBATOR_INTEREST', 'AD Incubator Interest');
define ('V_TAG_INCUBATOR_INTEREST', 'Incubator Interest');
define ('V_TAG_QUIZ_REQUESTED_CALL', 'Quiz-Requested Call');
define ('V_TAG_INC_WEBINAR', 'INC Webinar');
define ('V_TAG_INTRO_SERIES', 'Intro Series');
define ('V_TAG_BPM', '2002 BPM Session Attendee');
define ('V_TAG_WARM_LEAD', 'Warm Lead');
define ('V_TAG_BILLS_TOP_5_LP', 'Bills Top 5 LP');
define ('V_TAG_EVENTS', 'Events');
define ('V_TAG_2003_EMAILS_PLEASE', '2003 eMailsPlease');
define ('V_TAG_2020_WEBINAR_REGISTRANTS', '2020: Webinar Registrants');
define ('V_TAG_200625_WEBINAR', '200625 Webinar');
define ('V_TAG_2006_PILOTSURVEYSTARTED', '2006PilotSurveyStarted');
define ('V_TAG_2006_PILOTSURVEYRESONATE', '2006PilotSurveyResonate');
define ('V_TAG_2006_PILOTSURVEYNOTRESONATE', '2006PilotSurveyNotResonate');
define ('V_TAG_2006_PILOTSURVEYINTERESTED', '2006PilotSurveyInterested');
define ('V_TAG_2006_PILOTSURVEYNOTINTERESTED', '2006PilotSurveyNotInterested');
define ('V_TAG_2006_PILOTSURVEYLESSTHAN100', '2006PilotSurveyLessThan100');
define ('V_TAG_2006_PILOTSURVEYGREATERTHAN100', '2006PilotSurveyGreaterThan100');
define ('V_TAG_2006_PILOTSURVEYNOPAY', '2006PilotSurveyNoPay');
define ('V_TAG_2006_PILOTSURVEYFINISHED', '2006PilotSurveyFinished');
define ('V_TAG_2020_ONLINE_TRAINING_PLATFORM_interest', '2020 Online Training Platform interest');
define ('V_TAG_2020_GOLF_EVENT_ATTENDEE', '2020 Golf Event - Attendee');
define ('V_TAG_BILLS_TOP_FIVE', 'Bills Top Five');
define ('V_TAG_FUNDRAISING_COMMUNICATIONS', 'Fundraising Communications');
define ('V_TAG_MINISTRY_UPDATES', 'Ministry Updates');
define ('V_TAG_DALLAS_DINNER_ATTENDING', '1911 Dallas Dinner - Attending');
define ('V_TAG_GOOGLE_EMAIL_ACQUISITION', 'Google Email Acquisition');
define ('V_TAG_DALLAS_DINNER_NOT_ATTENDING', '1911 Dallas Dinner - Not Attending');
define ('V_TAG_2001_SN_SUMMIT_INTEREST' , '2001 SN Summit Interest');
define ('V_TAG_2_MINUTE_MULTIPLIER' , '2-Minute Multiplier');
define ('V_TAG_LEAD_BOOK_A_CALL' , 'Lead-BookACall');

define ('V_CUSTOM_FIELD_OCCUPATION_DESCRIPTION', 'Occupation Description');
define ('V_CUSTOM_FIELD_ORGANIZATION', 'Church/Organization');
define ('V_CUSTOM_FIELD_CHURCH_CONGREGATION', 'Church/Congregation');
define ('V_CUSTOM_FIELD_CONGREGATION_AVERAGE_NUMBER', 'Congregation Average Number');
define ('V_CUSTOM_FIELD_QUESTION_1_SURVEY', 'Question 1 Survey');
define ('V_CUSTOM_FIELD_QUESTION_2a_SURVEY', 'Question 2 Survey Opt 1');
define ('V_CUSTOM_FIELD_QUESTION_2b_SURVEY', 'Question 2 Survey Opt 2');
define ('V_CUSTOM_FIELD_QUESTION_2c_SURVEY', 'Question 2 Survey Opt 3');
define ('V_CUSTOM_FIELD_QUESTION_2d_SURVEY', 'Question 2 Survey Opt 4');
define ('V_CUSTOM_FIELD_QUESTION_2e_SURVEY', 'Question 2 Survey Opt 5');
define ('V_CUSTOM_FIELD_QUESTION_2f_SURVEY', 'Question 2 Survey Opt 6');
define ('V_CUSTOM_FIELD_QUESTION_3_SURVEY', 'Question 3 Survey');
define ('V_CUSTOM_FIELD_QUESTION_3b_SURVEY', 'Question 3b Survey');
define ('V_TAG_2101_STARTNEWACCESSLEADGENLP', '2101 StartNew Access Lead Gen LP');
define ('V_TAG_2021_WEBINAR_REGISTRANTS_PASTORS', '2021: Webinar Registrants');
define ('V_TAG_210203WEBINAR_NE_PASTORS', '210203 WEBINAR: NE Pastors');
define ('V_TAG_2102_GLORIA_DEI_EVENT', '2102 Gloria Dei Event');
define ('V_TAG_LEAD_STRATEGY_SESSION', 'Lead-StrategySession');

/**
 * Theme Functions
 *
 *
 * @since 1.0
 */
$includes = [
  'remove-rss-feed.php',
  'protected_api.php',
  'remove-wordpress-css.php',
  'change-recovery-mode-email.php',
  'remove-wp-oembed-wp-json-links.php',
  'gf-class-submission-limit.php',
  'gf-submition-limit.php',
  'gf-search-form-shortcode.php'
];

foreach ($includes as $include) {

  if ( file_exists(TEMPLATEPATH."/functions/".$include) ) {
      require_once( TEMPLATEPATH."/functions/".$include );
  }
}


//@ini_set( 'upload_max_size' , '3M' );

/*
* REMOVE POST
*/
function post_remove ()
{
  remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');

/*
* WRITE TO LOG
*/
/*if (!function_exists('write_log')) {
    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }
}*/

/**
 * ENABLING SUPPORT FOR POST THUMBNAILS
 */
add_theme_support( 'post-thumbnails' );

add_image_size( 'team-picture', 170, 170, array( 'center', 'center' ) );
add_image_size( 'expert-picture', 200, 200, array( 'center', 'center' ) );

//remove_filter( 'get_the_excerpt', 'wp_trim_excerpt'  );

/* UPDATE JQUERY */
function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.

    wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );

}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

/**
 * ENABLING SUPPORT FOR EXCERPT
 */
//add_post_type_support( 'page', 'excerpt' );

add_theme_support( 'responsive-embeds' );
/**
 * LOAD SVG
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * EXTENDS NAV
 */
register_nav_menus( array(
  'header_menu'     => 'Header Menu',
  'secondary_menu'  => 'Secondary Menu',
  'footer_menu'     => 'Footer Menu',
  'access_menu'  => 'Access Menu',
));

$file = TEMPLATEPATH."/inc/extends-nav.php";
if(file_exists($file)){
    require_once($file);
}

/**
 * SETTINGS PAGE
 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Header',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Donor Nav',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'General',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Articles Sidebar',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Footer',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Lightbox',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Default Banner',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Blog Pre Footer',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Blog Ad',
    'parent' => 'theme-settings'
  ));

  acf_add_options_page(array(
    'title' => 'Faith - Work Template Button',
    'parent' => 'theme-settings'
  ));

}



/*
* GUTENBERG BLOCKS
*/
add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {
  if( function_exists('acf_register_block') ) {

    // register a new Banner block
    acf_register_block(array(
        'name'              => 'homepageBanner',
        'title'             => __('Homepage Banner'),
        'description'       => __('A custom homepage banner block.'),
        'render_template'   => 'block/banner.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'banner' )
    ));

    // register left column with button
    acf_register_block(array(
        'name'              => 'leftColum',
        'title'             => __('Left Column with button'),
        'description'       => __('A custom homepage left column block.'),
        'render_template'   => 'block/left-column-button.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'left', 'column' )
    ));

    // register steps list
    acf_register_block(array(
        'name'              => 'stepsList',
        'title'             => __('Steps List'),
        'description'       => __('A custom homepage steps list block.'),
        'render_template'   => 'block/steps-list.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'list', 'steps', 'step' )
    ));

    // register steps list
    acf_register_block(array(
        'name'              => 'twoColumnsAndImage',
        'title'             => __('Two Columns and Images'),
        'description'       => __('A custom homepage two columns block.'),
        'render_template'   => 'block/two-columns-and-images.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'two', 'columns', 'column' )
    ));

    // register Full width text with Button
    acf_register_block(array(
        'name'              => 'fullWidtTextAndButton',
        'title'             => __('Full width text with Button'),
        'description'       => __('A custom homepage full width text and button block.'),
        'render_template'   => 'block/full-width-text-with-button.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'full', 'width', 'button' )
    ));

    // register Roadmap
    acf_register_block(array(
        'name'              => 'roadMap',
        'title'             => __('Roadmap'),
        'description'       => __('A custom roadmap block.'),
        'render_template'   => 'block/roadmap.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'roadmap', 'road', 'map' )
    ));

    // register Icon and Text Repeater
    acf_register_block(array(
        'name'              => 'iconTextRepeater',
        'title'             => __('Icon and Text Repeater'),
        'description'       => __('A custom Icon and Text Repeater block.'),
        'render_template'   => 'block/icon-text-repeater.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'icon', 'text', 'repeater' )
    ));

    // register Heading and Two Columns
    acf_register_block(array(
        'name'              => 'headingTwoColumns',
        'title'             => __('Heading and Two Columns'),
        'description'       => __('A custom Heading and Two Columns block.'),
        'render_template'   => 'block/heading-two-cols.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'heading', 'two', 'columns' )
    ));

    // register Left Heading and Right Copy
    acf_register_block(array(
        'name'              => 'leftHeadingRightCopy',
        'title'             => __('Left Heading and Right Copy'),
        'description'       => __('A custom Left Heading and Right Copy block.'),
        'render_template'   => 'block/left-heading-right-copy.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'heading', 'left', 'right', 'copy' )
    ));

    // register Clients Section
    acf_register_block(array(
        'name'              => 'clientsSection',
        'title'             => __('Clients Section'),
        'description'       => __('A custom Clients Section block.'),
        'render_template'   => 'block/clients-section.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'client', 'clients', 'section' )
    ));

    // register Heading and Step List
    acf_register_block(array(
        'name'              => 'headingStepList',
        'title'             => __('Heading and Step List'),
        'description'       => __('A custom Heading and Step List block.'),
        'render_template'   => 'block/heading-step-list.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'heading', 'step', 'list' )
    ));

    // register Heading and Step List Donors
    acf_register_block(array(
        'name'              => 'headingStepListDonors',
        'title'             => __('Heading and Step List Donors'),
        'description'       => __('A custom Heading and Step List Donors block.'),
        'render_template'   => 'block/heading-step-list-donors.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'heading', 'step', 'list', 'donors' )
    ));

    // register Testimonials
    acf_register_block(array(
        'name'              => 'testimonials',
        'title'             => __('Testimonials Section'),
        'description'       => __('A custom Testimonials block.'),
        'render_template'   => 'block/testimonials.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'testimonials' )
    ));

    // register Sign Up
    acf_register_block(array(
        'name'              => 'signUp',
        'title'             => __('Sign Up Section'),
        'description'       => __('A custom Sign Up block.'),
        'render_template'   => 'block/signup.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'signup', 'newsletter', 'connect' )
    ));

    // register a Main Banner block
    acf_register_block(array(
        'name'              => 'mainBanner',
        'title'             => __('Main Banner'),
        'description'       => __('A custom homepage banner block.'),
        'render_template'   => 'block/main-banner.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'homepage', 'banner' )
    ));

    acf_register_block(array(
      'name'              => 'newBanner',
      'title'             => __('New Banner'),
      'description'       => __('A custom homepage banner block.'),
      'render_template'   => 'block/new-banner.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'New Banner', 'banner' )
  ));

    // register a Secondary Banner block
    acf_register_block(array(
        'name'              => 'secondaryBanner',
        'title'             => __('Secondary Banner'),
        'description'       => __('A custom Secondary Banner block.'),
        'render_template'   => 'block/secondary-banner.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'secondary', 'banner', 'internal' )
    ));

    // Webinar Widget
    acf_register_block(array(
      'name'              => 'webinarwidget',
      'title'             => __('Webinar Widget'),
      'description'       => __('Weekly Webinar Block'),
      'render_template'   => 'block/webinar-widget.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'webinar', 'banner' )
    ));

    // Webinar Widget
    acf_register_block(array(
      'name'              => 'trainingprogram',
      'title'             => __('Training Program'),
      'description'       => __('Training Program'),
      'render_template'   => 'block/training-program.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'program', 'banner', 'training' )
    ));

    // register a Sketch block
    acf_register_block(array(
        'name'              => 'sketch',
        'title'             => __('Sketch'),
        'description'       => __('A custom Sketch block.'),
        'render_template'   => 'block/sketch.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'sketch' )
    ));

    // register a Stay Connected block
    acf_register_block(array(
        'name'              => 'stayConnected',
        'title'             => __('Stay Connected'),
        'description'       => __('A custom Stay Connected block.'),
        'render_template'   => 'block/stay-connected.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Stay', 'Connected' )
    ));

    // register a Testimonial block
    acf_register_block(array(
        'name'              => 'testimonial',
        'title'             => __('Testimonial'),
        'description'       => __('A custom Testimonial block.'),
        'render_template'   => 'block/testimonial.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Internal', 'Testimonial' )
    ));

    // register a Workshops block
    acf_register_block(array(
        'name'              => 'workshops',
        'title'             => __('Workshops'),
        'description'       => __('A custom Workshops block.'),
        'render_template'   => 'block/workshops.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Internal', 'Workshops' )
    ));

    // register a Youtube block
    acf_register_block(array(
        'name'              => 'youtubeVideo',
        'title'             => __('YouTube'),
        'description'       => __('A custom YouTube block.'),
        'render_template'   => 'block/youtube.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'video', 'embed', 'youtube' )
    ));

    // register a Strategy block
    acf_register_block(array(
        'name'              => 'strategy',
        'title'             => __('Strategy'),
        'description'       => __('A custom Strategy block.'),
        'render_template'   => 'block/strategy.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Strategy', 'About' )
    ));

    // register a Header with share block
    acf_register_block(array(
        'name'              => 'headerShare',
        'title'             => __('Header with Share'),
        'description'       => __('A custom Header with share block.'),
        'render_template'   => 'block/headerShare.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Header', 'Share' )
    ));

    // register an Extra block
    acf_register_block(array(
        'name'              => 'extra',
        'title'             => __('Extra'),
        'description'       => __('A custom Extra block.'),
        'render_template'   => 'block/extra.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Extra' )
    ));

    // register an Partner block
    acf_register_block(array(
        'name'              => 'partner',
        'title'             => __('Partner'),
        'description'       => __('A custom Partner block.'),
        'render_template'   => 'block/partner.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Partner' )
    ));

    // register an Incubator block
    acf_register_block(array(
        'name'              => 'incubator',
        'title'             => __('Incubator'),
        'description'       => __('A custom Incubator Highlights block.'),
        'render_template'   => 'block/incubator.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Incubator' )
    ));


    // Register a Video Banner block
    acf_register_block(array(
        'name'              => 'videoBanner',
        'title'             => __(' BanneVideor'),
        'description'       => __('A custom video Highlights block.'),
        'render_template'   => 'block/video-banner.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'mode'              => 'preview',
        'keywords'          => array( 'Video' )
    ));

    // Register the new Sketch Layout
    acf_register_block( array(
      'name'              => 'trainingInterest',
      'title'             => __('Training Interests'),
      'description'       => __('New 3 block images'),
      'render_template'   => 'block/training-interests.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'Block', 'Images' )
    ));

    // Register the new Sketch Layout
    acf_register_block( array(
      'name'              => 'trainingProgramSoon',
      'title'             => __('Training Program Coming Soon'),
      'description'       => __('Program Coming Soon'),
      'render_template'   => 'block/training-program-soon.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'Block', 'Images' )
    ));

    // Form 2-Minute Multiplier
    acf_register_block(array(
      'name'              => 'MinuteMultiplier',
      'title'             => __('Minute Multiplier'),
      'description'       => __('Minute Multiplier'),
      'render_template'   => 'block/minute-multiplier.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'Minute', 'Multipler' )
    ));

    //Sub Banner Image
    acf_register_block(array(
      'name'              => 'SubBannerImage',
      'title'             => __('Sub Banner Image'),
      'description'       => __('Sub Banner Image'),
      'render_template'   => 'block/sub-banner-image.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'Sub Banner', 'Sub Banner' )
    ));

    //Donor Banner
    acf_register_block(array(
      'name'              => 'donorBanner',
      'title'             => __('Donor Banner'),
      'description'       => __('Donor Banner'),
      'render_template'   => 'block/donor-banner.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'donor', 'banner' )
    ));

    //Text Section with Float Image to the Right
    acf_register_block(array(
      'name'              => 'textAndFloatImage',
      'title'             => __('Text Section with Float Image to the Right'),
      'description'       => __('Text Section with Float Image to the Right'),
      'render_template'   => 'block/text-section-float-image.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'text', 'section', 'float', 'image', 'right' )
    ));

    //Copy and button
    acf_register_block(array(
      'name'              => 'copyAndButton',
      'title'             => __('Copy and button'),
      'description'       => __('Copy and button'),
      'render_template'   => 'block/copy-and-button.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'copy', 'button' )
    ));

    //Copy - Image and Dialog Box
    acf_register_block(array(
      'name'              => 'copyImageAndDialogBox',
      'title'             => __('Copy - Image and Dialog Box'),
      'description'       => __('Copy - Image and Dialog Box'),
      'render_template'   => 'block/copy-image-dialog-box.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'copy', 'image', 'dialog' )
    ));

    //Icon and Copy Repeater with Button
    acf_register_block(array(
      'name'              => 'iconAndCopyRepeaterButton',
      'title'             => __('Icon and Copy Repeater with Button'),
      'description'       => __('Icon and Copy Repeater with Button'),
      'render_template'   => 'block/icon-text-repeater-with-button.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'icon', 'copy', 'repeater', 'button' )
    ));

    //Rounded Full width Copy and Image
    acf_register_block(array(
      'name'              => 'roundedFullWCopyAndImage',
      'title'             => __('Rounded Full width Copy and Image'),
      'description'       => __('Rounded Full width Copy and Image'),
      'render_template'   => 'block/rounded-full-width-copy-image.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'rounded', 'full', 'copy', 'image' )
    ));

    //Horizontal Image Copy and Button
    acf_register_block(array(
      'name'              => 'horizontalImageCopyButton',
      'title'             => __('Horizontal Image Copy and Button'),
      'description'       => __('Horizontal Image Copy and Button'),
      'render_template'   => 'block/horizontal-image-copy-button.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'horizontal', 'image', 'copy', 'button' )
    ));

    //Contact Us
    acf_register_block(array(
      'name'              => 'contactUs',
      'title'             => __('Contact Us'),
      'description'       => __('Contact Us'),
      'render_template'   => 'block/contact-us.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'contact', 'us' )
    ));

    //Donate Button
    acf_register_block(array(
      'name'              => 'donateButton',
      'title'             => __('Donate Button'),
      'description'       => __('Donate Button'),
      'render_template'   => 'block/donate-button.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'donate', 'button' )
    ));

    //Form
    acf_register_block(array(
      'name'              => 'gfForm',
      'title'             => __('Form'),
      'description'       => __('Form'),
      'render_template'   => 'block/form.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'form', 'gravity', 'forms' )
    ));

    //Copy with Button and Slider
    acf_register_block(array(
      'name'              => 'copyButtonAndSlider',
      'title'             => __('Copy Button and Slider'),
      'description'       => __('Copy Button and Slider'),
      'render_template'   => 'block/copy-button-slider.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'copy', 'button', 'slider' )
    ));

    //Left Copy With Button and Right Image
    acf_register_block(array(
      'name'              => 'leftCopyWithButtonAndRightImage',
      'title'             => __('Left Copy With Button and Right Image'),
      'description'       => __('Left Copy With Button and Right Image'),
      'render_template'   => 'block/left-copy-with-button-and-right-image.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'left', 'copy', 'button', 'right', 'image' )
    ));

    //Shape Copy with Image and Button
    acf_register_block(array(
      'name'              => 'shapeCopyImageButton',
      'title'             => __('Shape Copy with Image and Button'),
      'description'       => __('Shape Copy with Image and Button'),
      'render_template'   => 'block/shape-copy-with-image-and-button.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'shape', 'copy', 'image', 'button')
    ));

    //Readers Slider
    acf_register_block(array(
      'name'              => 'readersSlider',
      'title'             => __('Readers Slider'),
      'description'       => __('Readers Slider'),
      'render_template'   => 'block/readers-slider.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'readers', 'slider')
    ));

    //Shape with Image and Copy Section
    acf_register_block(array(
      'name'              => 'shapeWithImage',
      'title'             => __('Shape with Image and Copy Section'),
      'description'       => __('Shape with Image and Copy Section'),
      'render_template'   => 'block/shape-with-image-and-copy.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'shape', 'image', 'copy')
    ));

    //Virtuous Script
    acf_register_block(array(
      'name'              => 'virtuousScript',
      'title'             => __('Virtuous Script'),
      'description'       => __('Virtuous Script'),
      'render_template'   => 'block/virtuous-script.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'mode'              => 'preview',
      'keywords'          => array( 'virtuous', 'script', 'copy')
    ));

	acf_register_block(array(
		'name'              => 'faqs',
		'title'             => __('Frequently Asked Questions'),
		'description'       => __('Frequently Asked Questions'),
		'render_template'   => 'block/frequently-asked-questions.php',
		'category'          => 'formatting',
		'icon'              => 'admin-comments',
		'mode'              => 'edit',
		'keywords'          => array( 'faqs', 'questions')
	));

	acf_register_block(array(
		'name'              => 'our-work',
		'title'             => __('Our Work'),
		'description'       => __('Our Work'),
		'render_template'   => 'block/our-work.php',
		'category'          => 'formatting',
		'icon'              => 'admin-comments',
		'mode'              => 'edit',
		'keywords'          => array( 'work', 'development')
	));

  }
}

// Remove Spinner
add_filter( 'gform_ajax_spinner_url_22', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}
add_filter( 'gform_ajax_spinner_url_25', 'spinner_url_25', 10, 2 );
function spinner_url_25( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}
add_filter( 'gform_ajax_spinner_url_26', 'spinner_url_26', 10, 2 );
function spinner_url_26( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}
add_filter( 'gform_ajax_spinner_url_28', 'spinner_url_golf_invite', 10, 2 );
function spinner_url_golf_invite( $image_src, $form ) {
  return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}
add_filter( 'gform_ajax_spinner_url_30', 'spinner_url_training_interest', 10, 2 );
function spinner_url_training_interest( $image_src, $form ) {
  return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}

/**
 * ADD FAVICON
 */
function add_favicon() {
    echo '<link href="'.get_template_directory_uri().'/assets/img/favicon.png" rel="icon" type="image/png">';
    echo '<link href="'.get_template_directory_uri().'/assets/img/apple-touch-icon.png" rel="apple-touch-icon">';
}
add_action('wp_head', 'add_favicon');

/**
 * ALT TAGS AUTOMATICS WHEN UPLOAD IMAGES
 */
$file = TEMPLATEPATH."/inc/add-meta-image-upload.php";
if(file_exists($file)){
    require_once($file);
}

/**
 * CUSTOM EXCERPT
*/
$file = TEMPLATEPATH."/inc/custom-excerpt.php";
if(file_exists($file)){
    require_once($file);
}

/*function set_new_trim_length( $excerpt_length ) {
    return 10;
}
add_filter( 'excerpt_length', 'set_new_trim_length' );*/

/**
 * CUSTOM POST TYPE
 */
$file = TEMPLATEPATH."/inc/post-type-resources.php";
if(file_exists($file)){
    require_once($file);
}

$file = TEMPLATEPATH."/inc/post-type-stories.php";
if(file_exists($file)){
    require_once($file);
}

$file = TEMPLATEPATH."/inc/post-type-team.php";
if(file_exists($file)){
    require_once($file);
}

$file = TEMPLATEPATH."/inc/post-type-event.php";
if(file_exists($file)){
    require_once($file);
}

/**
 * ADD CUSTOM TAXONOMIES
 */
function add_custom_taxonomies() {
  
  register_taxonomy('spot', 'team', array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => _x( 'Spot', 'taxonomy general name' ),
      'singular_name' => _x( 'Spot', 'taxonomy singular name' ),
      // 'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'Spot' ),
      'parent_item' => __( 'Spot' ),
      'parent_item_colon' => __( 'Spot:' ),
      'edit_item' => __( 'Edit Spot' ),
      'update_item' => __( 'Update Spot' ),
      'add_new_item' => __( 'New Spot' ),
      'new_item_name' => __( 'New Spot' ),
      'menu_name' => __( 'Spot' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'spot',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('typeStory', 'stories', array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => _x( 'Type', 'taxonomy general name' ),
      'singular_name' => _x( 'Type', 'taxonomy singular name' ),
      // 'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'Type' ),
      'parent_item' => __( 'Type' ),
      'parent_item_colon' => __( 'Type:' ),
      'edit_item' => __( 'Edit Type' ),
      'update_item' => __( 'Update Type' ),
      'add_new_item' => __( 'New Type' ),
      'new_item_name' => __( 'New Type' ),
      'menu_name' => __( 'Type' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'type-of-story',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('area', 'stories', array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => _x( 'Area', 'taxonomy general name' ),
      'singular_name' => _x( 'Area', 'taxonomy singular name' ),
      // 'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'Area' ),
      'parent_item' => __( 'Area' ),
      'parent_item_colon' => __( 'Area:' ),
      'edit_item' => __( 'Edit Area' ),
      'update_item' => __( 'Update Area' ),
      'add_new_item' => __( 'New Area' ),
      'new_item_name' => __( 'New Area' ),
      'menu_name' => __( 'Area' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'area',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('typeEvent', 'events', array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => _x( 'Event Type', 'taxonomy general name' ),
      'singular_name' => _x( 'Event Type', 'taxonomy singular name' ),
      // 'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'Event Type' ),
      'parent_item' => __( 'Event Type' ),
      'parent_item_colon' => __( 'Event Type:' ),
      'edit_item' => __( 'Edit Event Type' ),
      'update_item' => __( 'Update Event Type' ),
      'add_new_item' => __( 'New Event Type' ),
      'new_item_name' => __( 'New Event Type' ),
      'menu_name' => __( 'Event Type' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'type-of-event',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

// Resources Types
    function resources_types() {

        $resources_types = array(
            array(
                'slug'         => 'resources-types',
                'single_name'  => 'Type',
                'plural_name'  => 'Types',
                'post_type'    => 'resources',
                'hierarchical' => true
            )
        );

        foreach( $resources_types as $taxonomy ) {

            $labels = array(
                'name' => $taxonomy['plural_name'],
                'singular_name' => $taxonomy['single_name'],
                'search_items' =>  'Search ' . $taxonomy['plural_name'],
                'all_items' => 'All ' . $taxonomy['plural_name'],
                'parent_item' => 'Parent ' . $taxonomy['single_name'],
                'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
                'edit_item' => 'Edit ' . $taxonomy['single_name'],
                'update_item' => 'Update ' . $taxonomy['single_name'],
                'add_new_item' => 'Add New ' . $taxonomy['single_name'],
                'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
                'menu_name' => $taxonomy['plural_name']
            );

            $rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug']);
            $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : false;
        
            register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
                'hierarchical' => $hierarchical,
                'labels' => $labels,
                'show_admin_column' => true,
                'show_in_rest' => true,
                'meta_box_cb' => 'post_categories_meta_box',
                'rewrite' => $rewrite,
                'query_var' => true,
            ));
        }

    }
    add_action( 'init', 'resources_types' );

/**
 * ARCHIVE RESOURCES
 */
function ajax_get_articles() {
  locate_template('/filter-articles.php', TRUE, FALSE);
  die();
}
add_action('wp_ajax_nopriv_get_articles','ajax_get_articles');
add_action('wp_ajax_get_articles','ajax_get_articles');

function ajax_get_events() {
  locate_template('/get-events.php', TRUE, FALSE);
  die();
}
add_action('wp_ajax_nopriv_get_events','ajax_get_events');
add_action('wp_ajax_get_events','ajax_get_events');

function ajax_get_biography() {
  locate_template('/get-biography.php', TRUE, FALSE);
  die();
}
add_action('wp_ajax_nopriv_get_biography','ajax_get_biography');
add_action('wp_ajax_get_biography','ajax_get_biography');


/**
 * LOAD CSS AND JS
 * wp_enqueue_style( $handle, $src, $dependencies, $version, $media );
 * wp_enqueue_script( $handle, $src, $dependencies, $version, $in_footer );
 */
function add_theme_scripts() {

  wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/app.css', array(), 'ff463040b2fe976d6bc5ec79689f572b', 'all');

  wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/app.min.js', array ( 'jquery' ), '2dbccda742bd7053332b38edecaf1e3e', true);
  wp_enqueue_style( 'google-sans', 'https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
  wp_enqueue_style( 'google-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
  wp_enqueue_style( 'google-roboto-condensed', 'https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
  wp_enqueue_style( 'google-bebas', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
  wp_localize_script('custom-js', 'wp_ajax_custom', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/**
 * REMOVE WP EMOJI
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * DISABLE EMBEDS
 */

function disable_embeds_code_init() {

 // Remove the REST API endpoint.
 remove_action( 'rest_api_init', 'wp_oembed_register_route' );

 // Turn off oEmbed auto discovery.
 add_filter( 'embed_oembed_discover', '__return_false' );

 // Don't filter oEmbed results.
 remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

 // Remove oEmbed discovery links.
 remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

 // Remove oEmbed-specific JavaScript from the front-end and back-end.
 remove_action( 'wp_head', 'wp_oembed_add_host_js' );
 add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );

 // Remove all embeds rewrite rules.
 add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

 // Remove filter of the oEmbed result before any HTTP requests are made.
 remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
}

add_action( 'init', 'disable_embeds_code_init', 9999 );

function disable_embeds_tiny_mce_plugin($plugins) {
    return array_diff($plugins, array('wpembed'));
}

function disable_embeds_rewrites($rules) {
    foreach($rules as $rule => $rewrite) {
        if(false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}

/**
 * PAGINATION
 */
function pagination($prev = 'Prev', $next = 'Next') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __($prev),
        'next_text' => __($next),
        'type' => 'plain'
    );

    echo paginate_links( $pagination );
};

/*
* WOOCOMMERCE
*/
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function remove_hooks(){
   remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
   remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

}
add_action( 'woocommerce_before_shop_loop', 'remove_hooks', 1 );

add_filter('woocommerce_order_item_name', 'woo_order_item_with_link', 10, 3);
function woo_order_item_with_link( $item_name, $item, $bool ) {
    $url = get_permalink( $item['product_id'] ) ;
    return '<a href="'. $url .'">'. $item_name .'</a>';
}

/*
* REMOVE SINGLE DESCRIPTION
*/
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;

}

// Add the wrap to products
add_action( 'woocommerce_before_shop_loop_item_title', 'itemWrapInit', 5, 2);
function itemWrapInit() {
    echo '<div class="product-image-wrap blue-gradient flex-container flex-dir-row align-center-middle">';
}

add_action( 'woocommerce_before_shop_loop_item_title', 'itemWrapEnd', 12, 2);
function itemWrapEnd() {
    echo "</div>";
}


add_action( 'woocommerce_after_shop_loop_item', 'my_custom_quantity_field', 6 );
function my_custom_quantity_field() {
  global $product;

  if ( ! $product->is_sold_individually() )
    woocommerce_quantity_input( array(
      'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
      'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
    ) );
}

/**
 * ENSURE CART CONTENTS UPDATE WHEN PRODUCTS ARE ADDED TO THE CART VIA AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?>
    <a class="cart-contents button light-blue" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
    VIEW CART
    <?php
    if ( $count > 0 ) :
    ?>
        <span class="woocommerce__cart-count"><?php echo esc_html( $count ); ?></span>
    <?php
    endif;
    ?>
    </a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

add_action( 'after_setup_theme', function() {
    add_theme_support( 'woocommerce' );
} );

/*
* REMOVE SIDEBAR PRODUCT PAGE
*/
add_action( 'wp', 'remove_sidebar_product_pages' );

function remove_sidebar_product_pages() {
  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}

/**
 * ARCHIVE NAVIGATION
 *
 * @author Bill Erickson
 * @see https://www.billerickson.net/custom-pagination-links/
 *
 */
function ea_archive_navigation() {

    $settings = array(
        'count' => 6,
        'prev_text' => 'PREV',
        'next_text' => 'NEXT'
    );

    global $wp_query;
    $current = max( 1, get_query_var( 'paged' ) );
    $total = $wp_query->max_num_pages;
    $links = array();

    // Offset for next link
    if( $current < $total )
        $settings['count']--;

    // Previous
    if( $current > 1 ) {
        $settings['count']--;
        $links[] = ea_archive_navigation_link( $current - 1, 'prev', $settings['prev_text'] );
    }

    // Current
    $links[] = ea_archive_navigation_link( $current, 'current' );

    // Next Pages
    for( $i = 1; $i < $settings['count']; $i++ ) {
        $page = $current + $i;
        if( $page <= $total ) {
            $links[] = ea_archive_navigation_link( $page );
        }
    }

    // Next
    if( $current < $total ) {
        $links[] = ea_archive_navigation_link( $current + 1, 'next', $settings['next_text'] );
    }

    return '<nav class="navigation posts-navigation" role="navigation"><div class="nav-links">'.join( '', $links ).'</div></nav>';
}
add_action( 'tha_content_while_after', 'ea_archive_navigation' );

/**
 * ARCHIVE NAVIGATION LINK
 *
 * @author Bill Erickson
 * @see https://www.billerickson.net/custom-pagination-links/
 *
 * @param int $page
 * @param string $class
 * @param string $label
 * @return string $link
 */
function ea_archive_navigation_link( $page = false, $class = '', $label = '' ) {

    if( ! $page )
        return;

    $classes = array( 'page-numbers' );
    if( !empty( $class ) )
        $classes[] = $class;
    $classes = array_map( 'sanitize_html_class', $classes );

    $label = $label ? $label : $page;
    $link = esc_url_raw( get_pagenum_link( $page ) );

    return '<a class="' . join ( ' ', $classes ) . '" href="' . $link . '" data-page="' . $page . '">' . $label . '</a>';

}

/*
* EVENT ARCHIVE
*/
function my_pre_get_posts( $query ) {
  /*if( is_admin() ) {
    return $query;
  }*/

  if( ! is_admin() && $query->is_main_query() && isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'events' ) {

    $query->set('post_status', 'publish');
    $query->set('orderby', 'publish_date');
    $query->set('order', 'DESC');
    $query->set( 'posts_per_page', '4' );
  }

  if( ! is_admin() && $query->is_main_query() && isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'stories' ) {
    $query->set( 'posts_per_page', '8' );
  }

  return $query;
}

add_action('pre_get_posts', 'my_pre_get_posts');

/*
* VIRTUOUS NOTIFICATION ERROR
*/
$file = TEMPLATEPATH."/inc/virtuous-notification-error.php";
if(file_exists($file)){
    require_once($file);
}

/*
* VIRTUOUS INTEGRATION
*/
add_action( 'gform_after_submission_1', 'after_submission_subscribe', 10, 2 );
function after_submission_subscribe( $entry, $form ) {
  $first_name   = (rgar($entry,'3.3')) ? rgar($entry,'3.3') : '';
  $last_name    = (rgar($entry,'3.6')) ?  rgar($entry,'3.6') : '';
  $email        = (rgar($entry,'1')) ?  rgar($entry,'1') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->addTag(V_TAG_E_MAIL_SIGNUP);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);
  $virtuous->contact->addTag(V_TAG_2_MINUTE_MULTIPLIER);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_2', 'after_submission_contact_us', 10, 2 );
function after_submission_contact_us( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  // This contacts are not linked to Virtuous tags
  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_3', 'after_submission_quiz', 10, 2 );
function after_submission_quiz( $entry, $form ) {
  $first_name   = (rgar($entry,'4.3')) ? rgar($entry,'4.3') : '';
  $last_name    = (rgar($entry,'4.6')) ?  rgar($entry,'4.6') : '';
  $email        = (rgar($entry,'5')) ?  rgar($entry,'5') : '';
  $organization = (rgar($entry,'19')) ?  rgar($entry,'19') : '';

  $data = array(
          "firstName"     => $first_name,
          "lastName"      => $last_name,
        );

  $virtuous = new VirtuousAPIController();
  $virtuous->contact = new VirtuousContactVO($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $existContact = $virtuous->findContact($email);

  if(!$existContact) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_QUIZ_SERIES);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_4', 'after_submission_leader', 10, 2 );
function after_submission_leader( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $phone        = (rgar($entry,'2')) ?  rgar($entry,'2') : ''; //required field
  $email        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';
  $organization = (rgar($entry,'5')) ?  rgar($entry,'5') : '';
  $address      = (rgar($entry,'4.1')) ?  rgar($entry,'4.1') : '';
  $city         = (rgar($entry,'4.3')) ?  rgar($entry,'4.3') : '';
  $state        = (rgar($entry,'4.4')) ?  rgar($entry,'4.4') : '';
  $zip          = (rgar($entry,'4.5')) ?  rgar($entry,'4.5') : '';

  $data = array(
          "firstName"     => $first_name,
          "lastName"      => $last_name,
        );

  $virtuous = new VirtuousAPIController();
  $virtuous->contact = new VirtuousContactVO($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);
  $virtuous->contact->address = new VirtuousContactAddressVO([
      'label'     => VirtuousContactAddressVO::LABEL_PRIMARY,
      'address1'  => $address,
      'city'      => $city,
      'state'     => $state,
      'postal'    => $zip
  ]);

  $existContact = $virtuous->findContact($email);

  if(!$existContact) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_LEADER_ASSESSMENT);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_5', 'after_submission_team', 10, 2 );
function after_submission_team( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $address      = (rgar($entry,'5.1')) ?  rgar($entry,'5.1') : '';
  $city         = (rgar($entry,'5.3')) ?  rgar($entry,'5.3') : '';
  $state        = (rgar($entry,'5.4')) ?  rgar($entry,'5.4') : '';
  $zip          = (rgar($entry,'5.5')) ?  rgar($entry,'5.5') : '';

  $data = array(
          "firstName"     => $first_name,
          "lastName"      => $last_name,
        );

  $virtuous = new VirtuousAPIController();
  $virtuous->contact = new VirtuousContactVO($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);
  $virtuous->contact->address = new VirtuousContactAddressVO([
      'label'     => VirtuousContactAddressVO::LABEL_PRIMARY,
      'address1'  => $address,
      'city'      => $city,
      'state'     => $state,
      'postal'    => $zip
  ]);

  $virtuous->contact->addTag(V_TAG_MEMBER_ASSESSMENT);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_6', 'after_submission_scholarship', 10, 2 );
function after_submission_scholarship( $entry, $form ) {
  $first_name   = (rgar($entry,'2.3')) ? rgar($entry,'2.3') : '';
  $last_name    = (rgar($entry,'2.6')) ?  rgar($entry,'2.6') : '';
  $phone        = (rgar($entry,'5')) ?  rgar($entry,'5') : '';
  $email        = (rgar($entry,'6')) ?  rgar($entry,'6') : '';
  $organization = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
          "firstName"     => $first_name,
          "lastName"      => $last_name,
        );

  $virtuous = new VirtuousAPIController();
  $virtuous->contact = new VirtuousContactVO($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $existContact = $virtuous->findContact($email);

  if(!$existContact) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_SCHOLARSHIP);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_7', 'after_submission_pastor_inquiry', 10, 2 );
function after_submission_pastor_inquiry( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $organization = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $address      = (rgar($entry,'5.1')) ?  rgar($entry,'5.1') : '';
  $city         = (rgar($entry,'5.3')) ?  rgar($entry,'5.3') : '';
  $state        = (rgar($entry,'5.4')) ?  rgar($entry,'5.4') : '';
  $zip          = (rgar($entry,'5.5')) ?  rgar($entry,'5.5') : '';

  $data = array(
          "firstName"     => $first_name,
          "lastName"      => $last_name,
        );

  $virtuous = new VirtuousAPIController();
  $virtuous->contact = new VirtuousContactVO($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);
  $virtuous->contact->address = new VirtuousContactAddressVO([
      'label'     => VirtuousContactAddressVO::LABEL_PRIMARY,
      'address1'  => $address,
      'city'      => $city,
      'state'     => $state,
      'postal'    => $zip
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_PASTOR_CONTACT);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  $response = $virtuous->processContact($contactMatches);
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_8', 'after_submission_leader_inquiry', 10, 2 );
function after_submission_leader_inquiry( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $organization = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $address      = (rgar($entry,'5.1')) ?  rgar($entry,'5.1') : '';
  $city         = (rgar($entry,'5.3')) ?  rgar($entry,'5.3') : '';
  $state        = (rgar($entry,'5.4')) ?  rgar($entry,'5.4') : '';
  $zip          = (rgar($entry,'5.5')) ?  rgar($entry,'5.5') : '';

  $data = array(
          "firstName"     => $first_name,
          "lastName"      => $last_name,
        );

  $virtuous = new VirtuousAPIController();
  $virtuous->contact = new VirtuousContactVO($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);
  $virtuous->contact->address = new VirtuousContactAddressVO([
      'label'     => VirtuousContactAddressVO::LABEL_PRIMARY,
      'address1'  => $address,
      'city'      => $city,
      'state'     => $state,
      'postal'    => $zip
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_DL_CONTACT);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  $response = $virtuous->processContact($contactMatches);
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_9', 'after_submission_download_resources', 10, 2 );
function after_submission_download_resources( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $postId       = (rgar($entry,'4')) ?  rgar($entry,'4') : '';

  $data = array(
          "firstName"     => $first_name,
          "lastName"      => $last_name,
        );
  $virtuous = new VirtuousAPIController();
  $virtuous->contact = new VirtuousContactVO($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->addTag(V_TAG_GATED_CONTENT);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  $response = $virtuous->processContact($contactMatches);
  vituousNotificationError($response, $entry, $form);

  $args = array(
    'post_type'=> 'resources',
    'p' => $postId
  );

  query_posts( $args );

  if ( have_posts() ) {
    while ( have_posts() ){
      the_post();
      $resource_path = get_field('resource_path');

      if( empty($resource_path) ){
        echo '<p>File is empty</p>';
      } else {
        echo "<p>If your download doesn't begin automatically, you can click <a target='_blank' id='downloadLink' href='{$resource_path}'>here to start the download.</a></p>";
      }

    }
  }
}

add_action( 'gform_after_submission_10', 'after_submission_start_my_training', 10, 2 );
function after_submission_start_my_training( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $virtuous->contact->addTag(V_TAG_TRAINING);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_11', 'after_submission_webinar_atlantic', 10, 2 );
function after_submission_webinar_atlantic( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $organization = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_AD_WEBINAR);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_12', 'after_submission_webinar_atlantic_leads', 10, 2 );
function after_submission_webinar_atlantic_leads( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $organization = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_AD_INCUBATOR_INTEREST);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_13', 'after_submission_testimonial_video', 10, 2 );
function after_submission_testimonial_video( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $organization = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $email        = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $phone        = (rgar($entry,'5')) ?  rgar($entry,'5') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_QUIZ_REQUESTED_CALL);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_14', 'after_submission_schedule_call', 10, 2 );
function after_submission_schedule_call( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $organization = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $email        = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $phone        = (rgar($entry,'5')) ?  rgar($entry,'5') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_QUIZ_REQUESTED_CALL);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_15', 'after_submission_webinar', 10, 2 );
add_action( 'gform_after_submission_17', 'after_submission_webinar', 10, 2 );
function after_submission_webinar( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $organization = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_INC_WEBINAR);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_16', 'after_submission_incubator_interest', 10, 2 );
function after_submission_incubator_interest( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $organization = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
  }

  $virtuous->contact->addTag(V_TAG_INCUBATOR_INTEREST);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_18', 'after_submission_dallas_dinner', 10, 2 );
function after_submission_dallas_dinner( $entry, $form ) {
  $attend       = (rgar($entry,'6')) ? rgar($entry,'6') : '';
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $attend == 'yes' ?
    $virtuous->contact->addTag(V_TAG_DALLAS_DINNER_ATTENDING) :
    $virtuous->contact->addTag(V_TAG_DALLAS_DINNER_NOT_ATTENDING);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

//resources/startnew-summit-moving-to-fall-2020/ TAG
add_action( 'gform_after_submission_19', 'after_submission_start_new_summit_v1', 10, 2 );
function after_submission_start_new_summit_v1( $entry, $form ) {
  $email        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';
  $first_name   = (rgar($entry,'2.3')) ? rgar($entry,'2.3') : '';
  $last_name    = (rgar($entry,'2.6')) ?  rgar($entry,'2.6') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $virtuous->contact->addTag(V_TAG_2001_SN_SUMMIT_INTEREST);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_20', 'after_submission_start_new_summit_v2', 10, 2 );
function after_submission_start_new_summit_v2( $entry, $form ) {
  $email        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';
  $first_name   = (rgar($entry,'2.3')) ? rgar($entry,'2.3') : '';
  $last_name    = (rgar($entry,'2.6')) ?  rgar($entry,'2.6') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $virtuous->contact->addTag(V_TAG_2001_SN_SUMMIT_INTEREST);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

//
add_action( 'gform_after_submission_21', 'after_submission_best_practices_conference_session', 10, 2 );
function after_submission_best_practices_conference_session( $entry, $form ) {

  $first_name   = (rgar($entry,'1')) ? rgar($entry,'1') : '';
  $last_name    = (rgar($entry,'2')) ? rgar($entry,'2') : '';
  $email        = (rgar($entry,'3')) ? rgar($entry,'3') : '';
  $organization = (rgar($entry,'4')) ? rgar($entry,'4') : '';
  $congregation_averga_number = (rgar($entry,'5')) ? rgar($entry,'5') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_CONGREGATION_AVERAGE_NUMBER, $congregation_averga_number);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_CONGREGATION_AVERAGE_NUMBER, $congregation_averga_number);
  }

  $virtuous->contact->addTag(V_TAG_BPM);
  $virtuous->contact->addTag(V_TAG_WARM_LEAD);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_22', 'after_submission_top_five_lp', 10, 2 );
function after_submission_top_five_lp( $entry, $form ) {

  $first_name   = (rgar($entry,'3.3')) ? rgar($entry,'3.3') : '';
  $last_name    = (rgar($entry,'3.6')) ?  rgar($entry,'3.6') : '';
  $email        = (rgar($entry,'1')) ?  rgar($entry,'1') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_5_LP);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_23', 'after_submission_ebook', 10, 2 );
function after_submission_ebook( $entry, $form ) {
  $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);
  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
  ]);

  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);
  $virtuous->contact->addTag(V_TAG_GOOGLE_EMAIL_ACQUISITION);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}


add_action( 'gform_after_submission_24', 'after_submission_top_five_resources', 10, 2 );
function after_submission_top_five_resources( $entry, $form ) {

  $first_name   = (rgar($entry,'3.3')) ? rgar($entry,'3.3') : '';
  $last_name    = (rgar($entry,'3.6')) ?  rgar($entry,'3.6') : '';
  $email        = (rgar($entry,'1')) ?  rgar($entry,'1') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);
  $virtuous->contact->addTag(V_TAG_2003_EMAILS_PLEASE);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_25', 'after_submission_2020_webinar', 10, 2 );
function after_submission_2020_webinar( $entry, $form ) {

  $first_name   = (rgar($entry,'4')) ? rgar($entry,'4') : '';
  $last_name    = (rgar($entry,'5')) ?  rgar($entry,'5') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $virtuous->contact->addTag(V_TAG_EVENTS);
  $virtuous->contact->addTag(V_TAG_BILLS_TOP_FIVE);
  $virtuous->contact->addTag(V_TAG_MINISTRY_UPDATES);
  $virtuous->contact->addTag(V_TAG_2003_EMAILS_PLEASE);
  $virtuous->contact->addTag(V_TAG_FUNDRAISING_COMMUNICATIONS);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_26', 'after_submission_get_updates', 10, 2 );
function after_submission_get_updates( $entry, $form ) {

  $first_name   = (rgar($entry,'1')) ? rgar($entry,'1') : '';
  $last_name    = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $email        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';
  $phone_number = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $congregation = (rgar($entry,'5')) ?  rgar($entry,'5') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
    'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
    'value'     => $phone_number,
    'isOptedIn' => true
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $congregation);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $congregation);
  }

  $virtuous->contact->addTag(V_TAG_2021_WEBINAR_REGISTRANTS_PASTORS);
  $virtuous->contact->addTag(V_TAG_210203WEBINAR_NE_PASTORS);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);
}

add_action( 'gform_after_submission_29', 'after_submission_survey', 10, 2 );
function after_submission_survey( $entry, $form ) {
  $first_name   = (rgar($entry,'4.3')) ? rgar($entry,'4.3') : '';
  $last_name    = (rgar($entry,'4.6')) ?  rgar($entry,'4.6') : '';
  $email        = (rgar($entry,'5')) ?  rgar($entry,'5') : '';
  $question_2_survey = (rgar($entry,'6')) ?  rgar($entry,'6') : '';
  $question_3a_survey        = (rgar($entry,'7.1')) ?  rgar($entry,'7.1') : '';
  $question_3b_survey        = (rgar($entry,'7.2')) ?  rgar($entry,'7.2') : '';
  $question_3c_survey        = (rgar($entry,'7.3')) ?  rgar($entry,'7.3') : '';
  $question_3d_survey        = (rgar($entry,'7.4')) ?  rgar($entry,'7.4') : '';
  $question_3e_survey        = (rgar($entry,'7.5')) ?  rgar($entry,'7.5') : '';
  $question_3f_survey        = (rgar($entry,'7.6')) ?  rgar($entry,'7.6') : '';
  $question_4_survey        = (rgar($entry,'8')) ?  rgar($entry,'8') : '';
  $question_4b_survey        = (rgar($entry,'9')) ?  rgar($entry,'9') : '';

  $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
  ]);

  $contactMatches = $virtuous->findContact($email);

  $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYSTARTED);

  $question2 = $_POST['input_6'];
  if ($question2 == 'gquiz6ccdb7612') {
    $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYRESONATE);
    $question2 = 'Yes';
  } else {
     $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYNOTRESONATE);
     $question2 = 'No';
  }

  if ($question_3a_survey == 'gquiz72442ad22') {
        $question3a = 'the Sacred Starter';
        if(!$contactMatches) {
          $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_2a_SURVEY, $question3a);
        } else {
          $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_2a_SURVEY, $question3a);
        }
  }

  if ($question_3b_survey == 'gquiz7cb7b396a') {
        $question3b = 'The Jesus Heart';
        if(!$contactMatches) {
          $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_2b_SURVEY, $question3b);
        } else {
          $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_2b_SURVEY, $question3b);
        }
  }

  if ($question_3c_survey == 'gquiz7d49790dd') {
        $question3c = 'Who';
        if(!$contactMatches) {
          $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_2c_SURVEY, $question3c);
        } else {
          $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_2c_SURVEY, $question3c);
        }
  }

  if ($question_3d_survey == 'gquiz72f4afd82') {
        $question3d = 'Successful Design';
        if(!$contactMatches) {
          $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_2d_SURVEY, $question3d);
        } else {
          $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_2d_SURVEY, $question3d);
        }
  }

  if ($question_3e_survey == 'gquiz7b974aae1') {
        $question3e = 'Community Awareness';
        if(!$contactMatches) {
          $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_2e_SURVEY, $question3e);
        } else {
          $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_2e_SURVEY, $question3e);
        }
  }

  if ($question_3f_survey == 'gquiz7b9acb810') {
        $question3f = 'Funding the Ministry';
        if(!$contactMatches) {
          $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_2f_SURVEY, $question3f);
        } else {
          $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_2f_SURVEY, $question3f);
        }
  }

  $question4 = $_POST['input_8'];
  if ($question4 == 'gquiz89274095a') {
    $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYINTERESTED);
    $question4 = 'Yes';
  } else {
     $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYNOTINTERESTED);
     $question4 = 'No';
  }


  if( isset($_POST['input_9'])){
      $question4b = $_POST['input_9'];
    if (isset($question4b) && $question4b == 'gquiz996e029a3') {
      $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYLESSTHAN100);
      $question4b = 'Less than 100';
      if(!$contactMatches) {
        $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_3b_SURVEY, $question4b);
      } else {
        $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_3b_SURVEY, $question4b);
      }
    } elseif(isset($question4b) && $question4b == 'gquiz912f1c2b0'){
       $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYGREATERTHAN100);
       $question4b = 'More than 100';
       if(!$contactMatches) {
        $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_3b_SURVEY, $question4b);
      } else {
        $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_3b_SURVEY, $question4b);
      }
    }
    elseif(isset($question4b) && $question4b == 'gquiz959e2ae0a'){
       $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYNOPAY);
       $question4b = 'No pay';
       if(!$contactMatches) {
        $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_3b_SURVEY, $question4b);
      } else {
        $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_3b_SURVEY, $question4b);
      }
    }
  }

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_1_SURVEY, $question2);
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUESTION_3_SURVEY, $question4);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_1_SURVEY, $question2);
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUESTION_3_SURVEY, $question4);
  }

  $virtuous->contact->addTag(V_TAG_2006_PILOTSURVEYFINISHED);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_31', 'after_submission_minute_multiplier', 10, 2 );
function after_submission_minute_multiplier( $entry, $form ) {

    $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
    $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
    $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
    $phone        = (rgar($entry,'3')) ?  rgar($entry,'3') : ''; //required field

    $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
    );

    $virtuous = new VirtuousAPIController ();
    $virtuous->contact = new VirtuousContactVO ($data);
    $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
      'value'     => $email,
      'isOptedIn' => true,
      'isPrimary' => true,
    ]);

    $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
      'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
      'value'     => $phone,
      'isOptedIn' => true
    ]);

    $existContact = $virtuous->findContact($email);

    if(!$existContact) {
        $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
    } else {
        $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $organization);
    }

    $virtuous->contact->addTag(V_TAG_2_MINUTE_MULTIPLIER);

    $response = $virtuous->processContact();
    vituousNotificationError($response, $entry, $form);
}

// This code belongs to the Try Access Form
add_action( 'gform_after_submission_32', 'after_submission_try_access', 10, 2 );
function after_submission_try_access( $entry, $form ) {

      $first_name   = (rgar($entry,'1.3')) ? rgar($entry,'1.3') : '';
      $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
      $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';

      $data = array(
          "firstName"   => $first_name,
          "lastName"    => $last_name
        );

      $virtuous = new VirtuousAPIController();
      $virtuous->contact = new VirtuousContactVO($data);
      $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
          'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
          'value'     => $email,
          'isOptedIn' => true,
          'isPrimary' => true,
      ]);

      $virtuous->contact->addTag(V_TAG_2101_STARTNEWACCESSLEADGENLP);

      $response = $virtuous->processContact();
}

// This code belongs to the Gloria Dei Page
add_action( 'gform_after_submission_33', 'after_submission_gloria_dei', 10, 2 );
function after_submission_gloria_dei( $entry, $form ) {

  $first_name   = (rgar($entry,'1')) ?  rgar($entry,'1') : '';
  $last_name    = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $email        = (rgar($entry,'4')) ?  rgar($entry,'4') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
    'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
    'value'     => $email,
    'isOptedIn' => true,
    'isPrimary' => true,
  ]);

  $contactMatches = $virtuous->findContact($email);

  $virtuous->contact->addTag(V_TAG_2102_GLORIA_DEI_EVENT);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

// This code belongs to the Gloria Dei Page
add_action( 'gform_after_submission_34', 'after_submission_free_strategy', 10, 2 );
function after_submission_free_strategy( $entry, $form ) {

  $first_name   = (rgar($entry,'1.3')) ?  rgar($entry,'1.3') : '';
  $last_name    = (rgar($entry,'1.6')) ?  rgar($entry,'1.6') : '';
  $email        = (rgar($entry,'2')) ?  rgar($entry,'2') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
    'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
    'value'     => $email,
    'isOptedIn' => true,
    'isPrimary' => true,
  ]);

  $contactMatches = $virtuous->findContact($email);

  $virtuous->contact->addTag(V_TAG_LEAD_STRATEGY_SESSION);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

// Book a Call
add_action( 'gform_after_submission_37', 'after_submission_book_a_call', 10, 2 );
function after_submission_book_a_call( $entry, $form ) {

  $first_name   = (rgar($entry,'1')) ?  rgar($entry,'1') : '';
  $last_name    = (rgar($entry,'3')) ?  rgar($entry,'3') : '';
  $email        = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $congregation = (rgar($entry,'5')) ?  rgar($entry,'5') : '';
  $occupation   = (rgar($entry,'6')) ?  rgar($entry,'6') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
    'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
    'value'     => $email,
    'isOptedIn' => true,
    'isPrimary' => true,
  ]);

  $contactMatches = $virtuous->findContact($email);

  if(!$contactMatches) {
    $virtuous->contact->createCustomField(V_CUSTOM_FIELD_ORGANIZATION, $congregation);
	  $virtuous->contact->createCustomField(V_CUSTOM_FIELD_OCCUPATION_DESCRIPTION, $occupation);
  } else {
    $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_ORGANIZATION, $congregation);
	  $virtuous->contact->updateCustomField(V_CUSTOM_FIELD_OCCUPATION_DESCRIPTION, $occupation);
  }

  $virtuous->contact->addTag(V_TAG_LEAD_BOOK_A_CALL);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}


/*
* CUSTOM EXCERPT
*/
function get_the_custom_excerpt($length = 260){
  $excerpt = get_the_content();
  $excerpt = strip_tags( $excerpt );
  $excerpt = mb_substr( $excerpt, 0, $length );
  $excerpt = mb_substr( $excerpt, 0, strripos( $excerpt, " " ) );
  $excerpt = rtrim( $excerpt, ",.;:- _!$&#" ).'...';

  return $excerpt;
}


function redirectsCustom(){
  if(! is_admin()){
    $allowed_html = "";
    $allowed_protocols = "";
    $redirects_rawed = get_field('redirects_field', 'option');
    $redirects_raw = wp_kses($redirects_rawed,$allowed_html,$allowed_protocols);
    $redirect_lines = explode( "\n", $redirects_raw );
    $redirects = array();
    foreach ( $redirect_lines as $redirect_line ) {
      $redirect_line = preg_replace( '/\s+/', ' ', trim( $redirect_line ) );

      if ( substr( $redirect_line, 0, 1 ) == '#' ) {
        continue;
      }

      $redirect_line = explode( " ", $redirect_line );

      if ( count( $redirect_line ) != 2 ) {
        continue;
      }
      $redirects[$redirect_line[0]] = $redirect_line[1];
    }
    $request_url = esc_url($_SERVER["REQUEST_URI"]);
    if ( array_key_exists( $request_url, $redirects ) ) {
      wp_redirect( $redirects[$request_url], 301 );
      exit;
    }
  }


}

add_action( 'init', 'redirectsCustom' );

/*
* Remove Search box
*/
function wpb_filter_query( $query, $error = true ) {
  if ( is_search() ) {
    $query->is_search = false;
    $query->query_vars[s] = false;
    $query->query[s] = false;
    if ( $error == true ) {
      $query->is_404 = true;
    }
  }
}
//add_action( 'parse_query', 'wpb_filter_query' );
//add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

function remove_search_widget() {
  unregister_widget('WP_Widget_Search');
}
//add_action( 'widgets_init', 'remove_search_widget' );

/** ADD VIDEO TO DONATION POST TYPE */
add_action('wp_footer', 'videoFFZ');
function videoFFZ(){
$classes = get_body_class();

  if ( is_singular( 'donation' ) != (in_array('postid-25381',$classes)) ) {
     echo '<div class="reveal" id="videoModal" data-reveal><div class="responsive-embed"><div id="player" data-id="332696516"></div></div><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></div>';
  }
};



/** ADD VIDEO TO DONATION POST TYPE */
add_action('wp_footer', 'videoFFZJuly');
function videoFFZJuly(){
  $classes = get_body_class();
  if ( is_singular( 'donation' ) && (in_array('postid-25381',$classes)) ) {
     echo '<div class="reveal" id="videoModal" data-reveal><div class="responsive-embed"><div id="player" data-id="411540742"></div></div><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button></div>';
  }
};

add_action('wp_footer', 'addLuckyOrange', 10);
function addLuckyOrange(){
?>
    <!-- LUCKY ORANGE -->
    <script type='text/javascript'>
      window.__lo_site_id = 152539;

      (function() {
        var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
        wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
        })();
    </script>
     <!-- /LUCKY ORANGE -->
<?php
}

add_action('wp_head', 'addGoogleGrant', 10);
function addGoogleGrant(){
?>
  <!-- Global site tag (gtag.js) - Google Ads: 878794234 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-878794234"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-878794234');
  </script>
<?php
}

add_filter( 'body_class', 'add_slug_body_class' );
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}

//Add class
add_filter( 'body_class', 'add_slug_body_donation' );
function add_slug_body_donation( $classes ) {
    global $donation;
	global $post;
    if ( isset( $donation ) ) {
        if( get_field('title_three') == true ) {
            $classes[] = $post->post_type . 'three-headlines-modification' . $post->post_name;
        }
    }
    return $classes;
}

//Check range


function check_range( $start_date, $end_date ){

  $current_date = current_time('d-m-Y', false);

  $end_date = strtotime( $end_date );
  $start_date = strtotime( $start_date );
  $current_date = strtotime( $current_date );

  if( ( $current_date >= $start_date ) && ( $current_date <= $end_date ) ){
    return true;
  }else{
    return false;
  }
}



add_action( 'gform_after_submission_28', 'after_submission_golf_invite', 10, 2 );
function after_submission_golf_invite( $entry, $form ) {

  $first_name   = (rgar($entry,'1')) ?  rgar($entry,'1') : '';
  $last_name    = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $email        = (rgar($entry,'4')) ?  rgar($entry,'4') : '';
  $cell_phone   = (rgar($entry,'5')) ?  rgar($entry,'5') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
    'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
    'value'     => $email,
    'isOptedIn' => true,
    'isPrimary' => true,
  ]);

  $virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
    'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
    'value'     => $cell_phone,
    'isOptedIn' => true
  ]);

  $contactMatches = $virtuous->findContact($email);

  $virtuous->contact->addTag(V_TAG_2020_GOLF_EVENT_ATTENDEE);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

add_action( 'gform_after_submission_30', 'after_submission_training_invitation', 10, 2 );
function after_submission_training_invitation( $entry, $form ) {

  $first_name   = (rgar($entry,'1')) ?  rgar($entry,'1') : '';
  $last_name    = (rgar($entry,'2')) ?  rgar($entry,'2') : '';
  $email        = (rgar($entry,'3')) ?  rgar($entry,'3') : '';

  $data = array(
    "firstName"   => $first_name,
    "lastName"    => $last_name
  );

  $virtuous = new VirtuousAPIController ();
  $virtuous->contact = new VirtuousContactVO ($data);
  $virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
    'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
    'value'     => $email,
    'isOptedIn' => true,
    'isPrimary' => true,
  ]);

  $virtuous->contact->addTag(V_TAG_2020_ONLINE_TRAINING_PLATFORM_interest);

  $response = $virtuous->processContact();
  vituousNotificationError($response, $entry, $form);

}

$ffz_customfields = TEMPLATEPATH."/inc/flexformz-customfields.php";
if(file_exists($ffz_customfields)){
    require_once($ffz_customfields);
}


/*Big Clicks GTM*/
add_action('wp_head', 'add_gtmhead_big_clicks');
function add_gtmhead_big_clicks() { ?>
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KHB2NSG');</script>
    <!-- End Google Tag Manager -->
  <?php
}

add_action('wp_body_open', 'add_gtmbody_big_clicks');
function add_gtmbody_big_clicks() { ?>
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHB2NSG"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <?php
}

/*Thumbnail size*/
add_image_size( 'featured-thumb', 775, 485, true ); // Hard Crop 


add_theme_support( 'responsive-embeds' );


/*Virtuous Responsive Listener Script*/

add_action('wp_footer', 'addVirtuousResponsiveListener', 10);
function addVirtuousResponsiveListener(){
?>
    <script>
    (function (config) { var s = document.createElement('script'); s.src = 'https://cdn.virtuoussoftware.com/tracker/virtuous.tracker.shim.min.js';
    s.type = 'text/javascript'; s.onload = function () { virtuousTrackerShim.init(config); };
    document.getElementsByTagName('script')[0].parentNode.appendChild(s);
    }({
    organizationId: '09cc7a02-e86f-4e8a-9d03-96b9a422fdf4'
    }));
    </script>
<?php
}
