<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		define("HOOSK_ADMIN",1);
		$this->load->helper('admincontrol');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Hotshoe_model');
		define ('SITE_NAME', $this->Hotshoe_model->getSiteName());
		define('THEME', $this->Hotshoe_model->getTheme());
		define ('THEME_FOLDER', BASE_URL.'/theme/'.THEME);

	}
	
	public function index()
	{
		Admincontrol_helper::is_logged_in();
		$this->data['current'] = $this->uri->segment(2);
		$this->data['recenltyAdded'] = $this->Hotshoe_model->getAddedGals(); 
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/home', $this->data);
	}
	public function upload()
	{
		Admincontrol_helper::is_logged_in();
		$attachment = $this->input->post('attachment');
		$uploadedFile = $_FILES['attachment']['tmp_name']['file'];
		
		$path = $_SERVER["DOCUMENT_ROOT"].'/images';
		$url = BASE_URL.'/images';
		
		// create an image name
		$fileName = $attachment['name'];
		
		// upload the image
		move_uploaded_file($uploadedFile, $path.'/'.$fileName);
		
		$this->output->set_output(json_encode(array('file' => array(
		'url' => $url . '/' . $fileName,
		'filename' => $fileName
		))),
		200,
		array('Content-Type' => 'application/json')
		);
	}
	public function login()
	{

		//Load the form helper
		$this->load->helper('form');
		
		$this->data['header'] = $this->load->view('admin/headerlog', '', true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/login', $this->data);
	}
	
	public function loginCheck()
 	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password').SALT);
		$result=$this->Hotshoe_model->login($username,$password);
		if($result) {
			redirect('/admin', 'refresh');
		}
		else
		{ 
			$this->data['error'] = "1";
			$this->login();
		}
	}
	
	public function logout()
	{
		$data = array(
				'userID'    => 	'',
				'userName'  => 	'',
	            'logged_in'	=> 	FALSE,
		);
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		$this->login();
	}
	
	
	public function settings()
	{
		Admincontrol_helper::is_logged_in();
		//Load the form helper
		$this->load->helper('form');
		$this->load->helper('directory');
		$this->data['themesdir'] = directory_map($_SERVER["DOCUMENT_ROOT"].'/theme/', 1);


		$this->data['settings'] = $this->Hotshoe_model->getSettings(); 
		$this->data['current'] = $this->uri->segment(2);
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/settings', $this->data);
	}
	
	public function updateSettings()
	{
		Admincontrol_helper::is_logged_in();
		
		if ($this->input->post('siteLogo') != ""){
		//path to save the image
		$path_upload = $_SERVER["DOCUMENT_ROOT"] . '/uploads/';
		$path_images = $_SERVER["DOCUMENT_ROOT"] . '/images/';
		//moving temporary file to images folder
		if(file_exists($path_images . $this->input->post('siteLogo'))){
			unlink($path_images . $this->input->post('siteLogo'));
		}
		if(rename($path_upload . $this->input->post('siteLogo'), $path_images . $this->input->post('siteLogo')))
		{
			if ($this->input->post('siteWatermark') != ""){
			rename($path_upload . $this->input->post('siteWatermark'), $path_images . $this->input->post('siteWatermark'));
			}
			//if the file was uploaded then update settings
			$this->Hotshoe_model->updateSettings();
			redirect('/admin', 'refresh');
		}
		else
		{
			//return to settings
			$this->settings();
		}
		}
		else
		{
			if ($this->input->post('siteWatermark') != ""){
				
			$path_upload = $_SERVER["DOCUMENT_ROOT"] . '/uploads/';
			$path_images = $_SERVER["DOCUMENT_ROOT"] . '/images/';

			if(file_exists($path_images . $this->input->post('siteWatermark'))){
			unlink($path_images . $this->input->post('siteWatermark'));
			}
			rename($path_upload . $this->input->post('siteWatermark'), $path_images . $this->input->post('siteWatermark'));
			
			}
			$this->Hotshoe_model->updateSettings();
			redirect('/admin', 'refresh');
		}
		
	}
	
	public function uploadLogo()
	{
		Admincontrol_helper::is_logged_in();
		if($_FILES[0]['type']=='image/png' || $_FILES[0]['type']=='image/jpg' || $_FILES[0]['type']=='image/jpeg')
		{
			move_uploaded_file($_FILES[0]['tmp_name'], 'uploads/' .basename($_FILES[0]['name']));
			echo json_encode(basename($_FILES[0]['name']));
		}
		else {
		echo 0;
		}
	}
}

