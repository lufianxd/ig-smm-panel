<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class terms_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;

	public function __construct(){
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_orders     = ORDER;
		parent::__construct();
	}

}
