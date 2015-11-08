<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function update_user_rank_session(){
	$CI = & get_instance();
	if ($CI->session->userdata('user_id') != NULL){
		$CI->db->select('rank');
		$CI->db->from('ranking_view');
		$CI->db->where('user_id', $CI->session->userdata('user_id'));
		$ranking_query = $CI->db->get();
		if ($ranking_query->num_rows() > 0){
			$current_rank = $ranking_query->result()[0]->rank;
			$CI->session->set_userdata('user_rank', $current_rank);
		}
	}
}