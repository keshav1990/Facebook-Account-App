<?php
/* 

class Login 
@Description:- This class is used for manage the accounts.

function index()
@Description:- This function is used to show the login page.

function loginAccount()
@Description:- This function is create to login user with valid account   */ 


	class Login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//load form validation library
			$this->load->library('form_validation');
			
			$this->load->model('account_model');
		}
		
/* @Description:- This function is used to show the login page. */
		public function index()
		{
			$this->load->view('user-login');
		}
/* @Description:- This function is create to login user with valid account   */
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
			 /* if we are getting any response then the store detail in session and redirect */
			  if(count($result)>0)
			  {
				//create an array
					 $session_data = array(
					 'admin_name' => $result[0]->admin_name,
					 'admin_email' => $result[0]->admin_email,
					 'admin_logged_id' => $result[0]->admin_id,
					 'is_admin' => $result[0]->is_admin,
					 'is_admin_logged_in' => TRUE,
					 ); 
						
					//add the user data into session
					$this->session->set_userdata($session_data);
					print_r($this->session->userdata());
					//die;
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
		
		
	/* @Description:- This function is used to show the login page. */
		public function register()
		{
			
			//if(isset($_POST['register'])){
			
			$this->form_validation->set_rules('name','User Name','trim|required' );
			$this->form_validation->set_rules('email','Please enter valid email address', 'trim|required|valid_email');
			$this->form_validation->set_rules('password','password', 'trim|required');
			//print_r($_POST);
			if($this->form_validation->run() == FALSE)
			{
				//	echo "hello"; exit;    
				$this->load->view('register');
			}
			else{
				$data = array(
				//'admin_name' => $this->input->post('name'),
				'admin_email' => $this->input->post('email'),
				//'admin_password' => $this->input->post('password')
			);
			$result = $this->account_model->login($data);
			if(count($result)>0)
			  {
				//error msg is print
						$msg = array(
						'error_message' => "Email is already register with our system"
						);
						$this->session->set_flashdata($msg);
						redirect('register');
						exit;
						
			  }
			  $data = array(
				'admin_name' => $this->input->post('name'),
				//'admin_email' => $this->input->post('email'),
				//'admin_password' => $this->input->post('password')
			);
			$result = $this->account_model->login($data);
			$this->load->view('register');
			if(count($result)>0)
			  {
				//error msg is print
						$msg = array(
						'error_message' => "Username Already Exist in our system"
						);
						$this->session->set_flashdata($msg);
						redirect('register');
						exit;
			  }
			  $data = array(
				'admin_name' => $this->input->post('name'),
				'admin_email' => $this->input->post('email'),
				'admin_password' => sha1($this->input->post('password'))
			);
			$this->load->model('common_model');  
			 $this->common_model->registerDetail($data,'admin_login');
			
			 $session_data = array(
					 'admin_logged_id' => $this->db->insert_id(),
					 'is_admin' => 0,
					 );
							$session_data = $session_data + $data;
							
							
						 //add the user data into session
					$this->session->set_userdata($session_data);
					 
					redirect('ManageAccounts/index');
			 exit;
			//redirect(base_url('ManageAccounts'));
			}
			//}
			
		}	
	}