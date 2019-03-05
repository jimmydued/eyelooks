<?php
	class Mens extends CI_Controller
	{
		
		

		public function index()
		{
			$this->load->model('user_model');
			
			$data['title'] = 'Mens Product';
			$data['mens_product'] = $this->user_model->get_productsbyid(8);
			//$data['mens_category'] = $this->user_model->get_subcategorybyid(8);
			$this->load->view('templates/header');
			$this->load->view('mens/mens_view', $data);
			$this->load->view('templates/footer');
		}

		
	}