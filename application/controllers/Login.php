<?php
/* 

class Login 
@Description:- This function is used for manage the accounts.

function index()
@Description:- This function is used to show the login page.

function loginAccount()
@Description:- \


*/

	class Login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//load form validation library
			$this->load->library('form_validation');
			// if($this->session->userdata('admin_logged_id') )
				// {	redirect('manage_account');
				// }
			$this->load->model('account_model');
		}
/* @Description:- This function is used to show the login page. */
		public function index()
		{
			$this->load->view('user-login');
		}
/* @Description:-  */
			public function loginAccount()
		{
			
			$this->form_validation->set_rules('username','username','trim|required' );
			$this->form_validation->set_rules('password','password', 'trim|required');
				/* this condition is used to check the form validation */
			if($this->form_validation->run() == FALSE)
			{
				/* if user is login with invalid account the redirect same page. */
				if(isset($this->session->userdata['logged_in']))
				$this->load->view('user-login');
			}
			else
			{	
				//encrypt the user posted password
				$password = sha1($this->input->post('password'));
				
				$data = array(
					'admin_name' => $this->input->post('username'),
					'admin_password' => $password,
				
					);
					$result = $this->account_model->login($data);
				//print_r($result);
			// die;
			 /* if we are getting any response then the store detail in session and redirect */
			  if(count($result)>0)
			  {
				//create an array
					 $session_data = array(
					 'admin_name' => $result[0]->admin_name,
					 'admin_email' => $result[0]->admin_email,
					 'admin_logged_id' => $result[0]->admin_id,
					 ); 
						 //add the user data into session
					$this->session->set_userdata($session_data);
					 
					redirect('ManageAccounts/index');
				}
			
					else
					{
						//error msg is print
						$msg = array(
						'error_message' => "invalid username and password"
						);
						$this->session->set_flashdata($msg);
					redirect("login");
					 }
			}
		}
	}