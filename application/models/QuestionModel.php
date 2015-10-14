<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class QuestionModel extends CI_Model{
	private $q_id;
	private $q_description;
	private $q_type;
	private $q_group;

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function set_q_id($q_id){
		$this->q_id = $q_id;
	}

	public function set_q_description($q_description){
		$this->q_description = $q_description;
	}

	public function set_q_type($q_type){
		$this->q_type = $q_type;
	}

	public function set_q_group($q_group){
		$this->q_group = $q_group;
	}

	public function get_q_id(){
		return $this->q_id;
	}

	public function get_q_description(){
		return $this->q_description;
	}

	public function get_q_type(){
		return $this->q_type;
	}

	public function get_q_group(){
		return $this->q_group;
	}

	public function get_q_id_list_from_group($group){
		$array_of_q_id = null;
		if ($group === 'b' ^ $group === 'e' ^ $group === 'n' ^ $group === 'h') {
			$question_id_array = $this->db->select('q_id')->from('question')->where('q_group', $group)->get();
			if ($question_id_array->num_rows() >= 1){
				$array_of_q_id = array();
				$i = 0;
				foreach($question_id_array->result_array() as $value){
					$array_of_q_id[$i] = $value['q_id'];
					$i++;
				}
			}else{
				return $array_of_q_id;
			}
		}else{
    		return $array_of_q_id;
		}

		return $array_of_q_id;
	}

	public function random_question($array_of_q_id){
		$user_id = $this->session->userdata('user_id');
		$question_id_history = $this->db->select('q_id')->from('history')->where('user_id', $user_id)->get();
		if ($question_id_history->num_rows() >= 1){
			$i = 0;
			$array_of_history_q_id = array();
			foreach($question_id_history->result_array() as $value){
				$array_of_history_q_id[$i] = $value['q_id'];
				$i++;
			}
			$array_q_id_no_history = array_diff($array_of_q_id, $array_of_history_q_id);
			$rand_keys = array_rand($array_q_id_no_history, 1);
			return $array_q_id_no_history[$rand_keys];
		}else{
			$rand_keys = array_rand($array_of_q_id, 1);
			return $array_of_q_id[$rand_keys];
		}
	}

	public function get_question_object($q_id){
		$question_object = $this->db->select('*')->from('question')->where('q_id', $q_id)->get();
		if ($question_object->num_rows() >= 1){
			$question = new QuestionModel();
			$question->set_q_id($question_object->result_array()[0]['q_id']);
			$question->set_q_description($question_object->result_array()[0]['q_description']);
			$question->set_q_type($question_object->result_array()[0]['q_type']);
			$question->set_q_group($question_object->result_array()[0]['q_group']);
			return $question;
		}else{
			echo "no question found!";
		}
	}

	public function get_description($q_description){
		$split1 = explode("];[", $q_description);
		$split2 = explode("][", $split1[0]);
		$description = trim($split2[1], '\'');
		// echo $description;
		return $description;
	}

	public function get_result($q_description){
		$split1 = explode("];[", $q_description);
		$split2 = explode("][", $split1[1]);
		$result = trim($split2[1], '\']');
		//echo $result;
		return $result;
	}

}
