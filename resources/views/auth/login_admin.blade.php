<style>
    html * {
        font-family: 'Montserrat', sans-serif;
        box-sizing: border-box;
    }

    body {
        background: #4688F1;
        padding: 0;
        margin: 0;
    }

    .login-box {
        background: #fff;
        padding: 20px;
        max-width: 480px;
        margin: 25vh auto;
        text-align: center;
        letter-spacing: 1px;
        position: relative;
    }

    .login-box:hover {
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .login-box h2 {
        margin: 20px 0 20px;
        padding: 0;
        text-transform: uppercase;
        color: #4688F1;
    }

    .social-button {
        background-position: 25px 0px;
        box-sizing: border-box;
        color: rgb(255, 255, 255);
        cursor: pointer;
        display: inline-block;
        height: 50px;
        line-height: 50px;
        text-align: left;
        text-decoration: none;
        text-transform: uppercase;
        vertical-align: middle;
        width: 100%;
        border-radius: 3px;
        margin: 10px auto;
        outline: rgb(255, 255, 255) none 0px;
        padding-left: 20%;
        transition: all 0.2s cubic-bezier(0.72, 0.01, 0.56, 1) 0s;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #facebook-connect {
        background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/facebook.svg?sanitize=true') no-repeat scroll 5px 0px / 30px 50px padding-box border-box;
        border: 1px solid rgb(60, 90, 154);
    }

    #facebook-connect:hover {
        border-color: rgb(60, 90, 154);
        background: rgb(60, 90, 154) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/facebook-white.svg?sanitize=true') no-repeat scroll 5px 0px / 30px 50px padding-box border-box;
        -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }

    #facebook-connect span {
        box-sizing: border-box;
        color: rgb(60, 90, 154);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(255, 255, 255);
        outline: rgb(255, 255, 255) none 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #facebook-connect:hover span {
        color: #FFF;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #google-connect {
        background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/google-plus.png') no-repeat scroll 5px 0px / 50px 50px padding-box border-box;
        border: 1px solid rgb(220, 74, 61);
    }

    #google-connect:hover {
        border-color: rgb(220, 74, 61);
        background: rgb(220, 74, 61) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/google-plus-white.png') no-repeat scroll 5px 0px / 50px 50px padding-box border-box;
        -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }

    #google-connect span {
        box-sizing: border-box;
        color: rgb(220, 74, 61);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(220, 74, 61);
        outline: rgb(255, 255, 255) none 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #google-connect:hover span {
        color: #FFF;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #twitter-connect {
        background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/twitter.png') no-repeat scroll 5px 1px / 45px 45px padding-box border-box;
        border: 1px solid rgb(85, 172, 238);
    }

    #twitter-connect:hover {
        border-color: rgb(85, 172, 238);
        background: rgb(85, 172, 238) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/twitter-white.png') no-repeat scroll 5px 1px / 45px 45px padding-box border-box;
        -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }

    #twitter-connect span {
        box-sizing: border-box;
        color: rgb(85, 172, 238);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(220, 74, 61);
        outline: rgb(255, 255, 255) none 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #twitter-connect:hover span {
        color: #FFF;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #linkedin-connect {
        background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/linkedin.svg?sanitize=true') no-repeat scroll 13px 0px / 28px 45px padding-box border-box;
        border: 1px solid rgb(0, 119, 181);
    }

    #linkedin-connect:hover {
        border-color: rgb(0, 119, 181);
        background: rgb(0, 119, 181) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/linkedin-white.svg?sanitize=true') no-repeat scroll 13px 0px / 28px 45px padding-box border-box;
        -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }

    #linkedin-connect span {
        box-sizing: border-box;
        color: rgb(0, 119, 181);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(0, 119, 181);
        outline: rgb(255, 255, 255) none 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #linkedin-connect:hover span {
        color: #FFF;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
</style>

<div class="login-box">
    <h2>Social Login Button</h2>
    <a href="#" class="social-button" id="facebook-connect"> <span>Connect with Facebook</span></a>
    <a href="#" class="social-button" id="google-connect"> <span>Connect with Google</span></a>
    <a href="#" class="social-button" id="twitter-connect"> <span>Connect with Twitter</span></a>
    <a href="#" class="social-button" id="linkedin-connect"> <span>Connect with LinkedIn</span></a>
</div>
