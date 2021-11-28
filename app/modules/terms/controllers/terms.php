<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class terms extends MX_Controller {
	public $tb_users;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

	}

	public function index(){
		$data = array();

		if (!session('uid')) {
			$this->template->set_layout('general_page');
			$this->template->build("index", $data);
		}
		$this->template->build("index", $data);
	}

}

