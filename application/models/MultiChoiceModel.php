<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MultiChoiceModel extends CI_Model{
	private $q_m_id;
	private $q_m_question;
	private $q_m_element;
	private $q_m_answer_series;

	public function __construct(){
		parent::__construct();
	}

	public function set_q_m_id($q_m_id){
		$this->q_m_id = $q_m_id;
	}

	public function set_q_m_question($q_m_question){
		$this->q_m_question = $q_m_question;
	}

	public function set_q_m_element($q_m_element){
		$this->q_m_element = $q_m_element;
	}

	public function set_q_m_answer_series($q_m_answer_series){
		$this->q_m_answer_series = $q_m_answer_series;
	}

	public function get_q_m_id(){
		return $this->q_m_id;
	}

	public function get_q_m_question(){
		return $this->q_m_question;
	}

	public function get_q_m_element(){
		return $this->q_m_element;
	}

	public function get_q_m_answer_series(){
		return $this->q_m_answer_series;
	}

	public function get_multi_choice_object($q_m_id){
		$multi_choice_object = $this->db->select('*')->from('multi_choice')->where('q_m_id', $q_m_id)->get();
		if ($multi_choice_object->num_rows() >= 1){
			$multi_choice = new MultiChoiceModel();
			$multi_choice->set_q_m_id($multi_choice_object->result_array()[0]['q_m_id']);
			$multi_choice->set_q_m_question($multi_choice_object->result_array()[0]['q_m_question']);
			$multi_choice->set_q_m_element($multi_choice_object->result_array()[0]['q_m_element']);
			$multi_choice->set_q_m_answer_series($multi_choice_object->result_array()[0]['q_m_answer_series']);
			$complete_question = $this->convert_question_to_html($multi_choice->get_q_m_question());
			$multi_choice->set_q_m_question($complete_question);
			return $multi_choice;
		}else{
			echo "no multi_choice found!";
		}
	}

	private function convert_question_to_html($data){
		$complete_data = null;
		$complete_data = str_replace('<tab>', '&nbsp;&nbsp;&nbsp;&nbsp;', $data);
		$complete_data = str_replace('[____]', '<font color="red">[____]</font>', $complete_data);
		return $complete_data;
	}
}
