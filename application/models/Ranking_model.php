<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ranking_model extends CI_Model{
	private $rank_no;
	private $user_id;
	private $user_name;
	private $point;

	public function __construct(){
		parent::__construct();
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

	public function get_top_ten_ranking(){
		// SELECT facebook_user.fb_name, summary_point.* FROM summary_point JOIN facebook_user ON summary_point.user_id = facebook_user.fb_id ORDER BY summary_point.user_point DESC;
		
		$this->db->select('facebook_user.fb_name, summary_point.*');
		$this->db->from('summary_point');
		$this->db->join('facebook_user', 'summary_point.user_id = facebook_user.fb_id');
		$this->db->order_by("user_point", "desc");
		$top_ten_object = $this->db->get();

		if ($top_ten_object->num_rows() >= 1){
			$rankno = 0;
			$ranking_result=array();
			foreach ($top_ten_object->result_array() as $row){
				$ranking_result[$rankno]=array(
										'rank_no'=>$rankno++,
										'user_id'=>$row['user_id'],
										'user_name'=>$row['fb_name'],
										'point'=>$row['user_point']
										);
			}
			return $ranking_result;
		}else{
			echo "no ranking_object found!";
		}

	}

	
}