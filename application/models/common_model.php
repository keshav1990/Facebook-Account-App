<?php
/*
class common_model 
@Description:- This function is used for manage the accounts.

function index()
@Description:- This function is create for show the list of all accounts.

function create_account()
@Description:- This function is created to add a new account.

function remove()
@Description:- This function is created to delete a particular account detail.

function edit_record()
@Description:- This function is create to edit a account.

*/

	class common_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			
		}
		public function insert($data,$tableName="manage_account")
		{
			$this->db->insert($tableName,$data);
			
		}
		public function get_record($tableName="manage_account",$where='',$limit=10,$offset=0)
		{
			if(is_array($where)){
					$where = $where +  array('is_deleted'=>0);; 
			}else{
				$where =  array('is_deleted'=>0);
			}
			$this->db->select('*')->from($tableName)->where($where)->limit($limit,$offset);

		//	$this->db->get();
		$result = $this->db->get();
			$result = $result->result();
			return $result;
		}
		public function delete_user($tableName="manage_account",$id)
		{
			 ///$this->db->where('id', $id);
			///$this->db->delete($tableName,$id);
			$data = array('is_deleted'=>1);
			$result = $this->db->update($tableName, $data,$id);
			return $result;
			
		}
		public function update($data,$tableName="manage_account",$id="")
		{
			
			//$this->db->where('id', $id['id']);
			$result = $this->db->update($tableName, $data,$id);
			
			return $result;
		}
	}