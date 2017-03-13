<?php
class Profile_model extends CI_Model {

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

	public function check_for_profile(){
		$accountID = $this->session->accountID;
		
		$this->db-> select('*');
		$this->db->	from('person');
		$this->db->	where('person.accountID',$accountID);
		$this->db-> limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() != 1){
			return 0;
		}
		return 1;
	}

	public function join_load_profile(){
		
		$accountID = $this->session->accountID;
		
		$this->db-> select('*');
		$this->db->	from('person');
		$this->db-> join('user_account', 'person.accountID = user_account.accountID');
		$this->db-> join('address', 'person.addressID = address.addressID');
		$this->db->	where('person.accountID',$accountID);
		$this->db-> limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() != 1){
			return;
		}
		
		/*
		$personData = $query->result()[0];
		$addressID = $query->result()[0]->addressID;
		
		$this->db-> select('*');
		$this->db->	from('address');
		$this->db->	where('addressID',$addressID);
		$this->db-> limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() != 1){
			return;
		}
		/*$addressData = $query->result()[0];
		
		$info =  array(
			'profile' => $personData, 
			'address' => $addressData
		);
		*/
		
		return $query->result_array();
		
		//return $query->result_array();
			
	}
	
	
	public function join_find_profile($usrname){
				
		$this->db-> select('*');
		$this->db->	from('person');
		$this->db-> join('user_account', 'person.accountID = user_account.accountID');
		$this->db-> join('address', 'person.addressID = address.addressID');
		$this->db->	where('user_account.username',$usrname);
		$this->db-> limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() != 1){
			return;
		}
		
		return $query->result_array();
		
			
	}
	
	public function load_profile(){
		$accountID = $this->session->accountID;
		
		//~ $this->db-> select('*');
		//~ $this->db->	from('person','address');
		//~ $this->db-> join('user_account', 'person.accountID = user_account.accountID');
		//~ $this->db-> join('address', 'person.addressID = address.addressID');
		//~ $this->db->	where('person.accountID',$accountID);
		//~ $this->db-> limit(1);
		
		//~ $query = $this->db->get();
		
		//~ if($query-> num_rows() != 1){
			//~ return;
		//~ }
		
		
		//~ $personData = $query->result()[0];
		//~ $addressID = $query->result()[0]->addressID;
		
		//~ $this->db-> select('*');
		//~ $this->db->	from('address');
		//~ $this->db->	where('addressID',$addressID);
		//~ $this->db-> limit(1);
		
		//~ $query = $this->db->get();
		
		//~ if($query-> num_rows() != 1){
			//~ return;
		//~ }
		//~ $addressData = $query->result()[0];
		
		//~ $info =  array(
			//~ 'profile' => $personData, 
			//~ 'address' => $addressData
		//~ );
		
		$this->db-> select('*');
		$this->db->	from('person','address');
		$this->db-> join('user_account', 'person.accountID = user_account.accountID');
		$this->db-> join('address', 'person.addressID = address.addressID');
		$this->db->	where('person.accountID',$accountID);
		$this->db-> limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() != 1){
			return;
		}
		
		$info = $query->result()[0];
		
		return $info;
		
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




public function set_profile()
{
    $this->load->helper('url');
    
   $accountID = $this->session->accountID;
   //check if already registerred
	$this->db->select('personID');
	$this->db->	from('person');
	$this->db->	where('accountID',$accountID);
	$this->db->limit(1);
	
	$query = $this->db->get();
	
	if($query-> num_rows() == 1){
		$this->profile_model->edit_profile();
		return;
	}
   
    
	$addressData = array(
			'country' => $this->input->post('country'),
			'city' => $this->input->post('city'),
			'postcode' => $this->input->post('postcode'),
			'streetName' => $this->input->post('streetName'),
			'country' => $this->input->post('country'),
			'buldingNumber' => $this->input->post('buildingNumber')
		);
		
		
	$this->db->insert('address', $addressData);
	$addressID = $this->db->insert_id();
	
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
    
    $this->db->insert('person', $profileData);
	
	$info = array(
		'profile' => $profileData, 
		'address' => $addressData
	);
	
	
	return $info;
			
			
			
	
	/* 
		1. CREATE LOGIN PAGE
		2. CREATE SESSIONS WHEN LOGGED IN
		3. Get the username of the account in session.
		4. when posting... SQL query: insert into address the following where username in session is...
	
	
		 Below is the following data from form table that will be posted to address table in db
		'country' => $this->input->post('country'),
		'city' => $this->input->post('city'),
		'postcode' => $this->input->post('postcode'),
		'streetName' => $this->input->post('streetName'),
		'buildingNumber' => $this->input->post('buildingNumber'),
	);
	
	$a = $this->db->insert('person', $profileData);
	$b = $this->db->insert('address', $addressData);
	
	// ADDRESS WONT LINK TO PERSON ACCOUNT (*************************************
	
	$test = array(
		$a,
		$b
	);

    return $a; */
}


public function profile_search($option, $search){
	

	$option1 = (string)$option;
	$this->db->select('*');
	$this->db->	from('person');
	$this->db->join('user_account', 'person.accountID = user_account.accountID');
	$this->db->join('address', 'person.addressID = address.addressID');
	
	$this->db-> like($option1,$search);
	
	$query = $this->db->get()->result();
	
	
	return $query;
	
	
/*
	$split_search = explode(' ', $search);	

	if(empty($split_search)){  return; }
	
	foreach($split_search as $search){
	$query = $this->db-> like('firstname',$search)->
	or_like('lastname',$search)->
	or_like('email',$search)->
	or_like('username',$search)->
	or_like('city',$search)->
	or_like('streetName',$search)->
	or_like('buldingNumber', $search)->
	get()->result();
	
	if($query){
	
		
		
	}
		
	}
	
	
	return $query;
	
	
	*/
	
	/*$split_search_query = explode(' ', $search);
	
	$result_indexes = array();
	
	if(!empty($split_search_query)){
		foreach($split_search_query as $s) {
		
		
		$this->db-> like('firstname',$search),
		$this->db-> or_like('lastname',$search),
		$this->db-> or_like('email',$search),
		$this->db-> or_like('username',$search),
		$this->db-> or_like('city',$search),
		$this->db-> or_like('streetName',$search),
		$this->db-> or_like('buldingNumber', $search)
		
		array_push($result_indexes, $);	
	
		}
	}
	
	if($fields){
		
		$result = $query;
		
	}
	
	
	$this->db->limit(1);
	
	
	
	if($query->numRows() >5){
		return;
		}
		
	
	
	$split_search_query = explode(' ', $search);
	
	
	return $query;
	
	
	*/
	
	
	/*result = $this->db->get();
	
	if($result-> num_rows() >10){
			return;
		}
	
	$split_query = explode(' ', $search);
	$keywords = array();
	
	$indexes = array();

	foreach($split_query as $a){
		array_push($keywords, $a);
	}
	
	
	foreach($result as $row){
		foreach($keywords as $key=>$value){
		foreach($fields as $field_key=>$field_value){
			if($value = $field_value){
				array_push($indexes,$field_key);//return the row ???
				}
			}
	}
	}
	

	
	/*foreach($keywords as $key){
		foreach($fields as $field){
			if($key = $field){
				
				array_push($indexes, index($query->row())); //return the row ???
				
				}
			}
	}*/
	
	/*eh = array(array_count_values($indexes));
	
	foreach($meh as $m){
			
		$result = max($m);
		$result = $this->b->get($m);
		}
		

	return $result;
	*/
	
	}

}
