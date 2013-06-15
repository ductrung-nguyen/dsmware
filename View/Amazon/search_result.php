<?php
/**
 * File : search_result.php
 * User : loveallufev
 * Date:  5/20/13
 * Group: Hieu-Trung
*/
?>
<?echo $data['header'];?>

<div id="um_parent">
    <div id="um">
        <div class="yui3-g">
            <div class="yui3-u-1-8">
                <h1 id="h1al"><a id="h1a" href="/" title="nikon D7000 | Amazon Product Search | camelcamelcamel.com">nikon D7000 | Amazon Product Search | camelcamelcamel.com</a></h1>
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

                    <li><a href="/login?return_to=http://camelcamelcamel%2Ecom/search?sq=nikon+D7000" onclick="return(toggle_login_popout());" class="login_link">Log in</a></li>
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
                            <input type="hidden" name="return_to" value="http://camelcamelcamel.com/search?sq=nikon+D7000">
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
                                <a href="/auth/google?return_to=http://camelcamelcamel%2Ecom/search?sq=nikon+D7000" class="oauthsprite oauthsprite-google-signin">Sign In With Google</a>
                                <br />
                                <a href="/auth/twitter?return_to=http://camelcamelcamel%2Ecom/search?sq=nikon+D7000" class="oauthsprite oauthsprite-twitter-signin">Sign In With Twitter</a>

                                <br />
                                <a href="/auth/facebook?return_to=http://camelcamelcamel%2Ecom/search?sq=nikon+D7000"  class="oauthsprite oauthsprite-facebook-signin">Sign In With Facebook</a>

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


                        <li><a class="qmparent qmactive" href="/products" title="Find products to track">Amazon Products</a>

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
                    <form onsubmit="return(check_sq($('sq')));" action="/index.php/site/search" style="display: inline;" method='get'>
                        <input name="s2" id="s2" type="hidden" value="amazon" />
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



<div id="breadcrumbs" class="smalltext grey">
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a class="grey" href="http://camelcamelcamel.com/" itemprop="url"><span itemprop="title">Home</span></a>
        &raquo;
    </div>

    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a class="grey" href="http://camelcamelcamel.com/products" itemprop="url"><span itemprop="title">Amazon Products</span></a>
        &raquo;
    </div>

</div>
<div id="pagetitle" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="margin-bottom: 10px;">
    <a href="/index.php/amazon/home/search?sq=<?=$data['keyword']?>" itemprop="url">
        <span itemprop="title">Search Results for &quot;<?=$data['keyword']?>&quot;</span>
    </a>
</div>


<div id="products_header">
    <p>Find products to track by keyword, manufacturer, or Amazon URL.


        <strong>This page searches Amazon directly.  To search our local database, <a href="/index.php/amazon/home/searchlocal?id=<?=$data['keyword'] ?>">go here</a>.</strong>

    </p>

    <form onsubmit="return(check_sq($('sq2')));" action="/index.php/site/search" method='get'>
        <input id="s" name="s" type="hidden" value="amazon" />
        <input type="text" name="sq2" id="sq2" value="<?=$data['keyword']?>">
        <input type="submit" value="Find Products">
    </form>


</div>



<div id="products_filter">
    <div class="pagination ">



        <span class="disabled">&laquo; Previous</span>





        <span class="current">1</span>




        <a href="/search?sq=nikon+D7000&p=2">2</a>




        <a href="/search?sq=nikon+D7000&p=3">3</a>


        <a href="/search?sq=nikon+D7000&p=2">Next &raquo;</a>


        <div class="clearfix"><!-- // --></div>
    </div>

    <form method="get" action="index.php/amazon/home/search">

        <label>Filter by:</label>
        <select name="si">

            <option value="All" selected="selected"> All</option>

            <option value="Apparel"> Apparel</option>

            <option value="Appliances"> Appliances</option>

            <option value="ArtsAndCrafts"> Arts And Crafts</option>

            <option value="Automotive"> Automotive</option>

            <option value="Baby"> Baby</option>

            <option value="Beauty"> Beauty</option>

            <option value="Blended"> Blended</option>

            <option value="Books"> Books</option>

            <option value="Classical"> Classical</option>

            <option value="DigitalMusic"> Digital Music</option>

            <option value="Grocery"> Grocery</option>

            <option value="MP3Downloads"> M P3 Downloads</option>

            <option value="DVD"> D V D</option>

            <option value="Electronics"> Electronics</option>

            <option value="HealthPersonalCare"> Health Personal Care</option>

            <option value="HomeGarden"> Home Garden</option>

            <option value="Industrial"> Industrial</option>

            <option value="Jewelry"> Jewelry</option>

            <option value="KindleStore"> Kindle Store</option>

            <option value="Kitchen"> Kitchen</option>

            <option value="Magazines"> Magazines</option>

            <option value="Marketplace"> Marketplace</option>

            <option value="Merchants"> Merchants</option>

            <option value="Miscellaneous"> Miscellaneous</option>

            <option value="MobileApps"> Mobile Apps</option>

            <option value="Music"> Music</option>

            <option value="MusicalInstruments"> Musical Instruments</option>

            <option value="MusicTracks"> Music Tracks</option>

            <option value="OfficeProducts"> Office Products</option>

            <option value="OutdoorLiving"> Outdoor Living</option>

            <option value="PCHardware"> P C Hardware</option>

            <option value="PetSupplies"> Pet Supplies</option>

            <option value="Photo"> Photo</option>

            <option value="Shoes"> Shoes</option>

            <option value="Software"> Software</option>

            <option value="SportingGoods"> Sporting Goods</option>

            <option value="Tools"> Tools</option>

            <option value="Toys"> Toys</option>

            <option value="UnboxVideo"> Unbox Video</option>

            <option value="VHS"> V H S</option>

            <option value="Video"> Video</option>

            <option value="VideoGames"> Video Games</option>

            <option value="Watches"> Watches</option>

            <option value="Wireless"> Wireless</option>

            <option value="WirelessAccessories"> Wireless Accessories</option>

        </select>

        <input type="submit" value="Update" />

        <input type="hidden" name="q" id="sq" value="<?=$data['keyword']?>" size="50">
    </form>
