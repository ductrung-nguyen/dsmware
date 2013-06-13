<?php
/**
 * File : header.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?
    if (isset($data['title'])) {
       echo "DSMWare Project - Product Tracking" . $data['title'];
    } else {
        echo 'DSMWare Project - Product Tracking';
    }
?></title>

<meta http-equiv="last-modified" content="Mon May 20 01:52:02 UTC 2013" />
<meta name="google-site-verification" content="bqUwKhoYeT_MzX9y98lARmF4Q1ZfE8Wl_V9h6sSLleo" />

<link rel="stylesheet" type="text/css" href="<?=BASE_URL.DS?>design/css/main.css" />

<link rel="stylesheet" type="text/css" href="http://d1i0o2gnhzh6dj.cloudfront.net/stylesheets/fresh-merged.v16.css" />
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="http://d1i0o2gnhzh6dj.cloudfront.net/stylesheets/fresh-ie-merged.css?1" />
<![endif]-->


<link rel="apple-touch-icon-precomposed" href="http://d1i0o2gnhzh6dj.cloudfront.net/images/apple-touch-icon.png" />

<link rel="shortcut icon" href="http://d1i0o2gnhzh6dj.cloudfront.net/favicon.ico" />
<link title="camelcamelcamel Product Search" rel="search" type="application/opensearchdescription+xml" href="http://d1i0o2gnhzh6dj.cloudfront.net/camelcamelcamel-open_search.xml">

<script type="text/javascript" src="<?=BASE_URL . DS ?>design/js/google.js"></script>
<script type="text/javascript" src="<?=BASE_URL . DS ?>design/js/jquery-1.10.0.min.js"></script>
<script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script></head>
<body>
<div id="page">
    <a name="top"><!-- // --></a>