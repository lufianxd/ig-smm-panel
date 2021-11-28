<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class notification extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
	}

	public function get(){
		$data = array();
		$this->load->view("get_notification", $data);
	}
}