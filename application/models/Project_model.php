<?php
class Project_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_news($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
}

public function set_login()

{
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$this->db->select('accountID','username', 'password');
	$this->db->	from('user_account');
	$this->db->	where('username',$username);
	$this->db->	where('password',$password);
	$this->db->limit(1);
	
	$query = $this->db->get();
	
	if($query-> num_rows() == 1){
		$accountID = $query->result()[0]->accountID;
		$newsession = array(
		  'accountID' => $accountID,
        'username'  => $username,
        'logged_in' => TRUE
		);

		$this->session->set_userdata($newsession);
		return $query->result();

	}else{
		return FALSE;			
	}


    $this->load->helper('url');
   

}

public function set_logout(){	


	$this->session->unset_userdata('username');
	$this->session->unset_userdata('logged_in');
	
	$this->session->sess_destroy();
	}

public function set_account()
{
    $this->load->helper('url');
    

    $accountData = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'email' => $this->input->post('emailAddress'),
        'typeID' => $this->input->post('type')
    );
    

	
	$a = $this->db->insert('user_account', $accountData);

    return $a;
}

	
	public function load_skills(){
		//query existing skill names
		$this->db-> select('skillName');
		$this->db->	from('skills');
		
		$query = $this->db->get();
		
		if($query-> num_rows()  == 0){
			return;
		}
		$skillNames = $query->result_array();
		
        
        //query existing skill levels
		$this->db-> select('level');
		$this->db->	from('skillLevel');
 
		
		$query = $this->db->get();
		
		if($query-> num_rows() == 0){
			return;
		}
		$skillLevels = $query->result_array();
		//put skill names and levels into an array
		$skills =  array(
			'names' => $skillNames, 
			'levels' => $skillLevels
		);
		
		return $skills;
	}
	

	public function edit_profile()
	{
	    $this->load->helper('url');
	    
	   $accountID = $this->session->accountID;
	    
	   $this->db->select('addressID');
		$this->db->	from('person');
		$this->db->	where('accountID',$accountID);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() == 1){
			$addressID = $query->result()[0]->addressID;
		}
	    
		$addressData = array(
				'country' => $this->input->post('country'),
				'city' => $this->input->post('city'),
				'postcode' => $this->input->post('postcode'),
				'streetName' => $this->input->post('streetName'),
				'country' => $this->input->post('country'),
				'buldingNumber' => $this->input->post('buildingNumber')
			);
			
		$this->db->	where('addressID',$addressID);	
		$this->db->update('address', $addressData);

		
		echo $accountID. ' '. $addressID;
			
		$profileData = array(
				'accountID' => ($accountID),
	         'firstname' => $this->input->post('fname'),
	         'lastname' => $this->input->post('sname'),
				'addressID' => ($addressID),
	         'dob' => $this->input->post('dob'),
	         'religion' => $this->input->post('religion'),
	         'locationFlexibility' => $this->input->post('locationFlex') == "able" ? 1 : 0
	    );
	    
	  	$this->db->	where('accountID',$accountID);	
	  	$this->db->update('person', $profileData);

	}




public function set_project()
{
    $this->load->helper('url');
    
   $accountID = $this->session->accountID;
   
   
//    projectID managerID	title	startDate	endDate	budget	projectTypeID	completed
	$projectData = array(
			'title' => $this->input->post('projectTitle'),
            'managerID' => ($accountID),
			'startDate' => $this->input->post('startDate'),
			'endDate' => $this->input->post('endDate'),
			'budget' => $this->input->post('projectBudget'),
			'projectTypeID' => $this->input->post('projectType')
		);
		
		
	$this->db->insert('project', $projectData);
	$projectID = $this->db->insert_id();
	$skillIDs = $this->input->post("skillID");
	$skillLevels = $this->input->post("skillLevel");
	$skillNumPeoples = $this->input->post("skillNumPeople");

	//~ //projectReq	skillID	skillLevel	numPeople
	//~ for ($i=0; $i < count($skillIDs); $i++) {
         //~ $skillsData[] = array(
			//~ 'projectReq'=>$projectID,
			//~ 'skillID'=>$skillIDs[$i],
			//~ 'skillLevel'=>$skillLevels[$i],
			//~ 'numPeople'=>$skillNumPeoples[$i],
         //~ ); // store values in array  
	//~ }
	//~ $this->db->insert_batch('project_skills_required', $skillsData);
	return $projectID;

}



