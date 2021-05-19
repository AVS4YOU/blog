<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<div id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php include 'main-content.php'; ?>
				<div class="commentsWrapper">
					<?php comments_template() ?>
				</div>

			<?php endwhile;  ?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
