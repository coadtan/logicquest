<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function convert_question_to_html($data){
    $complete_data = null;
    $complete_data = str_replace('<tab>', '&nbsp;&nbsp;&nbsp;&nbsp;', $data);
    $complete_data = str_replace('[____]', '<font color="red">[____]</font>', $complete_data);
    return $complete_data;
}