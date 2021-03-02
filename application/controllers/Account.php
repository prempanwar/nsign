<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {



	public function __construct(){

        parent::__construct();
        //$this->load->model('common_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('cart');
        if(user_logged_in()===FALSE){
			redirect(base_url());
		}
    }


	public function index(){
		$user_id = user_id();
		if($this->input->post()) {
			$data = $this->input->post();
            $check = $this->crud->readData('user_id', 'users', array('email' => $data['email']))->row_array();
            $old_data = $this->crud->readData('email', 'users', array('user_id' => $user_id))->row_array();
            $error = '';
            if($check) {
                if($check['user_id'] != $user_id) {
                    $error = '1';
                }
            }
            if(empty($error)) {
                if($this->crud->updateData('users', $data, array('user_id' => $user_id, 'user_role' => 0))) {
                    $user_info = $this->session->userdata('user_info');
                    $user_info['user_name'] = $data['name'];
                    $user_info['email'] = $data['email'];
                    $name = ucfirst(explode(" ", $data['name'])[0]);
                    $this->session->set_userdata('user_info', $user_info);
                    echo json_encode(array('status' => 'success', 'message' => 'Profile updated successfully.', 'name' => $name));
                }
                else {
                    echo json_encode(array('status' => 'error', 'message' => 'Something went wrong, please try again.'));
                }
            }
            else {
                echo json_encode(array('status' => 'error', 'message' => 'Email already exist'));
            }
			exit;
		}
		$data['data'] = $this->crud->readData('*', 'users', array('user_id' => $user_id))->row_array();
		$data['title'] = "Home";
		$data['council'] = $this->crud->readData('*', 'council')->result();
		$data['template'] = 'frontend/account/dashboard';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function order_history(){
		$user_id = user_id();
		$data['data'] = $this->crud->readData('*', 'orders', array('user_id' => $user_id, 'status != ' => 0), '', '', 'order_id DESC')->result();
		// echo "<pre>";p($data['data']);die;
		$data['title'] = "Order History";
		$data['template'] = 'frontend/account/order_history';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function order_details($invoice_id = ''){
		$user_id = user_id();
		$data['data'] = $this->crud->readData('*', 'orders', array('user_id' => $user_id, 'invoice_id' => $invoice_id), '', '', 'order_id DESC')->row_array();
		if(empty($data['data'])) redirect(base_url('account/order_history'));
		$data['details'] = $this->crud->readData('*', 'order_details', array('order_id' => $data['data']['order_id']))->result();
		// echo "<pre>";
		// p($data['data']);
		// echo "<pre>";
		// p($data['details']); die;
		$data['title'] = "Order Details";
		$data['template'] = 'frontend/account/order_details';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function cancel_order($invoice_id = ''){
		$user_id = user_id();
		//$this->crud->updateData('orders', array('status' => 4), array('user_id' => $user_id, 'invoice_id' => $invoice_id));
		$this->crud->deleteData('orders', array('user_id' => $user_id, 'invoice_id' => $invoice_id));
		$this->session->set_flashdata('success', 'Order cancelled successfully');
		redirect(base_url('account/order_history'));
	}

	public function change_password(){
		if($this->input->post()) {
	        $this->load->library('encryption');
	        $user_id = user_id();
			$this->form_validation->set_rules('old_password','Old Password','required');
	        $this->form_validation->set_rules('password','Password','required|trim|min_length[6]|max_length[15]');
	        $this->form_validation->set_rules('con_pass','Confirm Password','trim|required|matches[password]');
	        if($this->form_validation->run() === TRUE){
	            $old_password = $this->input->post('old_password');
	            $password = $this->input->post('password');
	            $password = $this->encryption->encrypt($password);
	            $check = $this->crud->readData('password', 'users', array('user_id' => $user_id, 'user_role' => 0))->row_array();
	            if($old_password == $this->encryption->decrypt($check['password'])) {
	                if($this->crud->updateData('users', array('password' => $password), array('user_id' => $user_id, 'user_role' => 0))) {
	                    echo json_encode(array('status' => 'success', 'message' => 'Password updated successfully.'));
	                }
	                else {
	                    echo json_encode(array('status' => 'error', 'message' => 'Something went wrong, please try again.'));
	                }
	            }
	            else {
	                echo json_encode(array('status' => 'error', 'message' => 'Incorrect Old Password'));
	            }
	        }
	        else {
	            echo json_encode(array('status' => 'error', 'message' => validation_errors()));
	        }
	        exit;
		}
		$data['title'] = "Change Password";
		$data['template'] = 'frontend/account/change_password';
		$this->load->view('templates/frontend/frontend_template', $data);
	}

	public function logout() {
		// $this->session->unset_userdata('user_info');
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function order_invoice($invoice_id=''){
		include_once(APPPATH."libraries/mpdf/mpdf.php"); 
		$user_id = user_id();
		if(!empty($invoice_id)){
			$data['order_data'] = $this->crud->readData('*', 'orders', array('user_id' => $user_id,'invoice_id' => $invoice_id, 'status != ' => 0))->row_array();
			$data['order_details'] = $this->crud->readData('*', 'order_details', array('order_id' => $data['order_data']['order_id']))->result_array();
			$data['users'] = $this->crud->readData('*', 'users', array('user_id' => $data['order_data']['user_id']))->row_array();

	        $file=$this->load->view('frontend/account/order_invoice', $data, true);
		// p($file); die;
	        $pdfFilePath = $data['order_data']['invoice_id']."_".date("mds").".pdf";
	 	    $mpdf=new mPDF();
			$mpdf->WriteHTML($file);
			$mpdf->Output($pdfFilePath, "D"); 
			redirect('account/order_history');
		}
	}


} 