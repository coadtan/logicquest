<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MainController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('FacebookUserModel');
		$this->load->library('facebook');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('html');
	}
	public function index(){
		$this->load->view('home');
	}

	public function facebook_login(){
		$facebook_player = $this->FacebookUserModel;
		if ($this->facebook->logged_in()){
			$user = $this->facebook->user();
			if ($user['code'] === 200){
				unset($user['data']['permissions']);
				$facebook_player->set_facebook_id($user['data']['id']);
				$facebook_player->set_facebook_name($user['data']['name']);
				if (!$facebook_player->is_exist($user['data']['id'])){
					if(!$facebook_player->save()){
						echo "Unable to save your facebook data to our database";
					}
				}
				$this->session->set_userdata('user_id', $user['data']['id']);
			}else{
				echo "Facebook Login Failed!";
			}
			$friend_array = $facebook_player->get_friends($user['data']['id']);
			if(isset($friend_array)){
				$facebook_player->save_friend($user['data']['id'], $friend_array);
			}
		}

		$this->load->view('facebook_login', array('user'=>$facebook_player));
	}

	public function facebook_logout(){
		$this->facebook->destroy_session();
		redirect('maincontroller/facebook_login', redirect);
		// redirect('maincontroller/facebook_login', redirect);
	}
}