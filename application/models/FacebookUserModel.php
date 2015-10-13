<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FacebookUserModel extends CI_Model{
	private $facebook_id;
	private $facebook_name;

	public function __construct(){
		parent::__construct();
		$this->load->library('facebook');
	}

	public function set_facebook_id($facebook_id){
		$this->facebook_id = $facebook_id;
	}

	public function get_facebook_id(){
		return $this->facebook_id;
	}

	public function set_facebook_name($facebook_name){
		$this->facebook_name = $facebook_name;
	}

	public function get_facebook_name(){
		return $this->facebook_name;
	}

	public function to_string(){
		return $this->facebook_id.' '.$this->facebook_name;
	}

	public function is_exist($facebook_id){
		$fb_object = $this->db->select('fb_id')->from('facebook_user')->where('fb_id', $facebook_id)->get();
		if ($fb_object->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function save(){
		$fb_object = array('fb_id'=>$this->facebook_id,'fb_name'=>$this->facebook_name);
		$this->db->trans_start();
		$this->db->insert('facebook_user', $fb_object);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
    		$this->db->trans_rollback();
    		return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	public function get_friends($facebook_id){
		$result = $this->facebook->friends();
		$friends = $result['data']['data'];
		$friends_array = array();
		$i = 0;
		foreach ($friends as $value) {
			$friends_array[$i] = $value->id;
			$i++;
		}
		if ($i != 0){
			return $friends_array;
		}else{
			return null;
		}
		
		/* ----- For future use --------
		$friends = $result['data']['data'];
		foreach ($friends as $value) {
			echo $value->id;
		    echo $value->name;
		    echo "<br>";
		}
		echo "<br>-----------<br>";
		$result_data = $result['data']['summary']->total_count;
		echo $result_data;
		*/
	}

	public function save_friend($facebook_id, $friend_array){
		for ($i = 0; $i < count($friend_array); $i++){
			$fb_object = $this->db->select('friend_id')->from('facebook_friend')->where('fb_id', $facebook_id)->where('friend_id', $friend_array[$i])->get();
			if ($fb_object->num_rows() == 0){
				$fb_friend = array('fb_id'=>$facebook_id,'friend_id'=>$friend_array[$i]);
				$this->db->trans_start();
				$this->db->insert('facebook_friend', $fb_friend);
				$this->db->trans_complete();
				if ($this->db->trans_status() === FALSE){
		    		$this->db->trans_rollback();
				}else{
					$this->db->trans_commit();
				}
			}
		}
	}

}
