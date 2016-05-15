<?php
// $Id: page.tpl.php,v 1.11.2.1 2009/04/30 00:13:31 goba Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 *
 * Updates:
 * 03/25/2014 - Updated BW Tag links to direct to correct URLS (JD)
 * 03/13/2014 - Added Breadcrumb code after Chrome (MD)
 *            - added legal verbiage from Business Wire afte head (JD)
 * 03/11/2014 - added HTML5SHIV.JS call (Requires JS/HTML5SHIV.JS now in Quash)
 * 03/08/2014 - added BW Tags for NewsHQ and InvestorHQ (MD)
 * 03/04/2014 - added IE9 identity crisis fix after Krispy Kreme issues
 * 03/03/2014 - added comments for client javascript inclusions based on bootstrap requirements
 *            - added optional ie9.css call
 * 
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
<!-- This site contains functionality licensed from Business Wire (www.businesswire.com). Business Wire reserves all rights associated with this site and any of its licensed functionality. -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <?php // IE9 IDENTITY CRISIS FIX ?>

  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  
  <?php 
    // LOCAL DEVELOPMENT
    // Set to FALSE when pushing code for public viewing, TRUE for local development
    $dev = FALSE; 

    // In Mac terminal go to parent SVN folder then use: python -m SimpleHTTPServer 8080
    // Set local IP Server address 
    $local_address = "http://192.168.129.xx:8080/"; 

    // Set local SVN folder 
    $local_svn_client = "svn/example.investorhq.businesswire.com/themes/example_investorhq_businesswire_com_theme/"; 

    $theme_path = $local_address . $local_svn_client;

    if (!$dev) {
      $theme_path = $base_path . $directory . "/"; 
    }
  ?>

  <?php print $external_styles; ?>
  <?php print $styles; ?>

    <?php
