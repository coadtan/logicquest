<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Question_model');
		// $this->load->model('Singlechoice_model');
		// $this->load->model('Multichoice_model');
		// $this->load->model('Ranking_model');
		// $this->load->library('facebook');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
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
}
