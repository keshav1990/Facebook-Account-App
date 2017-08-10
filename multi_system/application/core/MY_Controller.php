<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function is_admin_logged_in()
	{
		if($this->session->userdata("is_admin_logged_in") !=TRUE){
			redirect("login");
		}
	}
	public function is_user_logged_in()
	{
		if($this->session->userdata("is_user_logged_in") !=TRUE){
			redirect("login");
		}
	}
	public function test($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
	public function qry($data)
	{
		echo $this->db->last_query();
	}
}