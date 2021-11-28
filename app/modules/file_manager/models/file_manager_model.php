<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class file_manager_model extends MY_Model {
	public function __construct(){
		parent::__construct();
	}

	function getFiles($limit=-1, $page=-1){
		if($limit == -1){
			$this->db->select('count(*) as sum');
		}else{
			$this->db->select('*');
		}
		
		$this->db->from(FILE_MANAGER);

		if($limit != -1) {
			$this->db->limit($limit,$page*$limit);
		}

		$this->db->where("uid = '".session("uid")."'");

		$this->db->order_by('created','desc');
		$query = $this->db->get();

		if($query->result()){
			if($limit == -1){
				return $query->row()->sum;
			}else{
				$result =  $query->result();
				return $result;
			}
		}else{
			return false;
		}
	}
}
