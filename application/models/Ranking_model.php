<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ranking_model extends CI_Model{
	private $rank_no;
	private $user_id;
	private $user_name;
	private $point;
	private $NUMBER_OF_DATA_PER_ONE_PAGE = 10;

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function set_rank_no($rank_no){
		$this->rank_no = $rank_no;
	}

	public function get_rank_no(){
		return $this->rank_no;
	}

	public function set_user_id($user_id){
		$this->user_id = $user_id;
	}

	public function get_user_id(){
		return $this->user_id;
	}
	
	public function set_user_name($user_name){
		$this->user_name = $user_name;
	}

	public function get_user_name(){
		return $this->user_name;
	}
	public function set_point($point){
		$this->point = $point;
	}

	public function get_point(){
		return $this->point;
	}

	public function get_ranking_by_page($page){
		$first_limit = ($page - 1) * $this->NUMBER_OF_DATA_PER_ONE_PAGE;
		$number_of_fetch_row = $this->NUMBER_OF_DATA_PER_ONE_PAGE;

		if($this->session->userdata('show_friend_only')==='true'){
			/*
			SELECT * 
			FROM ranking_view
			WHERE ranking_view.user_id IN (
											SELECT friend_id 
											FROM facebook_friend 
											WHERE fb_id = 10203862441240326 
										  ) OR ranking_view.user_id = 10203862441240326; 


			*/
			// This is sub query
			$this->db->select('friend_id')->from('facebook_friend');
			$this->db->where('fb_id',$this->session->userdata('user_id'));
			$subQuery =  $this->db->get_compiled_select();
			// $this->db->_reset_select();

			$this->db->select('*')
					->from('ranking_view')
					->where("`user_id` IN ($subQuery)", NULL, FALSE);
			$this->db->or_where("`user_id`", $this->session->userdata('user_id'));

			$this->db->limit($number_of_fetch_row, $first_limit);
			// limit(number_of_fetch_row, start_from);
			$query = $this->db->get();

			if ($query->num_rows() >= 1){
				$ranking_result=array();
				$rankno = 0;
				foreach ($query->result_array() as $row){
					$ranking_result[$rankno++]=array(
											'rank_no'=>$row['rank'],
											'user_id'=>$row['user_id'],
											'user_name'=>$row['fb_name'],
											'point'=>$row['user_point']
											);
				}

				return $ranking_result;
			}
		}else{
			$this->db->select('*');
			$this->db->from('ranking_view');

			$this->db->limit($number_of_fetch_row, $first_limit);
			$query = $this->db->get();

			if ($query->num_rows() >= 1){
				$ranking_result=array();
				$rankno = 0;
				foreach ($query->result_array() as $row){
					$ranking_result[$rankno++]=array(
											'rank_no'=>$row['rank'],
											'user_id'=>$row['user_id'],
											'user_name'=>$row['fb_name'],
											'point'=>$row['user_point']
											);
				}

				return $ranking_result;
			}
		}
	}
	
	public function get_total_number_of_page(){
		if($this->session->userdata('show_friend_only')==='true'){
			// This is sub query
			$this->db->select('friend_id')->from('facebook_friend');
			$this->db->where('fb_id',$this->session->userdata('user_id'));
			$subQuery =  $this->db->get_compiled_select();
			// $this->db->_reset_select();
			$this->db->select('*')
					->from('ranking_view')
					->where("`user_id` IN ($subQuery)", NULL, FALSE);
			$this->db->or_where("`user_id`", $this->session->userdata('user_id'));
			$total_row = $this->db->count_all_results();
			/* ///////////// CASE POSSIBLE /////////////
				totalrow = 0; return 0
				totalrow = 1-9 return 1
				totalrow = 10 return 1
				totalrow = 19 return 2
			

			*/
			if ($total_row == 0){
				$number_of_page = 0;
			}elseif($total_row / $this->NUMBER_OF_DATA_PER_ONE_PAGE<1){
				$number_of_page = 1;
			}elseif($total_row % $this->NUMBER_OF_DATA_PER_ONE_PAGE == 0){
				$number_of_page = $total_row / $this->NUMBER_OF_DATA_PER_ONE_PAGE;
			}else{
				$number_of_page = floor($total_row / $this->NUMBER_OF_DATA_PER_ONE_PAGE)+1;
			}
		
			return $number_of_page;
		}else{
			$total_row = $this->db->count_all('ranking_view');
			if ($total_row == 0){
				$number_of_page = 0;
			}elseif($total_row / $this->NUMBER_OF_DATA_PER_ONE_PAGE<1){
				$number_of_page = 1;
			}elseif($total_row % $this->NUMBER_OF_DATA_PER_ONE_PAGE == 0){
				$number_of_page = $total_row / $this->NUMBER_OF_DATA_PER_ONE_PAGE;
			}else{
				$number_of_page = floor($total_row / $this->NUMBER_OF_DATA_PER_ONE_PAGE)+1;
			}
			
			return $number_of_page;		
		}
	}

	//Reset ranking and clear all history. So they can begin again
	public function reset_ranking($user_id){
		$this->db->trans_start();
		$this->db->where('user_id', $user_id);
		$reset_point = array('user_point'=>0);
		$this->db->update('summary_point', $reset_point);
		$this->db->where('user_id', $user_id);
		$this->db->delete('history'); 
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