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

function create_token()
@Description:- This function is created to add a new access token.
function  fblogout()
@Description:- This function is lofout facebook.

*/
class ManageAccounts extends CI_Controller {
  public function __construct() {
    parent :: __construct();
    $this->load->library('pagination');
    $this->load->library('form_validation');
    $this->load->library('facebook');
    $this->load->model('common_model');
    if ($this->session->userdata('admin_logged_id') != true) {
      redirect("login");
    }
  }
/*
@Description:- This function is create for show the list of all accounts.
*/
  public function index() {
    $data = array();
    $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//get_record($tableName="manage_account",$where='',$limit=10)
    $data['user'] = $this->common_model->get_record("manage_account", '', 10, $offset);
    $total_rows = $this->common_model->get_total_sum("manage_account");
// Set base_url for every links
    $paginationUrl = base_url() . "ManageAccounts/";
//load pagination model
//$this->load->model("Pagination");
//$this->Pagination->make_pagging($paginationUrl,$total_rows , 10, 0);
    $this->load->library('pagination');
//echo $this->db->last_query();
    $config['base_url'] = $paginationUrl;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = 10;
    $this->pagination->initialize($config);
//echo $this->pagination->create_links();
    $data['theme'] = 'Manage_account';
    $this->load->view('theme', $data);
  }
/*
@Description:- This function is created to add a new account.
*/
  public function create_account() {
/* this condition is used to check if form submit or not
*/
    if (isset ($_POST) && isset ($_POST['add_account'])) {
      $this->form_validation->set_rules('account_name', 'Please Enter Account Name', 'trim|required');
      $this->form_validation->set_rules('account_id', 'Please Enter Account Id', 'trim|required');
/* this condition is used to check the form validation */
      if ($this->form_validation->run() != FALSE) {
        $data = array('account_name' => $this->input->post('account_name'), 'account_id' => $this->input->post('account_id'), 'total_leads' => $this->input->post('total_leads'), 'account_status' => $this->input->post('status'));
        $this->common_model->insert($data, 'manage_account');
        redirect(base_url('ManageAccounts'));
        exit;
      }
      $data = array();
      $data['account_name'] = $_POST['account_name'];
      $data['account_id'] = $_POST['account_id'];
      $data['total_leads'] = $_POST['total_leads'];
      $data['status'] = $_POST['status'];
    }
    else {
/* these are the default values */
      $data = array();
      $data['account_name'] = '';
      $data['account_id'] = '';
      $data['total_leads'] = '100';
      $data['status'] = '1';
    }
    $data['button_label'] = "Add Account";
    $data['title'] = "Create Account";
//$data['theme'] = 'create_account';
    $data['theme'] = 'create_account';
//print_r($data);
    $this->load->view('theme', $data);
  }
/*
@Description:- This function is created to delete a particular account detail.
*/
  public function remove($id) {
//delete_user($tableName="manage_account",$id)
    $where = array();
    $where['id'] = $id;
    $result = $this->common_model->delete_user('manage_account', $where);
/* if we are getting any response then redirect with success */
    if ($result > 0) {
      $this->session->set_flashdata('success', 'Delete Record successfully..');
    }
    else {
      $this->session->set_flashdata('error', 'Try Again Later');
    }
    redirect("ManageAccounts/index");
  }
/*
@Description:- This function is create to update status.
*/
  public function update_status($id) {
    if (isset ($_GET) && isset ($_GET['update_status'])) {
      $data = array('account_status' => $this->input->get('status'));
      $this->common_model->update($data, 'manage_account', array('id' => $id));
      redirect(base_url('ManageAccounts'));
    }
  }
/*
@Description:- This function is create to edit a account.
*/
  public function edit_record($id) {
/* this condition is used to check if form submit or not
*/
    if (isset ($_POST) && isset ($_POST['add_account'])) {
      $this->form_validation->set_rules('account_name', 'Please Enter Account Name', 'trim|required');
      $this->form_validation->set_rules('account_id', 'Please Enter Account Id', 'trim|required');
/* this condition is used to check the form validation */
      if ($this->form_validation->run() != FALSE) {
        $data = array('account_name' => $this->input->post('account_name'), 'account_id' => $this->input->post('account_id'), 'total_leads' => $this->input->post('total_leads'), 'account_status' => $this->input->post('status'));
        $this->common_model->update($data, 'manage_account', array('id' => $id));
        redirect(base_url('ManageAccounts'));
        exit;
      }
      $data = array();
      $data['account_name'] = $_POST['account_name'];
      $data['account_id'] = $_POST['account_id'];
      $data['total_leads'] = $_POST['total_leads'];
      $data['status'] = $_POST['account_status'];
    }
    else {
/* to get default values */
      $user = $this->common_model->get_record("manage_account", array("id" => $id), 1);
      $user = json_decode(json_encode($user[0]), true);
      $data = array();
      $data['account_name'] = $user['account_name'];
      $data['account_id'] = $user['account_id'];
      $data['total_leads'] = $user['total_leads'];
      $data['status'] = $user['account_status'];
    }
    $data['theme'] = 'create_account';
//print_r($data);
    $data['button_label'] = "Update";
    $data['title'] = "Edit Account";
    $this->load->view('theme', $data);
  }
/* @Description:- this function is create to logout account */
  public function logout() {
    $this->facebook->destroy_session();
    $this->session->sess_destroy();
    redirect('Login');
  }
/*  @Description:- This function is create to change user detail. */
  public function myaccountSetting() {
    $data = array();
    $this->form_validation->set_rules('admin_name', 'Admin Name', 'trim|required');
    $this->form_validation->set_rules('admin_email', 'Admin Email', 'trim|required|valid_email');
    $isPassword = 0;
    if (isset ($_POST['oldpassword']) && trim($_POST['oldpassword']) != '') {
      $isPassword = 1;
      $this->form_validation->set_rules('oldpassword', 'Please Enter Old Password', 'trim|required');
      $this->form_validation->set_rules('newpassword', 'Please Enter New Password', 'required');
      $this->form_validation->set_rules('confirmpassword', 'Confirm Password Doesn\'t matched', 'required|matches[newpassword]');
    }
/* this condition is used to check the form validation */
    if ($this->form_validation->run() == FALSE) {
      $data['theme'] = 'myAccount';
      $this->load->view('theme', $data);
    }
    else {
      if ($isPassword) {
/* else encrypt the posted password */
        $password = sha1($this->input->post('oldpassword'));
        $data = array('admin_name' => $this->input->post('admin_name'), 'admin_email' => $this->input->post('admin_email'), 'admin_password' => $password);
        $result = $this->common_model->get_userdetail($data);
/* if we are getting any response then redirect with success */
        if ($result > 0) {
          $data = array('admin_name' => $this->input->post('admin_name'), 'admin_email' => $this->input->post('admin_email'), 'admin_password' => sha1($this->input->post('newpassword')));
          $this->db->update('admin_login', $data, array('admin_id' => $result));
          redirect('ManageAccounts/logout');
          exit;
        }
        else {
          $msg = array('error_message' => "Old Password doesn't matched.");
          $this->session->set_flashdata($msg);
          $data['theme'] = 'myAccount';
          $this->load->view('theme', $data);
        }
      }
      else {
        $data = array('admin_name' => $this->input->post('admin_name'), 'admin_email' => $this->input->post('admin_email'),
//'admin_password' => sha1($this->input->post('newpassword'))
        );
        $this->db->update('admin_login', $data, array('admin_id' => $result));
        redirect('ManageAccounts/myaccountSetting');
        exit;
      }
    }
  }
/*  @Description:- This function is create to add a new access token. */
  public function create_token() {
    $userData = array();
     // Check if user is logged in
      if ($this->facebook->is_authenticated()) {
      // Get user facebook profile details
      $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,gender,locale,picture');
      // GET ACCESS TOKEN
      $data['accesstoken'] = $this->facebook->is_authenticated();
      // GET FAN PAGES ID,NAME,ACCESS TOKEN
      $userProfile1 = $this->facebook->request('get', '/me/accounts');
      echo "<pre>";
      print_r($userProfile1['data']);
       echo "</pre>";
       exit;
      /*$response = $request->execute();
      $graphObject = $response->getGraphObject();
      print_r($graphObject);
      exit;

      */
      $userData['oauth_provider'] = 'facebook';
      $userData['oauth_uid'] = $userProfile['id'];
      $userData['first_name'] = $userProfile['first_name'];
      $userData['last_name'] = $userProfile['last_name'];
      $userData['gender'] = $userProfile['gender'];
      $userData['locale'] = $userProfile['locale'];
      $userData['profile_url'] = 'https://www.facebook.com/' . $userProfile['id'];
      $userData['picture_url'] = $userProfile['picture']['data']['url'];
      $data['userData'] = $userData;
      $accesstoken = $data['accesstoken'];
      $data['logoutUrl'] = $this->facebook->logout_url();
    }
    else {
      $fbuser = '';
// Get login URL
      $data['authUrl'] = $this->facebook->login_url();
    }
    $this->load->view('fblogin', $data);
  }
/* fblogout()  @Description:- This function is lofout facebook. */
  public function fblogout() {
    $data['authUrl'] = $this->facebook->login_url();
    $this->facebook->destroy_session();
    redirect('fblogin', $data);
  }
}