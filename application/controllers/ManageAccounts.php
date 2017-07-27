<?php

	class ManageAccounts extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			
		}
		public function index()
		{
			$data = array();
			$data['theme'] = 'Manage_account';
			$this->load->view('theme',$data);
		}
		public function create_account()
		{
			$data = array();
			$data['theme'] = 'create_account';
			$this->load->view('theme',$data);
		}
		public function manage_user_account()
		{
			$this->form_validation->set_rules('account_name','Please Enter Account Name','trim|required' );
			$this->form_validation->set_rules('account_id','Please Enter Account Id', 'trim|required');	
			//$this->form_validation->set_rules('total_leads','Please Enter ', 'trim|required');	
			
		}
	}