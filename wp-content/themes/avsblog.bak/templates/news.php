<?php

/**
 * Template Name: news
 **/

get_header(); ?>

<div class="oneColumnSearch">
	<?php get_search_form(); ?>
</div>

<?php $news_cat_id = get_cat_ID('news'); 
	$news_post_cat_id = get_cat_ID('news-post'); 

$args = [
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'category__in' => [$news_cat_id, $news_post_cat_id]
];

$template = get_template();

?>

<?php $wp_query = new WP_Query($args); ?>
<?php if ($wp_query->have_posts()) : ?>
	<div class="wrapperColumn">

	<?php	
		$countOfPosts = 0; 
		$countOfCountSub = 0
	?>

		<a class="linkToHome inCicle" href=<?php echo site_url() ?>>BACK TO MAIN PAGE</a>
		<h1>News</h1>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		
			<div class="postWrapper" onclick="window.location='<?php the_permalink(); ?>'">
				
				<div class="data-block">
					<div class="specialWrapper">
						<span class="gray-text data"><?php the_time('j F Y'); ?></span>
					</div>
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

				<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail('full');
					}
				?>
			</div>
			<?php if (($countOfPosts == 1 || $countOfPosts == $wp_query->post_count) && $countOfCountSub == 0) : ?>
				</div>
				<div class="newsSubWrapper">
					<?php include get_template_directory() . '/' . 'subscribe-block.php' ?>
				</div>
				<?php $countOfCountSub = $countOfCountSub + 1 ?>
				<div class="wrapperColumn afterSub">
			<?php endif; ?>

			<?php $countOfPosts = $countOfPosts + 1; ?>

		<?php endwhile; ?>
		<!-- end of the loop -->
		<?php if ($wp_query->max_num_pages > 1) : ?>
			<script>
				var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
				var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
			<div id="true_loadmore">Load more</div>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>

		<?php endif; ?>
	</div>

<?php else : ?>
	<p><?php pll_e('Sorry, no posts matched your query'); ?>.</p>
<?php endif; ?>


<h1 class="otherNewsHeader">Other interesting news</h1>

<?php 

	$argsOther = [ 
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 10,
		'category__not_in' => $news_cat_id
	];

	$wp_query = new WP_Query($argsOther); ?>
	<?php if ($wp_query->have_posts()) : ?>

	<div class="wrapperMain">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<?php include get_template_directory() . '/' . 'cicle-wrapper.php' ?>
		<?php endwhile; ?>
	</div>
	<?php wp_reset_postdata(); ?>

	<?php endif; ?>
	

<?php get_footer(); ?>