<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/29/13
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
<meta name="description" content="Nikon D7000 For Dummies at camelcamelcamel: Amazon price tracker, Amazon price history charts, price watches, and price drop alerts." />
<meta name="keywords" content="Title: Nikon D7000 For Dummies, Ean: 9781118012024, Isbn: 111801202X, Author: Julie Adair King, Asin: 111801202X, Product group: Book, Category: Paperback, Amazon,price watch,price tracking,price history charts,price drop alerts,product,tracking,price,changes,alerts,notifications,notify,tracker,products,prices,watch,watching,track,history" />
<meta name="title" content="Nikon D7000 For Dummies | Amazon price tracker / tracking, Amazon price history charts, Amazon price watches, Amazon price drop alerts | camelcamelcamel.com" />

<meta property="og:site_name" content="camelcamelcamel.com"/>




<link rel="canonical" href="http://camelcamelcamel.com/Nikon-D7000-Dummies-Julie-Adair/product/111801202X" />
<meta property="og:url" content="http://camelcamelcamel.com/Nikon-D7000-Dummies-Julie-Adair/product/111801202X"/>



<meta property="og:type" content="product"/>
<meta property="og:image" content="http://ecx.images-amazon.com/images/I/51F9NvzZ3cL.jpg"/>
<meta property="og:title" content="Nikon D7000 For Dummies"/>
<meta property="og:description"
      content="Amazon price tracking &amp; price history for Nikon D7000 For Dummies"/>


<title><? echo $data['product']->name; ?></title>

<meta http-equiv="last-modified" content="Sun May 19 10:42:04 UTC 2013" />
<meta name="google-site-verification" content="bqUwKhoYeT_MzX9y98lARmF4Q1ZfE8Wl_V9h6sSLleo" />



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery.noConflict();
</script>
<script type="text/javascript">
        (function($){ // encapsulate jQuery

            $(function() {
                var seriesOptions = [],
                    yAxisOptions = [],
                    seriesCounter = 0,
                //names = [['MSFT','MSFT'], ['AAPL','AAPL'], ['GOOG','Google']],
                    names = <? echo $data['type_of_price']; ?>,
                    colors = Highcharts.getOptions().colors;

                $.each(names, function(i, name) {


                    var url = '<? echo BASE_URL . DS . "index.php/Product/getPrice?type="; ?>' +  name[0].toLowerCase()  + <? echo "'&id=" .$data['product']->ASIN . "'"; ?>;

                    function process(data) {
                        seriesOptions[i] = {
                            name: name[1],
                            data: data
                        };

                        // As we're loading the data asynchronously, we don't know what order it will arrive. So
                        // we keep a counter and create the chart when all the data is loaded.
                        seriesCounter++;

                        if (seriesCounter == names.length) {
                            createChart();
                        }
                    }

                    $.ajax({
                        type:'GET',
                        url:url,
                        dataType:'jsonp',
                        timeout: 5000,
                        success: process,
                        error: function(data){
                            // error on loading data
                            alert('error');
                        }
                    }); //end of $.ajax
                });



                // create the chart when all data is loaded
                function createChart() {

                    $('#chartarea').highcharts('StockChart', {
                        chart: {
                        },

                        rangeSelector: {
                            selected: 4
                        },

                        yAxis: {
                            labels: {
                                formatter: function() {
                                    return (this.value > 0 ? '+' : '') + this.value + '%';
                                }
                            },
                            plotLines: [{
                                value: 0,
                                width: 2,
                                color: 'silver'
                            }]
                        },

                        plotOptions: {
                            series: {
                                compare: 'percent'
                            }
                        },

                        tooltip: {
                            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
                            valueDecimals: 2
                        },

                        series: seriesOptions
                    });
                }

            });
        })(jQuery);
</script>

<script src="<? echo BASE_URL . DS . 'design/js/'?>highstock.js"></script>
<script src="<? echo BASE_URL . DS . 'design/js' ?>exporting.js"></script>


<style>
#outer_frame {
    width: 946px;
    margin: 0;
    padding: 0;
    border: 7px solid #F3F3F3;
}

#inner_frame {
    width: 924px;
    margin: 0;
    padding: 10px 10px 25px 10px;
    border: 1px solid #CCCCCC;
}

#outer_frame p, #outer_frame form, #outer_frame ul {
    color: #555555;
}

#outer_frame p {
    margin: 12px 0 0 0;
}

#outer_frame h4 {
    color: #555555;
    font-weight: normal;
    font-size: 1.2em;
}

#inner_frame h2:first-child,
#inner_frame p:first-child
{
    margin-top: 0;
}

.rss a img {
    vertical-align: bottom;
}

.first, .top {
    margin-top: 0 !important;
}

.bottom, .last {
    margin-bottom: 0 !important;
}

.strong, .bold {
    font-weight: bold;
}

.inline {
    display: inline !important;
}

.question_mark {
    border-bottom: 1px dotted #555555;
}

.question_mark:hover {
    cursor: help;
}

#inner_frame form.block label {
    display: block;
    margin: 12px 0 3px 0;
}

#inner_frame form.block label.captcha {
    margin: 6px 0 3px 0;
    position: relative; top: 7px;
}

#inner_frame form.block input {
    display: block;
    padding-left: 3px;
    padding-right: 0;
    margin-bottom: 2px;
}

#inner_frame form.block input[type="text"], #inner_frame form.block input[type="password"] {
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
}

#inner_frame form.block input:focus[type="text"], #inner_frame form.block input:focus[type="password"] {
}

#inner_frame form div {
    margin: 12px 0 3px 0;
}

#inner_frame form.block input[type="submit"] {
    -moz-border-radius: 6px !important;
    -webkit-border-radius: 6px !important;
    border-radius: 6px !important;
    color: #FFFFFF !important;
    margin: 19px 0 3px 1px;
}

#inner_frame form.block input[type="submit"].blue {
    border-width: 1px;
    border-color: #006699;
    background: -moz-linear-gradient(center top, #006699, #003366) repeat scroll 0 0 #003366 !important;
    background: -webkit-gradient(linear, left top, left bottom, from(#006699), to(#003366)) !important;
}

#inner_frame form.block input:hover[type="submit"].blue {
    background: -moz-linear-gradient(center top, #006699, #002850) repeat scroll 0 0 #003366 !important;
    background: -webkit-gradient(linear, left top, left bottom, from(#006699), to(#002850)) !important;
    -moz-box-shadow: 0px 1px 1px #ccc;
    -webkit-box-shadow: 0px 1px 1px #ccc;
    box-shadow: 0px 1px 1px #ccc;
    border-width: 1px !important;
    border-color: #002850 !important;
}

#two_col_left {
}

#two_col_right {
    margin: 0 0 0 10px;
    padding: 0;
}

#breadcrumbs div {
    font-size: 1.2em !important;
}

#pagetitle {
    width: 952px !important;
    background-color: #993333;
    margin: 0 0 2px 0 !important;
    padding: 2px 0 5px 8px !important;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    -moz-border-radius-topright: 5px;
    -moz-border-radius-topleft: 5px;
    -webkit-border-radius-topright: 5px;
    -webkit-border-radius-topleft: 5px;
}

#pagetitle a {
    font-size: 0.9em;
    color: #FFFFFF !important;
}

#inner_footer {
    border-left: 1px solid #CCCCCC;
    border-right: 1px solid #CCCCCC;
    border-bottom: 1px solid #CCCCCC;
    padding: 10px 10px 25px 10px;
}

ul.auths {
    margin: 0 0 20px 0;
    padding: 0;
}

ul.auths li {
    display: inline;
    list-style-type: none;
    margin: 0;
    padding: 0 20px 0 0;
}

ul.auths li img {
    position: relative; top: 12px;
}

ul.checklist {
    margin: 20px 0 0 0;
    padding: 0;
    border-top: 1px solid #CCCCCC;
}

ul.checklist li {
    border-bottom: 1px solid #CCCCCC;
    padding: 15px 0 15px 40px;
    list-style-type: none;
    background-image: url(/images/check.png);
    background-repeat: no-repeat;
    background-position: 0 49%;
}

.auth_footnote {
    width: 60%;
    font-size: 0.9em;
}

.usermsg {
}

    /* Search */

body { /* make common */
    color: #555555;
}

#products_header p, #products_header ul { /* make common */
    color: #555555;
}

#products_header p {
    width: 600px;
}

#products_header {
    width: 940px;
    padding: 10px 10px 10px 10px;
    background-color: #F3F3F3;
    border-bottom-left-radius: 6px !important;
    border-bottom-right-radius: 6px !important;
    -moz-border-bottomleft-radius: 6px !important;
    -moz-border-bottomright-radius: 6px !important;
    -webkit-border-bottomleft-radius: 6px !important;
    -webkit-border-bottomright-radius: 6px !important;
}

#products_header form {
    margin-bottom: 10px !important;
}

#products_header form input[type="text"] {
    width: 800px;
}

#products_header form input[type="submit"] {
    width: 120px;
}

#products_header h4 {
    font-weight: normal;
    color: #555555;
    display: inline;
}

#products_header ul {
    display: inline;
    margin-left: 0px;
}

#products_header ul li {
    display: inline;
    margin-left: 5px;
}

#products_header ul li a {
    color: #555555;
}

#products_header ul li a:visited {
    color: #555555;
}

#products_header ul li a:hover {
    color: #D0720F; /* orange */
}

#filtering a:visited {
    color: #03C;
}

#reset_button {
    padding: 2px 4px 2px 4px;
    margin-left: 4px;
}

