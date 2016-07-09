<?php

class Hotshoe_page_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
	
	/*     * *************************** */
    /*     * ** Page Querys ************ */
    /*     * *************************** */
	function getSiteName() {
        // Get Theme
        $this->db->select("*");
       	$this->db->where("siteID", 0);
		$query = $this->db->get('hotshoe_settings');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
				return $u['siteTitle'];			
			endforeach; 
		}
        return array();
    }
	function getGalTitle($id) {
        // Get Theme
        $this->db->select("*");
       	$this->db->where("galID", $id);
		$query = $this->db->get('hotshoe_gallery');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
				return $u['galTitle'];			
			endforeach; 
		}
        return array();
    }
	function getTheme() {
        // Get Theme
        $this->db->select("*");
       	$this->db->where("siteID", 0);
		$query = $this->db->get('hotshoe_settings');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
				return $u['siteTheme'];			
			endforeach; 
		}
        return array();
    }
	
    function getSettings() {
        // Get settings
        $this->db->select("*");
		$this->db->where("siteID", 0);
        $query = $this->db->get('hotshoe_settings');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
				$page = array(
						'siteLogo'    			=> $u['siteLogo'],
						'siteTitle'    			=> $u['siteTitle'],
						'siteFooter'    		=> $u['siteFooter'],
                     );      	
			endforeach; 
			return $page;
		
		}
        return array();
    }

	function getGals($id) {
        // Get settings
        $this->db->select("*");
		$this->db->where("clientID", $id);
        $this->db->order_by("added", "desc");
		$this->db->join('hotshoe_gallery', 'hotshoe_gallery.galID = hotshoe_gallery_client.galID'); 
        $query = $this->db->get('hotshoe_gallery_client');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }
	
	
	function getGal($id) {
        // Get settings
        $this->db->select("*");
		$this->db->where("galID", $id);
        $query = $this->db->get('hotshoe_gallery');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }
	function getImages($id) {
        // Get settings
        $this->db->select("*");
		$this->db->where("galID", $id);
        $query = $this->db->get('hotshoe_images');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }
	
	function login($username, $password) {
		
        $this->db->select("*");
        $this->db->where("userName", $username);
        $this->db->where("password", $password);
        $query = $this->db->get("hotshoe_client");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data = array(
                    'userID' => $rows->clientID,
                    'user' => $rows->userName,
                    'logged_in' => TRUE,
                );

                $this->session->set_userdata($data);
                return true;
            }
        } else {
            return false;
        }
    }
}

?>