<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ranking_model extends CI_Model{
	private $rank_no;
	private $user_id;
	private $user_name;
	private $point;

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
		/*
		page |	first_limit		|	last_limit
		1			0					2
		2			20					40
		3			40					60
		4			60					80
		5			80					100
		6			100					120
		.			.					.
		.			.					.
		.			.					.
		10			180					200
		*/
		$first_limit = ($page - 1) * 20;
		$number_of_fetch_row = 20;

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
			// else{
			// 	echo "no ranking page found!";
			// }
		}else{
			$this->db->select('*');
			$this->db->from('ranking_view');
			// $this->db->order_by('rank asc');

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
			// else{
			// 	echo "no ranking page found!";
			// }		
		}

	}
	
	public function get_total_number_of_page(){
		if($this->session->userdata('show_friend_only')==='true'){

			// This is sub query
			$this->db->select('COUNT(friend_id)')->from('facebook_friend');
			$this->db->where('fb_id',$this->session->userdata('user_id'));
			$total_row = $this->db->count_all_results();

			// if ($total_row == 0){
			// 	echo "no ranking count found!";
			// }
						
			// return floor($total_row / 20) +1;
			return floor($total_row / 20)+1;

		}else{
			$total_row = $this->db->count_all('ranking_view');
			// if ($total_row == 0){
			// 	echo "no ranking count found!";
			// }
						
			// return floor($total_row / 20) +1;
			return floor($total_row / 20)+1;			
		}
	}
}