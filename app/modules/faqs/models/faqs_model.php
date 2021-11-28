<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class faqs_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_faqs;

	public function __construct(){
		parent::__construct();
		//Config Module
		$this->tb_users      = USERS;
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_orders     = ORDER;
		$this->tb_faqs       = FAQS;

	}

	function get_faqs(){
		if (!get_role("admin")) {
			$this->db->where("status", "1");
		}
		$this->db->select('*');
		$this->db->from($this->tb_faqs);
		$this->db->order_by('sort', 'ASC');
		$query = $this->db->get();

		if($query->result()){
			return $data = $query->result();
		}else{
			false;
		}
	}

	function get_faq_by_ids($ids = ""){

		$this->db->select('*');
		$this->db->from($this->tb_faqs);
		$this->db->where("ids", $ids);
		$query = $this->db->get();
		$result = $query->row();
		if (!empty($result)) {
			return $result;
		}
		return false;
	}

	function get_search_faqs($k = ""){
		$k = trim(htmlspecialchars($k));
		if (!get_role("admin")) {
			$this->db->where("status", "1");
		}
		$this->db->select('*');
		$this->db->from($this->tb_faqs);

		if ($k != "" && strlen($k) >= 2) {
			$this->db->like("question", $k, 'both');
			$this->db->or_like("answer", $k, 'both');
		}
		$this->db->order_by('sort', 'ASC');

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

}
