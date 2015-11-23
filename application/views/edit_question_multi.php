<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
$(document).ready(function(){
	
	$('#element1-button').hide();
	$('#element3').hide();
	$('#element4').hide();
	$('#element5').hide();
	$('#element6').hide();
	$('#element7').hide();
	$('#element8').hide();


	<?php if(!$answer_2) : ?>
	$('#answer2').hide();
	<?php endif; ?>
	$("#element2-button").click(function(){
		$('#element3').fadeIn();
		$('#element2-button').hide();
	});
	$("#element3-button").click(function(){
		$('#element4').fadeIn();
		$('#element3-button-del').hide();
		$('#element3-button').hide();
	});
	$("#element4-button").click(function(){
		$('#element5').fadeIn();
		$('#element4-button').hide();
		$('#element4-button-del').hide();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	});
	$("#element5-button").click(function(){
		$('#element6').fadeIn();
		$('#element5-button-del').hide();
		$('#element5-button').hide();
	});
	$("#element6-button").click(function(){
		$('#element7').fadeIn();
		$('#element6-button-del').hide();
		$('#element6-button').hide();
	});
	$("#element7-button").click(function(){
		$('#element8').fadeIn();
		$('#element7-button-del').hide();
		$('#element7-button').hide();
	});	

	$("#answer-button").click(function(){
		$('#answer2').fadeIn();
		$('#answer-button').hide();
	});

	
	$("#element3-button-del").click(function(){
		$('#element2-button').fadeIn();
		$('#element2-button-del').fadeIn();
		$('#element3').hide();
		$('#element3-detail').val("");
	});

	$("#element4-button-del").click(function(){
		$('#element3-button').fadeIn();
		$('#element3-button-del').fadeIn();
		$('#element4').hide();
		$('#element4-detail').val("");
	});

	$("#element5-button-del").click(function(){
		$('#element4-button').fadeIn();
		$('#element4-button-del').fadeIn();
		$('#element5').hide();
		$('#element5-detail').val("");
	});

	$("#element6-button-del").click(function(){
		$('#element5-button').fadeIn();
		$('#element5-button-del').fadeIn();
		$('#element6').hide();
		$('#element6-detail').val("");
	});

	$("#element7-button-del").click(function(){
		$('#element6-button').fadeIn();
		$('#element6-button-del').fadeIn();
		$('#element7').hide();
		$('#element7-detail').val("");
	});

	$("#element8-button-del").click(function(){
		$('#element7-button').fadeIn();
		$('#element7-button-del').fadeIn();
		$('#element8').hide();
		$('#element8-detail').val("");
	});	

	$("#answer2-button-del").click(function(){
		$('#answer2').hide();
		$('#answer-button').fadeIn();
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

	<?php if($element3) :?>
		$('#element2-button').trigger('click');
	<?php endif; ?>
	<?php if($element4) :?>
		$('#element3-button').trigger('click');
	<?php endif; ?>
	<?php if($element5) :?>
		$('#element4-button').trigger('click');
	<?php endif; ?>
	<?php if($element6) :?>
		$('#element5-button').trigger('click');
	<?php endif; ?>
	<?php if($element7) :?>
		$('#element6-button').trigger('click');
	<?php endif; ?>
	<?php if($element8) :?>
		$('#element7-button').trigger('click');
	<?php endif; ?>

	$("#queston-form").submit(function(e){
		e.preventDefault();
		var id = $("input#question_id").val();
		var description = $("input#description").val();
		var result = $("input#result").val();
		var difficulty = $('input[name=difficulty]:checked', '#queston-form').val();
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

		$.post("<?php echo site_url('AdminController/edit_multi_question'); ?>", {
			    id: id,
			    description: description,
			    result: result,
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
<?php if($element1) :?>
<div class="row" id="element1">
	<label class="col-sm-2 control-label" for="element1-detail">
		Element 1: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element1-detail" required value="<?= $element1 ?>">
		<span class="input-group-btn">
			<button id="element1-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($element2) :?>
<div class="row" id="element2">
	<label class="col-sm-2 control-label" for="element2-detail">
		Element 2: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element2-detail" required value="<?= $element2 ?>">
		<span class="input-group-btn">
			<button id="element2-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($element3) :?>
<div class="row" id="element3">
	<label class="col-sm-2 control-label" for="element3-detail">
		Element 3: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element3-detail" value="<?= $element3 ?>">
		<span class="input-group-btn">
			<button id="element3-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element3-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($element4) :?>
<div class="row" id="element4">
	<label class="col-sm-2 control-label" for="element4-detail">
		Element 4: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element4-detail" value="<?= $element4 ?>">
		<span class="input-group-btn">
			<button id="element4-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element4-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($element5) :?>
<div class="row" id="element5">
	<label class="col-sm-2 control-label" for="element5-detail">
		Element 5: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element5-detail" value="<?= $element5 ?>">
		<span class="input-group-btn">
			<button id="element5-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element5-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($element6) :?>
<div class="row" id="element6">
	<label class="col-sm-2 control-label" for="element6-detail">
		Element 6: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element6-detail" value="<?= $element6 ?>">
		<span class="input-group-btn">
			<button id="element6-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element6-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($element7) :?>
<div class="row" id="element7">
	<label class="col-sm-2 control-label" for="element7-detail">
		Element 7: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element7-detail" value="<?= $element7 ?>">
		<span class="input-group-btn">
			<button id="element7-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element7-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<?php endif; ?>
<?php if($element8) :?>
<div class="row" id="element8">
	<label class="col-sm-2 control-label" for="element8-detail">
		Element 8: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element8-detail" value="<?= $element8 ?>">
		<span class="input-group-btn">
			<button id="element8-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
		</span>
    </div>
 <br>
</div>
<br>
<?php endif; ?>
<?php if($answer_1) : ?>
<div class="row">
	<label class="col-sm-2 control-label" for="answer">
		Answer Seq 1: 
	</label>
	<div class="input-group col-sm-6">
		<input class="form-control" type="text" id="answer" required  value="<?=$answer_1?>">
		<span class="input-group-btn">
			<button id="answer-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
	</div>
</div>
<?php endif; ?>
<?php if($answer_2) : ?>
<div class="row" id="answer2">
	<label class="col-sm-2 control-label" for="answer2">
		Answer Seq 2: 
	</label>
	<div class="input-group col-sm-6">
		<input class="form-control" type="text" id="answer2"  value="<?=$answer_2?>">
		<span class="input-group-btn">
			<button id="answer2-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
		</span>
	</div>
</div>
<?php else: ?>
<div class="row" id="answer2">
	<label class="col-sm-2 control-label" for="answer2">
		Answer Seq 2: 
	</label>
	<div class="input-group col-sm-6">
		<input class="form-control" type="text" id="answer2">
		<span class="input-group-btn">
			<button id="answer2-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
		</span>
	</div>
</div>
<?php endif; ?>
<br>
<br>
<br>
<div class="row" id="submit-multi">
	<button type="submit" class="btn btn-block btn-lg btn-success" id="multi_choice_save">
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

</form>