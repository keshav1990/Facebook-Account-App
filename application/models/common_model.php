<?php
/*
class common_model 
@Description:- This class is create as a common model.

function insert()
@Description:- This function is create to insert items into database.

function get_record()
@Description:- This function is create to get record from database.

function delete_user()
@Description:- This function is create for  delete particular record from database.

function update()
@Description:- This function is create to update the particular account.

*/

	class common_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('pagination');
			
		}
/* @Description:- This function is used to insert items into database. */
		public function insert($data,$tableName="manage_account")
		{
			$this->db->insert($tableName,$data);
			
		}
/*@Description:- This function is create to get record from database. */
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
			/*
	To count no of rows in table with conditions
	*/
	function get_total_sum($tableName,$where=''){
		if(is_array($where)){
					$where = $where +  array('is_deleted'=>0);; 
			}else{
				$where =  array('is_deleted'=>0);
			}
			return 	$this->db->where($where)->from($tableName)->count_all_results();

		}

 /* @Description:- This function is create for  delete particular record from database. */
		public function delete_user($tableName="manage_account",$id)
		{
			 ///$this->db->where('id', $id);
			///$this->db->delete($tableName,$id);
			$data = array('is_deleted'=>1);
			$result = $this->db->update($tableName, $data,$id);
			return $result;
			
		}
 /* @Description:- This function is create to update the perticular account. */
		public function update($data,$tableName="manage_account",$id="")
		{
			
			//$this->db->where('id', $id['id']);
			$result = $this->db->update($tableName, $data,$id);
			
			return $result;
		}
/*  @Description:- This function create to logout account */
	public function fetchtable($limit,$offset)
		{
			$result = $this->db->limit($limit,$offset)->get('manage_account');
			 //return $query->result();  
			$result = $result->result();
			// $this->db->last_query();
			// exit;
			return $result;
		}
	public function get_allusers($tableName="manage_account")
		{
			$result = $this->db->get($tableName);
			//return $query->result();  
			$result = $result->result();
				
			return $result;
		}
	public function make_like_conditions($fields, $type) 
		{
			$likes = array();
			foreach ($fields as $key => $search) {
				$likes[] = "`$key` like '%$search%'";
			}
			return '(' . implode($type, $likes) . ')';
		}
		
		
	}