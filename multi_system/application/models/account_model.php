<?php
/* 
class account_model 
@Description:- This class is create for login account.

function login()
@Description:- This function is created to get and match the login user account detail.

 */
	class account_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			
		}
/* @Description:- read data using username and password*/
	
		 public function login($data) 
		{
		
			$this->db->select('*');
			$this->db->from('admin_login');
			$this->db->where($data);
			$query = $this->db->get();
			//echo $this->db->last_query();
		 //exit;

			if ($query->num_rows()) {
			$query = $query->result();
			return $query;
			
			} else {
			return array();
			}
		} 
	}