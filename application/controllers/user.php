<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('user_model');
	}

	public function index()
	{

		$data[]= '';
		$this->load->view('user/home', $data);
	}


	public function login()
	{
		$action = $this->input->get('action');
		switch ((int) $action) {
			case 1 :
				$data['error'] = 'Both username and password are required to login.';
				break;
			case 2 :
				$data['error'] = 'Invalid username or password.';
				break;
			case 3 :
				$data['error'] = 'All fields are required.';
				break;
			case 4 :
				$data['error'] = 'Password and confirm password do not match!';
				break;
			case 5 :
				$data['error'] = 'Minimum 4 character are required';
				break;
			default:
				$data['error'] = false;
				break;
		}
		$data['form'] = 0;
		if($form = $this->input->get('form')){
			$data['form'] = $form;
		}

		$this->load->view('user/login', $data);
	}





	public function doLogin()
	{

		$OathParams = $this->input->post();
		if(empty($OathParams['username']) || empty($OathParams['password'])){
			redirect('/user/login?action=1&form=1');
		}

		$password = $this->user_model->hashPassword($OathParams['password']);
		$user = $this->user_model->getUserByUsername($OathParams['username']);

		if( (!empty($user)) && $user->password == $password){
			# success
			$userSessionData = array(
			                   'userId'  => $user->id,
			                   'username'  => $user->username,
			                   'userLoggedIn' => TRUE
			               );
			$this->session->set_userdata($userSessionData);

			if($goto = $this->session->userData('goTo')){
				$this->session->set_userdata('goTo', false);
				redirect($goto);
			}else {
				redirect('/user/home?action=2');
			}
		}else {
			#fail
			redirect('/user/login?action=2&form=1');
		}


		
	}


	public function saveRegister()
	{
		$itemData = $this->input->post();

		if( empty($itemData['username']) || empty($itemData['password']) ||
			empty($itemData['confirmPassword']) || empty($itemData['full_name']) ||
			empty($itemData['country']) || empty($itemData['state']) ||
			empty($itemData['city']) || empty($itemData['address']) ||
			empty($itemData['phone']) || empty($itemData['email'])){
			redirect('/user/login?action=3&form=2');
		}

		if($itemData['password'] != $itemData['confirmPassword']){
			redirect('/user/login?action=4&form=2');
		}

		if(strlen($itemData['password']) < 4 ){
			redirect('/user/login?action=5&form=2');
		}

		$itemData['password'] = $this->user_model->hashPassword($itemData['password']);
		unset($itemData['confirmPassword']);
		$userId = $this->user_model->addNewUser($itemData);

		$user = $this->user_model->getUserById($userId);

		$userSessionData = array(
			                   'userId'  => $user->id,
			                   'username'  => $user->username,
			                   'userLoggedIn' => TRUE
			               );
		$this->session->set_userdata($userSessionData);

		#if goto back is set then do it.
		if($goto = $this->session->userData('goTo')){
			$this->session->set_userdata('goTo', false);
			redirect($goto);
		}else {
			redirect('/user/home?action=2');
		}
	}




	

	public function isUserLoggedIn()
	{
		
	}

}