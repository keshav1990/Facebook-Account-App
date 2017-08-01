<?php
/*
class common_model 
@Description:- This class is used to manage account,create account and account setting.

function insert()
@Description:- This function is create to insert items into database.

function get_record()
@Description:- This function is create to get record from database.

function delete_user()
@Description:- This function is create for  delete particular record from database.

function update()
@Description:- This function is create to update the particular account.

public function get_userdetail()
@Description:- This function create to get login user detail.
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
			$res = $this->db->insert($tableName,$data);
				return $res;
		}
/*@Description:- This function is create to get record from database. */
		public function get_record($tableName="manage_account",$where='',$limit=10,$offset=0)
		{
			if(is_array($where)){
					$where = $where +  array('is_deleted'=>0,'user_id'=>$this->session->userdata('admin_logged_id'));; 
			}else{
				$where =  array('is_deleted'=>0,'user_id'=>$this->session->userdata('admin_logged_id'));
			}
			$this->db->select('*')->from($tableName)->where($where)->limit($limit,$offset);

		
			$result = $this->db->get();
			$result = $result->result();
			return $result;
		}
 /*
	@Description:- To count no of rows in table with conditions
 */
	function get_total_sum($tableName,$where=''){
		if(is_array($where)){
					$where = $where +  array('is_deleted'=>0,'user_id'=>$this->session->userdata('admin_logged_id'));; 
			}else{
				$where =  array('is_deleted'=>0,'user_id'=>$this->session->userdata('admin_logged_id'));
			}
			return 	$this->db->where($where)->from($tableName)->count_all_results();

		}

 /* @Description:- This function is create for  delete particular record from database. */
		public function delete_user($tableName="manage_account",$id)
		{
			
			$data = array('is_deleted'=>1,'user_id'=>$this->session->userdata('admin_logged_id'));
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
/*  @Description:- This function create to search particular account */
	public function make_like_conditions($fields, $type) 
		{
			$likes = array();
			foreach ($fields as $key => $search) {
				$likes[] = "`$key` like '%$search%'";
			}
			return '(' . implode($type, $likes) . ')';
		}
/*  @Description:- This function create to get login user detail */		
		public function get_userdetail($data,$tableName="admin_login")
		{
			$this->db->select('*');
			$this->db->from($tableName);
			$this->db->where($data);
			$query = $this->db->get();
			if($query->num_rows() > 0)
				{
					 $query=$query->result();
					return $query[0]->admin_id;
					} else {
					return false;
				}
		}
		public function registerDetail($data,$tableName="admin_login")
		{
			$this->db->insert($tableName,$data);
			
		}
	}