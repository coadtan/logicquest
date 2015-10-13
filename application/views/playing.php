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
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>
    <!-- Loading all compiled plugins -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>

    <!-- BODY BELOW -->

    <!-- Main -->
    <h1>Game Playing</h1>

    <a href="gamecontroller/get_question/b" class="btn btn-block btn-lg btn-success">B</a>
    <a href="gamecontroller/get_question/e" class="btn btn-block btn-lg btn-success">E</a>
    <a href="gamecontroller/get_question/n" class="btn btn-block btn-lg btn-success">N</a>
    <a href="gamecontroller/get_question/h" class="btn btn-block btn-lg btn-success">H</a>

    
</body>
</html>