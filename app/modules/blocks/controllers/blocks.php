<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class blocks extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
	}

	public function set_language(){
		set_language(post("id"));

		ms(array("status" => "success"));
	}

	public function header(){
		$data = array(
		);
		$this->load->view('header', $data);
	}
	
	public function sidebar(){
		$data = array();
		$this->load->view('sidebar', $data);
	}	

	public function footer(){
		$data = array(
        	'lang_current' => get_lang_code_defaut(),
        	'languages'    => $this->model->fetch('*', LANGUAGE_LIST,'status = 1'),
        );
		$this->load->view('footer', $data);
	}	
	
	public function empty_data(){
		$data = array();
		$this->load->view('empty_data', $data);
	}
}