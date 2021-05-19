<?php
    /**
     * The template for displaying Category Archive pages.
     *
     * @package WordPress
     * @subpackage Twenty_Ten
     * @since Twenty Ten 1.0
     */
    get_header();
?>
<div class="sideBar">
        <?php //get_search_form(); ?>
        <div class="border_center">
            <?php get_sidebar(); ?>
        </div>
    </div>
<div>
<section id="primary" class="site-content">
    <div id="content" role="main">
        <?php 
        // Check if there are any posts to display
        if ( have_posts() ) : ?>
        
        <header class="archive-header">
        <h1 class="archive-title"><?php pll_e('category'); ?>: <?php single_cat_title(); ?></h1>
        </header>
        
        <?php while ( have_posts() ) : the_post(); ?>
            <?php include 'main-content.php'; ?>
        <?php endwhile;  ?>
        
        <?php else: ?>
        <p>Sorry, no posts matched your criteria.</p>      
        
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
