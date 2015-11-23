<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Singlechoice_model extends CI_Model{
	private $q_s_id;
	private $q_s_question;
	private $q_s_choice;
	private $q_s_answer;

	public function __construct(){
		parent::__construct();
		$this->load->helper('convert_tag_helper');
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
			$single_choice = new Singlechoice_model();
			$single_choice->set_q_s_id($single_choice_object->result_array()[0]['q_s_id']);
			$single_choice->set_q_s_question($single_choice_object->result_array()[0]['q_s_question']);
			$single_choice->set_q_s_choice($single_choice_object->result_array()[0]['q_s_choice']);
			$single_choice->set_q_s_answer($single_choice_object->result_array()[0]['q_s_answer']);
			$complete_question = convert_question_to_html($single_choice->get_q_s_question());
			$single_choice->set_q_s_question($complete_question);
			return $single_choice;
		}else{
			echo "no single_choice found!";
		}
	}

	public function get_choice_array($json_choice){
		$choices = json_decode($json_choice, true);
		$i = 1;
		foreach ($choices["choices"] as $element) {
			$choice[$i]=array('choice_no'=>$i++, 'choice_detail'=>$element);
		}
		
		return $choice;
	}

	public function check_answer($q_s_id, $user_answer){
		$result = $this->db->select('q_s_answer')->from('single_choice')->where('q_s_id', $q_s_id)->get();
		if ($result->num_rows() >= 1){
			if($user_answer == $result->result_array()[0]['q_s_answer']){
				return true;
			}else{
				return false;
			}
		}else{
			echo "no answer found, please check your q_s_id";
		}
	}

	public function add_single_question($id, $question, $choice, $answer){
		$question_single_object = array(
			'q_s_id'=>$id,
			'q_s_question'=>$question,
			'q_s_choice'=>$choice,
			'q_s_answer'=>$answer
		);
		$this->db->trans_start();
		$this->db->insert('single_choice', $question_single_object);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_single_question($id, $question, $choice, $answer){
		$question_single_object = array(
			'q_s_id'=>$id,
			'q_s_question'=>$question,
			'q_s_choice'=>$choice,
			'q_s_answer'=>$answer
		);
		$this->db->trans_start();
		$this->db->where('q_s_id', $id);
		$this->db->update('single_choice', $question_single_object);
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
