<?php
function enqueue_styles()
{
    wp_enqueue_style('whitesquare-style', get_stylesheet_uri());
    wp_register_style('font-style', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap');
    wp_enqueue_style('font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts()
{
    wp_enqueue_script('html5-shim');
    wp_enqueue_script('jquery');
    wp_enqueue_script('common-avs', get_template_directory_uri() . '/js/common-avs.js', 'jquery', '3.0', false);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
add_filter('show_admin_bar', '__return_false');

add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
add_action('wp_ajax_send_confirmation_email', 'send_confirmation_email');
add_action('wp_ajax_nopriv_send_confirmation_email', 'send_confirmation_email');

add_action('wp_head', 'kama_postviews');
add_action('wp_head', 'js_variables');

add_action('after_setup_theme', function () {
    add_theme_support('pageviews');
});

/*************Functions*************/

function send_confirmation_email()
{
    global $wpdb;
    $responce = (object) ['errorMsg' => ''];

    if (!verify_recaptcha($_POST['recaptchaResp'])) {
        $responce->errorMsg = "Incorrect recaptcha";

        echo json_encode($responce);
        wp_die();
    }

    if (!empty($_POST['email']) && isset($_POST['email'])) {

        $email = $_POST['email'];

        $regex = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i';

        if (preg_match($regex, $email) && strlen($email) < 50) {

            $count = $wpdb->get_var("SELECT email FROM users WHERE email='$email'");

            if (empty($count) && !isset($count)) {
                $salt = wp_salt();
                $date = current_time('mysql', 1);

                $secureKey = sha1($salt . $date . $email);
                $intDate = strtotime($date);

                $headers = array('Content-Type: text/html; charset=UTF-8');
                include get_template_directory() . '/' . 'activation-mail.php';

                $activateUrl = site_url() . "/activation?email=" . $email . "&date=" . $intDate . "&code=" . $secureKey;

                $HTMPMessage = getFirstTemplateEmail($activateUrl);

                wp_mail($email, 'Activation email', $HTMPMessage, $headers);
            } else {
                $responce->errorMsg = "Email is used";
                echo json_encode($responce);
                wp_die();
            }
        } else {
            $responce->errorMsg = "Email incorrect";
            echo json_encode($responce);
            wp_die();
        }
    } else {
        $responce->errorMsg = "Empty email";
        echo json_encode($responce);
        wp_die();
    }

    echo json_encode($responce);
    wp_die();
}

function true_load_posts()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    query_posts($args);

    if (have_posts()) :

        while (have_posts()) : the_post(); ?>
            <?php include get_template_directory() . '/' . 'cicle-wrapper.php' ?>
            <?php endwhile;
                endif;
                die();
            }

            function js_variables()
            {
                $variables = array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'is_mobile' => wp_is_mobile()
                );
                echo ('<script type="text/javascript">window.wp_data = ' .
                    json_encode($variables) .
                    ';</script>');
            }

            function kama_postviews()
            {

                /* ------------ Настройки -------------- */
                $meta_key       = 'views';
                $who_count      = 0;
                $exclude_bots   = 0;
                global $user_ID, $post;
                if (is_singular()) {
                    $id = (int) $post->ID;
                    static $post_views = false;
                    if ($post_views) return true;
                    $post_views = (int) get_post_meta($id, $meta_key, true);
                    $should_count = false;
                    switch ((int) $who_count) {
                        case 0:
                            $should_count = true;
                            break;
                        case 1:
                            if ((int) $user_ID == 0)
                                $should_count = true;
                            break;
                        case 2:
                            if ((int) $user_ID > 0)
                                $should_count = true;
                            break;
                    }
                    if ((int) $exclude_bots == 1 && $should_count) {
                        $useragent = $_SERVER['HTTP_USER_AGENT'];
                        $notbot = "Mozilla|Opera";
                        $bot = "Bot/|robot|Slurp/|yahoo";
                        if (!preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent))
                            $should_count = false;
                    }

                    if ($should_count)
                        if (!update_post_meta($id, $meta_key, ($post_views + 1))) add_post_meta($id, $meta_key, 1, true);
                }
                return true;
            }

            /************ Recaptcha **************/

            
            function verify_recaptcha($recaptchaResp)
            {
                if (isset($_POST['g-recaptcha-response'])) {

                    $captcha_response = $_POST['g-recaptcha-response'];
                } else if ($recaptchaResp != "") {
                    $captcha_response = $recaptchaResp;
                } else {
                    return false;
                }

                $response = wp_remote_post(
                    'https://www.google.com/recaptcha/api/siteverify',
                    array(
                        'body' => array(
                            'secret' => '6LfK5b0UAAAAABO70H-YEouF1fbHi9VPKTt0PMVS',
                            'response' => $captcha_response,
                            'remoteip' => $_SERVER['REMOTE_ADDR']
                        )
                    )
                );

                $success = false;

                if ($response && is_array($response)) {
                    $decoded_response = json_decode($response['body']);
                    $success = $decoded_response->success;
                }

                return $success;
            }

            add_theme_support('post-thumbnails');
            add_theme_support('html5', array('search-form'));

            add_action('preprocess_comment', "precomment_function");

            function precomment_function($commentdata)
            {

                if (!verify_recaptcha("")) {
                    echo ('<html>
<head>
<meta charset="UTF-8"><link rel="stylesheet" href="' . get_template_directory_uri() . '/recaptcha-error.css" type="text/css" >
</head>
<body>
<div>
    ' . pll__('You are not protected by Google spam reCAPTCHA. Go back to the') .  '
    <a href="#" onclick="history.go(-1);">' . pll__('previous page') . ' </a> ' . pll__('and try again') . '.
</div>
</body>
</html>');

                    exit;
                }

                return $commentdata;
            }

            /**************Custom templates start (if comment plugin off)****************/


            if (!function_exists('avsblog_comment')) :
                function avsblog_comment($comment, $args, $depth)
                {
                    $GLOBALS['comment'] = $comment;
                    switch ($comment->comment_type):
                        case '': ?>
                    <div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                        <div id="comment-<?php comment_ID(); ?>" class="comment-wrap">
                            <div class="comment-author vcard">
                                <?php echo get_avatar($comment, 40, 'gravatar_default'); ?>
                                <div class="meta-info-comment">
                                    <div class="title">
                                        <?php printf(__('%s', 'avsblog'), sprintf('<span class="fn">%s</span>', get_comment_author_link())); ?>
                                        <span class="sep">-</span>
                                        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                                    </div>
                                    <span class="meta"><?php printf(__('%1$s at %2$s', 'avsblog'), get_comment_date(),  get_comment_time()); ?><?php edit_comment_link(__('Edit', 'avsblog'), ' '); ?></span>
                                </div>
                            </div><!-- .comment-author .vcard -->
                            <?php
                                        if ($comment->comment_approved == '0') : ?>
                                <div><?php pll_e('Your comment is awaiting moderation'); ?>.</div>
                                <br />
                            <?php
                                        endif; ?>
                            <div class="comment-body"><?php comment_text(); ?></div>
                        </div><!-- #comment-##  -->
                    <?php
                                break;
                            case 'pingback':
                            case 'trackback': ?>
                        <div class="post pingback">
                            <p><?php _e('Pingback:', 'avsblog'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'avsblog'), ' '); ?></p>
                <?php
                            break;
                    endswitch;
                }
            endif;
            /**************Custom templates end****************/

            /**************Strings translations****************/

            //header

            pll_register_string('download', 'download');
            pll_register_string('buy now', 'buy now');
            pll_register_string('help', 'help');
            pll_register_string('support', 'support');
            pll_register_string('contact us', 'contact us');

            //footer

            pll_register_string('All rights reserved', 'All rights reserved');
            pll_register_string('affiliates', 'affiliates');
            pll_register_string('education', 'education');
            pll_register_string('partners', 'partners');
            pll_register_string('eula', 'eula');
            pll_register_string('privacy', 'privacy');

            //post info

            pll_register_string('by', 'by');
            pll_register_string('posted in', 'posted in');
            pll_register_string('autor', 'autor');
            pll_register_string('category', 'category');
            pll_register_string('tag', 'tag');

            //comments

            pll_register_string('Your comment is awaiting moderation', 'Your comment is awaiting moderation');
            pll_register_string('add a comment', 'add a comment');
            pll_register_string('add a comment to', 'add a comment to');

            //empty page

            pll_register_string('Sorry, no posts matched your query', 'Sorry, no posts matched your query');

            //recaptcha error msg

            pll_register_string('You are not protected by Google spam reCAPTCHA. Go back to the', 'You are not protected by Google spam reCAPTCHA. Go back to the');
            pll_register_string('previous page', 'previous page');
            pll_register_string('and try again', 'and try again');

            ?>