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
});
</script>
<div class="row">
	<label class="col-sm-2 control-label" for="question">
		Question: 
	</label>
	<div class="col-sm-10">
		<textarea class="form-control" rows="4" id="question" required></textarea>
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
<div class="row" id="choice1">
	<label class="col-sm-2 control-label" for="choice1-detail">
		Choice 1: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice1-detail" required>
		<span class="input-group-btn">
			<button id="choice1-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="choice2">
	<label class="col-sm-2 control-label" for="choice2-detail">
		Choice 2: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice2-detail" required>
		<span class="input-group-btn">
			<button id="choice2-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="choice3">
	<label class="col-sm-2 control-label" for="choice3-detail">
		Choice 3: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice3-detail">
		<span class="input-group-btn">
			<button id="choice3-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice3-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="choice4">
	<label class="col-sm-2 control-label" for="choice4-detail">
		Choice 4: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice4-detail">
		<span class="input-group-btn">
			<button id="choice4-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice4-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="choice5">
	<label class="col-sm-2 control-label" for="choice5-detail">
		Choice 5: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice5-detail">
		<span class="input-group-btn">
			<button id="choice5-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice5-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="choice6">
	<label class="col-sm-2 control-label" for="choice6-detail">
		Choice 6: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice6-detail">
		<span class="input-group-btn">
			<button id="choice6-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice6-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="choice7">
	<label class="col-sm-2 control-label" for="choice7-detail">
		Choice 7: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice7-detail">
		<span class="input-group-btn">
			<button id="choice7-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="choice7-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="choice8">
	<label class="col-sm-2 control-label" for="choice8-detail">
		Choice 8: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="choice8-detail">
		<span class="input-group-btn">
			<button id="choice8-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row">
	<label class="col-sm-2 control-label" for="answer">
		Answer: 
	</label>
	<div class="input-group col-sm-1">
		<input class="form-control" type="text" id="answer" required>
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