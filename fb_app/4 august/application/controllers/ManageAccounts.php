<?php
/*
class ManageAccounts 
@Description:- This class is used for manage the accounts.

function index()
@Description:- This function is create for show the list of all accounts.

function create_account()
@Description:- This function is created to add a new account.

function remove()
@Description:- This function is created to delete a particular account detail.

function edit_record()
@Description:- This function is create to edit a account.

function logout()
@Description:- This function is create to logout account.
*/

	class ManageAccounts extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('pagination');
			$this->load->library('form_validation');
			$this->load->model('common_model');
			if($this->session->userdata('admin_logged_id')!=true)
				{
				 redirect("login");
				}
		}
/*  
	@Description:- This function is create for show the list of all accounts.
 */
		public function index()
		{
			$data = array();
			$offset = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
			
			//get_record($tableName="manage_account",$where='',$limit=10)
			$data['user']  = $this->common_model->get_record("manage_account",'',10,$offset);
			
			$total_rows = $this->common_model->get_total_sum("manage_account");
			
			
			// Set base_url for every links
			 $paginationUrl = base_url()."ManageAccounts/";
			
			 $this->load->library('pagination');
			
			$config['base_url'] = $paginationUrl;
			$config['total_rows'] = $total_rows;
			$config['per_page'] = 10;

		$this->pagination->initialize($config);


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
			$this->form_validation->set_rules('account_name','Please Enter Auction  Name','trim|required' );
			$this->form_validation->set_rules('account_id','Please Enter Video Id', 'trim|required');	
			/* this condition is used to check the form validation */
			if($this->form_validation->run()!= FALSE){
			
			$data = array(
				'account_name' => $this->input->post('account_name'),
				'account_id' => $this->input->post('account_id'),
				'total_leads' => $this->input->post('total_leads'),
				'account_status' => $this->input->post('status'),
				'item' => serialize($this->input->post('mytext'))
				
			);
			
			$response = $this->common_model->insert($data,'manage_account');
				//print_r($response);die;
				if($response > 0)
					{
					//success msg
					$this->session->set_flashdata('success', 'Inserted Record Successfully...');
					}
				else
					{
					//show error msg
					$this->session->set_flashdata('error', 'Try Again Later...');
					}
			redirect(base_url('ManageAccounts'));
			}
			$data = array();
			$data['account_name'] = $_POST['account_name'];
			$data['account_id'] = $_POST['account_id'];
			$data['total_leads'] = $_POST['total_leads'];
			$data['status'] = $_POST['status'];		
			$data['item'] = $_POST['mytext'];		
							
			}else{
				/* these are the default values */
			$data = array();
			$data['account_name'] = '';
			$data['account_id'] = '';
			$data['total_leads'] = '100';
			$data['status'] = '1';
			$dat['item'] = '';
			}
			$data['button_label'] = "Add Auction ";
			$data['title'] = "Create Auction ";
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
					
					$this->session->set_flashdata('success', 'Delete Record successfully..');
				}
				else
				{
				
					$this->session->set_flashdata('error', 'Try Again Later');
				}
				
				redirect("ManageAccounts/index");
			}	
/* 
	@Description:- This function is create to update status.
 */			
	public function update_status($id){
			if(isset($_GET) && isset($_GET['update_status'])){
				$data = array(
							
				'account_status' => $this->input->get('status')
			);
			 $this->common_model->update($data,'manage_account',array('id'=>$id));
			
			redirect(base_url('ManageAccounts'));
			
}	
}
	
/* 
	@Description:- This function is create to edit a account.
 */
		public function edit_record($id)
			{
			/* this condition is used to check if form submit or not
			*/
			if(isset($_POST) && isset($_POST['add_account'])){
			$this->form_validation->set_rules('account_name','Please Enter Auction Name','trim|required' );
			$this->form_validation->set_rules('account_id','Please Enter Video Id', 'trim|required');	
			/* this condition is used to check the form validation */
			if($this->form_validation->run()!= FALSE){
			
			$data = array(
				'account_name' => $this->input->post('account_name'),
				'account_id' => $this->input->post('account_id'),
				'total_leads' => $this->input->post('total_leads'),
				'account_status' => $this->input->post('status'),
				'item' => serialize($this->input->post('mytext'))
			);
			$response =	$this->common_model->update($data,'manage_account',array('id'=>$id));
				
				if($response > 0 )
					{
						//display success msg
						$this->session->set_flashdata('success', 'Edit Record Successfully...');
					}
					else
					{
						//display error msg
						$this->session->set_flashdata('error', 'Try Again Later...');
					}
			redirect(base_url('ManageAccounts'));
			exit;
			}
			$data = array();
			$data['account_name'] = $_POST['account_name'];
			$data['account_id'] = $_POST['account_id'];
			$data['total_leads'] = $_POST['total_leads'];
			$data['status'] = $_POST['account_status'];	
			$data['item'] = $_POST['mytext'];					
			}else{
				/* to get default values */

			$user = $this->common_model->get_record("manage_account",array("id"=>$id),1);
			//print_r($user);die;
			$user = json_decode(json_encode($user[0]),true);
			$data = array();
			//print_r($user);die;
			$data['account_name'] = $user['account_name'];
			$data['account_id'] = $user['account_id'];
			$data['total_leads'] = $user['total_leads'];
			$data['status'] = $user['account_status'];	
			$data['item'] = $user['item'];	
			$data['id'] = $user['id'];	
			}
		
			$data['theme'] = 'create_account';
			//print_r($data);
			$data['button_label'] = "Update";
			$data['title'] = "Edit Auction ";
			$this->load->view('theme',$data);
			}
