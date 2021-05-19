<?php

/**
 * Template Name: posts
 *
 
 */

get_header(); ?>


<?php
// запрос

$news_cat_id = get_cat_ID('news'); 
$news_post_cat_id = get_cat_ID('news-post'); 

$argsSticky = [
	'posts_per_page' => 1,
	'post__in' => get_option('sticky_posts'),
	'ignore_sticky_posts' => 1,
	'category__not_in' => $news_cat_id
];

$argsNews = 
	[
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'category__in' => [$news_cat_id, $news_post_cat_id]
	];

$querySticky = new WP_Query($argsSticky);
$queryNews = new WP_Query($argsNews);

get_search_form();
?>
<?php if ($querySticky->have_posts()) : ?>
	<!-- the loop -->
	<div class="headerWrapper">
		<?php while ($querySticky->have_posts()) : $querySticky->the_post(); ?>
			<div class="postWrapper" onclick="window.location='<?php the_permalink(); ?>'">

				<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail('full');
					}
				?>

				<div class="postThemeHeaderBox">
					<a class="postThemeHeader mainPage" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
					<div class="post-info-block">
						<?php include get_template_directory() . '/' . 'blog-meta.php' ?>
					</div>
				</div>
			</div>


			<div class="newsBlock">
				<div>
					<h1>NEWS</h1>
					<div class="shortNewsWrapper">
						<?php if ($queryNews->have_posts()) : ?>
							<?php while ($queryNews->have_posts()) : $queryNews->the_post(); ?>
								<div class="postWrapper" onclick="window.location='<?php the_permalink(); ?>'">
									<div class="postThemeHeaderBox">
										<a class="postThemeHeader newsPreview" href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</div>
									<div class="metaDataHead">
										<span class="date"><?php echo get_the_date('j F Y'); ?></span>
									</div>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

						<?php endif; ?>
					</div>
					<a href="<?php echo (site_url() . "/news") ?>" class="main_button news">All news</a>
				</div>
			</div>

		<?php endwhile; ?>
	</div>

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php pll_e('Sorry, no posts matched your query'); ?>.</p>
<?php endif; ?>

<?php 

	$args = [
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 10,
		'category__not_in' => $news_cat_id
	];

	$wp_query = new WP_Query($args); 
	   
 	if ($wp_query->have_posts()) : ?>

	<div class="wrapperMain">

		<?php $countOfPosts = 0; 
			  $countOfCountSub = 0?>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

			<?php
				if ($countOfPosts > 0) :
					$countOfPosts = $countOfPosts + 1;
			?>

			<?php include get_template_directory() . '/' . 'cicle-wrapper.php' ?>

			<?php if (($countOfPosts == 7 || $countOfPosts == $wp_query->post_count) && $countOfCountSub == 0) : ?>
				</div>
				<?php include get_template_directory() . '/' . 'subscribe-block.php' ?>
				<?php $countOfCountSub = $countOfCountSub + 1 ?>
				<div class="wrapperMain">
			<?php endif; ?>

			<?php else : ?>
				<?php $countOfPosts = $countOfPosts + 1; ?>
			<?php endif; ?>
		<?php endwhile; ?>

		<?php if ($wp_query->max_num_pages > 1) : ?>
			<script>
				var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
				var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
			<div class="main_button" id="true_loadmore">Load more</div>

		<?php endif; ?>
	</div>

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php pll_e('Sorry, no posts matched your query'); ?>.</p>
<?php endif; ?>

<?php get_footer(); ?>