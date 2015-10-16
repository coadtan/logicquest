<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Playing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Loading Bootstrap -->
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>
    <!-- Loading Flat UI -->
    <?=link_tag('assets/flat/css/flat-ui.min.css')?>
    <!-- Loading Sweet Alert -->
    <?=link_tag('assets/sweetalert/css/sweetalert.css')?>
    <!-- Loading SHJS css -->
    <?=link_tag('assets/shjs/css/sh_acid.css')?>

    <link rel="shortcut icon" href="img/favicon.ico">
    <style type="text/css">
        body { 
            background: #F6F6F6 !important; 
        }
        .choice{
            background: #FFFFFF !important; 
        }
    </style>
</head>
<body onload="sh_highlightDocument();">
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>
    <!-- Loading all compiled plugins -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
    <!-- Loading Sweet Alert JS -->
    <?=script_tag('assets/sweetalert/js/sweetalert.min.js')?>
    <!-- Loading SHJS syntax JS -->
    <?=script_tag('assets/shjs/js/sh_main.min.js')?>
    <?=script_tag('assets/shjs/js/sh_java.min.js')?>
    <!-- BODY BELOW -->
    <!-- container -->
    <div class="container">
        <h1>Game Playing</h1>
        <?php if(isset($warning_message)) :?>
            <script>sweetAlert('Oops...', '<?=$warning_message?>', 'error')</script>
        <?php endif;?>
        <div class="row">
            <div class="col-xs-3">
                  <a href="<?=base_url('gamecontroller/get_question/b')?>" class="btn btn-block btn-lg btn-default">Beginner</a>
            </div>
            <div class="col-xs-3">
                <a href="<?=base_url('gamecontroller/get_question/e')?>" class="btn btn-block btn-lg btn-success">Easy</a>
            </div>
            <div class="col-xs-3">
                <a href="<?=base_url('gamecontroller/get_question/n')?>" class="btn btn-block btn-lg btn-warning">Normal</a>
            </div>
            <div class="col-xs-3">
                <a href="<?=base_url('gamecontroller/get_question/h')?>" class="btn btn-block btn-lg btn-danger">Difficult</a>
            </div>
        </div>
        <hr class="divider">
        <div class="row">
            <div class="col-md-6">
                <?php if(isset($description)) :?>
                    <?=$description?>
                <?php endif;?>
            </div>
            <div class="col-md-6">
                Result
            </div>
        </div>
        <hr class="divider">
        <div class="row">
            <div class="col-md-6">
                <?php if(isset($single_choice)) :?>
                    <pre class="sh_java" style="font-size: 28px;"><?=$single_choice->get_q_s_question()?></pre>
                <?php elseif(isset($multi_choice)) :?>
                    <pre class="sh_java" style="font-size: 28px;"><?=$multi_choice->get_q_m_question()?></pre>
                <?php endif;?>
            </div>
            <div class="col-md-6">
                <?php if(isset($result)) :?>
                    <?=$result?>
                    <br>
                <?php endif;?>
            </div>
        </div>  
        <hr class="divider">
        <?php if(isset($single_choice_array)) :?>
            <div class="row">
                <div class="col-md-2" style="font-size:22px;">
                    Choose your Answer
                </div>
                <?php foreach($single_choice_array as $element):?>
                    <div class="col-md-2">
                        <a href="<?=base_url('gamecontroller/player_answer/'.$element['choice_no'])?>">
                            <button class="btn btn-default" style="font-size:25px;">
                                <?=$element['choice_no']?>)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?=$element['choice_detail']?>
                            </button>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <hr class="divider">
    </div>
</body>
</html>