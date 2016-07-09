<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotshoe_default extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('logincontrol');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Hotshoe_page_model');
		$this->load->helper('hotshoe_page_helper');
		define ('SITE_NAME', $this->Hotshoe_page_model->getSiteName());
		define ('THEME', $this->Hotshoe_page_model->getTheme());
		define ('THEME_FOLDER', BASE_URL.'/theme/'.THEME);
		$this->data['settings']=$this->Hotshoe_page_model->getSettings();
	}
	
	
	public function index()
	{
		Logincontrol_helper::is_logged_in();
		$this->data['title'] = "Client Dashboard | ".SITE_NAME;
		$this->data['galleries']=$this->Hotshoe_page_model->getGals($this->session->userdata('userID'));
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/home', $this->data);
	}
	
		public function gallery()
	{
		Logincontrol_helper::is_logged_in();
		Logincontrol_helper::can_view($this->uri->segment(2),$this->session->userdata('userID'));
		$this->data['title'] = $this->Hotshoe_page_model->getGalTitle($this->uri->segment(2))." | ".SITE_NAME;
		$this->data['gallery']=$this->Hotshoe_page_model->getGal($this->uri->segment(2));
		$this->data['images']=$this->Hotshoe_page_model->getImages($this->uri->segment(2));
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/gallery', $this->data);
	}
	
	public function error()
	{
		$this->data['title'] = "Error | ".SITE_NAME;
		$this->data['page']['pageDescription']="Oops, Error";
		$this->data['page']['pageKeywords']="Oops, Error";
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/error', $this->data);
	}
	
	public function login()
	{

		//Load the form helper
		$this->load->helper('form');
		$this->data['title'] = "Login | ".SITE_NAME;
		$this->data['settings']=$this->Hotshoe_page_model->getSettings();
		$this->data['header'] = $this->load->view('templates/header', $this->data, true);
		$this->data['footer'] = $this->load->view('templates/footer', '', true);
		$this->load->view('templates/login', $this->data);
	}
	
	public function loginCheck()
 	{
		
		$username=$this->input->post('username');
		$password=md5($this->input->post('password').SALT);

		$result=$this->Hotshoe_page_model->login($username,$password);
		if($result) {
			redirect('.', 'refresh');
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
				'user'  => 	'',
	            'logged_in'	=> 	FALSE,
		);
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		$this->login();
	}
	
}

