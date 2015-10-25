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
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>
    <?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
    <?=script_tag('assets/sweetalert/js/sweetalert.min.js')?>
    <!-- Loading Flat UI -->
    <?=link_tag('assets/flat/css/flat-ui.min.css')?>
    <!-- Loading all compiled plugins -->
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
    <?=script_tag('assets/logicquest/js/application.js')?>
    <?=link_tag('assets/sweetalert/css/sweetalert.css')?>
    <link rel="shortcut icon" href="<?=base_url('assets/logicquest/img/favicon.ico')?>">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="../../dist/js/vendor/html5shiv.js"></script>
      <script src="../../dist/js/vendor/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        body{
            /*background-color: #F4F4F4;*/
        }
    </style>
    <script>
        $(document).ready(function(){
            $('input[name="friend-only-switch"]').on('switchChange.bootstrapSwitch', function(event, state) {
                  if (state){
                    console.log('checked');
                  }else{

                  }
            });
        });        
    </script>
</head>
<body>
    
    <!-- BODY BELOW -->
    <?php $this->load->view('page_header'); ?>
    <br>
    <br>
    <br>
    <div class="container">
        <!-- Main -->
        <?php if(isset($is_game_over)) :?>
            <script>sweetAlert('You have done all the question at this moment!', 'Please try another group or wait for more update', 'success')</script>
        <?php endif; ?>
        <?php if ($this->facebook->logged_in()) : ?>
            <div class="user-info">
                <a href="<?=base_url('gamecontroller')?>" class="btn btn-block btn-lg btn-success">Play Game</a>
            </div>
        <?php endif; ?>
        <br>
    </div>
</body>
</html>