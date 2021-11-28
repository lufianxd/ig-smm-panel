<?php
if(!function_exists('post_get')){
	function post_get($name = ""){
		$CI = &get_instance();
		if($name != ""){
			return $CI->input->post_get(trim($name));
		}else{
			return $CI->input->post_get();
		}
	}
}

if(!function_exists('post')){
	function post($name = ""){
		$CI = &get_instance();

		if($name != ""){
			$post = $CI->input->post(trim($name));
			if(is_string($post)){
				return addslashes($CI->input->post(trim($name)));
			}else{
				return $post;
			}
		}else{
			return $CI->input->post();
		}
	}
}

if(!function_exists('get')){
	function get($name = ""){
		$CI = &get_instance();
		return $CI->input->get(trim($name));
	}
}

if(!function_exists('get_value')){
	function get_value($data, $key, $parseArray = false, $return = false){
		if(is_string($data)){
			$data = json_decode($data);
		}

		if(is_object($data)){
			if(isset($data->$key)){
				if($parseArray){
					return (array)$data->$key;
				}else{
					return $data->$key;
				}
			}
		}else if(is_array($data)){
			if(isset($data[$key])){
				return $data[$key];
			}
		}else{
			return $data;
		}
		
		return $return;
	}
}

if(!function_exists('get_secure')){
	function get_secure($name = ""){
		$CI = &get_instance();
		return filter_input_xss($CI->input->get(trim($name)));
	}
}

if(!function_exists('remove_empty_value')){
	function remove_empty_value($data){
		if(!empty($data)){
			return array_filter($data, function($value) {
			    return ($value !== null && $value !== false && $value !== ''); 
			});
		}else{
			return false;
		}
	}
}

if(!function_exists('get_random_value')){
	function get_random_value($data){
		if(is_array($data) && !empty($data)){
			$index = array_rand($data);
			return $data[$index];
		}else{
			return false;
		}
	}
}

if(!function_exists('get_random_values')){
	function get_random_values($data, $limit){
		if(is_array($data) && !empty($data)){
			shuffle($data);
			if(count($data) < $limit){
				$limit = count($data);
			}

			return array_slice($data, 0, $limit);
		}else{
			return false;
		}
	}
}


if(!function_exists('specialchar_decode')){
	function specialchar_decode($input){
		$input = str_replace("\\'", "'", $input);
		$input = str_replace('\"', '"', $input);
        $input = htmlspecialchars_decode($input, ENT_QUOTES);
		return $input;
	}
}


if(!function_exists('filter_input_xss')){
	function filter_input_xss($input){
        $input = htmlspecialchars($input, ENT_QUOTES);
		return $input;
	}
}

if(!function_exists('ms')){
	function ms($array){
		print_r(json_encode($array));
		exit(0);
	}
}

if (!function_exists('ids')) {
	function ids(){
		$CI = &get_instance();
		return md5($CI->encryption->encrypt(time()));
	};
}

if (!function_exists('session')){
	function session($input){
		$CI = &get_instance();
		return $CI->session->userdata($input);
	}
}

if (!function_exists('set_session')){
	function set_session($name,$input){
		$CI = &get_instance();
		return $CI->session->set_userdata($name,$input);
	}
}

if (!function_exists('unset_session')){
	function unset_session($name){
		$CI = &get_instance();
		return $CI->session->unset_userdata($name);
	}
}

if (!function_exists('encrypt_encode')) {
	function encrypt_encode($text){
		$CI = &get_instance();
		return $CI->encryption->encrypt($text);
	};
}

if (!function_exists('encrypt_decode')) {
	function encrypt_decode($key){
		$CI = &get_instance();
		return $CI->encryption->decrypt($key);
	};
}

if (!function_exists('segment')){
	function segment($index){ 
		$CI = &get_instance();
        return $CI->uri->segment($index);
	}
}

if (!function_exists('cn')) {
	function cn($module=""){
		return PATH.$module;
	};
}

if (!function_exists('load_404')) {
	function load_404(){
		$CI = &get_instance();
		return	$CI->load->view("layouts/404.php");
	};
}

