<div class="metaDataHead">
    <span class="autor">By <?php echo get_the_author() ?></span>
    <span class="date"><?php echo get_the_date('j F Y'); ?></span>
    <span class="comments"><a class="countOfViews" href="<?php echo the_permalink(); ?>#disqus_thread">0</a></span>
    <span class="views"><?php do_action( 'pageviews' ); ?></span>
</div>

