<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?php wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js?hl=' . pll_current_language()) . '&onload=onloadCallback&render=explicit'; ?>
	<?php wp_head(); ?>
	<script type="text/javascript">

		var onloadCallback = function() {

			if($("div").is("#popupCaptcha")){
				grecaptcha.render('popupCaptcha', {'sitekey' : '6LfK5b0UAAAAAHSrY2plGWoWj-V01fIqni2OvRf7'});  // test public key 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
			}																								  // prod key 6LfK5b0UAAAAAHSrY2plGWoWj-V01fIqni2OvRf7

			if($("div").is("#postsCaptcha")){
				grecaptcha.render('postsCaptcha', {'sitekey' : '6LfK5b0UAAAAAHSrY2plGWoWj-V01fIqni2OvRf7'});
			}
		};

	</script>
	<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=en'>
	</script>
	<script type="text/javascript">
    $(document).ready(function(){
        $("#closeMobileMenu").on("click", function(){
        $("body").removeClass("menuOpen");
        $(".nav-item").removeClass("hover");
        $("#backFromSubmenu").removeClass("show");
    });
    });
	
</script>
	<meta name="viewport" content="width=device-width"/>
</head>
<body <?php body_class(); ?>>
<div id="main-header" class="header-menu">
	<div class="menu-grid-container">
		<a href="https://www.avs4you.com<?php pll_e('/') ?>">
			<div class="logo"></div>
		</a>
		<div class="headLinkWrapper blogLink">
			<a class="headerButton" href="<?php echo site_url() ?><?php pll_e('/') ?>"><?php pll_e('AVS-BLOG') ?></a>	
		</div>		
		<div class="site-navigation-box">
			<div class="nav-item hasSubMenu">
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
			<div class="nav-item hasSubMenu">
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
			<div class="nav-item hasSubMenu">
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
			<div class="nav-item hasSubMenu">
				<p><?php pll_e('Help center') ?></p>
				<div class="sub-nav-item">
					<a href="https://support.avs4you.com<?php pll_e('/') ?>login.aspx" target="_blank">
						<h4><?php pll_e('Support form') ?></h4>
					</a>
					<a href="https://www.avs4you.com<?php pll_e('/') ?>guides/index.aspx" target="_blank">
						<h4><?php pll_e('Guides') ?></h4>
					</a>
					<a href="https://onlinehelp.avs4you.com<?php pll_e('/') ?>" target="_blank">
						<h4><?php pll_e('Knowledge center') ?></h4>
					</a>
					<a href="https://support.avs4you.com<?php pll_e('/') ?>faq.aspx" target="_blank">
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
<div id="subPopupContainer" class="subPopupContainer">
	<div class="subPopup">
		<div class="closeButtonPopup"></div>
		<h5><?php pll_e('Newsletter') ?></h5>
		<div id="subInputBoxPopup" class="inputBox">
			<input class="main-input" id="subscribe-email-popup" />
			<label><?php pll_e('Enter your email') ?></label>
			<div class="inputButton"><?php pll_e('Subscribe') ?>
				<div class="loader"></div>
			</div>
			<p class="errorMessage empty"><?php pll_e('Email is empty') ?></p>
			<p class="errorMessage incorrect"><?php pll_e('Email is incorrect') ?></p>
			<p class="errorMessage used"><?php pll_e('Email is used') ?></p>
		</div>
		<div class="recaptchaContainer">
			<div class="gRecaptcha" id="popupCaptcha"></div> 
            <p class="errorMessage recaptcha"><?php pll_e('Incorrect recaptcha') ?></p>
        </div>
	</div>

	<div class="subPopup emailSendedBlock">
		<div class="closeButtonPopup"></div>
		<h5><?php pll_e('A letter with the confirmation link was sent to you by mail') ?></h5>
		<p><?php pll_e('Please check your inbox') ?></p>
	</div>
</div>
<div class="wrapper">