<?php 
require('starters.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://ogp.me/ns/fb#" xmlns:website= "http://ogp.me/ns/website#">
<head>
   
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="alternate" href="https://music.zijela.com"
          hreflang="en" />

  <title>ZijelaMusic – Listen to free music and download on ZijelaMusic</title>

  <meta content="record, sounds, share, sound, audio, tracks, music, ZijelaMusic" name="keywords">
  <meta name="referrer" content="origin">
  
  <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,user-scalable=no">

  <!--[if IE]><meta content="true" name="MSSmartTagsPreventParsing">
    <meta content="false" http-equiv="imagetoolbar"><![endif]-->

  <meta name="description" content="ZijelaMusic is a music streaming platform that lets you listen to millions of songs from around the world, or upload your own. Start listening now!">

  <meta name="application-name" content="ZijelaMusic">
  <meta name="msapplication-tooltip" content="Launch ZijelaMusic">
  <meta name="msapplication-TileImage" content="/logo/gmh.png">
  <meta name="msapplication-TileColor" content="#ff5500">
  <meta name="msapplication-starturl" content="https://music.zijela.com">

<meta property="og:image" content="/logo/gmh.png"/>
<meta property="og:title" content="ZijelaMUSIC"/>
  <meta property="og:image:alt" content="ZijelaMusic" />
    <meta property="og:site_name" content="ZijelaMusic."/>

    <meta property="fb:app_id"          content="960203160789115" /> 
    <meta property="og:url" content="https://music.zijela.com"/>
    <meta property="og:type" content="website"/>
      <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="300" />
  <meta property="og:description" content="ZijelaMusic is a music streaming platform that lets you listen to millions of songs from around the world, or upload your own. Start listening now!" />


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js">
    </script>
    <![endif]-->
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    
    <link rel="shortcut icon" type="image/png" href="/logo/gmh.png"/>
<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 -->
 <link type="text/css" rel="stylesheet" href="/css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="/css/styles.css" />
	<link rel="alternate" type="text/xml" href="https://music.zijela.com/rss_feed.php" />


<?php
require('playButton.php'); 
require('playListWidget.php'); 
require ('db/config.php');
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__.'/src/Facebook/');
require_once(__DIR__.'/src/Facebook/autoload.php');
require "twitter/autoload.php";


?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=960203160789115&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));</script>

</head>
<body>