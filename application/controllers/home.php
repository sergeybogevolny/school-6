<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model("home_model");
		$data['list'] = $this->home_model->getHomeList();
		$this->load->view('home', $data);
	}

	public function search()
	{
		$this->load->model("home_model");
		$filters = $this->input->get();
		$data['list'] = $this->home_model->getBooks($filters);
		$this->load->view('search', $data);
	}



}