<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GameController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('QuestionModel');
		$this->load->model('SingleChoiceModel');
		$this->load->helper('url');
		$this->load->helper('html');
	}
	
	public function index(){
		$this->load->view('playing');
	}

	public function get_question($group){
		$question = $this->QuestionModel;
		$array_of_q_id = $question->get_q_id_list_from_group($group);
		$question_id = $question->random_question($array_of_q_id);
		$question = $question->get_question_object($question_id);
		if ($question->get_q_type() === 's'){
			$single_choice = $this->SingleChoiceModel;
			$single_choice->get_single_choice_object($question->get_q_id());
		}
		$this->load->view('playing', array('question' => $question));
	}
}