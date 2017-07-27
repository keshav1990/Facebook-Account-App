<?php

	class ManageAccounts extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('common_model');
		}
		public function index()
		{
			$data = array();
			$data['theme'] = 'Manage_account';
			$this->load->view('theme',$data);
		}
		public function create_account()
		{
			if(isset($_POST) && isset($_POST['add_account'])){
			$this->form_validation->set_rules('account_name','Please Enter Account Name','trim|required' );
			$this->form_validation->set_rules('account_id','Please Enter Account Id', 'trim|required');	
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
		public function manage_user_account()
		{
			//$this->form_validation->set_rules('total_leads','Please Enter ', 'trim|required');	
			
		}
	}