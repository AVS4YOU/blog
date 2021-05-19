<?php
/**
* @package WordPress
* @subpackage Theme_Compat
* @deprecated 3.0
*
* This file is here for Backwards compatibility with old themes and will be removed in a future version
*
*/
_deprecated_file(
/* translators: %s: template name */
sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
'3.0',
null,
/* translators: %s: template name */
sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
);
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.'); ?></p>
<?php
return;
}
?>
 
<!-- You can start editing here. -->
 
<?php if ( have_comments() ) : ?>
<h3 class="comments-header" id="comments">
<?php
if ( 1 == get_comments_number() ) {
/* translators: %s: post title */
printf( __( 'One response to %s' ), '&#8220;' . get_the_title() . '&#8221;' );
} else {
/* translators: 1: number of comments, 2: post title */
printf( _n( '%1$s response to %2$s', '%1$s responses to %2$s', get_comments_number() ),
number_format_i18n( get_comments_number() ), '&#8220;' . get_the_title() . '&#8221;' );
}
?>
</h3>
 
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
 
<div class="commentlist">
    <?php
        /* Loop through and list the comments. Tell wp_list_comments()
         * to use avsblog_comment() to format the comments.
         * If you want to overload this in a child theme then you can
         * define avsblog_comment() and that will be used instead.
         * See avsblog_comment() in tmblog/functions.php for more.
         */
        wp_list_comments( array( 'callback' => 'avsblog_comment') );
    ?>
</div>
 
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php else : // this is displayed if there are no comments so far ?>
 
<?php if ( comments_open() ) : ?>
<!-- If comments are open, but there are no comments. -->
 
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments"><?php _e('Comments are closed.'); ?></p>
 
<?php endif; ?>
<?php endif; ?>
 
<?php //comment_form(); ?>
<?php
$fields = array(
'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . ($req ? '<span class="required">*</span>' : '') . '</label><br><input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></p>',
'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email') . ($req ? '<span class="required">*</span>' : '') . '</label><br><input type="email" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="admin@stepkinblog.ru" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '></p>',
'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label><br><input type="url" id="url" name="url" class="site" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="stepkinblog.ru" maxlength="30" tabindex="3" autocomplete="on"></p>'
); ?>

 
<!-- <comment form>  -->
<div id="respond">
    <div class="respond-header">
    <?php $addComment = pll__('add a comment') ?>
    <?php $addCommentTo = pll__('add a comment to') ?>
        <h3 class="respond-title"><?php comment_form_title( $addComment, $addCommentTo . ' %s' ); ?></h3>
    </div>
    <div id="cancel-comment-reply">
        <small><?php cancel_comment_reply_link() ?></small>
    </div>
    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if ( is_user_logged_in() ) : ?>
        <p><?php printf(__('Logged in as <a class="account-name" href="%1$s">%2$s</a>'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?><a class="logout" href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account'); ?>"><?php _e('Log out &raquo;'); ?></a></p>
        <?php else : ?>
        <p class="author">
            <label for="author"><?php _e('Name:'); ?>&nbsp;<?php if ($req) _e('<span class="important">*</span>'); ?></label>
            <div class="textinput"><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo "aria-required='true'"; ?> /></div>
        </p>
        <p class="email">
            <label for="email"><?php _e('E-mail (will not be published):'); ?>&nbsp;<?php if ($req) _e('<span class="important">*</span>'); ?></label>
            <div class="textinput"><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo "aria-required='true'"; ?> /></div>
        </p>
        <?php endif; ?>
        <p class="message">
            <label for="comment"><?php _e('Message:'); ?></label>
            <div class="textarea"><textarea name="comment" id="comment"></textarea></div>
        </p>
        <?php do_action('comment_form', $post->ID); ?>
        <?php       
             echo do_shortcode('[recaptcha_field]');
        ?>
        <p class="submit">
            <input name="submit" type="submit" id="commentformsubmit" value="<?php _e('Add comment'); ?>" class="button gray" /><?php comment_id_fields(); ?>
        </p>
    </form>
    <?php endif; // If registration required and not logged in ?>
</div>
<!-- </comment form> -->
