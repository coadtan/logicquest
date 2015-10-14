<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GameController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('QuestionModel');
		$this->load->model('SingleChoiceModel');
		$this->load->model('MultiChoiceModel');
		$this->load->helper('url');
		$this->load->helper('html');
	}
	
	public function index(){
		$this->load->view('playing');
	}

	public function get_question($group){
		$question = $this->QuestionModel;
		$single_choice_object = null;
		$multi_choice_object = null;
		$warning_message = null;
		$description = null;
		$result = null;
		$single_choice_choice = null;
		$multi_choice_choice = null;
		$array_of_q_id = $question->get_q_id_list_from_group($group);
		if(isset($array_of_q_id)){
			$question_id = $question->random_question($array_of_q_id);
			$question = $question->get_question_object($question_id);
			$description = $question->get_description($question->get_q_description());
			$result = $question->get_result($question->get_q_description());
			if ($question->get_q_type() === 's'){
				$single_choice_object = $this->SingleChoiceModel;
				$single_choice_object = $single_choice_object->get_single_choice_object($question->get_q_id());
				$single_choice_choice = $single_choice_object->get_choice($single_choice_object->get_q_s_choice());
			}else if($question->get_q_type() === 'm'){
				$multi_choice_object = $this->MultiChoiceModel;
				$multi_choice_object = $multi_choice_object->get_multi_choice_object($question->get_q_id());
			}
		}else{
			$warning_message = 'No question in this group';
		}
		
		$this->load->view('playing', array(
										'question' => $question,
										'single_choice' => $single_choice_object,
										'multi_choice' => $multi_choice_object,
										'warning_message' => $warning_message,
										'description' => $description,
										'result' => $result,
										'single_choice_choice' => $single_choice_choice,
										'multi_choice_choice' => $multi_choice_choice
									)
						 );

	}
}