#products_filter {
    margin: 7px 0 0 0;
    padding: 8px 10px 8px 10px;
    border: 1px solid #CCCCCC;
    background: -moz-linear-gradient(center top, #FBFBFB, #E4E4E4) repeat scroll 0 0 #E4E4E4!important;
    background: -webkit-gradient(linear, left top, left bottom, from(#FBFBFB), to(#E4E4E4)) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FBFBFB', endColorstr='#E4E4E4'); /* for IE */
}

#pagination_bar {
    margin: 0;
    padding: 8px 10px 8px 10px;
    border: 1px solid #CCCCCC;
    background: -moz-linear-gradient(center top, #FBFBFB, #E4E4E4) repeat scroll 0 0 #E4E4E4!important;
    background: -webkit-gradient(linear, left top, left bottom, from(#FBFBFB), to(#E4E4E4)) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FBFBFB', endColorstr='#E4E4E4'); /* for IE */
    height: 27px;
}

#products_filter form {
    margin: 0 !imporant;
    padding: 0 !important;
}

#products_filter form label {
    margin-left: 5px;
    padding-top: 3px;
    padding-bottom: 3px;
}

#products_filter form label:first-child {
    margin-left: 0;
}

#products_filter form select {
    padding: 3px;
    font-size: 1em;
    border: 1px solid #CCCCCC;
}

#products_filter form input[type="submit"] {
    margin-left: 5px;
    padding: 3px;
    font-size: 1em;
}

#products_filter .instockness {
    margin-top: 10px;
    margin-left: 0;
}

#products_filter .instockness input {
    margin-left: 10px;
}

#products_filter .instockness input.first {
    margin-left: 2px !important;
}

#products_filter .instockness label {
    margin-left: 1px;
}

#products_list, #tracking {
    margin:  0;
    padding: 0;
}

#products_list .message {
    margin: 14px 0 0 7px;
}

#products_list .message p {
    font-size: 120%;
}

#products_list label {
    padding: 0 0 1px 4px;
    display: block;
    width: 60px;
    margin: 8px auto 0 auto;
}

#products_list table {
    width: 100%;
    border-collapse: separate !important;
    border-spacing: 0 7px !important;
    margin-bottom: 0;
}

#products_list table .product_title {
    font-weight: bold;
    font-size: 1.1em;
    margin: 7px 0 2px 0;
}

#products_list table td {
    border-right: none;
    border-top: 1px solid #CCC;
    border-left: 1px solid #CCC;
    border-bottom: 1px solid #CCC;
}

#products_list table td:last-child {
    border-right: 1px solid #CCC;
}

#products_list table td.last {
    border-right: 1px solid #CCC;
}

#products_list table tr {
    background: -moz-linear-gradient(center bottom, #F3F3F3, #FFFFFF) repeat scroll 0 0 #FFFFFF !important;
    background: -webkit-gradient(linear, left bottom, left top, from(#F3F3F3), to(#FFFFFF)) !important;
}

#products_list table tr td.product_image {
    vertical-align: top;
    width: 140px;
}

#products_list table tr td.product_image img {
    display: block;
    margin: 7px auto 0 auto !important;
}

#products_list img.product_small {
    max-width: 75px;
}

#products_list tr td {
    margin: 0;
    padding: 0;
}

#products_list tr td.product_info {
    width: 550px;
    vertical-align: top;
    padding: 0 5px 0 10px;
    margin: 0;
    height: 156px;
    overflow: hidden;
}

#products_list .product_info .flagsprite {
    float: right;
    margin: 7px 0 0 5px;
}

#products_list tr td.price_type, #products_list tr td.current_price, #products_list tr td.watching {
    vertical-align: top;
}

a.create_nojs {
    color: #999 !important;
}

a.create_nojs:hover {
    text-decoration: none !important;
    color: #CF7C26 !important;
}

.order_button {
    margin-top: 7px;
}

#products_list td.price_type div, #products_list td.current_price div, #products_list td.watching div {
    height: 40px;
    line-height: 40px;
}

#products_list td.price_type div:nth-child(odd), #products_list td.current_price div:nth-child(odd), #products_list td.watching div:nth-child(odd) {
    background: #FFFFFF;
}

#products_list td.price_type .highlight {
    background: #FFFFCC !important;
}

#products_list td.price_type {
    width: 160px;
}

#products_list table td .title {
    height: 24px;
    color: #555;
    line-height: 100%;
    padding: 10px 0 0 0;
    background: #FFFFFF;
}

#products_list td.price_type div, #products_list td.current_price div, #products_list td.watching div  {
    margin-bottom: 1px;
}

#products_list td.price_type div:last-child, #products_list td.current_price div:last-child, #products_list td.watching div:last-child {
    margin-bottom: 0;
}

#products_list td.price_type .title {
    padding-left: 13px;
    color: #555;
}

#products_list .title img.sort {
    padding: 0;
    margin: 0;
    height: 11px;
}

#products_list .title a:visited {
    color: #03C;
}

#products_list .title a:hover {
    color: #CF7C26;
}

.legend {
    -moz-border-radius: 3px !important;
    -webkit-border-radius: 3px !important;
    border-radius: 3px !important;
    margin-left: 5px;
    border: 1px solid #ddd;
    background-color: #FFF;
    padding: 3px 7px 3px 7px;
    font-weight: normal;
}

.legend .price0 {
    color: #63A85E;
}

.legend .price1 {
    color: #0033cc;
}

.legend .price2 {
    color: #cc3300;
}

.tracked .price0 {
    border-bottom: 2px solid #63A85E;
}

.tracked .price1 {
    border-bottom: 2px solid #0033cc;
}

.tracked .price2 {
    border-bottom: 2px solid #cc3300;
}

#products_list table td.price_type .price0 {
    padding-left: 7px;
    border-left: 5px solid #63A85E;
}

#products_list table td.price_type .price1 {
    padding-left: 7px;
    border-left: 5px solid #0033cc;
}

#products_list table td.price_type .price2 {
    padding-left: 7px;
    border-left: 5px solid #cc3300;
}

#products_list table td.current_price div {
    padding-right: 13px;
}

#products_list table td.current_price {
    border-left: none;
}

#products_list td.current_price div {
    width: 90px;
    text-align: right;
}

#products_list td.watching div {
    text-align: center;
    width: 80px;
}

#products_list td.watching img, #products_list td.price_type img {
    padding-top: 8px;
}

.tracker tr td.price_type, .tracker tr td.current_price, .tracker tr td.watching {
    text-align: center;
}

.tracker table tr td .title {
    padding-left: 0 !important;
}

form.iform {
    width: 100%;
    margin: 0;
    padding: 0;
    display: none;
}

.iaction, .updating {
    display: none;
}

td.price_type, td.current_price {
    color: #999;
}

.light_grey {
    color: #999;
}

a:hover {
    cursor:pointer;
}

form.iform input {
    width: 80%;
    margin: 0;
    padding: 0;
    text-align: center;
}

form.iform .tick_cross {
    position: relative;
    left: 65px;
    top: -38px;
}

.tracker form.iform {
    width: 60%;
}

.tracker form.iform .tick_cross {
    left: 48px;
}

#products_list .breadcrumbs {
    font-size: 110%;
}

#products_list .breadcrumbs a.remove {
    text-decoration: underline;
}

#products_list .breadcrumbs a.remove:hover {
    text-decoration: line-through;
}

    /* Pagination */

.pagination {
    float: right;
    margin: 3px 0 0 0 !important;
}

.pagination a:hover {
    background-color: #F3F3F3 !important;
}

.pagination span.current {
    background: none !important;
    background-color: #F3F3F3 !important;
}

.pagination .disabled {
    border: 1px solid #FFFFFF !important;
}

h2 { border-bottom: 0 !important; }

#filter_container {
    height: 160px;
}

#filter_container ul {
    font-weight: bold;
    display: block;
    float: left;
    height: 140px;
    margin: 5px 13px 5px 0px;
}

.filter_box {
    max-width: 150px;
    font-weight: bold;
    display: block;
    height: 140px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    overflow-y: auto;
    overflow-x: hidden;
}

#filter_container ul li {
    font-weight: normal;
    padding: 0;
    display: block;
    margin-left: 0;
}

#filter_container ul li a {
    display: block;
    padding: 2px;
}

#filter_container ul li a:hover {
    background-color: #006699;
    color: #fff;
    text-decoration: none;
}

#filter_container ul li a.selected {
    background-color: #006699;
    color: #fff;
}

#filter_container ul li a.strike {
    background-color: #333;
    text-decoration: line-through;
    color: #ddd;
}

#filter_container ul li a.empty {
    color: #999;
}

#filter_container ul li.empty {
    padding: 2px;
    color: #ddd;
}

.bulk_select, .bulk_select_all {
    display: none;
}

#bulk_edit_form {
    display: inline;
}

    /* Product Page */

#tracks {
    display: block;
    border: 1px solid #933;
    color: #fff;
    padding: 3px 7px 3px 7px;
    background-color: #933;
    margin: 0;
    -moz-border-radius-topleft: 3px !important;
    -moz-border-radius-topright: 3px !important;
    -webkit-border-top-left-radius: 3px !important;
    -webkit-border-top-right-radius: 3px !important;
    border-bottom-top-radius: 3px !important;
    border-bottom-top-radius: 3px !important;
}

#tracks a {
    color: #FFF;
}

#header_tracker {
    border-right: 1px solid #DDD;
    border-left: 1px solid #DDD;
    border-bottom: 1px solid #DDD;
    margin-bottom: 20px;
    -moz-border-bottom-left-radius: 3px !important;
    -moz-border-bottom-right-radius: 3px !important;
    -webkit-border-bottom-left-radius: 3px !important;
    -webkit-border-bottom-right-radius: 3px !important;
    border-bottom-left-radius: 3px !important;
    border-bottom-right-radius: 3px !important;
}

#header_tracker #watch_forms {
    border-top: 1px solid #ddd;
}

#watch_forms table {
    width: 100%;
    margin: 0;
}

#watch_forms table thead tr {
    border-bottom: 1px solid #ddd;
    background: #F3F3F3;
}

