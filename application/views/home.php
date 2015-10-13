<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$newDate = date('d-F-Y'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Main Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>

    <!-- Loading Flat UI -->
	<?=link_tag('assets/flat/css/flat-ui.min.css')?>

	<link rel="shortcut icon" href="img/favicon.ico">
        <style>
        body {
            padding: 0;
            margin: 0;
            font-family: Helvetica, Sans-serif;
            font-size: 16px;
            color: #333;
            line-height: 1.5;
        }
        .wrapper {
            width: 800px;
            margin: 60px auto;
            border: 1px solid #eee;
            background: #fcfcfc;
            padding: 0 20px 20px;
            box-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        h1, h3 {
            text-align: center;
        }
        .examples a {
            border: medium none;
            background: none repeat scroll 0% 0% #eee;
            color: #333;
            font-size: 24px;
            padding: 40px 20px;
            margin: 20px 2%;
            cursor: pointer;
            text-decoration: none;
            border: 1px solid #e9e9e9;
            width: 40.47%;
            display: inline-block;
            text-align: center;
            transition: background .6s ease;
        }
        .examples a:hover {
            background: #ccc;
        }
    </style>
</head>	
<body>
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>

    <!-- Loading all compiled plugins -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
<h1>Home</h1>
<h1><?=$newDate?></h1>
<div class="wrapper">
    <div class="examples">
        <a href="maincontroller/facebook_login" class="web">Redirect Login<br/>Example</a>
    </div>
</div>
</body>
</html>
