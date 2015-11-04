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
    <?=script_tag('assets/jquery/jquery-2.1.4.min.js')?>
    <?=script_tag('assets/sweetalert/js/sweetalert.min.js')?>
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
    <?=script_tag('assets/logicquest/js/application.js')?>
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>
    <?=link_tag('assets/bootstrap/css/bootstrap.min.css')?>
    <?=link_tag('assets/flat/css/flat-ui.min.css')?>
    <?=link_tag('assets/sweetalert/css/sweetalert.css')?>
    <?=link_tag('assets/logicquest/css/footer-distributed.css')?>
    <link rel="shortcut icon" href="<?=base_url('assets/logicquest/img/favicon.ico')?>">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="../../dist/js/vendor/html5shiv.js"></script>
      <script src="../../dist/js/vendor/respond.min.js"></script>
    <![endif]-->
<script>
var current_page = -1;
$(document).ready(function(){
    $('input[name="friend-only-switch"]').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url("MainController/set_friend_only_session"); ?>',
                    data:{'checked':true},
                    success:function(data){
                        loadRankingData();
                        location.reload();
                    }
                });
            }else{
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url("MainController/set_friend_only_session"); ?>',
                    data:{'checked':false},
                    success:function(data){
                        loadRankingData();
                        location.reload();
                    }
                });
            }
            
    });

    $(".ranking-page").click(function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        current_page = id;
        $("#loading").load('<?php echo site_url('MainController/change_ranking_page'); ?>'+'/'+id);
    });

});

function loadRankingData(){
    $("#loading").load('<?php echo site_url('MainController/change_ranking_page'); ?>'+'/'+1);
    document.getElementById("li-1").className = 'active';
    if(current_page != -1){
        var lt_id = "li-"+current_page;
        document.getElementById(lt_id).className = "";
    }
    
}

function showPreviousQuestionStatus(){
    <?php if(isset($previous_question_status)) :?>
        <?php if($previous_question_status === 'correct') :?>
            swal(
                    {   
                        title: "Yes,",
                        text: "That's correct",   
                        type: "success",   
                        showCancelButton: false,   
                        confirmButtonColor: "#85CAB5",   
                        confirmButtonText: "OK",   
                        closeOnConfirm: false 
                    },  showFinishGroupMessage
                );
        <?php elseif($previous_question_status === 'incorrect') :?>
            swal(
                    {   
                        title: "Sorry,",
                        text: "your answer is the wrong one",   
                        type: "error",   
                        showCancelButton: false,   
                        confirmButtonColor: "#85CAB5",   
                        confirmButtonText: "OK",   
                        closeOnConfirm: false 
                    },  showFinishGroupMessage
                );
        <?php endif;?>
    <?php else :?>
        showFinishGroupMessage();
    <?php endif;?>
}

function showFinishGroupMessage() {
    <?php if(isset($is_game_over)) :?>
        swal('You have done all the question at this moment!', 'Please try another group or wait for more update', 'success');
    <?php endif; ?>           
}

function askForSureBeginAgain(){
    swal(
    {
       title: "Are you sure?",   
       text: "You will not be able to recover this action!",   
       type: "warning",   
       showCancelButton: true,   
       confirmButtonColor: "#DD6B55",   
       confirmButtonText: "Yes, let me begin again!",   
        closeOnConfirm: false 
    }, 
    function(){
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("MainController/begin_again"); ?>',
            success:function(data){
                if(data == "success"){
                    loadRankingData();
                    swal(
                        "Alright!", 
                        "Your records have been deleted. Now you can play the same question again.", "success"
                    );
                }else{
                    swal(
                        "Sorry!", 
                        "Something went wrong and your records have not been deleted yet.", "error"
                    );
                }   
            }
        });
        
    }
    );
}
</script>
</head>
<body onload="showPreviousQuestionStatus(); loadRankingData();">
    <!-- BODY BELOW -->
    <?php $this->load->view('page_header'); ?>
    <br><br><br>
    <div class="container">
        <!-- Main -->
        <?php if ($this->facebook->logged_in()) : ?>
            <div class="user-info">
                <a href="<?=base_url('GameController')?>" class="btn btn-block btn-lg btn-success">Play Game</a>
                <br><br><hr>    
            </div>
        <?php endif; ?>
        <br>
        <div class="row" align="center" >
            <font style="font-weight:bold; font-size: 30px;">World Ranking</font>    
        </div>
        <br>
        <div class="row" align="right">
            <div class="bootstrap-switch-square">
                <input 
                    type="checkbox" 
                    data-toggle="switch" 
                    id="friend-only-switch"
                    name="friend-only-switch"
                    <?=($this->session->userdata('show_friend_only')==='true')?'checked':''?>
                    data-on-text="<span class='fui-check'></span>" 
                    data-off-text="<span class='fui-cross'></span>" 
                />
                <font style="font-weight:bold;">&nbsp;&nbsp;View friend only.</font>
            </div>
        </div>
        <br>
        <div class="row" style="height:100px;">
            <br>
            <div class="col-xs-1" align="center">
                <span style="font-size:40px; color:#F0D349;" class="glyphicon glyphicon-tower" aria-hidden="true"></span>
            </div>
            <div class="col-xs-8" align="center">
                <span style="font-size:40px; color:#F0D349;" class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </div>
            <div class="col-xs-3" align="center">
                <span style="font-size:40px; color:#F0D349;" class="glyphicon glyphicon-star" aria-hidden="true"></span>
            </div>
        </div>
        <br>

        <div id="loading"></div>
        
        <?php if ($total_number_of_page) :?>
        <div class="row" align="center">
            <div class="pagination pagination-warning">
                <ul>
                <?php for ($page=1; $page < $total_number_of_page+1; $page++) {?>
                    <li id="li-<?=$page?>" class="<?=(($page==1)?'active':'')?>"><a class="ranking-page" id="<?=$page?>" href="#"><?= $page ?></a></li>
                <?php } ?>
                
                </ul>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($this->facebook->logged_in()) : ?>
        <div class="row" >
            <div class="col-xs-9">
            </div>
            <div class="col-xs-2">
                <button  onclick="askForSureBeginAgain()" title="By clicking this button we will reset all of your point." data-placement="top" data-toggle="tooltip" class="btn btn-block btn-lg btn-danger"><span class="fui-trash"></span>  Begin Again</button>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <br><br><br><br><br><br><br><br>
    <?php $this->load->view('page_footer'); ?>
</body>
</html>