/* @Description:- this function is create to logout account */ 
			public function logout()
			{
				$this->session->sess_destroy();
				redirect('Login');
			}
/*  @Description:- This function is create to change user detail. */


		public function myaccountSetting(){
				$data = array();
				$this->form_validation->set_rules('admin_name','Admin Name','trim|required');
				$this->form_validation->set_rules('admin_email','Admin Email','trim|required|valid_email');
				$isPassword = 0;
				if(isset($_POST['oldpassword']) && trim($_POST['oldpassword'])!=''){
				$isPassword = 1;
				$this->form_validation->set_rules('oldpassword', 'Please Enter Old Password', 'trim|required');
				$this->form_validation->set_rules('newpassword', 'Please Enter New Password', 'required');
				$this->form_validation->set_rules('confirmpassword', 'Confirm Password Doesn\'t matched', 'required|matches[newpassword]');
				}
				
				/* this condition is used to check the form validation */
				if($this->form_validation->run()== FALSE)
				{
				
					$data['theme'] = 'myAccount';
					$this->load->view('theme',$data);
					
				}
				
				else
				{
					if($isPassword)
					{
					/* else encrypt the posted password */
					$password = sha1($this->input->post('oldpassword'));
					$data = array(
					 'admin_name' => $this->input->post('admin_name'), 
					 'admin_email' => $this->input->post('admin_email'), 
					 'admin_password' => $password 
					 );
					
					$result = $this->common_model->get_userdetail($data);
					/* if we are getting any response then redirect with success */
					if($result>0)
						{
						 $data = array(
							'admin_name' => $this->input->post('admin_name'),
							'admin_email' => $this->input->post('admin_email'),
							'admin_password' => sha1($this->input->post('newpassword'))
								);
						
							$response = $this->db->update('admin_login', $data,array('admin_id'=>$result));
							
							redirect('ManageAccounts/logout');exit;
						 }
					 else
						{
							$msg = array(
							'error_message' => "Old Password doesn't matched."
							);
							$this->session->set_flashdata($msg);
							$data['theme'] = 'myAccount';
							$this->load->view('theme',$data);
			
							}
				
					}else{
					$data = array(
							'admin_name' => $this->input->post('admin_name'),
							'admin_email' => $this->input->post('admin_email'),
							//'admin_password' => sha1($this->input->post('newpassword'))
								);	
								$this->db->update('admin_login', $data,array('admin_id'=>$result));
							
							redirect('ManageAccounts/myaccountSetting');exit;
					}	
		}
	}
/*  
	@Description:- This function is created to insert video detail.
 */
		public function croneJob()
		{
			$data = array();
		
			
			$this->form_validation->set_rules('reference_id','Reference Id','trim|required' );
			$this->form_validation->set_rules('fan_page','Fan Page','trim|required' );
			$this->form_validation->set_rules('video_id','Video Id','trim|required' );
			if($this->form_validation->run()== FALSE)
			{
				$data['theme'] = 'video_detail';
				$this->load->view('theme',$data);
			}
			else
			{
			$user = array(
				'reference_id' => $this->input->post('reference_id'),
				'fan_page' => $this->input->post('fan_page'),
				'video_id' => $this->input->post('video_id'),
				
				);
				
				$response = $this->common_model->insertVideoDetail($user,'video');
				 if($response > 0)
					{
					//success msg
					$this->session->set_flashdata('success', 'Inserted Record Successfully...');
					}
				else
					{
					//show error msg
					$this->session->set_flashdata('error', 'Try Again Later...');
					}
				redirect('ManageAccounts/manageDetail');
			}
		}
	/*  @Description:- This function is create to display video detail detail. */	
		public function manageDetail()
		{
				$data = array();
			$offset = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
			//print_r($offset);die;
			//get_record($tableName="manage_account",$where='',$limit=10)
			$data['user']  = $this->common_model->get_video_record("video",'',10,$offset);
			
			 $total_rows = $this->common_model->get_totalvideo_sum("video");
		
			
			// Set base_url for every links
			 $paginationUrl = base_url()."ManageAccounts/manageDetail/";
		
			 $this->load->library('pagination');
		
			$config['base_url'] = $paginationUrl;
			$config['total_rows'] = $total_rows;
			//print_r($total_rows);die;
			$config['per_page'] = 10;
	
			$this->pagination->initialize($config);

			$data['theme'] = 'Manage_video_detail';
				$this->load->view('theme',$data);
			
			
		}

	/* @Description:- To edit particular detail. */ 
	//public function update_videoStatus($id)
}		
	
	