if (!function_exists('time_elapsed_string')) {
	function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . lang($v . ($diff->$k > 1 ? 's' : ''));
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' '.lang('ago') : lang('just_now');
	}
}

if (!function_exists('ajax_page')) {
	function ajax_page(){
		$CI = &get_instance();
		if(!post()){
			$CI = &get_instance();
			$CI->load->view("layouts/404.php");
			return false;
		}else{
			return true;
		}
	};
}

if (!function_exists('require_all')) {
	function require_all($dir = "", $depth=0) {
		if($dir == ""){
			$segment = segment(1);
			$dir = APPPATH."../public/".$segment."/config/constants/";
		}

	    // require all php files
	    $scan = glob("$dir/*");
	    foreach ($scan as $path) {
	        if (preg_match('/\.php$/', $path)) {
	            require_once $path;
	        }
	        elseif (is_dir($path)) {
	            require_all($path, $depth+1);
	        }
	    }
	}
}

if (!function_exists('get_all_file_from_folder')) {
	function get_all_file_from_folder($dir = "") {
		$data = array();
		if($dir == ""){
			$segment = segment(1);
			$dir = APPPATH."../public/".$segment."/config/constants/";
		}

	    // require all php files
	    $scan = glob("$dir/*");
	    foreach ($scan as $path) {
	        if (preg_match('/\.php$/', $path)) {
	        	$data[] = $path;
	        }
	    }

	    return $data;
	}
}

if (!function_exists('get_path_module')) {
	function get_path_module(){
		$CI = &get_instance();
		return APPPATH.'modules/'.$CI->router->fetch_module().'/';
	}
}

if (!function_exists('folder_size')) {
	function folder_size($dir){
	    $size = 0;
	    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
	        $size += is_file($each) ? filesize($each) : folderSize($each);
	    }
	    return $size;
	}
}

if (!function_exists('pr')) {
    function pr($data, $type = 0) {
        print '<pre>';
        print_r($data);
        print '</pre>';
        if ($type != 0) {
            exit();
        }
    }
}

if(!function_exists('pr_sql')){
	function pr_sql($type=0){
		$CI = &get_instance();
		$sql = $CI->db->last_query();
		pr($sql,$type);
	}
}

if (!function_exists('export_csv')) {
	function export_csv($table_name){
		$CI = &get_instance();
        $CI->load->dbutil();
        $CI->load->helper('file');
        $CI->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $query = $CI->db->query("SELECT * FROM ".$table_name);
        $filename = $table_name.date("-d-m-Y", strtotime(NOW)).".csv";
        $data = $CI->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download($filename, "\xEF\xBB\xBF".$data);
	}
}

if(!function_exists("convert_datetime")){
	function convert_datetime($datetime){
		return date("h:iA M d, Y", strtotime($datetime));
	}
}

if(!function_exists("convert_date")){
	function convert_date($date){
		return date("M d, Y", strtotime($date));
	}
}

if(!function_exists("convert_datetime_sql")){
	function convert_datetime_sql($datetime){
		return date("Y-m-d H:i:s", get_to_time($datetime));
	}
}

if(!function_exists("convert_date_sql")){
	function convert_date_sql($date){
		return date("Y-m-d", get_to_time($date));
	}
}

if(!function_exists("validateDate")){
	function validateDate($date, $format = 'Y-m-d'){
	    $d = DateTime::createFromFormat($format, $date);
	    return $d && $d->format($format) == $date;
	}
}

if(!function_exists("get_to_time")){
	function get_to_time($date){
		if(is_numeric($date)){
			return $date;
		}else{
			return strtotime(str_replace('/', '-', $date));
		}
	}
}

if(!function_exists("get_to_day")){
	function get_to_day($date, $fulltime = true){
		$strtime = strtotime(str_replace('/', '-', $date));
		if($fulltime){
			return date("Y-m-d H:i:s", $strtime);
		}else{
			return date("Y-m-d", $strtime);
		}
	}
}

