<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$action = $this->input->get('action');

		switch ((int) $action) {
			case 1:
				$data['error'] = "Both username and password are required!";
				break;
			case 2:
				$data['error'] = "Invalid username or password!";
				break;
			case 3:
				$data['error'] = "Please login!";
				break;
			default:
				$data['error'] = false;
				break;
		}
		$this->load->view('admin/login.php',$data);
	}

	public function login()
	{
		$OathParams = $this->input->post();
		if(empty($OathParams['username']) || empty($OathParams['password'])){
			redirect('/admin?action=1');
		}

		$password = $this->admin_model->hashPassword($OathParams['password']);
		$user = $this->admin_model->getAdminByUsername($OathParams['username']);

		if( (!empty($user)) && $user->password == $password){
			# success
			$userSessionData = array(
			                   'adminId'  => $user->id,
			                   'username'  => $user->username,
			                   'adminLoggedIn' => TRUE
			               );
			$this->session->set_userdata($userSessionData);
			redirect('/admin/home?action=2');
		}else {
			#fail
			redirect('/admin?action=2');
		}
		
	}

	public function isLoggedIn()
	{
		if($this->session->userdata('adminId') == false && $this->session->userdata('adminLoggedIn') == false){
			redirect('/admin?action=3');
		}
		return true;
	}

	public function home()
	{
		$this->isLoggedIn();
		$data = array('adminName' => $this->session->userdata('username'));
		$this->load->view('admin/home.php', $data);
	}

	public function orders()
	{
		$this->isLoggedIn();


		$data = array();
		$this->load->view('admin/orders.php', $data);
	}


	public function inventory()
	{
		$this->isLoggedIn();


		$data = array();
		$this->load->view('admin/inventory.php', $data);
	}

	public function addInventory()
	{
		$this->isLoggedIn();

		$data = array();
		$this->load->view('admin/addInventory.php', $data);
	}


	public function changePassword()
	{
		$this->isLoggedIn();
		switch ((int) $this->input->get('action')) {
			case 1:
				$data['error'] = 'All fields are required!';
				break;
			case 2:
				$data['error'] = 'Wrong old password!';
				break;
			case 3:
				$data['error'] = 'New password and confirm password do not match!';
				break;
			case 4:
				$data['error'] = 'Minimum 4 character are required';
				break;
			case 5:
				$data['error'] = false;
				$data['success'] = 'New password saved.';
				break;
			default:
				$data['success'] = false;
				$data['error'] = false;
				break;
		}
		$this->load->view('admin/changePassword.php', $data);
	}

	public function processChangePassword()
	{
		$this->isLoggedIn();
		$newOathData = $this->input->post();

		if(empty($newOathData['oldpassword']) || empty($newOathData['password']) || empty($newOathData['confirmPassword'])){
			redirect('/admin/changePassword?action=1');
		}

		$adminId = $this->session->userdata('adminId');
		$adminData = $this->admin_model->getAdminById($adminId);

		if($this->admin_model->hashPassword($newOathData['oldpassword']) != $adminData->password){
			redirect('/admin/changePassword?action=2');
		}

		if($newOathData['password'] != $newOathData['confirmPassword']){
			redirect('/admin/changePassword?action=3');
		}

		if(strlen($newOathData['password']) < 4 ){
			redirect('/admin/changePassword?action=4');
		}

		$newPassword = $this->admin_model->hashPassword($newOathData['password']);
		$this->admin_model->changePassword($adminId, $newPassword);

		redirect('/admin/changePassword?action=5');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}
}

