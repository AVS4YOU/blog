<?php get_header(); ?>

<div class="oneColumnSearch">
	<?php get_search_form(); ?>
</div>


<?php
$s = get_search_query();
$args = array(
  's' => $s
);
?>

<?php
$news_cat_id = get_cat_ID('news');

$the_query = new WP_Query($args); ?>

<?php if ($the_query->have_posts()) : ?>

<div class="wrapperColumn">
		<a class="linkToHome inCicle" href=<?php echo site_url() ?><?php pll_e('/') ?>><?php pll_e('Back to main page') ?></a>
		<h1>Searching results</h1>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div class="postWrapper" onclick="window.location='<?php the_permalink(); ?>'">
				<div class="data-block">
					<span class="gray-text data"><?php the_time('j F Y'); ?></span>
				</div>
				<div class="postThemeHeaderBox">
					<a class="postThemeHeader oneColumn" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
					<?php
						
					$content = get_post_field('post_content', get_the_ID());
					$content = preg_replace('/(<)([img])(\w+)([^>]*>)/', "", $content);
					$content_parts = get_extended($content); ?>

					<div class="prevContent"><?php echo $content_parts['main']; ?></div>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- end of the loop -->
		<?php if ($wp_query->max_num_pages > 1) : ?>
			<script>
				var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
				var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
			<div id="true_loadmore"><?php pll_e('Load more') ?></div>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>

		<?php endif; ?>
	</div>

<?php else : ?>
  <p><?php pll_e('Sorry, no posts matched your query'); ?>.</p>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

<h1 class="otherNewsHeader"><?php pll_e('Other interesting news') ?></h1>


<?php $wp_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 6, 'category__not_in' => $news_cat_id)); ?>
	<?php if ($wp_query->have_posts()) : ?>

	<div class="wrapperMain">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<?php include get_template_directory() . '/' . 'cicle-wrapper.php' ?>
		<?php endwhile; ?>
	</div>
	<?php wp_reset_postdata(); ?>

	<?php endif; ?>


<?php get_footer(); ?>