if(!function_exists("row")){
	function row($data, $field){
		if(is_object($data)){
			if(isset($data->$field)){
				return $data->$field;
			}else{
				return "";
			}
		}

		if(is_array($data)){
			if(isset($data[$field])){
				return $data[$field];
			}else{
				return "";
			}
		}
	}
}



if (!function_exists('tz_convert')){
	function tz_convert($timezone) {
		date_default_timezone_set($timezone);
	  	$zones_array = array();
	  	$timestamp = time();
	  	foreach(timezone_identifiers_list() as $key => $zone) {
	   		if($zone == $timezone){
	   			return date('P', $timestamp);
	   		}
	  	}
		
	  	return false;
	}
}

if (!function_exists('get_line_with_string')){
	function get_line_with_string($fileName, $str) {
		if(is_file($fileName)){
	    	$lines = file($fileName);
		    foreach ($lines as $lineNumber => $line) {
		        if (strpos($line, $str) !== false) {
		            return trim(str_replace("/*", "", str_replace("*/", "", $line)));
		        }
		    }
		}else{
			$lines = $fileName;
		}
		
	    return false;
	}
}

if (!function_exists('get_timezone_user')){
	function get_timezone_user($datetime, $convert = false, $uid = 0){
		$datetime = get_to_time($datetime);
		$datetime = is_numeric($datetime)?date("Y-m-d H:i:s", $datetime):$datetime;

		$uid = session("uid")?session("uid"):$uid;
		$CI = &get_instance();

		if(empty($CI->help_model)){
			$CI->load->model('model', 'help_model');
		}

		$user = $CI->help_model->get("timezone", USERS, "id = '".$uid."'");
		if(!empty($user)){
			$date = new DateTime($datetime, new DateTimeZone(TIMEZONE));
			$date->setTimezone(new DateTimeZone($user->timezone));
			$result = $date->format('Y-m-d H:i:s');
			return $convert?convert_datetime($result):$result;
		}else{
			return $convert?convert_datetime($datetime):$result;
		}
	}
}

if (!function_exists('get_timezone_system')){
	function get_timezone_system($datetime, $convert = false, $uid = 0){
		$datetime = get_to_time($datetime);
		$datetime = is_numeric($datetime)?date("Y-m-d H:i:s", $datetime):$datetime;

		$uid = session("uid")?session("uid"):$uid;
		$CI = &get_instance();

		if(empty($CI->help_model)){
			$CI->load->model('model', 'help_model');
		}

		$user = $CI->help_model->get("timezone", USERS, "id = '".$uid."'");
		if(!empty($user)){
			$date = new DateTime($datetime, new DateTimeZone($user->timezone));
			$date->setTimezone(new DateTimeZone(TIMEZONE));
			$result = $date->format('Y-m-d H:i:s');  
			return $convert?convert_datetime($result):$result;
		}else{
			return $convert?convert_datetime($datetime):$result;
		}
	}
}


if(!function_exists("delete_option")){
	function delete_option($key){
		$CI = &get_instance();
		$CI->db->delete(OPTIONS, array("name" => $key));
	}
}



if(!function_exists("get_payment")){
	function get_payment(){
		if (is_dir(APPPATH."modules/payment")) {
			return true;
		}else{
			return false;
		}
	}
}



if(!function_exists("get_client_ip")){
	function get_client_ip() {
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';

	    return $ipaddress;
	}
}

if(!function_exists("info_client_ip")){
	function info_client_ip(){
		$result = get_curl("https://timezoneapi.io/api/ip");

		$result = json_decode($result);
		if(!empty($result)){
			return $result;
		}
		return false;
	}
}

if(!function_exists("get_curl")){
	function get_curl($url){
		$user_agent='Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3B48b Safari/419.3';

		$headers = array
		(
		    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
		    'Accept-Language: en-US,fr;q=0.8;q=0.6,en;q=0.4,ar;q=0.2',
		    'Accept-Encoding: gzip,deflate',
		    'Accept-Charset: utf-8;q=0.7,*;q=0.7',
		    'cookie:datr=; locale=en_US; sb=; pl=n; lu=gA; c_user=; xs=; act=; presence='
		); 

        $ch = curl_init( $url );

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "GET");
        curl_setopt($ch, CURLOPT_POST, false);     
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_REFERER, base_url());

        $result = curl_exec( $ch );
       
        curl_close( $ch );

        return $result;
	}
}

