<?php
	class Users extends CI_Controller
	{
		 public function __construct() {
 
       parent:: __construct();
			 // load Pagination library
        $this->load->library('pagination');
         
        // load URL helper
        $this->load->helper('url');
		
		
 
   }
		public function index()
		{
			//die('fghsd');
		}
		
		
		public function dashboard(){
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			
			$data['title'] = 'Dashboard';
			$this->load->view('templates/header',$data);
			$this->load->view('users/dashboard', $data);
			$this->load->view('templates/footer');
		}

		// Register User
		public function register(){
			if($this->session->userdata('login')) {
				redirect('posts');
			}

			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{
				//Encrypt Password
				$encrypt_password = md5($this->input->post('password'));

				$this->User_Model->register($encrypt_password);

				//Set Message
				$this->session->set_flashdata('user_registered', 'You are registered and can log in.');
				redirect('posts');
			}
		}

		// Log in User
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{
				// get username and Encrypt Password
				$username = $this->input->post('username');
				$encrypt_password = md5($this->input->post('password'));

				$user_id = $this->User_Model->login($username, $encrypt_password);
				
				if ($user_id) {
					//Create Session
					$user_data = array(
								'user_id' => $user_id->id,
				 				'username' => $username,
				 				'email' => $user_id->email,
				 				'login' => true
				 	);

				 	$this->session->set_userdata($user_data);

					//Set Message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in.');
					redirect('users/dashboard');
				}else{
					$this->session->set_flashdata('login_failed', 'Login is invalid.');
					redirect('users/login');
				}
				
			}
		}

		// log user out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			//Set Message
			$this->session->set_flashdata('user_loggedout', 'You are logged out.');
			redirect(base_url());
		}

		// Check user name exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}


		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}
		
		//Frontend Products
		public function products()
		{
			//echo "<pre/>";
			$data['category'] = $this->uri->segment(3);
			$products = $this->User_Model->get_productsbyCategoryname($data['category']);
				//print_R($products);die;
			
			/* Pagination */
				$config['base_url'] = base_url() . "users/products/".$data['category'];
				$config['total_rows'] = count($products);
				$config['per_page'] = 12;
				
				/* $config['first_tag_open'] = '<li class="firstlink">';
$config['first_tag_close'] = '</li>';
  
$config['last_tag_open'] = '<li class="lastlink">';
$config['last_tag_close'] = '</li>';
  
$config['next_tag_open'] = '<li class="nextlink">';
$config['next_tag_close'] = '</li>';
  
$config['prev_tag_open'] = '<li class="prevlink">';
$config['prev_tag_close'] = '</li>'; */
				
				
				$this->pagination->initialize($config);
				$page =($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
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
			$this->load->view('frontend_products/products_view', $data);
			$this->load->view('templates/footer');
		}
		
		
		//Frontend SubCategory Products
		public function subcategory()
		{
			$data['category'] = $this->uri->segment(3);
			$data['subcategory'] = $this->uri->segment(4);
			$products = $this->User_Model->get_productsBySubCategoryByCategoryname($data['category'], $data['subcategory']);
			
			/* Pagination */
				$config['base_url'] = base_url() . "users/subcategory/".$data['category']."/".$data['subcategory'];
				$config['total_rows'] = count($products);
				$config['per_page'] = 12;
				$this->pagination->initialize($config);
				$page =($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
				$data["links"] = $this->pagination->create_links(); 
			/* Pagination ends*/
			
			  
			$data['products'] = $this->User_Model->get_productsBySubCategoryByCategoryname($data['category'], $data['subcategory'], $config["per_page"],$page);
			if($data['products']){
			$data['title'] = $data['subcategory'] .' - Eyelooks';
			}
			else{
			$data['title'] = 'Eyelooks';
			}
			$this->load->view('templates/header',$data);
			$this->load->view('frontend_products/products_view', $data);
			$this->load->view('templates/footer');
		}
		
		
		
		
		public function lenses()
		{
			$data['category'] = "Contact Lenses";
			$data['subcategory'] = $this->uri->segment(3);
			$products = $this->User_Model->get_lensesProducts($data['category'], $data['subcategory']);
			/* Pagination */
				$config['base_url'] = base_url() . "users/lenses";
				$config['total_rows'] = count($products);
				$config['per_page'] = 3;
				$this->pagination->initialize($config);
				$page =($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
				$data["links"] = $this->pagination->create_links(); 
			/* Pagination ends*/
			
			
			$data['products'] = $this->User_Model->get_lensesProducts($data['category'], $data['subcategory'], $config["per_page"],$page);
			if($data['products']){
			$data['title'] = $data['subcategory'] .' Lenses - Eyelooks';
			}
			else{
			$data['title'] = 'Eyelooks';
			}
			$this->load->view('templates/header',$data);
			$this->load->view('frontend_products/products_view', $data);
			$this->load->view('templates/footer');
		}
		
		
		
		
		//Try On Face
		public function tryOnFace()
		{
			echo "<pre/>";
			$id = $this->input->get('product');
			$data['products'] = $this->User_Model->get_productbyid($id);
			
			//print_r($data['products']);die;
			
			$data['related_products'] = $this->User_Model->get_relatedproducts($data['products'][0]['cat_id'], $id);
			//print_R($data['related_products']);die;
			
			$data['image'] = base_url('assets/images/products/'.$data['products'][0]['image']);
			$this->load->view('users/tryonface', $data);
			
		}
		
		
		//Sorting
		public function sorting()
		{
			$data['category'] = $this->input->post('categoryid');
			$orderby = $this->input->post('orderby');
			
			
			$data['products'] = $this->User_Model->sorting($data['category'] , $orderby);
			
			if($data['products']){
			$data['title'] = $data['category'] . ' - Eyelooks';
			}
			else{
			$data['title'] = 'Eyelooks';
			}
			
			$this->load->view('templates/header',$data);
			$this->load->view('frontend_products/products_view', $data);
			$this->load->view('templates/footer');
		}
		
		
		
		
		
		//Search
		public function search()
		{
			$data['category'] = $this->input->post('categoryid');
			$search = $this->input->post('s');
			
			$data['products'] = $this->User_Model->search($search);
			
			if($data['products']){
			$data['title'] = $data['category'] . ' - Eyelooks';
			}
			else{
			$data['title'] = 'Eyelooks';
			}
			
			$this->load->view('templates/header',$data);
			$this->load->view('frontend_products/products_view', $data);
			$this->load->view('templates/footer');
		}
		
		
		//Filter By price
		public function filter_price()
		{
		//	echo "<pre/>";
			$data['category'] = $this->input->post('categoryid');
			
			$amount = $this->input->post('amount');
			if($amount){
			$amt = explode('-',$amount);
			
			$min_price = $amt[0];
			$max_price = $amt[1];
			/* $max_price = preg_replace("/[^0-9]/", '', $amt[1]); */
			
			$data['products'] = $this->User_Model->filter_price($data['category'] , $max_price, $min_price);
			}
			else{
			$data['products'] = $this->User_Model->get_productsbyCategoryname($data['category']);	
			}
			
			if($data['products']){
			$data['title'] = $data['category'] . ' - Eyelooks';
			}
			else{
			$data['title'] = 'Eyelooks';
			}
			
			$this->load->view('templates/header',$data);
			$this->load->view('frontend_products/products_view', $data);
			$this->load->view('templates/footer');
		}
		
		
		
		function popup_form()
		{
			$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'xxx',
    'smtp_pass' => 'xxx',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
$this->load->library('email', $config);
$this->email->set_newline("\r\n");

			$name = $this->input->post('popup_name');
			$email = $this->input->post('popup_email');
			$phone = $this->input->post('popup_phone');
			$message = $this->input->post('popup_msg');
			
			$user_data = $this->User_Model->send_mail_to_admin();
			
			//echo $user_data->email;
			
			$this->email->from($email, $name);
			$this->email->to('priyankasingh.spright@gmail.com');
			/* $this->email->cc('another@another-example.com');
			$this->email->bcc('them@their-example.com'); */

			$this->email->subject('Eyelooks');
			$this->email->message($message);

			$this->email->send();
			
			redirect(base_url());
		}
		
		
		
	}