<?php
class Page_functions extends CI_Controller {

	public function __construct()
			{
					parent::__construct();
					$this->load->model('profile_model');
					$this->load->helper('url_helper');
					$this->load->library('session');

			}


	public function view($slug = NULL)
	{
			$data['news_item'] = $this->profile_model->get_news($slug);

			if (empty($data['news_item']))
			{
					show_404();
			}

			$data['title'] = $data['news_item']['title'];

			$this->load->view('templates/header', $data);
			$this->load->view('pages/view', $data);
			$this->load->view('templates/footer');
	}
			
	
		public function index(){

        $data['news'] = $this->profile_model->get_news();
        $data['title'] = 'Project archive';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);        
        $this->load->view('templates/footer', $data);
	}
	
		public function login()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Login to system';

		$logged_in = $this->session->logged_in;
		if($logged_in){
			$this->load->view('pages/successful_login');
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
					$this->load->view('pages/successful_login');
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
		
			$data['title'] = 'Logout system';
		
			$this->profile_model->set_logout();
			$this->load->view('pages/successful_logout');
	
	}

		
		
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Register Profile';

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('fname', 'fname', 'required');
		$this->form_validation->set_rules('sname', 'sname', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('emailAddress', 'emailAddress', 'required');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/create');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->profile_model->set_account();
			$this->load->view('pages/success');
		}
	}
	public function profile(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Edit profile';
		
		$this->form_validation->set_rules('fname', 'fname', 'required');
		$this->form_validation->set_rules('sname', 'sname', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');
		
		$this->form_validation->set_rules('emailAddress', 'emailAddress', 'required');
		$this->form_validation->set_rules('religion', 'religion');
		$this->form_validation->set_rules('LocationFlex', 'LocationFlex-0');

		
	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/profile_edit');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->profile_model->set_profile();
			$this->load->view('pages/success', $data);

		} 
}


		public function testing(){

        $data['news'] = $this->profile_model->get_news();
        $data['title'] = 'Project archive';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);        
        $this->load->view('templates/footer', $data);
	}
	
	
}