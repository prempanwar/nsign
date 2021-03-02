<?php
class site_model extends CI_Model {

    public function __construct()   {
        $this->load->database(); 
    }

    public function getRecords($table = '', $clause = array(), $in_key = '', $in_val = array(), $order = '', $order_by = 'DESC', $limit = '')
    {
        $this->db->limit($limit);
        if($order)
        $this->db->order_by($order, $order_by);
        if($in_key)
            $this->db->where_in($in_key, $in_val);
        $result = $this->db->get_where($table, $clause );
        return $result->result();
    }

    public function getRecordsArray($table = '', $clause = array(), $order_by = '', $limit = '')
    {
        $this->db->limit($limit); 
        $this->db->order_by($order_by, "DESC");
        $result = $this->db->get_where($table, $clause );
        return $result->result_array();
    }

    public function getRecord($table = '', $clause = array(), $order_by = '')
    {
        $this->db->order_by($order_by, "DESC");
        $result = $this->db->get_where($table, $clause );
        return $result->row_array();
    }

    public function insertRecords($table = '', $data = array())
    {
        $result = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function deleteRecords($table = '', $data = array())
    {
        $result = $this->db->delete($table, $data);
        return '';
    }

    public function updateRecords($table = '', $data = array(), $clause = array())
    {                
        $result = $this->db->update($table, $data, $clause);
        return $result;
    }

    public function checkRecord($table = '', $clause = array())
    {
        $query = $this->db->get_where($table, $clause );
        if ($query->num_rows() >0 ) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function join_function($select, $tableA, $tableB, $joinOn, $joinType, $where = array(), $order_by = '', $limit = '')
    {
        $this->db->select($select);
        $this->db->from($tableA.' AS A');
        $this->db->join($tableB.' AS B', $joinOn, $joinType);
        $this->db->where($where);
        $this->db->limit($limit);
        $this->db->order_by($order_by, "DESC");
        $result = $this->db->get();
        return $result->result();
    }

    public function getAllRecords($table='', $limit='', $start='', $order_by='')
    {
        $this->db->limit($limit,$start);
        $this->db->order_by($order_by, 'DESC');
        $query = $this->db->get($table);
        return $query->result();
    }

    public function send_mail($from, $to, $subject, $message)
    {
        $config = Array(
            'mailtype' => 'html',
            'protocol' => 'sendmail',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'mailpath' => '/usr/sbin/sendmail',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->load->library('email');
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if($this->email->send()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function send_sms($message, $number) {
        $url = "http://bulksms.ramatechnologies.in/api/sendhttp.php?authkey=7755Ap8iZwSkT7V5add8ff1&mobiles=".$number."&message=".urlencode($message)."&sender=DRNCAB&route=4";
        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        ));

        //get response
        $output = curl_exec($ch);
        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        return $output;
    }

    public function getLoginUserDetails($user_id) {
        $query = $this->db->query("SELECT * FROM `users` INNER JOIN `profiles` ON `users`.`u_id` = `profiles`.`user_id` WHERE `profiles`.`user_id` = '$user_id'");
        $result = $query->row_array();
        return $result;
    }

    function getAddress($lat, $lon) {
        $url  = "https://maps.googleapis.com/maps/api/geocode/json?key=".KEY."&latlng=".$lat.",".$lon."&sensor=false";
        $json = @file_get_contents($url);
        $data = json_decode($json);
        $status = $data->status;
        $address = '';
        if($status == "OK"){
            $address = $data->results[0]->formatted_address;
        }
        return $address;
    }

    function getFullAddress($lat, $lon) {
        $url  = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?key=".KEY."&latlng=".$lat.",".$lon."&sensor=false");
        $data = json_decode($url);
        $add_array  = $data->results;
        $add_array = $add_array[0];
        $address = $add_array->formatted_address;
        $add_array = $add_array->address_components;
        $country = "";
        $state = ""; 
        $city = "";
        foreach ($add_array as $key) {
            if($key->types[0] == 'administrative_area_level_2') {
                $city = $key->long_name;
            }
            if($key->types[0] == 'administrative_area_level_1') {
                $state = $key->long_name;
            }
            if($key->types[0] == 'country') {
                $country = $key->long_name;
            }
        }
        return array('country' => $country, 'state' => $state, 'city' => $city, 'address' => $address);
    }

    public function getDuration($from,$to) {
        $from = urlencode($from);
        $to = urlencode($to);      
        $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?key=".KEY."&origins=$from&destinations=$to&language=en-EN&sensor=false");
        $data = json_decode($data);
      
        $t = 0;
        foreach($data->rows[0]->elements as $road) {
            $t += $road->duration->value;
        }
      
        $time1 = $t % (60 * 60);
        return $time = floor($time1 / 60);
    }

    // public function getDistanceDuration($from,$to) {
    //     $from = urlencode($from);
    //     $to = urlencode($to);      
    //     $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?key=AIzaSyCDjGSc5ZaAPYh_ivx_cUyfIpoe38ZS1yc&origins=$from&destinations=$to&language=en-EN&sensor=false&mode=driving");
    //     $data = json_decode($data);
      
    //     return $data->rows[0]->elements[0]; //distance in meter and duration in second
    // }

    public function getDistanceDuration($lat_s ,$lng_s, $lat_d = '', $lng_d = '') {
        if($lat_d == '' && $lng_d == '') {
            $from = urlencode($lat_s);
            $to = urlencode($lng_s);
            $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?key=".KEY."&origins=$from&destinations=$to&language=en-EN&sensor=false&mode=driving");
        }
        else {
            $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?key=".KEY."&origins=".$lat_s.",".$lng_s."&destinations=".$lat_d.",".$lng_d."&language=en-EN&sensor=false&mode=driving");
        }
        $data = json_decode($data);
        // return $data; //distance in meter and duration in second
        if($data->status == 'OK')
            return $data->rows[0]->elements[0]; //distance in meter and duration in second
        else
            return '';
    }

    public function getDistanceDurationFull($lat_s ,$lng_s, $lat_d = '', $lng_d = '') {
        if($lat_d == '' && $lng_d == '') {
            $from = urlencode($lat_s);
            $to = urlencode($lng_s);
            $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?key=".KEY."&origins=$from&destinations=$to&language=en-EN&sensor=false&mode=driving");
        }
        else {
            $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?key=".KEY."&origins=".$lat_s.",".$lng_s."&destinations=".$lat_d.",".$lng_d."&language=en-EN&sensor=false&mode=driving");
        }
        $data = json_decode($data);
        // return $data; //distance in meter and duration in second
        if($data->status == 'OK')
            return $data; //distance in meter and duration in second
        else
            return '';
    }

    public function getDistance($from, $to) {
        $from = urlencode($from);
        $to = urlencode($to);
       
        $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?key=".KEY."&origins=$from&destinations=$to&language=en-EN&sensor=false");
        $data = json_decode($data);
       
        $distance = 0;
        foreach($data->rows[0]->elements as $road) {
            $distance += $road->distance->value;
        }
       
        return $distance = round($distance/1000);
    }

    public function getDurationFromLatLng($lat_s, $lng_s, $lat_d, $lng_d) {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?key=".KEY."&origins=".$lat_s.",".$lng_s."&destinations=".$lat_d.",".$lng_d."&mode=driving&language=en-EN";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $distance = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $distance = str_replace(",",".",$distance);
        $distance = explode(" ",$distance);
        $distance = $distance[0];
        $duration = $response_a['rows'][0]['elements'][0]['duration']['text'];
        return $duration = str_replace("godz.","hours",$duration);
    }
    
    public function getNearestTaxi($lat, $lng, $f_id, $limit = '1') {
        $query = $this->db->query("SELECT *, ( 6371 * acos( cos( radians($lat) ) * cos( radians( taxi_lat ) ) * cos( radians( taxi_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( taxi_lat ) ) ) ) AS distance FROM `taxi_current_location` WHERE `login_status` = 'yes' AND fare = '$f_id' GROUP BY fare HAVING distance < 20 ORDER BY distance LIMIT $limit;");
        if($limit == '1')
            $result = $query->row_array();
        else
            $result = $query->result();
        return $result;
    }
    
    public function sendPushNotification($message, $token_id, $api_access_key, $notification) {
        define( 'API_ACCESS_KEY', $api_access_key );
        $registrationIds = $token_id;
        #prep the bundle
        $msg = array (
            // 'body'  => 'Ride Request',
            // 'title' => 'Visitorcabs',
            'icon'  => 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );
        $msg = array_merge($notification, $msg);
        $fields = array (
            'to'        => $registrationIds,
            'notification'  => $msg,
            'data' => $message
        );        
        
        $headers = array (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server    
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        #Echo Result Of FireBase Server
        return $result;
    }
    
    
     public function getNumRows($table = '')//, $clause = array(), $order_by = '', $limit = '')
    {
        //$this->db->limit($limit); 
       // $this->db->order_by($order_by, "DESC");
        $result = $this->db->get_where($table);//, $clause );
        return $result->num_rows();
    }

}