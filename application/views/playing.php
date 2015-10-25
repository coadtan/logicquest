<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Playing</title>
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

    <!-- Loading SHJS syntax JS -->
    <?=script_tag('assets/shjs/js/sh_main.min.js')?>
    <?=script_tag('assets/shjs/js/sh_java.min.js')?>

    <link rel="shortcut icon" href="<?=base_url('assets/logicquest/img/favicon.ico')?>">

    <!-- Loading Count down function -->
    <?=script_tag('assets/jquery_countdown/js/jquery.countdown.js')?>

    <!-- Loading Count down css -->
    <?=link_tag('assets/jquery_countdown/css/media.css')?>

    <style type="text/css">
        body { 
            background: #F6F6F6 !important; 
        }

        .progress-bar-move {
          background-color: #1a1a1a;
          height: 25px;
          padding: 2px;
          width: 100%;
          margin: 0px 0 20px 0;
          -moz-border-radius: 5px;
          -webkit-border-radius: 5px;
          border-radius: 5px;
          -moz-box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;
          -webkit-box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;
          box-shadow: 0 0px 5px #000 inset, 0 1px 0 #444;
        }

        .progress-bar-move span {
            display: inline-block;
            height: 100%;
            background-color: #777;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, .5) inset;
            -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, .5) inset;
            box-shadow: 0 1px 0 rgba(255, 255, 255, .5) inset;
            -webkit-transition: width .4s ease-in-out;
            -moz-transition: width .4s ease-in-out;
            -ms-transition: width .4s ease-in-out;
            -o-transition: width .4s ease-in-out;
            transition: width .4s ease-in-out;               
        }

        .orange span {
          background-color: #fecf23;
          background-image: -webkit-gradient(linear, left top, left bottom, from(#fecf23), to(#fd9215));
          background-image: -webkit-linear-gradient(top, #fecf23, #fd9215);
          background-image: -moz-linear-gradient(top, #fecf23, #fd9215);
          background-image: -ms-linear-gradient(top, #fecf23, #fd9215);
          background-image: -o-linear-gradient(top, #fecf23, #fd9215);
          background-image: linear-gradient(top, #fecf23, #fd9215);
        }

        <?php if($this->session->userdata('question_group')):?>    
        .stripes span {
            -webkit-background-size: 30px 30px;
            -moz-background-size: 30px 30px;
            background-size: 30px 30px;
            background-image: -webkit-gradient(linear, left top, right bottom,  color-stop(.25, rgba(255, 255, 255, .15)), color-stop(.25, transparent),  color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .15)),  color-stop(.75, rgba(255, 255, 255, .15)), color-stop(.75, transparent),  to(transparent));
            background-image: -webkit-linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%,  transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%,  transparent 75%, transparent);
            background-image: -moz-linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%,  transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%,  transparent 75%, transparent);
            background-image: -ms-linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%,  transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%,  transparent 75%, transparent);
            background-image: -o-linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%,  transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%,  transparent 75%, transparent);
            background-image: linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%,  transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%,  transparent 75%, transparent);
            -webkit-animation: animate-stripes 3s linear infinite;
            -moz-animation: animate-stripes 3s linear infinite;
        }
        
        @-webkit-keyframes 
        animate-stripes { 
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 60px 0;
            }
        }
        @-moz-keyframes 
        animate-stripes {  
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 60px 0;
            }
        }

        .shine span { 
            position: relative; 
        }

        .shine span::after {
            content: '';
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: #fff;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -webkit-animation: animate-shine 2s ease-out infinite;
            -moz-animation: animate-shine 2s ease-out infinite;
        }
        @-webkit-keyframes 
        animate-shine {
            0% {
                opacity: 0;
                width: 0;
            }
            50% {
                opacity: .5;
            }
            100% {
                opacity: 0;
                width: 95%;
            }
        }
        @-moz-keyframes 
        animate-shine {
            0% {
                opacity: 0;
                width: 0;
            }
            50% {
                opacity: .5;
            }
            100% {
                opacity: 0;
                width: 95%;
            }
        }
        <?php endif;?>
    </style>
    <script>
        var percent = 100;
        $(function(){
            $('.counter').countdown({
                stepTime: 60,
                format: 'sss',
                startTime: "200",
                continuous: true,
                digitImages: 6,
                timerEnd: function() {
                     
                },
                timerCounting: function() {
                    timerbar = document.getElementById("timerbar");
                    timerbar.style.width = percent+"%";
                    percent-=0.5;
                },
                image: "<?=base_url('assets/jquery_countdown/img/digits.png')?>"
              });
            });
        $(document).ready(function(){
            $('.quarter').click(function(){
                    $(this).parent().prev().children('span').css('width','25%');
                });
            $('.half').click(function(){
                    $(this).parent().prev().children('span').css('width','50%');
                });
            $('.three-quarters').click(function(){
                    $(this).parent().prev().children('span').css('width','75%');
                });
            $('.full').click(function(){
                    $(this).parent().prev().children('span').css('width','100%');
                });

            $("#question-submit").click(function(){
                var data = "";
                $("#question-zone > button > font").each(function( index ) {
                    data += "[" + $(this).attr("data-id") + "]";
                });
                 // console.log(data);
                 alert(data);
            });
        });
        var intervalID = setInterval(function(){getData();}, 100);
        var volumeLevel = 40;
        function getData(){
            if (volumeLevel==40){
                volumeLevel=60
            }else if (volumeLevel==60){
                volumeLevel=40
            }
            $("#soundlevel").children('span').css('width', Math.floor(Math.random() * 100)+'%');
        }
        //@ sourceURL=pen.js
        $(function () {
            $('[data-toggle=tooltip]').tooltip();
          });

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("element", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("element");
            var element_text = document.getElementById(data).innerHTML;
            //console.log("xxx"+element_text);
            element_text = element_text.trim();
            element_text = element_text.replace(/&nbsp;/g , "");
            element_text = element_text.trim();
            element_text = element_text.substring(2);
            element_text = element_text.trim();
            ev.target.innerHTML = element_text;
            var element_id = document.getElementById(data).getAttribute("data-id");
            ev.target.setAttribute("data-id", element_id);
        }

        function undo_answer(ev){
            ev.preventDefault();
            // ev.target.style.display = 'none';
            console.log(ev.target.innerHTML);
            if((ev.target.innerHTML !== '[')  && (ev.target.innerHTML !== ']') ){
                ev.target.innerHTML = '____';
                ev.target.removeAttribute("data-id");
            }
            
        }
    </script>
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
    <div class="container">
        <h1>Game Playing</h1>
        <?php if(isset($warning_message)) :?>
            <script>sweetAlert('Oops...', '<?=$warning_message?>', 'error')</script>
        <?php endif;?>
        <?php if(isset($error_message)) :?>
            <script>sweetAlert('Oops...', '<?=$error_message?>', 'error')</script>
        <?php endif;?>
        
        <div class="row">
            <div class="col-xs-3">
                <a title="Click. If you are a newbie." data-placement="top" data-toggle="tooltip" href="<?=base_url('gamecontroller/get_question/b')?>" class="btn btn-block btn-lg btn-default">Beginner</a>
            </div>
            <div class="col-xs-3">
                <a  title="Click. If you are a programming student." data-placement="top" data-toggle="tooltip" href="<?=base_url('gamecontroller/get_question/e')?>" class="btn btn-block btn-lg btn-success">Easy</a>
            </div>
            <div class="col-xs-3">
                <a  title="Click. If you are a programmer." data-placement="top" data-toggle="tooltip" href="<?=base_url('gamecontroller/get_question/n')?>" class="btn btn-block btn-lg btn-warning">Normal</a>
            </div>
            <div class="col-xs-3">
                <a  title="Click. If you are an expert." data-placement="top" data-toggle="tooltip" href="<?=base_url('gamecontroller/get_question/h')?>" class="btn btn-block btn-lg btn-danger">Difficult</a>
            </div>
        </div>
        <!-- Timing Zone -->
        <br>
        <div class="row">
            <div class="col-xs-9" >
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" style="width: 10%;"><br>0</div>
                    <div class="progress-bar progress-bar-warning" style="width: 20%;"><br>0.5</div>
                    <div class="progress-bar" style="width: 30%;"><br>0.75</div>
                    <div class="progress-bar progress-bar-success" style="width: 40%;"><br>1</div>
                </div>
                <div class="progress-bar-move orange shine"> <span id="timerbar" style="width: 100%"></span> </div>
            </div>
            <div class="col-xs-3">
                <?php if(!$this->session->userdata('question_group')):?>
                    
                <?php else :?>
                    <div class="counter"></div>
                <?php endif;?>
            </div>
        </div>
        <br>
        <!-- End of Timing Zone -->
        <?php if(!$this->session->userdata('question_group')):?>
        <div class="row">
            <div class="col-md-7">
                <video class="video-js" preload="auto" poster="<?=base_url('assets/logicquest/img/video_poster.png')?>" data-setup="{}">
                    <source src="http://iurevych.github.com/Flat-UI-videos/big_buck_bunny.mp4" type="video/mp4">
                    <source src="http://iurevych.github.com/Flat-UI-videos/big_buck_bunny.webm" type="video/webm">
                </video>
            </div>  
        </div>
        <?php else :?>
            <hr class="divider">
            <div class="row">
                <div class="col-md-8">
                    <?php if(isset($description)) :?>
                        <?=$description?>
                    <?php endif;?>
                </div>
                <div class="col-md-4">
                    Result
                </div>
            </div>
            <hr class="divider">
            <div class="row">
                <div class="col-md-8">
                    <?php if(isset($single_choice)) :?>
                        <pre id="question-zone" class="sh_java" style="font-size: 28px;"><?=$single_choice->get_q_s_question()?></pre>
                    <?php elseif(isset($multi_choice)) :?>
                        <pre id="question-zone" class="sh_java" style="font-size: 28px;"><?=$multi_choice->get_q_m_question()?></pre>
                    <?php endif;?>
                </div>
                <div class="col-md-4">
                    <?php if(isset($result)) :?>
                        <?=$result?>
                        <br>
                    <?php endif;?>
                </div>
            </div>  
            <hr class="divider">
            <?php if(isset($single_choice_array)) :?>
                <div class="row">
                <?php
                    $attribute=array('role'=>'form');
                    echo form_open('gamecontroller/player_answer', $attribute);
                ?>
                    <?php foreach($single_choice_array as $element):?>
                        <div class="radio">
                            <label><input type="radio" name="radio-answer" value="<?=$element['choice_no']?>" required><?=$element['choice_detail']?></label>
                        </div>
                    <?php endforeach;?>
                    <input type="submit" value="Answer">
                <?=form_close()?>
                </div>
            <?php endif;?>
            <?php if(isset($multi_choice_array)) :?>
                <div class="row">
                    <div class="col-md-2" style="font-size:22px;">
                        Order your elements
                    </div>
                    <?php foreach($multi_choice_array as $element):?>
                        <div class="col-md-2">
                            <button id="dragable<?=$element['element_no']?>" data-id="<?=$element['element_no']?>" draggable="true" ondragstart="drag(event)" class="btn btn-default" style="font-size:25px;">
                                <?=$element['element_no']?>)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?=$element['element_detail']?>
                            </button>
                        </div>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
            <hr class="divider">           
        <?php endif;?>
        <!-- <button id="question-submit">submit</button> -->
    </div>
</body>
</html>