<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Question_model');
		$this->load->model('Singlechoice_model');
		$this->load->model('Multichoice_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('update_rank_helper');
		update_user_rank_session();
	}
	
	public function index(){
		$this->load->view('admin');
	}

	public function get_all_question(){
		$question = $this->Question_model;
		$question_array = $question->get_all_question();
		$this->load->view('question_table', array(
										'question_array' => $question_array
									));
	}

	public function add_question(){
		$question = $this->Question_model;
		$new_id = $question->get_new_id();
		$this->load->view('add_question', array(
										 'new_id' => $new_id
									));
	}

	public function add_question_next(){
		$type = $this->input->post('type');
		if($type == 's'){
			echo "s";
		}elseif($type == 'm'){
			echo "m";
		}
	}

	public function load_singlechoice_view(){
		$this->load->view('add_question_single');
	}

	public function load_multichoice_view(){
		$this->load->view('add_question_multi');
	}

	public function save_single_question(){
		$id = $this->input->post('id');
	    $description = $this->input->post('description');
	    $result = $this->input->post('result');
	    $type = $this->input->post('type');
	    $difficulty = $this->input->post('difficulty');
	    $s_question = $this->input->post('question');
	    $choice1 = $this->input->post('choice1');
	  	$choice2 = $this->input->post('choice2');
	   	$choice3 = $this->input->post('choice3');
	    $choice4 = $this->input->post('choice4');
	    $choice5 = $this->input->post('choice5');
	    $choice6 = $this->input->post('choice6');
	    $choice7 = $this->input->post('choice7');
	    $choice8 = $this->input->post('choice8');
	    $answer = $this->input->post('answer');

	    $question = $this->Question_model;
	    $question_save_status = $question->add_main_question(
	    							$id,
	    							$description, 
									$result, 
									$type, 
									$difficulty
	    						);

    	if($question_save_status){
    		$single_question = $this->Singlechoice_model;
    
    		$choice = array();

    		if($choice1 != ""){
    			$choice['choices']['1'] = $choice1;
    		}

    		if($choice2 != ""){
    			$choice['choices']['2'] = $choice2;
    		}
		
			if($choice3 != ""){
    			$choice['choices']['3'] = $choice3;
    		}

    		if($choice4 != ""){
    			$choice['choices']['4'] = $choice4;
    		}

    		if($choice5 != ""){
    			$choice['choices']['5'] = $choice5;
    		}

    		if($choice6 != ""){
    			$choice['choices']['6'] = $choice6;
    		}

    		if($choice7 != ""){
    			$choice['choices']['7'] = $choice7;
    		}

    		if($choice8 != ""){
    			$choice['choices']['8'] = $choice8;
    		}

			$choice_json = json_encode($choice);
    		$single_question_save_status =  $single_question->add_single_question(
    											$id,
    											$s_question,
    											$choice_json,
    											$answer
    										);
    		if($single_question_save_status){
    			echo "save_successed";
    		}else{
    			echo "save_unsuccessed";
    		}
    	}
	    
	}

	public function save_multi_question(){
		$id = $this->input->post('id');
	    $description = $this->input->post('description');
	    $result = $this->input->post('result');
	    $type = $this->input->post('type');
	    $difficulty = $this->input->post('difficulty');
	    $m_question = $this->input->post('question');
	    $element1 = $this->input->post('element1');
	  	$element2 = $this->input->post('element2');
	   	$element3 = $this->input->post('element3');
	    $element4 = $this->input->post('element4');
	    $element5 = $this->input->post('element5');
	    $element6 = $this->input->post('element6');
	    $element7 = $this->input->post('element7');
	    $element8 = $this->input->post('element8');
	    $answer = $this->input->post('answer');
	    $answer2 = $this->input->post('answer2');

	    $question = $this->Question_model;
	    $question_save_status = $question->add_main_question(
	    							$id,
	    							$description, 
									$result, 
									$type, 
									$difficulty
	    						);

    	if($question_save_status){
    		$multi_question = $this->Multichoice_model;
    	
    		$element = array();

    		if($element1 != ""){
    			$element['elements']['1'] = $element1;
    		}

    		if($element2 != ""){
    			$element['elements']['2'] = $element2;
    		}
		
			if($element3 != ""){
    			$element['elements']['3'] = $element3;
    		}

    		if($element4 != ""){
    			$element['elements']['4'] = $element4;
    		}

    		if($element5 != ""){
    			$element['elements']['5'] = $element5;
    		}

    		if($element6 != ""){
    			$element['elements']['6'] = $element6;
    		}

    		if($element7 != ""){
    			$element['elements']['7'] = $element7;
    		}

    		if($element8 != ""){
    			$element['elements']['8'] = $element8;
    		}

			$element_json = json_encode($element);

			
			$answer_series = "";

			if($answer!= ""){
				$series1 = str_split($answer);
				foreach ($series1 as $each) {
					$answer_series = $answer_series . "[".$each."]";
				}
				$answer_series = $answer_series . ';';
			}
			
			if($answer2!= ""){
				$series2 = str_split($answer2);
				foreach ($series2 as $each) {
					$answer_series = $answer_series . "[".$each."]";
				}
				$answer_series = $answer_series . ';';
			}

    		$multi_question_save_status = $multi_question->add_multi_question(
    											$id,
    											$m_question,
    											$element_json,
    											$answer_series
    									  );
    		if($multi_question_save_status){
    			echo "save_successed";
    		}else{
    			echo "save_unsuccessed";
    		}
    	}
	}

	public function gennerate_preview_code(){
		$code =  $this->input->post('code');
		$code = str_replace("<tab>","&#09;",$code);
		$this->load->view('preview_code', array(
										 'code' => $code
									));
	}
}
