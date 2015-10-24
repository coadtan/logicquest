<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ranking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Loading Bootstrap -->
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>
    <!-- Loading Flat UI -->
    <?=link_tag('assets/flat/css/flat-ui.min.css')?>
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>
    <!-- Loading all compiled plugins -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
    <?=script_tag('assets/logicquest/js/application.js')?>
    <link rel="shortcut icon" href="<?=base_url('assets/logicquest/img/favicon.ico')?>">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="../../dist/js/vendor/html5shiv.js"></script>
      <script src="../../dist/js/vendor/respond.min.js"></script>
    <![endif]-->
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
        <!-- NavBar -->

        <!-- Main -->
        <div class="row" align="center" >
            <font style="font-weight:bold; font-size: 50px;">Ranking</font>    
        </div>
        <div class="row" align="right">
            <div class="bootstrap-switch-square">
                <input 
                    type="checkbox" 
                    data-toggle="switch" 
                    id="friend-only-switch"
                    name="friend-only-switch"
                    data-on-text="<span class='fui-check'></span>" 
                    data-off-text="<span class='fui-cross'></span>" 
                />
                <font style="font-weight:bold;">&nbsp;&nbsp;View friend only.</font>
            </div>

        </div>     
        <div class="row">
            <?php if ($ranking_top_ten) :?>
                <?php foreach($ranking_top_ten as $element):?>
                    <?php echo $element['rank_no'] ?>
                    <br>                
                    <?php echo $element['user_id'] ?>
                    <br>                
                    <?php echo $element['user_name'] ?>
                    <br>                
                    <?php echo $element['point'] ?>
                    <br>
                    <hr>
                <?php endforeach;?>
            <?php else :?>
                it not set!~
            <?php endif; ?>
        </div>
        <div class="row" align="center">
            <div class="pagination pagination-warning">
                <a href="#fakelink" class="btn btn-warning previous">
                    <i class="fui-arrow-left"></i>
                    Previous
                </a>
                <ul>
                  <li><a href="#fakelink">1</a></li>
                  <li><a href="#fakelink">2</a></li>
                  <li class=""><a href="#fakelink">3</a></li>
                  <li class="active"><a href="#fakelink">4</a></li>
                  <li><a href="#fakelink">5</a></li>
                </ul>
                <a href="#fakelink" class="btn btn-warning next">
                    Next
                    <i class="fui-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</body>
</html>