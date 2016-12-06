<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*
*
** Name : Fonts
*/
$cuckoo_font = get_option( THEMEPREFIX . "_font_settings" );
$cuckoo_header = get_option( THEMEPREFIX . "_header_footer_settings" );
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
$cuckoo_gallery = get_option( THEMEPREFIX . "_gallery_settings" );

if(empty($cuckoo_style['background-color']) or $cuckoo_style['background-color'] == "#" ) : $backgroundColor=''; else : $backgroundColor = 'background-color:'.$cuckoo_style['background-color'].";"; endif;
$backgroundImage 		= ( isset($cuckoo_style['background-image']) ) ? "background-image:url('".$cuckoo_style['background-image']."');" : '';
$backgroundPosition 	= ( isset($cuckoo_style['background-position']) ) ? 'background-position:'.$cuckoo_style['background-position'].';' : '';
$backgroundAttachment 	= ( isset($cuckoo_style['background-attachment']) ) ? 'background-attachment:'.$cuckoo_style['background-attachment'].';' : '';
$backgroundRepeat	 	= ( isset($cuckoo_style['background-repeat']) ) ? 'background-repeat:'.$cuckoo_style['background-repeat'].';': '';
if( $backgroundColor && !$backgroundImage ) :
	$backgroundImage = 'background-image:none;';
endif;
if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
	$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
endif;
	$style = $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat ;
	
	preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
	$version = (!empty($matches[1])) ? $matches[1] : '' ;
	if($version != '8.0'){
		$opacityHomepage = $cuckoo_header['background_homepage_opacity'] == '100' ? '1' : '0.'.$cuckoo_header['background_homepage_opacity'];
		$opacityLanding = $cuckoo_header['background_landing_opacity'] == '100' ? '1' : '0.'.$cuckoo_header['background_landing_opacity'];
		$opacityLogoHomepage = $cuckoo_header['background_logo_opacity'] == '100' ? '1' : '0.'.$cuckoo_header['background_logo_opacity'];
		$opacityLogoLanding = $cuckoo_header['landing_logo_opacity'] == '100' ? '1' : '0.'.$cuckoo_header['landing_logo_opacity'];
		$opacityDropLanding = $cuckoo_header['dropd_landing_opacity'] == '100' ? '1' : '0.'.$cuckoo_header['dropd_landing_opacity'];
		$opacityDropHomepage = $cuckoo_header['dropd_homepage_opacity'] == '100' ? '1' : '0.'.$cuckoo_header['dropd_homepage_opacity'];
		$opacityWorksThumb = $cuckoo_style['worksThumbHoverColorOpacity'] == '100' ? '1' : '0.'.$cuckoo_style['worksThumbHoverColorOpacity'];
	}else{
		$opacityHomepage = '-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['background_homepage_opacity'].')"; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['background_homepage_opacity'].');';
		$opacityLanding = '-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['background_landing_opacity'].')"; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['background_landing_opacity'].');';
		$opacityLogoHomepage = '-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['background_logo_opacity'].')"; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['background_logo_opacity'].');';
		$opacityLogoLanding = '-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['landing_logo_opacity'].')"; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['landing_logo_opacity'].');';
		$opacityDropLanding = '-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['dropd_landing_opacity'].')"; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_style['dropd_landing_opacity'].');';
		$opacityDropHomepage = '-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_header['dropd_homepage_opacity'].')"; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_style['dropd_homepage_opacity'].');';
		$opacityWorksThumb = '-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_style['worksThumbHoverColorOpacity'].')"; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cuckoo_style['worksThumbHoverColorOpacity'].');';
	}
