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
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>
    <!-- Loading all compiled plugins -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
    <!-- Loading Sweet Alert JS -->
    <?=script_tag('assets/sweetalert/js/sweetalert.min.js')?>

    <!-- BODY BELOW -->

    <!-- Main -->
    <h1>Game Playing</h1>
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

    <?php if(isset($question)) :?>
        <?=$question->get_q_description()?>
        <br>
    <?php endif;?>

    <?php if(isset($single_choice)) :?>
        <?=$single_choice->get_q_s_question()?>
    <?php endif;?>

    <?php if(isset($multi_choice)) :?>
        <?=$multi_choice->get_q_m_question()?>
    <?php endif;?>

    <?php if(isset($warning_message)) :?>
        <script>swal('<?=$warning_message?>')</script>
    <?php endif;?>
    
</body>
</html>