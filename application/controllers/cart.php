<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends CI_Controller {

	public function index()
	{
		$this->load->model("cart_model");
		$data['list'] = $this->home_model->getHomeList();
		$this->load->view('cart/cart', $data);
	}

	public function addToCart()
	{
		$this->load->model("cart_model");
		$itemId = $this->input->get('id');
		exit($itemId);
	}



}