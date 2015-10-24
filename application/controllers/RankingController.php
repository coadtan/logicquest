<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RankingController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->model('RankingModel');
	}
	public function index(){
		$ranking = $this->RankingModel;
		$ranking_top_ten_array = $ranking->get_top_ten_ranking();
		$this->load->view('ranking', array(
										'ranking_top_ten' => $ranking_top_ten_array
									)
						 );
	}




}