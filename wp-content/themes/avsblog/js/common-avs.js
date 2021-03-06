jQuery(document).ready(function ($) {

    var mobileWidth = 1050;

    var isMobile = parseInt(window.innerWidth) <= mobileWidth;
    var langBox = $(".langSubBox");
    var $searchForm = $("#searchform");
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i;

    $(".main-input").val("");

    function showHideLang() {
        langBox.is(":visible") ? langBox.hide() : langBox.show()
    } 

    $("#langSwitcher").on("hover", function () {
        showHideLang();
    })

    $(".main-input").focus(function () {

        $thisInputContainer = $(this).closest("div");
        $thisInputContainer.addClass("focus");
        $thisInputContainer.removeClass("error");
        $thisInputContainer.children(".errorMessage").hide();
    });

    $(".main-input").focusout(function () {

        $thisInputContainer = $(this).closest("div");
        inputVal = $(this).val();

        if (inputVal == "") {
            $thisInputContainer.removeClass("focus");
            $thisInputContainer.removeClass("error"); 
            correctValue=false;
        } else if(!isValid(inputVal)){
            $thisInputContainer.addClass("error");
            $thisInputContainer.children(".errorMessage.incorrect").show();
            correctValue=false
        }
    });

    $("#headerInputSearch").focus(function () {
        $searchForm.addClass("focus");
    });

    $("#headerInputSearch").focusout(function () {
        if ($(this).val() == "") {
            $searchForm.removeClass("focus");
        }
    });

    $(".footer-links-box").on("click", function(){
        var thisWrapper = $(this).closest(".footer-links-box");

        if(thisWrapper.hasClass("hidden")){
            thisWrapper.removeClass("hidden");
        } else {
            thisWrapper.addClass("hidden");
        }
    });

    $(".closeButtonPopup").on("click", function(){
        $(".subPopupContainer").hide();
    });

    $(".burgerButton").on("click", function(){
        $("body").addClass("menuOpen");
    });

    $("#closeMobileMenu").on("click", function(){
        $("body").removeClass("menuOpen");
        $(".nav-item").removeClass("hover");
        $("#backFromSubmenu").removeClass("show");
    });

    $("#backFromSubmenu").on("click", function(){
        $(".nav-item").removeClass("hover");
        $(this).removeClass("show");
    });

    function checkChangeScreen(){

        var nowIsMobile = isMobile;
        isMobile = parseInt(window.innerWidth) >= 980 ? false : true;

        if(nowIsMobile != isMobile){
            bindFunctionsMenu();
        }
    }

    $(window).resize(function() {
        checkChangeScreen();
    });

    function showHideSubmenu(object, mobile){

    }

    function bindFunctionsMenu(){



        if(isMobile){
            $(".nav-item").unbind();
            $(".nav-item.hasSubMenu").on("click", function(){
                $(this).addClass("hover");
                $("#backFromSubmenu").addClass("show");
            })
        } else {
            $(".nav-item").unbind();
            $(".nav-item").hover(function(){
                $(this).addClass("hover");
            }, function(){
                $(this).removeClass("hover");
            })
        }
    }

    bindFunctionsMenu();

    function setHeight (){
        var allLinksWrappers = $(".footer-links-wrapper");
        
        for(var i = 0; i<allLinksWrappers.length; i++){

            var $thisObj = $(allLinksWrappers[i]);

            var thisHeight =$thisObj.height();
            $thisObj.css("height", thisHeight);

            $thisObj.closest(".footer-links-box").addClass("hidden");
        }
    }

    setHeight ();

    function testInput($thisInputContainer, inputVal, recaptchaResp){
        $thisInputContainer.children(".errorMessage").hide();
        var $thisRecaptchaContainer = $thisInputContainer.siblings(".recaptchaContainer");
        $thisRecaptchaContainer.children(".errorMessage").hide();

        correctValue = true;

        if (inputVal == "") {
            $thisInputContainer.removeClass("focus");
            $thisInputContainer.addClass("error"); 
            $thisInputContainer.children(".errorMessage.empty").show();
            correctValue=false;
        } else if(!isValid(inputVal)){
            $thisInputContainer.addClass("error");
            $thisInputContainer.children(".errorMessage.incorrect").show();
            correctValue=false;
        }

        if(recaptchaResp == "" || recaptchaResp == undefined){
            var $thisRecaptchaContainer = $thisInputContainer.siblings(".recaptchaContainer");
            $thisRecaptchaContainer.children(".errorMessage").show();
            correctValue=false
        }
        return correctValue;
    }

    function isValid(value){

        var valid = regex.test(value);
        return valid;
    }

    function showErrors($thisInputContainer, errorMsg){
        $thisInputContainer.addClass("error");

        if(errorMsg == "Empty email"){
            $thisInputContainer.children(".errorMessage.empty").show();
        } else if(errorMsg == "Email incorrect"){
            $thisInputContainer.children(".errorMessage.incorrect").show();
        } else if(errorMsg == "Email is used"){
            $thisInputContainer.children(".errorMessage.used").show();
        } else if(errorMsg == "Incorrect recaptcha"){
            var $thisRecaptchaContainer = $thisInputContainer.siblings(".recaptchaContainer");
            $thisRecaptchaContainer.children(".errorMessage").show();
        }
    }

    function showMsg(){      

        var $emailBox = $(".subEmailBlock");
        var $popupEmailBox = $(".subPopupContainer .subPopup");

        $popupEmailBox.hide();
        $(".emailSendedBlock").show();
        $emailBox.hide();
    };

    $(".inputButton").on("click", function(){

        var $input = $(this).siblings("input");
        var $thisInputContainer = $input.closest(".inputBox");
        var email = $input.val(); 
        var recaptchaResp = (typeof (window.grecaptcha) != "undefined") ? window.grecaptcha.getResponse(0) : ""; 

        recaptchaResp = recaptchaResp == "" ? window.grecaptcha.getResponse(1) : recaptchaResp;
        
        if(testInput($thisInputContainer, email, recaptchaResp)){

            $thisInputContainer.addClass("loading");

            $.ajax({
                type: "POST",
                url: window.wp_data.ajax_url,
                data: {
                    action : 'send_confirmation_email', email : email, recaptchaResp : recaptchaResp
                },
                dataType: 'json',
                success: function (response) {
                    if(response.errorMsg == ""){
                        showMsg();
                    }  else {
                        $thisInputContainer.removeClass("loading");
                        showErrors($thisInputContainer, response.errorMsg);
                    }
                }
            });
        }

    });

    $("#openSupPopup").on("click", function(){
        $(".subPopupContainer").is(":visible") ? $(".subPopupContainer").hide() : $(".subPopupContainer").show();
    });

    $('body').on("mousedown", function (evt) {
        if($(evt.target).closest('.subPopupContainer').length == 0 && $(evt.target).attr("id") != "openSupPopup"){
            $(".subPopupContainer").hide();
        }
        else {
            return;
        }

    });

    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            $("#main-header").css("top", 0);
            $("#subPopupContainer").css("top", 90);
        } else {
            $("#main-header").css("top", -70);
            $("#subPopupContainer").css("top", 20);
        }
        prevScrollpos = currentScrollPos;
    }

    $('#true_loadmore').click(function () {
        $(this).text('Loading...');
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page': current_page
        };
        $.ajax({
            url: ajaxurl, 
            data: data, 
            type: 'POST', 
            success: function (data) {
                
                if (data) {
                    $('#true_loadmore').text('Load more').before(data); 
                    current_page++;
                    if (current_page == max_pages) $("#true_loadmore").remove();
                } else {
                    $('#true_loadmore').remove();
                }
            }
        });
    });
});