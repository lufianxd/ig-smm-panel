<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_news;

	public function __construct(){
		parent::__construct();
		//Config Module
		$this->tb_users      = USERS;
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_orders     = ORDER;
		$this->tb_news       = NEWS;

	}

	function get_news(){
		$this->db->select('*');
		$this->db->from($this->tb_news);
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get();
		if($query->result()){
			return $data = $query->result();
		}else{
			false;
		}
	}

	function get_news_by_ajax(){
		$this->db->select('*');
		$this->db->from($this->tb_news);
		$this->db->where("(expiry  > '".NOW."')");
		$this->db->where("(created < '".NOW."')");
		$this->db->where('status', 1);
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get();
		if($query->result()){
			return $data = $query->result();
		}else{
			false;
		}
	}

	function get_news_by_ids($ids = ""){
		$this->db->select('*');
		$this->db->from($this->tb_news);
		$this->db->where("ids", $ids);
		$query = $this->db->get();
		$result = $query->row();
		if (!empty($result)) {
			return $result;
		}
		return false;
	}

}
