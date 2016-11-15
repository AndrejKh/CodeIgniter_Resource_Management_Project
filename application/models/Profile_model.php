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

public function set_news()
{
    $this->load->helper('url');
    

    $accountData = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'email' => $this->input->post('emailAddress'),
        'typeID' => $this->input->post('type')
    );
    
	$personData = array(
		'fName' => $this->input->post('fName'),
		'fName' => $this->input->post('sName')
	);
	
	$a = $this->db->insert('user_account', $accountData);
	//$b = $this->db->insert('person',$personData);
	
	$test = array(
		$a,
		$b
	);

    return $a;
}
}

