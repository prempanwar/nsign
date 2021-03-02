<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
	public function __construct(){
		 parent::__construct();
        //$this->load->model('common_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('cart');
    }
	private function _check_login(){
		if(user_logged_in()===FALSE){
			redirect(base_url());
		}
    }
	public function index(){
		$data['about_page'] = $this->crud->readData('*', 'page_templates', array('id' => 3))->row_array();
		$data['street_page'] = $this->crud->readData('*', 'page_templates', array('id' => 2))->row_array();
		$data['title'] = "Home";
		$data['council'] = $this->crud->readData('*', 'council')->result();
		$data['template'] = 'frontend/index';
		$this->load->view('templates/frontend/frontend_template', $data);
	}
	// public function get_council_get() {
	// 		$this->input->get('firstame');
	// 		echo "You have used Get method".$this->input->get('firstame');
	// }
	// public function get_council1_post() {
	// 		$this->input->post('firstame');
	// 		echo "You have used POST method".$this->input->post('firstame');
	// }
	public function get_council() {

		$council_id = $this->input->post('council_id');
		$road_symbol = $this->input->post('road_symbol');
		$street_name = $this->input->post('street_name');
		$street_name_below = $this->input->post('street_name_below');
		$post_code_check = $this->input->post('post_code_check');
		$post_code = $this->input->post('post_code');
		$mount = $this->input->post('mount');
		$leading_to = $this->input->post('leading_to');
		
		// $logo = base_url("assets/backend/uploads/council-logo/logo-3.png");
		$road_symbol_logo = base_url("assets/backend/uploads/council-logo/Road-symbol.png");
		$council = $this->crud->readData('*', 'council', array('council_id' => $council_id))->row_array();
		// p($council);die;
		$result = array(
			'logo' => $council['logo'] ? base_url($council['logo']) : "",
			'logo_position' => $council['logo_position'],
			'road_symbol' => $road_symbol_logo,
			'is_road_symbol' => $road_symbol,
			'street_name' => $street_name,
			'street_name_below' => $street_name_below,
			'zip' => $post_code_check == 1 ? $post_code : '',
			'is_zip' => $council['zipcode'],
			'font' => $council['font'],
			'plateColor' => $council['plate_color'],
			'fontColor' => $council['font_color'],
			'leading_to' => $leading_to
		);

		if($council['border'] == 1 || $council['border'] == '') {		//zigzak
			if($leading_to == 1){
				$html = $this->load->view('frontend/plate/leading_to_1', $result, true);				
			}
			else if($mount == 'wall') {
				$html = $this->load->view('frontend/plate/normal_zig_zag', $result, true);				
			}
			else {
				$html = $this->load->view('frontend/plate/postmount_zig_zag', $result, true);
			}
		}
		if($council['border'] == 2) {		//normal
			if($leading_to == 1){
				$html = $this->load->view('frontend/plate/leading_to_1', $result, true);				
			}
			else if($mount == 'wall') {
				$html = $this->load->view('frontend/plate/normal_rectangal', $result, true);				
			}
			else {
				$html = $this->load->view('frontend/plate/postmount_rectangal', $result, true);
			}
		}
        echo json_encode(array('html' => $html, 'zipcode' => $council['zipcode'], 'price' => $council['price'], 'wall_mount_price' => $council['wall_mount_price'], 'post_mount_price' => $council['post_mount_price']));
	}

	public function about_us(){
		$data['page'] = $this->crud->readData('*', 'page_templates', array('id' => 1))->row_array();
		$data['title'] = "About Us";
		$data['template'] = 'frontend/about-us';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function contact(){
		$data['call_us'] = $this->crud->readData('*', 'page_templates', array('id' => 5))->row_array();
		$data['our_location'] = $this->crud->readData('*', 'page_templates', array('id' => 6))->row_array();
		$data['title'] = "Contact Us";
		$data['template'] = 'frontend/contact';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function login(){
		if(user_logged_in() == true) redirect(base_url('account'));		
		$data['title'] = "login";
		$data['template'] = 'frontend/login';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function terms_condition(){
		$data['page'] = $this->crud->readData('*', 'page_templates', array('id' => 4))->row_array();
		$data['title'] = "Terms and condition";
		$data['template'] = 'frontend/terms_condition';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function forget_password(){
		$error = '';
		if($this->input->post()) {
			$email = $this->input->post('email');
			$check = $this->crud->readData('user_id, council_id', 'users', array('email' => $email))->row_array();
			if($check) {
				$email = base64_encode($check['user_id']);
				$email = str_replace("=", "CC", $email);
				if($check['council_id']) {
					redirect(base_url('reset_password/').$email);
				}
				else {
					//Start Send email
			        $email_data = array(
			            'name'  => $check['name'],
			            'link' => $email
			        );
			        $param = array(
			            'template_id' => '12',
			            'data' => $email_data,
			        );
			        sendEmail($check['email'], $param);
			        //End Send email
			        $this->session->set_flashdata('success', 'Check your email to reset password.');
					redirect(base_url('forget_password'));
				}
			}
			else {
				$error = "This email is is not exist in our database";
			}
		}
		$data['error'] = $error;
		$data['title'] = "Forget Password";
		$data['template'] = 'frontend/forget_password';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function reset_password(){
		if($this->input->post()) {
			$this->load->library('encryption');
			$segment2 = $this->uri->segment(2);
			$user_id = str_replace("CC", "=", $segment2);
			$user_id = base64_decode($user_id);
			$check = $this->crud->readData('user_id, council_id, password', 'users', array('user_id' => $user_id))->row_array();
			if($check) {
				$pass = $this->input->post('new_pass');
				$curr_pass = $this->input->post('curr_pass');
				$data['password'] = $this->encryption->encrypt($pass);
				if($check['council_id']) {
					$this->crud->updateData('users', $data, array('user_id' => $user_id));
					$this->session->set_flashdata('success', 'Password updated successfully.');					
					redirect(base_url('login'));				
				}
				else {
					if($curr_pass == $this->encryption->decrypt($check['password'])) {
						$this->crud->updateData('users', $data, array('user_id' => $user_id));
						$this->session->set_flashdata('success', 'Password updated successfully.');
						redirect(base_url('login'));
					}
					else {
						$this->session->set_flashdata('error', 'Invalid old password.');
						redirect(base_url("reset_password/$segment2"));						
					}
				}
			}
			else {
				$this->session->set_flashdata('error', 'Invalid user.');
				redirect(base_url("reset_password/$segment2"));
			}
		}
		$data['title'] = "Reset Password";
		$data['template'] = 'frontend/reset_password';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function login_submit(){
		$this->load->library('encryption');
		$error = '';
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        	// p($_GET);
        	// echo "hello"; die;
        if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$data = $this->crud->readData('user_id, user_role, name, email, password, discount', 'users', array('email' => $email))->row_array();
			if($data) {
				if($password == $this->encryption->decrypt($data['password'])) {
					$user_data = array(
						'id' 			=> $data['user_id'],
						'user_role' 	=> $data['user_role'],
						'user_name' 	=> $data['name'],
						'email'			=> $data['email'],
						'discount'		=> $data['discount'],
						'logged_in'     => TRUE
					);
					$this->session->unset_userdata('user_info');
					$this->session->set_userdata('user_info',$user_data);
					$this->session->set_flashdata('success', 'Login successfully.');
					echo json_encode(array('status' => 'success', 'message' => 'Login successfully'));
				}
				else {
					echo json_encode(array('status' => 'error', 'message' => 'Invalid password'));
				}
			}
			else {
				echo json_encode(array('status' => 'error', 'message' => 'This email is not exist in out database'));
			}
        }
        else {
        	echo json_encode(array('status' => 'error', 'message' => validation_errors()));
        }
	}

	public function register_submit(){
		$this->load->library('encryption');
		$this->form_validation->set_rules('name', 'Full name', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			unset($data['confirm']);
			$data['password'] = $this->encryption->encrypt($data['password']);
			$this->crud->createData('users', $data);
			//Start Send email
	        $email_data = array(
	            'name'  => $data['name'],
	        );
	        $param = array(
	            'template_id' => '8',
	            'data' => $email_data,
	        );
	        sendEmail($data['email'], $param);
	        //End Send email
			echo json_encode(array('status' => 'success', 'message' => 'Register successfully.'));
        }
        else {
        	echo json_encode(array('status' => 'error', 'message' => validation_errors()));
        }
	}

	public function not_found(){
		$this->output->set_status_header('404');
		$data['title'] = "Demo";
		$data['template'] = 'frontend/404';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function logout() {
		// $this->session->unset_userdata('user_info');
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function cart(){
		$total_qty = $this->cart->total_items();
		$data['delivery_charge'] = $this->crud->readData('price', 'delivery_charge', array('range_from <=' => $total_qty, 'range_to >=' => $total_qty))->row_array();
		// if(user_logged_in() == true) redirect(base_url('account'));
		$data['discount'] = $this->session->userdata('user_info')['discount'];
		$data['title'] = "Cart";
		$data['template'] = 'frontend/cart';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function add_to_cart() {
		$desc = $this->input->post('desc');
		$council = $this->input->post('council');
		$council_name = $this->input->post('council_name');
		$price = $this->input->post('price');
		$text = $this->input->post('text');
		$qty = $this->input->post('qty');
		$discount = 0;


		$product_info = product_info($council);
        /*$commission1 = $product_info['commission'];
        $commission2 = $product_info['commission1'];
        if(strlen($text) > 20) {
            $discount = ($price*$commission2)/100;
        }
        else {
            $discount = ($price*$commission1)/100;
        }*/

		$data = array(
	        'id'       => $council,
	        'qty'      => $qty,
	        'price'    => $price,
	        'name'     => $council_name,
	        'text'     => $text,
	        'discount' => $discount,
	        'options'  => array('desc' => $desc)
		);

		$this->cart->insert($data);
		//$this->session->set_flashdata('success', 'Product added to cart');
		//redirect(base_url('forget_password'));
		echo json_encode(array('status' => 'success', 'message' => 'Product added to cart', 'total' => $this->cart->total_items()));
	}

	public function update_cart() {
		$data = $this->input->post();
		$this->cart->update($data);
		echo json_encode(array('status' => 'success', 'message' => 'Cart updated successfully.'));
	}

	public function remove_cart($row_id) {
		$data = array(
           'rowid' => $row_id,
           'qty'   => 0
        );
		$this->cart->update($data);
		// echo json_encode(array('status' => 'success', 'message' => 'Cart updated successfully.'));
		redirect(base_url('cart'));
	}

	public function checkout() {
		if(!user_logged_in()) {
			redirect(base_url('login'));
		}
		$total_qty = $this->cart->total_items();
		$delivery_charge = $this->crud->readData('price', 'delivery_charge', array('range_from <=' => $total_qty, 'range_to >=' => $total_qty))->row_array();
		$delivery_charge = $delivery_charge['price'];
		$discount = $this->session->userdata('user_info')['discount'];
		$discount = ($this->cart->total() * $discount) / 100;
		$sub_total = $this->cart->total() - $discount;
		$total_with_delivery = $sub_total+$delivery_charge;
		$vat = round(($total_with_delivery * 20) / 100, 2);
		$data['accout_customer_total'] = $sub_total + $vat + $delivery_charge;
		
		if($this->input->post('action_type')==1) {
			$user_id = user_id();
			$sub_total = $this->cart->format_number($this->cart->total());


			$total_qty = $this->cart->total_items();
			$delivery_charge = $this->crud->readData('price', 'delivery_charge', array('range_from <=' => $total_qty, 'range_to >=' => $total_qty))->row_array();
			$delivery_charge = $delivery_charge['price'];
			$discount = $this->session->userdata('user_info')['discount'];
			$discount = ($this->cart->total() * $discount) / 100;
			$sub_total = $this->cart->total() - $discount;
			$new_subtotal = $sub_total+$delivery_charge;
			$vat = round(($new_subtotal * 20) / 100, 2);
			$total = $sub_total + $vat + $delivery_charge;

			$invoice_id = "ORD".rand(11111111,99999999);
			$data = $this->input->post();
			$item = $this->cart->contents();
			$order = $data['order'];
			$order['invoice_id'] = $invoice_id;
			$order['user_id'] = $user_id;
			$order['sub_total'] = $sub_total;
			$order['discount'] = $discount;
			$order['delivery_charge'] = $delivery_charge;
			$order['vat'] = $vat;
			$order['total'] = $total;
			// print_r($order);


			// $order['total'] = $sub_total;
			// $order['status'] = 1;
			$order_details = array();
			$order_id = $this->crud->createData('orders', $order);
			$commission = 0;
			foreach ($item as $row) {
				$desc = $row['options']['desc'];
				unset($row['options']);
				$row['desc'] = $desc;
				$row['order_id'] = $order_id['insert_id'];

                /*$row['discount'] = $row['discount'] * $row['qty'];
                $commission += $row['discount'];*/


				$this->cart->update($data);
				$row_ids[] = array('rowid'=>$row['rowid'],'qty'=>0);
				unset($row['rowid']);
				unset($row['text']);
				$order_details[] = $row;
			}
			$this->crud->createData('order_details', $order_details);
			$this->cart->update($row_ids);

			// $this->crud->updateData('orders', array('discount' => $commission, 'total' => $total, 'delivery_charge' => $delivery_charge), array('order_id' => $order_id['insert_id']));
			// print_r($order_details);
			// die('rr');
			// $this->cart->destroy();
			// die();

			$this->session->set_userdata('invoice_id', $invoice_id);
			$formData['amount'] = $total;
			$formData['hash'] = createHash($total);
			$this->load->view('frontend/payment_form', $formData);

			// redirect(base_url('success'));
		}    
		if($this->input->post('action_type')==2) {   
			$user_id = user_id();
			$sub_total = $this->cart->format_number($this->cart->total());

			$total_qty = $this->cart->total_items();
			$delivery_charge = $this->crud->readData('price', 'delivery_charge', array('range_from <=' => $total_qty, 'range_to >=' => $total_qty))->row_array();
			$delivery_charge = $delivery_charge['price'];
			$discount = $this->session->userdata('user_info')['discount'];
			$discount = ($this->cart->total() * $discount) / 100;
			$sub_total = $this->cart->total() - $discount;
			$new_subtotal = $sub_total+$delivery_charge;
			$vat = round(($new_subtotal * 20) / 100, 2); 
			$total = $sub_total + $vat + $delivery_charge;

			$invoice_id = $this->input->post('order_id');
			$data = $this->input->post();
			//p($data).'########################';
			$item = $this->cart->contents();
			$order = $data['order'];
			//p($order); die;
			$order['invoice_id'] = $invoice_id;
			$order['user_id'] = $user_id;
			$order['sub_total'] = $sub_total;
			$order['discount'] = $discount;
			$order['delivery_charge'] = $delivery_charge;
			$order['vat'] = $vat;
			$order['total'] = $total;
			$order['status'] = 1;
			$order_details = array();
			$order_id = $this->crud->createData('orders', $order);
			$commission = 0;
			foreach ($item as $row) {
				$desc = $row['options']['desc'];
				unset($row['options']);
				$row['desc'] = $desc;
				$row['order_id'] = $order_id['insert_id'];
				$row_ids[] = array('rowid'=>$row['rowid'],'qty'=>0);
				unset($row['rowid']);
				unset($row['text']);
				$order_details[] = $row;
			}
			$this->crud->createData('order_details', $order_details);
			$this->cart->update($row_ids);
			$this->session->set_userdata('invoice_id', $invoice_id);
			$formData['amount'] = $total;
			$formData['hash'] = createHash($total);
			// echo "Hello=="; p($order_details); die;
			$this->session->set_flashdata('success', 'Product added to cart');
			redirect(base_url('account/order_history'));
			// $this->load->view('frontend/payment_form', $formData); 
		}
		$data['countries'] = $this->crud->readData('*', 'countries')->result();
		$data['states'] = $this->crud->readData('*', 'states',array('country_id'=>230))->result();
		$data['title'] = "Checkout";
		$data['template'] = 'frontend/checkout';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function success($invoice_id = '') {
		if($this->input->post()) {
			$response = $this->input->post();
			$invoice_id = $this->session->userdata('invoice_id');
			$data = array(
				'payment_amt' => $response['chargetotal'],
				'payment_status' => $response['status'],
				'txn_id' => $response['ipgTransactionId'],
				'payment_data' => json_encode($response)
			);
			if($response['status'] == 'APPROVED')
				$data['status'] = 1;
			$this->crud->updateData('orders', $data, array('invoice_id' => $invoice_id));
			$this->session->unset_userdata('invoice_id');
			$user_details = user_details();
			//Start Send email
	        $email_data = array(
	            'name'  => $user_details['user_name'],
	            // 'email' => $data['email'],
	            // 'link' => base_url('login')
	        );
	        $param = array(
	            'template_id' => '14',
	            'data' => $email_data,
	        );
	        sendEmail($user_details['email'], $param);
	        //End Send email
			redirect(base_url("success/$invoice_id"));
		}
		$data['order'] = $this->crud->readData('invoice_id, payment_amt, payment_status', 'orders', array('invoice_id' => $invoice_id))->row_array();
		if(empty($data['order'])) redirect(base_url());
		$data['title'] = "Success";
		$data['template'] = 'frontend/success';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function failure($invoice_id = '') {
		if($this->input->post()) {
			$response = $this->input->post();
			$invoice_id = $this->session->userdata('invoice_id');
			$data = array(
				'payment_amt' => $response['chargetotal'],
				'payment_status' => $response['status'],
				'txn_id' => $response['ipgTransactionId'],
				'payment_data' => json_encode($response)
			);
			$this->crud->updateData('orders', $data, array('invoice_id' => $invoice_id));
			redirect(base_url("failure/$invoice_id"));
		}
		$data['order'] = $this->crud->readData('invoice_id, payment_amt, payment_status', 'orders', array('invoice_id' => $invoice_id))->row_array();
		if(empty($data['order'])) redirect(base_url());
		$data['invoice_id'] = $invoice_id;
		$data['title'] = "Payment Failure";
		$data['template'] = 'frontend/failure';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function try_again($invoice_id = '') {
		$order = $this->crud->readData('invoice_id, total', 'orders', array('invoice_id' => $invoice_id))->row_array();
		if(empty($order)) redirect(base_url());
		$total = $order['total'];
		$formData['amount'] = $total;
		$formData['hash'] = createHash($total);
		$this->load->view('frontend/payment_form', $formData);
	}

	public function ipn() {
		$response = $_REQUEST;
		$this->crud->createData('txn_temp_data', array('data' => json_encode($response)));
	}

	public function state($country_id) {
		$states = $this->crud->readData('*', 'states', array('country_id' => $country_id))->result();
		$html = '<option value="">Select State</option>';
		foreach ($states as $row) {
            $html .= '<option>'.ucfirst($row->name).'</option>';
        }
        echo $html;
	}

	public function test() {
		$council = $this->crud->readData('*', 'council')->result();
		echo "<pre>";
		print_r($council);
		foreach ($council as $row) {
			$users = array(
				'user_role' => 0,
				'name' => $row->name,
				'email' => strtolower(str_replace(" ", "_", $row->name)).'@nsign.co',
				'password' => 'fd83262629e6fdca177d4ff43aa513459b89ac851c7ce65a7e1bdc483c0b96980b81968eaf219246920f9c028701423038733ec5d63a127c7c80bf4c5303f346Amh20LLiDFlutdUA02oh1qWxcFm9t145xbHiFzniqfM=',
				'discount' => '',
				'council_id' => $row->council_id
			);
			print_r($users);
		}
		die('rr');
		$imgUrl = 'assets/banner.jpg';
	    $imagic = new Imagick();
	    $imagic->readImage($imgUrl);
	    $imagic->setImageFormat('eps');
	    $imagic->writeImage('assets/simfcs.eps');
	}

	public function mail() {
		$user_details = user_details();
		print_r($user_details);
		//Start Send email
        $email_data = array(
            'name'  => $user_details['user_name'],
            // 'email' => $data['email'],
            'link' => base_url('login')
        );
        $param = array(
            'template_id' => '12',
            'data' => $email_data,
        );
        sendEmail($user_details['email'], $param);
        //End Send email
		die('rr');
	}



} 