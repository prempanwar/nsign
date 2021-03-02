<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
Class Destination_category Extends CI_Controller{
	public function __construct(){ 
		parent::__construct(); 
		$this->load->model('superadmin_model');
		$this->load->model('user_model');
		if (superadmin_logged_in() === FALSE) redirect('behindthescreen'); 
	} 
	public function index()
	{

		$data['title'] = 'Destination Category';
		if(!empty($this->input->post('influeTypeSubmit'))){
			$this->form_validation->set_rules('type', 'Type', 'required'); 
			$this->form_validation->set_rules('order_by', 'Order By', 'required');
			if ($this->form_validation->run() == TRUE){ 
				$influencer["name"] = $this->input->post("type");
				$influencer["order_by"] = $this->input->post("order_by");
				$influencer["created"] = date('Y-m-d H:i:s');
				
				if(!empty($this->user_model->insert("fh_destination_category",$influencer)))
				{
					 $this->session->set_flashdata('msg_success','Destination category added succsessfully');
					  redirect('backend/destination_category');
				}
				else
				{
					$this->session->set_flashdata('msg_error','Something went wrong! Please try again');
				}
			}
		}

      	if($this->input->post('type_action') == 2){     
          $this->form_validation->set_rules('type[]', 'Type', 'required'); 
		  $this->form_validation->set_rules('order_by[]', 'Order By', 'required');
		  if($this->form_validation->run() == TRUE){  
           for ($i=0; $i < count($_POST['main_id']); $i++) {          
                $category_data['name'] = $_POST['type'][$i];              
                $category_data['order_by'] = $_POST['order_by'][$i];   
                $this->superadmin_model->update('fh_destination_category',$category_data,array('destination_category_id'=>$_POST['main_id'][$i]));
            }
            $this->session->set_flashdata('msg_success','Destination category updated successfully.');
            redirect('backend/destination_category');
          }
        }
		
		$data["typeData"] = $this->user_model->get_result_order_by("fh_destination_category");
		//echo "<pre>";print_r($data["placesTypeData"]);die;
		$data['template']	= 'backend/favDestination/destination_category';
        $this->load->view('templates/superadmin_template',$data);
	}

	public function change_approve($id="",$approved_by_admin="",$offset=""){
	    $data[]='';
	    $data=array('status'=>$approved_by_admin);
	    if($this->superadmin_model->update('fh_destination_category',$data,array('destination_category_id'=>$id)))    
	    {
	    	$this->session->set_flashdata('msg_success','Status has been changed successfully');
	    }
	    	redirect($_SERVER['HTTP_REFERER']);
	}

	function multi_status_update()
	{
		$status  = $this->input->post('status');
		$ids     = $this->input->post('row_id');
		$table   = $this->input->post('table_name');
		$item_id  = $this->input->post('item_id');
		
		$status   = $this->common_model->change_publish_status($table,$item_id,$ids,$status);
		if(!empty($status)){
			$this->session->set_flashdata('msg_success','Status Changed succsessfully');
		}
			$default_arr=array('status'=>TRUE);
    }
}