?>
<?php echo cuckoo_get_all_fonts(); ?>
<style type="text/css">
	<?php if($cuckoo_settings['responsive'] == "Yes"){ ?>
		@media screen and (max-width: 480px) {
			html ,body { overflow-x: hidden;  position:static; }
		}
		@media screen and (max-width: 320px) {
			html ,body { overflow-x: hidden;  position:static; }
		}
		@media screen and (max-width: 240px) {
			html ,body { overflow-x: hidden; position:static; }
		}
	<?php }else{ ?>
		html { min-width: 980px; }
		@media only screen  and (max-width : 1024px) {
		header.main-header { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-1-color'].';'; ?> }
	}
	<?php } ?>

/*======= Underline Links Color =======*/
.post-title .about_post a, .contact-info-block a, #comments a , li.widget-container li a, #calendar_wrap .month_all a,
.item-elements a, .item-elements-post a , #content-main a, .page-content a, .widget-container.widget_text a,
.container-woo-path #breadcrumb a, .cart-accuont a , .pagination-content  a, .summary a, div.product 
.woocommerce_tabs ul.tabs li.active, #content div.product, div.testimonials-company a, .contact-content a,
.woocommerce_tabs ul.tabs li.active, #tab-description a  { <?php echo $color = $cuckoo_style['underline-static'] == '#' ? '' : 'color:'.$cuckoo_style['underline-static'].';'; ?> }
/* hover */
.post-title .about_post a:hover, div.testimonials-company a:hover, .footer-txt-line a:hover, li.widget-container li a:hover,
.contact-info-block a:hover, #comments a:hover , .item-elements a:hover, .contact-content a:hover, #calendar_wrap .month_all a:hover,
.item-elements-post a:hover, #content-main a:hover, .page-content a:hover, .widget-container.widget_text a:hover,
.container-woo-path #breadcrumb a:hover, .cart-accuont a:hover, .pagination-content  a:hover, 
.summary a:hover, #tab-description a:hover  { <?php echo $color = $cuckoo_style['underline-hover'] == '#' ? '' : 'color:'.$cuckoo_style['underline-hover'].'!important;'; ?> }
/* visited */
.post-title .about_post a:visited, .contact-info-block a:visited, div.testimonials-company a:visited, li.widget-container li a:visited, 
#comments a:visited, .item-elements a:visited, .item-elements-post a:visited, #content-main a:visited, .contact-content a:visited,
.page-content a:visited, .container-woo-path #breadcrumb a:visited, .cart-accuont a:visited, .pagination-content a:visited, 
.summary a:visited, #tab-description a:visited, #calendar_wrap .month_all a:visited  { <?php echo $color = $cuckoo_style['underline-visited'] == '#' ? '' : 'color:'.$cuckoo_style['underline-visited'].'!important;'; ?> }

/*======= Others Links hover & visited =======*/
#post-content #content-main h2.search-title a:hover, li.tab-navig.active a, footer nav.footer-nav a:hover, .post-title h3 a:hover, .member-title h3 a:hover, .post-tags-list a.tags_post:hover, h1.search-title a:hover { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'color:'.$cuckoo_style['another-hover'].';'; ?> }
.post-title h3 a:visited, .member-title h3 a:visited, .post-tags-list a.tags_post:visited, h1.search-title a:visited { <?php echo $color = $cuckoo_style['another-visited'] == '#' ? '' : 'color:'.$cuckoo_style['another-visited'].';'; ?> }	
li.tab-navig a:hover, li.tab-navig.active a, div.product .woocommerce_tabs ul.tabs li a:hover, 
#content div.product .woocommerce_tabs ul.tabs li a:hover ,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, 
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a, 
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, 
.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce #content div.product .woocommerce-tabs ul.tabs li a:hover, 
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a:hover { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'color:'.$cuckoo_style['another-hover'].'!important;'; ?> }
.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active:before, 
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active:before, li.tab-navig.active a:after,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active:before { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'background-color:'.$cuckoo_style['another-hover'].';'; ?> }

/*========== Header Background Styles ==========*/
header div.main_header_background { <?php echo $headers = (is_home()) ? 'background-color:'.$cuckoo_header['background_homepage'].'; opacity:'.$opacityHomepage.';' : 'background-color:'.$cuckoo_header['background-landing'].'; opacity:'.$opacityLanding.';' ; ?> }

<?php if(is_home()) : ?>
/*========== Logo Styles ==========*/
#theme_logo .logo_content div.logo_background { <?php echo $color = $cuckoo_header['background-logo_header'] == '#' ? '' : 'background-color:'.$cuckoo_header['background-logo_header'].'!important; opacity:'.$opacityLogoHomepage.';'; ?> }

/*========== Navigations Styles ==========*/
div#header_nav nav.navigation-top ul li a { font-family: '<?php echo $cuckoo_header['menus-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_header['menus-weight'] == null ? '' : 'font-weight:'.$cuckoo_header['menus-weight'].';'; ?><?php echo $style = $cuckoo_header['menus-style'] == null ? '' : 'font-style:'.$cuckoo_header['menus-style'].';'; ?><?php echo $size = $cuckoo_header['menus-size'] == null ? '' : 'font-size:'.$cuckoo_header['menus-size'].'px;'; ?><?php echo $lheight = $cuckoo_header['menus-lheight'] == null ? '' : 'line-height:'.$cuckoo_header['menus-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_header['menus-color'] == null ? '' : 'color:'.$cuckoo_header['menus-color'].';'; ?> }
div#header_nav nav.navigation-top ul li:hover a { font-family: '<?php echo $cuckoo_header['menus-font-hover']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['menus-weight-hover'] == null ? '' : 'font-weight:'.$cuckoo_header['menus-weight-hover'].';'; ?><?php echo $style = $cuckoo_header['menus-style-hover'] == null ? '' : 'font-style:'.$cuckoo_header['menus-style-hover'].';'; ?><?php echo $size = $cuckoo_header['menus-size-hover'] == null ? '' : 'font-size:'.$cuckoo_header['menus-size-hover'].'px;'; ?><?php echo $lheight = $cuckoo_header['menus-lheight-hover'] == null ? '' : 'line-height:'.$cuckoo_header['menus-lheight-hover'].';'; ?><?php echo $color = $cuckoo_header['menus-color-hover'] == null ? '' : 'color:'.$cuckoo_header['menus-color-hover'].';'; ?> }
<?php if($cuckoo_header['display_menu_hover_effect'] == 1): ?>
div#header_nav nav.navigation-top ul li.active-scroll a { font-family: '<?php echo $cuckoo_header['menus-font-hover']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['menus-weight-hover'] == null ? '' : 'font-weight:'.$cuckoo_header['menus-weight-hover'].';'; ?><?php echo $style = $cuckoo_header['menus-style-hover'] == null ? '' : 'font-style:'.$cuckoo_header['menus-style-hover'].';'; ?><?php echo $size = $cuckoo_header['menus-size-hover'] == null ? '' : 'font-size:'.$cuckoo_header['menus-size-hover'].'px;'; ?><?php echo $lheight = $cuckoo_header['menus-lheight-hover'] == null ? '' : 'line-height:'.$cuckoo_header['menus-lheight-hover'].';'; ?><?php echo $color = $cuckoo_header['menus-color-hover'] == null ? '' : 'color:'.$cuckoo_header['menus-color-hover'].';'; ?> }
<?php endif; ?>
div#header_nav nav.navigation-top div.current-nav { <?php echo $color = $cuckoo_header['menus-color-hover'] == '#' ? '' : ' background-color:'.$cuckoo_header['menus-color-hover'].';'; ?> }
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a, 
div#header_nav nav.navigation-top ul#cuckoo-nav-top li:hover ul.sub-menu li a { font-family: '<?php echo $cuckoo_header['menus-dropdown-font']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['menus-dropdown-weight'] == null ? '' : ' font-weight:'.$cuckoo_header['menus-dropdown-weight'].'; '; ?><?php echo $style = $cuckoo_header['menus-dropdown-style'] == null ? '' : 'font-style:'.$cuckoo_header['menus-dropdown-style'].';'; ?><?php echo $size = $cuckoo_header['menus-dropdown-size'] == null ? '' : 'font-size:'.$cuckoo_header['menus-dropdown-size'].'px; '; ?><?php echo $lheight = $cuckoo_header['menus-dropdown-lheight'] == null ? '' : 'line-height:'.$cuckoo_header['menus-dropdown-lheight'].';'; ?><?php echo $color = $cuckoo_header['menus-dropdown-color'] == null ? '' : 'color:'.$cuckoo_header['menus-dropdown-color'].';'; ?> }
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a span.nav_arrow, 
div#header_nav nav.navigation-top ul#cuckoo-nav-top li:hover ul.sub-menu li a span.nav_arrow { <?php echo $color = $cuckoo_header['menus-dropdown-color'] == '#' ? '' : 'background-color:'.$cuckoo_header['menus-dropdown-color'].';'; ?> }
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a:hover { font-family: '<?php echo $cuckoo_header['menus-dropdown-font-hover']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['menus-dropdown-weight-hover'] == null ? '' : 'font-weight:'.$cuckoo_header['menus-dropdown-weight-hover'].';'; ?><?php echo $style = $cuckoo_header['menus-dropdown-style-hover'] == null ? '' : 'font-style:'.$cuckoo_header['menus-dropdown-style-hover'].';'; ?><?php echo $size = $cuckoo_header['menus-dropdown-size-hover'] == null ? '' : 'font-size:'.$cuckoo_header['menus-dropdown-size-hover'].'px;'; ?><?php echo $lheight = $cuckoo_header['menus-dropdown-lheight-hover'] == null ? '' : 'line-height:'.$cuckoo_header['menus-dropdown-lheight-hover'].';'; ?><?php echo $color = $cuckoo_header['menus-dropdown-color-hover'] == null ? '' : 'color:'.$cuckoo_header['menus-dropdown-color-hover'].';'; ?> }
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a:hover span.nav_arrow { <?php echo $color = $cuckoo_header['menus-dropdown-color-hover'] == '#' ? '' : 'background-color:'.$cuckoo_header['menus-dropdown-color-hover'].';'; ?> }
div#header_links ul li a,
div#header_links { font-family: '<?php echo $cuckoo_header['homepage-top-links-font']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['homepage-top-links-weight'] == null ? '' : 'font-weight:'.$cuckoo_header['homepage-top-links-weight'].';'; ?><?php echo $style = $cuckoo_header['homepage-top-links-style'] == null ? '' : 'font-style:'.$cuckoo_header['homepage-top-links-style'].';'; ?><?php echo $size = $cuckoo_header['homepage-top-links-size'] == null ? '' : 'font-size:'.$cuckoo_header['homepage-top-links-size'].'px;'; ?><?php echo $lheight = $cuckoo_header['homepage-top-links-lheight'] == null ? '' : 'line-height:'.$cuckoo_header['homepage-top-links-lheight'].';'; ?><?php echo $color = $cuckoo_header['homepage-top-links-color'] == null ? '' : 'color:'.$cuckoo_header['homepage-top-links-color'].';'; ?> }
div#header_links ul li a:hover { <?php echo $color = $cuckoo_header['menus-color-hover'] == '#' ? '' : 'color:'.$cuckoo_header['menus-color-hover'].';'; ?> }
div#header_nav  nav.navigation-top ul li ul li:after { <?php echo $color = $cuckoo_header['menu-dorp-color'] == '#' ? '' : 'background-color:'.$cuckoo_header['menu-dorp-color'].'; opacity:'.$opacityDropHomepage.';'; ?> }
<?php else: ?>
/*========== Logo Styles ==========*/
#theme_logo .logo_content div.logo_background { <?php echo $color = $cuckoo_header['landing-logo_header'] == '#' ? '' : 'background-color:'.$cuckoo_header['landing-logo_header'].'!important; opacity:'.$opacityLogoLanding.';'; ?> }

/*========== Navigations Styles ==========*/
div#header_nav nav.navigation-top ul li a { font-family: '<?php echo $cuckoo_header['landing-menus-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_header['landing-menus-weight'] == null ? '' : 'font-weight:'.$cuckoo_header['landing-menus-weight'].';'; ?><?php echo $style = $cuckoo_header['landing-menus-style'] == null ? '' : 'font-style:'.$cuckoo_header['landing-menus-style'].';'; ?><?php echo $size = $cuckoo_header['landing-menus-size'] == null ? '' : 'font-size:'.$cuckoo_header['landing-menus-size'].'px;'; ?><?php echo $lheight = $cuckoo_header['landing-menus-lheight'] == null ? '' : 'line-height:'.$cuckoo_header['landing-menus-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_header['landing-menus-color'] == null ? '' : 'color:'.$cuckoo_header['landing-menus-color'].';'; ?> }
div#header_nav nav.navigation-top ul li:hover a { font-family: '<?php echo $cuckoo_header['landing-menus-font-hover']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['landing-menus-weight-hover'] == null ? '' : 'font-weight:'.$cuckoo_header['landing-menus-weight-hover'].';'; ?><?php echo $style = $cuckoo_header['landing-menus-style-hover'] == null ? '' : 'font-style:'.$cuckoo_header['landing-menus-style-hover'].';'; ?><?php echo $size = $cuckoo_header['landing-menus-size-hover'] == null ? '' : 'font-size:'.$cuckoo_header['landing-menus-size-hover'].'px;'; ?><?php echo $lheight = $cuckoo_header['landing-menus-lheight-hover'] == null ? '' : 'line-height:'.$cuckoo_header['landing-menus-lheight-hover'].';'; ?><?php echo $color = $cuckoo_header['landing-menus-color-hover'] == null ? '' : 'color:'.$cuckoo_header['landing-menus-color-hover'].';'; ?> }
<?php if($cuckoo_header['display_menu_hover_effect'] == 1): ?>
div#header_nav nav.navigation-top ul li.active-scroll a { font-family: '<?php echo $cuckoo_header['landing-menus-font-hover']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['landing-menus-weight-hover'] == null ? '' : 'font-weight:'.$cuckoo_header['landing-menus-weight-hover'].';'; ?><?php echo $style = $cuckoo_header['landing-menus-style-hover'] == null ? '' : 'font-style:'.$cuckoo_header['landing-menus-style-hover'].';'; ?><?php echo $size = $cuckoo_header['landing-menus-size-hover'] == null ? '' : 'font-size:'.$cuckoo_header['landing-menus-size-hover'].'px;'; ?><?php echo $lheight = $cuckoo_header['landing-menus-lheight-hover'] == null ? '' : 'line-height:'.$cuckoo_header['landing-menus-lheight-hover'].';'; ?><?php echo $color = $cuckoo_header['landing-menus-color-hover'] == null ? '' : 'color:'.$cuckoo_header['landing-menus-color-hover'].';'; ?> }
<?php endif; ?>
div#header_nav nav.navigation-top div.current-nav { <?php echo $color = $cuckoo_header['landing-menus-color-hover'] == '#' ? '' : 'background-color:'.$cuckoo_header['landing-menus-color-hover'].';'; ?> }
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a, 
div#header_nav nav.navigation-top ul#cuckoo-nav-top li:hover ul.sub-menu li a { font-family: '<?php echo $cuckoo_header['landing-menus-dropdown-font']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['landing-menus-dropdown-weight'] == null ? '' : 'font-weight:'.$cuckoo_header['landing-menus-dropdown-weight'].';'; ?><?php echo $style = $cuckoo_header['landing-menus-dropdown-style'] == null ? '' : 'font-style:'.$cuckoo_header['landing-menus-dropdown-style'].';'; ?><?php echo $size = $cuckoo_header['landing-menus-dropdown-size'] == null ? '' : 'font-size:'.$cuckoo_header['landing-menus-dropdown-size'].'px;'; ?><?php echo $lheight = $cuckoo_header['landing-menus-dropdown-lheight'] == null ? '' : 'line-height:'.$cuckoo_header['landing-menus-dropdown-lheight'].';'; ?><?php echo $color = $cuckoo_header['landing-menus-dropdown-color'] == null ? '' : 'color:'.$cuckoo_header['landing-menus-dropdown-color'].';'; ?> }
div#header_nav nav.navigation-top ul#cuckoo-nav-top li:hover ul.sub-menu li a span.nav_arrow, 
div#header_nav nav.navigation-top ul#cuckoo-nav-top li:hover ul.sub-menu li a span.nav_arrow { <?php echo $color = $cuckoo_header['landing-menus-dropdown-color'] == '#' ? '' : 'background-color:'.$cuckoo_header['landing-menus-dropdown-color'].';'; ?> }
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a:hover,
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a:hover { font-family: '<?php echo $cuckoo_header['landing-menus-dropdown-font-hover']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['landing-menus-dropdown-weight-hover'] == null ? '' : 'font-weight:'.$cuckoo_header['landing-menus-dropdown-weight-hover'].';'; ?><?php echo $style = $cuckoo_header['landing-menus-dropdown-style-hover'] == null ? '' : 'font-style:'.$cuckoo_header['landing-menus-dropdown-style-hover'].';'; ?><?php echo $size = $cuckoo_header['landing-menus-dropdown-size-hover'] == null ? '' : 'font-size:'.$cuckoo_header['landing-menus-dropdown-size-hover'].'px;'; ?><?php echo $lheight = $cuckoo_header['landing-menus-dropdown-lheight-hover'] == null ? '' : 'line-height:'.$cuckoo_header['landing-menus-dropdown-lheight-hover'].';'; ?><?php echo $color = $cuckoo_header['landing-menus-dropdown-color-hover'] == null ? '' : 'color:'.$cuckoo_header['landing-menus-dropdown-color-hover'].';'; ?> }
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a:hover span.nav_arrow,
div#header_nav nav.navigation-top ul#cuckoo-nav-top li ul.sub-menu li a:hover span.nav_arrow { <?php echo $color = $cuckoo_header['landing-menus-dropdown-color-hover'] == '#' ? '' : 'background-color:'.$cuckoo_header['landing-menus-dropdown-color-hover'].';'; ?> }
div#header_links ul li a,
div#header_links { font-family: '<?php echo $cuckoo_header['landing-top-links-font']; ?>' , sans-serif;<?php echo $weight = $cuckoo_header['landing-top-links-weight'] == null ? '' : 'font-weight:'.$cuckoo_header['landing-top-links-weight'].';'; ?><?php echo $style = $cuckoo_header['landing-top-links-style'] == null ? '' : 'font-style:'.$cuckoo_header['landing-top-links-style'].';'; ?><?php echo $size = $cuckoo_header['landing-top-links-size'] == null ? '' : 'font-size:'.$cuckoo_header['homepage-top-links-size'].'px;'; ?><?php echo $lheight = $cuckoo_header['landing-top-links-lheight'] == null ? '' : 'line-height:'.$cuckoo_header['landing-top-links-lheight'].';'; ?><?php echo $color = $cuckoo_header['landing-top-links-color'] == null ? '' : 'color:'.$cuckoo_header['landing-top-links-color'].';'; ?> }
div#header_links ul li a:hover { <?php echo $color = $cuckoo_header['landing-menus-color-hover'] == '#' ? '' : 'color:'.$cuckoo_header['landing-menus-color-hover'].';'; ?> }
div#header_nav  nav.navigation-top ul li ul li:after { <?php echo $color = $cuckoo_header['land-menu-dorp-color'] == '#' ? '' : 'background-color:'.$cuckoo_header['land-menu-dorp-color'].'; opacity:'.$opacityDropLanding.';'; ?> }
<?php endif; ?>

<?php if($cuckoo_header['display_menu_hover_effect'] != 1): ?>
/*====== Main Navigation Menu Hover Line Effect ======*/
div.current-nav { display:none!important; }
<?php endif; ?>

/*========== Homepage Unit Header Styles ==========*/
header.item-header-wrap h2.homepage-unit-title { font-family: '<?php echo $cuckoo_font['page-unit-title-font']; ?>' , sans-serif; <?php echo $unit_title_weight = $cuckoo_font['page-unit-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['page-unit-title-weight'].';'; ?><?php echo $unit_title_style = $cuckoo_font['page-unit-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['page-unit-title-style'].';'; ?><?php echo $unit_title_size = $cuckoo_font['page-unit-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['page-unit-title-size'].'px;'; ?><?php echo $unit_title_lheight = $cuckoo_font['page-unit-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['page-unit-title-lheight'].';'; ?><?php echo $unit_title_color = $cuckoo_font['page-unit-title-color'] == null ? '' : 'color:'.$cuckoo_font['page-unit-title-color'].';'; ?> }
header.item-header-wrap h4.homepage-subtitle { font-family: '<?php echo $cuckoo_font['page-unit-subtitle-font']; ?>' , sans-serif; <?php echo $unit_title_weight = $cuckoo_font['page-unit-subtitle-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['page-unit-subtitle-weight'].';'; ?><?php echo $unit_title_style = $cuckoo_font['page-unit-subtitle-style'] == null ? '' : 'font-style:'.$cuckoo_font['page-unit-subtitle-style'].';'; ?><?php echo $unit_title_size = $cuckoo_font['page-unit-subtitle-size'] == null ? '' : 'font-size:'.$cuckoo_font['page-unit-subtitle-size'].'px;'; ?><?php echo $unit_title_lheight = $cuckoo_font['page-unit-subtitle-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['page-unit-subtitle-lheight'].';'; ?><?php echo $unit_title_color = $cuckoo_font['page-unit-subtitle-color'] == null ? '' : 'color:'.$cuckoo_font['page-unit-subtitle-color'].';'; ?> }

/*======= Homepage Subtitle Line Color ========*/
.works-top-line.home-page-gallery, .item-top-line.home-page-blog { <?php echo $color = $cuckoo_style['home-subtitle-line-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['home-subtitle-line-color'].';'; ?> }

/*======= Landing Page Subtitle Line Color ========*/
#header-position { <?php echo $color = $cuckoo_style['landing-subtitle-line-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['landing-subtitle-line-color'].';'; ?> }
.item-top-line.landing-page, li.widget-container.widget_search, table#wp-calendar tbody tr,
.works-top-line.landing-page, li.widget-container.widget_product_search  { <?php echo $color = $cuckoo_style['landing-subtitle-line-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['landing-subtitle-line-color'].';'; ?> }

/*========== Elements Title (like: homepage post title) ===========*/
.post-title h3 a , ul.products li.product h3  { font-family: '<?php echo $cuckoo_font['ptl-title-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['ptl-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['ptl-title-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['ptl-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['ptl-title-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['ptl-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['ptl-title-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['ptl-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['ptl-title-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['ptl-title-color'] == null ? '' : 'color:'.$cuckoo_font['ptl-title-color'].';'; ?> }

/*========== Elements Title Team member ===========*/
.member-title h3 a, .member-title h3.team-title-no-link  { font-family: '<?php echo $cuckoo_font['ptl-team-title-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['ptl-team-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['ptl-team-title-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['ptl-team-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['ptl-team-title-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['ptl-team-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['ptl-team-title-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['ptl-team-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['ptl-team-title-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['ptl-team-title-color'] == null ? '' : 'color:'.$cuckoo_font['ptl-team-title-color'].';'; ?> }

/*====== Buttons ======*/
.reading-more, #submit, #submit-contact-form, a#cancel-comment-reply-link, a.slide-button, div.ico-button-container a.icon_box_button,
.text-box-link, ul.products li.product a.add_to_cart_button, a.button,
button.button, input.button, #respond input#submit, #content input.button, .shipping_calculator h2 a.shipping-calculator-button, 
.woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, 
.woocommerce-page button.button.alt, .woocommerce input.button.alt, table#wp-calendar tbody tr td a,
.woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, 
.woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, 
.woocommerce-page #content input.button.alt, #load-more-position { <?php echo $color = $cuckoo_style['all-button-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['all-button-color'].';'; ?> }
.show-map, #submit-all { <?php echo $color = $cuckoo_style['map-button-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['map-button-color'].';'; ?> }
a.comment-reply-link  { <?php echo $color = $cuckoo_style['reply-button-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['reply-button-color'].';'; ?> }
.form-submit, .show-map, #submit, .text-box-link,.reading-more a , a.comment-reply-link, #cancel-comment-reply-link, #content-main article.search-list .search-content-text .reading-more a,
.slide-button, a.btn-short, .percent-text, #submit-all, ul.products li.product a.add_to_cart_button ,a.button, button.button, input.button, #load-more-position, #submit-contact-form,
#respond input#submit, #content input.button, #tab-reviews div#reviews div#comments p.add_review a.show_review_form, div.ico-button-container a.icon_box_button, table#wp-calendar tbody tr td a,
.woocommerce div.cart-collaterals form.shipping_calculator h2 a.shipping-calculator-button { font-family: '<?php echo $cuckoo_font['button-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['button-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['button-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['button-style'] == null ? '' : 'font-style:'.$cuckoo_font['button-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['button-size'] == null ? '' : 'font-size:'.$cuckoo_font['button-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['button-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['button-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['button-color'] == null ? '' : 'color:'.$cuckoo_font['button-color'].'!important;'; ?> text-decoration:none; }

/*====== Primary Theme colors ======*/
.only-map, #item-alert-search, #item-alert, .password-box { <?php echo $color = $cuckoo_style['theme-primary-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-primary-color'].';'; ?> }

.required-span { <?php echo $color = $cuckoo_style['theme-primary-color'] == '#' ? 'color:red;' : 'color:'.$cuckoo_style['theme-primary-color'].';'; ?>  }

/*====== Secondary Theme colors ======*/
.back_to_top, .nivo-prevNav, .nivo-nextNav, #slider.main-slider, .cuckoo-navigation.single .cuckoo-next,
.cuckoo-navigation.single .cuckoo-previous , .lightbox-next, .lightbox-prev, .prev-blog , .next-blog, 
.prev-team , .next-team, div.post-navigation div.prev-blog-nav, 
section.testimonials-wrap div.next-testimonial, section.testimonials-wrap div.prev-testimonial,
div.post-navigation div.next-blog-nav, .rev_slider_wrapper .tp-leftarrow.default, .super-homepage #prevslide.load-item, .super-homepage #nextslide.load-item,
.rev_slider_wrapper .tp-rightarrow.default, div.prev-post-img , div.next-post-img, .open-comment , .comment-toggle,
 #content-woo div.next-prev-product a div.prev-post-img, #content-woo div.next-prev-product a div.next-post-img { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-1-color'].'!important;'; ?> }

/*========= Widgets Title ==========*/
li h3.widget-title { font-family: '<?php echo $cuckoo_font['widgest-title-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['widgest-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['widgest-title-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['widgest-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['widgest-title-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['widgest-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['widgest-title-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['widgest-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['widgest-title-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['widgest-title-color'] == null ? '' : 'color:'.$cuckoo_font['widgest-title-color'].';'; ?> }

/*====== Widgets Tag =====*/
li.widget-container div.tagcloud a { <?php echo $color = $cuckoo_style['tag-background-static'] == '#' ? '' : 'background-color:'.$cuckoo_style['tag-background-static'].';'; ?> font-family: '<?php echo $cuckoo_font['tag-widgets-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['tag-widgets-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['tag-widgets-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['tag-widgets-style'] == null ? '' : 'font-style:'.$cuckoo_font['tag-widgets-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['tag-widgets-size'] == null ? '' : 'font-size:'.$cuckoo_font['tag-widgets-size'].'px!important;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['tag-widgets-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['tag-widgets-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['tag-widgets-color'] == null ? '' : 'color:'.$cuckoo_font['tag-widgets-color'].';'; ?>  }
li.widget-container div.tagcloud a:hover { <?php echo $color = $cuckoo_style['tag-background-hover'] == '#' ? '' : 'background-color:'.$cuckoo_style['tag-background-hover'].';'; ?> }

/*========= Works background Hover ==========*/
.work-contur .single-container span.item-background { <?php echo $color = $cuckoo_style['worksThumbHoverColor'] == '#' ? '' : 'background-color:'.$cuckoo_style['worksThumbHoverColor'].'; opacity:'.$opacityWorksThumb.';'; ?> }

/*========= Text Box ==========*/
.text-box-text  { font-family: '<?php echo $cuckoo_font['text-box-testimonials-font']; ?>' , sans-serif;<?php echo $testimonials_weight = $cuckoo_font['text-box-testimonials-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['text-box-testimonials-weight'].';'; ?><?php echo $testimonials_style = $cuckoo_font['text-box-testimonials-style'] == null ? '' : 'font-style:'.$cuckoo_font['text-box-testimonials-style'].';'; ?><?php echo $testimonials_size = $cuckoo_font['text-box-testimonials-size'] == null ? '' : 'font-size:'.$cuckoo_font['text-box-testimonials-size'].'px;'; ?><?php echo $testimonials_lheight = $cuckoo_font['text-box-testimonials-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['text-box-testimonials-lheight'].';'; ?><?php echo $testimonials_color = $cuckoo_font['text-box-testimonials-color'] == null ? '' : 'color:'.$cuckoo_font['text-box-testimonials-color'].';'; ?> }

/*========= Testimonial Unit Option 1 ==========*/
.testimonials-excerpt  { font-family: '<?php echo $cuckoo_font['text-box-testimonials1-font']; ?>' , sans-serif;<?php echo $testimonials_weight = $cuckoo_font['text-box-testimonials1-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['text-box-testimonials1-weight'].';'; ?><?php echo $testimonials_style = $cuckoo_font['text-box-testimonials1-style'] == null ? '' : 'font-style:'.$cuckoo_font['text-box-testimonials1-style'].';'; ?><?php echo $testimonials_size = $cuckoo_font['text-box-testimonials1-size'] == null ? '' : 'font-size:'.$cuckoo_font['text-box-testimonials1-size'].'px;'; ?><?php echo $testimonials_lheight = $cuckoo_font['text-box-testimonials1-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['text-box-testimonials1-lheight'].';'; ?><?php echo $testimonials_color = $cuckoo_font['text-box-testimonials1-color'] == null ? '' : 'color:'.$cuckoo_font['text-box-testimonials1-color'].';'; ?> }

/*========= Testimonial Author Homepage ==========*/
ul.testimonials-option-2 div.testimonials-company,
div.testimonials-company span.text-test  { font-family: '<?php echo $cuckoo_font['testimonial-author-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['testimonial-author-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['testimonial-author-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['testimonial-author-style'] == null ? '' : 'font-style:'.$cuckoo_font['testimonial-author-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['testimonial-author-size'] == null ? '' : 'font-size:'.$cuckoo_font['testimonial-author-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['testimonial-author-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['testimonial-author-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['testimonial-author-color'] == null ? '' : 'color:'.$cuckoo_font['testimonial-author-color'].';'; ?> }

/*======= Testimonials Details Homepage ========*/
ul.testimonials-option-2 div.testimonials-company .test-details,
div.testimonials-company span.text-test .test-details { font-family: '<?php echo $cuckoo_font['testimonial-details-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['testimonial-details-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['testimonial-details-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['testimonial-details-style'] == null ? '' : 'font-style:'.$cuckoo_font['testimonial-details-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['testimonial-details-size'] == null ? '' : 'font-size:'.$cuckoo_font['testimonial-details-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['testimonial-details-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['testimonial-details-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['testimonial-details-color'] == null ? '' : 'color:'.$cuckoo_font['testimonial-details-color'].';'; ?> }

/*======= Testimonials Details Homepage ========*/
ul.testimonials-option-2 div.testimonials-option-2-excerpt div.test-exp,
li div.test-title-template-page div.testimonial-excerpt { font-family: '<?php echo $cuckoo_font['testimonial-content-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['testimonial-content-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['testimonial-content-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['testimonial-content-style'] == null ? '' : 'font-style:'.$cuckoo_font['testimonial-content-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['testimonial-content-size'] == null ? '' : 'font-size:'.$cuckoo_font['testimonial-content-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['testimonial-content-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['testimonial-content-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['testimonial-content-color'] == null ? '' : 'color:'.$cuckoo_font['testimonial-content-color'].';'; ?> }

/*========= Testimonial option 1 ==========*/
ul.testimonials-option-2 li.testimonials-option-2-list .testimonials-option-2-excerpt { <?php echo $color = $cuckoo_style['testimonialsBorder'] == '#' ? '' : 'background-color:'.$cuckoo_style['testimonialsBorder'].';'; ?> }
ul.testimonials-option-2 li.testimonials-option-2-list .test-exp { <?php echo $color = $cuckoo_style['testimonialsBack'] == '#' ? '' : 'background-color:'.$cuckoo_style['testimonialsBack'].';'; ?> }
ul.testimonials-option-2 li.testimonials-option-2-list .test-arrow { <?php echo $color = $cuckoo_style['testimonialsBorder'] == '#' ? '' : 'border-top-color:'.$cuckoo_style['testimonialsBorder'].';'; ?> }

/*======= Testimonial Template Content =======*/
div#testimonials-content div.testimonial-contest div.testimonial-excerpt {  font-family: '<?php echo $cuckoo_font['testimonial-template-content-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['testimonial-template-content-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['testimonial-template-content-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['testimonial-template-content-style'] == null ? '' : 'font-style:'.$cuckoo_font['testimonial-template-content-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['testimonial-template-content-size'] == null ? '' : 'font-size:'.$cuckoo_font['testimonial-template-content-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['testimonial-template-content-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['testimonial-template-content-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['testimonial-template-content-color'] == null ? '' : 'color:'.$cuckoo_font['testimonial-template-content-color'].';'; ?> }

/*======= Testimonial Template Author =======*/
div#testimonials-content div.test-company,
div.testimonials-company.test-page-templ div.testimonials-opt-2-test {  font-family: '<?php echo $cuckoo_font['testimonial-template-author-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['testimonial-template-author-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['testimonial-template-author-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['testimonial-template-author-style'] == null ? '' : 'font-style:'.$cuckoo_font['testimonial-template-author-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['testimonial-template-author-size'] == null ? '' : 'font-size:'.$cuckoo_font['testimonial-template-author-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['testimonial-template-author-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['testimonial-template-author-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['testimonial-template-author-color'] == null ? '' : 'color:'.$cuckoo_font['testimonial-template-author-color'].';'; ?> }

/*======= Testimonial Template Details =======*/
div#testimonials-content div.test-details,
div.testimonials-company.test-page-templ div.test-details {  font-family: '<?php echo $cuckoo_font['testimonial-template-details-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['testimonial-template-details-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['testimonial-template-details-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['testimonial-template-details-style'] == null ? '' : 'font-style:'.$cuckoo_font['testimonial-template-details-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['testimonial-template-details-size'] == null ? '' : 'font-size:'.$cuckoo_font['testimonial-template-details-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['testimonial-template-details-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['testimonial-template-details-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['testimonial-template-details-color'] == null ? '' : 'color:'.$cuckoo_font['testimonial-template-details-color'].';'; ?> }

/*============= Footer Fonts ============*/
.footer-nav ul li a { font-family: '<?php echo $cuckoo_header['footer-font-nav']; ?>' , sans-serif; <?php echo $footer_weight = $cuckoo_header['footer-weight-nav'] == null ? '' : 'font-weight:'.$cuckoo_header['footer-weight-nav'].';'; ?><?php echo $footer_style = $cuckoo_header['footer-style-nav'] == null ? '' : 'font-style:'.$cuckoo_header['footer-style-nav'].';'; ?><?php echo $footer_size = $cuckoo_header['footer-size-nav'] == null ? '' : 'font-size:'.$cuckoo_header['footer-size-nav'].'px;'; ?><?php echo $footer_lheight = $cuckoo_header['footer-lheight-nav'] == null ? '' : 'line-height:'.$cuckoo_header['footer-lheight-nav'].';'; ?><?php echo $footer_color = $cuckoo_header['footer-color-nav'] == null ? '' : 'color:'.$cuckoo_header['footer-color-nav'].';'; ?> }
.footer-nav ul li a:hover { font-family: '<?php echo $cuckoo_header['footer-font-nav-hover']; ?>' , sans-serif; <?php echo $footer_weight = $cuckoo_header['footer-weight-nav-hover'] == null ? '' : 'font-weight:'.$cuckoo_header['footer-weight-nav-hover'].';'; ?><?php echo $footer_style = $cuckoo_header['footer-style-nav-hover'] == null ? '' : 'font-style:'.$cuckoo_header['footer-style-nav-hover'].';'; ?><?php echo $footer_size = $cuckoo_header['footer-size-nav-hover'] == null ? '' : 'font-size:'.$cuckoo_header['footer-size-nav-hover'].'px;'; ?><?php echo $footer_lheight = $cuckoo_header['footer-lheight-nav-hover'] == null ? '' : 'line-height:'.$cuckoo_header['footer-lheight-nav-hover'].';'; ?><?php echo $footer_color = $cuckoo_header['footer-color-nav-hover'] == null ? '' : 'color:'.$cuckoo_header['footer-color-nav-hover'].';'; ?> }
.footer-txt-line { font-family: '<?php echo $cuckoo_header['footer-font']; ?>' , sans-serif; <?php echo $footer_weight = $cuckoo_header['footer-weight'] == null ? '' : 'font-weight:'.$cuckoo_header['footer-weight'].';'; ?><?php echo $footer_style = $cuckoo_header['footer-style'] == null ? '' : 'font-style:'.$cuckoo_header['footer-style'].';'; ?><?php echo $footer_size = $cuckoo_header['footer-size'] == null ? '' : 'font-size:'.$cuckoo_header['footer-size'].'px;'; ?><?php echo $footer_lheight = $cuckoo_header['footer-lheight'] == null ? '' : 'line-height:'.$cuckoo_header['footer-lheight'].';'; ?><?php echo $footer_color = $cuckoo_header['footer-color'] == null ? '' : 'color:'.$cuckoo_header['footer-color'].';'; ?> }
.footer-txt-line a { <?php echo $footer_color = $cuckoo_header['footer-color-nav'] == null ? '' : 'color:'.$cuckoo_header['footer-color-nav'].';'; ?> }

/*========= Footer Background ==========*/
<?php $footerColor = $cuckoo_header['footer-color-back'] == '#' ? '' : ' background-color:'.$cuckoo_header['footer-color-back']. ";" ; ?>
<?php $footerPosition = $cuckoo_header['footer-position'] == '' ? '' : ' background-position:'.$cuckoo_header['footer-position']. ";" ; ?>
<?php $footerRepeat = $cuckoo_header['footer-repeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_header['footer-repeat']. ";" ; ?>
<?php $footerAttachment = $cuckoo_header['footer-attachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_header['footer-attachment']. ";" ; ?>
#main-footer { <?php echo $footer = $cuckoo_header['footer-image'] == null ? $footerColor : 'background-image: url('.$cuckoo_header['footer-image']."); ". $footerAttachment . $footerRepeat . $footerPosition . $footerColor ?> }

/*====== Super footer Home Color settings =======*/
<?php $footerColorhomepage = $cuckoo_header['super-homepage-color'] == '#' ? '' : ' background-color:'.$cuckoo_header['super-homepage-color']. ";" ; ?>
<?php $footerPositionhomepage = $cuckoo_header['super-homepage-position'] == '' ? '' : ' background-position:'.$cuckoo_header['super-homepage-position']. ";" ; ?>
<?php $footerRepeathomepage = $cuckoo_header['super-homepage-repeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_header['super-homepage-repeat']. ";" ; ?>
<?php $footerAttachmenthomepage = $cuckoo_header['super-homepage-attachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_header['super-homepage-attachment']. ";" ; ?>
#main-super-footer-home { <?php echo $footerhomepage = $cuckoo_header['super-homepage-image'] == null ? $footerColorhomepage : 'background-image: url('.$cuckoo_header['super-homepage-image']."); ". $footerAttachmenthomepage . $footerRepeathomepage . $footerPositionhomepage . $footerColorhomepage ?> }

/*========= Super footer Color settings ==========*/
<?php $footerColorpage = $cuckoo_header['super-page-color'] == '#' ? '' : ' background-color:'.$cuckoo_header['super-page-color']. ";" ; ?>
<?php $footerPositionpage = $cuckoo_header['super-page-position'] == '' ? '' : ' background-position:'.$cuckoo_header['super-page-position']. ";" ; ?>
<?php $footerRepeatpage = $cuckoo_header['super-page-repeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_header['super-page-repeat']. ";" ; ?>
<?php $footerAttachmentpage = $cuckoo_header['super-page-attachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_header['super-page-attachment']. ";" ; ?>
#main-super-footer { <?php echo $footerpage = $cuckoo_header['super-page-image'] == null ? $footerColorpage : 'background-image: url('.$cuckoo_header['super-page-image']."); ". $footerAttachmentpage . $footerRepeatpage . $footerPositionpage . $footerColorpage ?> }

/*========= Items header ==========*/
#item-header { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['theme-secondary-1-color'].';'; ?> } 
#item-header {  <?php /* echo $style; */ ?>}
.item-info-block a { <?php echo $color = $cuckoo_style['underline-static'] == '#' ? '' : 'color:'.$cuckoo_style['underline-static'].';'; ?> }
.item-info-block a:hover { <?php echo $color = $cuckoo_style['underline-hover'] == '#' ? '' : 'color:'.$cuckoo_style['underline-hover'].'; '; ?> }
.item-info-block a:visited { <?php echo $color = $cuckoo_style['underline-visited'] == '#' ? '' : 'color:'.$cuckoo_style['underline-visited'].';'; ?> }

/*========== Title and subtitle Landing pages ===========*/
#header-position h1, #header-position-team h1, #header-position-page h1 {font-family: '<?php echo $cuckoo_font['pwp-title-font']; ?>' , sans-serif;<?php echo $pwp_title_weight = $cuckoo_font['pwp-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['pwp-title-weight'].';'; ?><?php echo $pwp_title_style = $cuckoo_font['pwp-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['pwp-title-style'].';'; ?><?php echo $pwp_title_size = $cuckoo_font['pwp-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['pwp-title-size'].'px;'; ?><?php echo $pwp_title_lheight = $cuckoo_font['pwp-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['pwp-title-lheight'].';'; ?><?php echo $pwp_title_color = $cuckoo_font['pwp-title-color'] == null ? '' : 'color:'.$cuckoo_font['pwp-title-color'].';'; ?> }
body.page #main-container #header-position-page h1 {font-family: '<?php echo $cuckoo_font['page-title-font']; ?>' , sans-serif;<?php echo $pwp_title_weight = $cuckoo_font['page-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['page-title-weight'].';'; ?><?php echo $pwp_title_style = $cuckoo_font['page-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['page-title-style'].';'; ?><?php echo $pwp_title_size = $cuckoo_font['page-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['page-title-size'].'px;'; ?><?php echo $pwp_title_lheight = $cuckoo_font['page-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['page-title-lheight'].';'; ?><?php echo $pwp_title_color = $cuckoo_font['page-title-color'] == null ? '' : 'color:'.$cuckoo_font['page-title-color'].';'; ?> }
.item-info-block h3 { font-family: '<?php echo $cuckoo_font['pwp-subtitle-font']; ?>' , sans-serif;<?php echo $pwp_subtitle_weight = $cuckoo_font['pwp-subtitle-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['pwp-subtitle-weight'].';'; ?><?php echo $pwp_subtitle_style = $cuckoo_font['pwp-subtitle-style'] == null ? '' : 'font-style:'.$cuckoo_font['pwp-subtitle-style'].';'; ?><?php echo $pwp_subtitle_size = $cuckoo_font['pwp-subtitle-size'] == null ? '' : 'font-size:'.$cuckoo_font['pwp-subtitle-size'].'px;'; ?><?php echo $pwp_subtitle_lheight = $cuckoo_font['pwp-subtitle-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['pwp-subtitle-lheight'].';'; ?><?php echo $pwp_subtitle_color = $cuckoo_font['pwp-subtitle-color'] == null ? '' : 'color:'.$cuckoo_font['pwp-subtitle-color'].';'; ?> }

/*======= Works filter Fonts Homepage =======*/
ul.item-info-list.homepage-works-galery li a.type-list { font-family: '<?php echo $cuckoo_gallery['homepage-static-font']; ?>' , sans-serif;<?php echo $work_weight = $cuckoo_gallery['homepage-static-weight'] == null ? '' : 'font-weight:'.$cuckoo_gallery['homepage-static-weight'].';'; ?><?php echo $work_style = $cuckoo_gallery['homepage-static-style'] == null ? '' : 'font-style:'.$cuckoo_gallery['homepage-static-style'].';'; ?><?php echo $work_size = $cuckoo_gallery['homepage-static-size'] == null ? '' : 'font-size:'.$cuckoo_gallery['homepage-static-size'].'px;'; ?><?php echo $work_lheight = $cuckoo_gallery['homepage-static-lheight'] == null ? '' : 'line-height:'.$cuckoo_gallery['homepage-static-lheight'].';'; ?><?php echo $work_color = $cuckoo_gallery['homepage-static-color'] == null ? '' : 'color:'.$cuckoo_gallery['homepage-static-color'].';'; ?> }
ul.item-info-list.homepage-works-galery li a.type-list:hover,  
ul.item-info-list.homepage-works-galery li a.type-list.selected { font-family: '<?php echo $cuckoo_gallery['homepage-hover-font']; ?>' , sans-serif;<?php echo $work_weight = $cuckoo_gallery['homepage-hover-weight'] == null ? '' : 'font-weight:'.$cuckoo_gallery['homepage-hover-weight'].';'; ?><?php echo $work_style = $cuckoo_gallery['homepage-hover-style'] == null ? '' : 'font-style:'.$cuckoo_gallery['homepage-hover-style'].';'; ?><?php echo $work_size = $cuckoo_gallery['homepage-hover-size'] == null ? '' : 'font-size:'.$cuckoo_gallery['homepage-hover-size'].'px;'; ?><?php echo $work_lheight = $cuckoo_gallery['homepage-hover-lheight'] == null ? '' : 'line-height:'.$cuckoo_gallery['homepage-hover-lheight'].';'; ?><?php echo $work_color = $cuckoo_gallery['homepage-hover-color'] == null ? '' : 'color:'.$cuckoo_gallery['homepage-hover-color'].';'; ?> }
ul.item-info-list.homepage-works-galery li a.type-list:hover, 
ul.item-info-list.homepage-works-galery li a.type-list.selected { <?php echo $color = $cuckoo_gallery['homepage-background-color'] == '#' ? '' : 'background-color:'.$cuckoo_gallery['homepage-background-color'].';'; ?> }

/*======= Works filter Fonts Landing =======*/
ul.item-info-list.landing-works-galery li a.type-list, article.work-content div.type-list-works, 
.single-works .works-types a.type-list-works { font-family: '<?php echo $cuckoo_gallery['landing-static-font']; ?>' , sans-serif;<?php echo $work_weight = $cuckoo_gallery['landing-static-weight'] == null ? '' : 'font-weight:'.$cuckoo_gallery['landing-static-weight'].';'; ?><?php echo $work_style = $cuckoo_gallery['landing-static-style'] == null ? '' : 'font-style:'.$cuckoo_gallery['landing-static-style'].';'; ?><?php echo $work_size = $cuckoo_gallery['landing-static-size'] == null ? '' : 'font-size:'.$cuckoo_gallery['landing-static-size'].'px;'; ?><?php echo $work_lheight = $cuckoo_gallery['landing-static-lheight'] == null ? '' : 'line-height:'.$cuckoo_gallery['landing-static-lheight'].';'; ?><?php echo $work_color = $cuckoo_gallery['landing-static-color'] == null ? '' : 'color:'.$cuckoo_gallery['landing-static-color'].';'; ?> }
ul.item-info-list.landing-works-galery li a.type-list:hover, 
.single-works .works-types a.type-list-works:hover, 
ul.item-info-list.landing-works-galery li a.type-list.selected { font-family: '<?php echo $cuckoo_gallery['landing-hover-font']; ?>' , sans-serif;<?php echo $work_weight = $cuckoo_gallery['landing-hover-weight'] == null ? '' : 'font-weight:'.$cuckoo_gallery['landing-hover-weight'].';'; ?><?php echo $work_style = $cuckoo_gallery['landing-hover-style'] == null ? '' : 'font-style:'.$cuckoo_gallery['landing-hover-style'].';'; ?><?php echo $work_size = $cuckoo_gallery['landing-hover-size'] == null ? '' : 'font-size:'.$cuckoo_gallery['landing-hover-size'].'px;'; ?><?php echo $work_lheight = $cuckoo_gallery['landing-hover-lheight'] == null ? '' : 'line-height:'.$cuckoo_gallery['landing-hover-lheight'].';'; ?><?php echo $work_color = $cuckoo_gallery['landing-hover-color'] == null ? '' : 'color:'.$cuckoo_gallery['landing-hover-color'].';'; ?> }
ul.item-info-list.landing-works-galery li a.type-list:hover, 
.single-works .works-types a.type-list-works:hover,
ul.item-info-list.landing-works-galery li a.type-list.selected { <?php echo $color = $cuckoo_gallery['landing-background-color'] == '#' ? '' : 'background-color:'.$cuckoo_gallery['landing-background-color'].';'; ?> }

/*======== Related Background & Fonts ========*/
	<?php $relatedPostsColor = $cuckoo_style['related-posts-color'] == '#' ? '' : ' background-color:'.$cuckoo_style['related-posts-color']. ";" ; ?>
	<?php $relatedPostsPosition = $cuckoo_style['related-posts-position'] == '' ? '' : ' background-position:'.$cuckoo_style['related-posts-position']. ";" ; ?>
	<?php $relatedPostsRepeat = $cuckoo_style['related-posts-repeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_style['related-posts-repeat']. ";" ; ?>
	<?php $relatedPostsAttachment = $cuckoo_style['related-posts-attachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_style['related-posts-attachment']. ";" ; ?>
#related-works.related-posts { <?php echo $relatedPosts = $cuckoo_style['related-posts-image'] == null ? $relatedPostsColor : 'background-image: url('.$cuckoo_style['related-posts-image']."); ". $relatedPostsAttachment . $relatedPostsRepeat . $relatedPostsPosition . $relatedPostsColor ?> }
#related-works.related-posts h2.related { font-family: '<?php echo $cuckoo_font['related-posts-font']; ?>' , sans-serif;<?php echo $lightbox_weight = $cuckoo_font['related-posts-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['related-posts-weight'].';'; ?><?php echo $lightbox_style = $cuckoo_font['related-posts-style'] == null ? '' : 'font-style:'.$cuckoo_font['related-posts-style'].';'; ?><?php echo $lightbox_size = $cuckoo_font['related-posts-size'] == null ? '' : 'font-size:'.$cuckoo_font['related-posts-size'].'px;'; ?><?php echo $lightbox_lheight = $cuckoo_font['related-posts-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['related-posts-lheight'].';'; ?><?php echo $lightbox_color = $cuckoo_font['related-posts-color'] == null ? '' : 'color:'.$cuckoo_font['related-posts-color'].';'; ?> }
	<?php $relatedWorksColor = $cuckoo_style['related-works-color'] == '#' ? '' : ' background-color:'.$cuckoo_style['related-works-color']. ";" ; ?>
	<?php $relatedWorksPosition = $cuckoo_style['related-works-position'] == '' ? '' : ' background-position:'.$cuckoo_style['related-works-position']. ";" ; ?>
	<?php $relatedWorksRepeat = $cuckoo_style['related-works-repeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_style['related-works-repeat']. ";" ; ?>
	<?php $relatedWorksAttachment = $cuckoo_style['related-works-attachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_style['related-works-attachment']. ";" ; ?>
#related-works.related-works-wrap { <?php echo $relatedWorks = $cuckoo_style['related-works-image'] == null ? $relatedWorksColor : 'background-image: url('.$cuckoo_style['related-works-image']."); ". $relatedWorksAttachment . $relatedWorksRepeat . $relatedWorksPosition . $relatedWorksColor ?> }
#related-works.related-works-wrap h2.related { font-family: '<?php echo $cuckoo_font['related-works-font']; ?>' , sans-serif;<?php echo $lightbox_weight = $cuckoo_font['related-works-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['related-works-weight'].';'; ?><?php echo $lightbox_style = $cuckoo_font['related-works-style'] == null ? '' : 'font-style:'.$cuckoo_font['related-works-style'].';'; ?><?php echo $lightbox_size = $cuckoo_font['related-works-size'] == null ? '' : 'font-size:'.$cuckoo_font['related-works-size'].'px;'; ?><?php echo $lightbox_lheight = $cuckoo_font['related-works-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['related-works-lheight'].';'; ?><?php echo $lightbox_color = $cuckoo_font['related-works-color'] == null ? '' : 'color:'.$cuckoo_font['related-works-color'].';'; ?> }
	<?php $relatedTeamColor = $cuckoo_style['background-setting-Rteam-color'] == '#' ? '' : ' background-color:'.$cuckoo_style['background-setting-Rteam-color']. ";" ; ?>
	<?php $relatedTeamPosition = $cuckoo_style['background-position-Rteam'] == '' ? '' : ' background-position:'.$cuckoo_style['background-position-Rteam']. ";" ; ?>
	<?php $relatedTeamRepeat = $cuckoo_style['background-setting-reapet-Rteam'] == '#' ? '' : ' background-repeat:'.$cuckoo_style['background-setting-reapet-Rteam']. ";" ; ?>
	<?php $relatedTeamAttachment = $cuckoo_style['background-setting-attach-Rteam'] == '#' ? '' : ' background-attachment:'.$cuckoo_style['background-setting-attach-Rteam']. ";" ; ?>
#team-works.related-works-wrap { <?php echo $relatedTeam = $cuckoo_style['background-Rteam-image'] == null ? $relatedTeamColor : 'background-image: url('.$cuckoo_style['background-Rteam-image']."); ". $relatedTeamAttachment . $relatedTeamRepeat . $relatedTeamPosition . $relatedTeamColor ?> }
#team-works.related-works-wrap h2.related { font-family: '<?php echo $cuckoo_font['related-team-font']; ?>' , sans-serif;<?php echo $lightbox_weight = $cuckoo_font['related-team-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['related-team-weight'].';'; ?><?php echo $lightbox_style = $cuckoo_font['related-team-style'] == null ? '' : 'font-style:'.$cuckoo_font['related-team-style'].';'; ?><?php echo $lightbox_size = $cuckoo_font['related-team-size'] == null ? '' : 'font-size:'.$cuckoo_font['related-team-size'].'px;'; ?><?php echo $lightbox_lheight = $cuckoo_font['related-team-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['related-team-lheight'].';'; ?><?php echo $lightbox_color = $cuckoo_font['related-team-color'] == null ? '' : 'color:'.$cuckoo_font['related-team-color'].';'; ?> }

/*===== Single Post Top Details ====*/
article.single-post-only #item-header.single-post-header .item-info-block { font-family: '<?php echo $cuckoo_font['single-post-details-font']; ?>' , sans-serif;<?php echo $lightbox_weight = $cuckoo_font['single-post-details-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['single-post-details-weight'].';'; ?><?php echo $lightbox_style = $cuckoo_font['single-post-details-style'] == null ? '' : 'font-style:'.$cuckoo_font['single-post-details-style'].';'; ?><?php echo $lightbox_size = $cuckoo_font['single-post-details-size'] == null ? '' : 'font-size:'.$cuckoo_font['single-post-details-size'].'px;'; ?><?php echo $lightbox_lheight = $cuckoo_font['single-post-details-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['single-post-details-lheight'].';'; ?><?php echo $lightbox_color = $cuckoo_font['single-post-details-color'] == null ? '' : 'color:'.$cuckoo_font['single-post-details-color'].';'; ?> }

/*======== Post Details =======*/
.about_post {font-family: '<?php echo $cuckoo_font['details-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['details-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['details-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['details-style'] == null ? '' : 'font-style:'.$cuckoo_font['details-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['details-size'] == null ? '' : 'font-size:'.$cuckoo_font['details-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['details-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['details-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['details-color'] == null ? '' : 'color:'.$cuckoo_font['details-color'].';'; ?>}
		
/*======= Lightbox =======*/
li.img-container .img-title.outs-title span { font-family: '<?php echo $cuckoo_font['lightbox-font']; ?>' , sans-serif;<?php echo $lightbox_weight = $cuckoo_font['lightbox-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['lightbox-weight'].';'; ?><?php echo $lightbox_style = $cuckoo_font['lightbox-style'] == null ? '' : 'font-style:'.$cuckoo_font['lightbox-style'].';'; ?><?php echo $lightbox_size = $cuckoo_font['lightbox-size'] == null ? '' : 'font-size:'.$cuckoo_font['lightbox-size'].'px;'; ?><?php echo $lightbox_lheight = $cuckoo_font['lightbox-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['lightbox-lheight'].';'; ?><?php echo $lightbox_color = $cuckoo_font['lightbox-color'] == null ? '' : 'color:'.$cuckoo_font['lightbox-color'].';'; ?> }

/*===== Single Team Member Page Intro Text =====*/
.team-desc-single  { font-family: '<?php echo $cuckoo_font['tt-content-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['tt-content-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['tt-content-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['tt-content-style'] == null ? '' : 'font-style:'.$cuckoo_font['tt-content-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['tt-content-size'] == null ? '' : 'font-size:'.$cuckoo_font['tt-content-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['tt-content-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['tt-content-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['tt-content-color'] == null ? '' : 'color:'.$cuckoo_font['tt-content-color'].';'; ?> }

/*======= Post Format Background =======*/
.format-blog { <?php echo $color = $cuckoo_style['all-button-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['all-button-color'].';'; ?> }

/* Comments Reply Title */
#respond h3 { font-family: '<?php echo $cuckoo_font['reply-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['reply-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['reply-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['reply-style'] == null ? '' : 'font-style:'.$cuckoo_font['reply-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['reply-size'] == null ? '' : 'font-size:'.$cuckoo_font['reply-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['reply-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['reply-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['reply-color'] == null ? '' : 'color:'.$cuckoo_font['reply-color'].';'; ?>}

/*======== Comments details ======*/
.about-comment, .respond-column-1, .about_required { font-family: '<?php echo $cuckoo_font['comments-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['comments-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['comments-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['comments-style'] == null ? '' : 'font-style:'.$cuckoo_font['comments-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['comments-size'] == null ? '' : 'font-size:'.$cuckoo_font['comments-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['comments-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['comments-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['comments-color'] == null ? '' : 'color:'.$cuckoo_font['comments-color'].';'; ?>}

/*======== Body of Contact Unit with Map Background ======*/
.contact-content.map-on .contact-info-block,
.contact-content.map-on .welcome_message_contact { font-family: '<?php echo $cuckoo_font['contact-last-col-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['contact-last-col-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['contact-last-col-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['contact-last-col-style'] == null ? '' : 'font-style:'.$cuckoo_font['contact-last-col-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['contact-last-col-size'] == null ? '' : 'font-size:'.$cuckoo_font['contact-last-col-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['contact-last-col-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['contact-last-col-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['contact-last-col-color'] == null ? '' : 'color:'.$cuckoo_font['contact-last-col-color'].';'; ?>}

/*======== Links of Contact Unit with Map Background ======*/
.contact-content.map-on .contact-info-block a,
.contact-content.map-on .welcome_message_contact a { font-family: '<?php echo $cuckoo_font['links-last-col-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['links-last-col-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['links-last-col-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['links-last-col-style'] == null ? '' : 'font-style:'.$cuckoo_font['links-last-col-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['links-last-col-size'] == null ? '' : 'font-size:'.$cuckoo_font['links-last-col-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['links-last-col-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['links-last-col-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['links-last-col-color'] == null ? '' : 'color:'.$cuckoo_font['links-last-col-color'].';'; ?>}		

/*======== Links Hover of Contact Unit with Map Background ======*/
.contact-content.map-on .contact-info-block a:hover,
.contact-content.map-on .welcome_message_contact a:hover { font-family: '<?php echo $cuckoo_font['links-hover-last-col-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['links-hover-last-col-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['links-hover-last-col-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['links-hover-last-col-style'] == null ? '' : 'font-style:'.$cuckoo_font['links-hover-last-col-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['links-hover-last-col-size'] == null ? '' : 'font-size:'.$cuckoo_font['links-hover-last-col-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['links-hover-last-col-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['links-hover-last-col-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['links-hover-last-col-color'] == null ? '' : 'color:'.$cuckoo_font['links-hover-last-col-color'].';'; ?>}		

/*======== Body of Contact Unit with Custom Background ======*/
.contact-content.map-off .contact-info-block,
.contact-content.map-off .welcome_message_contact { font-family: '<?php echo $cuckoo_font['contact-custom-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['contact-custom-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['contact-custom-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['contact-custom-style'] == null ? '' : 'font-style:'.$cuckoo_font['contact-custom-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['contact-custom-size'] == null ? '' : 'font-size:'.$cuckoo_font['contact-custom-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['contact-custom-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['contact-custom-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['contact-custom-color'] == null ? '' : 'color:'.$cuckoo_font['contact-custom-color'].';'; ?>}		
	
/*======== Links of Contact Unit with Custom Background ======*/
.contact-content.map-off .contact-info-block a,
.contact-content.map-off .welcome_message_contact a { font-family: '<?php echo $cuckoo_font['contact-links-custom-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['contact-links-custom-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['contact-links-custom-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['contact-links-custom-style'] == null ? '' : 'font-style:'.$cuckoo_font['contact-links-custom-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['contact-links-custom-size'] == null ? '' : 'font-size:'.$cuckoo_font['contact-links-custom-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['contact-links-custom-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['contact-links-custom-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['contact-links-custom-color'] == null ? '' : 'color:'.$cuckoo_font['contact-links-custom-color'].';'; ?>}

/*======== Links Hover of Contact Unit with Custom Background ======*/
.contact-content.map-off .contact-info-block a:hover,
.contact-content.map-off .welcome_message_contact a:hover { font-family: '<?php echo $cuckoo_font['contact-cuctom-links-hover-font']; ?>' , sans-serif;<?php echo $testimonials_author_weight = $cuckoo_font['contact-cuctom-links-hover-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['contact-cuctom-links-hover-weight'].';'; ?><?php echo $testimonials_author_style = $cuckoo_font['contact-cuctom-links-hover-style'] == null ? '' : 'font-style:'.$cuckoo_font['contact-cuctom-links-hover-style'].';'; ?><?php echo $testimonials_author_size = $cuckoo_font['contact-cuctom-links-hover-size'] == null ? '' : 'font-size:'.$cuckoo_font['contact-cuctom-links-hover-size'].'px;'; ?><?php echo $testimonials_author_lheight = $cuckoo_font['contact-cuctom-links-hover-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['contact-cuctom-links-hover-lheight'].';'; ?><?php echo $testimonials_author_color = $cuckoo_font['contact-cuctom-links-hover-color'] == null ? '' : 'color:'.$cuckoo_font['contact-cuctom-links-hover-color'].';'; ?>}

/*====== Contact Fields ======*/
textarea#contact_message, input#subject_contact, 
input#email_contact, input#contact_name { <?php echo $color = $cuckoo_style['contact-fields-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['contact-fields-color'].';'; ?> }

/*=======  Comments =======*/
section#comments header#comments-title, div#comments-main ol.comment-elements li.depth-1  { <?php echo $color = $cuckoo_style['first-comment-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['first-comment-color'].';'; ?> }
.comment-elements li.depth-2  { <?php echo $color = $cuckoo_style['children-comment-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['children-comment-color'].';'; ?> }
.depth-2 .comment-body .comment-arrow  { <?php echo $color = $cuckoo_style['children-comment-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['children-comment-color'].';'; ?> }
#respond  { <?php echo $color = $cuckoo_style['reply-block-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['reply-block-color'].';'; ?> }
#respond .respond-arrow { <?php echo $color = $cuckoo_style['reply-block-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['reply-block-color'].';'; ?> }

<?php /* Others links background */ ?> 
	.text-box-link:hover, a.btn-short:hover, #load-more-position:hover, div.ico-button-container a.icon_box_button:hover, #submit-contact-form:hover,
	.reading-more:hover, a.pricing-link:hover, #submit-all:hover, .show-map:hover ,a.comment-reply-link:hover, a.slide-button:hover,
	a.comment-reply-login:hover, #submit:hover, a#cancel-comment-reply-link:hover ,.nivo-caption a:hover, table#wp-calendar tbody tr td a:hover,
	a.button:hover, button.button:hover, input.button:hover, #respond input#submit:hover, #content input.button:hover, 
	.shipping_calculator h2 a.shipping-calculator-button:hover,.woocommerce a.button.alt:hover, .woocommerce-page a.button.alt:hover, 
	.woocommerce button.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce input.button.alt:hover, 
	.woocommerce-page input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce-page #respond input#submit.alt:hover, 
	.woocommerce #content input.button.alt:hover, .woocommerce-page #content input.button.alt:hover,.purchase:hover,
	.tp-button:hover, .purchase:hover.green, .tp-button:hover.green, .tp-button:hover.blue , .purchase:hover.blue, .tp-button:hover.red , 
	.purchase:hover.red, .tp-button:hover.orange , .purchase:hover.orange, .tp-button:hover.darkgrey , .purchase:hover.darkgrey,
	.tp-button:hover.grey , .purchase:hover.grey, .tp-button:hover.lightgrey ,.purchase:hover.lightgrey { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'background:'.$cuckoo_style['another-hover'].'!important;'; ?> }
	.text-box-link:visited, a.pricing-link:visited, .reading-more:visited,div.ico-button-container a.icon_box_button:visited, a.btn-short:visited, a.slide-button:visited,
	#submit-all:visited, .form-submit:visited, .show-map:visited , a.comment-reply-link:visited, a.comment-reply-login:visited, #submit:visited, table#wp-calendar tbody tr td a:visited,
	a#cancel-comment-reply-link:visited ,.nivo-caption a:visited, a.button:visited, button.button:visited, input.button:visited, #respond input#submit:visited, 
	#content input.button:visited, .shipping_calculator h2 a.shipping-calculator-button:visited { <?php echo $color = $cuckoo_style['another-visited'] == '#' ? '' : 'background:'.$cuckoo_style['another-visited'].';'; ?> }

<?php /* Woocommerce */ ?>
<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
	<?php $cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" ); ?>
	
	/*========== Shop Title ===========*/
	#main-container.woocommerce-cuckothemes.shop-cuckoo #item-header #header-position-page h1 {
		font-family: '<?php echo $cuckoo_woocommerce['title_font']; ?>' , sans-serif;
		<?php echo $slideshow_title_weight = $cuckoo_woocommerce['title_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['title_weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_woocommerce['title_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['title_style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_woocommerce['title_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['title_size'].'px;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['title_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['title_lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_woocommerce['title_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['title_color'].';'; ?>
	} 
	/*========== Shop subTitle ===========*/
	#main-container.woocommerce-cuckothemes.shop-cuckoo #item-header #header-position-page div.item-info-block h3 {
		font-family: '<?php echo $cuckoo_woocommerce['subtitle_font']; ?>' , sans-serif;
		<?php echo $slideshow_title_weight = $cuckoo_woocommerce['subtitle_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['subtitle_weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_woocommerce['subtitle_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['subtitle_style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_woocommerce['subtitle_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['subtitle_size'].'px;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['subtitle_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['subtitle_lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_woocommerce['subtitle_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['subtitle_color'].';'; ?>
	} 
	/*======== Product Title in a Single Product Page =======*/
	div.product div.summary h2.product_title {
		font-family: '<?php echo $cuckoo_woocommerce['product_title_font']; ?>' , sans-serif;
		<?php echo $slideshow_title_weight = $cuckoo_woocommerce['product_title_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['product_title_weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_woocommerce['product_title_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['product_title_style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_woocommerce['product_title_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['product_title_size'].'px;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['product_title_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['product_title_lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_woocommerce['product_title_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['product_title_color'].';'; ?>
	}
	/*========== Subtitle Line Color ===========*/
	#before-content-woo .line-of-woocommerce { <?php echo $lineColor = $cuckoo_woocommerce['subtitle-line-color'] == '#' ? '' : ' background-color:'.$cuckoo_woocommerce['subtitle-line-color']. ";" ; ?> }
	
	/*========= Details Box Background Color ========*/
	#before-content-woo #information-shop, div.product .woocommerce_tabs .panel, #content div.product .woocommerce_tabs .panel, .woocommerce div.product .woocommerce-tabs #tab-reviews.panel, 
	.woocommerce div.product .woocommerce-tabs #tab-additional_information.panel , .woocommerce div.product .woocommerce-tabs #tab-description.panel { <?php echo $DetailsBoxColor = $cuckoo_woocommerce['details-box-color'] == '#' ? '' : ' background-color:'.$cuckoo_woocommerce['details-box-color']. ";" ; ?> }
	
	/*======== Sale Box Color =======*/
	li.product span.onsale, div.product span.onsale ,#content-woo ul.products li.product span.onsale,
	.woocommerce a.button.added:before, .woocommerce button.button.added:before, 
	.woocommerce input.button.added:before, .woocommerce #respond input#submit.added:before, 
	.woocommerce #content input.button.added:before, .woocommerce-page a.button.added:before, 
	.woocommerce-page button.button.added:before, .woocommerce-page input.button.added:before, 
	.woocommerce-page #respond input#submit.added:before, .woocommerce-page #content input.button.added:before,
	.woocommerce a.button.loading:before, .woocommerce button.button.loading:before, 
	.woocommerce input.button.loading:before, .woocommerce #respond input#submit.loading:before, 
	.woocommerce #content input.button.loading:before, .woocommerce-page a.button.loading:before, 
	.woocommerce-page button.button.loading:before, .woocommerce-page input.button.loading:before, 
	.woocommerce-page #respond input#submit.loading:before, .woocommerce-page #content input.button.loading:before,
	ul.products li.product a.add_to_cart_button.added:before, ul.products li.product a.add_to_cart_button.loading:before { <?php echo $saleBoxColor = $cuckoo_woocommerce['sale-box-1-color'] == '#' ? '' : ' background-color:'.$cuckoo_woocommerce['sale-box-1-color']. "!important;" ; ?> }
	
	/*========== Sale Box Font Color ===========*/
	li.product span.onsale, div.product span.onsale ,#content-woo ul.products li.product span.onsale {
		font-family: '<?php echo $cuckoo_woocommerce['sale_box_font']; ?>' , sans-serif;
		<?php echo $slideshow_title_weight = $cuckoo_woocommerce['sale_box_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['sale_box_weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_woocommerce['sale_box_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['sale_box_style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_woocommerce['sale_box_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['sale_box_size'].'px;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['sale_box_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['sale_box_lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_woocommerce['sale_box_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['sale_box_color'].';'; ?>
	}
	
	/*======== Add to cart Button Font =======*/
	ul.products li.product a.add_to_cart_button, button.single_add_to_cart_button.button, div.summary form.cart .single_add_to_cart_button.button.alt,
	ul.products li.product a.button.product_type_variable, ul.products li.product a.button.product_type_grouped , ul.products li.product a.button.product_type_external,
	ul.products li.product a.button.product_type_simple {
		font-family: '<?php echo $cuckoo_woocommerce['add_to_cart_font']; ?>' , sans-serif;
		<?php echo $slideshow_title_weight = $cuckoo_woocommerce['add_to_cart_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['add_to_cart_weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_woocommerce['add_to_cart_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['add_to_cart_style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_woocommerce['add_to_cart_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['add_to_cart_size'].'px;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['add_to_cart_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['add_to_cart_lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_woocommerce['add_to_cart_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['add_to_cart_color'].';'; ?>
	}
	
	/*======== Add to cart Button Color =======*/
	ul.products li.product a.add_to_cart_button, button.single_add_to_cart_button.button, 
	div.summary form.cart .single_add_to_cart_button.button.alt, ul.products li.product a.button.product_type_variable, 
	ul.products li.product a.button.product_type_grouped, ul.products li.product a.button.product_type_external, 
	ul.products li.product a.button.product_type_simple { <?php echo $lineColor = $cuckoo_woocommerce['add-to-cart-button-color'] == '#' ? '' : ' background-color:'.$cuckoo_woocommerce['add-to-cart-button-color']. ";" ; ?> }	
	
	/*======== Add to cart Button Color Hover =======*/
	ul.products li.product a.add_to_cart_button:hover, button.single_add_to_cart_button.button:hover, 
	div.summary form.cart .single_add_to_cart_button.button.alt:hover, ul.products li.product a.button.product_type_variable:hover, 
	ul.products li.product a.button.product_type_grouped:hover, ul.products li.product a.button.product_type_external:hover,
	ul.products li.product a.button.product_type_simple:hover { <?php echo $lineColor = $cuckoo_woocommerce['add-to-cart-button-hover-color'] == '#' ? '' : ' background-color:'.$cuckoo_woocommerce['add-to-cart-button-hover-color']. ";" ; ?> }
	
	<?php $relatedProductColor = $cuckoo_woocommerce['backgroundColor'] == '#' ? '' : ' background-color:'.$cuckoo_woocommerce['backgroundColor']. ";" ; ?>
	<?php $relatedProductPosition = $cuckoo_woocommerce['imgPosition'] == '' ? '' : ' background-position:'.$cuckoo_woocommerce['imgPosition']. ";" ; ?>
	<?php $relatedProductRepeat = $cuckoo_woocommerce['imgRepeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_woocommerce['imgRepeat']. ";" ; ?>
	<?php $relatedProductAttachment = $cuckoo_woocommerce['imgAttachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_woocommerce['imgAttachment']. ";" ; ?>
	#related-products.related-posts { <?php echo $relatedProduct = $cuckoo_woocommerce['img_url'] == null ? $relatedProductColor : 'background-image: url('.$cuckoo_woocommerce['img_url']."); ". $relatedProductAttachment . $relatedProductRepeat . $relatedProductPosition . $relatedProductColor ?> }
	
	/*========== Sale Price Font ===========*/
	ul.products li.product .price, div.product div.summary div p.price span.amount, div.single_variation span.price span.amount {
		font-family: '<?php echo $cuckoo_woocommerce['price_font']; ?>' , sans-serif!important;
		<?php echo $slideshow_title_weight = $cuckoo_woocommerce['price_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['price_weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_woocommerce['price_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['price_style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_woocommerce['price_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['price_size'].'px!important;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['price_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['price_lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_woocommerce['price_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['price_color'].'!important;'; ?>
	}
	
	/*========== Regular Price Font ===========*/
	ul.products li.product .price del, div.product div.summary div p.price del span.amount{
		font-family: '<?php echo $cuckoo_woocommerce['regular_font']; ?>' , sans-serif!important;
		<?php echo $slideshow_title_weight = $cuckoo_woocommerce['regular_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['regular_weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_woocommerce['regular_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['regular_style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_woocommerce['regular_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['regular_size'].'px!important;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['regular_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['regular_lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_woocommerce['regular_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['regular_color'].'!important;'; ?>
	}
	.woocommerce div.container-woo-path nav.woocommerce-breadcrumb a, .woocommerce-page div.container-woo-path nav.woocommerce-breadcrumb a {  <?php echo $color = $cuckoo_style['underline-static'] == '#' ? '' : 'color:'.$cuckoo_style['underline-static'].';'; ?>  }
	
	/* ### Widgets ### Regular Price Font */
	.widget-container ul.product_list_widget li  del span.amount,
	.widget-container.widget_shopping_cart div.widget_shopping_cart_content  ul.product_list_widget li  del span.amount	{ <?php echo $slideshow_title_color = $cuckoo_woocommerce['regular_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['regular_color'].'!important;'; ?> }
	
	/* ### Widgets ### Sale Price Font */	
	.widget-container ul.product_list_widget li ins span.amount,
	.widget-container ul.product_list_widget li span.amount,
	.widget-container.widget_shopping_cart  div.widget_shopping_cart_content  ul.product_list_widget li  ins span.amount,
	.widget-container.widget_shopping_cart div.widget_shopping_cart_content  ul.product_list_widget li span.amount	{ <?php echo $slideshow_title_color = $cuckoo_woocommerce['price_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['price_color'].'!important;'; ?> }

	

<?php } ?>
<?php /* Media */ ?>

	<?php if($cuckoo_settings['responsive'] == "Yes"){ ?>
		@media only screen  and (max-width : 768px) {
			.back_to_top , .nivo-prevNav, .nivo-nextNav, .slidePreloadImg, .circle_preload, .lightbox-next, .lightbox-prev, .prev-testimonial , .next-testimonial { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-1-color'].'!important;'; ?> }
			div#header_nav nav ul li a:hover { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'background:'.$cuckoo_style['another-hover'].';'; ?> }
			div#header_nav nav ul li a:visited { <?php echo $color = $cuckoo_style['another-visited'] == '#' ? '' : 'background:'.$cuckoo_style['another-visited'].';'; ?> }
		}
	<?php } ?>

<?php /* Lines colors */ ?>
	.item-info-line.one:before { <?php echo $color = $cuckoo_style['subtitle-line-color'] == '#' ? '' : 'border-top-color:'.$cuckoo_style['subtitle-line-color'].';'; ?> }
	.comment-elements li.depth-1:first-child .comment-body { <?php echo $color = $cuckoo_style['comment-line-color'] == '#' ? '' : 'border-top-color:'.$cuckoo_style['comment-line-color'].';'; ?> }
	.item-desc-bottom, .post-title h3, .test-title, li h3.widget-title{ <?php echo $color = $cuckoo_style['all-lines-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['all-lines-color'].'!important;'; ?> }
	.testimonials-line, .slide-title-line  { <?php echo $color = $cuckoo_style['all-lines-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['all-lines-color'].';'; ?> }
<?php /* Selected colors */ ?>
	::-moz-selection {  <?php echo $color = $cuckoo_style['selected-color'] == '#' ? '' : 'background:'.$cuckoo_style['selected-color'].';'; echo $color = $cuckoo_style['selected-font-color'] == '#' ? '' : 'color:'.$cuckoo_style['selected-font-color'].';'; ?>}
	::selection {  <?php echo $color = $cuckoo_style['selected-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['selected-color'].';'; echo $color = $cuckoo_style['selected-font-color'] == '#' ? '' : 'color:'.$cuckoo_style['selected-font-color'].';'; ?> }
	::-webkit-selection { <?php echo $color = $cuckoo_style['selected-color'] == '#' ? '' : 'background:'.$cuckoo_style['selected-color'].';'; echo $color = $cuckoo_style['selected-font-color'] == '#' ? '' : 'color:'.$cuckoo_style['selected-font-color'].';'; ?> }
	.selected_text { <?php echo $color = $cuckoo_style['selected-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['selected-color'].';'; echo $color = $cuckoo_style['selected-font-color'] == '#' ? '' : 'color:'.$cuckoo_style['selected-font-color'].';'; ?> }
<?php /* Image background */ ?>
	.slidePreloadImg , .testimonials-wrap, .text-box-wrap, .social-media-wrap, #slider.main-slider {  <?php echo $style; ?>}
<?php /* Display 1px and another effects */ ?>
<?php if( $cuckoo_style['display_one_px_effect'] != 1 ) : ?>
	.logo_content .logo, .facebook-large, .twitter-large, .google-large, .flickr-large, .pinterest-large, .dribble-large, .behance-large, #submit-contact-form,
	.youtube-large, .vimeo-large, .linkendin-large, .email-large, .rss-large, .instagram-large , .form-submit, .show-map, #submit, #submit-all, .text-box-link, 
	.reading-more, a.comment-reply-link, #cancel-comment-reply-link, .slide-button, a.btn-short, .facebook-small, .twitter-small, 
	.google-small, .flickr-small, .pinterest-small, .dribble-small, .behance-small, .youtube-small, .vimeo-small, .linkendin-small, .email-small, .percent-bar 
	.rss-small, .instagram-small, span.onsale, button.single_add_to_cart_button.button
	{ border-right:0!important; }
	.border-img, .border-img-galleries { display:none!important; }
<?php endif; ?>
<?php /* Fonts Admin Page Settings */ ?>
<?php /* Slideshow Title */ ?>
	.slide-title {
		font-family: '<?php echo $cuckoo_font['slideshow-title-font']; ?>' , sans-serif;
		<?php echo $slideshow_title_weight = $cuckoo_font['slideshow-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['slideshow-title-weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_font['slideshow-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['slideshow-title-style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_font['slideshow-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['slideshow-title-size'].'px;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_font['slideshow-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['slideshow-title-lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_font['slideshow-title-color'] == null ? '' : 'color:'.$cuckoo_font['slideshow-title-color'].';'; ?>
	}
<?php /* Slideshow Subtitle */ ?>
	.slide-subtitle {
		font-family: '<?php echo $cuckoo_font['slideshow-subtitle-font']; ?>' , sans-serif;
		<?php echo $slideshow_subtitle_weight = $cuckoo_font['slideshow-subtitle-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['slideshow-subtitle-weight'].';'; ?>
		<?php echo $slideshow_subtitle_style = $cuckoo_font['slideshow-subtitle-style'] == null ? '' : 'font-style:'.$cuckoo_font['slideshow-subtitle-style'].';'; ?>
		<?php echo $slideshow_subtitle_size = $cuckoo_font['slideshow-subtitle-size'] == null ? '' : 'font-size:'.$cuckoo_font['slideshow-subtitle-size'].'px;'; ?>
		<?php echo $slideshow_subtitle_lheight = $cuckoo_font['slideshow-subtitle-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['slideshow-subtitle-lheight'].';'; ?>
		<?php echo $slideshow_subtitle_color = $cuckoo_font['slideshow-subtitle-color'] == null ? '' : 'color:'.$cuckoo_font['slideshow-subtitle-color'].';'; ?>
	}
<?php /* Body Font */ ?>
	body, a.cuckoo-love, #path-and-buy, #breadcrumb, .pagination-content span {
		font-family: '<?php echo $cuckoo_font['body-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['body-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['body-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['body-style'] == null ? '' : 'font-style:'.$cuckoo_font['body-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['body-size'] == null ? '' : 'font-size:'.$cuckoo_font['body-size'].'px!important;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['body-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['body-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['body-color'] == null ? '' : 'color:'.$cuckoo_font['body-color'].'!important;'; ?>
	}
<?php /* Alerts Font */ ?>
	#result p.error, #result p.success, #item-alert, .item-alert-text span, #error_page .error-text, .password_correct_text	{
		font-family: '<?php echo $cuckoo_font['alerts-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['alerts-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['alerts-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['alerts-style'] == null ? '' : 'font-style:'.$cuckoo_font['alerts-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['alerts-size'] == null ? '' : 'font-size:'.$cuckoo_font['alerts-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['alerts-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['alerts-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['alerts-color'] == null ? '' : 'color:'.$cuckoo_font['alerts-color'].';'; ?>
	}
<?php /* Team Occupation */ ?>
	.member-occupation  { 
		font-family: '<?php echo $cuckoo_font['occupation-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['occupation-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['occupation-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['occupation-style'] == null ? '' : 'font-style:'.$cuckoo_font['occupation-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['occupation-size'] == null ? '' : 'font-size:'.$cuckoo_font['occupation-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['occupation-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['occupation-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['occupation-color'] == null ? '' : 'color:'.$cuckoo_font['occupation-color'].';'; ?>
	}

<?php /* Work List Title */ ?>
	h4.work-thumb-title { 
		font-family: '<?php echo $cuckoo_font['workl-title-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['workl-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['workl-title-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['workl-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['workl-title-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['workl-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['workl-title-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['workl-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['workl-title-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['workl-title-color'] == null ? '' : 'color:'.$cuckoo_font['workl-title-color'].';'; ?>
	}
<?php /* Work List subtitle */ ?>
	.work-type { 
		font-family: '<?php echo $cuckoo_font['workl-subtitle-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['workl-subtitle-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['workl-subtitle-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['workl-subtitle-style'] == null ? '' : 'font-style:'.$cuckoo_font['workl-subtitle-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['workl-subtitle-size'] == null ? '' : 'font-size:'.$cuckoo_font['workl-subtitle-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['workl-subtitle-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['workl-subtitle-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['workl-subtitle-color'] == null ? '' : 'color:'.$cuckoo_font['workl-subtitle-color'].';'; ?>
	}
<?php /* Comment Title */ ?>
	.comments-title-area h2 { 
		font-family: '<?php echo $cuckoo_font['comment-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['comment-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['comment-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['comment-style'] == null ? '' : 'font-style:'.$cuckoo_font['comment-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['comment-size'] == null ? '' : 'font-size:'.$cuckoo_font['comment-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['comment-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['comment-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['comment-color'] == null ? '' : 'color:'.$cuckoo_font['comment-color'].';'; ?>
	}
<?php /* h1 */ ?>
	h1, h1.short-title { 
		font-family: '<?php echo $cuckoo_font['h1-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h1-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h1-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h1-style'] == null ? '' : 'font-style:'.$cuckoo_font['h1-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h1-size'] == null ? '' : 'font-size:'.$cuckoo_font['h1-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h1-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h1-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h1-color'] == null ? '' : 'color:'.$cuckoo_font['h1-color'].';'; ?>
	}
<?php /* h2 */ ?>
	h2, #post-content #content-main h2.search-title a, h2.short-title { 
		font-family: '<?php echo $cuckoo_font['h2-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h2-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h2-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h2-style'] == null ? '' : 'font-style:'.$cuckoo_font['h2-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h2-size'] == null ? '' : 'font-size:'.$cuckoo_font['h2-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h2-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h2-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h2-color'] == null ? '' : 'color:'.$cuckoo_font['h2-color'].';'; ?>
	}
<?php /* h3 */ ?>
	h3, h3.short-title,  li.tab-navig a, div.tabs ul.tab-nav li.tab-navig a .number-checked-box h3, div.product .woocommerce_tabs ul.tabs li a, 
	#content div.product .woocommerce_tabs ul.tabs li a , #reviews #comments h2, 
	.cart-collaterals .cart_totals h2,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, 
	.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #content div.product 
	.woocommerce-tabs ul.tabs li.active a, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a, 
	.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, 
	.woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li { 
		font-family: '<?php echo $cuckoo_font['h3-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h3-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h3-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h3-style'] == null ? '' : 'font-style:'.$cuckoo_font['h3-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h3-size'] == null ? '' : 'font-size:'.$cuckoo_font['h3-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h3-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h3-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h3-color'] == null ? '' : 'color:'.$cuckoo_font['h3-color'].'!important;'; ?>
	}
<?php /* h4 */ ?>
	h4 { 
		font-family: '<?php echo $cuckoo_font['h4-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h4-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h4-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h4-style'] == null ? '' : 'font-style:'.$cuckoo_font['h4-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h4-size'] == null ? '' : 'font-size:'.$cuckoo_font['h4-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h4-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h4-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h4-color'] == null ? '' : 'color:'.$cuckoo_font['h4-color'].';'; ?>
	}
<?php /* h5 */ ?>
	h5 { 
		font-family: '<?php echo $cuckoo_font['h5-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h5-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h5-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h5-style'] == null ? '' : 'font-style:'.$cuckoo_font['h5-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h5-size'] == null ? '' : 'font-size:'.$cuckoo_font['h5-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h5-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h5-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h5-color'] == null ? '' : 'color:'.$cuckoo_font['h5-color'].';'; ?>
	}
<?php /* Logo title settings */ ?>
	.logo_content div.logo a {
		font-family: '<?php  echo $cuckoo_header['title_font'];  ?>' , sans-serif  ;
		<?php echo $title_weight = $cuckoo_header['title_font_weight'] == null ? '' :  'font-weight:'.$cuckoo_header['title_font_weight'].';'; ?>
		<?php echo $title_style = $cuckoo_header['title_font_style'] == null ? '' : 'font-style:'.$cuckoo_header['title_font_style'].';'; ?>
		<?php echo $title_size = $cuckoo_header['title_font_size'] == null ? '' : 'font-size:'.$cuckoo_header['title_font_size'].'px;'; ?>
		<?php echo $title_size = $cuckoo_header['title_font_lheight'] == null ? '' : 'line-height:'.$cuckoo_header['title_font_lheight'].';'; ?>
		<?php echo $title_size = $cuckoo_header['title_font_color'] == null ? '' : 'color:'.$cuckoo_header['title_font_color'].';'; ?>
	}
</style>