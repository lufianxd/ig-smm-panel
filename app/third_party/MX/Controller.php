<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2015 Wiredesignz
 * @version 	5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
	
	public function __construct() 
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	

		date_default_timezone_set(TIMEZONE);
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	

		$CI = &get_instance();

	}
	
	public function __get($class) 
	{
		return CI::$APP->$class;
	}

	private function __get_current_user_data(){
		$CI = &get_instance();
		$user = $CI->db->select("*");
				$CI->db->from(USERS);
				$CI->db->where("id", session("uid"));
		        $query = $this->db->get();
		$result = $query->row();
		if(!empty($result)){
			return $result;
		}else{
			return false;
		}
	}

	private  function __check_maintenance_mode(){
		$CI = &get_instance();
		$user = $CI->db->select("value");
				$CI->db->from(OPTIONS);
				$CI->db->where("name", "is_maintenance_mode");
		        $query = $this->db->get();
		$result = $query->row();
		if(!empty($result)){
			if ($result->value) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	private function __curl($url){
	    $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_VERBOSE, 1); 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    curl_setopt($ch, CURLOPT_AUTOREFERER, false); 
	    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
	    curl_setopt($ch, CURLOPT_HEADER, 0); 
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	    curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    $result = curl_exec($ch); 
	    curl_close($ch); 
	    return json_decode($result); 
	}
}