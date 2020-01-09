<?php
    /**
     * The template for displaying Author Archive pages.
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
<div class="MainContainer">
    <div id="container" class="pageContent">
        <div id="content" role="main">
            <header class="archive-header">
                <h1 class="page-title author"><?php pll_e('autor'); ?>: <?php the_author(); ?></h1>
            </header>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php include 'main-content.php'; ?>
            <?php endwhile;  ?>
        </div><!-- #content -->
    </div><!-- #container -->
</div>
<?php get_footer(); ?>
