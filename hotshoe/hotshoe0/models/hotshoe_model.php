<?php

class Hotshoe_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
	
	/*     * *************************** */
    /*     * ** Dash Querys ************ */
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
	
    function getAddedGals() {
        // Get most recently updated pages
        $this->db->select("*");
		$this->db->order_by("added", "desc");
		$this->db->limit(5);
        $query = $this->db->get('hotshoe_gallery');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    /*     * *************************** */
    /*     * ** Client Querys ************ */
    /*     * *************************** */
	function countClients(){
        return $this->db->count_all('hotshoe_client');
   	}
	
    function getClients($limit, $offset=0) {
        // Get a list of all client accounts
        $this->db->select("userName, firstName, lastName, email, clientID");
        $this->db->order_by("userName", "asc");
		$this->db->limit($limit, $offset);
        $query = $this->db->get('hotshoe_client');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    function getClient($id) {
        // Get the client details
        $this->db->select("*");
        $this->db->where("clientID", $id);
        $query = $this->db->get('hotshoe_client');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    function getClientEmail($id) {
        // Get the client email address
        $this->db->select("email");
        $this->db->where("clientID", $id);
        $query = $this->db->get('hotshoe_client');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $email = $rows->email;
                return $email;
            }
        }
    }

    function createClient() {
        // Create the client account
        $data = array(
            'userName' => $this->input->post('username'),
            'firstName' => $this->input->post('firstname'),
            'lastName' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password').SALT),
        );
        $this->db->insert('hotshoe_client', $this->db->escape($data));
    }

    function updateClient($id) {
        // update the client account
        $data = array(
            'firstName' => $this->input->post('firstname'),
            'lastName' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password').SALT),
        );
        $this->db->where('clientID', $id);
        $this->db->update('hotshoe_client', $this->db->escape($data));
    }

    function removeClient($id) {
        // Delete a client account
        $this->db->delete('hotshoe_client', array('clientID' => $id));
    }

     /*     * *************************** */
    /*     * ** Gallery Querys ************ */
    /*     * *************************** */


	function countGals(){
        return $this->db->count_all('hotshoe_gallery');
   	}
	function getAllClients() {
        // Get a list of all client accounts
        $this->db->select("clientID, firstName, lastName");
        $this->db->order_by("userName", "asc");
        $query = $this->db->get('hotshoe_client');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }
    function getGals($limit, $offset=0) {
        // Get a list of all client accounts
        $this->db->select("*");
        $this->db->order_by("added", "desc");
		$this->db->limit($limit, $offset);
        $query = $this->db->get('hotshoe_gallery');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    function getGal($id) {
        // Get the client details
        $this->db->select("*");
        $this->db->where("galID", $id);
        $query = $this->db->get('hotshoe_gallery');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }
	 function getImages($id) {
        // Get the client details
        $this->db->select("*");
        $this->db->where("galID", $id);
        $query = $this->db->get('hotshoe_images');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

  

    function createGal() {
        // Create the client account
        $data = array(
            'galTitle' => $this->input->post('galTitle'),
            'galLocation' => $this->input->post('galLocation'),
            'galDescription' => $this->input->post('galDescription'),
            'galWatermark' => $this->input->post('galWatermark'),
            'galWatermarkThumb' => $this->input->post('galWatermarkThumb'),
            'galREF' => $this->input->post('galREF'),
			'galHeaderImageEnable' => $this->input->post('galHeaderImageEnable'),
			'galHeaderImage' => $this->input->post('galHeaderImage'),
        );
        $this->db->insert('hotshoe_gallery', $this->db->escape($data));
		$this->db->select("*");
        $this->db->where("galTitle", $this->input->post('galTitle'));
        $this->db->where("galREF", $this->input->post('galREF'));
        $query = $this->db->get('hotshoe_gallery');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
				return $u['galID'];			
			endforeach; 
		}
        return array();
    }

    function updateGal($id) {
        // update the client account
        $data = array(
            'galTitle' => $this->input->post('galTitle'),
            'galLocation' => $this->input->post('galLocation'),
            'galDescription' => $this->input->post('galDescription'),
            'galREF' => $this->input->post('galREF'),
			'galHeaderImageEnable' => $this->input->post('galHeaderImageEnable'),
        );
		
		if ( $this->input->post('galHeaderImage') != ""){
			 $data['galHeaderImage'] = $this->input->post('galHeaderImage');
		}
        $this->db->where('galID', $id);
        $this->db->update('hotshoe_gallery', $this->db->escape($data));
		$dataClients = array();
		    $this->db->delete('hotshoe_gallery_client', array('galID' => $id));
	if ($this->input->post('clients') != ""){
    	foreach($this->input->post('clients') as $clients) {
        $dataClients[] = array('clientID' => $clients, 
						'galID' => $id,
						);
    }
	
    $this->db->insert_batch('hotshoe_gallery_client', $this->db->escape($dataClients));
    }
	}

    function removeGal($id) {
        // Delete a gallery
		$this->db->select("*");
       	$this->db->where("galID",  $id);
		$query = $this->db->get('hotshoe_images');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
						unlink(MAINROOT.$u['image']);
						unlink(MAINROOT.$u['thumb']);			
			endforeach; 
		}
		
        $this->db->delete('hotshoe_gallery', array('galID' => $id));
        $this->db->delete('hotshoe_images', array('galID' => $id));
        $this->db->delete('hotshoe_gallery_client', array('galID' => $id));
    }
	function removeImage($id) {
        // Delete a image
		$this->db->select("*");
       	$this->db->where("imageID", $id);
		$query = $this->db->get('hotshoe_images');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
				$imagepath = $u['image'];	
				$thumbpath = $u['thumb'];	
			endforeach; 
		}
		unlink(MAINROOT.$imagepath);
		unlink(MAINROOT.$thumbpath);
        $this->db->delete('hotshoe_images', array('imageID' => $id));
    }

	public function upload_image($size = '', $path = '', $file= '')
	{
		$this->load->library('MY_upload');
		$foo = new MY_upload();
		$this->db->select("*");
       	$this->db->where("siteID", 0);
		$query = $this->db->get('hotshoe_settings');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
				$watermark_path = $u['siteWatermark'];	
				$watermark_thumb_path = $u['siteThumbWatermark'];	
			endforeach; 
		}

        $this->db->select("*");
       	$this->db->where("galID",  $this->uri->segment(5));
		$query = $this->db->get('hotshoe_gallery');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        	foreach ($results as $u): 
				$watermark = $u['galWatermark'];	
				$thumbWatermark = $u['galWatermarkThumb'];		
			endforeach; 
		}

		$new_path_large = '';
	
		// Upload large image and set $new_path_large
		// as large image location on web folder
		$foo->upload($file);
		if ($foo->uploaded)
		{
			$foo->image_resize = true;
			$foo->image_x = $size;
			$foo->image_ratio_y = true;
			$foo->Process($path);
			if ($foo->processed)
			{
				$new_path_large = substr($foo->file_dst_pathname,1);
				
			}
		}
	
		// Create thumbnail from original image and
		// set $new_pat_thumb as thumbnail file location on web folder
		$foo->upload($file);
		if ($foo->uploaded)
		{
			$foo->image_resize = true;
			$foo->image_x = 300;
			$foo->image_ratio_y = true;
			$foo->Process($path.'thumb/');
			if ($foo->processed)
			{
				$new_path_thumb = substr($foo->file_dst_pathname,1);
					$new_path_thumb = str_replace("/gallery", "gallery", $new_path_thumb);

				if ($thumbWatermark == 1) {
						$config['source_image'] = $new_path_thumb;
						$config['wm_type'] = 'overlay';
						$config['quality'] = '100';
						$config['wm_overlay_path'] = "images/".$watermark_path;
						$config['wm_opacity'] = '50';
						$config['wm_vrt_alignment'] = 'bottom';
						$config['wm_hor_alignment'] = 'right';
						$this->image_lib->initialize($config);
						$this->image_lib->watermark();
						$this->image_lib->clear();
					}
				
				if ($watermark == 1) {
						$new_path_larg = str_replace("/gallery", "gallery", $new_path_large);
						$config['source_image'] = $new_path_larg;
						$config['wm_type'] = 'overlay';
						$config['quality'] = '100';
						$config['wm_overlay_path'] = "images/".$watermark_path;
						$config['wm_opacity'] = '50';
						$config['wm_vrt_alignment'] = 'bottom';
						$config['wm_hor_alignment'] = 'right';
						$this->image_lib->initialize($config);
						$this->image_lib->watermark();
						$this->image_lib->clear();
				}
				// Save data in database
				$this
					->db
					->set('galID',  $this->uri->segment(5), true)
					->set('image', $new_path_large, true)
					->set('thumb', '/'.$new_path_thumb, true)
					->insert('hotshoe_images');
					
					
					
			}
		}
	
	}
	/*     * *************************** */
    /*     * ** User Querys ************ */
    /*     * *************************** */
	function countUsers(){
        return $this->db->count_all('hotshoe_user');
   	}
	
    function getUsers($limit, $offset=0) {
        // Get a list of all user accounts
        $this->db->select("userName, email, userID");
        $this->db->order_by("userName", "asc");
		$this->db->limit($limit, $offset);
        $query = $this->db->get('hotshoe_user');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    function getUser($id) {
        // Get the user details
        $this->db->select("*");
        $this->db->where("userID", $id);
        $query = $this->db->get('hotshoe_user');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    function getUserEmail($id) {
        // Get the user email address
        $this->db->select("email");
        $this->db->where("userID", $id);
        $query = $this->db->get('hotshoe_user');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $email = $rows->email;
                return $email;
            }
        }
    }

    function createUser() {
        // Create the user account
        $data = array(
            'userName' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password').SALT),
        );
        $this->db->insert('hotshoe_user', $this->db->escape($data));
    }

    function updateUser($id) {
        // update the user account
        $data = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password').SALT),
        );
        $this->db->where('userID', $id);
        $this->db->update('hotshoe_user', $this->db->escape($data));
    }

    function removeUser($id) {
        // Delete a user account
        $this->db->delete('hotshoe_user', array('userID' => $id));
    }

    function login($username, $password) {
        $this->db->select("*");
        $this->db->where("userName", $username);
        $this->db->where("password", $password);
        $query = $this->db->get("hotshoe_user");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data = array(
                    'userID' => $rows->userID,
                    'userName' => $rows->userName,
                    'logged_in' => TRUE,
                );

                $this->session->set_userdata($data);
                return true;
            }
        } else {
            return false;
        }
    }
	

	
	
	
	function getSettings() {
        // Get the settings
        $this->db->select("*");
        $this->db->where("siteID", 0);
        $query = $this->db->get('hotshoe_settings');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }
	
	
	function updateSettings() {
		
		
		$data = array(
			'siteTheme' => $this->input->post('siteTheme'),
			'siteFooter' => $this->input->post('siteFooter')
	
		);
		
		if ($this->input->post('siteTitle') != "")
				 $data['siteTitle'] = $this->input->post('siteTitle');
	
			if ($this->input->post('siteLogo') != ""){
				$data['siteLogo'] = $this->input->post('siteLogo');
			}	
			if ($this->input->post('siteWatermark') != ""){
				$data['siteWatermark'] = $this->input->post('siteWatermark');
			}
			$this->db->where("siteID", 0);
			$this->db->update('hotshoe_settings', $this->db->escape($data));
	}
	
	
	
}
?>