<div class="subEmailContainer">
    <div class="subEmailBlock">
        <h2><?php pll_e('Newsletter') ?></h2>
        <h5><?php pll_e('News, discounts, sales, contests and some art:') ?></h5>
        <div id="subInputBox" class="inputBox">
            <input id="subscribe-email" class="main-input" />
            <label><?php pll_e('Enter your email') ?></label>
            <div class="inputButton"><?php pll_e('Subscribe') ?>
                <div class="loader"></div>
            </div>
            <p class="errorMessage empty"><?php pll_e('Email is empty') ?></p>
            <p class="errorMessage incorrect"><?php pll_e('Email is incorrect') ?></p>
            <p class="errorMessage used"><?php pll_e('Email is used') ?></p>
        </div>
        <div class="recaptchaContainer">
            <div class="gRecaptcha" id="postsCaptcha"></div> 
            <p class="errorMessage recaptcha"><?php pll_e('Incorrect recaptcha') ?></p>
        </div>
        <p><?php pll_e('By clicking "Subscribe", you agree to the') ?> <a href="https://www.avs4you.com/privacy.aspx"><?php pll_e('rules for using the service') ?></a> <?php pll_e('and processing personal data') ?>.</p>
    </div>
    <div class="emailSendedBlock">
        <h2><?php pll_e('A letter with the confirmation link was sent to you by mail') ?></h2>
        <h5><?php pll_e('Please check your inbox') ?></h5>
    </div>
</div>