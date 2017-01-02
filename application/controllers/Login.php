<?php
class Login extends CI_Controller {

	public function __construct()
			{
					parent::__construct();
					$this->load->model('profile_model');
					$this->load->helper('url_helper');
					$this->load->library('session');
				
			}
			
			
	public function check_restricted() {

			$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			if( empty($this->session->userdata('logged_in'))){	
				if(strpos($url,'/login') == false) {
					$data['title'] = 'Restricted Page, Please log in';
					$this->load->view('templates/header', $data);
					$this->load->view('templates/footer');
										
					redirect('login', 'refresh');
					//$this->output->set_header('refresh:3; url='.site_url('login'));
				}
				return false;					
			}
			return true;
	}


	public function successful_login(){
			$this->check_restricted();
			$this->load->helper('form');
			$this->load->library('form_validation');
		
			$data['title'] = 'Login to system';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/successful_login');
			$this->load->view('templates/footer');
		
		}

public function login()
	{		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Login to system';

		$logged_in = $this->session->logged_in;
		if($logged_in){
			redirect('viewprofile');
		}else {
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$data['retry'] = false;

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('pages/login');
				$this->load->view('templates/footer');
			}
			else
			{
				$correct =  $this->profile_model->set_login();
				if($correct) {
					redirect('viewprofile');
				}else {
					$data['retry'] = true;
					$this->load->view('templates/header', $data);
					$this->load->view('pages/login', $data);
					$this->load->view('templates/footer');
				}
			}
		}

	}
	
		public function logout()
	{
			//$this->profile_model->set_logout();
			if($this->check_restricted() == false) {return;};
			$data['title'] = 'Logout system';
		
			$this->profile_model->set_logout();
			$this->load->view('templates/header', $data);
			$this->load->view('pages/successful_logout');
	}

	
}
