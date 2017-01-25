<?php
class ProjectCreate extends CI_Controller {

	public function __construct()
			{
					parent::__construct();
					$this->load->model('project_model');
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

	public function projectCreate(){
		if($this->check_restricted() == false) {return;};
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Creating Project';
		
		$this->form_validation->set_rules('projectTitle', 'Project Title', 'required');
//		$this->form_validation->set_rules('projectEmail', 'Project Email', 'required');
		$this->form_validation->set_rules('projectType', 'Project Type', 'required');
		
		$this->form_validation->set_rules('startDate', 'Start Date', 'required');
		$this->form_validation->set_rules('endDate', 'End Date', 'required');
		$this->form_validation->set_rules('projectBudget', 'Budget', 'required');

		
//		$this->form_validation->set_rules('pLocation', 'Project Location', 'required');
//		$this->form_validation->set_rules('pDesc', 'Project Description', 'required');
		
//		$this->form_validation->set_rules('skillID[]', 'Skills', 'required');
//		$this->form_validation->set_rules('skillLevel[]', 'Skill Levels', 'required');
//		$this->form_validation->set_rules('skillNumPeople[]', 'Number of People ', 'required');


//		$data['skills'] =  $this->project_model->load_skills();
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/project/createProject', $data);
			$this->load->view('templates/footer');

		}
		else
		{
			$session_data= $this->project_model->set_project();
			$this->session->set_userdata("projectID", $session_data);
			redirect('create_tasks', $data);
			//change the above to redirect to task setting page once created
		} 
    }


public function createTasks(){
		if($this->check_restricted() == false) {return;};
		$this->load->helper('form');
		$this->load->library('form_validation');
		//~ echo $this->session->userdata('projectID');

		//$data['title'] = 'Setting Tasks and Roles';
		
		//$data['skills'] =  $this->project_model->load_skills();
		
		$task = $this->input->post('task');
		print_r ($task);
		 //$roles[] = array();
		if(!empty($task))
		{
			echo "<br>".sizeof($task);
			// Loop through hotels and add the validation
			foreach($task as $id => $data)
			{
				$this->form_validation->set_rules('task[' . $id . '][title]', 'Name'. $id , 'required');
				$this->form_validation->set_rules('task[' . $id . '][startDate]', 'Cost'. $id , 'required');
				$this->form_validation->set_rules('task[' . $id . '][endDate]', 'City'. $id , 'required');
				$role = $this->input->post('task[' . $id . '][role]');
				//unset($roles);
				//$roles[] = array();
				foreach($role as $id2 => $role)
				{
					$this->form_validation->set_rules('task[' . $id . '][role]['.$id2.'][name]', 'Task '.$id.' Role name '. $id2 , 'required');
					$this->form_validation->set_rules('task[' . $id . '][role]['.$id2.'][numPeople]', 'Task '.$id.' Number of People '. $id2 , 'required');
					$this->form_validation->set_rules('task[' . $id . '][role]['.$id2.'][skill][0][skillID]', 'Task '.$id.' A Skill for Role '. $id2 , 'required');

					//echo "<br> role name: ".$role['name'];
					//$roles[$id2] =  $role;
					//$skill = $this->input->post('task[' . $id . '][role]['.$id2.'][skill]');
				}
			}
		}
		//~ $tasks = $this->input->post('task');
			//~ //taskID 	projectID 	title 	startDate 	endDate
		//~ foreach($tasks as $id4 => $task){
			//~ $taskData[] = array(
				//~ 'title' => 	$task['title'],			//$this->input->post('task[][title]'),
				//~ 'startDate' => 	$task['startDate'],	// $this->input->post('task[][startDate]'),
				//~ 'endDate' => $task['endDate'] 		//$this->input->post('task[][endDate]'),
			//~ );
			//~ if(isset($roleData))
				//~ unset($roleData);
			//~ $roles = $this->input->post('task[' . $id4 . '][role]');
			//~ foreach($roles as $id5 => $role){
				//~ $roleData[] = array(
					//~ 'name' => 	$role['name'],			//$this->input->post('task[][title]'),
					//~ 'startDate' => 	$role['numPeople'],	// $this->input->post('task[][startDate]'),
				//~ );
				//~ echo "<br> hello name ".$roleData[$id5]['name'];
				//~ if(isset($skillData))
					//~ unset($skillData);
				//~ $skills = $this->input->post('task[' . $id4 . '][role]['.$id5.'][skill]');
				//~ foreach($skills as $id6 => $skill){
					//~ $skillData[] = array(
						//~ 'skillID' => 	$skill['skillID'],			//$this->input->post('task[][title]'),
						//~ 'skillLevel' => 	$skill['skillLevel'],	// $this->input->post('task[][startDate]'),
					//~ );
					//~ echo "<br> hello skill ".$id6." and data ".$skillData[$id6]['skillID'];

				//~ }
			//~ }
		//~ }
			
		

		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Setting Tasks and Roles';
		
			$data['skills'] =  $this->project_model->load_skills();
		
			$this->load->view('templates/header', $data);
			$this->load->view('pages/project/createTasks', $data);
			$this->load->view('templates/footer');

		}
		else
		{
			$this->project_model->set_tasks();
			$this->load->view('pages/success', $data);
			//change the above to redirect to task setting page once created
		} 
    }

}
?>
