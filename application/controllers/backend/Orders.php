<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    	require_once 'assets/convertio-php-master/autoload.php';                      // Comment this line if you use Composer to install the package
		use \Convertio\Convertio;

class Orders extends CI_Controller {

	public function index($offset=0) {
		$data['title'] = 'Template';
        $where = array();
        $where['orders.status != '] = 0;
        if($this->input->get('invoice_id'))
            $where['invoice_id'] = $this->input->get('invoice_id');
        if($this->input->get('status'))
            $where['status'] = $this->input->get('status');
	    $per_page= 100;
        $data['offset']=$offset;
        $data['data'] = $this->crud->readData('orders.*, users.name', 'orders', $where, array('users' => 'orders.user_id = users.user_id'), '', 'order_id DESC')->result();
        $config=backend_pagination();
        $config['base_url'] = base_url().'backend/orders/index';
        $config['total_rows'] = $this->crud->readData('*', 'orders', $where)->num_rows();
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 4;
        if(!empty($_SERVER['QUERY_STRING'])){
         	$config['suffix'] = "?".$_SERVER['QUERY_STRING'];
        }
        else{
         	$config['suffix'] ='';
        }
        $data['total_records'] = $config['total_rows'];
        $config['first_url'] = $config['base_url'].$config['suffix'];
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();  

        $data['template'] = 'backend/orders/index';
		$data['offset'] = $offset;
		$this->load->view('templates/backend/backend_template',$data);
	}

	public function details($order_id = 0) {
		$data['title'] = 'Order Details';
        $data['orders'] = $this->crud->readData('orders.*, name, email, mobile', 'orders', array('order_id' => $order_id), array('users' => 'orders.user_id = users.user_id'))->row_array();
        $data['data'] = $this->crud->readData('*', 'order_details', array('order_id' => $order_id))->result();
		$data['template'] = 'backend/orders/details';
		$this->load->view('templates/backend/backend_template',$data);
	}

    public function create_image() {
        $output_file = 'assets/frontend/plate/tmp.jpg';
        $base64_string = $this->input->post('data');
        // echo json_encode($base64_string);
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' ); 
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        // clean up the file resource
        fclose( $ifp ); 
        echo $output_file;
    }

    public function download($od_id = '') {
		$API = new Convertio("298fffca21c673e5a1e6d7940ef29e02");           // You can obtain API Key here: https://convertio.co/api/
		$plate_name = 'plate_'.date('myds');
        $this->load->helper('download');
        $data = $this->crud->readData('`desc`', 'order_details', array('od_id' => $od_id))->row_array();
        $output_file = "assets/frontend/plate/$plate_name.svg";
        // $base64_string = $data['desc'];
        // echo json_encode($base64_string);
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' ); 
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        // $data = explode( ',', $base64_string );
        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, $data['desc'] );
        // clean up the file resource
        fclose( $ifp ); 
        // echo $output_file;
        /*$imgUrl = $output_file;
        $imagic = new Imagick();
        $imagic->readImage($imgUrl);
        $imagic->setImageFormat('eps');
        $imagic->writeImage('assets/frontend/plate/tmp.eps');*/
        $p = $API->start($output_file, 'eps')->wait()->download("assets/frontend/plate/$plate_name.eps")->delete();
        if($p){
  			echo "Convert";
  		}else{
  			echo "No Convert";
  		}
        force_download("assets/frontend/plate/$plate_name.eps", NULL);
    }

    public function change_status($invoice_id, $status) {
            $this->crud->updateData('orders', array('status' => $status), array('invoice_id' => $invoice_id));
            $this->session->set_flashdata('success_msg', '<div class="callout callout-success"><h4><i class="icon fa fa-check"></i> Success!</h4><p>Status updated successfully.</p></div>');
            redirect($_SERVER['HTTP_REFERER']);
    }
}
