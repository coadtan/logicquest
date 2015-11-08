<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Multichoice_model extends CI_Model{
	private $q_m_id;
	private $q_m_question;
	private $q_m_element;
	private $q_m_answer_series;

	public function __construct(){
		parent::__construct();
		$this->load->helper('convert_tag_helper');
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
			$multi_choice = new Multichoice_model();
			$multi_choice->set_q_m_id($multi_choice_object->result_array()[0]['q_m_id']);
			$multi_choice->set_q_m_question($multi_choice_object->result_array()[0]['q_m_question']);
			$multi_choice->set_q_m_element($multi_choice_object->result_array()[0]['q_m_element']);
			$multi_choice->set_q_m_answer_series($multi_choice_object->result_array()[0]['q_m_answer_series']);
			$complete_question = convert_multi_question($multi_choice->get_q_m_question());
			$multi_choice->set_q_m_question($complete_question);
			return $multi_choice;
		}else{
			echo "no multi_choice found!";
		}
	}

	public function get_element_array($json_element){
		$elements = json_decode($json_element, true);
		$i = 1;
		foreach ($elements['elements'] as $each) {
			$element[$i]=array('element_no'=>$i++, 'element_detail'=>$each);
		}
		return $element;
	}

	public function check_answer($q_m_id, $user_answer_series){
		$result = $this->db->select('q_m_answer_series')->from('multi_choice')->where('q_m_id', $q_m_id)->get();
		if ($result->num_rows() >= 1){
			$true_result = $result->result_array()[0]['q_m_answer_series'];
			$true_result_array = explode( ';' , $true_result);
			foreach ($true_result_array as $one_true_result ){
				if($user_answer_series == $one_true_result){
					return true;
				}
			}
			return false;
		}else{
			echo "no answer found, please check your q_m_id";
		}
	}

	public function add_multi_question($id, $m_question, $element_json, $answer){
		$question_multi_object = array(
			'q_m_id'=>$id,
			'q_m_question'=>$m_question,
			'q_m_element'=>$element_json,
			'q_m_answer_series'=>$answer
		);
		$this->db->trans_start();
		$this->db->insert('multi_choice', $question_multi_object);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
}
