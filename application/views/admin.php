<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Loading Sweet Alert JS -->
    <?=script_tag('assets/sweetalert/js/sweetalert.min.js')?>
    <!-- Loading Bootstrap -->
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>
    <!-- Loading Flat UI -->
    <?=link_tag('assets/flat/css/flat-ui.css')?>
    <!-- Loading Sweet Alert -->
    <?=link_tag('assets/sweetalert/css/sweetalert.css')?>
    <!-- Loading SHJS css -->
    <?=link_tag('assets/shjs/css/sh_acid.css')?>
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>
    <!-- Loading all compiled plugins -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
    <?=link_tag('assets/logicquest/css/footer-distributed.css')?>
    <!-- Loading SHJS syntax JS -->
    <?=script_tag('assets/shjs/js/sh_main.min.js')?>
    <?=script_tag('assets/shjs/js/sh_java.min.js')?>
    <link rel="shortcut icon" href="<?=base_url('assets/logicquest/img/favicon.ico')?>">
    <!-- Loading Count down function -->
    <?=script_tag('assets/jquery_countdown/js/jquery.countdown.js')?>
    <!-- Loading Count down css -->
    <?=link_tag('assets/jquery_countdown/css/media.css')?>

    <style type="text/css">
        body{
            color: white;
        }
        label{
            font-weight: bold;
            font-size: 20px;
        }
        font{
            font-weight: bold;
        }
    </style>
<?php if ($this->session->userdata('user_id')==10203862441240326) : ?>
<script>
$(document).ready(function(){
    $("#loading").load('<?php echo site_url('AdminController/get_all_question'); ?>');
    $("#add-question").click(function(e){
        e.preventDefault(); 
        $("#loading").load('<?php echo site_url('AdminController/add_question'); ?>');
    });

});
</script>
<?php endif; ?>
</head>
<body onload="sh_highlightDocument();">
    <!-- BODY BELOW -->
    <!-- container -->
<!--     <a href="https://github.com/coad4u4ever/logicquest">
        <img 
            style="position: absolute; top: 0; right: 0; border: 0;" 
            src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" 
            alt="Fork me on GitHub"
        >
    </a> -->
    <?php $this->load->view('page_header'); ?>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12" align="center">
                <h4>Question Management</h4>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-1" style="float:right;">
                <button id="add-question" class="btn btn-block btn-lg btn-warning"><span class="fui-plus"></span></button>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div id="loading"></div>
            </div>
        </div>
    </div>
</body>
</html>