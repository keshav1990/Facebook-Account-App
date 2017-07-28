<?php
/*
class ManageAccounts 
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

	class ManageAccounts extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			$this->load->library('form_validation');
			$this->load->model('common_model');
		}
/*  
	@Description:- This function is create for show the list of all accounts.
 */
		public function index()
		{
			$data = array();
			//get_record($tableName="manage_account",$where='',$limit=10)
			$data['user']  = $this->common_model->get_record("manage_account",'',20);
			// print_r($response);
			// die;
			//echo $this->db->last_query();
			$data['theme'] = 'Manage_account';
			$this->load->view('theme',$data);
			
		}
	
/*  
	@Description:- This function is created to add a new account.
 */
		public function create_account()
		{
			/* this condition is used to check if form submit or not
			*/
			if(isset($_POST) && isset($_POST['add_account'])){
			$this->form_validation->set_rules('account_name','Please Enter Account Name','trim|required' );
			$this->form_validation->set_rules('account_id','Please Enter Account Id', 'trim|required');	
			/* this condition is used to check the form validation */
			if($this->form_validation->run()!= FALSE){
			
			$data = array(
				'account_name' => $this->input->post('account_name'),
				'account_id' => $this->input->post('account_id'),
				'total_leads' => $this->input->post('total_leads'),
				'account_status' => $this->input->post('status')
			);
			 $this->common_model->insert($data,'manage_account');
			redirect(base_url('ManageAccounts'));
			exit;
			}
			$data = array();
			$data['account_name'] = $_POST['account_name'];
			$data['account_id'] = $_POST['account_id'];
			$data['total_leads'] = $_POST['total_leads'];
			$data['status'] = $_POST['status'];			
			}else{
				/* these are the default values */
			$data = array();
			$data['account_name'] = '';
			$data['account_id'] = '';
			$data['total_leads'] = '100';
			$data['status'] = '1';	
			}
			
			
			//$data['theme'] = 'create_account';
			$data['theme'] = 'create_account';
			//print_r($data);
			$this->load->view('theme',$data);
		}
/* 
	@Description:- This function is created to delete a particular account detail.
 */
		public function remove($id)
			{
			//delete_user($tableName="manage_account",$id)
			$where = array();
			$where['id'] = $id;
				$result = $this->common_model->delete_user('manage_account',$where);
				/* if we are getting any response then redirect with success */
				if($result >0)
				{
					//show success msg
					$this->session->set_flashdata('success', 'Delete Record successfully..');
				}
				else
				{
					//else error msg
					$this->session->set_flashdata('error', 'Try Again Later');
				}
				//both redirect to user list page
				redirect("ManageAccounts/index");
			}	
		
/* 
	@Description:- This function is create to edit a account.
 */
		public function edit_record($id)
			{
			/* this condition is used to check if form submit or not
			*/
			if(isset($_POST) && isset($_POST['add_account'])){
			$this->form_validation->set_rules('account_name','Please Enter Account Name','trim|required' );
			$this->form_validation->set_rules('account_id','Please Enter Account Id', 'trim|required');	
			/* this condition is used to check the form validation */
			if($this->form_validation->run()!= FALSE){
			
			$data = array(
				'account_name' => $this->input->post('account_name'),
				'account_id' => $this->input->post('account_id'),
				'total_leads' => $this->input->post('total_leads'),
				'account_status' => $this->input->post('status')
			);
			 $this->common_model->update($data,'manage_account',array('id'=>$id));
			redirect(base_url('ManageAccounts'));
			exit;
			}
			$data = array();
			$data['account_name'] = $_POST['account_name'];
			$data['account_id'] = $_POST['account_id'];
			$data['total_leads'] = $_POST['total_leads'];
			$data['status'] = $_POST['account_status'];			
			}else{
				/* to get default values */
			//$user = $this->db->get_where("manage_account",)->result();
			$user = $this->common_model->get_record("manage_account",array("id"=>$id),1);
			//echo $this->db->last_query();
			//print_r($user);
			$user = json_decode(json_encode($user[0]),true);
			$data = array();
			
			$data['account_name'] = $user['account_name'];
			$data['account_id'] = $user['account_id'];
			$data['total_leads'] = $user['total_leads'];
			$data['status'] = $user['account_status'];	
			}
			
		//	print_r($data);
			//$data['theme'] = 'create_account';
			$data['theme'] = 'create_account';
			//print_r($data);
			$this->load->view('theme',$data);
			}
		
	}