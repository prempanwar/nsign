<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index($offset=0) {
		$data['title'] = 'Template';
	    //$data['news'] = $this->crud->readData('*', 'page_templates')->result();
	    $per_page= 25;
        $data['offset']=$offset;
        $data['news'] = $this->crud->readData('*', 'page_templates')->result();
        $config=backend_pagination();
        $config['base_url'] = base_url().'backend/page/index';
        $config['total_rows'] = $this->crud->readData('*', 'page_templates')->num_rows();
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

		$data['template'] = 'backend/page/index';
		$this->load->view('templates/backend/backend_template',$data);
	}

	public function page_templates_add() {
		$data['title'] = 'Add page template';
		$this->form_validation->set_rules('template_name', 'Title', 'required|max_length[100]');
		$this->form_validation->set_rules('template_body', 'Body', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == TRUE){
			
			$data_insert['template_name'] = $this->input->post('template_name');

			$data_insert['template_body'] = $this->input->post('template_body');

			$data_insert['template_created'] =	date('Y-m-d h:i:s');

	        if($this->crud->createData('page_templates',$data_insert)){
				$this->session->set_flashdata('msg_success','Template Added successfully.');
				redirect('backend/page');
			}else{
				$this->session->set_flashdata('msg_error','Sorry! Adding template data has been failed. Please try again');
				redirect('backend/page');
			}
		}	  		
			$data['template'] = 'backend/page/page_templates_add';
			$this->load->view('templates/backend/backend_template',$data);
	}

	public function page_templates_edit($id='') {
		$data['title'] = 'Edit page template';

		if($id == ''){ redirect('backend/page/index'); }
        $row_get = $this->crud->readData('*', 'page_templates', array('id'=>$id))->num_rows();
        if($row_get < 1){ 
          	redirect('backend/superadmin/error_404');
        }
        $this->form_validation->set_rules('template_name', 'Title', 'required');
        $this->form_validation->set_rules('template_body', 'Body', 'required');
       
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == TRUE) {
			$data_insert['template_name'] = $this->input->post('template_name');
			$data_insert['template_body'] = $this->input->post('template_body');
			$data_insert['template_updated'] =	date('Y-m-d h:i:s');

	        $this->crud->updateData('page_templates',$data_insert,array('id' => $id));
			
			$this->session->set_flashdata('msg_success','Page Template Updated successfully.');
			redirect('backend/page');
		}	  

		$data['page_template'] = $this->crud->readData('*', 'page_templates',array('id' => $id))->result();
    	 
		$data['template'] = 'backend/page/page_templates_edit';
		$this->load->view('templates/backend/backend_template',$data);
	}

	public function page_templates_delete($id='') {
		$data['title'] = 'All Request';
		if(empty($id)){ redirect('backend/page/index/'); }
        if($this->crud->deleteData('page_templates',array('id'=>$id)))
        {
           $this->session->set_flashdata('msg_success','Page Template deleted successfully.');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('msg_error','Failed, Please try again.');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
}