if(!function_exists("get_js")){
	function get_js($js_files = array()){
		$core = APPPATH."../assets/js/core.js";

		if(!file_exists($core)){
			$minifier = new MatthiasMullie\Minify\JS();
			foreach ($js_files as $file) {
				$minifier->add(APPPATH."../".$file);
			}

			$minifier->minify($core);
			$minifier->add($core);
		}else{

			$mod_date=date("F d Y H:i:s.", filemtime($core));
			$date = strtotime(date("Y-m-d", strtotime(NOW)));
			$mod_date = strtotime(date("Y-m-d", strtotime($mod_date)));

			if($mod_date < $date){
				$minifier = new MatthiasMullie\Minify\JS();
				foreach ($js_files as $file) {
					$minifier->add(APPPATH."../".$file);
				}

				$minifier->minify($core);
				$minifier->add($core);
			}

		}
		echo BASE."assets/js/core.js";
	}
}

if(!function_exists("get_css")){
	function get_css($css_files = array()){
		$core = APPPATH."../assets/css/core.css";

		if(!file_exists($core)){
			$minifier = new MatthiasMullie\Minify\CSS();
			foreach ($css_files as $file) {
				$minifier->add(APPPATH."../".$file);
			}
			$minifier->minify($core);
			$minifier->add($core);
		}else{

			$mod_date=date("F d Y H:i:s.", filemtime($core));
			$date = strtotime(date("Y-m-d", strtotime(NOW)));
			$mod_date = strtotime(date("Y-m-d", strtotime($mod_date)));

			if($mod_date < $date){
				$minifier = new MatthiasMullie\Minify\CSS();
				foreach ($css_files as $file) {
					$minifier->add(APPPATH."../".$file);
				}

				$minifier->minify($core);
				$minifier->add($core);
			}

		}
		echo BASE."assets/css/core.css";
	}
}



class Spintax
{
    public function process( $text )
    {
    	$text = specialchar_decode($text);
        return preg_replace_callback(
            '/\{(((?>[^\{\}]+)|(?R))*)\}/x',
            array( $this, 'replace' ),
            $text
        );
    }

    public function replace( $text )
    {
        $text = $this -> process( $text[1] );
        $parts = explode( '|', $text );
        return $parts[ array_rand( $parts ) ];
    }
}



/*=================================================
=            edit and add new function            =
=================================================*/


if (!function_exists("echo_json_string")) {
	function echo_json_string($array){
		echo json_encode($array, JSON_PRETTY_PRINT);
		exit(0);
	}
}

