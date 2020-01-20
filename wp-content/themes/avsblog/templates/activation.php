<?php

/**
 * Template Name: activation
 *
 
 */

get_header(); ?>
<?php 

    if(!empty($_GET['code']) && isset($_GET['code']) && !empty($_GET['email']) && isset($_GET['email']) && !empty($_GET['date']) && isset($_GET['date']))
    {

        $secureCode = $_GET['code'];
        $email = $_GET['email'];
        $date = date('Y-m-d H:i:s', $_GET['date']);

        if(!empty($date) && isset($date)){
            renderResult("$email", "$secureCode", "$date");
        }
    } else { 

        wp_redirect(site_url());    
    }?>

    
    <?php function renderResult($email, $secureCode, $date) {
        global $wpdb;
        $salt = wp_salt();     
        $checkCode = $secureCode == sha1($salt . $date . $email);
        $count = $wpdb->get_var("SELECT email FROM users WHERE email='$email'");

        if(!empty($count) && isset($count)){ ?>
            <div class="activationWrapper">
                <div class="contentBox">
                    <h1><?php pll_e('You are already subscribed. Please check your spam folder') ?>.</h1>
                    <p><?php pll_e('Enjoy reading AVS4YOU blog!') ?></p>
                    <a href="<?php echo site_url() ?><?php pll_e('/') ?>"><?php pll_e('Explore blog') ?></a>
                </div>
                <div class="activationImage"></div>
            </div>

        <?php }
        elseif ($checkCode && addEmail($email, $date)) { ?>

            <?php 
            
                $headers = array('Content-Type: text/html; charset=UTF-8');
                include get_template_directory() . '/' . 'second-mail.php';

                $HTMPMessage = getSecondEmail();
                wp_mail($email, 'Welcome to AVS4YOU blog!', $HTMPMessage, $headers);
            ?>

            <div class="activationWrapper">
                <div class="contentBox">
                    <h1><?php pll_e('<b>Thank you</b> for signing up for AVS4YOU newsletter!') ?></h1>
                    <p><?php pll_e('Check your inbox for the first email and stay updated from now on!') ?></p>
                    <a href="<?php echo site_url() ?><?php pll_e('/') ?>"><?php pll_e('Explore blog') ?></a>
                </div>
                <div class="activationImage"></div>
            </div>

        <?php } else {
            wp_redirect(site_url()); 
        }
    };

    function addEmail($email, $date){
        global $wpdb;
        $wpdb->insert("users",  array("email" => "$email", "date" => "$date"));
        return true;
    }

?>
</div>
</div>
<div class="activationFooter">
    <div>
        <div>
<?php get_footer(); ?>
</div>