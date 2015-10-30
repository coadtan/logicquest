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

	public function get_choice_array($q_m_element){
		$choice=array();
		$symbol_open = 0;
		$number_of_elements = 0;
		//============================================================================
		// Find the total number of choice provided. Maximun of choice provide is 10
		$maximun_choice = 20;
		//============================================================================
		for ($choice_number = 1; $choice_number <= $maximun_choice; $choice_number++) {
			if(substr($q_m_element, 0, 3) == '['.$choice_number.']'){
				$arr = str_split($q_m_element);
				foreach($arr as $char){
					if (strcmp($char, '[') == 0) {
		    			$symbol_open++;
		    			continue;
					}
					if($symbol_open == 1){
						if(strcmp($char, '\'') == 0){
							$symbol_open++;
							continue;
						}
					}elseif($symbol_open == 2){
						$number_of_elements++;
					}
					$symbol_open = 0;
				}
			}
		}
		//============================================================================
		// At this point, $number_of_elements is ready to use
		//============================================================================
		//============================================================================
		// Now we are going to populate choice to present at View
		// [1]['y'];[2]['6'];[3]['>'];[4]['<'];[5]['out'];[6]['print'];[7]['println'];[8]['util'];[9]['(“...”);']; 
		//============================================================================
		for($choice_number = 1; $choice_number <= $number_of_elements; $choice_number++){
			if ($choice_number != $number_of_elements){
				$q_m_element_temp = substr($q_m_element, 0, strpos($q_m_element, '\'];'));
				$q_m_element_temp = trim($q_m_element_temp, '['.$choice_number.'][\'');
				$unuse_data = '['.$choice_number.'][\'' . $q_m_element_temp . '\'];';
				$q_m_element = trim($q_m_element, $unuse_data);
			}elseif($choice_number == $number_of_elements){
				$q_m_element_temp = $q_m_element;
				$q_m_element_temp = trim($q_m_element_temp, '['.$choice_number.'][\'');
			}

			$choice[$choice_number]=array('element_no'=>$choice_number, 'element_detail'=>$q_m_element_temp);
		}

		return $choice;
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
}
