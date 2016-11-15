<?php
class Pages extends CI_Controller {

	public function __construct()
			{
					parent::__construct();
					$this->load->model('profile_model');
					$this->load->helper('url_helper');
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
		$this->form_validation->set_rules('type', 'type', 'required');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/create');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->profile_model->set_news();
			$this->load->view('pages/success');
		}
	}
}
