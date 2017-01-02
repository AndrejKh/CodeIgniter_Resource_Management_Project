<?php
class ProjectCreate extends CI_Controller {

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

	public function profile(){
		if($this->check_restricted() == false) {return;};
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Edit profile';
		
		$this->form_validation->set_rules('pname', 'Project Name', 'required');
		$this->form_validation->set_rules('pemail', 'Project Email', 'required');
		$this->form_validation->set_rules('ptype', 'Project Type', 'required');
		
		$this->form_validation->set_rules('startDate', 'Start Date', 'required');
		$this->form_validation->set_rules('endDate', 'End Date', 'required');
		
		
		$this->form_validation->set_rules('pLocation', 'Project Location', 'required');
		$this->form_validation->set_rules('pDesc', 'Project Description', 'required');
		$this->form_validation->set_rules('budget', 'Budget', 'required');

		$data['info'] =  $this->project_model->load_profile();
		
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


}
?>
