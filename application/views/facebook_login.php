<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $newDate = date('d-F-Y');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Loading Bootstrap -->
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>

    <!-- Loading Flat UI -->
    <?=link_tag('assets/flat/css/flat-ui.min.css')?>

    <link rel="shortcut icon" href="<?=base_url('assets/logicquest/img/favicon.ico')?>">

</head>
<body>
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>
    <!-- Loading all compiled plugins -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
    <!-- BODY BELOW -->
    <?php $this->load->view('page_header'); ?>
    <br>
    <br>
    <br>
    <div class="container">
        <!-- NavBar -->

        <!-- Main -->
        <?php if ($this->facebook->logged_in()) : ?>
            <div class="user-info">
                <a href="<?=base_url('gamecontroller')?>" class="btn btn-block btn-lg btn-success">Play Game</a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>