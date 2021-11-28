<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class module extends MX_Controller {
	public $tb_users;
	public $tb_purchase;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->tb_purchase = PURCHASE;
	}

	public function index(){
		$purchase_code = $this->model->get("purchase_code", $this->tb_purchase, ["pid" => "23595718"]);
		$data = array(
			"module"        => get_class($this),
			"purchase_code" => $purchase_code->purchase_code
		);

		$this->template->build('index', $data);
	}

	public function update(){
		$purchase_code = post("purchase_code");
		$purchase_code = trim($purchase_code);

		if ($purchase_code  == "") {
			ms(array(
				"status"  => "error",
				"message" => "Purchase code is required",
			));
		}
		$this->db->update($this->tb_purchase, ["purchase_code" => $purchase_code], ["pid" => "23595718"]);
		delete_cookie("purchase_code_status");
		ms(array(
			"status" => "success",
			"message" => "Update Successfully",
		));

	}
}