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

	<link rel="shortcut icon" href="<?=base_url('assets/logicquest/img/favicon.ico')?>">
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
        .login-facebook a {
            border: medium none;
            background: none repeat scroll 0% 0% #466299;
            color: #FFFFFF;
            font-weight: bold;
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
        .login-facebook a:hover {
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

    <?php $this->load->view('page_header'); ?>
    <br>
    <br>
    <br>
    <div class="container">
        <h1>Logic Quest</h1>
        <h1><?=$newDate?></h1>
        <div class="wrapper" align="center">
            <div class="login-facebook">
                <!-- <a href="maincontroller/facebook_login" class="web">Login with Facebook</a> -->
                <a href="<?php echo $this->facebook->login_url(); ?>" class="web">Login with Facebook</a>
            </div>
        </div>
    </div>

    <div class="credit" align="center">
        Ribbon,Ribbon,Shield,Sport,Animal graphics by <a href="http://www.freepik.com/">Freepik</a> from <a href="http://www.flaticon.com/">Flaticon</a> are licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>.Star graphic by <a href="undefined">undefined</a> from <a href="http://logomakr.com">Logomakr</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>. Made with <a href="http://logomakr.com" title="Logo Maker">Logo Maker</a>   
    </div>
</body>
</html>
