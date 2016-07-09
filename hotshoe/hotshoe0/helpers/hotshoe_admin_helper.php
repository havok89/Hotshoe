<?php 

	 function galClientCheck($gid, $cid, $fname, $lname){
		$exists = 0;
		$CI =& get_instance();
		$CI->db->where('galID', $gid);
		$CI->db->where('clientID', $cid);
		$query=$CI->db->get('hotshoe_gallery_client');
		foreach($query->result_array() as $n):
			$exists = 1;	
		endforeach;
		if ($exists == 1){
			$client = '<div class="checkbox">';
			$client .= '<label>';
			  $client .= '<input value="'.$cid.'" type="checkbox" name="clients[]" checked="checked">'.$fname.' '.$lname;
			$client .= '</label>';
		  $client .= '</div>';
		}
		if ($exists == 0){
			$client = '<div class="checkbox">';
			$client .= '<label>';
			  $client .= '<input value="'.$cid.'" name="clients[]" type="checkbox">'.$fname.' '.$lname;
			$client .= '</label>';
		  $client .= '</div>';		}
		echo $client;
	 }
	 
	
	
?>