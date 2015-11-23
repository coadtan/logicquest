<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
$(document).ready(function(){

	$('#choice1-button').hide();
	$('#choice3').hide();
	$('#choice4').hide();
	$('#choice5').hide();
	$('#choice6').hide();
	$('#choice7').hide();
	$('#choice8').hide();


	$("#choice2-button").click(function(){
		$('#choice3').fadeIn();
		$('#choice2-button').hide();
	});
	$("#choice3-button").click(function(){
		$('#choice4').fadeIn();
		$('#choice3-button-del').hide();
		$('#choice3-button').hide();
	});
	$("#choice4-button").click(function(){
		$('#choice5').fadeIn();
		$('#choice4-button').hide();
		$('#choice4-button-del').hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	});
	$("#choice5-button").click(function(){
		$('#choice6').fadeIn();
		$('#choice5-button-del').hide();
		$('#choice5-button').hide();
	});
	$("#choice6-button").click(function(){
		$('#choice7').fadeIn();
		$('#choice6-button-del').hide();
		$('#choice6-button').hide();
	});
	$("#choice7-button").click(function(){
		$('#choice8').fadeIn();
		$('#choice7-button-del').hide();
		$('#choice7-button').hide();
	});

	
	$("#choice3-button-del").click(function(){
		$('#choice2-button').fadeIn();
		$('#choice2-button-del').fadeIn();
		$('#choice3').hide();
		$('#choice3-detail').val("");
	});

	$("#choice4-button-del").click(function(){
		$('#choice3-button').fadeIn();
		$('#choice3-button-del').fadeIn();
		$('#choice4').hide();
		$('#choice4-detail').val("");
	});

	$("#choice5-button-del").click(function(){
		$('#choice4-button').fadeIn();
		$('#choice4-button-del').fadeIn();
		$('#choice5').hide();
		$('#choice5-detail').val("");
	});

	$("#choice6-button-del").click(function(){
		$('#choice5-button').fadeIn();
		$('#choice5-button-del').fadeIn();
		$('#choice6').hide();
		$('#choice6-detail').val("");
	});

	$("#choice7-button-del").click(function(){
		$('#choice6-button').fadeIn();
		$('#choice6-button-del').fadeIn();
		$('#choice7').hide();
		$('#choice7-detail').val("");
	});

	$("#choice8-button-del").click(function(){
		$('#choice7-button').fadeIn();
		$('#choice7-button-del').fadeIn();
		$('#choice8').hide();
		$('#choice8-detail').val("");
	});

	$(function() {
	    $('#question').keyup();
	});

	$("#question").keyup(function(e) {
		$("#code-preview").load(
			'<?php echo site_url('AdminController/gennerate_preview_code'); ?>', 
			{
				"code": $('#question').val()
			},
			function(){
        		sh_highlightDocument();
    		}
		);
	});

	<?php if($choice3) :?>
		$('#choice2-button').trigger('click');
	<?php endif; ?>
	<?php if($choice4) :?>
		$('#choice3-button').trigger('click');
	<?php endif; ?>
	<?php if($choice5) :?>
		$('#choice4-button').trigger('click');
	<?php endif; ?>
	<?php if($choice6) :?>
		$('#choice5-button').trigger('click');
	<?php endif; ?>
	<?php if($choice7) :?>
		$('#choice6-button').trigger('click');
	<?php endif; ?>
	<?php if($choice8) :?>
		$('#choice7-button').trigger('click');
	<?php endif; ?>

	$("#queston-form").submit(function(e){
		e.preventDefault();
		var id = $("input#question_id").val();
		var description = $("input#description").val();
		var result = $("input#result").val();
		var difficulty = $('input[name=difficulty]:checked', '#queston-form').val();
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

		$.post("<?php echo site_url('AdminController/edit_single_question'); ?>", {
			    id: id,
			    description: description,
			    result: result,
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
                        text: "The question has been updated!",   
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
	});
});
</script>
<form id="queston-form">
<div class="row">
	<label class="col-sm-2 control-label" for="question_id">
		Question ID: 
	</label>
	<div class="col-sm-2">
		<input class="form-control" type="text" id="question_id" readonly value="<?= $q_id ?>">
	</div>
</div>
<br>
<div class="row">
	<label class="col-sm-2 control-label" for="description">
		Description: 
	</label>
	<div class="col-sm-10">
		<input class="form-control" type="text" id="description" value="<?= $description ?>">
	</div>
</div>
<br>
<div class="row">
	<label class="col-sm-2 control-label" for="result">
		Result of Compile: 
	</label>
	<div class="col-sm-10">
		<input class="form-control" type="text" id="result" required value="<?= $result ?>">
	</div>
</div>
<br>
<br>
<div class="row">
<div class="col-sm-4">
	<label class="radio">
		<input 
			type="radio" 
			name="difficulty" 
			data-toggle="radio" 
			value="b"
			required
			<?=($difficulty=='b')?'checked':''?>
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
			<?=($difficulty=='e')?'checked':''?>
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
			<?=($difficulty=='n')?'checked':''?>
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
			<?=($difficulty=='h')?'checked':''?>
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
<div class="row">
	<label class="col-sm-2 control-label" for="question">
		Question: 
	</label>
	<div class="col-sm-10">
		<textarea class="form-control" rows="4" id="question" required><?=$question?></textarea>
	</div>
</div>
<br>
<br>
<br>
<div class="row">
	<label class="col-md-2" >
		Preview: 
	</label>
	<div class="col-md-8">
		<pre class="sh_java sh_sourceCode" id="code-preview">::::CODE PREVIEW::::</pre>
	</div>
</div>
<br>
<br>
<br>
<?php if($choice1) :?>
<div class="row" id="choice1">
	<label class="col-sm-2 control-label" for="choice1-detail">
		Choice 1: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice1-detail" required value="<?= $choice1 ?>">
		<span class="input-group-btn">
			<button id="choice1-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($choice2) :?>
<div class="row" id="choice2">
	<label class="col-sm-2 control-label" for="choice2-detail">
		Choice 2: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice2-detail" required  value="<?= $choice2 ?>">
		<span class="input-group-btn">
			<button id="choice2-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($choice3) :?>
<div class="row" id="choice3">
	<label class="col-sm-2 control-label" for="choice3-detail">
		Choice 3: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice3-detail"  value="<?= $choice3 ?>">
		<span class="input-group-btn">
			<button id="choice3-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice3-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($choice4) :?>
<div class="row" id="choice4">
	<label class="col-sm-2 control-label" for="choice4-detail">
		Choice 4: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice4-detail" value="<?= $choice4 ?>">
		<span class="input-group-btn">
			<button id="choice4-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice4-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($choice5) :?>
<div class="row" id="choice5">
	<label class="col-sm-2 control-label" for="choice5-detail">
		Choice 5: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice5-detail" value="<?= $choice5 ?>">
		<span class="input-group-btn">
			<button id="choice5-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice5-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($choice6) :?>
<div class="row" id="choice6">
	<label class="col-sm-2 control-label" for="choice6-detail">
		Choice 6: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice6-detail"  value="<?= $choice6 ?>">
		<span class="input-group-btn">
			<button id="choice6-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice6-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($choice7) :?>
<div class="row" id="choice7">
	<label class="col-sm-2 control-label" for="choice7-detail">
		Choice 7: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice7-detail"  value="<?= $choice7 ?>">
		<span class="input-group-btn">
			<button id="choice7-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice7-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($choice8) :?>
<div class="row" id="choice8">
	<label class="col-sm-2 control-label" for="choice8-detail">
		Choice 8: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice8-detail"  value="<?= $choice8 ?>">
		<span class="input-group-btn">
			<button id="choice8-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<div class="row">
	<label class="col-sm-2 control-label" for="answer">
		Answer: 
	</label>
	<div class="input-group col-sm-1">
		<input class="form-control" type="text" id="answer" required value="<?=$answer?>">
	</div>
</div>
<br>
<br>
<br>
<div class="row" id="submit-single">
	<button type="submit" class="btn btn-block btn-lg btn-success" id="single_choice_save">
		Save
		<span class="fui-plus"></span>
	</button>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</form>