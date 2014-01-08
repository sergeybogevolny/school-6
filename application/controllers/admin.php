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
		$data['hideMenu'] = true;
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

		if( (!empty($user)) && $user->password == $password  && $user->deleted != 1 ){
			# success
			$userSessionData = array(
			                   'adminId'  => $user->id,
			                   'username'  => $user->username,
			                   'adminLoggedIn' => TRUE
			               );
			if($user->isAdmin == 1){
				$userSessionData['isAdmin'] = true;
			}
			
			$this->session->set_userdata($userSessionData);
			redirect('/admin/home?action=2');
		}else {
			#fail
			redirect('/admin?action=2');
		}
		
	}

	public function isLoggedIn()
	{
		if($this->session->userdata('adminId') == false){
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
		$data['orders'] = $this->admin_model->getOrders();
		$this->load->view('admin/orders.php', $data);
	}


	public function inventory()
	{
		$this->isLoggedIn();
		$data['inventory'] = $this->admin_model->getInventory();
		
		switch ((int) $this->input->get('action')) {
			case 1:
				$data['error'] = false;
				$data['success'] = 'Item updated in inventory';
				break;
			case 2:
				$data['error'] = false;
				$data['success'] = 'Item deleted from inventory';
				break;
			default:
				$data['success'] = false;
				$data['error'] = false;
				break;
		}
		$this->load->view('admin/inventory.php', $data);
	}

	public function addInventory()
	{
		$this->isLoggedIn();
		$this->load->helper(array('form'));

		switch ((int) $this->input->get('action')) {
			case 1:
				$data['error'] = 'All fields are required!';
				break;
			case 2:
				$data['error'] = false;
				$data['success'] = 'Item added to inventory';
				break;
			default:
				$data['success'] = false;
				$data['error'] = false;
				break;
		}
		$this->load->view('admin/addInventory.php', $data);
	}

	public function processAddInventory()
	{
		$this->isLoggedIn();
		$itemData = $this->input->post();
		if(empty($itemData['title']) || empty($itemData['description']) || empty($itemData['price'])){
			redirect('/admin/addInventory?action=1');
		}

		$config['upload_path'] = './assets/uploads/books/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$ext = end(explode(".", $_FILES['userfile']['name']));
		$config['file_name'] = time().'.'.$ext;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->helper(array('form'));
			$this->load->view('admin/addInventory.php', $error);
		}
		else
		{
			$image = $this->upload->data();
			if(!file_exists('./assets/uploads/books/'.$image['file_name'])){
				$error = array('error' => 'upload faild please try again.');
				$this->load->helper(array('form'));
				$this->load->view('admin/addInventory.php', $error);
			}
			$data = array(
					'image' => 'assets/uploads/books/'.$image['file_name'],
					'title' => $itemData['title'],
					'description' => $itemData['description'],
					'price' => number_format((float) $itemData['price'], 2, '.', ''),
					'stock' => (int) $itemData['stock'],
					'category' => (int) $itemData['category']
				);
			$this->admin_model->addToInventory($data);
			redirect('/admin/addInventory?action=2');
		}

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

	public function changeOrderStatus()
	{
		$orderId = (int) $this->input->post('order_id');
		$status = (int) $this->input->post('order_status');

		$this->admin_model->updateOrderStatus($orderId, $status);
		exit(json_encode(array('status' => 'ok')));
	}

	public function editInventory()
	{
		$this->load->helper(array('form'));

		$itemId = $this->input->get('id');
		$data['item'] = $this->admin_model->getInventoryById($itemId);
		
		$post = $this->input->post();
		if(!empty($post['title'])){
			$this->admin_model->updateInventory($post);
			redirect('/admin/inventory?action=1');
		}

		$this->load->view('admin/addInventory.php', $data);
	}

	public function deleteInventory()
	{
		$itemId = $this->input->get('id');
		$this->admin_model->deleteInventoryById($itemId);
		redirect('/admin/inventory?action=2');
	}

	public function employee()
	{
		switch ((int) $this->input->get('action')) {
			case 1:
				$data['error'] = false;
				$data['success'] = 'employee data updated';
				break;
			case 2:
				$data['error'] = false;
				$data['success'] = 'employee data deleted';
				break;
			case 3:
				$data['error'] = false;
				$data['success'] = 'employee added';
				break;
			default:
				$data['success'] = false;
				$data['error'] = false;
				break;
		}
		
		$data['employees'] = $this->admin_model->getEmployee();
		$this->load->view('admin/employee.php', $data);
	}



	public function addEmployee()
	{
		$this->isLoggedIn();
		$this->load->helper(array('form'));

		switch ((int) $this->input->get('action')) {
			case 1:
				$data['error'] = 'All fields are required!';
				break;
			default:
				$data['success'] = false;
				$data['error'] = false;
				break;
		}
		$this->load->view('admin/addEmployee.php', $data);
	}


	public function saveEmployee()
	{
		$this->isLoggedIn();
		$employee = $this->input->post();
		if(empty($employee['name']) || empty($employee['username']) || empty($employee['password'])){
			redirect('/admin/addEmployee?action=1');
		}
		$employee['password'] = $this->admin_model->hashPassword($employee['password']);
		$this->admin_model->addEmployee($employee);
		redirect('/admin/employee?action=3');
	}

	public function deleteEmployee()
	{
		$employeeId = $this->input->get('id');
		$this->admin_model->deleteEmployeeById($employeeId);
		redirect('/admin/employee?action=2');
	}

	public function editEmployee()
	{
		$this->load->helper(array('form'));

		$employeeId = $this->input->get('id');
		$data['employee'] = $this->admin_model->getEmployeeById($employeeId);
		
		$post = $this->input->post();
		if(!empty($post['name'])){

			if(empty($post['password']) && isset($post['password'])){
				unset($post['password']);
			} else {
				$post['password'] = $this->admin_model->hashPassword($post['password']);
			}

			$this->admin_model->updateEmployee($post);
			redirect('/admin/employee?action=1');
		}

		$this->load->view('admin/addEmployee.php', $data);
	}
}

