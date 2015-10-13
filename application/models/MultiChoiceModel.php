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
}
