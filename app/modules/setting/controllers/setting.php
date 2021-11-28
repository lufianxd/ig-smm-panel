<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class setting extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
	}

	public function index(){
		$data = array(
			"module"     => get_class($this),
		);
		$this->template->build('index', $data);
	}

	public function ajax_get_contents(){
		$data = array(
			"module"     => get_class($this),
		);
		$type = post("type");
		switch ($type ) {

			case 'website_logo':
				$this->load->view('website_logo', $data);
				break;

			case 'default_setting':
				$this->load->view('default_setting', $data);
				break;
				
			case 'terms_policy':
				$this->load->view('terms_policy', $data);
				break;	

			case 'socical_link':
				$this->load->view('socical_link', $data);
				break;

			case 'other':
				$this->load->view('other', $data);
				break;

			case 'email_setting':
				$this->load->view('email_setting', $data);
				break;

			case 'email_template':
				$this->load->view('email_template', $data);
				break;

			case 'payment':
				$this->load->view('payment', $data);
				break;
			
			default:
				$this->load->view('website_setting', $data);
				break;
		}
	}

	public function ajax_general_settings(){
		$data = $this->input->post();
		if(is_array($data)){
			foreach ($data as $key => $value) {
				if($key == "embed_javascript"){
					$value = htmlspecialchars(@$_POST[$key], ENT_QUOTES);
				}
				update_option($key, $value);
			}
		}

		ms(array(
        	"status"  => "success",
        	"message" => lang('Update_successfully')
        ));
	}
	
}