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
		$data['cart'] = $this->cart_model->getCartItemData($cartItems);
		$this->load->view('cart/cart', $data);
	}

	public function addToCart()
	{
		
		$itemId = (int) $this->input->get('id', true);
		if(!$itemId){
			redirect('/home');
		}

		$cart = $this->session->userdata('cart');
		if(is_array($cart)){
			if(!in_array($itemId, $cart)){
				$cart[] = $itemId;
			}
		} else {
			$cart = array($itemId);  
		}
		$this->session->set_userdata('cart', $cart);

		if($this->_isLoggedIn()){
			redirect('/cart');
		} else {
			$this->session->set_userdata('goTo', '/cart');
			redirect('/user/login?action=6');
		}

	}

	public function removeFromCart()
	{
		$itemId = (int) $this->input->get('id');
		$cart = $this->session->userdata('cart');
		if(is_array($cart)){
			$key = array_search($itemId, $cart);
			if($key !== false){
				unset($cart[$key]);
			}
		}
		$this->session->set_userdata('cart', $cart);
		redirect('/cart');
	}

	public function _isLoggedIn()
	{
		if($this->session->userdata('userId') == false && $this->session->userdata('userLoggedIn') == false){
			return false;
		}
		return true;
	}



}