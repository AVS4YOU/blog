<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<div class="left-menu">
  <div class="left-menu-block">
    <a class="header-link" href="https://www.avs4you.com/video.aspx">Video Software</a>
    <div class="secondary-links-block">
      <a href="https://www.avs4you.com/avs-video-editor.aspx" target="_blank">AVS Video Editor</a><br/>
      <a href="https://www.avs4you.com/avs-free-video-converter.aspx" target="_blank">AVS Video Converter</a><br/>
      <a href="https://www.avs4you.com/avs-video-remaker.aspx" target="_blank">AVS Video ReMaker</a><br/>
    </div>
  </div>
  <div class="left-menu-block">
    <a class="header-link audio" href="https://www.avs4you.com/audio.aspx">Audio Software</a>
    <div class="secondary-links-block">
      <a href="https://www.avs4you.com/avs-audio-editor.aspx" target="_blank">AVS Audio Editor</a><br/>
      <a href="https://www.avs4you.com/avs-audio-converter.aspx" target="_blank">AVS Audio Converter</a><br/>
    </div>
  </div>
  <div class="left-menu-block">
    <a class="header-link free" href="https://www.avs4you.com/video.aspx">Free Software</a>
    <div class="secondary-links-block">
      <a href="https://www.avs4you.com/avs-free-video-converter.aspx" target="_blank">AVS Video Converter</a><br/>
      <a href="https://www.avs4you.com/avs-media-player.aspx" target="_blank">AVS Media Player</a><br/>
      <a href="https://www.avs4you.com/avs-photo-editor.aspx" target="_blank">AVS Photo Editor</a><br/>
      <a href="https://www.avs4you.com/avs-image-converter.aspx" target="_blank">AVS Image Converter</a><br/>
      <a href="https://www.avs4you.com/avs-document-converter.aspx" target="_blank">AVS Document Converter</a><br/>
      <a href="https://www.avs4you.com/avs-disc-creator.aspx" target="_blank">AVS Disc Creator</a><br/>
      <a href="https://www.avs4you.com/avs-registry-cleaner.aspx" target="_blank">AVS Registry Cleaner</a><br/>
    </div>
  </div>
</div>
<div id="primary" class="widget-area">
	<div class="primary-widget">
    <?php
      /* When we call the dynamic_sidebar() function, it'll spit out
      * the widgets for that widget area. If it instead returns false,
      * then the sidebar simply doesn't exist, so we'll hard-code in
      * some default sidebar stuff just in case.
      */
    ?>
    <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

    <?php endif; // end primary widget area ?>
  </div>
</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
