<div class="wrapperColumn single">
    <a class="linkToHome" href=<?php echo site_url() ?>>BLOG / AVS4YOU</a>
    <div class="postThemeHeaderBox">
        <div class="post-info-block">
            <?php include 'blog-meta.php' ?>
        </div>
        <a class="postThemeHeader" href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
        </a>
    </div>
    <p><?php the_content(); ?></p>
</div>

