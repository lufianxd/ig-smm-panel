<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class statistics extends MX_Controller {
	public $tb_users;
	public $tb_tickets;
	public $tb_ticket_messages;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

		$this->tb_users 		    = USERS;
		$this->tb_categories 		= CATEGORIES;
		$this->tb_services   		= SERVICES;
		$this->tb_orders     		= ORDER;
		$this->tb_tickets     		= TICKETS;
		$this->tb_ticket_messages   = TICKET_MESSAGES;
		
	}

	public function index(){
		
		$data = array(
			"module"         => get_class($this),
			"data_log"       => $this->model->get_data_logs(),
		);
		$this->template->build("index", $data);
	}

}

