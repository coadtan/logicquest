<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function convert_question_to_html($data){
    $complete_data = null;
    $complete_data = str_replace('<tab>', '&nbsp;&nbsp;&nbsp;&nbsp;', $data);
    $complete_data = str_replace('[____]', '<font color="red">[____]</font>', $complete_data);
    return $complete_data;
}

function convert_multi_question($data){
	$complete_data = null;
	$complete_data = str_replace('<tab>', '&nbsp;&nbsp;&nbsp;&nbsp;', $data);
	$complete_data = str_replace('[____]', '<button style="cursor:default;" >[<font style="cursor:pointer;" onclick="undo_answer(event)" ondrop="drop(event)" ondragover="allowDrop(event)" color="red">____</font>]</button>', $complete_data);
	return $complete_data;
}
