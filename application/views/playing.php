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
          background-image: -webkit-gradient(linear, left top, left bottom, from(#fecf23), to(#fecf23));
          background-image: -webkit-linear-gradient(top, #fecf23, #fecf23);
          background-image: -moz-linear-gradient(top, #fecf23, #fecf23);
          background-image: -ms-linear-gradient(top, #fecf23, #fecf23);
          background-image: -o-linear-gradient(top, #fecf23, #fecf23);
          background-image: linear-gradient(top, #fecf23, #fecf23);

          /*
          green : #2ecc71
          dark green: #1abc9c
          yellow: #f1c40f
          red: #e74c3c
          */
        }

        .green span {
          background-color: #2ecc71;
          background-image: -webkit-gradient(linear, left top, left bottom, from(#2ecc71), to(#2ecc71));
          background-image: -webkit-linear-gradient(top, #2ecc71, #2ecc71);
          background-image: -moz-linear-gradient(top, #2ecc71, #2ecc71);
          background-image: -ms-linear-gradient(top, #2ecc71, #2ecc71);
          background-image: -o-linear-gradient(top, #2ecc71, #2ecc71);
          background-image: linear-gradient(top, #2ecc71, #2ecc71);
        }

        .darkgreen span {
          background-color: #1abc9c;
          background-image: -webkit-gradient(linear, left top, left bottom, from(#1abc9c), to(#1abc9c));
          background-image: -webkit-linear-gradient(top, #1abc9c, #1abc9c);
          background-image: -moz-linear-gradient(top, #1abc9c, #1abc9c);
          background-image: -ms-linear-gradient(top, #1abc9c, #1abc9c);
          background-image: -o-linear-gradient(top, #1abc9c, #1abc9c);
          background-image: linear-gradient(top, #1abc9c, #1abc9c);            
        }

        .yellow span {
          background-color: #f1c40f;
          background-image: -webkit-gradient(linear, left top, left bottom, from(#f1c40f), to(#f1c40f));
          background-image: -webkit-linear-gradient(top, #f1c40f, #f1c40f);
          background-image: -moz-linear-gradient(top, #f1c40f, #f1c40f);
          background-image: -ms-linear-gradient(top, #f1c40f, #f1c40f);
          background-image: -o-linear-gradient(top, #f1c40f, #f1c40f);
          background-image: linear-gradient(top, #f1c40f, #f1c40f);            
        }

        .red span {
          background-color: #e74c3c;
          background-image: -webkit-gradient(linear, left top, left bottom, from(#e74c3c), to(#e74c3c));
          background-image: -webkit-linear-gradient(top, #e74c3c, #e74c3c);
          background-image: -moz-linear-gradient(top, #e74c3c, #e74c3c);
          background-image: -ms-linear-gradient(top, #e74c3c, #e74c3c);
          background-image: -o-linear-gradient(top, #e74c3c, #e74c3c);
          background-image: linear-gradient(top, #e74c3c, #e74c3c);            
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
                    sweetAlert('Oops... time out', 'You still can review and submit the question but you will gain no point.', 'error');
                },
                timerCounting: function() {
                    timerbar = document.getElementById("timerbar");
                    timerbar.style.width = percent+"%";
                    percent-=0.5;
                    console.log(percent);
                    if(percent <= 100 && percent >= 35){
                        document.getElementById("timerbar-border").className = "progress-bar-move green shine";
                    }else if(percent <= 35 && percent >= 15){
                        document.getElementById("timerbar-border").className = "progress-bar-move darkgreen shine";
                    }else if(percent <= 15 && percent >= 5){
                        document.getElementById("timerbar-border").className = "progress-bar-move yellow shine";
                    }else if(percent <= 5 && percent >= 0){
                        document.getElementById("timerbar-border").className = "progress-bar-move red shine";
                    }
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
                var time = percent;
                $("#question-zone > button > font").each(function( index ) {
                    data += "[" + $(this).attr("data-id") + "]";
                });
                $("#user-answer-series").val(data);
                $("#time-use").val(time);
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
        <?php if(isset($previous_question_status)) :?>
            <?php if($previous_question_status === 'correct') :?>
                <script>sweetAlert('Yes,', 'That\'s correct', 'success')</script>
            <?php elseif($previous_question_status === 'incorrect') :?>
                <script>sweetAlert('Sorry,', 'your answer is the wrong one', 'error')</script>
            <?php endif;?>
        <?php endif;?>
        <?php if(isset($error_message)) :?>
            <script>sweetAlert('Oops...', '<?=$error_message?>', 'error')</script>
        <?php endif;?>
        
        <div class="row">
            <div class="col-xs-3">
                <a title="Click. If you are a newbie." data-placement="top" data-toggle="tooltip" href="<?=base_url('GameController/get_question/b')?>" class="btn btn-block btn-lg btn-default">Beginner</a>
            </div>
            <div class="col-xs-3">
                <a  title="Click. If you are a programming student." data-placement="top" data-toggle="tooltip" href="<?=base_url('GameController/get_question/e')?>" class="btn btn-block btn-lg btn-success">Easy</a>
            </div>
            <div class="col-xs-3">
                <a  title="Click. If you are a programmer." data-placement="top" data-toggle="tooltip" href="<?=base_url('GameController/get_question/n')?>" class="btn btn-block btn-lg btn-warning">Normal</a>
            </div>
            <div class="col-xs-3">
                <a  title="Click. If you are an expert." data-placement="top" data-toggle="tooltip" href="<?=base_url('GameController/get_question/h')?>" class="btn btn-block btn-lg btn-danger">Difficult</a>
            </div>
        </div>
        <!-- Timing Zone -->
        <br>
        <div class="row">
            <div class="col-xs-9" >
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" style="width: 5%;"><br>0 Point</div>
                    <div class="progress-bar progress-bar-warning" style="width: 10%;"><br>0.5 Point</div>
                    <div class="progress-bar" style="width: 20%;"><br>0.75 Point</div>
                    <div class="progress-bar progress-bar-success" style="width: 65%;"><br>1 Point</div>
                </div>
                <div id="timerbar-border" class="progress-bar-move orange shine"> <span id="timerbar" style="width: 100%"></span> </div>
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
                <video class="video-js" preload="auto" poster="<?=base_url('assets/logicquest/img/video_poster.png')?>" data-setup="{}">
                    <source src="http://iurevych.github.com/Flat-UI-videos/big_buck_bunny.mp4" type="video/mp4">
                    <source src="http://iurevych.github.com/Flat-UI-videos/big_buck_bunny.webm" type="video/webm">
                </video>
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
                    echo form_open('GameController/player_answer', $attribute);
                ?>
                    <?php foreach($single_choice_array as $element):?>
                        <label class="radio">
                            <input type="radio" name="radio-answer" value="<?=$element['choice_no']?>" required data-toggle="radio" class="custom-radio">
                            <span style="font-size: 22pt; margin-top:14px;" class="icons">
                                <span class="icon-unchecked"></span>
                                <span class="icon-checked"></span>
                            </span>
                            <font  style="font-size: 23pt;">&nbsp;&nbsp;&nbsp;&nbsp;<?=$element['choice_detail']?></font>
                        </label>
                    <?php endforeach;?>
                    <br>
                    <input type="hidden" id="time-use" name="time-use" value="200">
                    <?php echo form_hidden( 'time_stamp', time() ); ?> 
                    <div class="col-md-4">
                        <input id="question-submit"  class="btn btn-block btn-lg btn-primary" type="submit" value="Submit Answer">
                        <br>
                        <br>
                        <br>
                    </div>
                <?=form_close()?>
                </div>
            <?php endif;?>
            <?php if(isset($multi_choice_array)) :?>
                <div class="row" align="center">
                    <font style="font-size:22px; font-weight:bold;">Order your Elements</font>
                    <br>
                    <br>    
                </div>
                <div class="row" style="border-radius: 25px; border: 2px solid #8AC007; padding: 20px;">
                    <?php $element_row = 1 ?>
                    <?php foreach($multi_choice_array as $element):?>
                        <?php if ($element_row % 4 == 0) :?>
                            <div class="row">
                        <?php endif; ?>
                        <div class="col-md-3">
                            <button id="dragable<?=$element['element_no']?>" data-id="<?=$element['element_no']?>" draggable="true" ondragstart="drag(event)" class="btn btn-default" style="font-size:25px;">
                                <?=$element['element_no']?>)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?=$element['element_detail']?>
                            </button>
                        </div>
                        <?php if ($element_row++ % 4 == 0) :?>
                            </div>
                            <br>
                        <?php endif; ?>
                    <?php endforeach;?>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <?php
                            $attribute=array('role'=>'form');
                            echo form_open('GameController/player_answer', $attribute);
                        ?>
                            <input type="hidden" id="user-answer-series" name="user-answer-series" value="no value yet">
                            <input type="hidden" id="time-use" name="time-use" value="0">
                            <?php echo form_hidden( 'time_stamp', time() ); ?> 
                            <input  id="question-submit" type="submit" class="btn btn-block btn-lg btn-primary" value="Submit">
                        <?=form_close() ?>          
                    </div> 
                </div>
            <hr class="divider">       
            <br>
            <br>
            <?php endif;?> 
        <?php endif;?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- footer section -->
    <?php $this->load->view('page_footer'); ?>
    <!-- end of footer section -->
</body>
</html>