public function set_tasks()
{
    $this->load->helper('url');
    
   $accountID = $this->session->accountID;
	$tasks = $this->input->post('task');
	$projectID = 1;
		//taskID 	projectID 	title 	startDate 	endDate
	foreach($tasks as $id4 => $task){
		$taskData[] = array(
			'projectID'=>$projectID,
			'title' => 	$task['title'],			//$this->input->post('task[][title]'),
			'startDate' => 	$task['startDate'],	// $this->input->post('task[][startDate]'),
			'endDate' => $task['endDate'] 		//$this->i nput->post('task[][endDate]'),
		);
		$this->db->insert_batch('project_tasks', $taskData);
		$taskID = $this->db->insert_id();
		if(isset($roleData))
			unset($roleData);
		$roles = $this->input->post('task[' . $id4 . '][role]');
		foreach($roles as $id2 => $role){
			$roleData[] = array(
				'taskID' => $taskID,
				'roleName' => 	$role['name'],			//$this->input->post('task[][title]'),
				'numPeople' => 	$role['numPeople'],	// $this->input->post('task[][startDate]'),
			);
			$this->db->insert_batch('project_roles', $roleData);
			$roleID = $this->db->insert_id();
			
			if(isset($skillData))
				unset($skillData);
			$skills = $this->input->post('task[' . $id4 . '][role]['.$id2.'][skill]');
			foreach($skills as $id3 => $skill){
				$skillData[] = array(
					'assignmentID' => $roleID,
					'skillID' => 	$skill['skillID'],			//$this->input->post('task[][title]'),
					'skillLevel' => 	$skill['skillLevel'],	// $this->input->post('task[][startDate]'),
				);
				$this->db->insert_batch('role_skills_required', $skillData);
			}
		}
	}

}

public function search_algorithm(){
	/*
		1. take in tasks. For each task, query the database for someone with the skills required to do the task.
		2. return a person appropriate to the task.
		3. Insert into the database the person associated to the task and project.
	*/
	
	//get project ID
	//get roles in project
	 
	//$projectID = $this->session->userdata('projectID');	

	/*$this->db->select('projectID');
	$this->db->from('project');
	$this->db->where('project.projectID', '1');
	$projectID = $this->db->get()->result();
	*/
	$projectID = 1;
	
	//print_r($projectID);
	
	$this->db-> select('taskID');
	$this->db-> from('project_tasks');
	$this->db-> where('projectID', $projectID);
	$tasks = $this->db->get()->result_array();
	
	//print_r($tasks);

	foreach($tasks as $t){
		//print_r($t);
		$this->db-> select('roleID');
		$this->db-> from('project_roles');
		$this->db-> where('taskID', $t['taskID']);
		//$this->db-> where('projectID',$projectID);
		$roles = $this->db->get()->result_array();
		
		foreach($roles as $r){
			
				$this->db-> select('skillID');
				$this->db-> from ('role_skills_required');
				$this->db-> where('roleID',$r['roleID']);
				$skill_required = $this->db->get()->result_array();
	
			foreach($skill_required as $skill){
		
				/*$this->db-> select('*');
				$this->db->	from('person', 'user_account');
				$this->db-> join('user_account', 'person.accountID = user_account.accountID');
				$this->db-> join('address', 'person.addressID = address.addressID');
				$this->db-> join('user_skills', 'person.accountID = user_skills.accountID');
				$this->db->	where('user_skills.skillID',$skill['skillID']); //where each element of skills required array 	
				//$this->db->	where('person.availability','0');
				*/
				
				$this->db->select('user_account.accountID');
				$this->db->from('user_account');
				$this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
				$this->db->where('user_skills.skillID', $skill['skillID']);
				$this->db-> limit(1);
				
				$accountID = $this->db->get()->row();
			
				if(count($accountID) < 1){
					echo 'No match of person that fulfills the roles skill requirements!';
					return;
				}
			
				$employee_assignment = array(
					'accountID' => $accountID->accountID,
		            'roleID' => $r['roleID']
				);

				
				$this->db->insert('employee_assignment', $employee_assignment);
				
			}
		}
	}
	
	
	/*$this->db-> select('*');
	$this->db-> from ('user_account acc', 'person p', 'project_roles pr', 'project_assignment pa', 'project_tasks pt');
	$this->db-> join('user_account', 'p.accountID = acc.accountID'); 
	$this->db-> join('employee_assignment', 'pa.accountID = acc.accountID'); 
	$this->db-> join('project_roles','pa.roleID = pr.roleID');
	$this->db-> join('project_tasks', '
	*/
	
	$this->db->select('taskID');
	$this->db->from ('project_tasks');
	$this->db->where ('projectID', $projectID);
	$tasks = $this->db->get()->result_array();


	foreach($tasks as $t){
		
		$this->db-> select('roleID');
		$this->db-> from('project_roles');
		$this->db-> where('taskID', $t['taskID']);
		$roles = $this->db->get()->result_array();
		
		foreach($roles as $r){
				$this->db->select('accountID');
				$this->db->from('employee_assignment');
				$this->db->where('roleID', $r['roleID']);
				$accounts_assigned = $this->db->get()->result_array();
				
				foreach($accounts_assigned as $accounts){
					
					/*$this->db->select('username', 'accountID', 'email', 'firstname', 'lastname');
					$this->db->from ('user_account', 'person');
					$this->db->join('user_account', 'user_account.accountID = person.accountID');
					$this->db->where('accountID', $accounts['accountID']);
					$query = $this->db->get()->result();*/
					
					$this->db->select('user_account.accountID');
					$this->db->from('user_account');
					$this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
					$this->db->where('user_skills.skillID', $skill['skillID']);
					$query = $this->db-> limit(1);
					
					return $query;
					
					}
			
			}		
		
		}
	
	
	
	/*$this->db->select('*');
	$this->db->from('employee_assignment');
	$roleID = $this->db->get()->reslt_array();
		
	*/
	
}

}



