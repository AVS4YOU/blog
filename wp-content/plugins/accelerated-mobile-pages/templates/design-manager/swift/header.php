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
<!--<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
<script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js" async></script>-->
<header class="headerbar">
<div class="headerMenuBar">
  <div role="button" on="tap:sidebar1.toggle" tabindex="0" class="hamburger">☰</div>
  <div id="header-img-amp">
  <a href="https://www.avs4you.com<?php pll_e('/') ?>" class="hrefMenuLogo"><amp-img 
				class="footerLogo"
				width="60"
				height="20"
				src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2OSIgaGVpZ2h0PSI0MCIgdmlld0JveD0iMCAwIDY5IDQwIj48ZGVmcz48c3R5bGU+LmF7ZmlsbDojZmZmO2ZpbGwtcnVsZTpldmVub2RkO308L3N0eWxlPjwvZGVmcz48cGF0aCBjbGFzcz0iYSIgZD0iTTI2LjI1NywwQTE5LjYzNiwxOS42MzYsMCwwLDEsNDEuNDIzLDcuMTcxbC0uMDIxLjAyTDM4Ljc1Myw3LjAxbDQuMzI1LDcuMTQzLDAsNS4yMzFoMi4yNDJWMTQuN2MtLjAzNC0uMTI2LS4wNy0uMjUzLS4xMDYtLjM3OGwwLS4wMTUsMC0uMDEzLDAtLjAxNXYwbDAtLjAwOCwwLS4wMTUsMC0uMDEzLDAtLjAxdjBsMC0uMDEzLDAtLjAxNXYwbDAtLjAxMiwwLS4wMTQsMC0uMDEzaDBsLS4wMDgtLjAyNywwLS4wMTNoMGwtLjAwNy0uMDI0djBsMC0uMDE0LDAtLjAxNSwwLS4wMTNoMGwwLS4wMTMtLjAwOC0uMDI3aDBWMTRsLS4wMDYtLjAxOXYwbDAtLjAxMy0uMDA4LS4wMjcsMC0uMDE1LS4wMi0uMDYzdi0uMDA1bDAtLjAxNCwwLS4wMTMsMC0uMDE0aDBsMC0uMDE0aDBsLS4wMDktLjAyN3YtLjAwNWwwLS4wMDksMC0uMDE0LS4wMDctLjAyM2gwdjBsLS4wMjItLjAyMSwwLS4wMTN2MGwtLjAwNi0uMDE5TDQ1LDEzLjYzNWwwLS4wMDcsMC0uMDA3LDAtLjAxNC0uMDE4LS4wNTUsMC0uMDE1aDBsMC0uMDEyLS4wMDktLjAyNywwLS4wMDgtLjAwNi0uMDEtLjAxMy0uMDRjLS4xOTQtLjU2Ny0uNDExLTEuMTIyLS42NTUtMS42NjVsLS4wOS4xNTdMNDYuOTIyLDcuMTloMi43NTdsLTQuMzU3LDYuOTYyVjE0LjdhMjAuMTE3LDIwLjExNywwLDAsMS04LjM2NCwyMi4xMTRBMTkuNTgyLDE5LjU4MiwwLDAsMSwxMy42LDM1LjM2Mmw0LjIyOC0xMS4zMzdIMTUuMjY0bC0yLjkzMyw4LjUyMUw5LjMsMjQuMDI3SDYuOWEyMC4xOTQsMjAuMTk0LDAsMCwxLDQuMDQ5LTE2LjY2QTE5LjY5MSwxOS42OTEsMCwwLDEsMjYuMjU3LDBaTTEwLjMxNywzNS41MzksNi4yLDI0LjA1NEg0TDAsMzUuNTM5SDIuMmwuODQ3LTIuNjA4SDcuMTZsLjksMi42MDhaTTYuNDk0LDMwLjk5NSw1LjA3NywyNi43MzMsMy42ODksMzAuOTk1Wk00OC4zNzUsMTMuNDE2YTYuMjQxLDYuMjQxLDAsMCwwLDEuNTYsNC41LDUuNTQ1LDUuNTQ1LDAsMCwwLDQuMiwxLjYzMSw1LjQ3Niw1LjQ3NiwwLDAsMCw0LjE2OS0xLjY0QTUuNCw1LjQsMCwwLDAsNTkuNiwxNS41NmE5LjM2MSw5LjM2MSwwLDAsMCwuMTc4LDEuMzIsMy4yODIsMy4yODIsMCwwLDAsLjY3LDEuMzI5LDMuNjY5LDMuNjY5LDAsMCwwLDEuMzg1LDEuMDI5LDYuNDM2LDYuNDM2LDAsMCwwLDIuNTc0LjQsNS45ODcsNS45ODcsMCwwLDAsMi4yODItLjM2MywzLjY3MSwzLjY3MSwwLDAsMCwxLjM5NS0uOTc1LDMuNDE3LDMuNDE3LDAsMCwwLC43MTQtMS41MDYsMTYuNDEsMTYuNDEsMCwwLDAsLjE5Mi0zLjA1VjcuNDRINjYuNnY2LjYzYTEzLjA2NSwxMy4wNjUsMCwwLDEtLjEwOSwyLjA0MSwxLjY0NiwxLjY0NiwwLDAsMS0uNjE4LDEuMDMxLDIuMzg5LDIuMzg5LDAsMCwxLTEuNTM2LjQyMSwyLjUyMiwyLjUyMiwwLDAsMS0xLjU4Mi0uNDQ2LDEuOTQsMS45NCwwLDAsMS0uNzMyLTEuMTgsMTMuNjYyLDEzLjY2MiwwLDAsMS0uMDg3LTIuMDA3VjcuNDRINTkuNTQ4djMuNTIzQTUuMzMzLDUuMzMzLDAsMCwwLDU4LjMsOC43OWE1LjUxNyw1LjUxNywwLDAsMC00LjE5MS0xLjY0Nyw2LjM3LDYuMzcsMCwwLDAtMi41NTQuNDc3LDQuNjE0LDQuNjE0LDAsMCwwLTEuNTMzLDEuMDc0LDUuNzYsNS43NiwwLDAsMC0xLjEwNSwxLjY0OCw3LjY4OSw3LjY4OSwwLDAsMC0uNTQxLDMuMDc2Wm0yLjQ2NS0uMDhhNC41NTgsNC41NTgsMCwwLDEsLjkwNS0zLjA5NCwzLjI4MywzLjI4MywwLDAsMSw0Ljc1OS0uMDE1QTQuNTY3LDQuNTY3LDAsMCwxLDU3LjQsMTMuM2E0LjYxNCw0LjYxNCwwLDAsMS0uOTE3LDMuMTI4LDMuMTczLDMuMTczLDAsMCwxLTQuNzEtLjAwNSw0LjU0Myw0LjU0MywwLDAsMS0uOTMtMy4wODlabS01LjkuMTA3LjI4Ljg4NCwwLS4wMTUsMC0uMDEzLDAtLjAxNXYwbDAtLjAwOCwwLS4wMTUsMC0uMDEzLDAtLjAxdjBsMC0uMDEzLDAtLjAxNXYwbDAtLjAxMiwwLS4wMTQsMC0uMDEzaDBsLS4wMDgtLjAyNywwLS4wMTNoMGwtLjAwNy0uMDI0djBsMC0uMDE0LDAtLjAxNSwwLS4wMTNoMGwwLS4wMTMtLjAwOC0uMDI3aDBWMTRsLS4wMDYtLjAxOXYwbDAtLjAxMy0uMDA4LS4wMjcsMC0uMDE1LS4wMi0uMDYzdi0uMDA1bDAtLjAxNCwwLS4wMTMsMC0uMDE0aDBsMC0uMDE0aDBsLS4wMDktLjAyN3YtLjAwNWwwLS4wMDksMC0uMDE0LS4wMDctLjAyM2gwdjBsLS4wMjEtLjAyMSwwLS4wMTN2MGwtLjAwNi0uMDE5TDQ1LDEzLjYzNWwwLS4wMDcsMC0uMDA3LDAtLjAxNC0uMDE4LS4wNTUsMC0uMDE1aDBsMC0uMDEyLS4wMDktLjAyNywwLS4wMDgtLjAwNi0uMDEtLjAxMy0uMDRaTTE3Ljc3OSwzMi4wODJhNC44LDQuOCwwLDAsMCwxLjE4NiwyLjk4OUEzLjgsMy44LDAsMCwwLDIxLjgyMSwzNi4xYTQuNzQyLDQuNzQyLDAsMCwwLDIuMTM0LS40MjcsMi45OTMsMi45OTMsMCwwLDAsMS4zMjMtMS4zMDcsMy45MTgsMy45MTgsMCwwLDAsLjQ2OS0xLjg4Miw0LjA2Myw0LjA2MywwLDAsMC0uMzg4LTEuODY1LDMuMDU4LDMuMDU4LDAsMCwwLTEuMDg2LTEuMTkxLDguNjY2LDguNjY2LDAsMCwwLTIuMTQtLjg0LDQuNzMyLDQuNzMyLDAsMCwxLTEuODE5LS43ODMuOTcuOTcsMCwwLDEtLjI5NC0uNzEyLjkwOC45MDgsMCwwLDEsLjMxNS0uNzI1LDEuOTc5LDEuOTc5LDAsMCwxLDEuMzUtLjQyNCwxLjc3NCwxLjc3NCwwLDAsMSwxLjI1Mi4zOTVjLjI3OS4yNjUuMjg4LjU5MS4zNzEsMS4xOTNoMi4xNTVhMy43NTIsMy43NTIsMCwwLDAtLjk3OS0yLjU4MiwzLjcwNiwzLjcwNiwwLDAsMC0yLjc4Mi0uOTYzLDQuMjM1LDQuMjM1LDAsMCwwLTEuOTI5LjQwNywyLjgsMi44LDAsMCwwLTEuMjIzLDEuMTg2LDMuNDQ2LDMuNDQ2LDAsMCwwLS40MjQsMS42NzIsMy4zMTcsMy4zMTcsMCwwLDAsLjksMi4zNTQsNSw1LDAsMCwwLDIuMjM0LDEuMTY1Yy44MjIuMjQ2LDEuMzUyLjQxNSwxLjU4My41MTFhMS41MjksMS41MjksMCwwLDEsLjcwOS41MDUsMS4xNzEsMS4xNzEsMCwwLDEsLjIxLjcwNywxLjU0MSwxLjU0MSwwLDAsMS0uNDg4LDEuMTI5LDEuOTQ1LDEuOTQ1LDAsMCwxLTEuNDM5LjQ4NiwxLjkwOSwxLjkwOSwwLDAsMS0xLjQzMi0uNTQ2LDIuMjM1LDIuMjM1LDAsMCwxLS41NTEtMS40NzJabTEyLjk5NS01Ljc1M2g0LjM3MlYyMS41MzdoMi45MjFWMTcuNTE5SDM1LjE0NVYyLjRIMzEuMzU2TDIxLjEzMywxNy41MzN2NGg5LjY0Wm0wLTguODExVjkuMzcxbC01LjQxMiw4LjE0N1oiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC4wMDEpIi8+PC9zdmc+'>
			
				</amp-img></a>
    </div>
  <?php if ($redux_builder_amp['menu-search'] ) { ?>
                    <div class="m-srch">
                        <?php amp_search();?>
                    </div>
                <?php } ?>
                <div class="h-1">
                    <?php if( true == $redux_builder_amp['amp-swift-search-feature'] ){ ?>
                        <div class="h-srch h-ic">
                            <a title="search" class="lb icon-src" href="#search"></a>
                            <div class="lb-btn"> 
                                <div class="lb-t" id="search">
                                   <?php amp_search();?>
                                   <a title="close" class="lb-x" href="#"></a>
                                </div> 
                            </div>
                        </div><!-- /.search -->
                    <?php } ?>
                    <?php if( isset( $redux_builder_amp['amp-swift-cart-btn'] ) && true == $redux_builder_amp['amp-swift-cart-btn'] ) { ?>
                        <div class="h-shop h-ic">
                            <a href="<?php echo esc_url(ampforwp_wc_cart_page_url()); ?>" class="isc"></a>
                        </div>
                    <?php } ?>
                    <?php if ( true == $redux_builder_amp['ampforwp-callnow-button'] ) { ?>
                        <div class="h-call h-ic">
                            <a title="call telephone" href="tel:<?php echo esc_attr($redux_builder_amp['enable-amp-call-numberfield']);?>"></a>
                        </div>
                    <?php } ?> 
                </div>
                <div class="clearfix"></div>
	</div>
