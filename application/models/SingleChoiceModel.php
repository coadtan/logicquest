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

	public function get_single_choice_object($q_s_id){
		$single_choice_object = $this->db->select('*')->from('single_choice')->where('q_s_id', $q_s_id)->get();
		if ($single_choice_object->num_rows() >= 1){
			$single_choice = new SingleChoiceModel();
			$single_choice->set_q_s_id($single_choice_object->result_array()[0]['q_s_id']);
			$single_choice->set_q_s_question($single_choice_object->result_array()[0]['q_s_question']);
			$single_choice->set_q_s_choice($single_choice_object->result_array()[0]['q_s_choice']);
			$single_choice->set_q_s_answer($single_choice_object->result_array()[0]['q_s_answer']);
			$complete_question = $this->convert_question_to_html($single_choice->get_q_s_question());
			$single_choice->set_q_s_question($complete_question);
			return $single_choice;
		}else{
			echo "no single_choice found!";
		}
	}

	private function convert_question_to_html($data){
		$complete_data = null;
		$complete_data = str_replace('<tab>', '&nbsp;&nbsp;&nbsp;&nbsp;', $data);
		$complete_data = str_replace('[____]', '<font color="red">[____]</font>', $complete_data);
		return $complete_data;
	}

}
