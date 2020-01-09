<!doctype html>
<html>
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
				grecaptcha.render('popupCaptcha', {'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI'});  // test public key
			}

			if($("div").is("#postsCaptcha")){
				grecaptcha.render('postsCaptcha', {'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI'});
			}
		};

	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=en'>
	</script>
	<meta name="viewport" content="width=device-width"/>
</head>
<body <?php body_class(); ?>>
<div id="main-header" class="header-menu">
	<div class="menu-grid-container">
		<a href="https://www.avs4you.com/">
			<div class="logo"></div>
		</a>
		<div class="headLinkWrapper blogLink">
			<a class="headerButton" href="<?php echo site_url() ?>">BLOG</a>	
		</div>		
		<div class="site-navigation-box">
			<div class="nav-item hasSubMenu">
				<p>Video software</p>
				<div class="sub-nav-item">
					<a href="https://www.avs4you.com/video.aspx" target="_blank">
						<h4>AVS Video Editor</h4>
						<span>Easily edit and create videos</span>
					</a>
					<a href="https://www.avs4you.com/avs-free-video-converter.aspx" target="_blank">
						<h4>AVS Video Converter</h4>
						<span>Convert all key video formats</span>
					</a>
					<a href="https://www.avs4you.com/avs-video-remaker.aspx" target="_blank">
						<h4>AVS Video Remaker</h4>
						<span>Edit videos without reconversion</span>
					</a>
				</div>
			</div>
			<div class="nav-item hasSubMenu">
				<p>Audio software</p>
				<div class="sub-nav-item">
					<a href="https://www.avs4you.com/avs-audio-editor.aspx" target="_blank">
						<h4>AVS Audio Editor</h4>
						<span>Easily edit and create audio</span>
					</a>
					<a href="https://www.avs4you.com/avs-audio-converter.aspx" target="_blank">
						<h4>AVS Audio Converter</h4>
						<span>Convert all popular audio formats</span>
					</a>
				</div>
			</div>
			<div class="nav-item hasSubMenu">
				<p>Free software</p>
				<div class="sub-nav-item two-col">
					<a href="https://www.avs4you.com/avs-free-media-player.aspx" target="_blank">
						<h4>AVS Media Player</h4>
						<span>Watch audio and video</span>
					</a>
					<a href="https://www.avs4you.com/avs-free-photo-editor.aspx" target="_blank">
						<h4>AVS Photo Editor</h4>
						<span>Edit and improve photos</span>
					</a>
					<a href="https://www.avs4you.com/avs-free-image-converter.aspx" target="_blank">
						<h4>AVS Image Converter</h4>
						<span>Convert and compress images</span>
					</a>
					<a href="https://www.avs4you.com/avs-free-document-converter.aspx" target="_blank">
						<h4>AVS Document Converter</h4>
						<span>Convert all kinds of documents</span>
					</a>
					<a href="https://www.avs4you.com/avs-free-disc-creator.aspx" target="_blank">
						<h4>AVS Disc Creator</h4>
						<span>Write DVD/CD/Blu-ray discs</span>
					</a>
					<a href="https://www.avs4you.com/avs-free-registry-cleaner.aspx" target="_blank">
						<h4>AVS Registry Cleaner</h4>
						<span>Clean and fix registry errors</span>
					</a>
				</div>
			</div>
			<div class="nav-item">
				<a class="headerSingleLink" href="https://www.avs4you.com/downloads.aspx"><?php pll_e('download') ?></a>
			</div>
			<div class="nav-item">
				<a class="headerSingleLink" href="https://www.avs4you.com/register.aspx">Buy now</a>
			</div>
			<div class="nav-item hasSubMenu">
				<p>Help center</p>
				<div class="sub-nav-item">
					<a href="https://support.avs4you.com/login.aspx?_ga=2.71695190.451887061.1570001201-834643783.1569833768" target="_blank">
						<h4>Support form</h4>
					</a>
					<a href="https://www.avs4you.com/guides/index.aspx" target="_blank">
						<h4>Guides</h4>
					</a>
					<a href="https://onlinehelp.avs4you.com/" target="_blank">
						<h4>Knowledge center</h4>
					</a>
					<a href="https://support.avs4you.com/faq.aspx?_ga=2.125238479.451887061.1570001201-834643783.1569833768" target="_blank">
						<h4>FAQ</h4>
					</a>
				</div>
			</div>
			<div id="backFromSubmenu">back</div>
			<div id="logoMobileMenu"></div>
			<div id="closeMobileMenu">×</div>
		</div>
		<div class="headLinkWrapper">
			<a id="openSupPopup" class="headerButton sub">Subscribe</a>	
		</div>
		<div class="burgerButton">
			<span></span>
		</div>	
<!--	<div class="langBox">
			<div class="langSwitcher" id="langSwitcher"><?php echo pll_current_language('name'); ?></div>
			<div class="langSubBox">
				<?php pll_the_languages(array('show_flags'=>1,'show_names'=>1,'dropdown'=>0));  ?>
			</div>
		</div> -->
	</div>
</div>
<div id="subPopupContainer" class="subPopupContainer">
	<div class="subPopup">
		<div class="closeButtonPopup"></div>
		<h5>Newsletter</h5>
		<div id="subInputBoxPopup" class="inputBox">
			<input class="main-input" id="subscribe-email-popup" />
			<label>Enter your email</label>
			<div class="inputButton">SUBSCRIBE
				<div class="loader"></div>
			</div>
			<p class="errorMessage empty">Email is empty</p>
			<p class="errorMessage incorrect">Email is incorrect</p>
			<p class="errorMessage used">Email is used</p>
		</div>
		<div class="recaptchaContainer">
			<div class="gRecaptcha" id="popupCaptcha"></div> 
            <p class="errorMessage recaptcha">Incorrect recaptcha</p>
        </div>
	</div>

	<div class="subPopup emailSendedBlock">
		<div class="closeButtonPopup"></div>
		<h5>A letter with the confirmation link was sent to you by mail</h5>
		<p>Please check your inbox</p>
	</div>
</div>
<div class="wrapper">