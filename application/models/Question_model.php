<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Question_model extends CI_Model{
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
			if (count($array_q_id_no_history)==0){
				return NULL;
			}else{
				$rand_keys = array_rand($array_q_id_no_history, 1);
				return $array_q_id_no_history[$rand_keys];				
			}
		}else{
			$rand_keys = array_rand($array_of_q_id, 1);
			return $array_of_q_id[$rand_keys];
		}
	}

	public function get_question_object($q_id){
		$question_object = $this->db->select('*')->from('question')->where('q_id', $q_id)->get();
		if ($question_object->num_rows() >= 1){
			$question = new Question_model();
			$question->set_q_id($question_object->result_array()[0]['q_id']);
			$question->set_q_description($question_object->result_array()[0]['q_description']);
			$question->set_q_type($question_object->result_array()[0]['q_type']);
			$question->set_q_group($question_object->result_array()[0]['q_group']);
			return $question;
		}else{
			echo "no question found!";
		}
	}

	public function get_all_question(){
		$questions = $this->db->select('*')->from('question')->get();
		if ($questions->num_rows() >= 1){
			$question_array=array();
			$q_no = 0;
			foreach ($questions->result_array() as $row){
				$question_array[$q_no++]=array(
											'q_no'=>$q_no,
											'q_id'=>$row['q_id'],
											'description'=>$this->get_description($row['q_description']),
											'result'=>$this->get_result($row['q_description']),
											'type'=>($row['q_type']=='s'?'Single Choice':'Multi Choice'),
											'group'=>($row['q_group']=='b'?'Beginner':($row['q_group']=='e'?'Easy':$row['q_group']=='n'?'Normal':($row['q_group']=='h'?'Difficult':'')))
											);
			}

			return $question_array;
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

	public function save_history($point_gain){
		$user_id = $this->session->userdata('user_id');
		$q_id = $this->session->userdata('current_q_id');	
		$history = array('user_id'=>$user_id,'q_id'=>$q_id, 'point_gain'=>$point_gain);
		$this->db->trans_start();
		$this->db->insert('history', $history);
		$summary_point_object = $this->db->select('user_point')->from('summary_point')->where('user_id', $user_id)->get();
		if ($summary_point_object->num_rows() >= 1){
			$old_summary_point = $summary_point_object->result_array()[0]['user_point'];
			$new_summary_point = $old_summary_point + $point_gain;
			$new_point = array('user_point'=>$new_summary_point);
			$this->db->where('user_id', $user_id);
			$this->db->update('summary_point', $new_point);
		}
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function get_new_id(){
		$total_row = $this->db->count_all('question');
		$new_id = strval($total_row + 1);
		for($i = strlen($new_id); $i < 10; $i++){
			$new_id = "0" . $new_id;
		}
		return $new_id;
	}

	public function add_main_question($id, $description, $result, $type, $difficulty){
		$q_description = "['description']['". $description ."'];['result']['". $result ."']";
		$question_object = array(
			'q_id'=>$id,
			'q_description'=>$q_description,
			'q_type'=>$type,
			'q_group'=>$difficulty
		);
		$this->db->trans_start();
		$this->db->insert('question', $question_object);
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
