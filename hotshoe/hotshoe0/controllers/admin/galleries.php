<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galleries extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		define("HOOSK_ADMIN",1);
		$this->load->model('Hotshoe_model');
		$this->load->helper('url');
		$this->load->helper('admincontrol');
		$this->load->helper('hotshoe_admin_helper');
		$this->load->library('session');
		//Define what page we are on for nav
		$this->data['current'] = $this->uri->segment(2);
		define ('SITE_NAME', $this->Hotshoe_model->getSiteName());
		define('THEME', $this->Hotshoe_model->getTheme());
		define ('THEME_FOLDER', BASE_URL.'/theme/'.THEME);
	}
	
	public function index()
	{
		Admincontrol_helper::is_logged_in();
		$this->load->library('pagination');

        $result_per_page =15;  // the number of result per page

        $config['base_url'] = BASE_URL. '/admin/galleries/';
        $config['total_rows'] = $this->Hotshoe_model->countGals();
        $config['per_page'] = $result_per_page;
		$config['full_tag_open'] = '<div class="form-actions">';
		$config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);

		//Get galleries from database
		$this->data['galleries'] = $this->Hotshoe_model->getGals($result_per_page, $this->uri->segment(3)); 
		
		//Load the view
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/galleries', $this->data);
	}
	
	public function addGal()
	{
		Admincontrol_helper::is_logged_in();
		//Load the form helper
		$this->load->helper('form');
		//Load the view
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/newgallery', $this->data);
	}
	
	public function confirm()
	{
		Admincontrol_helper::is_logged_in();
		//Load the form validation library
		$this->load->library('form_validation');
		//Set validation rules
		$this->form_validation->set_rules('galREF', 'Gallery Ref ID', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('galTitle', 'Gallery Title','trim|required');

		
		if($this->form_validation->run() == FALSE) {
			//Validation failed
			$this->addGal();
		}  else  {
			//Validation passed
			if ($this->input->post('galHeaderImage') != ""){
				
			$path_upload = $_SERVER["DOCUMENT_ROOT"] . '/uploads/';
			$path_images = $_SERVER["DOCUMENT_ROOT"] . '/images/';

			if(file_exists($path_images . $this->input->post('galHeaderImage'))){
			unlink($path_images . $this->input->post('galHeaderImage'));
			}
			rename($path_upload . $this->input->post('galHeaderImage'), $path_images . $this->input->post('galHeaderImage'));
			}
			//Add the gallery
			$id = $this->Hotshoe_model->createGal();
			//proceed to adding images
			redirect('/admin/galleries/images/'.$id, 'refresh');
	  	}
	}
	
	public function editGal()
	{
		Admincontrol_helper::is_logged_in();
		//Load the form helper
		$this->load->helper('form');
		//Get gallery details from database
		$this->data['galleries'] = $this->Hotshoe_model->getGal($this->uri->segment(4)); 
		$this->data['images'] = $this->Hotshoe_model->getImages($this->uri->segment(4)); 
		$this->data['clients'] = $this->Hotshoe_model->getAllClients(); 
		//Load the view
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/editgallery', $this->data);
	}
	
	public function edited()
	{
		Admincontrol_helper::is_logged_in();
		//Load the form validation library
		$this->load->library('form_validation');
		//Set validation rules
		$this->form_validation->set_rules('galREF', 'Gallery Ref ID', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('galTitle', 'Gallery Title','trim|required');

		
		if($this->form_validation->run() == FALSE) {
			//Validation failed
			$this->editGal();
		}  else  {
			//Validation passed
			//Update the gallery
			if ($this->input->post('galHeaderImage') != ""){
				
			$path_upload = $_SERVER["DOCUMENT_ROOT"] . '/uploads/';
			$path_images = $_SERVER["DOCUMENT_ROOT"] . '/images/';
			if(file_exists($path_upload . $this->input->post('galHeaderImage'))){
			if(file_exists($path_images . $this->input->post('galHeaderImage'))){
			unlink($path_images . $this->input->post('galHeaderImage'));
			}
			rename($path_upload . $this->input->post('galHeaderImage'), $path_images . $this->input->post('galHeaderImage'));
			}
			}
			$this->Hotshoe_model->updateGal($this->uri->segment(4));
			//Return to user list
			redirect('/admin/galleries', 'refresh');
	  	}
	}
	
	public function delete()
	{
		Admincontrol_helper::is_logged_in();
		$this->Hotshoe_model->removeGal($this->uri->segment(4));
		redirect('/admin/galleries', 'refresh');
	}
	public function deleteImage()
	{
		//Delete the user account
		$this->Hotshoe_model->removeimage($this->uri->segment(4));
		
	}
	public function addImages()
	{
		Admincontrol_helper::is_logged_in();
		
		
		//Load the form helper
		$this->load->helper('form');
		//Load the view
		$this->data['header'] = $this->load->view('admin/header', $this->data, true);
		$this->data['footer'] = $this->load->view('admin/footer', '', true);
		$this->load->view('admin/addimages', $this->data);
	}
	
	
	
	
	
	public function upload()
	{
		$this->load->library('image_lib');
			if (!empty($_FILES))
			{
				$this->Hotshoe_model->upload_image('1024', './gallery/'.$this->uri->segment(5).'/', $_FILES['file']);
			}
	}
	
	
}
