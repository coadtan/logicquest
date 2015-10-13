<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GameController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('QuestionModel');
		$this->load->helper('url');
		$this->load->helper('html');
	}
	
	public function index(){
		$this->load->view('playing');
	}

	public function get_question($group){
		$question = $this->QuestionModel;
		$array_of_q_id = $question->get_q_id_list_from_group($group);
		$question->random_question($array_of_q_id);
	}
}