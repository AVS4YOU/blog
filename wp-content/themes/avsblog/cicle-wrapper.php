<div class="postWrapper cicleWrapper" onclick="window.location='<?php the_permalink(); ?>'">

    <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail('full');
    }
    ?>

    <div class="postThemeHeaderBox">
        <a class="postThemeHeader mainPage" href="<?php the_permalink(); ?>">
            <h1 class="postThemeHeader mainPage"><?php the_title(); ?></h1>
        </a>
        <div class="post-info-block cicleBlock">
            <?php include 'blog-meta.php' ?>
        </div>
    </div>
</div>