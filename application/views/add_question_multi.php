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

	$('#answer2').hide();

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
<div class="row" id="element1">
	<label class="col-sm-2 control-label" for="element1-detail">
		Element 1: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element1-detail" required>
		<span class="input-group-btn">
			<button id="element1-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="element2">
	<label class="col-sm-2 control-label" for="element2-detail">
		Element 2: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element2-detail" required>
		<span class="input-group-btn">
			<button id="element2-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="element3">
	<label class="col-sm-2 control-label" for="element3-detail">
		Element 3: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element3-detail">
		<span class="input-group-btn">
			<button id="element3-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element3-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="element4">
	<label class="col-sm-2 control-label" for="element4-detail">
		Element 4: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element4-detail">
		<span class="input-group-btn">
			<button id="element4-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element4-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="element5">
	<label class="col-sm-2 control-label" for="element5-detail">
		Element 5: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element5-detail">
		<span class="input-group-btn">
			<button id="element5-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element5-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="element6">
	<label class="col-sm-2 control-label" for="element6-detail">
		Element 6: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element6-detail">
		<span class="input-group-btn">
			<button id="element6-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element6-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="element7">
	<label class="col-sm-2 control-label" for="element7-detail">
		Element 7: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element7-detail">
		<span class="input-group-btn">
			<button id="element7-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
			<button id="element7-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
    </div>
 <br>
</div>
<div class="row" id="element8">
	<label class="col-sm-2 control-label" for="element8-detail">
		Element 8: 
	</label>
	<div class="input-group col-sm-8">
		<input type="text" class="form-control" id="element8-detail">
		<span class="input-group-btn">
			<button id="element8-button-del" class="btn btn-default" type="button"><span style="color:#DA5E5E;" class="fui-cross"></span></button>
		</span>
    </div>
 <br>
</div>
<br>
<div class="row">
	<label class="col-sm-2 control-label" for="answer">
		Answer Seq 1: 
	</label>
	<div class="input-group col-sm-6">
		<input class="form-control" type="text" id="answer" required>
		<span class="input-group-btn">
			<button id="answer-button" class="btn btn-default" type="button"><span class="fui-plus"></span></button>
		</span>
	</div>
</div>
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
