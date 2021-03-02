<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('common_helper');
        $this->load->library('session');
		// $this->load->library('excel'); //load our new PHPExcel library
        $this->load->model('site_model');
		//$this->load->helper('tests');
    }


	public function index()
	{
		$this->load->view('backend/index');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query = $this->db->query("select * from `user` where `username` = '$username' AND `password` = '$password'");
		if($query->num_rows() > 0)
		{
			$result = $query->row_array();
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('u_id', $result['u_id']);

			redirect('backend/admin/dashboard');
		}
		else
		{
			$_SESSION['err_ind'] = "Invalid username or password";
			redirect('backend');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('backend');
	}

	public function dashboard() {
		// _is_admin_logged_in();
		$data['total_counsil'] = $this->crud->readData('*', 'council')->num_rows();
		$data['week_orders'] = $this->crud->orders_get_days($days=7);
		// print_r($data['week_orders'] );die;
		$data['month_orders'] = $this->crud->orders_get_days($days=30);
		$data['template'] = 'backend/home';
		$this->load->view('templates/backend/backend_template', $data);
	}

	public function council() {
		// _is_admin_logged_in();
		$data['council'] = $this->crud->readData('*', 'council')->result();
		$data['template'] = 'backend/council';
		$this->load->view('templates/backend/backend_template', $data);
	}

	public function edit_council($council_id) {
		// _is_admin_logged_in();
		if($this->input->post()) {
			$data = $this->input->post();
			// p($data); die;
			$discount = $data['discount'];
			unset($data['discount']);

			if($_FILES["file"]["name"]) {
				$config['upload_path'] = './assets/backend/uploads/council-logo/';
				$config['allowed_types'] = 'png|jpg|jpeg';	
				$this->load->library('upload', $config);
				// $this->upload->set_allowed_types('*');
				// $image = $_FILES["file"]["name"];
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error_msg', '<div class="callout callout-success"><p>'.$error.'</p></div>');
                }
                else {
                    $upload_data = $this->upload->data();
                    $data['logo'] = "assets/backend/uploads/council-logo/".$upload_data['file_name'];
                    $this->crud->updateData('council', $data, array('council_id' => $council_id));
                    $this->crud->updateData('users', array('discount' => $discount), array('council_id' => $council_id));
					$this->session->set_flashdata('success_msg', '<div class="callout callout-success"><h4><i class="icon fa fa-check"></i> Success!</h4><p>Council updated successfully.</p></div>');
		            redirect('backend/admin/council');
                }
			}
			else {
				$this->crud->updateData('council', $data, array('council_id' => $council_id));
                $this->crud->updateData('users', array('discount' => $discount), array('council_id' => $council_id));
				$this->session->set_flashdata('success_msg', '<div class="callout callout-success"><h4><i class="icon fa fa-check"></i> Success!</h4><p>Council updated successfully.</p></div>');
	            redirect('backend/admin/council');				
			}

		}
		$data['council'] = $this->crud->readData('*', 'council', array('council_id' => $council_id))->row_array();
		$data['discount'] = $this->crud->readData('discount', 'users', array('council_id' => $data['council']['council_id']))->row_array();
		$data['template'] = 'backend/edit_council';
		$this->load->view('templates/backend/backend_template', $data);
	}

	public function favorite_users() {
		// _is_admin_logged_in();
		$data['users'] = $this->crud->readData('*', 'users', array('user_role' => 0, 'council_id' => 0))->result();
		$data['template'] = 'backend/favorite_users/index';
		$this->load->view('templates/backend/backend_template', $data);
	}

	public function edit_favorite_users($user_id) {
		// _is_admin_logged_in();
		if($this->input->post()) {
			$data = $this->input->post();
			
			$this->crud->updateData('users', $data, array('user_id' => $user_id));
			$this->session->set_flashdata('success_msg', '<div class="callout callout-success"><h4><i class="icon fa fa-check"></i> Success!</h4><p>Favorite user updated successfully.</p></div>');
            redirect('backend/admin/favorite_users');

		}
		$data['user'] = $this->crud->readData('*', 'users', array('user_id' => $user_id))->row_array();
		$data['template'] = 'backend/favorite_users/edit';
		$this->load->view('templates/backend/backend_template', $data);
	}

	public function image_store() {
		// $file = fopen('assets/SNP.csv',"r");
		// echo "<pre>";
		// $i = 0;
		// $array = array();
		// while(! feof($file)) {
		//   	$data = fgetcsv($file);
		//   	if($i > 0){
		//   		if($data[0])
		// 	  		$array[] = array('name' => trim($data[0]));
		//   		// $file[0]."<br>";
		//   	}
		//   	$i++;
		// }
		// $this->crud->createData('council', $array);
		// print_r($array);

		// fclose($file);
		// die();
		$config['upload_path'] = './assets/backend/council/';	
		$config['allowed_types'] = '*';	
		$this->load->library('upload', $config);
		$this->upload->set_allowed_types('*');
		$image = $_FILES["file"]["name"];
		$this->upload->initialize($config);
		$this->upload->do_upload('file');
		$img = $this->upload->data();
		$img_url = base_url()."/assets/backend/council/".$image;

		$this->db->insert(' council',array('name'=>$_POST['name'], 'image' => $img_url));		
		$_SESSION['council'] = "Successfully added";

		$this->session->set_flashdata('success_msg', '<div class="callout callout-success"><h4><i class="icon fa fa-check"></i> Thankyou!</h4><p>Your details have been added successfully.</p></div>');
            redirect('backend/admin/council');
	}

	public function delete_council() {
		// _is_admin_logged_in();
		$where = $this->input->get();
		$this->site_model->deleteRecords('council', $where);
		$this->session->set_flashdata('success_msg', '<div class="callout callout-danger"><h4><i class="icon fa fa-check"></i> Success!</h4><p>User data deleted successfully.</p></div>');
		redirect('backend/backend/council');
	}
	public function get_info()
	{
		$table = $this->input->post('table');
		$where = $this->input->post('where');
		$result = $this->site_model->getRecord($table, $where);
		echo json_encode($result);
	}

	public function update_info()
	{
		$table = $this->input->post('table');
		$where = $this->input->post('where');
		// parse_str($where, $where);
		$data = $this->input->post('data');
		parse_str($data, $data);
		$result = $this->site_model->updateRecords($table, $data, $where);
		$this->session->set_flashdata('success_msg', '<div class="callout callout-success"><h4><i class="icon fa fa-check"></i> Success!</h4><p>User data have been updated successfully.</p></div>');
		echo json_encode($data);
	}

	public function delete()
	{
		// _is_admin_logged_in();
		$where = $this->input->post('where');
		$table = $this->input->post('table');
		$res = $this->site_model->deleteRecords($table, $where);
		$this->session->set_flashdata('success_msg', '<div class="callout callout-danger"><h4><i class="icon fa fa-check"></i> Success!</h4><p>User data have been deleted successfully.</p></div>');
		echo json_encode($res);
	}
	
	public function get_record()
	{
		$table = $this->input->post('table');
		parse_str($this->input->post('where'), $where);
		// $where = array('b_id'=>20);
		$result = $this->site_model->getRecord($table, $where);
		echo json_encode($result);
	}

	public function update_record()
	{
		$table = $this->input->post('table');
		parse_str($this->input->post('where'), $where);
		parse_str($this->input->post('data'), $data);
		$this->site_model->updateRecords($table, $data, $where);
		echo json_encode($data);
	}


	public function optionsettings(){ 
		// _is_admin_logged_in();
        $options_data = $this->crud->readData('*', 'options',array('status'=>1))->result();

        foreach ($options_data as $row) {
            $this->form_validation->set_rules("".$row->option_name."","".$row->option_name."",'trim|required');
        }

        $config = backend_pagination();
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            foreach ($options_data as $row){ 
                $post_data=array('option_value' =>trim($_POST[$row->option_name]));
                $this->crud->updateData('options',$post_data,array('option_name'=>$row->option_name));
            }
            $this->session->set_flashdata('success_msg', '<div class="callout callout-success"><h4><i class="icon fa fa-check"></i> Success!</h4><p>Option Settings updated successfully.</p></div>');
            redirect('backend/admin/optionsettings');
        }

        $data['options'] =  $options_data;
        $data['template'] = 'backend/options';
        $this->load->view('templates/backend/backend_template' , $data);
    }


	public function delivery_charge(){ 
		// _is_admin_logged_in();
        $data = $this->crud->readData('*', 'delivery_charge', array('status'=>1))->result();

        if($this->input->post()) {
    		$post_data = $this->input->post('data');
            foreach ($post_data as $key => $row){ 
            	$where = array(
            		'dc_id' => $key
            	);
                $this->crud->updateData('delivery_charge', $row, $where);
            }
            $this->session->set_flashdata('success_msg', '<div class="callout callout-success"><h4><i class="icon fa fa-check"></i> Success!</h4><p>Delivery Charge updated successfully.</p></div>');
            redirect('backend/admin/delivery_charge');
        }

        $data['data'] =  $data;
        $data['template'] = 'backend/delivery_charge';
        $this->load->view('templates/backend/backend_template' , $data);
    }


	
}
