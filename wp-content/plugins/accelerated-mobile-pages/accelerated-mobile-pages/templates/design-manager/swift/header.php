<?php global $redux_builder_amp ?>
<?php amp_header_core() ?>
<?php
do_action( 'levelup_head');
if( !ampforwp_levelup_compatibility('hf_builder_head') ){
    $header_type = ampforwp_get_setting('header-type');
    if(!defined('AMPFORWP_LAYOUTS_FILE')){
        if( !in_array($header_type,array(1,2,3,10)) ) {
            $header_type = 1;
        }
    }
?>
<?php if($header_type == '1'){?>
<?php do_action('ampforwp_admin_menu_bar_front'); ?>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--<?php wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js?hl=' . pll_current_language()) . '&onload=onloadCallback&render=explicit'; ?> -->
	<?php wp_head(); ?>
	<script type="text/javascript">

		var onloadCallback = function() {

			if($("div").is("#popupCaptcha")){
				grecaptcha.render('popupCaptcha', {'sitekey' : '6LfK5b0UAAAAAHSrY2plGWoWj-V01fIqni2OvRf7'});
			}

			if($("div").is("#postsCaptcha")){
				grecaptcha.render('postsCaptcha', {'sitekey' : '6LfK5b0UAAAAAHSrY2plGWoWj-V01fIqni2OvRf7'});
			}
		};

	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=en'>
	</script>
	<meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css" />
</head>
<div id="main-header" class="header-menu">
	<div class="menu-grid-container">
		<a href="https://www.avs4you.com<?php pll_e('/') ?>">
			<div class="logo"></div>
		</a>
		<div class="headLinkWrapper blogLink">
			<a class="headerButton" href="<?php echo site_url() ?><?php pll_e('/') ?>"><?php pll_e('BLOG') ?></a>	
		</div>		
		<div class="site-navigation-box">
			<div class="nav-item hasSubMenu" id="hasSubMenuAMP">
				<p><?php pll_e('Video software') ?></p>
				<div class="sub-nav-item">
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-video-editor.aspx" target="_blank">
						<h4><?php pll_e('AVS Video Editor') ?></h4>
						<span><?php pll_e('Easily edit and create videos') ?></span>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-video-converter.aspx" target="_blank">
						<h4><?php pll_e('AVS Video Converter') ?></h4>
						<span><?php pll_e('Convert all key video formats') ?></span>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-video-remaker.aspx" target="_blank">
						<h4><?php pll_e('AVS Video Remaker') ?></h4>
						<span><?php pll_e('Edit videos without reconversion') ?></span>
					</a>
				</div>
			</div>
			<div class="nav-item hasSubMenu" id="hasSubMenuAMP">
				<p><?php pll_e('Audio software') ?></p>
				<div class="sub-nav-item">
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-audio-editor.aspx" target="_blank">
						<h4><?php pll_e('AVS Audio Editor') ?></h4>
						<span><?php pll_e('Easily edit and create audio') ?></span>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-audio-converter.aspx" target="_blank">
						<h4><?php pll_e('AVS Audio Converter') ?></h4>
						<span><?php pll_e('Convert all popular audio formats') ?></span>
					</a>
				</div>
			</div>
			<div class="nav-item hasSubMenu" id="hasSubMenuAMP">
				<p><?php pll_e('Free software') ?></p>
				<div class="sub-nav-item two-col">
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-media-player.aspx" target="_blank">
						<h4><?php pll_e('AVS Media Player') ?></h4>
						<span><?php pll_e('Watch audio and video') ?></span>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-photo-editor.aspx" target="_blank">
						<h4><?php pll_e('AVS Photo Editor') ?></h4>
						<span><?php pll_e('Edit and improve photos') ?></span>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-image-converter.aspx" target="_blank">
						<h4><?php pll_e('AVS Image Converter') ?></h4>
						<span><?php pll_e('Convert and compress images') ?></span>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-document-converter.aspx" target="_blank">
						<h4><?php pll_e('AVS Document Converter') ?></h4>
						<span><?php pll_e('Convert all kinds of documents') ?></span>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-disc-creator.aspx" target="_blank">
						<h4><?php pll_e('AVS Disc Creator') ?></h4>
						<span><?php pll_e('Write DVD/CD/Blu-ray discs') ?></span>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-registry-cleaner.aspx" target="_blank">
						<h4><?php pll_e('AVS Registry Cleaner') ?></h4>
						<span><?php pll_e('Clean and fix registry errors') ?></span>
					</a>
				</div>
			</div>
			<div class="nav-item">
				<a class="headerSingleLink" href="https://www.avs4you.com<?php pll_e('/') ?>downloads.aspx"><?php pll_e('download') ?></a>
			</div>
			<div class="nav-item">
				<a class="headerSingleLink" href="https://www.avs4you.com<?php pll_e('/') ?>register.aspx"><?php pll_e('buy now') ?></a>
			</div>
			<div class="nav-item hasSubMenu" id="hasSubMenuAMP">
				<p><?php pll_e('Help center') ?></p>
				<div class="sub-nav-item">
					<a href="https://support.avs4you.com<?php pll_e('/') ?>login.aspx" target="_blank">
						<h4><?php pll_e('Support form') ?></h4>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>guides/index.aspx" target="_blank">
						<h4><?php pll_e('Guides') ?></h4>
					</a>
					<a href="https://onlinehelp.avs4you.com/" target="_blank">
						<h4><?php pll_e('Knowledge center') ?></h4>
					</a>
					<a href="https://support.avs4you.com/faq.aspx" target="_blank">
						<h4><?php pll_e('FAQ') ?></h4>
					</a>
				</div>
			</div>
			<div id="backFromSubmenu"><?php pll_e('back') ?></div>
			<div id="logoMobileMenu"></div>
			<div id="closeMobileMenu">×</div>
			<div class="langSwitcherWrapper">
				<div class="langSwitcher nav-item hasSubMenu mobile" id="langSwitcher"><?php echo pll_current_language('name'); ?>
					<div class="langSubBox sub-nav-item">
						<?php pll_the_languages(array('show_flags'=>1,'show_names'=>1,'dropdown'=>0));  ?>
					</div>
				</div>
			</div>
		</div> 
		<div class="headLinkWrapper">
			<a id="openSupPopup" class="headerButton sub"><?php pll_e('Subscribe') ?></a>	
		</div>
		<div class="burgerButton">
			<span></span>
		</div>	
		<div class="langBox">
			<div class="langSwitcher nav-item hasSubMenu" id="langSwitcher"><?php echo pll_current_language('name'); ?>
				<div class="langSubBox sub-nav-item">
					<?php pll_the_languages(array('show_flags'=>1,'show_names'=>1,'dropdown'=>0));  ?>
				</div>
			</div>
		</div> 
	</div>
</div>
<?php } ?>
<?php if($header_type == '2'){?>
<header class="header-2 h_m h_m_1">
    <?php do_action('ampforwp_header_top_design4'); ?>
    <input type="checkbox" id="offcanvas-menu" class="tg" />
    <div class="hamb-mnu">
        <aside class="m-ctr">
            <div class="m-scrl">

                <div class="menu-heading clearfix">
                    <label for="offcanvas-menu" class="c-btn"></label>
                </div><!--end menu-heading-->
                <?php if ( amp_menu(false) ) : ?>
                    <nav class="m-menu">
                       <?php amp_menu();?>
                    </nav><!--end slide-menu -->
                <?php endif; ?>
                <?php do_action('ampforwp_after_amp_menu');?>
                <?php if ( $redux_builder_amp['menu-search'] ) { ?>
                <div class="m-srch">
                    <?php amp_search();?>
                </div>
                <?php } ?>
                <?php if ( true == $redux_builder_amp['menu-social'] ) { ?>
                <div class="m-s-i">
                    <ul>
                        <?php if($redux_builder_amp['enbl-fb']){?>
                        <li>
                            <a title="facebook" class="s_fb" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-fb-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-tw']){?>
                        <li>
                            <a title="twitter" class="s_tw" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-tw-prfl-url']); ?>">
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-gol']){?>
                        <li>
                            <a title="google plus" class="s_gp" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-gol-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-lk']){?>
                        <li>
                            <a title="linkedin" class="s_lk" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-lk-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-pt']){?>
                        <li>
                            <a title="pinterest" class="s_pt" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-pt-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-yt']){?>
                        <li>
                            <a title="youtube" class="s_yt" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-yt-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-inst']){?>
                        <li>
                            <a title="instagram" class="s_inst" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-inst-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-vk']){?>
                        <li>
                            <a title="vkontakte" class="s_vk" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-vk-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-rd']){?>
                        <li>
                            <a title="reddit" class="s_rd" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-rd-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-tbl']){?>
                        <li>
                            <a title="tumblr" class="s_tbl" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-tbl-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
                <?php if( true == $redux_builder_amp['amp-swift-menu-cprt']){?>
                <div class="cp-rgt">
                    <?php amp_non_amp_link(); ?>
                </div>
                <?php } ?>
            </div><!-- /.m-srl -->
        </aside><!--end menu-container-->
        <label for="offcanvas-menu" class="fsc"></label>
        <div class="cntr">
            <div class="head-2 h_m_w">
                <?php  if(ampforwp_get_setting('ampforwp-amp-menu-swift') == true) {?>
                <div class="h-nav">
                   <label for="offcanvas-menu" class="t-btn"></label>
                </div><!-- /.left-nav -->
                <?php } ?>
                <div class="h-logo">
                    <?php amp_logo(); ?>
                </div>
                <div class="h-2">
                   <?php if( ampforwp_get_setting('signin-button-text') && ampforwp_get_setting('signin-button-link') ){?>
                    <div class="h-sing">
                        <a target="_blank" href="<?php echo ampforwp_get_setting('signin-button-link')?>"><?php echo __(ampforwp_get_setting('signin-button-text'), 'accelerated-mobile-pages'); ?></a>
                    </div>
                    <?php } ?>
                    <?php if( isset( $redux_builder_amp['amp-swift-cart-btn'] ) && true == $redux_builder_amp['amp-swift-cart-btn'] ) { ?>
                        <div class="h-shop h-ic">
                            <a href="<?php echo ampforwp_wc_cart_page_url(); ?>" class="isc"></a>
                        </div>
                    <?php } ?>
                    <?php if ( true == $redux_builder_amp['ampforwp-callnow-button'] ) { ?>
                        <div class="h-call h-ic">
                            <a title="call telephone" href="tel:<?php echo esc_attr($redux_builder_amp['enable-amp-call-numberfield']);?>"></a>
                        </div>
                    <?php } ?>    
                </div>
            </div>
        </div>
    </div>
    <?php do_action('ampforwp_header_bottom_design4'); ?>
</header>
<?php } ?>
<?php if($header_type == '3'){?>
<header class="header-3 h_m h_m_1">
    <?php do_action('ampforwp_header_top_design4'); ?>
    <input type="checkbox" id="offcanvas-menu" class="tg" />
    <div class="hamb-mnu">
        <aside class="m-ctr">
            <div class="m-scrl">
                <div class="menu-heading clearfix">
                    <label for="offcanvas-menu" class="c-btn"></label>
                </div><!--end menu-heading-->
                <?php if ( amp_menu(false) ) : ?>
                    <nav class="m-menu">
                       <?php amp_menu();?>
                    </nav><!--end slide-menu -->
                <?php endif; ?>
                <?php do_action('ampforwp_after_amp_menu');?>
                <?php if ( $redux_builder_amp['menu-search'] ) { ?>
                <div class="m-srch">
                    <?php amp_search();?>
                </div>
                <?php } ?>
                <?php if ( true == $redux_builder_amp['menu-social'] ) { ?>
                <div class="m-s-i">
                    <ul>
                        <?php if($redux_builder_amp['enbl-fb']){?>
                        <li>
                            <a title="facebook" class="s_fb" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-fb-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-tw']){?>
                        <li>
                            <a title="twitter" class="s_tw" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-tw-prfl-url']); ?>">
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-gol']){?>
                        <li>
                            <a title="google plus" class="s_gp" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-gol-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-lk']){?>
                        <li>
                            <a title="linkedin" class="s_lk" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-lk-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-pt']){?>
                        <li>
                            <a title="pinterest" class="s_pt" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-pt-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-yt']){?>
                        <li>
                            <a title="youtube" class="s_yt" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-yt-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-inst']){?>
                        <li>
                            <a title="instagram" class="s_inst" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-inst-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-vk']){?>
                        <li>
                            <a title="vkontakte" class="s_vk" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-vk-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-rd']){?>
                        <li>
                            <a title="reddit" class="s_rd" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-rd-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                        <?php if($redux_builder_amp['enbl-tbl']){?>
                        <li>
                            <a title="tumblr" class="s_tbl" target="_blank" href="<?php echo esc_url($redux_builder_amp['enbl-tbl-prfl-url']); ?>"></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
                <?php if( true == $redux_builder_amp['amp-swift-menu-cprt']){?>
                <div class="cp-rgt">
                    <?php amp_non_amp_link(); ?>
                </div>
                <?php } ?>
            </div><!-- /.m-srl -->
        </aside><!--end menu-container-->
        <label for="offcanvas-menu" class="fsc"></label>
        <div class="cntr">
            <div class="head-3 h_m_w">
                <div class="h-logo">
                    <?php amp_logo(); ?>
                </div>
                <div class="h-3">
                    <?php if( true == $redux_builder_amp['amp-swift-search-feature'] ){ ?>
                        <div class="h-srch h-ic">
                            <a class="lb icon-src" href="#search"></a>
                            <div class="lb-btn"> 
                                <div class="lb-t" id="search">
                                   <?php amp_search();?>
                                   <a class="lb-x" href="#"></a>
                                </div> 
                            </div>
                        </div><!-- /.search -->
                    <?php } ?>
                    <?php if( isset( $redux_builder_amp['amp-swift-cart-btn'] ) && true == $redux_builder_amp['amp-swift-cart-btn'] ) { ?>
                        <div class="h-shop h-ic">
                            <a href="<?php echo ampforwp_wc_cart_page_url(); ?>" class="isc"></a>
                        </div>
                    <?php } ?>
                    <?php if ( true == $redux_builder_amp['ampforwp-callnow-button'] ) { ?>
                        <div class="h-call h-ic">
                            <a href="tel:<?php echo esc_attr($redux_builder_amp['enable-amp-call-numberfield']);?>"></a>
                        </div>
                    <?php } ?>
                    <?php  if(ampforwp_get_setting('ampforwp-amp-menu-swift') == true) {?>
                    <div class="h-nav">
                       <label for="offcanvas-menu" class="t-btn"></label>
                    </div><!-- /.left-nav --> 
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php do_action('ampforwp_header_bottom_design4'); ?>
</header>
<?php }
do_action("ampforwp_advance_header_layout_options");
}
 ?>
<div class="content-wrapper">
<?php
if(!ampforwp_levelup_compatibility('hf_builder_head') ){
 if($redux_builder_amp['primary-menu']){?>
<div class="p-m-fl">
<?php if ( amp_alter_menu(false) ) : ?>
  <div class="p-menu">
    <?php amp_alter_menu(true); ?>
  </div>
  <?php endif; ?>
 <?php do_action('ampforwp_after_primary_menu');  ?>
</div>
<?php } 
}?>