</header>
<amp-sidebar id="sidebar1" layout="nodisplay" side="left" class="sidebarMenu">
  <amp-nested-menu layout="fill">
  <div role="button" aria-label="close sidebar" on="tap:sidebar1.toggle" tabindex="0" class="close-sidebar">✕</div>
    <ul class="sidebar">
      <li>
        <h4 amp-nested-submenu-open><?php pll_e('Video software') ?></h4>
        <div amp-nested-submenu>
          <ul class="sidebarSubMenu">
            <li>
              <h4 amp-nested-submenu-close>Go back</h4>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-video-editor.aspx" target="_blank">
					<h4><?php pll_e('AVS Video Editor') ?></h4>
					<span><?php pll_e('Easily edit and create videos') ?></span>
			</a>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-video-converter.aspx" target="_blank">
					<h4><?php pll_e('AVS Video Converter') ?></h4>
					<span><?php pll_e('Convert all key video formats') ?></span>
			</a> 
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-video-remaker.aspx" target="_blank">
					<h4><?php pll_e('AVS Video Remaker') ?></h4>
					<span><?php pll_e('Edit videos without reconversion') ?></span>
			</a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <h4 amp-nested-submenu-open><?php pll_e('Audio software') ?></h4>
        <div amp-nested-submenu>
          <ul class="sidebarSubMenu">
            <li>
              <h4 amp-nested-submenu-close>Go back</h4>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-audio-editor.aspx" target="_blank">
					<h4><?php pll_e('AVS Audio Editor') ?></h4>
					<span><?php pll_e('Easily edit and create audio') ?></span>
			</a>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-audio-converter.aspx" target="_blank">
					<h4><?php pll_e('AVS Audio Converter') ?></h4>
					<span><?php pll_e('Convert all popular audio formats') ?></span>
			</a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <h4 amp-nested-submenu-open><?php pll_e('Free software') ?></h4>
        <div amp-nested-submenu>
          <ul class="sidebarSubMenu">
            <li>
              <h4 amp-nested-submenu-close>Go back</h4>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-media-player.aspx" target="_blank">
					<h4><?php pll_e('AVS Media Player') ?></h4>
					<span><?php pll_e('Watch audio and video') ?></span>
			</a>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-photo-editor.aspx" target="_blank">
					<h4><?php pll_e('AVS Photo Editor') ?></h4>
					<span><?php pll_e('Edit and improve photos') ?></span>
			</a>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-image-converter.aspx" target="_blank">
					<h4><?php pll_e('AVS Image Converter') ?></h4>
					<span><?php pll_e('Convert and compress images') ?></span>
			</a>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-document-converter.aspx" target="_blank">
					<h4><?php pll_e('AVS Document Converter') ?></h4>
					<span><?php pll_e('Convert all kinds of documents') ?></span>
			</a>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-disc-creator.aspx" target="_blank">
					<h4><?php pll_e('AVS Disc Creator') ?></h4>
					<span><?php pll_e('Write DVD/CD/Blu-ray discs') ?></span>
			</a>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>avs-free-registry-cleaner.aspx" target="_blank">
					<h4><?php pll_e('AVS Registry Cleaner') ?></h4>
					<span><?php pll_e('Clean and fix registry errors') ?></span>
			</a>
            </li>
          </ul>
        </div>
      </li>
      <li>
      <a class="headerSingleLink" href="https://www.avs4you.com<?php pll_e('/') ?>downloads.aspx"><?php pll_e('Download') ?></a>
      </li>
      <li>
      <a class="headerSingleLink" href="https://www.avs4you.com<?php pll_e('/') ?>register.aspx"><?php pll_e('buy now') ?></a>
      </li>
      <li>
        <h4 amp-nested-submenu-open><?php pll_e('Help center') ?></h4>
        <div amp-nested-submenu>
          <ul class="sidebarSubMenu">
            <li>
              <h4 amp-nested-submenu-close>Go back</h4>
            </li>
            <li>
            <a href="https://support.avs4you.com<?php pll_e('/') ?>login.aspx" target="_blank">
					<h4><?php pll_e('Support form') ?></h4>
			</a>
            </li>
            <li>
            <a href="https://www.avs4you.com<?php pll_e('/') ?>guides/index.aspx" target="_blank">
					<h4><?php pll_e('Guides') ?></h4>
			</a>
            </li>
            <li>
            <a href="https://onlinehelp.avs4you.com/" target="_blank">
					<h4><?php pll_e('Knowledge center') ?></h4>
			</a>
            </li>
            <li>
            <a href="https://support.avs4you.com/faq.aspx" target="_blank">
					<h4><?php pll_e('FAQ') ?></h4>
			</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </amp-nested-menu>
</amp-sidebar>
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