#watch_forms button {
    width: 56px;
}

#watch_forms button.full {
    width: 115px;
}

#watch_forms table th, #watch_forms table td {
    text-align: center;
}

#watch_forms table td, #watch_forms table th {
    border: none;
}

#watch_forms table tbody tr {
    border-bottom: 1px solid #ddd;
    color: #999;
}

#watch_forms table tbody tr:last-child {
    border-bottom: none;
}

#watch_forms form {
    display: inline;
}

#watch_forms input[type='text'].price {
    width: 70px;
}

#watch_forms input[type='text'].label {
    width: 90px;
}

#watch_forms input[type='text'].twitter_user {
    width: 110px;
}

#watch_forms .text_left {
    padding-left: 15px;
    text-align: left;
}

#watch_forms td div {
    display: inline-block;
}

#watch_forms button.red {
    color: #FFF;
    background: #933 !important;
    background: -moz-linear-gradient(center top, #933, #BA0000) repeat scroll 0 0 #BA0000 !important;
    background: -webkit-gradient(linear, left top, left bottom, from(#933), to(#BA0000)) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#933333', endColorstr='#BA0000'); /* for IE */
}

#watch_forms button:hover.red {
    background: -moz-linear-gradient(center top, #933, #C80000) repeat scroll 0 0 #C80000 !important;
    background: -webkit-gradient(linear, left top, left bottom, from(#933), to(#C80000)) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#933333', endColorstr='#C80000'); /* for IE */
    -moz-box-shadow: 0px 1px 1px #ccc;
    -webkit-box-shadow: 0px 1px 1px #ccc;
    box-shadow: 0px 1px 1px #ccc;
    border-width: 1px !important;
    border-color: #002850 !important;
}

#watch_forms button.blue {
    color: #FFF;
    background: #006699 !important;
    background: -moz-linear-gradient(center top, #006699, #003366) repeat scroll 0 0 #003366 !important;
    background: -webkit-gradient(linear, left top, left bottom, from(#006699), to(#003366)) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#003366'); /* for IE */
}

#watch_forms button:hover.blue {
    background: -moz-linear-gradient(center top, #006699, #002850) repeat scroll 0 0 #003366 !important;
    background: -webkit-gradient(linear, left top, left bottom, from(#006699), to(#002850)) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#002850'); /* for IE */
    -moz-box-shadow: 0px 1px 1px #ccc;
    -webkit-box-shadow: 0px 1px 1px #ccc;
    box-shadow: 0px 1px 1px #ccc;
    border-width: 1px !important;
    border-color: #002850 !important;
}

input.highlight {
    border-color: #933;
}

.tooltip table thead tr th a {
    text-decoration: none;
}

</style>



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
    function track(productID, name, site, information){
        alert('Track');
        $.post("<? echo BASE_URL . DS . 'index.php/product/track'?>",
            {
                name:name,
                ASIN:productID,
                site: site,
                info: information
            },
            function(data,status){
                alert("Data: " + data + "\nStatus: " + status);
            });
    }
</script>

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

var g_main_tab = null;
var g_sub_tab = null;
var g_main_tab_filter = null;
var g_sub_tab_filter = null;
var g_main_tab_filters = null;
var g_sub_tab_filters = null;

function change_tab(to)
{
    fi = g_main_tab_filter.getFilterItem(to);

    if (fi)
        fi.callback($("toggle_active_" + to));
}

function change_sub_tab(to)
{
    fi = g_sub_tab_filter.getFilterItem(to);

    if (fi)
    {
        change_tab("summary");
        fi.callback($("toggle_active_sub_" + to));
    }
}

var g_ui_filters = null;
var g_sr_filters = null;

var time_field_opts = null;
var selected_time_fields = null;
var disabled_time_fields = null;
var disabled_price_fields = new Array();
var g_camel_keys = new Array();

var g_price_types = new Array();
var g_slider_timeout = null;
var g_slider_val = null;
var g_slider = null;

function toggle_price(price)
{
    filter = g_ui_filters.getFilter("id");
    fi     = filter.getFilterItem(price);
    fi.callback($("toggle_id_" + price));
}

function toggle_closeup_view(pane)
{
    filter = null;

    if (pane == "summary")
        filter = g_ui_filters.getFilter("zero", "summary_");
    else if (pane == "sales_rank")
        filter = g_sr_filters.getFilter("zero", "sr_");

    fi     = filter.getFilterItem("0");
    fi.callback($("toggle_zero_" + pane + "_0"));
}

function toggle_outlier_filtering(pane)
{
    filter = null;
    decoration = "";

    if (pane == "summary")
        filter = g_ui_filters.getFilter("fo");
    else if (pane == "sales_rank")
    {
        decoration = "sr_";
        filter = g_sr_filters.getFilter("fo", decoration);
    }

    fi     = filter.getFilterItem("1");
    fi.callback($("toggle_fo_" + decoration + "1"));
}

function change_date(pane)
{
    window.clearTimeout(g_slider_timeout);
    g_slider_timeout = null;
    filter = null;
    decoration = "";

    if (pane == "summary")
        filter = g_ui_filters.getFilter("tp");
    else if (pane == "sales_rank")
    {
        decoration = "sr_";
        filter = g_sr_filters.getFilter("tp", decoration);
    }

    fi = filter.getFilterItem(g_slider_val);
    fi.callback($("toggle_tp_" + decoration + g_slider_val));
    g_slider_val = null;
}

var g_sr_slider = null;


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



    new Tip(
        $('tip_link_dp_amazon'),
        $('example_prices_dp_amazon').innerHTML,
        {
            width: 'auto',
            stem: 'bottomMiddle',
            hideAfter: 0.5,
            hideOn: false,
            hook: {tip: 'bottomMiddle', target: 'topMiddle'}
        }
    );

    new Tip('sss_amazon',
        'Qualifies for <b>FREE</b> Super Saver Shipping',
        {
            width: 'auto',
            stem: 'bottomMiddle',
            hideAfter: 0.1,
            hideOn: false,
            hook: {tip: 'bottomMiddle', target: 'topMiddle'}
        }
    );

    new Tip(
        $('tip_link_dp_new'),
        $('example_prices_dp_new').innerHTML,
        {
            width: 'auto',
            stem: 'bottomMiddle',
            hideAfter: 0.5,
            hideOn: false,
            hook: {tip: 'bottomMiddle', target: 'topMiddle'}
        }
    );

    new Tip(
        $('tip_link_dp_used'),
        $('example_prices_dp_used').innerHTML,
        {
            width: 'auto',
            stem: 'bottomMiddle',
            hideAfter: 0.5,
            hideOn: false,
            hook: {tip: 'bottomMiddle', target: 'topMiddle'}
        }
    );

    new Tip('sss_used',
        'Fulfilled by Amazon and qualifies for <b>FREE</b> Super Saver Shipping',
        {
            width: 'auto',
            stem: 'bottomMiddle',
            hideAfter: 0.1,
            hideOn: false,
            hook: {tip: 'bottomMiddle', target: 'topMiddle'}
        }
    );

    g_main_tab_filters = new FilterList();
    g_sub_tab_filters = new FilterList();

// main tabs

    g_main_tab = "summary";
    g_sub_tab = "amazon";

    g_main_tab_filter = new Filter(g_main_tab_filters, "active", Array(new Array("summary", "summary"), new Array("details", "details"), new Array("sales_rank", "sales_rank")), Array("summary"));
    g_main_tab_filters.addFilter(g_main_tab_filter);
    g_main_tab_filters.callback = function(filter_list) {
        camel_event("Product Page - Main Tabs", filter_list.loading_filter.url_param_key, filter_list.loading_filter.selected_values.join(", "), null);

        old_name = g_main_tab;
        new_name = filter_list.loading_filter.selected_values.join(", ");

        if (old_name != new_name)
        {
            $("section_" + old_name).style.display = "none";
            $("section_" + new_name).style.display = "";
        }

        g_main_tab = new_name;
        filter_list.finishProcessing();
    };


    // price type tabs


    g_sub_tab_filter = new Filter(g_main_tab_filters, "active", Array(new Array("amazon", "amazon"), new Array("new", "new"), new Array("used", "used")), Array("amazon"));
    g_sub_tab_filter.setElementPrefix("sub_");
    g_sub_tab_filters.addFilter(g_sub_tab_filter);
    g_sub_tab_filters.callback = function(filter_list) {
        camel_event("Product Page - Price Type Tabs", filter_list.loading_filter.url_param_key, filter_list.loading_filter.selected_values.join(", "), null);

        old_name = g_sub_tab;
        new_name = filter_list.loading_filter.selected_values.join(", ");

        if (old_name != new_name)
        {
            $("section_" + old_name).style.display = "none";
            $("section_" + new_name).style.display = "";
        }

        g_sub_tab = new_name;
        filter_list.finishProcessing();
    };


    g_ui_filters = new FilterList();
    g_sr_filters = new FilterList();

// date slider
    window.dhx_globalImgPath="http://d1i0o2gnhzh6dj.cloudfront.net/javascripts/slider/imgs/";
    obj = $("section_summary");
    vis = obj.style.display;
    obj.style.display = "";
    g_slider = new dhtmlxSlider("dateslider", 155);
    g_slider.init();
    g_slider.enableTooltip(false);
    g_slider.setSkin("arrowgreen");
    g_slider.setMin(0);
    g_slider.setMax(4);
    obj.style.display = vis;


    g_slider.setValue(4);

// put this on a timeout to avoid multi scroll fuckups
    g_slider.attachEvent("onChange", function(nv) {
        if (g_slider_timeout)
        {
            window.clearTimeout(g_slider_timeout);
            g_slider_timeout = null;
        }

        arr = Array("1m", "3m", "6m", "1y", "all");
        val = null;
        i = 0;

        while (i <= nv && (val = arr[nv - i]) && disabled_time_fields.indexOf(val) != -1)
        {
            val = null;
            i++;
        }

        if (!val)
            val = "all";

        if (i > 0)
            g_slider.setValue(arr.indexOf(val));

        g_slider_val = val;
        g_slider_timeout = window.setTimeout(function() { change_date("summary"); }, 250);
    });

    vals = new Array("1m", "3m", "6m", "1y", "all");
    time_field_opts = new Array(new Array("1m", "1m"), new Array("3m", "3m"), new Array("6m", "6m"), new Array("1y", "1y"), new Array("all", "all"));
    selected_time_fields = new Array("all");
    disabled_time_fields = new Array();

    $("toggle_tp_all").removeClassName("on");

    price_field_opts = new Array(new Array("amazon", "amazon"), new Array("new", "new"), new Array("used", "used"));
    vals = new Array("amazon");
    price_field_opts_vals = vals;

// price types
    var g_pricetype_filter = new Filter(g_ui_filters, "id", price_field_opts, price_field_opts_vals);
    g_pricetype_filter.setInfiniteMaxSelections();
    g_pricetype_filter.setThrobber("loadthrob_lt");
    g_ui_filters.addFilter(g_pricetype_filter);

    for (var fii = 0; fii < disabled_price_fields.length; fii++)
    {
        filter_item = g_pricetype_filter.getFilterItem(disabled_price_fields[fii]);

        if (!filter_item)
            continue;

        filter_item.disable();
    }

// time range / window
    var g_time_filter = new Filter(g_ui_filters, "tp", time_field_opts, selected_time_fields);
    g_time_filter.setThrobber("loadthrob_lt2");
    g_time_filter.setChangeStyles(false);
    g_ui_filters.addFilter(g_time_filter);

    for (var fii = 0; fii < disabled_time_fields.length; fii++)
    {
        filter_item = g_time_filter.getFilterItem(disabled_time_fields[fii]);

        if (!filter_item)
            continue;

        filter_item.disable();
    }

// outlier filtering


    vals = new Array("1");
    outlier_field_opts = new Array(new Array("1", "1"));
    selected_outlier_fields = new Array("0");

    var g_outlier_filter = new Filter(g_ui_filters, "fo", outlier_field_opts, selected_outlier_fields);
    g_outlier_filter.setMinSelections(0);
    g_outlier_filter.setThrobber("loadthrob_lt4");
    g_outlier_filter.addDefaultValue("0");
    g_outlier_filter.setNotSticky();
    g_ui_filters.addFilter(g_outlier_filter);

// overview close-up mode

    var zoom_field_opts = new Array(new Array("0", "0"));
    var selected_zoom_fields = new Array("0");
    var g_zoom_filter = new Filter(g_ui_filters, "zero", zoom_field_opts, selected_zoom_fields);
    g_zoom_filter.setMinSelections(0);
    g_zoom_filter.setElementPrefix("summary_");
    g_zoom_filter.setThrobber("loadthrob_lt4");
    g_zoom_filter.addDefaultValue("1");
    g_ui_filters.addFilter(g_zoom_filter);

    g_ui_filters.callback = function(filter_list) {
        camel_event("Overview Chart", filter_list.loading_filter.url_param_key, filter_list.loading_filter.selected_values.join(", "), null);

        if (g_outlier_filter.selected_values.length == 0)
            g_outlier_filter.selected_values.push("0");

        if (g_zoom_filter.selected_values.length == 0)
            g_zoom_filter.selected_values.push("1");

        var new_url = filter_list.getUpdatedUrl($("lt_chart").src);
        $("lt_chart").src = new_url;

        filter = g_ui_filters.getFilter("tp");
        val = filter.selected_values[0];
        arr = Array("1m", "3m", "6m", "1y", "all");
        g_slider.setValue(arr.indexOf(val));

        $("lt_chart").onload = function() {
            filter_list.finishProcessing();
        };
    };


    vals = new Array("1m", "3m", "6m", "1y", "all");
    time_field_opts = new Array(new Array("1m", "1m"), new Array("3m", "3m"), new Array("6m", "6m"), new Array("1y", "1y"), new Array("all", "all"));
    selected_time_fields = new Array("all");
    disabled_time_fields = new Array();

    $("toggle_tp_sr_all").removeClassName("on");

    obj = $("section_sales_rank");
    vis = obj.style.display;
    obj.style.display = "";
    g_sr_slider = new dhtmlxSlider("srdateslider", 155);
    g_sr_slider.init();
    g_sr_slider.enableTooltip(false);
    g_sr_slider.setSkin("arrowgreen");
    g_sr_slider.setMin(0);
    g_sr_slider.setMax(4);
    obj.style.display = vis;


    g_sr_slider.setValue(4);

// put this on a timeout to avoid multi scroll fuckups
    g_sr_slider.attachEvent("onChange", function(nv) {
        if (g_slider_timeout)
        {
            window.clearTimeout(g_slider_timeout);
            g_slider_timeout = null;
        }

        arr = Array("1m", "3m", "6m", "1y", "all");
        val = null;
        i = 0;

        while (i <= nv && (val = arr[nv - i]) && disabled_time_fields.indexOf(val) != -1)
        {
            val = null;
            i++;
        }

        if (!val)
            val = "all";

        if (i > 0)
            g_sr_slider.setValue(arr.indexOf(val));

        g_slider_val = val;
        g_slider_timeout = window.setTimeout(function() { change_date("sales_rank"); }, 250);
    });

    /************************ SALES RANK CHART **************************/
// time range / window
    var g_sr_time_filter = new Filter(g_sr_filters, "tp", time_field_opts, selected_time_fields);
    g_sr_time_filter.setThrobber("loadthrob_sr_range");
    g_sr_time_filter.setElementPrefix("sr_");
    g_sr_time_filter.setChangeStyles(false);
    g_sr_filters.addFilter(g_sr_time_filter);

    for (var fii = 0; fii < disabled_time_fields.length; fii++)
    {
        filter_item = g_sr_time_filter.getFilterItem(disabled_time_fields[fii]);

        if (!filter_item)
            continue;

        filter_item.disable();
    }

// outlier filtering
    var g_sr_outlier_filter = new Filter(g_sr_filters, "fo", outlier_field_opts, selected_outlier_fields);
    g_sr_outlier_filter.setThrobber("loadthrob_sr_fo");
    g_sr_outlier_filter.addDefaultValue("0");
    g_sr_outlier_filter.setElementPrefix("sr_");
    g_sr_outlier_filter.setNotSticky();
    g_sr_filters.addFilter(g_sr_outlier_filter);

    g_sr_filters.callback = function(filter_list) {
        camel_event("Sales Rank Chart", filter_list.loading_filter.url_param_key, filter_list.loading_filter.selected_values.join(", "), null);
        var new_url = filter_list.getUpdatedUrl($("sr_chart").src);
        $("sr_chart").src = new_url;

        filter = g_sr_filters.getFilter("tp", "sr_");
        val = filter.selected_values[0];
        arr = Array("1m", "3m", "6m", "1y", "all");
        g_sr_slider.setValue(arr.indexOf(val));

        $("sr_chart").onload = function() {
            filter_list.finishProcessing();
        };
    };


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

_gaq.push(['_setCustomVar', 1, "Section", "products"]);
_gaq.push(['_setCustomVar', 2, "Page", "product"]);
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
                <h1 id="h1al"><a id="h1a" href="/" title="Nikon D7000 For Dummies | Amazon price tracker / tracking, Amazon price history charts, Amazon price watches, Amazon price drop alerts | camelcamelcamel.com">Nikon D7000 For Dummies | Amazon price tracker / tracking, Amazon price history charts, Amazon price watches, Amazon price drop alerts | camelcamelcamel.com</a></h1>
            </div>
            <div class="yui3-u-1-2 grey smalltext leftAlign retailer_tabs">
                <? if (!isset($data['currentMerchant'])) $data['currentMerchant'] = 'amazon';?>
                <? if (isset($data['merchants'])) {?>
                    <? foreach ($data['merchants'] as $merchant) {?>
                        <a href="<? echo BASE_URL . DS . 'index.php/site/search?s=' . $merchant?>" <? if ($merchant == $data['currentMerchant']) echo 'class="selected"'; ?> ><span class="flagsprite-z-amazon" style="background: url(<? echo '\'' .BASE_URL . DS .'design/images/' . $merchant . '_logo.png' . '\''; ?>) repeat scroll left 32px top / 32px 32px transparent !important;" title="camelcamelcamel: Free <? echo ucfirst($merchant);?> price tracker, price history charts, and price drop alerts."><? echo ucfirst($merchant); ?> Price Tracker</span></a>
                    <? } } ?>

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

                    <li><a href="/login?return_to=http://camelcamelcamel%2Ecom/Nikon-D7000-Dummies-Julie-Adair/product/111801202X?active=amazon" onclick="return(toggle_login_popout());" class="login_link">Log in</a></li>
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
                            <input type="hidden" name="return_to" value="http://camelcamelcamel.com/Nikon-D7000-Dummies-Julie-Adair/product/111801202X?active=amazon">
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
                                <a href="/auth/google?return_to=http://camelcamelcamel%2Ecom/Nikon-D7000-Dummies-Julie-Adair/product/111801202X?active=amazon" class="oauthsprite oauthsprite-google-signin">Sign In With Google</a>
                                <br />
                                <a href="/auth/twitter?return_to=http://camelcamelcamel%2Ecom/Nikon-D7000-Dummies-Julie-Adair/product/111801202X?active=amazon" class="oauthsprite oauthsprite-twitter-signin">Sign In With Twitter</a>

                                <br />
                                <a href="/auth/facebook?return_to=http://camelcamelcamel%2Ecom/Nikon-D7000-Dummies-Julie-Adair/product/111801202X?active=amazon"  class="oauthsprite oauthsprite-facebook-signin">Sign In With Facebook</a>

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
                    <form onsubmit="return(check_sq($('sq')));" action="<? echo BASE_URL; ?>/index.php/site/search" style="display: inline;" method="get">





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







<div class="colparent clearfix" style="margin-bottom: 20px;">
    <div class="col clearfix" style="width: 160px; height: 160px; overflow: hidden; background: #fff url(<? echo $data['product']->images; ?>) top center no-repeat;">
        <a title="Click here to view a larger product image" style="display: block; height: 100%; width: 100%; color: transparent;" href="<? echo $data['product']->images; ?>" target="_blank">&nbsp;</a>
        <div class="clearfix"><!-- // --></div>
    </div>

    <div class="col clearfix" style="width: 590px; padding-left: 10px;">
        <h1 class="notopmargin">
      <span class="smalltext grey">

          Amazon price history for

      </span>
            <br />

            <? echo $data['product']->name; ?>
            <br />
      <span class="smalltext grey">

        in

        <!--a class="grey" href="/products?pg=Book">Book</a> &raquo; <a class="grey" href="/products?pc=Paperback">Paperback</a> &raquo; <a class="grey" href="/products?mf=For+Dummies">For Dummies</a>
        -->
      </span>
        </h1>



        <p class="leftAlign">

            Sign up for price drop alerts and begin tracking this product by completing the form below.

        </p>





        <div class="clearfix"><!-- // --></div>
    </div>

    <div class="col clearfix" style="width: 200px;">


        <p class="rightAlign">

        <span class="" style="font-size: 2em;" style="display: block:">
            <?  if (isset($data['product']->price['amazon'])) { ?>
            <span class="green"><? echo $data['product']->price['amazon']->formattedPrice?></span></span>
            <span class="smalltext grey" style="display: block;">Amazon Price</span>
            <? } elseif (isset($data['product']->price['amazon'])) { ?>
                <span class="green"><? echo $data['product']->price['new']->formattedPrice ?></span></span>
                <span class="smalltext grey" style="display: block;">3rd Party New Price</span>
            <? } elseif (isset($data['product']->price['amazon'])) { ?>
                <span class="green"><? echo $data['product']->price['used']->formattedPrice ?></span></span>
                <span class="smalltext grey" style="display: block;">3rd Party Used Price</span>
            <? } ?>


        </p>





        <div class="big_buttons clearfix">
            <div class="button retailer_link">
                <a title="View the product page at Amazon" href="<? echo $data['product']->detailURL; ?>" onclick="camel_event('Retailer Product', 'US - Product Page', '111801202X - Amazon', 1638); return(true);" target="_blank">
                    Buy
                </a>
                <div class="clearfix"><!-- // --></div>
            </div>

            <? if ($data['tracked']) {?>
                <div class="button retailer_link">
                    <a title="This product has been tracked"  >
                        Tracked
                    </a>
                    <div class="clearfix"><!-- // --></div>
                </div>
            <? } else {?>
                <div class="button retailer_link">
                    <a title="Track this product" href='<? echo BASE_URL . DS ."index.php/product/track?site=". $data['product']->merchant. "&id=" . $data['product']->ASIN . "&name=" . str_replace("'", "&#39;",$data['product']->name) ?>' >
                        Track
                    </a>
                    <div class="clearfix"><!-- // --></div>
                </div>
            <? } ?>


            <div class="clearfix"><!-- // --></div>
        </div>

        <div class="clearfix"><!-- // --></div>
    </div>
    <div class="clearfix"><!-- // --></div>
</div>








<h2 id="tracks">Create  Amazon price watches for: <a href="<? echo $data['product']->detailURL; ?>"><? echo $data['product']->name; ?></a></h2>


<div id="header_tracker">
    <div id="watch_forms">
        <table>
            <thead>

            <tr><th class="text_left">Price Type</th><th>Current Price</th></tr>

            </thead>
            <tbody>

            <? if (isset($data['product']->price['amazon'])) {?>
                <tr>
                    <!--form method="post" action="/camels/new/111801202X?locale=US" >
                        <input type="hidden" name="product_page_form" value="true" />
                        <input type="hidden" name="type[]" value="amazon" id="typeprice_amazon" /-->

                    <td class="text_left"><div class="pricetype pricetype0 on square"><!-- // --></div> Amazon</td>
                    <td>
                        <span class="green"><? echo $data['product']->price['amazon']->formattedPrice; ?></span>
                        <span id="sss_amazon" class="sss"><a href="/support/sss">SSS</a></span>

                    </td>
                    <!--/form-->
                </tr>
            <? }?>








            <? if (isset($data['product']->price['new'])) {?>
                <tr>
                    <form method="post" action="/camels/new/111801202X?locale=US" >
                        <input type="hidden" name="product_page_form" value="true" />
                        <input type="hidden" name="type[]" value="new" id="typeprice_new" />

                        <td class="text_left"><div class="pricetype pricetype1 on square"><!-- // --></div> 3rd Party New</td>
                        <td>
                            <span class="green"><? echo $data['product']->price['new']->formattedPrice; ?></span>

                        </td>
                    </form>
                </tr>
            <? } ?>







            <? if (isset($data['product']->price['used'])) { ?>
                <tr>
                    <form method="post" action="/camels/new/111801202X?locale=US" >
                        <input type="hidden" name="product_page_form" value="true" />
                        <input type="hidden" name="type[]" value="used" id="typeprice_used" />

                        <td class="text_left"><div class="pricetype pricetype2 on square"><!-- // --></div> 3rd Party Used</td>
                        <td>
                            <span class="green"><? echo $data['product']->price['used']->formattedPrice;?></span>




                            <span id="sss_used" class="sss"><a href="/support/sss">SSS</a></span>

                        </td>
                    </form>
                </tr>
            <? } ?>



            </tbody>
        </table>
    </div>
</div>

<style>.popup_tooltip_icon { margin-bottom: -3px; }</style>





<div id="dataparent" style="margin-bottom: 1em;">
<div id="maintab" class="tabs">
    <a href="?active=summary" id="toggle_active_summary" class="on">Price History</a>

    <a href="?active=sales_rank" id="toggle_active_sales_rank" class="">Sales Rank</a>


    <a href="?active=details" id="toggle_active_details" class="">Product Details</a>


    <div id="shareparent">
        <div id="sharelabel">Share:</div>

        <a class="share_button twizzler" href="https://twitter.com/share?url=http%3A%2F%2Fcamelcamelcamel.com%2FNikon-D7000-Dummies-Julie-Adair%2Fproduct%2F111801202X%3Factive%3Damazon&amp;text=Nikon%20D7000%20For%20Dummies%20-%20Amazon%20price%20history%3A" target="_blank" onclick="camel_event('Share Product', 'Twitter', 'US - 111801202X', null); return(true);">Twitter</a>
        <a class="share_button tastebook" href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Fcamelcamelcamel.com%2FNikon-D7000-Dummies-Julie-Adair%2Fproduct%2F111801202X%3Factive%3Damazon&amp;t=Nikon%20D7000%20For%20Dummies%20-%20Amazon%20price%20history%3A" target="_blank" onclick="camel_event('Share Product', 'Facebook', 'US - 111801202X', null); return(true);">Facebook</a>
        <a class="share_button gplussen" href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=http%3A%2F%2Fcamelcamelcamel.com%2FNikon-D7000-Dummies-Julie-Adair%2Fproduct%2F111801202X%3Factive%3Damazon" target="_blank" onclick="camel_event('Share Product', 'Google Plus', 'US - 111801202X', null); return(true);">Google+</a>
    </div>
</div>

<div id="section_summary" >






<link rel="stylesheet" type="text/css" href="http://d1i0o2gnhzh6dj.cloudfront.net/javascripts/slider/dhtmlxslider.css">
<script src="http://d1i0o2gnhzh6dj.cloudfront.net/javascripts/slider/dhtmlxcommon.js"></script>
<script src="http://d1i0o2gnhzh6dj.cloudfront.net/javascripts/slider/dhtmlxslider.js"></script>

<div class="yui3-g" id="chartarea">
</div>


<div class="tabs" id="pricetabs">

    <? if (isset($data['data']->price['amazon'])) { ?>
        <a href="?active=amazon" title="Detailed Amazon price history for the Amazon Price" class="selected pricetype pricetype0 on" id="toggle_active_sub_amazon">
            Amazon

            -
            <? echo $data['product']->price['amazon']->formattedPrice;?>

        </a>
    <? } ?>


    <? if (isset($data['data']->price['new'])) { ?>
        <a href="?active=new" title="Detailed Amazon price history for the 3rd Party New Price" class=" pricetype pricetype1 off" id="toggle_active_sub_new">
            3rd Party New

            -
            <? echo $data['product']->price['new']->formattedPrice;?>

        </a>
    <? } ?>


    <? if (isset($data['data']->price['amazon'])) { ?>
        <a href="?active=used" title="Detailed Amazon price history for the 3rd Party Used Price" class=" pricetype pricetype2 off" id="toggle_active_sub_used">
            3rd Party Used

            -
            <? echo $data['product']->price['used']->formattedPrice;?>

        </a>
    <? } ?>


</div>



<div id="section_amazon" class="pricetabbody pricetype0" >












    <div class="yui3-g">
        <div class="yui3-u-1-2">
            <div class="pad">




                <h3 class="notopmargin">Amazon Price History</h3>


                <table width="100%">
                    <thead>

                    <tr>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="40%">Type</th>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="26%">Price</th>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="34%">When</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="odd">
                        <td class="mtc nolb norb nobb notb">Current</td>
                        <td class="mtc nolb norb nobb notb">$16.38</td>
                        <td class="mtc nolb norb nobb notb">Mar 07, 2013</td>
                    </tr>



                    <tr class="highest_price even">
                        <td class="mtc nolb norb nobb notb">Highest <sup>*</sup></td>
                        <td class="mtc nolb norb nobb notb">$19.79</td>
                        <td class="mtc nolb norb nobb notb">Dec 01, 2011</td>
                    </tr>

                    <tr class="lowest_price odd">
                        <td class="mtc nolb norb nobb notb">Lowest <sup>*</sup></td>
                        <td class="mtc nolb norb nobb notb">$14.62</td>
                        <td class="mtc nolb norb nobb notb">Mar 07, 2011</td>
                    </tr>

                    <tr class="even">
                        <td class="mtc notb nolb norb bb">Average <sup>+</sup></td>
                        <td class="mtc notb nolb norb bb">$17.95</td>
                        <td class="mtc notb nolb norb bb">-</td>
                    </tr>

                    </tbody>
                </table>



                <p class="smalltext grey">
                    * since Dec 02, 2010.
                    <br />+ of the last 50 price changes.
                </p>



            </div>
        </div>
        <div class="yui3-u-1-2">
            <div class="pad">

                <h3 class="notopmargin">Last 5 Price Changes</h3>

                <table class="history_list">
                    <thead>
                    <tr>
                        <th width="160" class="leftAlign mtc notb nolb norb notp bb">Date</th>
                        <th width="60" class="rightAlign mtc notb nolb norb notp bb">Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            Mar 07, 2013 02:58 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$16.38</span>
                        </td>
                    </tr>

                    <tr class="even ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            Feb 11, 2013 03:34 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$15.48</span>
                        </td>
                    </tr>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            Feb 08, 2013 01:15 PM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$16.52</span>
                        </td>
                    </tr>

                    <tr class="even ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            Jan 07, 2013 08:44 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$16.39</span>
                        </td>
                    </tr>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            Jan 03, 2013 01:50 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$16.56</span>
                        </td>
                    </tr>

                    </tbody>
                </table>


            </div>
        </div>
    </div>





    <p class="msg_bar"><small>This is the price charged for New products when Amazon itself is the seller.</small></p>




</div>

<div id="section_new" class="pricetabbody pricetype1" style="display: none;">












    <div class="yui3-g">
        <div class="yui3-u-1-2">
            <div class="pad">




                <h3 class="notopmargin">3rd Party New Price History</h3>


                <table width="100%">
                    <thead>

                    <tr>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="40%">Type</th>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="26%">Price</th>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="34%">When</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="odd">
                        <td class="mtc nolb norb nobb notb">Current</td>
                        <td class="mtc nolb norb nobb notb">$14.30</td>
                        <td class="mtc nolb norb nobb notb">May 19, 2013</td>
                    </tr>



                    <tr class="highest_price even">
                        <td class="mtc nolb norb nobb notb">Highest <sup>*</sup></td>
                        <td class="mtc nolb norb nobb notb">$22.30</td>
                        <td class="mtc nolb norb nobb notb">Feb 03, 2011</td>
                    </tr>

                    <tr class="lowest_price odd">
                        <td class="mtc nolb norb nobb notb">Lowest <sup>*</sup></td>
                        <td class="mtc nolb norb nobb notb">$7.48</td>
                        <td class="mtc nolb norb nobb notb">Apr 17, 2013</td>
                    </tr>

                    <tr class="even">
                        <td class="mtc notb nolb norb bb">Average <sup>+</sup></td>
                        <td class="mtc notb nolb norb bb">$14.67</td>
                        <td class="mtc notb nolb norb bb">-</td>
                    </tr>

                    </tbody>
                </table>



                <p class="smalltext grey">
                    * since Dec 02, 2010.
                    <br />+ of the last 50 price changes.
                </p>



            </div>
        </div>
        <div class="yui3-u-1-2">
            <div class="pad">

                <h3 class="notopmargin">Last 5 Price Changes</h3>

                <table class="history_list">
                    <thead>
                    <tr>
                        <th width="160" class="leftAlign mtc notb nolb norb notp bb">Date</th>
                        <th width="60" class="rightAlign mtc notb nolb norb notp bb">Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 19, 2013 03:42 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$14.30</span>
                        </td>
                    </tr>

                    <tr class="even ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 17, 2013 06:09 PM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$14.55</span>
                        </td>
                    </tr>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 16, 2013 08:39 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$14.77</span>
                        </td>
                    </tr>

                    <tr class="even ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 15, 2013 12:08 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$14.83</span>
                        </td>
                    </tr>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 13, 2013 03:02 PM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$14.92</span>
                        </td>
                    </tr>

                    </tbody>
                </table>


            </div>
        </div>
    </div>





    <p class="msg_bar"><small>This is the price charged by third party merchants for items in New condition.</small></p>




</div>

<div id="section_used" class="pricetabbody pricetype2" style="display: none;">












    <div class="yui3-g">
        <div class="yui3-u-1-2">
            <div class="pad">




                <h3 class="notopmargin">3rd Party Used Price History</h3>


                <table width="100%">
                    <thead>

                    <tr>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="40%">Type</th>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="26%">Price</th>
                        <th class="mtc notb nolb norb notp bb leftAlign" width="34%">When</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="odd">
                        <td class="mtc nolb norb nobb notb">Current</td>
                        <td class="mtc nolb norb nobb notb">$14.43</td>
                        <td class="mtc nolb norb nobb notb">May 09, 2013</td>
                    </tr>



                    <tr class="highest_price even">
                        <td class="mtc nolb norb nobb notb">Highest <sup>*</sup></td>
                        <td class="mtc nolb norb nobb notb">$24.31</td>
                        <td class="mtc nolb norb nobb notb">Feb 14, 2011</td>
                    </tr>

                    <tr class="lowest_price odd">
                        <td class="mtc nolb norb nobb notb">Lowest <sup>*</sup></td>
                        <td class="mtc nolb norb nobb notb">$9.99</td>
                        <td class="mtc nolb norb nobb notb">Apr 29, 2013</td>
                    </tr>

                    <tr class="even">
                        <td class="mtc notb nolb norb bb">Average <sup>+</sup></td>
                        <td class="mtc notb nolb norb bb">$14.50</td>
                        <td class="mtc notb nolb norb bb">-</td>
                    </tr>

                    </tbody>
                </table>



                <p class="smalltext grey">
                    * since Dec 02, 2010.
                    <br />+ of the last 50 price changes.
                </p>



            </div>
        </div>
        <div class="yui3-u-1-2">
            <div class="pad">

                <h3 class="notopmargin">Last 5 Price Changes</h3>

                <table class="history_list">
                    <thead>
                    <tr>
                        <th width="160" class="leftAlign mtc notb nolb norb notp bb">Date</th>
                        <th width="60" class="rightAlign mtc notb nolb norb notp bb">Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 09, 2013 07:48 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$14.43</span>
                        </td>
                    </tr>

                    <tr class="even ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 06, 2013 12:59 PM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$16.35</span>
                        </td>
                    </tr>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 05, 2013 03:25 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$13.37</span>
                        </td>
                    </tr>

                    <tr class="even ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 03, 2013 06:32 PM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$12.38</span>
                        </td>
                    </tr>

                    <tr class="odd ">
                        <td class="mtc nolb norb nobb notb" nowrap="nowrap">
                            May 02, 2013 08:55 AM
                        </td>
                        <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap">
                            <span class="">$16.35</span>
                        </td>
                    </tr>

                    </tbody>
                </table>


            </div>
        </div>
    </div>





    <p class="msg_bar"><small>This is the price charged by third party merchants for items in Used condition.</small></p>




</div>





</div>


<div id="section_sales_rank" style="display: none;">
<div class="yui3-g" id="sales_rank_pane">
    <div class="yui3-u-4-5">
        <img id="sr_chart" src="http://charts.camelcamelcamel.com/us/111801202X/sales-rank.png?force=1&zero=0&w=725&h=440&legend=1&ilt=1&tp=all&fo=0" height="440" width="725" alt="Amazon sales rank history chart for Nikon D7000 For Dummies">
    </div>
    <div class="yui3-u-1-5">
        <div class="controlbox radioboxen">
            <h4>
                Date Range
                <img src="http://d1i0o2gnhzh6dj.cloudfront.net/images/loading.gif" id="loadthrob_sr_range" style="visibility: hidden; width: 16px;" width="16">
            </h4>

            <div id="srdateslider"></div>
            <div class="yui3-g togglelink">



                <div class="yui3-u-1-5 leftAlign">
                    <a title="1m - view data going back to Apr 19, 2013" id="toggle_tp_sr_1m" href="?active=sales_rank&tp=1m" class="off" style="font-size: 1em !important;">
                        1m
                    </a>
                </div>


                <div class="yui3-u-1-5 centerAlign">
                    <a title="3m - view data going back to Feb 19, 2013" id="toggle_tp_sr_3m" href="?active=sales_rank&tp=3m" class="off" style="font-size: 1em !important;">
                        3m
                    </a>
                </div>


                <div class="yui3-u-1-5 rightAlign">
                    <a title="6m - view data going back to Nov 19, 2012" id="toggle_tp_sr_6m" href="?active=sales_rank&tp=6m" class="off" style="font-size: 1em !important;">
                        6m
                    </a>
                </div>


                <div class="yui3-u-1-5 rightAlign">
                    <a title="1y - view data going back to May 19, 2012" id="toggle_tp_sr_1y" href="?active=sales_rank&tp=1y" class="off" style="font-size: 1em !important;">
                        1y
                    </a>
                </div>


                <div class="yui3-u-1-5 rightAlign">
                    <a title="All - view data going back to Dec 02, 2010" id="toggle_tp_sr_all" href="?active=sales_rank&tp=all" class="on" style="font-size: 1em !important;">
                        All
                    </a>
                </div>




            </div>

        </div>


        <div class="controlbox">
            <h4>
                Chart Options
                <img src="http://d1i0o2gnhzh6dj.cloudfront.net/images/loading.gif" id="loadthrob_sr_fo" style="visibility: hidden;">
            </h4>



            <div class="yui3-g">
                <div class="yui3-u-3-4">
                    <div style="padding-top: 4px;">
                        <a href="?active=sales_rank&fo=1" class="togglelink" onclick="toggle_outlier_filtering('sales_rank'); return(false);">
                            Remove Extreme Values
                        </a>
                    </div>
                </div>
                <div class="yui3-u-1-4 rightAlign">
                    <a title="Turn outlier filtering on" id="toggle_fo_sr_1" href="?active=sales_rank&fo=1" class="togglebtn off" onclick="toggle_outlier_filtering('sales_rank'); return(false);">
                        Off
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>







<div class="yui3-g">
<div class="yui3-u-1-2">
<div style="overflow: scroll; overflow-x: hidden; height: 300px; padding: 5px;">
<table class="history_list smalltext">
<thead>
<tr>
    <th width="150" class="leftAlign mtc notb nolb norb notp bb">Date</th>
    <th width="100" class="rightAlign mtc notb nolb norb notp bb">Sales Rank</th>
</tr>
</thead>
<tbody>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 19, 2013 03:42 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        17,312
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 17, 2013 06:09 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        25,816
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 16, 2013 08:39 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        23,774
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 15, 2013 12:08 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        13,286
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 13, 2013 03:02 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        26,616
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 12, 2013 04:28 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        28,883
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 10, 2013 05:54 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        35,576
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 09, 2013 07:48 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        60,761
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 07, 2013 10:23 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        37,100
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 06, 2013 12:59 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        20,452
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 05, 2013 03:25 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        17,931
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 03, 2013 06:32 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        31,783
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 02, 2013 08:55 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        13,076
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        May 01, 2013 12:17 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        16,940
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        Apr 29, 2013 03:42 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        10,868
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        Apr 28, 2013 06:53 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        16,683
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        Apr 26, 2013 10:44 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        28,699
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        Apr 25, 2013 02:58 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        12,115
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        Apr 24, 2013 07:06 AM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        9,892
    </td>
</tr>

<tr class="even ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        Apr 22, 2013 10:04 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        30,364
    </td>
</tr>

<tr class="odd ">
    <td class="mtc nolb norb nobb notb" height="20" nowrap="nowrap">
        Apr 21, 2013 01:57 PM
    </td>
    <td class="mtc nolb norb nobb notb rightAlign" nowrap="nowrap" height="20">
        28,236
    </td>
</tr>

<tr class="even ">
    <td class="mtc notb nolb norb bb" height="20" nowrap="nowrap">
        Apr 20, 2013 07:28 AM
    </td>
    <td class="mtc notb nolb norb bb rightAlign" nowrap="nowrap" height="20">
        33,898
    </td>
</tr>

</tbody>
</table>
<div class="clearfix"><!-- // --></div>
</div>
</div>
<div class="yui3-u-1-2">
    <div style="padding-left: 20px;">

        <h3 class="notopmargin">Last 30 Days</h3>
        <table class="history_list smalltext">
            <thead>

            <tr>
                <th class="mtc notb nolb norb notp bb leftAlign" width="40%">Type</th>
                <th class="mtc notb nolb norb notp bb leftAlign" width="26%">When</th>
                <th class="mtc notb nolb norb notp bb rightAlign" width="34%">Sales Rank</th>
            </tr>
            </thead>
            <tbody>

            <tr class="odd">
                <td class="mtc nolb norb nobb notb">Best</td>
                <td class="mtc nolb norb nobb notb">Apr 24, 2013</td>
                <td class="mtc nolb norb nobb notb rightAlign">9,892</td>
            </tr>

            <tr class="even">
                <td class="mtc nolb norb nobb notb">Worst</td>
                <td class="mtc nolb norb nobb notb">May 09, 2013</td>
                <td class="mtc nolb norb nobb notb rightAlign">60,761</td>
            </tr>

            <tr class="odd">
                <td class="mtc notb nolb norb bb">Average</td>
                <td class="mtc notb nolb norb bb">-</td>
                <td class="mtc notb nolb norb bb rightAlign">24,548</td>
            </tr>
            </tbody>
        </table>

        <h3 class="">Last 15 Days</h3>
        <table class="history_list smalltext">
            <thead>

            <tr>
                <th class="mtc notb nolb norb notp bb leftAlign" width="40%">Type</th>
                <th class="mtc notb nolb norb notp bb leftAlign" width="26%">When</th>
                <th class="mtc notb nolb norb notp bb rightAlign" width="34%">Sales Rank</th>
            </tr>
            </thead>
            <tbody>

            <tr class="even">
                <td class="mtc nolb norb nobb notb">Best</td>
                <td class="mtc nolb norb nobb notb">May 15, 2013</td>
                <td class="mtc nolb norb nobb notb rightAlign">13,286</td>
            </tr>

            <tr class="odd">
                <td class="mtc nolb norb nobb notb">Worst</td>
                <td class="mtc nolb norb nobb notb">May 09, 2013</td>
                <td class="mtc nolb norb nobb notb rightAlign">60,761</td>
            </tr>

            <tr class="even">
                <td class="mtc notb nolb norb bb">Average</td>
                <td class="mtc notb nolb norb bb">-</td>
                <td class="mtc notb nolb norb bb rightAlign">27,955</td>
            </tr>
            </tbody>
        </table>

        <div class="clearfix"><!-- // --></div>
    </div>
</div>
</div>






</div>


<div id="section_details" style="display: none;">


<table class="product_fields">
<tbody>
<tr class="odd">



    <td valign="middle" nowrap="nowrap" width="30.0%">

        Product group

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">

        <a href="/browse/product_group/book">


            Book


        </a>

    </td>





<tr class="even">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        Category

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">

        <a href="/browse/category/paperback">


            Paperback


        </a>

    </td>


</tr>




<tr class="odd">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        Manufacturer

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">

        <a href="/browse/manufacturer/for-dummies">


            For Dummies


    </td>





<tr class="even">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        Locale

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">


        US


    </td>


</tr>




<tr class="odd">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        List price

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">


        $29.99


    </td>





<tr class="even">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        ISBN

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">


        111801202X


    </td>


</tr>




<tr class="odd">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        EAN

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">


        9781118012024


    </td>





<tr class="even">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        SKU

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">


        111801202X


    </td>


</tr>




<tr class="odd">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        Sales rank

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">


        17,312


    </td>





<tr class="even">

    <td valign="middle" nowrap="nowrap" width="30.0%">

        Last update scan

    </td>
    <td style="text-align: justify;" valign="middle" width="70.0%">


        15 hours ago


    </td>


</tr>




</tbody>
</table>

</div>




</div>


<h2>Products Similar to <i>Nikon D7000 For Dummies</i></h2>


<script type="text/javascript" language="javascript">



    function push_carousel_image(arr, url) {
        arr.push(url);
    }

    function load_carousel_window(arr, pre, window) {
        var per_row = per_page[String(pre)];
        var offset = window * per_row;
        max_index = (offset+per_row > arr.size()) ? arr.size() : offset+per_row;
        for (var i=offset; i < max_index; i++) {
            var img = $('img_' + pre + '_' + i);
            img.setAttribute('src',arr[i]);
        }
    }


    if (typeof(carousel) == 'undefined') {
        carousel = {};
    }

    carousel['627802'] = new Array();


    push_carousel_image(carousel['627802'],'http://ecx.images-amazon.com/images/I/51GcHcB1NLL._SL160_.jpg');



    push_carousel_image(carousel['627802'],'http://ecx.images-amazon.com/images/I/51kYpCxy6bL._SL160_.jpg');



    push_carousel_image(carousel['627802'],'http://ecx.images-amazon.com/images/I/41J4e2uYCrL._SL160_.jpg');



    push_carousel_image(carousel['627802'],'http://ecx.images-amazon.com/images/I/516GKOHSHrL._SL160_.jpg');



    push_carousel_image(carousel['627802'],'http://ecx.images-amazon.com/images/I/51LGmVDrB9L._SL160_.jpg');



    push_carousel_image(carousel['627802'],'http://ecx.images-amazon.com/images/I/51s%2Bv1APumL._SL160_.jpg');



    push_carousel_image(carousel['627802'],'http://ecx.images-amazon.com/images/I/518hbWot5eL._SL160_.jpg');



    if (typeof(per_page) == 'undefined') {
        per_page = {};
    }

    per_page['627802'] = 5;



    for_onload(function() {
        load_carousel_window(carousel['627802'],'627802',0);


        $('product_grid_627802').addClassName('carousel');
        $('0-2-right-' + '627802').show();



        $$('.right_slide').invoke('observe', 'click', function(event) {
            var windows = event.element().readAttribute('id').gsub(/-right.*/,'').split('-');
            var pre = event.element().readAttribute('id').gsub(/.*-right-/,'');
            var cur_window = windows[0];
            var num_rows = parseInt(windows[1]);
            var max_window = num_rows - 1;
            var next_window = String(parseInt(cur_window) + 1);

            var upper = $(cur_window + '-upper-' + pre);
            if (upper != null) {
                upper.hide();
            }

            var lower = $(cur_window + '-lower-' + pre);
            if (lower != null) {
                lower.hide();
            }

            $(cur_window + '-' + num_rows + '-right-' + pre).hide();
            $(cur_window + '-' + num_rows + '-left-' + pre).hide();
            $(next_window + '-upper-' + pre).show();
            if (lower != null) {
                $(next_window + '-lower-' + pre).show();
            }
            if (next_window < max_window) {
                $(next_window + '-' + num_rows + '-right-' + pre).show();
            }
            $(next_window + '-' + num_rows + '-left-' + pre).show();
            load_carousel_window(carousel[String(pre)],pre,next_window);
        });

        $$('.left_slide').invoke('observe', 'click', function(event) {
            var windows = event.element().readAttribute('id').gsub(/-left.*/,'').split('-');
            var pre = event.element().readAttribute('id').gsub(/.*-left-/,'');
            var cur_window = windows[0];
            var num_rows = parseInt(windows[1]);
            var max_window = num_rows - 1;
            var next_window = String(parseInt(cur_window) - 1);

            var upper = $(cur_window + '-upper-' + pre);
            if (upper != null) {
                upper.hide();
            }

            var lower = $(cur_window + '-lower-' + pre);
            if (lower != null) {
                lower.hide();
            }

            var next_shown = $(cur_window + '-' + num_rows + '-right-' + pre);
            if (next_shown != null) {
                next_shown.hide();
            }
            $(cur_window + '-' + num_rows + '-left-' + pre).hide();
            $(next_window + '-upper-' + pre).show();
            if (lower != null) {
                $(next_window + '-lower-' + pre).show();
            }
            $(next_window + '-' + num_rows + '-right-' + pre).show();
            if (next_window > 0) {
                $(next_window + '-' + num_rows + '-left-' + pre).show();
            }
        });

    });

</script>





<div>


    <a id='0-2-left-627802' onclick="camel_event('Left Carousel', 'US - Product Page Similar Items');
 return(true);" class='left_slide ss-icon ss-navigateleft' style='display: none;' href='javascript:void(0)'></a>
    <a id='0-2-right-627802' onclick="camel_event('Right Carousel', 'US - Product Page Similar Items'); return(true);" class='right_slide ss-icon ss-navigateright' style='display: none;' href='javascript:void(0)'></a>

    <a id='1-2-left-627802' onclick="camel_event('Left Carousel', 'US - Product Page Similar Items');
 return(true);" class='left_slide ss-icon ss-navigateleft' style='display: none;' href='javascript:void(0)'></a>
    <a id='1-2-right-627802' onclick="camel_event('Right Carousel', 'US - Product Page Similar Items'); return(true);" class='right_slide ss-icon ss-navigateright' style='display: none;' href='javascript:void(0)'></a>

    <a id='2-2-left-627802' onclick="camel_event('Left Carousel', 'US - Product Page Similar Items');
 return(true);" class='left_slide ss-icon ss-navigateleft' style='display: none;' href='javascript:void(0)'></a>
    <a id='2-2-right-627802' onclick="camel_event('Right Carousel', 'US - Product Page Similar Items'); return(true);" class='right_slide ss-icon ss-navigateright' style='display: none;' href='javascript:void(0)'></a>


</div>

<div class="clearfix"><!-- // --></div>
<table id="product_grid_627802" class="product_grid">





    <tr  id="0-upper-627802">


        <td class="deal_top_outer first_col">
            <div class="deal_top_inner no_price">



                <a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '0321766547 - Amazon', 1593); return(false);" href="http://camelcamelcamel.com/Nikon-D7000-Snapshots-Great-Shots/product/0321766547?active=price_amazon"><div class="img_box"><img id="img_627802_0" alt="product image" src="http://d1i0o2gnhzh6dj.cloudfront.net/images/thumbna.png" /></div></a>

                <h3><a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '0321766547 - Amazon', 1593); return(false);" title="Price history for Nikon D7000: From Snapshots to Great Shots" href="http://camelcamelcamel.com/Nikon-D7000-Snapshots-Great-Shots/product/0321766547?active=price_amazon">Nikon D7000: From Snapshots to Great Shots</a>

                </h3>





            </div>
        </td>









        <td class="deal_top_outer ">
            <div class="deal_top_inner no_price">



                <a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '1454701315 - Amazon', 1204); return(false);" href="http://camelcamelcamel.com/Magic-Lantern-Guides-Nikon-D7000/product/1454701315?active=price_amazon"><div class="img_box"><img id="img_627802_1" alt="product image" src="http://d1i0o2gnhzh6dj.cloudfront.net/images/thumbna.png" /></div></a>

                <h3><a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '1454701315 - Amazon', 1204); return(false);" title="Price history for Magic Lantern Guides: Nikon D7000" href="http://camelcamelcamel.com/Magic-Lantern-Guides-Nikon-D7000/product/1454701315?active=price_amazon">Magic Lantern Guides: Nikon D7000</a>

                </h3>





            </div>
        </td>









        <td class="deal_top_outer ">
            <div class="deal_top_inner no_price">



                <a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '1933952806 - Amazon', 1950); return(false);" href="http://camelcamelcamel.com/Mastering-Nikon-D7000-Darrell-Young/product/1933952806?active=price_amazon"><div class="img_box"><img id="img_627802_2" alt="product image" src="http://d1i0o2gnhzh6dj.cloudfront.net/images/thumbna.png" /></div></a>

                <h3><a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '1933952806 - Amazon', 1950); return(false);" title="Price history for Mastering the Nikon D7000" href="http://camelcamelcamel.com/Mastering-Nikon-D7000-Darrell-Young/product/1933952806?active=price_amazon">Mastering the Nikon D7000</a>

                </h3>





            </div>
        </td>









        <td class="deal_top_outer ">
            <div class="deal_top_inner no_price">



                <a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', 'B0049FVMF4 - Amazon', 4632); return(false);" href="http://camelcamelcamel.com/Nikon-CF-DC-3-Semi-soft-Digital-Camera/product/B0049FVMF4?active=price_amazon"><div class="img_box"><img id="img_627802_3" alt="product image" src="http://d1i0o2gnhzh6dj.cloudfront.net/images/thumbna.png" /></div></a>

                <h3><a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', 'B0049FVMF4 - Amazon', 4632); return(false);" title="Price history for Nikon CF-DC-3 Semi-soft Case for Nikon D7000 Digital SLR Camera" href="http://camelcamelcamel.com/Nikon-CF-DC-3-Semi-soft-Digital-Camera/product/B0049FVMF4?active=price_amazon">Nikon CF-DC-3 Semi-soft Case for Nikon D7000 Digital SLR Camera</a>

                </h3>





            </div>
        </td>









        <td class="deal_top_outer ">
            <div class="deal_top_inner no_price">



                <a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', 'B0045DNU6Y - Amazon', ); return(false);" href="http://camelcamelcamel.com/Nikon-Digital-18-105mm-70-300mm-Accessory/product/B0045DNU6Y?active=price_amazon"><div class="img_box"><img id="img_627802_4" alt="product image" src="http://d1i0o2gnhzh6dj.cloudfront.net/images/thumbna.png" /></div></a>

                <h3><a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', 'B0045DNU6Y - Amazon', ); return(false);" title="Price history for Nikon D7000 Digital SLR Camera &amp; 18-105mm VR + 70-300mm Lens + 32GB Card + Filters + Case + Accessory Kit" href="http://camelcamelcamel.com/Nikon-Digital-18-105mm-70-300mm-Accessory/product/B0045DNU6Y?active=price_amazon">Nikon D7000 Digital SLR Camera &amp; 18-105mm VR + 70-3 ... m Lens + 32GB Card + Filters + Case + Accessory Kit</a>

                </h3>





            </div>
        </td>



    </tr>









    <tr style="display: none;" id="1-upper-627802">


        <td class="deal_top_outer first_col">
            <div class="deal_top_inner no_price">



                <a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '1600597211 - Amazon', 1796); return(false);" href="http://camelcamelcamel.com/Magic-Lantern-Guides-Nikon-Companion/product/1600597211?active=price_amazon"><div class="img_box"><img id="img_627802_5" alt="product image" src="http://d1i0o2gnhzh6dj.cloudfront.net/images/thumbna.png" /></div></a>

                <h3><a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '1600597211 - Amazon', 1796); return(false);" title="Price history for Magic Lantern Guides: Nikon D7000 CLS Flash Companion" href="http://camelcamelcamel.com/Magic-Lantern-Guides-Nikon-Companion/product/1600597211?active=price_amazon">Magic Lantern Guides: Nikon D7000 CLS Flash Companion</a>

                </h3>





            </div>
        </td>









        <td class="deal_top_outer ">
            <div class="deal_top_inner no_price">



                <a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '1435459423 - Amazon', 2198); return(false);" href="http://camelcamelcamel.com/David-Buschs-Nikon-Digital-Photography/product/1435459423?active=price_amazon"><div class="img_box"><img id="img_627802_6" alt="product image" src="http://d1i0o2gnhzh6dj.cloudfront.net/images/thumbna.png" /></div></a>

                <h3><a onclick="camel_out(this, 'Camel Product', 'US - Product Page Similar Items', '1435459423 - Amazon', 2198); return(false);" title="Price history for David Busch's Nikon D7000 Guide to Digital SLR Photography" href="http://camelcamelcamel.com/David-Buschs-Nikon-Digital-Photography/product/1435459423?active=price_amazon">David Busch's Nikon D7000 Guide to Digital SLR Photography</a>

                </h3>





            </div>
        </td>



    </tr>






</table>












<div class="clearfix"><!-- // --></div>
</div>
<div class="clearfix"><!-- // --></div>
</div>

<div id="footer">


    <div class="footer clearfix">


        <p class="grey">
            Product prices and availability are accurate as of the date/time indicated and are subject to change. Any price and availability information displayed on Amazon at the time of purchase will apply to the purchase of this product.

            It is currently May 19, 2013 06:59 PM at the Camel Farm.
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
    NREUMQ.push(["nrfj","beacon-1.newrelic.com","12b967eaec",3208,"e11fTERXWVtdQRtXAlZTS1dYF0VFV1dBUBc=",0,76,new Date().getTime(),"","","","",""]);</script></body>
</html>
<!-- via camelwww-2-->
