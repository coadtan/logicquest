<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Main Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>
    <?=script_tag('assets/sweetalert/js/sweetalert.min.js')?>
    <?=link_tag('assets/bootstrap/css/bootstrap-theme.min.css')?>
    <?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
    <?=link_tag('assets/sweetalert/css/sweetalert.css')?>
    <!-- Loading Flat UI -->
	<?=link_tag('assets/flat/css/flat-ui.min.css')?>

    <?=link_tag('assets/logicquest/css/footer-distributed.css')?>

	<link rel="shortcut icon" href="<?=base_url('assets/logicquest/img/favicon.ico')?>">
    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: Helvetica, Sans-serif;
            font-size: 16px;
            color: #333;
            background-color: #1ABC9C;
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
        .login-button a {
            border: medium none;
            background: none repeat scroll 0% 0% #466299;
            color: #FFFFFF;
            font-weight: bold;
            font-size: 24px;
            padding: 20px 20px;
            margin: 20px 2%;
            cursor: pointer;
            text-decoration: none;
            border: 1px solid #e9e9e9;
            width: 90%;
            display: inline-block;
            text-align: center;  
            transition: background .6s ease;
        }
        .login-button a:hover {
            background: #ccc;
        }

        .number-circle {
            border-radius: 50%;
            behavior: url(PIE.htc); /* remove if you don't care about IE8 */
            width: 62px;
            height: 62px;
            background: #fff;
            border: 5px solid #D35400;
            font: 48px Arial, sans-serif;
            color: #E67E22;

        }
        .column-header {
            font-weight: bold;
            font-size: 55px;
            color:#FFFFFF;
        }
        .normal-font{
            font-size: 40px; 
            color:#FFFFFF;
        }
        .credit-font{
            font-size: 20px; 
            color:#FFFFFF;
        }
        .credit-font a{
            font-size: 22px; 
            color:#FFFFFF;
        }
        .first-section{
            background-color: #1ABC9C;
        }
        .second-section{
            /*background-color: #F1C40F;*/
            background-color: #C7C1C1;
        }        
        .third-section{
            background-color: #3498DB;
        }
        .credit-section{
            background-color: #95A5A6;
        }        
        .footer-section{
            background-color: #000000;
        }
        #footer {
            bottom: 0;
            width: 100%;
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
    <br>
    <!-- secion 1 -->
    <div class="first-section">
        <div class="container">
            <div class="row" >
                <div class="col-md-7" >
                    <span  align="center" class="column-header">3 Easy Steps    <span><span class="fui-document"></span>
                    <br><br>
                    <font class="normal-font">1) Signin</font>
                </div>
                <div class="col-md-5" align="center">
                        <span class="column-header">Sign In   <span><span class="fui-user"></span> 
                        <div class="login-button">
                            <a href="<?php echo $this->facebook->login_url(); ?>"><span class="fui-facebook"></span></a>
                        </div>                    
                        <div class="login-button" style="-webkit-filter: blur(2px); filter: blur(2px);">
                            <a href="#" style="background: #DC4E41; cursor:not-allowed;"><span class="fui-google-plus"></span></a>
                        </div>
                        <div class="login-button" style="-webkit-filter: blur(2px); filter: blur(2px);">
                            <a href="#" style="background: #A59E9E; cursor:not-allowed;"><span class="fui-question-circle"></span> Guest*</a>
                        </div>
                        <div  style="font-size:20px; color:#EEEDED;">* Guest will have NO access to use ranking system except only to see world ranking</div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
    <!-- end of secion 1 -->
    <!-- secion 2 -->
    <div class="second-section">
        <br>
        <br>
        <div class="container"> 
             <div class="row" >
                <div class="col-md-3" >
                    <br><br>
                    <font class="normal-font">2) Solve Quiz</font>
                </div>
                <div class="col-md-9"  align="center">
                    <!-- <span style="font-size: 200px; color: #0FCC1C" class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> -->
                    <img src="<?=base_url('assets/logicquest/img/icon_programming.png')?>">
                </div>
            </div>
        </div>
        <br>
    </div>
    <!-- end of secion 2 -->
    <!-- secion 3 -->
    <div class="third-section">
        <br>
        <br>
        <div class="container">
             <div class="row" >
                <div class="col-md-7" >
                    <br><br>
                    <font class="normal-font">3) Gain Rank</font><br>
                      
                </div>
                <div class="col-md-5" align="center" >
                    <br><br><br><br>
                    <span style="font-size: 200px; color: #D9CD0C" class="glyphicon glyphicon-tower"  aria-hidden="true"></span> 
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <!-- end of secion 3 -->
    <!-- secion credit -->
    <div class="credit-section">
        <br><br><br><br><br><br>
        <div class="container">
            <font class="column-header">Credit for Beautiful Icon, Image and Fonts.</font>
            <font class="credit-font">Ribbon,Ribbon,Shield,Sport,Animal graphics by <a href="http://www.freepik.com/">Freepik</a> from <a href="http://www.flaticon.com/">Flaticon</a> are licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>.Star graphic by <a href="undefined">undefined</a> from <a href="http://logomakr.com">Logomakr</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>. Made with <a href="http://logomakr.com" title="Logo Maker">Logo Maker</a>   
            <font class="credit-font">Video,Arrow graphics by <a href="http://www.freepik.com/">Freepik</a> from <a href="http://www.flaticon.com/">Flaticon</a> are licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>. Made with <a href="http://logomakr.com" title="Logo Maker">Logo Maker</a></font>
        </div>
        <br><br><br><br><br><br>
    </div>
    <!-- end of secion credit -->
    <!-- footer section -->
    <div id="footer">
    <?php $this->load->view('page_footer'); ?>
    </div>
    <!-- end of footer section -->
</body>
</html>
