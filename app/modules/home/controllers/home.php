<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class home extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		if (session('uid')) {
			redirect(cn('statistics'));
		}
	}

	public function index(){
		get_lang_code_defaut();
		$data = array();
		$this->template->set_layout('landing_page');
		$this->template->build('index', $data);
	}
	
}