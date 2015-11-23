<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if ($this->session->userdata('user_id')==10203862441240326) : ?>
<script>
$(document).ready(function(){
    // $("#next").click(function(e){
    //     e.preventDefault(); 
    //     $("#add-question-next").load('<?php echo site_url('AdminController/add_question_next'); ?>');
    // });
	var current_state = "add_question";

	$("#queston-form").submit(function(e){
        e.preventDefault();
        var id = $("input#question_id").val();
		var description = $("input#description").val();
		var result = $("input#result").val();
		var type = $('input[name=question-type]:checked', '#queston-form').val();
		var difficulty = $('input[name=difficulty]:checked', '#queston-form').val();
		
		if(current_state == 'add_question'){
			$.post("<?php echo site_url('AdminController/add_question_next'); ?>", {
				    type: type
	        }, function(type){
	            	if(type == 's'){
	            		$("#add-question-next").load('<?php echo site_url('AdminController/load_singlechoice_view'); ?>');
	            		current_state = "add_single_question";
	            	}else if(type == 'm'){
	            		$("#add-question-next").load('<?php echo site_url('AdminController/load_multichoice_view'); ?>');
	            		current_state = "add_multi_question";
	            	}
	            	$('#submit-for-next').hide();
	            	$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	           	}
	        );
		}else if(current_state == 'add_single_question'){
			var question = $("#question").val();
			var choice1 = $("input#choice1-detail").val();
			var choice2 = $("input#choice2-detail").val();
			var choice3 = $("input#choice3-detail").val();
			var choice4 = $("input#choice4-detail").val();
			var choice5 = $("input#choice5-detail").val();
			var choice6 = $("input#choice6-detail").val();
			var choice7 = $("input#choice7-detail").val();
			var choice8 = $("input#choice8-detail").val();
			var answer = $("input#answer").val();

			$.post("<?php echo site_url('AdminController/save_single_question'); ?>", {
				    id: id,
				    description: description,
				    result: result,
				    type: type,
				    difficulty: difficulty,
				    question: question,
				    choice1: choice1,
				    choice2: choice2,
				    choice3: choice3,
				    choice4: choice4,
				    choice5: choice5,
				    choice6: choice6,
				    choice7: choice7,
				    choice8: choice8,
				    answer: answer
	        	}, function(data){
	        		if(data == 'save_successed'){
		        		swal({   
	                        title: "Yes,",
	                        text: "The question has been saved!",   
	                        type: "success",   
	                        showCancelButton: false,   
	                        confirmButtonColor: "#85CAB5",   
	                        confirmButtonText: "OK",   
	                        closeOnConfirm: true 
	                    },  function(){
	                    	location.reload();
	                    	}
	                	);	
	        		}
	        	}
	        );
			
		}else if(current_state == 'add_multi_question'){
			var question = $("#question").val();
			var element1 = $("input#element1-detail").val();
			var element2 = $("input#element2-detail").val();
			var element3 = $("input#element3-detail").val();
			var element4 = $("input#element4-detail").val();
			var element5 = $("input#element5-detail").val();
			var element6 = $("input#element6-detail").val();
			var element7 = $("input#element7-detail").val();
			var element8 = $("input#element8-detail").val();
			var answer = $("input#answer").val();
			var answer2 = $("input#answer2").val();

			$.post("<?php echo site_url('AdminController/save_multi_question'); ?>", {
				    id: id,
				    description: description,
				    result: result,
				    type: type,
				    difficulty: difficulty,
				    question: question,
				    element1: element1,
				    element2: element2,
				    element3: element3,
				    element4: element4,
				    element5: element5,
				    element6: element6,
				    element7: element7,
				    element8: element8,
				    answer: answer,
				    answer2: answer2
	        	}, function(data){
	        		if(data == 'save_successed'){
		        		swal({   
	                        title: "Yes,",
	                        text: "The question has been saved!",   
	                        type: "success",   
	                        showCancelButton: false,   
	                        confirmButtonColor: "#85CAB5",   
	                        confirmButtonText: "OK",   
	                        closeOnConfirm: true 
	                    },  function(){
	                    	location.reload();
	                    	}
	                	);	
	        		}
	        	}
	        );
		}
		


	});
});
</script>
<?php endif; ?>
<form id="queston-form">
<div class="row">
	<label class="col-sm-2 control-label" for="question_id">
		Question ID: 
	</label>
	<div class="col-sm-2">
		<input class="form-control" type="text" id="question_id" readonly value="<?= $new_id ?>">
	</div>
</div>
<br>
<div class="row">
	<label class="col-sm-2 control-label" for="description">
		Description: 
	</label>
	<div class="col-sm-10">
		<input class="form-control" type="text" id="description">
	</div>
</div>
<br>
<div class="row">
	<label class="col-sm-2 control-label" for="result">
		Result of Compile: 
	</label>
	<div class="col-sm-10">
		<input class="form-control" type="text" id="result" required>
	</div>
</div>
<br>
<br>
<div class="row">
<div class="col-sm-6">
	<label class="radio">
		<input 
			type="radio" 
			name="question-type" 
			data-toggle="radio" 
			value="s"
			required
			class="custom-radio">
				<span class="icons">
					<span class="icon-unchecked"></span>
					<span class="icon-checked"></span>
				</span>
				<font>Single Choice</font>
	</label>
	<label class="radio">
		<input 
			type="radio" 
			name="question-type" 
			data-toggle="radio" 
			value="m"
			required
			class="custom-radio">
				<span class="icons">
					<span class="icon-unchecked">
					</span><span class="icon-checked"></span>
				</span>
				<font>Multi Choice</font>
	</label>
</div>
<div class="col-sm-4">
	<label class="radio">
		<input 
			type="radio" 
			name="difficulty" 
			data-toggle="radio" 
			value="b"
			required
			class="custom-radio">
				<span class="icons">
					<span class="icon-unchecked"></span>
					<span class="icon-checked"></span>
				</span>
				<font>Beginner</font>
	</label>
	<label class="radio">
		<input 
			type="radio" 
			name="difficulty" 
			data-toggle="radio" 
			value="e"
			required
			class="custom-radio">
				<span class="icons">
					<span class="icon-unchecked">
					</span><span class="icon-checked"></span>
				</span>
				<font>Easy</font>
	</label>
	<label class="radio">
		<input 
			type="radio" 
			name="difficulty" 
			data-toggle="radio" 
			value="n"
			required
			class="custom-radio">
				<span class="icons">
					<span class="icon-unchecked">
					</span><span class="icon-checked"></span>
				</span>
				<font>Normal</font>
	</label>
	<label class="radio">
		<input 
			type="radio" 
			name="difficulty" 
			data-toggle="radio" 
			value="h"
			required
			class="custom-radio">
				<span class="icons">
					<span class="icon-unchecked">
					</span><span class="icon-checked"></span>
				</span>
				<font>Difficult</font>
	</label>
</div>
</div>
<br>
<br>
<div class="row" id="submit-for-next">
	<button type="submit" class="btn btn-block btn-lg btn-success" id="next" value="Next">
		Next
		<span class="fui-arrow-right"></span>
	</button>
</div>
<div id="add-question-next"></div>
</form>