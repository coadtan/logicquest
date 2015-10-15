<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SingleChoiceModel extends CI_Model{
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
			$single_choice = new SingleChoiceModel();
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

	public function get_choice($q_s_choice){
		$complete_result = '';
		$symbol_open = 0;
		$number_of_choice = 0;
		
		//============================================================================
		// Find the total number of choice provided. Maximun of choice provide is 10
		$maximun_choice = 10;
		//============================================================================

		for ($choice_number = 1; $choice_number <= $maximun_choice; $choice_number++) {
			if(substr($q_s_choice, 0, 3) == '['.$choice_number.']'){
				$arr = str_split($q_s_choice);
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
						$number_of_choice++;
					}
					$symbol_open = 0;
				}
			}
		}
		//============================================================================
		// At this point, $number_of_choice is ready to use
		//============================================================================

		//============================================================================
		// Now we are going to populate choice to present at View
		//[1]['x > y'];[2]['X > Y'];[3]['y < x'];[4]['y > x'];[5]['a < b'];
		//============================================================================
		for($choice_number = 1; $choice_number <= $number_of_choice; $choice_number++){
			if ($choice_number != $number_of_choice){
				$q_s_choice_temp = substr($q_s_choice, 0, strpos($q_s_choice, '\'];'));
				$q_s_choice_temp = trim($q_s_choice_temp, '['.$choice_number.'][\'');
				$unuse_data = '['.$choice_number.'][\'' . $q_s_choice_temp . '\'];';
				$q_s_choice = trim($q_s_choice, $unuse_data);
			}elseif($choice_number == $number_of_choice){
				$q_s_choice_temp = $q_s_choice;
				$q_s_choice_temp = trim($q_s_choice_temp, '['.$choice_number.'][\'');
			}

			$complete_result = (string)$complete_result . '<div class="row"><div class="col-md-4"><a href="';
			$complete_result = (string)$complete_result . base_url('gamecontroller/player_answer/'.$choice_number);
			$complete_result = (string)$complete_result . '\" class="btn btn-block btn-lg btn-default" style="font-size: 20px;">(';
			$complete_result = (string)$complete_result . (string)$choice_number;
			$complete_result = (string)$complete_result . ')';
			$complete_result = (string)$complete_result . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$complete_result = (string)$complete_result . (string)$q_s_choice_temp;
			$complete_result = (string)$complete_result . '</a></div></div>';
			$complete_result = (string)$complete_result . '<br>';

		}

		return $complete_result;
	}
	
}