if(!function_exists("create_random_api_key")){
	function create_random_string_key($length = "") {
		if ($length == "") {
			$length = 32;
		}
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}

if(!function_exists("get_current_user_data")){
	function get_current_user_data($id = ""){
		if ($id == "") {
			$id = session("uid");
		}
		$CI = &get_instance();
		$user = $CI->model->get("*", USERS, "id = '{$id}'");
		if(!empty($user)){
			return $user;
		}else{
			return false;
		}
	}
}

if(!function_exists('get_role')){
	function get_role($role_type = "", $id = ""){
		$user = get_current_user_data($id);
		if(!empty($user->role) && $user->role == $role_type){
			return true;
		}else{
			return false;
		}
	}
}

if(!function_exists('get_controller_role')){
	function get_controller_role(){
		if(!get_role()){
			redirect(cn());
		}
	}
}

if(!function_exists("table_column")){
	function table_column($data, $table_column_name){
		if (is_object($data) && property_exists($data, $table_column_name)) {
			$value = $data->$table_column_name;
			switch ($table_column_name) {

				case 'api_order_id':
					$value = ($value == 0 || $value ==-1)? "" : $value;
					break;

				case 'api_service_id':
					$value = (!empty($value) && $value > 0)? lang("API") : lang("Manual");
					break;

				case 'link':
					$value = '<a href="'.$value.'" target="_blank">'.$value.'</a>';
					break;

				case 'created':
					$value = convert_timezone($value, 'user');
					break;

				case 'charge':
					$value = currency_format($value, 4);
					break;
					
				case 'service_id':
					$value = get_field(SERVICES, ['id' => $data->service_id], "name");
					break;	
									
				case 'uid':
					$value = get_field(USERS, ['id' => $data->uid], "email");
					break;

				default:
					# code...
					break;
			}
			return $value;
		}
	}
}

if(!function_exists("get_field")){
	function get_field($table, $where = array(), $field){
		$CI = &get_instance();

		if(empty($CI->help_model)){
			$CI->load->model('model', 'help_model');
		}
		$item = $CI->help_model->get("*", $table, $where);

		if(!empty($item) && isset($item->$field)){
			return $item->$field;
		}else{
			return false;
		}
	}
}

if (!function_exists("order_status_array")) {
	function order_status_array(){
		$data = array('completed','processing','inprogress','pending','partial','canceled','refunded');
		return $data;
	}
}

if (!function_exists("order_subscriptions_status_array")) {
	function order_subscriptions_status_array(){
		$data = array('Active','Paused','Completed','Expired','Canceled');
		return $data;
	}
}

if (!function_exists("order_dripfeed_status_array")) {
	function order_dripfeed_status_array(){
		$data = array('inprogress','completed','canceled');
		return $data;
	}
}

if (!function_exists("ticket_status_array")) {
	function ticket_status_array(){
		$data = array('new','pending','closed');
		return $data;
	}
}

if(!function_exists("ticket_status_title")){
	function ticket_status_title($key){
		switch ($key) {
			case 'new':
				return lang('New');
				break;			
			case 'pending':
				return lang('Pending');
				break;			
			case 'closed':
				return lang('Closed');
				break;			
		
		}
	}
}

if(!function_exists("order_status_title")){
	function order_status_title($key){
		switch ($key) {
			case 'completed':
				return lang("Completed");
				break;			
			case 'processing':
				return lang("Processing");
				break;			
			case 'inprogress':
				return lang("In_progress");
				break;			
			case 'pending':
				return lang('Pending');
				break;			
			case 'partial':
				return lang("Partial");
				break;			
			case 'canceled':
				return lang("Canceled");
				break;	

			case 'refunded':
				return lang("Refunded");
				break;	

			case 'active':
				return lang("Active");
				break;	

			/*----------  subscriptions  ----------*/

			case 'Active':
				return lang("Active");
				break;

			case 'Completed':
				return lang("Completed");
				break;

			case 'Paused':
				return lang("Paused");
				break;

			case 'Expired':
				return lang("Expired");
				break;

			case 'Canceled':
				return lang("Canceled");
				break;						
		}
	}
}

/**
 *
 * Get option and update option 
 *
 */

if(!function_exists("get_option")){
	function get_option($key, $value = ""){
		$CI = &get_instance();
		
		if(empty($CI->help_model)){
			$CI->load->model('model', 'help_model');
		}
		$option = $CI->help_model->get("value", OPTIONS, "name = '{$key}'");
		if(empty($option)){
			$CI->db->insert(OPTIONS, array("name" => $key, "value" => $value));
			return $value;
		}else{
			return $option->value;
		}
	}
}

if(!function_exists("update_option")){
	function update_option($key, $value){
		$CI = &get_instance();
		
		if(empty($CI->help_model)){
			$CI->load->model('model', 'help_model');
		}
		
		$option = $CI->help_model->get("value", OPTIONS, "name = '{$key}'");
		if(empty($option)){
			$CI->db->insert(OPTIONS, array("name" => $key, "value" => $value));
		}else{
			$CI->db->update(OPTIONS, array("value" => $value), array("name" => $key));
		}
	}
}

if(!function_exists("get_upload_folder")){
	function get_upload_folder(){
		$path = APPPATH."../assets/uploads/user" . session("uid")."/";
		if (!file_exists($path)) {
			$uold     = umask(0);
	    	mkdir($path, 0777);
			umask($uold);

	    	file_put_contents($path."index.html", "<h1>404 Not Found</h1>");
	    }
	}
}

/**
 *
 * Currency function
 *
 */
if (!function_exists("currency_codes")) {
	function currency_codes(){
		$data = array(
			"AUD" => "Australian dollar",
			"BRL" => "Brazilian dollar",
			"CAD" => "Canadian dollar",
			"CZK" => "Czech koruna",
			"DKK" => "Danish krone",
			"EUR" => "Euro",
			"HKD" => "Hong Kong dollar",
			"HUF" => "Hungarian forint",
			"INR" => "Indian rupee",
			"ILS" => "Israeli",
			"JPY" => "Japanese yen",
			"MYR" => "Malaysian ringgit",
			"MXN" => "Mexican peso",
			"TWD" => "New Taiwan dollar",
			"NZD" => "New Zealand dollar",
			"NOK" => "Norwegian krone",
			"PHP" => "Philippine peso",
			"PLN" => "Polish złoty",
			"GBP" => "Pound sterling",
			"RUB" => "Russian ruble",
			"SGD" => "Singapore dollar",
			"SEK" => "Swedish krona",
			"CHF" => "Swiss franc",
			"THB" => "Thai baht",
			"USD" => "United States dollar",
		);

		return $data;
	}
}

if (!function_exists("currency_format")) {
	function currency_format($number, $number_decimal = ""){
		$decimal = 2;

		if ($number_decimal == "") {
			$decimal = get_option('currency_decimal', 2);
		}else{
			$decimal = $number_decimal;
		}

		$number = number_format($number, $decimal, '.', ',');
		return $number;
	}
}



/**
 *
 * Timezone function
 *
 */
// ****Timezone***

if(!function_exists('tz_list')){
	function tz_list(){
		$zones = array();
		$dataZones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
		foreach ($dataZones as $key => $zone) {
			date_default_timezone_set($zone);
			$zones[$key]['zone'] = $zone;
			$zones[$key]['time'] = "(UTC ".date('P',time()).") ".$zone;
			$zones[$key]['sort'] = date('P',time());
		}

		usort($zones,function($a,$b){
			return $a['sort'] - $b['sort'];
		});

	  	return $zones;
	}
}


// Convert time zone for user.
if(!function_exists('convert_timezone')){
	function convert_timezone($datetime, $case, $uid = ''){
		$zonesystem  = date_default_timezone_get();

		if ($uid != '') {
			$zoneuser    = get_user_timezone($uid);
		}else{
			$zoneuser    = get_user_timezone(session('uid'));
		}

		switch ($case) {
			case 'user':
				$currentTZ   = new DateTimeZone($zonesystem);
				$newTZ       = new DateTimeZone($zoneuser);
				break;

			case 'system':
				$currentTZ   = new DateTimeZone($zoneuser);
				$newTZ       = new DateTimeZone($zonesystem);
				break;
		}
		
		$date        = new DateTime( $datetime, $currentTZ );
		$date->setTimezone( $newTZ );
		return $date->format('Y-m-d H:i:s');
	}
}

//Get User's timezone, return zone
if(!function_exists("get_user_timezone")){
	function get_user_timezone($uid = null){
		if(!empty($uid)){
			$userZone = get_field(USERS, ['id' => $uid], 'timezone');
			if(!empty($userZone)){
				return $userZone;
			}
		}
		return false;
	}
}

if (!function_exists("get_array_diff_object")) {
	function get_array_diff_object($array_a, $array_b){
		// pr($array_object_a);
		// pr($array_object_b);
		$diff = array_udiff($array_a, $array_b,
		    function($a, $b) {
		    	// pr($a);
		    	// pr($b, 1);
		    	if ($a===$b) {
			        return 0;
			    }
			    return 1;
		    }
		);
		// pr($diff, 1);
		return $diff;
	}
}

/*=====  End of edit and add new function  ======*/
