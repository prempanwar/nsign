<?php

/**
*   check user logged in
*/
if(!function_exists('user_logged_in')){
    function user_logged_in(){
        $CI =& get_instance();
        $user_info = $CI->session->userdata('user_info');
        if($user_info)
            return TRUE;
        else
            return FALSE;
    }
}
if( ! function_exists('_is_admin_logged_in')){
    function _is_admin_logged_in(){
        if(!user_logged_in())
            redirect('backend');
    }
}   

if ( ! function_exists('user_id')) {
    function user_id(){
        $CI =& get_instance();
        $user_info = $CI->session->userdata('user_info');       
            return $user_info['id'];        
    }
}

if ( ! function_exists('user_name')) { 
    function user_name(){
        $CI =& get_instance();
        $user_info = $CI->session->userdata('user_info');
        if($user_info['logged_in']===TRUE)
            return $user_info['user_name'];
        else
            return FALSE;
    }                   
}

// Get user details 
if ( ! function_exists('user_details')) {
    function user_details(){
        $CI =& get_instance();
        $user_info = $CI->session->userdata('user_info');   
        return $user_info;     
        //print_r($superadmin_info); die();   
    }
}

// Get superadmin details 
if ( ! function_exists('superadmin_details')) {
    function superadmin_details(){
        $CI =& get_instance();
        $superadmin_info = $CI->session->userdata('superadmin_info');   
        return $superadmin_info;     
        //print_r($superadmin_info); die();   
    }
}

if ( ! function_exists('backend_pagination')) {
	function backend_pagination(){
		$data = array();		
		$data['full_tag_open'] = '<ul class="pagination">';		
		$data['full_tag_close'] = '</ul>';
		$data['first_tag_open'] = '<li>';
		$data['first_tag_close'] = '</li>';
		$data['num_tag_open'] = '<li>';
		$data['num_tag_close'] = '</li>';
		$data['last_tag_open'] = '<li>';
		$data['last_tag_close'] = '</li>';
		$data['next_tag_open'] = '<li>';
		$data['next_tag_close'] = '</li>';
		$data['prev_tag_open'] = '<li>';
		$data['prev_tag_close'] = '</li>';
		$data['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$data['cur_tag_close'] = '</a></li>';
		return $data;
	}
}

function product_info($council_id = ''){
    $CI =& get_instance();
    $data = $CI->crud->readData('*', 'council', array('council_id' => $council_id))->row_array();
    return $data;
}

function get_option($id = ''){
    $CI =& get_instance();
    $data = $CI->crud->readData('*', 'page_templates', array('id' => $id))->row_array();
    if($data)
        return $data['template_body'];
    else
        return '';
}

function get_options($name) {
    $CI =& get_instance();
    $data = $CI->crud->readData('option_value', 'options', array('option_name' => $name))->row_array();
    if($data)
        return $data['option_value'];
    else
        return '';
}

function change_date_format($date, $format = 'Y/m/d') {
    if($date == '' || $date == '0' || $date == '0000-00-00 00:00:00' || $date == '0000-00-00') {
        return '';
    }
    else {
        // $newDate = date($format, strtotime($date));
        // return $newDate;
        $better_date = nice_date($date, $format);
        return $better_date;
    }
}

function order_status($type = '') {
    $array = array('Payment Incomplete', 'Received', 'Shipped', 'Completed', 'Cancelled');
    if($type != '')
        return $array[$type];
    else
        return $array;
}

function street_name($string = '', $length = 5) {
    /*$array = array();
    // $length = 5;
    $i = 0;
    $html = '';
    foreach (str_split($string) as $value) {
        $i++;
        $html .= $value;
        if($i > $length) {
            if($value == ' ') {
                $array[] = $html;
                $html = '';
                $i = 0;
            }
        }
    }
    $array[] = $html;
    return $array;*/
    $array = array();
    $start = 0;
    $resultArr = explode(" ", $string);
    foreach ($resultArr as $key => $value) {
        $result = "";
        $i = $key;
        if($i > $start || $start == 0) {
            // echo "start ".$start;
            if(strlen($value) < $length) {
                $result .= " ".$resultArr[$i];
                $i++;
                if(strlen($value." ".@$resultArr[$i]) < $length) {
                    // echo "here";
                    $result .= " ".@$resultArr[$i];
                    $i++;
                    if(strlen($value." ".@$resultArr[$i-1]." ".@$resultArr[$i]) < $length) {
                        $result .= " ".@$resultArr[$i];
                        $i++;
                        if(strlen($value." ".@$resultArr[$i-1]." ".@$resultArr[$i-2]." ".@$resultArr[$i]) < $length) {
                            $result .= " ".@$resultArr[$i];
                            $i++;
                        }
                    }
                }
            }
            $start = $i-1;
        }
        if($result)
            $array[] = trim($result);
    }
    return $array;
}

function getDateTime() {
    date_default_timezone_set(TIMEZONE);
    $dateTime = date("Y:m:d-H:i:s");
    return $dateTime;
}


function createHash($chargetotal) {
    $storename = STORENAME;
    $sharedSecret = SHAREDSECRET;
    $currency = CURRENCY;
    $stringToHash = $storename . getDateTime() . $chargetotal . $currency . $sharedSecret;
    $ascii = bin2hex($stringToHash);
    return hash('sha256',$ascii);
}

function sendEmail($to='', $param='') {
    $CI =& get_instance();
    $CI->load->library('parser');
    $CI->load->library('email');
    if(!empty($to)){
        $template = $CI->crud->readData('*', 'email_templates', array('id' => $param['template_id']))->row_array();
        if($template) {
            $html = $CI->load->view('templates/email/email_template', array('email_message' => $template['template_body']), true);
            $param['data']['site_name'] = SITE_NAME;
            $string = $CI->parser->parse_string($html, $param['data'], true);
            
            $config['mailtype']  = 'html';
            $config['charset']  = 'iso-8859-1';
            $config['wordwrap']  = TRUE;
            $config['newline']  = "\r\n";

            $config['mailtype']  = 'html';
            $config['charset']  = 'iso-8859-1';
    //      $config['wordwrap']  = TRUE;
    //      $config['newline']  = "\r\n";

            $CI->email->initialize($config);
            $CI->email->from(NO_REPLY_EMAIL, NO_REPLY_EMAIL_FROM_NAME);
            $CI->email->to($to);
            // $CI->email->cc('another@another-example.com');
            // $CI->email->bcc('them@their-example.com');

            $CI->email->subject($template['template_subject']);
            $CI->email->message($string);

            if($CI->email->send()) {
                return "";
            }
            else {
                // print_r($CI->email->print_debugger());
                return "Something went wrong";
            }
            // return $string;
        }
        else {
            return "Invalid template id";
        }
    }
    return "Something went wrong";
}
if(!function_exists("p")){
   function p($array=''){
        return  "<pre>".print_r($array);
    }
}
if( !function_exists('plate_background_color')){
    function plate_background_color(){
        return $color_array = array(
            '#007D00' => 'Green',
            '#19169b' => 'Blue',
            '#ff0000' => 'Red',
            '#d8ca9b' => 'Cream',
            '#000000' => 'Black',
        );
    }   
}if( !function_exists('plate_font_color')){
    function plate_font_color(){
        return $font_color = array(
            'black' => 'Black',
            'white' => 'White',
            'green' => 'Green',
        );
    }   
}