/* CLIENT JAVASCRIPT GOES HERE:
# 1) Client jQuery
# 2) Client Bootstrap if used
# 3) Client javascript (combined into one file)
# 4) jQuery no conflict
*/
/* 
  <script src="js/plugins/jquery/jquery-2.1.0.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/plugins/jquery/jquery-2.1.0.min.js"><\/script>')</script>
  <script src="js/plugins/jquery/jquery.mobile.custom.min.js"></script>
  <script src="js/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="js/common/global-nav.js"></script>
  <script src="js/common/global-main.js"></script>  
    <script src="js/common/nav-main.js"></script>
  <script src="js/common/main.js"></script>  
  <script src="js/plugins/selectJS/select.min.js"></script>
  <script src="js/plugins/magnific/jquery.magnific-popup.min.js"></script>
*/
  ?>
  
  <script src="<?php print $base_path . $directory; ?>/client_files/js/plugins/jquery/jquery-2.1.0.min.js"></script>

  <script type="text/javascript"> var logitech = jQuery.noConflict(true);</script>

  <script src="<?php print $base_path . $directory; ?>/client_files/js/common/global-nav.js"></script>



  <?php print $scripts; ?>

  <?php print $external_scripts; ?>

  <?php 
  // LOCAL DEVELOPMENT 
  // The following CSS file uses the path set above for either local or server location. 
  // Change name accordingly.
  ?>
  <!-- <link type="text/css" rel="stylesheet" href="<?php print $theme_path; ?>client_style.css"> -->

  <?php
  if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) {
    print $https_only_external_scripts;
  }
  else {
    print $http_only_external_scripts;
  }
  ?>

  <?php 
  // brightcove - homepage only - html5/flash player with video thumbnails - all js/html is right here
  if(isset($is_front) && $is_front) { print '
<script type="text/javascript" src="https://sadmin.brightcove.com/js/BrightcoveExperiences.js"></script>

<script type="text/javascript" >
$( document ).ready(function() { 

$(".bw-content-top .bw-inner").append(\'<div class="brightcove-html5-flash-player flash-player panel-pane pane-custom"><h2 class="pane-title">Videos</h2><object id="myExperience" class="BrightcoveExperience"><param name="htmlFallback" value="true" /><param name="bgcolor" value="#FFFFFF" /><param name="width" value="798" /><param name="height" value="603" /><param name="playerID" value="3855639364001" /><param name="playerKey" value="AQ~~,AAAAEM4wJzk~,xjrC5NTQpZKVScsDKk1850OsrXyCLz6M" /><param name="isVid" value="true" /><param name="isUI" value="true" /><param name="dynamicStreaming" value="true" /><param name="secureConnections" value="true" /><param name="secureHTMLConnections" value="true" /></object></div>\'); 

brightcove.createExperiences();

});
</script>
  '; } ?> 

  <!--[if IE 9]>
    <link type="text/css" rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie9.css">
  <![endif]-->
  <!--[if IE 8]>
    <link type="text/css" rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie8.css">
  <![endif]-->


  <?php 
/* HTML5 SHIV 
#  - fixes for HTML5 templates on IE 
#  - file should be pushed to HQ_BASE folder 3/21/2014
*/
/*  
  <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php print $base_path . $directory; ?>sites/all/themes/custom/hq_base/js/html5shiv.js" ></script>
  <![endif]--> 
*/ 

/* Respond.JS
# - Use for IE8 media query issues
/*  <!--[if IE 8]>
    <script type="text/javascript" src="<?php print $base_path . $directory; ?>/js/respond.min.js"></script>
  <![endif]-->
*/  
  ?>
  <?php print $conditional_overrides; ?>

  <?php print $sharing_head; ?>
  

  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">

  <script type="text/javascript">
    var utag_data={
    site_region:"AMR",
    site_country:"US",
    site_language:"EN",
    page_category_name:"Press",
    page_subcategory_name:"Press",
    page_name:"<?php print $head_title; ?>"
}
  </script>


<script type="text/javascript">(function(a,b,c,d){a='//tags.tiqcdn.com/utag/logitech/main/prod/utag.js';b=document;c='script';d=b.createElement(c);d.src=a;d.type='text/java'+c;d.async=true;a=b.getElementsByTagName(c)[0];a.parentNode.insertBefore(d,a)})();</script>

<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>style.css">
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>logitech_style.css">
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/global-nav.css">
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/bridge.css">
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/logiBase.css">
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/overrides.css">
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/template.css">

<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>hacks.css">



  <div id="bw-wrap">
    <!-- User Navigation -->
    <?php if ($user_nav) : ?>
      <div id="bw-user-nav"><?php print $user_nav; ?></div>
    <?php endif; ?>
    <!-- /Begin opening site chrome -->
      <!-- static header -->
    <section id="header">
    
       <div id="brandBar">
        <span class="navLogo c-wrap"><a class="" href="http://www.logitech.com/en-us/home">
          <img title="Logitech" class="logo" src="<?php print $theme_path; ?>client_files/images/Logitech_Logo.png" alt="Logitech">
          <img title="Logitech" class="logo-mobile" src="<?php print $theme_path; ?>client_files/images/Logitech_Logo.png" alt="Logitech">
        </a></span>
         
        <!-- <div id="userProfile">
        <ul class="userBtns c-wrap">  
          <li>
            <a href="http://buy.logitech.com/store/logib2c/DisplayShoppingCartPage">
              <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</button>
            </a>
          </li> 
          <li id="myAccount">
            <a id="740" href="/en-us/home/my-account">
              <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> My Account</button>
            </a>
          </li> 
          <li class="search">
            <form method="get" action="/en-us/search" onsubmit="return checkform()" class="">
              <fieldset>
                <div class="input-group">
                  <input type="text" name="q" class="form-control lu-s-field" id="globalSearch">
                  <span class="input-group-addon glyphicon glyphicon-search"></span>
                </div>  
                <input class="lu-s-submit collapse" id="globalSubmitt" type="submit" value="">
              </fieldset>
            </form>         
          </li> 
        </ul>   
      </div><!-- end user profile-->
        
       </div><!-- end brandbar -->
       
        <div class="global-nav clearfix">
            <div class="background">
                <div class="primary-bar">&nbsp;</div>
                <div class="secondary-bar">&nbsp;</div>
        <div class="tertiary-bar" style="display: none;">&nbsp;</div>
            </div>
            <div class="navbars c-wrap">
                <div class="primary">
                    <ul class="unstyled primary clearfix">
                            <li><a data-id="nav-1"><div class="divider"><span></span></div><span class="lbl">Computer Accessories</span><div class="arrow"><span></span></div></a></li>
                            <li><a data-id="nav-2"><div class="divider"><span></span></div><span class="lbl">Mobile</span><div class="arrow"><span></span></div></a></li>
                            <li><a data-id="nav-3"><div class="divider"><span></span></div><span class="lbl">Digital Home</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://gaming.logitech.com/en-us/home" data-id="nav-4"><div class="divider"><span></span></div><span class="lbl">Gaming</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://www.ultimateears.com/en-us/" data-id="nav-5"><div class="divider"><span></span></div><span class="lbl">Music</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://www.logitech.com/en-us/for-business" data-id="nav-6" class="no-children"><div class="divider"><span></span></div><span class="lbl">Business</span><div class="arrow"><span></span></div></a></li>
                            <li><a data-id="nav-7"><div class="divider"><span></span></div><span class="lbl">Support</span><div class="arrow"><span></span></div></a></li>
                        </ul>
                </div><!-- end primary level nav -->

                <div class="secondary">
                        <ul class="unstyled nav-1  secondary clearfix">
                            <li><a href="http://www.logitech.com/en-us/mice-pointers" data-id="nav-1-1"><div class="divider"><span></span></div><span class="lbl">Mice</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://www.logitech.com/en-us/keyboards" data-id="nav-1-2"><div class="divider"><span></span></div><span class="lbl">Keyboards</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://www.logitech.com/en-us/webcam-communications" data-id="nav-1-3"><div class="divider"><span></span></div><span class="lbl">Webcams + Headsets</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://www.logitech.com/en-us/speakers-audio" data-id="nav-1-4"><div class="divider"><span></span></div><span class="lbl">Multimedia Speakers</span><div class="arrow"><span></span></div></a></li>
                        </ul>

                        <ul class="unstyled nav-2 secondary clearfix" >
                            <li><a href="http://www.logitech.com/en-us/tablet-accessories" data-id="nav-2-1"><div class="divider"><span></span></div><span class="lbl">Tablet Accessories</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://www.logitech.com/en-us/smartphone/cases#" data-id="nav-2-2"><div class="divider"><span></span></div><span class="lbl">Smart Phone Accessories</span><div class="arrow"><span></span></div></a></li>
                        </ul>

                        <ul class="unstyled nav-3 secondary clearfix" >
                            <li><a href="http://www.logitech.com/en-us/universal-remotes#" data-id="nav-3-1"><div class="divider"><span></span></div><span class="lbl">Remotes</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://www.logitech.com/en-us/video-security-systems/monitoring-services##" data-id="nav-3-2"><div class="divider"><span></span></div><span class="lbl">Video Security</span><div class="arrow"><span></span></div></a></li>
                        </ul>

                        <ul class="unstyled nav-4 secondary clearfix" >
                            <li><a href="http://gaming.logitech.com/en-us" data-id="nav-4-1"><span class="lbl"><img src="<?php print $theme_path; ?>client_files/images/global-nav-images/logitech_g_logo.png"/></span><div class="arrow"><span></span></div></a></li>
                        </ul>

                        <ul class="unstyled nav-5 secondary clearfix" >
                            <li><a href="http://www.ultimateears.com/en-us/" data-id="nav-5-1"><div class="divider"><span></span></div><span class="lbl"><img src="<?php print $theme_path; ?>client_files/images/global-nav-images/ultimate_ears_logo.png"/></span><div class="arrow"><span></span></div></a></li>
                            <!-- <li><a href="" data-id="nav-5-1"><div class="divider"><span></span></div><span class="lbl"><img src="<?php print $theme_path; ?>client_files/images/global-nav-images/logo_lue_china.png"/></span><div class="arrow"><span></span></div></a></li>-->

                        </ul>

                        <ul class="unstyled nav-6 secondary clearfix" >
                                  <li><a href="http://www.logitech.com/en-us/for-business" data-id="nav-6-1"><div class="divider"><span></span></div><span class="lbl"><img src="<?php print $theme_path; ?>client_files/images/global-nav-images/logitech-nav-business.png"/></span><div class="arrow"><span></span></div></a></li>
                        </ul>


                        <ul class="unstyled nav-7 secondary clearfix" >
                            <li><a href="http://support.logitech.com/" data-id="nav-7-1" class="no-children"><div class="divider"><span></span></div><span class="lbl">Support + Downloads</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://forums.logitech.com/" data-id="nav-7-2" class="no-children"><div class="divider"><span></span></div><span class="lbl">Support Community</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://setup.myharmony.com/" data-id="nav-7-3" class="no-children"><div class="divider"><span></span></div><span class="lbl">Harmony Online Setup</span><div class="arrow"><span></span></div></a></li>
                            <li><a href="http://support.logitech.com/en_us/contact" data-id="nav-7-4" class="no-children"><div class="divider"><span></span></div><span class="lbl">Contact Us</span><div class="arrow"><span></span></div></a></li>
                        </ul>

                    </div><!-- end secondary level nav -->

               <!-- <div class="tertiary">

                        <ul class="nav-1-1 tertiary clearfix">
                            <li><a href="http://www.logitech.com/en-us/mice-pointers/mice">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/mice.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Mice</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="http://www.logitech.com/en-us/mice-pointers/trackballs">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/trackball.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Trackballs with a long label</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="http://www.logitech.com/en-us/mice-pointers/touchpads">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/trackpad.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Touchpads</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="http://www.logitech.com/en-us/mice-pointers/presenter">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/presenter.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Presenters</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="http://www.logitech.com/en-us/mice-pointers/for-mac">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/designed_for_mac_mice.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Designed For Mac</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-1-2 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/keyboard.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Keyboard</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/keyboard_mice.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Keyboard + Mouse Combos</span>
                                    </div>
                                </a>
                            </li>
                             <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/designed_for_mac_keyboard.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Designed For Mac</span>
                                    </div> 
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-1-3 tertiary clearfix">
                             <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/alert_inside.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Alert Inside</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/webcam.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Webcams</span>
                                    </div>
                                </a>
                            </li>
                              <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/alert_outside.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Headsets</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-1-4 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/smart_radio.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Smart Radio</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/PC_speakers.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">PC Speakers</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/speaker.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Speaker</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-2-1 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/android_tablet.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Android Tablet</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/ipad.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">iPad</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/tablet_keyboards.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Tablet Keyboards</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-3-1 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/smart_radio.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Smart Radio</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/speaker.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Speaker</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-3-2 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/presenter.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Presenter</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-3-3 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/harmony.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Harmony</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-4-1 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/gaming_mice.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Mice</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/gaming_keyboard.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Keyboards</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/gaming_headset.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Headsets</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/gaming_controller.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Controllers</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-5-1 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/earphone.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Earphone</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/pro_earphone.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Pro Earphone</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/headphone.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Headphone</span>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/headphone.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Headphone</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-5-2 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/pro_earphone.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Pro Earphone</span>
                                    </div>
                                </a>
                            </li>

                        </ul>


                          <ul class="nav-6-1 tertiary clearfix">
                            <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/logitech-nav.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Products</span>
                                    </div>
                                </a>
                            </li>

                              <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/logitech-nav-1.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Unified Communications</span>
                                    </div>
                                </a>
                            </li>

                              <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/logitech-nav-2.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Resources</span>
                                    </div>
                                </a>
                            </li>

                              <li><a href="">
                                    <div class="img">
                                        <img src="<?php print $theme_path; ?>client_files/images/global-nav-images/logitech-nav-3.jpg" alt="">
                                    </div>
                                    <div class="lbl">
                                        <span class="lbl">Download & Support</span>
                                    </div>
                                </a>
                            </li>

                        </ul>



                    </div> --> <!-- end tertiary level nav -->

                <div class="toggle-nav">
                    <a class="expand" href="#" ><span class="glyphicon glyphicon-align-justify"></span></a>
                    <a class="collapse" href="#" ><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>
        </div><!-- end global-nav -->

     </section><!-- end header section -->





    <!-- /End opening site chrome -->

    <!-- BW: breadcrumb --> 
    <?php if ($breadcrumb): ?> 
               <?php print $breadcrumb; ?> 
    <?php endif; ?>
    <!-- BW: End breadcrumb -->


    <?php if ($header): ?>
    <div id="bw-content-header" class="clear-block">



  <section id="content">
    <div class="">  
      <div class="listingImage c-wrap">
        <img src="<?php print $theme_path; ?>client_files/images/pressCenter.jpg" class="img-responsive">
      </div>              
      <section id="headline" class="row">
        <div class="subnav" >         <!--- headline subnav ---> 
          <ul class="nav">  
            <li class="active"><a href="http://news.logitech.com/">Home</a></li>
            <li><a href="http://www.logitech.com/en-us/about/">About Us</a></li>
            <li><a href="https://logitech.newshq.businesswire.com/press_releases#">Press Release</a></li>
            <li><a href="http://www.logitech.com/en-us/pr/library">Multimedia</a></li>
            <li><a href="http://blog.logitech.com/">Blog</a></li>
            <li><a href="http://www.logitech.com/index.cfm/175/482&cl=us,en">Awards</a></li>
            <li><a href="http://ir.logitech.com/?cl=us,en">Investor Relations</a></li>
            <li><a href="http://news.logitech.com/media_contacts">Media Contacts</a></li>
          </ul>   
         </div><!--- end headline subnav ---> 
                   
      </section><!-- end headline --> 
      <section id="content">
  
      <!-- place content for PR page here  -->  
      
      
      <!-- <img src="img/newsContent.jpg" class="img-responsive c-wrap" /> -->
      
      
      <!-- end content for PR page here  -->  
      </section>
    </div>
  </section><!-- end content  --> 



      <?php print $header; ?>
    </div>
    <?php endif; ?>

    <?php if (isset($secondary_links)) { ?>
      <?php print theme('links', $secondary_links, array('class' =>'links', 'id' => 'bw-secondary-links')) ?>
    <?php } ?>

    <?php if ($hero): ?>
      <?php print $hero; ?>
    <?php endif; ?>


    <div id="bw-content" class="clear-block">
      
      <?php if ($left): ?> 
        <div id="bw-sidebar-left" class="bw-sidebar"> 
          <div class="bw-inner"> 
            <?php print $left; ?> 
          </div> 
        </div> <!-- /#bw-sidebar-left-->
      <?php endif; ?>
      
      <div id="bw-content-content">
        
        <div id="bw-content-title">
          <?php if ($title): ?>
            <h1>
              <?php print $title; ?>
            </h1>
          <?php endif; ?>

<!-- Do no strip this code -->          
          <?php if ($tabs): ?>
            <div id="bw-tabs">
              <?php print $tabs; ?>
            </div>
          <?php endif; ?>
          <?php print $messages; ?>
          <?php print $help; ?>
        </div>
        
        <?php print $content ;?>
        
        <?php print $workflow_links; ?>
<!--  END: Do no strip this code -->      

      </div>

      <?php if ($right): ?> 
        <div id="bw-sidebar-right" class="bw-sidebar"> 
          <div class="bw-inner"> 
            <?php print $right; ?> 
          </div> 
        </div> <!-- /#bw-sidebar-right -->
      <?php endif; ?>

    </div> <!-- /#bw-content -->

    <!-- /Begin closing site chrome -->
      
      <?php print $closing_site_chrome; ?>

         <script type="text/javascript">

    $(document).ready(function() {

    $('.rotating-content-pager a').each(function(){

    $(this).html($.trim($(this).html().replace(/[0-9]/,'&nbsp;')))

    });

    });

    </script> 
      
    <!-- /End closing site chrome -->
    
  </div>  <!-- /#bw-wrap -->
  



<div id="bw_tag_wrap" style="width: 960px; margin: 0px auto; text-align: right; clear:both">
    <div id="bw_tag"><a href="http://www.businesswire.com/portal/site/home/online-newsrooms/" target="_blank">Business Wire NewsHQ℠</a></div>
</div>




  <?php print $sharing_body ?>

  <?php print $closure; ?>
</body>
</html>
