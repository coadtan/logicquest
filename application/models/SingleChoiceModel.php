<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SingleChoiceModel extends CI_Model{
	private $q_s_id;
	private $q_s_question;
	private $q_s_choice;
	private $q_s_answer;

	public function __construct(){
		parent::__construct();
	}

	public function set_q_s_id($q_s_id){
		$this->q_s_id = $q_s_id;
	}

	public function set_q_s_question($q_s_question){
		$this->q_s_question = $q_s_question;
	}

	public function set_q_s_choice($q_s_choice){
		$this->q_s_choice = $q_s_choice;
	}

	public function set_q_s_answer($q_s_answer){
		$this->q_s_answer = $q_s_answer;
	}

	public function get_q_s_id(){
		return $this->q_s_id;
	}

	public function get_q_s_question(){
		return $this->q_s_question;
	}

	public function get_q_s_choice(){
		return $this->q_s_choice;
	}

	public function get_q_s_answer(){
		return $this->q_s_answer;
	}
}
