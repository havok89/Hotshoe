<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Logincontrol_helper{
	 
	 
	 function is_logged_in()
	 {
		if(($this->session->userdata('user')=="")):
		$redirect= BASE_URL.'/login';
		header("Location: $redirect");	
		exit;	
		endif;
	 }
	 
	 function can_view($gid, $cid)
	 {
		$na = "";
		$CI =& get_instance();
		$CI->db->where('clientID', $cid);
		$CI->db->where('galID', $gid);
		$query=$CI->db->get('hotshoe_gallery_client');
		foreach($query->result_array() as $n):
		$na=1;
		endforeach;
		
		if(($na=="")):
		$redirect= BASE_URL.'/noaccess';
		header("Location: $redirect");	
		exit;	
		endif;
		
	 }
	 
 } 