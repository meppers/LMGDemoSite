<!doctype html>
<!--php for google captcha-->
<?php
// recaptcha library
require_once "recaptchalib.php";
?>

<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="If you want to discuss future advertising relationships, then get in touch with us here.">
    <!--this changes the toolbar color in google chrome for mobile-->
    <meta name="theme-color" content="rgb(227,79,23)">
    <!--favicon image for browser tabs-->
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
    <!-- for chrome mobile, 192x192px png -->
    <link rel="icon" sizes="192x192" href="img/icon.jpg">
    <!-- reuse same icon for Safari -->
    <link rel="apple-touch-icon" href="img/icon.jpg">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title>Linus Media Group Contact Us</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <!--    script for google captcha-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <!-- navbar -->
    <div id="navigation"></div>
    <script>
        $(function() {
            $("#navigation").load("navbar.html");
        });

    </script>

    <!--    contact info for viewers and fans-->
    <div class="callout">

        <div class="row text-center">
            <div class="columns large-2">
                <a href="https://twitter.com/LinusTech" target="_blank">
                    <img class="show-for-medium" src="img/twitterButton.png" alt="Twitter icon" style="width:125px;height:125px">
                    <div class="show-for-small-only linkButton">Official Twitter</div>
                </a>
            </div>
            <div class="columns large-4">Are you a fan that wants to talk to us? Tweet us! <br><br></div>

            <div class="columns large-2">
                <a href="https://linustechtips.com/main/" target="_blank">
                    <img class="show-for-medium" src="img/forumButton.png" alt="Forum icon" style="width:125px;height:125px">
                    <div class="show-for-small-only linkButton">Community Forum</div>
                </a>
            </div>
            <div class="columns large-4">Looking to chat with other fans? Check out our forum.</div>
        </div>

        <!--        mailing address-->
        <div class="row">
            <div class="txtCenter"><br>Need a mailing address? Send us your stuff:
                <a href="https://www.google.com/maps/place/Linus+Media+Group/@49.0983247,-122.7054096,17.39z/data=!4m5!3m4!1s0x0:0x3110c6840f43070a!8m2!3d49.0983381!4d-122.7061667" target="_blank">
                    18643 52 Ave #104, Surrey, BC V3S 8E5, Canada
                </a>
            </div>
        </div>
        <div class="row">
            <div class="txtCenter">
                <br>Looking for sales and buisness inquiries? Fill out the form below and we'll email you back.
                <br><br> Or just email us at: <br> info@linusmediagroup.com <br> sales@linusmediagroup.com
            </div>
        </div>
    </div>


    <!--contact for buisness inqueries-->
    <!--this php code sends the contact form contents to the LMG email address, and verifies captcha -->
    <?php
    // captcha secret key
    $secret = "6LfmywwUAAAAAM1y4_MseSYDkcNTxZUyAoeN4e4G";
    // empty response
    $response = null;
    // check secret key
    $reCaptcha = new ReCaptcha($secret);
    // if submitted check response
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }
    if ($response != null && $response->success) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = 'From: LMGContactForm'; 
        $to = 'emwarren08@gmail.com'; //email destination address
        $subject = 'Website Inquery';
        $body = "From: $name\n\n E-Mail: $email\n\n Message:\n $message";
      if ($_POST['submit']) {
        if (mail ($to, $subject, $body, $from)) { 
            echo '
            <div class="callout success">
                <p class="text-center">Your message has been sent!</p>
            </div>
            ';
        } else { 
            echo '
            <div class="callout alert">
                <p>Something went wrong. Go back and try again, or email us.</p>
            </div>
            '; 
        }
    }
}
?>

    <!--  contact form-->
    <div class="callout">
        <form method="post" action="contact.php">
            <div class="row">
                <div class="medium-6 columns">
                    <label>Name or company</label>
                    <input type="text" name="name" placeholder="">
                </div>
                <div class="medium-6 columns">
                    <label>Email adress</label>
                    <input type="email" name="email" placeholder="name@example.com">
                </div>
            </div>
            <div class="row">
                <div class="medium-12 columns">
                    Anything else we should know before we get in touch?
                    <textarea name="message" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <!--                google captcha button-->
                    <div class="g-recaptcha" data-sitekey="6LfmywwUAAAAAAJiwlTvp0gVS4mnQHUKcmMYMXWu"></div>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <div class="callout alert">Legal Disclamer: This is not the official Linus Media Group website. Please do not send real buisness inquieries with this form. <br> But if you want to contact the creator of this site please do use this form.</div>
                </div>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <input class="hollow button" id="submit" name="submit" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>



    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>

</html>
