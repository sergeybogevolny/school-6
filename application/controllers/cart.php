<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model("cart_model");
		$this->load->library('session');
	}



	public function index()
	{
		$cartItems = $this->session->userdata('cart');
		$data['cart'] = $this->mergeCartData($cartItems, $this->cart_model->getCartItemData($cartItems));
		$this->load->view('cart/cart', $data);
	}

	public function mergeCartData($sessionCart, $dbItems)
	{
		if(!empty($dbItems)){
			foreach ($dbItems as $key => $value) {
				$dbItems[$key]->unit = $sessionCart[$dbItems[$key]->item_id];
			}
			return $dbItems;
		}
		return false;
	}

	public function addToCart()
	{
		
		$itemId = (int) $this->input->get('id', true);
		if(!$itemId){
			redirect('/home');
		}

		$cart = $this->session->userdata('cart');
		if(is_array($cart)){
			if(!array_key_exists($itemId, $cart)){
				$cart[$itemId] = 1;
			}
		} else {
			$cart[$itemId] = 1;  
		}
		$this->session->set_userdata('cart', $cart);
		redirect('/cart');
	}

	public function removeFromCart()
	{
		$itemId = (int) $this->input->get('id');
		$cart = $this->session->userdata('cart');
		if(is_array($cart)){
			if(array_key_exists($itemId, $cart)){
				unset($cart[$itemId]);
			}
		}
		$this->session->set_userdata('cart', $cart);
		redirect('/cart');
	}

	public function _isLoggedIn()
	{
		if($this->session->userdata('userId') == false){
			return false;
		}
		return true;
	}

	public function checkOut()
	{
		if(!$this->_isLoggedIn()){
			$this->session->set_userdata('goTo', '/cart/checkOut');
			redirect('/user/login?action=6');
		}


		$cartItems = $this->session->userdata('cart');
		$data['cart'] = $this->mergeCartData($cartItems, $this->cart_model->getCartItemData($cartItems));
		$data['customer'] = $this->cart_model->getCustomer($this->session->userdata('userId'));
		$this->load->view('cart/checkOut', $data);
	}

	public function changeCartItemUnit(){
		$itemId = (int) $this->input->post('id');
		$unit = (int) $this->input->post('unit');
		$jsonResponse = array('status'=>'failed');
		if($itemId && $unit){
			$cart = $this->session->userdata('cart');
			if(isset($cart[$itemId])){
				$cart[$itemId] = $unit;	
				$jsonResponse['status'] = 'ok';
				$this->session->set_userdata('cart', $cart);
			}
		}
		exit(json_encode($jsonResponse)); // respond with json
	}

	public function order()
	{
		if(!$this->_isLoggedIn()){
			$this->session->set_userdata('goTo', '/cart/checkOut');
			redirect('/user/login?action=6');
		}

		$cart = $this->session->userdata('cart');
		$customer = $this->session->userdata('userId');
		$orderId = $this->cart_model->generateOrder($customer, $cart);
		$this->session->set_userdata('cart', false); // empty cart
		redirect('/cart/invoice?id='.$orderId);
	}

	public function invoice()
	{
		$orderId = (int) $this->input->get('id');
		$data['isAdmin'] = $this->input->get('admin');

		if( !$this->_isLoggedIn() && !$data['isAdmin'] ){
			$this->session->set_userdata('goTo', '/cart/invoice?id='.$orderId);
			redirect('/user/login?action=6');
		}
		
		$data['order'] = $this->cart_model->getOrder($orderId);
		$data['customer'] = $this->cart_model->getCustomer($data['order']['order']->user_id);
		$this->load->view('/cart/invoice', $data);
	}
}