<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GameController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('QuestionModel');
		$this->load->model('SingleChoiceModel');
		$this->load->model('MultiChoiceModel');
		$this->load->model('RankingModel');
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
		$question = $this->QuestionModel;
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
					$single_choice_object = $this->SingleChoiceModel;
					$single_choice_object = $single_choice_object->get_single_choice_object($question->get_q_id());
					$this->session->set_userdata('current_q_id', $question->get_q_id());
					$this->session->set_userdata('question_type', 's');
					$single_choice_array = $single_choice_object->get_choice_array($single_choice_object->get_q_s_choice());
				}else if($question->get_q_type() === 'm'){
					$multi_choice_object = $this->MultiChoiceModel;
					$multi_choice_object = $multi_choice_object->get_multi_choice_object($question->get_q_id());
					$this->session->set_userdata('current_q_id', $question->get_q_id());
					$this->session->set_userdata('question_type', 'm');
					$multi_choice_array = $multi_choice_object->get_choice_array($multi_choice_object->get_q_m_element());
				}
		
			}else{ // no question to do
				if(!$this->session->userdata('user_id')){
					$this->facebook_login();
				}
				$ranking = $this->RankingModel;
				$ranking_top_ten_array = $ranking->get_top_ten_ranking();
				$this->load->view('main', array(
										'is_game_over' => 'yes'
									)
								);
				$this->load->view('ranking', array(
												'ranking_top_ten' => $ranking_top_ten_array
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
								'multi_choice_array' => $multi_choice_array
							)
				 );		


	}

	public function player_answer(){
	    $user_answer = $this->input->post('radio-answer');
		if(
			$user_answer != 1 && 
			$user_answer != 2 && 
			$user_answer != 3 && 
			$user_answer != 4 && 
			$user_answer != 5 && 
			$user_answer != 6
		){
			$this->session->unset_userdata('question_group');
			$this->load->view('playing', array(
											'error_message' => 'Please answer the choice.'
										)
							 );
		}else{
			if($this->session->userdata('question_type')=='s'){
				$single_choice_object = $this->SingleChoiceModel;
				$is_correct = $single_choice_object->check_answer($this->session->userdata('current_q_id') ,$user_answer);
				if ($is_correct){
					// update point

					//
					$group = $this->session->userdata('question_group');
					$this->get_question($group);
				}else{
					echo "incorrect";
				}
			}elseif ($this->session->userdata('question_type')=='m') {

			}

		}
	}
}