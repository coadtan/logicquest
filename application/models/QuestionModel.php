<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class QuestionModel extends CI_Model{
	private $q_id;
	private $q_description;
	private $q_type;
	private $q_group;

	public function __construct(){
		parent::__construct();
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
}
