<?php
	class common_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			
		}
		public function insert($data)
		{
			$this->db->insert('manage_account',$data);
			
		}
	}