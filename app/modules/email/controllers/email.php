<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class email extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
	}

	public function template(){
		$data= array();
		$this->load->view("template", $data);
	}

}