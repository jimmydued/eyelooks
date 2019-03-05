<?php 
	class Pages extends CI_Controller{

		public function view($page = 'home'){
			
			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}
			//$data['title'] = ucfirst($page);
			
			$this->load->model('user_model');
		
			$data['category'] = "Men";
			$products = $this->User_Model->get_productsbyCategoryname($data['category']);
			
			
			/* Pagination */
				$config['base_url'] = base_url() . "users/products/".$data['category'];
				$config['total_rows'] = count($products);
				$config['per_page'] = 12;
				$this->pagination->initialize($config);
				$page =($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				$data["links"] = $this->pagination->create_links(); 
			/* Pagination ends*/
			
			$data['products'] = $this->User_Model->get_productsbyCategoryname($data['category'], $config["per_page"],$page);
			
			if($data['products']){
			$data['title'] = $data['category'] .' - Eyelooks';
			}
			else{
			$data['title'] = 'Eyelooks';
			}
			
			$this->load->view('templates/header',$data);
			//$this->load->view('pages/'.$page, $data);
			$this->load->view('frontend_products/products_view', $data);
			$this->load->view('templates/footer');
		}
	}
	