<?php

class Login_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $username
    * @param string $password
    * @return void
    */

    /*Check Login*/
   	function validate($username, $password)
	{
		$this->db->where('status',user);
		$this->db->where('password', $password);
		$this->db->where('nama_user', $username);
		$query = $this->db->get('tb_user');
		return $query->result();	
	}

	/*Get Session values */
		
	function get_id($username, $password)
	{
		
		$this->db->where('password', $password);
		$this->db->where('nama_user', $username);	
		return $this->db->get('tb_user')->result();
				
	}
		
}