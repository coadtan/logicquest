<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GameController extends CI_Controller {
	private $previous_question_status = NULL;

	public function __construct(){
		parent::__construct();
		$this->load->model('Question_model');
		$this->load->model('Singlechoice_model');
		$this->load->model('Multichoice_model');
		$this->load->model('Ranking_model');
		$this->load->library('facebook');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
	}
	
	public function index(){
		$this->session->unset_userdata('question_group');
		$this->load->view('playing');
	}

	public function get_question($group){
		$question = $this->Question_model;
		$single_choice_object = null;
		$multi_choice_object = null;
		$warning_message = null;
		$description = null;
		$result = null;
		$multi_choice_array = null;
		$single_choice_array = null;

		$array_of_q_id = $question->get_q_id_list_from_group($group);
		if(isset($array_of_q_id)){
			$this->session->set_userdata('question_group', $group);
			$question_id = $question->random_question($array_of_q_id);
			if ( isset($question_id)){ // Check if there is another question to do.
				$question = $question->get_question_object($question_id);
				$description = $question->get_description($question->get_q_description());
				$result = $question->get_result($question->get_q_description());
				if ($question->get_q_type() === 's'){
					$single_choice_object = $this->Singlechoice_model;
					$single_choice_object = $single_choice_object->get_single_choice_object($question->get_q_id());
					$this->session->set_userdata('current_q_id', $question->get_q_id());
					$this->session->set_userdata('question_type', 's');
					$single_choice_array = $single_choice_object->get_choice_array($single_choice_object->get_q_s_choice());
				}else if($question->get_q_type() === 'm'){
					$multi_choice_object = $this->Multichoice_model;
					$multi_choice_object = $multi_choice_object->get_multi_choice_object($question->get_q_id());
					$this->session->set_userdata('current_q_id', $question->get_q_id());
					$this->session->set_userdata('question_type', 'm');
					$multi_choice_array = $multi_choice_object->get_choice_array($multi_choice_object->get_q_m_element());
				}
		
			}else{ // no question to do
				if(!$this->session->userdata('user_id')){
					$this->facebook_login();
				}
				$ranking = $this->Ranking_model;
				$total_number_of_page = $ranking->get_total_number_of_page();

				$this->load->view('main', array(
										'is_game_over' => 'yes',
										'previous_question_status' => $this->previous_question_status,
										'total_number_of_page' => $total_number_of_page
											)
								);
				return;
			}

		}else{
			$this->session->unset_userdata('question_group');
			$warning_message = 'No question in this group';
		}
		
		$this->load->view('playing', array(
								'question' => $question,
								'single_choice' => $single_choice_object,
								'multi_choice' => $multi_choice_object,
								'warning_message' => $warning_message,
								'description' => $description,
								'result' => $result,
								'single_choice_array' => $single_choice_array,
								'multi_choice_array' => $multi_choice_array,
								'previous_question_status' => $this->previous_question_status
							)
				 );
	}

	public function player_answer(){
		$this->previous_question_status = NULL;
		$question_object = $this->Question_model;
		$group = $this->session->userdata('question_group');
		
		// Use time stamp to prevent form re-submit on refresh
		if ( $this->input->post('time_stamp') == $this->session->userdata('time_stamp') ){
			$this->get_question($group);
		}else{
			$this->session->set_userdata('time_stamp', $this->input->post('time_stamp'));
			if($this->session->userdata('question_type')=='s'){
				$user_answer = $this->input->post('radio-answer');
				$single_choice_object = $this->Singlechoice_model;
				$is_correct = $single_choice_object->check_answer($this->session->userdata('current_q_id') ,$user_answer);
				if ($is_correct){
					$time_use = $this->input->post('time-use');
					$point_gain = $this->calculate_point_from_time($time_use);
					$question_object->save_history($point_gain);
					$this->previous_question_status = 'correct';
					$this->get_question($group);
				}else{
					$question_object->save_history(0);
					$this->previous_question_status = 'incorrect';
					$this->get_question($group);
				}
			}elseif($this->session->userdata('question_type')=='m'){
					$user_answer_series = $this->input->post('user-answer-series');
					$multi_choice_object = $this->Multichoice_model;
					$is_correct = $multi_choice_object->check_answer($this->session->userdata('current_q_id') ,$user_answer_series);
					if ($is_correct){
						$time_use = $this->input->post('time-use');
						$point_gain = $this->calculate_point_from_time($time_use);
						$question_object->save_history($point_gain);
						$this->previous_question_status = 'correct';
						
						$this->get_question($group);
					}else{
						$question_object->save_history(0);
						$this->previous_question_status = 'incorrect';
						$this->get_question($group);
					}				
			}			
		}
	}

	private function calculate_point_from_time($percent_of_progressbar){
		$point_to_return = 0;
		if($percent_of_progressbar <= 100 && $percent_of_progressbar >= 35){
			$point_to_return = 1;
		}elseif($percent_of_progressbar <= 35 && $percent_of_progressbar >= 15){
			$point_to_return = 0.75;
		}elseif($percent_of_progressbar <= 15 && $percent_of_progressbar >= 5){
			$point_to_return = 0.5;
		}elseif($percent_of_progressbar <= 5 && $percent_of_progressbar >= 0){
			$point_to_return = 0;
		}

		return $point_to_return;
	}
}