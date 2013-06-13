<?php
/**
 * File : Home.php
 * User : loveallufev
 * Date:  5/20/13
 * Group: Hieu-Trung
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="Author" content="Daniel Green / Cosmic Shovel, Inc." />
    <meta name="description" content="camelcamelcamel: Amazon price tracker, Amazon price history charts, price watches, and price drop alerts." />
    <meta name="keywords" content="Amazon,price watch,price tracking,price history charts,price drop alerts,product,tracking,price,changes,alerts,notifications,notify,tracker,products,prices,watch,watching,track,history" />
    <meta name="title" content="Amazon price tracker, Amazon price history charts, price watches, and price drop alerts. | camelcamelcamel.com" />

    <meta property="og:site_name" content="camelcamelcamel.com"/>






    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Amazon price tracker, Amazon price history charts, price watches, and price drop alerts."/>
    <meta property="og:image" content="http://s3.camelcamelcamel.com/images/amazon-header.png"/>
    <meta property="og:description"
          content="camelcamelcamel: Amazon price tracker, Amazon price history charts, price watches, and price drop alerts."/>


    <title>Amazon price tracker, Amazon price history charts, price watches, and price drop alerts. | camelcamelcamel.com</title>

    <meta http-equiv="last-modified" content="Sun May 19 23:56:10 UTC 2013" />
    <meta name="google-site-verification" content="bqUwKhoYeT_MzX9y98lARmF4Q1ZfE8Wl_V9h6sSLleo" />




    <link rel="stylesheet" type="text/css" href="http://d1i0o2gnhzh6dj.cloudfront.net/stylesheets/fresh-merged.v16.css" />
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="http://d1i0o2gnhzh6dj.cloudfront.net/stylesheets/fresh-ie-merged.css?1" />
    <![endif]-->


    <link rel="apple-touch-icon-precomposed" href="http://d1i0o2gnhzh6dj.cloudfront.net/images/apple-touch-icon.png" />

    <!--[if lte IE 7]>
    <style>
        #sq { width: 429px; }
        #slogan { font-size: 85%!important; }
    </style>
    <![endif]-->

    <!--[if IE 7]>
    <style>
        #sq { width: 444px; }
        #sq + input { padding-left: 0!important; padding-right: 0!important; font-size: 1em!important; }
    </style>
    <![endif]-->

    <link rel="shortcut icon" href="http://d1i0o2gnhzh6dj.cloudfront.net/favicon.ico" />
    <link title="camelcamelcamel Product Search" rel="search" type="application/opensearchdescription+xml" href="http://d1i0o2gnhzh6dj.cloudfront.net/camelcamelcamel-open_search.xml">

    <style>
        .big_buttons .retailer_link a,
        .icon_buttons .retailer_link a
        {
            background-image: url(http://d1i0o2gnhzh6dj.cloudfront.net/images/button-amazon.png);
        }

        .flagsprite { background: url(http://d1i0o2gnhzh6dj.cloudfront.net/images/flagsprites.png) no-repeat top left; color: transparent !important; display: inline-block; }
        .flagsprites li span, .listflagsprites li, .listflagsprites a, .retailer_tabs a span { background: url(http://d1i0o2gnhzh6dj.cloudfront.net/images/flagsprites.png) no-repeat top left; color: transparent !important;  }
        .retailer_tabs a:hover { text-decoration: none; }
        .retailer_tabs a span { height: 32px; width: 32px; display: inline-block; overflow: hidden; text-indent: -9999px;}



    </style>

    <script type="text/javascript">
        var g_camel_loaded = false;
        var g_clear_def = "Enter Amazon URL or keywords to find products";
        var g_user_msg_updater = null;
        var g_delayed_images = new Array();
        var g_onload = new Array();
        var g_is_login = false;

        function push_delayed_image(url, obj_id)
        {
            g_delayed_images.push(new Array(url, obj_id));
        }

        function for_onload(f)
        {
            g_onload.push(f);
        }

        if (document.addEventListener) {
            document.addEventListener('DOMContentLoaded', onStart, false);
        }
        (function() {
            /*@cc_on
             try {
             document.body.doScroll('up');
             return onStart();
             } catch(e) {}
             /*@if (false) @*/
            if (/loaded|complete/.test(document.readyState)) return onStart();
            /*@end @*/
            if (!onStart.done) setTimeout(arguments.callee, 30);
        })();

        if (window.addEventListener) {
            window.addEventListener('load', onStart, false);
        } else if (window.attachEvent) {
            window.attachEvent('onload', onStart);
        }

        var _timeoutid = null;

        // scripts here to ensure any globals are declared and available to onStart()

        var crsl = null;


        function onStart()
        {
            // quit if this function has already been called
            if (arguments.callee.done) return;

            if (!g_camel_loaded || !Prototype)
            {
                if (_timeoutid)
                    clearTimeout(_timeoutid);

                _timeoutid = setTimeout("onStart()", 30);
                return;
            }

            if (_timeoutid)
                clearTimeout(_timeoutid);

            // flag this function so we don't do the same thing twice
            arguments.callee.done = true;


            document.onclick = check_login_popout;



            crsl = new Carousel("US", $("bigpromopane"));
            crsl.add_entry("http://s3.camelcamelcamel.com/images/promopane.png", $("slide_falling"));
            crsl.add_entry("http://s3.camelcamelcamel.com/images/leavespane.jpg", $("slide_leaves"));
            crsl.add_entry("http://s3.camelcamelcamel.com/images/snowmanpane.png", $("slide_snowman"));
            crsl.finish_init();


            try {
                $("productsdrop").style.width = String($("productsdrop").parentNode.style.width - 2) + "px";
                $("h1al").title = "Visit our homepage";
                $("h1a").title = "Visit our homepage";
            } catch (e) { }

            check_blur($("sq"));
            load_on_load();
            load_delayed_images();


        }


        window.google_analytics_domain_name  = "camelcamelcamel.com"
        window.google_analytics_uacct = "UA-10042935-2";

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-10042935-2']);
        _gaq.push(['_setDomainName', '.camelcamelcamel.com']);
        _gaq.push(['_setAllowHash', 'false']);

        _gaq.push(['_setCustomVar', 1, "Section", "home"]);
        _gaq.push(['_setCustomVar', 2, "Page", "index2"]);
        _gaq.push(['_setCustomVar', 3, "Locale", "US"]);
        _gaq.push(['_setCustomVar', 4, "Farmer", "No"]);

        _gaq.push(['_trackPageview']);
        _gaq.push(['_trackPageLoadTime']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();


    </script>



    <script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script></head>
<body>
<div id="page">
<a name="top"><!-- // --></a>





<style>

    #qm0 { left: -10px; }

    .oauthsprite { background: url(http://d1i0o2gnhzh6dj.cloudfront.net/images/oauthsprite.png) no-repeat top left; color: transparent; text-indent: -9999px; display: inline-block;}
    .oauthsprite-facebook-signin{ background-position: 0 0; width: 150px; height: 22px; }
    .oauthsprite-google-signin{ background-position: 0 -72px; width: 150px; height: 22px; }
    .oauthsprite-twitter-signin{ background-position: 0 -144px; width: 150px; height: 22px; }

    #h1a
    {
        background: transparent url(http://d1i0o2gnhzh6dj.cloudfront.net/images/amazon-miniheadersprite.png) no-repeat 0% 0%;


        background-position: 0 -93px; width: 102px; height: 43px;

    }

    #h1a:hover
    {
        background-position: 0 0px;
    }

    #userdrop
    {
        width: 100%;
        min-width: 75px;
    }

    #helpdrop
    {
        width: 100px;
        margin-right: 50px;
        margin-left: -75px !important;
    }

    #productsdrop
    {

        width: 157px;

    }






    .retailer_tabs a
    {
        display: inline-block;
        width: 64px;
        font-size: smaller;
        text-align: center;
        height: 40px;
        border: 1px solid #e1e1e1;
        border-top: 0;
        padding-top: 10px;
    }

    .retailer_tabs a.selected,
    .retailer_tabs a.selected:hover
    {
        background: #fafafa;
        border-bottom: 1px solid #fafafa;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }

    .retailer_tabs a:hover
    {
        border-left-color: #c8c8c8;
        border-right-color: #c8c8c8;

        -moz-box-shadow: 2px 2px 2px rgba(190, 190, 190, 0.25);
        -webkit-box-shadow: 2px 2px 2px rgba(190, 190, 190, 0.25);
        box-shadow: 2px 2px 2px rgba(190, 190, 190, 0.25);
    }

    #um
    {
        height: 50px;
        line-height: 50px;
    }

    #login_popout_parent
    {
        line-height: 30px;
        height: 30px;
    }

</style>

<div id="um_parent">
    <div id="um">
        <div class="yui3-g">
            <div class="yui3-u-1-8">
                <h1 id="h1al"><a id="h1a" href="/" title="Amazon price tracker, Amazon price history charts, price watches, and price drop alerts. | camelcamelcamel.com">Amazon price tracker, Amazon price history charts, price watches, and price drop alerts. | camelcamelcamel.com</a></h1>
            </div>
            <div class="yui3-u-1-2 grey smalltext leftAlign retailer_tabs">


                <a href="http://camelcamelcamel.com/" class="selected"><span class="flagsprite-z-amazon" title="camelcamelcamel: Free Amazon price tracker, price history charts, and price drop alerts.">Amazon Price Tracker</span></a>

                <a href="http://camelbuy.com/" class=""><span class="flagsprite-z-bestbuy" title="camelbuy: Free Best Buy price tracker, price history charts, and price drop alerts.">BestBuy Price Tracker</span></a>

                <a href="http://camelegg.com/" class=""><span class="flagsprite-z-newegg" title="camelegg: Free Newegg price tracker, price history charts, and price drop alerts.">Newegg Price Tracker</span></a>


                <div class="clearfix"><!-- // --></div>
            </div>
            <div class="yui3-u-3-8 rightAlign grey">
                <ul id="qmum" class="qmmc flagsprites">

                    <li><a title="You are viewing the U.S. locale" class="qmparent" href="/locales" style="padding-top: 10px; padding-left: 10px; padding-right: 10px;"><span class="flagsprite-US"><!-- // --></span></a>
                        <ul class="nobullets flagsprites" style="margin-top: -3px; line-height: 30px;">

                            <li><a href="http://ca.camelcamelcamel.com/" title="Track products from Amazon Canada"><span class="flagsprite-CA"><!-- // --></span> Canada</a></li>

                            <li><a href="http://cn.camelcamelcamel.com/" title="Track products from Amazon China"><span class="flagsprite-CN"><!-- // --></span> China</a></li>

                            <li><a href="http://fr.camelcamelcamel.com/" title="Track products from Amazon France"><span class="flagsprite-FR"><!-- // --></span> France</a></li>

                            <li><a href="http://de.camelcamelcamel.com/" title="Track products from Amazon Germany"><span class="flagsprite-DE"><!-- // --></span> Germany</a></li>

                            <li><a href="http://it.camelcamelcamel.com/" title="Track products from Amazon Italy"><span class="flagsprite-IT"><!-- // --></span> Italy</a></li>

                            <li><a href="http://jp.camelcamelcamel.com/" title="Track products from Amazon Japan"><span class="flagsprite-JP"><!-- // --></span> Japan</a></li>

                            <li><a href="http://es.camelcamelcamel.com/" title="Track products from Amazon Spain"><span class="flagsprite-ES"><!-- // --></span> Spain</a></li>

                            <li><a href="http://uk.camelcamelcamel.com/" title="Track products from Amazon United Kingdom"><span class="flagsprite-UK"><!-- // --></span> United Kingdom</a></li>

                            <li><a href="http://camelcamelcamel.com/" title="Track products from Amazon United States"><span class="flagsprite-US"><!-- // --></span> United States</a></li>

                        </ul></li>

                    <li>&nbsp;</li>

                    <li><a href="/login?return_to=http://camelcamelcamel%2Ecom/" onclick="return(toggle_login_popout());" class="login_link">Log in</a></li>
                    <li> &middot; </li>
                    <li><a href="/signup?utm_campaign=registration&utm_source=menutopright&utm_medium=www">Sign up</a></li>

                    <li> &middot; </li>
                    <li style="margin-right: 0;"><a href="/support" class="qmparent" style="font-weight: normal; margin-right: 0;">Help</a>
                        <ul id="helpdrop" style="line-height: 30px;">
                            <li><a href="/contact" title="Get in touch">Contact Us</a></li>
                            <li><a href="http://blog.camelcamelcamel.com/" title="News from our blog">Blog</a></li>
                            <li><a href="/features" title="A list of our site's main features">Features</a></li>
                            <li><a href="/retailers" title="Other retailers for which we provide price tracking services">Retailers</a></li>
                            <li><a href="/tools" title="Browser extensions and stuff!">Tools</a></li>
                        </ul></li>
                    <li class="qmclear">&nbsp;</li></ul>
                </ul>

                <div id="login_popout_parent">
                    <div id="login_popout" class="bubble shadowed" style="display: none;">
                        <form method="post" action="/sessions/create" target="_parent">
                            <input type="hidden" name="return_to" value="http://camelcamelcamel.com/">
                            <p><label for="login">Username or Email</label><br/>
                                <input type="text" name="login" id="login" style="width: 200px; font-size: 1.2em;"></p>
                            <p>
                                <label for="password">Password</label>
                                <br />
                                <input type="password" name="password" id="password" style="width: 200px; font-size: 1.2em;">
                            </p>
                            <p><input type="checkbox" name="remember_me" id="remember_me"> <label for="remember_me">Remember me </label></p>
                            <div class="buttons clearfix">
                                <input type="submit" class="positive" style="font-size: 1.2em;" value="Log in">
                                <a href="/signup?utm_campaign=registration&utm_source=loginpopup&utm_medium=www" style="font-size: 1.2em;">Sign up</a>
                                <div class="clearfix"><!-- // --></div>
                            </div>
                            <p>Forgot your password? <a href="/forgot_password">reset it</a>.</p>
                            <p>
                                <a href="/auth/google?return_to=http://camelcamelcamel%2Ecom/" class="oauthsprite oauthsprite-google-signin">Sign In With Google</a>
                                <br />
                                <a href="/auth/twitter?return_to=http://camelcamelcamel%2Ecom/" class="oauthsprite oauthsprite-twitter-signin">Sign In With Twitter</a>

                                <br />
                                <a href="/auth/facebook?return_to=http://camelcamelcamel%2Ecom/"  class="oauthsprite oauthsprite-facebook-signin">Sign In With Facebook</a>

                            </p>
                        </form>
                    </div>
                </div>

                <div class="clearfix"><!-- // --></div>
            </div>
            <div class="clearfix"><!-- // --></div>
        </div>
    </div>

    <div class="clearfix"><!-- // --></div>
</div>

<div id="header_parent">
    <div id="header">
        <div class="yui3-g">
            <div class="yui3-u" style="width: 500px;">
                <div id="mainmenu">
                    <ul id="qm0" class="qmmc flagsprites">


                        <li><a class="qmparent " href="/products" title="Find products to track">Amazon Products</a>

                            <ul id="productsdrop">
                                <li><a href="/products" title="Find products to track">Browse</a></li>

                                <li><a href="/popular" title="Popular products determined by recent sales">Popular Products</a></li>

                                <li><a href="/top_drops" title="A list of the price drops we've detected">Top Price Drops</a></li>
                                <li><a href="/lists" title="View recently tracked products,  big price drops, and more">Product Lists</a></li>
                            </ul></li>

                        <li><a class="" href="/tracker?filtering=false&rf=*" title="View the products you're watching">Your Price Watches</a></li>


                        <li style="margin-right: 0;"><a class="" href="/deals" title="Deals discovered by Camel users!" style="padding-right: 0;">Community Deals</a></li>


                        <li class="qmclear">&nbsp;</li></ul>
                </div>
            </div>
            <div class="yui3-u" style="width: 460px;">
                <div id="search">
                    <form onsubmit="return(check_sq($('sq')));" action="/index.php/site/search" style="display: inline;" method="get">
                        <input id="s" type="hidden" name='s' value="ebay" />
                        <input type="text" name="sq" id="sq" value="" onclick="check_clear(this);" onblur="check_blur(this);" title="Search for">
                        <input id="searchbutton" type="submit" value="Find Products">
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"><!-- // --></div>
    </div>
    <div class="clearfix"><!-- // --></div>
</div>

<style>
    #mainmenu { text-align: left; height: 40px; line-height: 40px; }
    #search { text-align: right;  height: 43px; }
    #h1al { margin: 0; margin-top: 10px; }
    #h1a
    {
        /*
        background: transparent url(http://s3.camelcamelcamel.com/images/amazon-miniheadersprite.png) no-repeat 0% 0%;
        background-position: 0 -93px; width: 102px; height: 43px;
        */
        color: transparent;
        /*height: 43px;*/
        display: block;
        overflow: hidden;
        text-indent: -9999px;
    }

    #h1a:hover
    {
        background-position: 0 0px;
    }

    #um { line-height: 60px; height: 60px; }
    .retailer_tabs a{ height: 50px; }
</style>


<div id="content_container">



<div id="content" class="content clearfix inner">










<div id="carousel_slides" style="display: none;">
    <div id="slide_leaves">
        <h1 class="notopmargin">Amazon Price Tracker</h1>
        <p>
            Synchronize your Amazon Wishlist, and find products using our built-in Amazon search.  <a href="/browse">Browse products</a> by <a href="/popular">Popularity</a> and <a href="/top_drops">Price Drop</a>.
        </p>
    </div>

    <div id="slide_snowman">
        <h1 class="notopmargin">Shop Smart This Year</h1>
        <p>
            Use our site to ensure you get good deals on your holiday gifts this year.  Before you buy, inform yourself by checking our price history charts.
        </p>
    </div>

    <div id="slide_falling">
        <h1 class="notopmargin">Discover Falling Prices</h1>
        <p>
            Our free Amazon price tracker monitors millions of products and alerts you when prices drop, helping you decide when to buy.
        </p>
    </div>
</div>

<div id="promoparent">
    <div id="bigpromopane">
        <div id="closebox">
            <a href="/home/hide_homepage?v=1" title="Click this button to see the main homepage" onclick="cancel_prop(event); camel_out(this, 'Hide Homepage Intro', 'US', 'Version 1', 0); return(false);" rel="nofollow" class="hpsprite hpsprite-close_button2">
                X
            </a>
        </div>
        <div id="signupbox" class="alpha">
            <div id="carousel_text">
                <h1 class="notopmargin" id="signup_head">Discover Falling Prices</h1>
                <p id="signup_body">
                    Our free Amazon price tracker monitors millions of products and alerts you when prices drop, helping you decide when to buy.
                </p>
            </div>
            <p class="centerAlign">
                <a class="button signup-btn" href="/signup" onclick="cancel_prop(event); camel_out(this, 'Signup', 'US', 'Home - Upper Button', crsl.cur_entry); return(false);">Sign Up</a>
            </p>
        </div>
    </div>
    <div id="controls">
        <div class="yui3-g">
            <div class="yui3-u-1-4">
                <a href="#" id="ctrl_prev" class="prevnxt">&laquo;</a>
            </div>
            <div class="yui3-u-1-2" id="slidebuttons">
            </div>
            <div class="yui3-u-1-4">
                <a href="#" id="ctrl_next" class="prevnxt">&raquo;</a>
            </div>
        </div>
    </div>
</div>

<div class="yui3-g" id="homecolparent">
    <div class="yui3-u">
        <h2><a href="/features#alerts">Amazon Price Drop Alerts</a></h2>
        <div class="yui3-g">
            <div class="yui3-u-1-3">
                <div class="hpsprite hpsprite-moneyenvelope"></div>
            </div>
            <div class="yui3-u-2-3">
                <p>
                    Create Amazon price watches and get alerts via email and Twitter when prices drop.
                </p>
            </div>
        </div>
    </div>
    <div class="yui3-u" id="middlecol">
        <h2><a href="/features#history">Amazon Price History Charts</a></h2>
        <div class="yui3-g">
            <div class="yui3-u-1-3">
                <div class="hpsprite hpsprite-charticon"></div>
            </div>
            <div class="yui3-u-2-3">
                <p>
                    View the price history of nearly seven million Amazon products.
                </p>
            </div>
        </div>
    </div>
    <div class="yui3-u">
        <h2><a href="/camelizer">Browser Addons</a></h2>
        <div class="yui3-g">
            <div class="yui3-u-1-3">
                <div class="hpsprite hpsprite-camelizericono"></div>
            </div>
            <div class="yui3-u-2-3">
                <p>
                    Add our price history charts to your browser with The Camelizer, our extension for Mozilla Firefox and Google Chrome.
                </p>
            </div>
        </div>
    </div>
    <div class="yui3-u-1" id="rowbreaker">
        <div class="yui3-g">
            <div class="yui3-u-1-3">
                <a class="button bigsignupbutton" href="/signup" onclick="cancel_prop(event); camel_out(this, 'Signup', 'US', 'Home - Lower Button', 0); return(false);">Sign Up</a>
            </div>
            <div class="yui3-u-2-3">
                <p class="largetext">
                    Signing up is quick and makes using the site more convenient.  It's also free!
                </p>
                <p class="smalltext">
                    Have a Google, Facebook, or Twitter account?  You're welcome to sign in with those, too.
                </p>
            </div>
        </div>
    </div>
    <div class="yui3-u-1">
        <div class="yui3-g">
            <div class="yui3-u">
                <blockquote>
                    Ever since I discovered it a few weeks ago, I’ve looked at it before I bought anything on Amazon just to make sure I was at or near a historical low.
                    <div class="hpsprite hpsprite-ctlogo"></div>
                </blockquote>
            </div>
            <div class="yui3-u" id="middlecol">
                <blockquote>
                    As someone who works overtime to find the lowest prices on everything, I'm adding camelcamelcamel to my list of must-bookmark sites.
                    <div class="hpsprite hpsprite-pcwlogo"></div>
                </blockquote>
            </div>
            <div class="yui3-u">
                <blockquote>
                    If you want to ... find out the best price for a particular product, you can look at its price history on CamelCamelCamel.
                    <div class="hpsprite hpsprite-lifehackerlogo"></div>
                </blockquote>
            </div>
        </div>
    </div>
</div>






<p>




<h2>Amazon.com  Discounts by Category</h2>
<p>These lists are a great way to start your Amazon price tracking experience with camelcamelcamel.  Use the links below to find a product you want to buy at Amazon, then come back here and put the product's URL into our search box to look up its price history and/or create a price watch.</p>
<img src="https://www.assoc-amazon.com/e/ir?t=cameldiscounts-20&l=ur2&o=2" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
<table class="dealsgrid">


    <tr>


        <td class="right">
            <a title="Amazon.com Baby Products discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=165796011&pct-off=75-100&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Baby Products', 0); return(true);">Baby Products</a>
        </td>

        <td>
            Save 75%+
        </td>





        <td class="right">
            <a title="Amazon.com Blu-ray &amp; DVD discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=2625373011&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Blu-ray &amp; DVD', 1); return(true);">Blu-ray &amp; DVD</a>
        </td>

        <td>
            Save 75%+
        </td>





        <td class="right">
            <a title="Amazon.com Digital Cameras discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=281052&pct-off=50-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Digital Cameras', 2); return(true);">Digital Cameras</a>
        </td>

        <td>
            Save 50%+
        </td>


    </tr>



    <tr>


        <td class="right">
            <a title="Amazon.com Electronics discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=172282&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Electronics', 3); return(true);">Electronics</a>
        </td>

        <td>
            Save 75%+
        </td>





        <td class="right">
            <a title="Amazon.com GPS discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=172526&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'GPS', 4); return(true);">GPS</a>
        </td>

        <td>
            Save 75%+
        </td>





        <td class="right">
            <a title="Amazon.com Home &amp; Kitchen discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=1055398&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Home &amp; Kitchen', 5); return(true);">Home &amp; Kitchen</a>
        </td>

        <td>
            Save 75%+
        </td>


    </tr>



    <tr>


        <td class="right">
            <a title="Amazon.com iPod &amp; MP3 discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=172623&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'iPod &amp; MP3', 6); return(true);">iPod &amp; MP3</a>
        </td>

        <td>
            Save 75%+
        </td>





        <td class="right">
            <a title="Amazon.com Video Games - 3DS discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=2622269011&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Video Games - 3DS', 7); return(true);">Video Games - 3DS</a>
        </td>

        <td>
            Save 75%+
        </td>





        <td class="right">
            <a title="Amazon.com Video Games - PS3 discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=14210751&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Video Games - PS3', 8); return(true);">Video Games - PS3</a>
        </td>

        <td>
            Save 75%+
        </td>


    </tr>



    <tr>


        <td class="right">
            <a title="Amazon.com Video Games - PSP discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=11075221&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Video Games - PSP', 9); return(true);">Video Games - PSP</a>
        </td>

        <td>
            Save 75%+
        </td>





        <td class="right">
            <a title="Amazon.com Video Games - Wii discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=14218901&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Video Games - Wii', 10); return(true);">Video Games - Wii</a>
        </td>

        <td>
            Save 75%+
        </td>





        <td class="right">
            <a title="Amazon.com Video Games - Xbox 360 discounts" href="http://amazon.com/mn/search?_encoding=UTF8&node=14220161&pct-off=75-99&_encoding=UTF8&tag=cameldiscounts-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" onclick="cancel_prop(event); camel_event('Discount Links', 'US', 'Video Games - Xbox 360', 11); return(true);">Video Games - Xbox 360</a>
        </td>

        <td>
            Save 75%+
        </td>


    </tr>


</table>



</p>


<div class="clearfix"><!-- // --></div>
</div>
<div class="clearfix"><!-- // --></div>
</div>

<div id="footer">


    <div class="footer clearfix">


        <p class="grey">
            Product prices and availability are accurate as of the date/time indicated and are subject to change. Any price and availability information displayed on Amazon at the time of purchase will apply to the purchase of this product.

            It is currently May 19, 2013 04:56 PM at the Camel Farm.
        </p>





        <p class="grey centerAlign">
            Countries:

            <a href="http://ca.camelcamelcamel.com/" title="Track products from Amazon Canada">Canada</a>


            &middot;


            <a href="http://cn.camelcamelcamel.com/" title="Track products from Amazon China">China</a>


            &middot;


            <a href="http://fr.camelcamelcamel.com/" title="Track products from Amazon France">France</a>


            &middot;


            <a href="http://de.camelcamelcamel.com/" title="Track products from Amazon Germany">Germany</a>


            &middot;


            <a href="http://it.camelcamelcamel.com/" title="Track products from Amazon Italy">Italy</a>


            &middot;


            <a href="http://jp.camelcamelcamel.com/" title="Track products from Amazon Japan">Japan</a>


            &middot;


            <a href="http://es.camelcamelcamel.com/" title="Track products from Amazon Spain">Spain</a>


            &middot;


            <a href="http://uk.camelcamelcamel.com/" title="Track products from Amazon United Kingdom">United Kingdom</a>


            &middot;


            <a href="http://camelcamelcamel.com/" title="Track products from Amazon United States">United States</a>




        </p>



        <p class="grey centerAlign">
            <a href="/about">About</a> &middot;
            <a href="http://blog.camelcamelcamel.com/">Blog</a> &middot;
            <a href="/business">Business</a> &middot;
            <a href="/features">Features</a> &middot;
            <a href="/tos">Terms</a> &middot;
            <a href="/privacy">Privacy</a> &middot;
            <a href="/retailers">Retailers</a> &middot;
            <a href="/tools">Tools</a> &middot;
            <a href="/support">Help</a>
        </p>

        <p class="grey centerAlign">
            &copy; 2008-2012 <a href="http://cosmicshovel.com">Cosmic Shovel, Inc.</a>
        </p>
        <div class="clearfix"><!-- // --></div>
    </div>

    <div class="clearfix"><!-- // --></div>
</div>
<div class="clearfix"><!-- // --></div>
</div>


<script src="http://d1i0o2gnhzh6dj.cloudfront.net/javascripts/fresh-merged.v10.js" defer="defer"></script>


<!-- Start Quantcast tag -->
<script type="text/javascript">
    _qoptions={
        qacct:"p-81XNls15s8s2g"
    };
</script>
<script type="text/javascript" src="https://secure.quantserve.com/quant.js" defer="defer"></script>
<noscript>
    <img src="https://secure.quantserve.com/pixel/p-81XNls15s8s2g.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/>
</noscript>
<!-- End Quantcast tag -->


<script type="text/javascript">if (!NREUMQ.f) { NREUMQ.f=function() {
        NREUMQ.push(["load",new Date().getTime()]);
        var e=document.createElement("script");
        e.type="text/javascript";
        e.src=(("http:"===document.location.protocol)?"http:":"https:") + "//" +
            "d1ros97qkrwjf5.cloudfront.net/42/eum/rum.js";
        document.body.appendChild(e);
        if(NREUMQ.a)NREUMQ.a();
    };
        NREUMQ.a=window.onload;window.onload=NREUMQ.f;
    };
    NREUMQ.push(["nrfj","beacon-1.newrelic.com","12b967eaec",3208,"e11fTERXWVtdQRtbDFVXHlFYXFBPCg==",0,19,new Date().getTime(),"","","","",""]);</script></body>
</html>
<!-- via camelwww-3-->