</div>

<script type="text/javascript">
    var data = JSON.parse('<?php echo $data["data"];?>');
    function checkBeforeTrack(index){
        $.post('/');
    }
</script>

<div id="products_list">
<table>
<tbody>
<? foreach ($data['result'] as $item) {
?>
<tr>
    <td class="product_image">

        <a href="<? echo BASE_URL . DS . 'index.php/product/view?active=amazon&id='. $item->ASIN; ?>">

            <img src="<?=(isset($item->images) ? $item->images : BASE_URL . DS . 'design/images/not-available.png'  )?>" class="product_small"  alt="<?=$item->name ?>"></a>


    </td>
    <td class="product_info">

        <div class="product_title">

            <a title="<?=$item->name?>" href="<? echo BASE_URL . DS . 'index.php/product/view?active=amazon&id='. $item->ASIN; ?>"><?=$item->name?></a>

        </div>

        <div class="breadcrumbs">

            <b>In:</b> <a title="<?echo 'Search for\'' . $data['keyword'] . '\'';?>" href='<? echo BASE_URL . DS . "site/search?s=amazon&sq=" . $data['keyword']; ?>'>Photography</a> &raquo; <a title="Search for 'nikon D7000' in category 'Camera'" href='http://camelcamelcamel.com/search?sq=nikon+D7000+camera'>Camera</a> &raquo; Nikon
        </div>

        <div>


            <div>


                <div>


                    <div>

                        <b>EAN:</b>
                        <?= $item->ASIN?>

                    </div>


                    <div>

                        <b>Model:</b>
                        <?= $item->ASIN?>

                    </div>


                    <div class="order_button">
                        <a href="<? echo $item->detailURL ?>" target="_blank" title="Click here to view this product at Amazon" onclick="camel_event('Retailer Product', 'US - Search', 'B0042X9LC4', 89695); return(true);"><img alt="view this item on at Amazon" src="http://d1i0o2gnhzh6dj.cloudfront.net/images/button-amazon-large.png"></a>
                    </div>

    </td>


    <td class="price_type">
        <div class="title">Price Type</div>

        <?  if (isset($item->price['amazon'])) { ?>
            <div class="price0">
                <a title="View the Amazon price product page for <?= $item->name?>" href="<? echo BASE_URL . DS . 'index.php/product/view?active=amazon&id='. $item->ASIN; ?>">Amazon</a>
            </div>
        <? } ?>

        <?  if (isset($item->price['new'])) { ?>
            <div class="price1">
                <a title="View the 3rd party new price product page for Nikon D7000 16.2MP DX-Format CMOS Digital SLR with 3.0-Inch LCD (Body Only)" href="<? echo BASE_URL . DS . 'index.php/product/view?active=amazon&id='. $item->ASIN; ?>">3rd Party New</a>
            </div>
        <? } ?>

        <?  if (isset($item->price['used'])) { ?>
            <div class="price2">
                <a title="View the 3rd party used price product page for Nikon D7000 16.2MP DX-Format CMOS Digital SLR with 3.0-Inch LCD (Body Only)" href="<? echo BASE_URL . DS . 'index.php/product/view?active=amazon&id='. $item->ASIN; ?>">3rd Party Used</a>
            </div>
        <? } ?>


    </td>

    <td class="current_price last">

        <div class="title">Current Price</div>
        <?  if (isset($item->price['amazon'])) { ?>
            <div class="price_amazon">

                <span class="green"><?=$item->price['amazon']->formattedPrice; ?>
                </span>

            </div>
        <? } ?>
        <?  if (isset($item->price['new'])) { ?>
            <div class="price_new">

                 <span class="green"><?=$item->price['new']->formattedPrice; ?>
                </span>

            </div>
        <? } ?>

        <?  if (isset($item->price['used'])) { ?>
            <div class="price_used">

                <span class="green"><?=$item->price['used']->formattedPrice; ?></span>

            </div>
        <? } ?>

    </td>



</tr>
<?}?>


</tbody>
</table>
</div>

<div id="pagination_bar">
    <div class="pagination ">



        <span class="disabled">&laquo; Previous</span>





        <span class="current">1</span>




        <a href="/search?sq=nikon+D7000&p=2">2</a>




        <a href="/search?sq=nikon+D7000&p=3">3</a>




        <a href="/search?sq=nikon+D7000&p=4">4</a>




        <a href="/search?sq=nikon+D7000&p=5">5</a>



        <a href="/search?sq=nikon+D7000&p=2">Next &raquo;</a>


        <div class="clearfix"><!-- // --></div>
    </div>

</div>



<div class="clearfix"><!-- // --></div>
</div>
<div class="clearfix"><!-- // --></div>
</div>

<?echo $data['footer'];?>