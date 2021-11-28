<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class statistics_model extends MY_Model {
	public $tb_users;
	public $tb_tickets;
	public $tb_ticket_messages;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_transaction_logs;

	public function __construct(){
		parent::__construct();

		$this->tb_users 		    = USERS;
		$this->tb_categories 		= CATEGORIES;
		$this->tb_services   		= SERVICES;
		$this->tb_orders     		= ORDER;
		$this->tb_tickets     		= TICKETS;
		$this->tb_ticket_messages   = TICKET_MESSAGES;
		$this->tb_transaction_logs  = TRANSACTION_LOGS;
	}

	public function get_data_logs(){
		/*----------  Total users, transactions, user balance  ----------*/
		$total_users          = 0;
		$total_transactions   = 0;
		$total_spent_receive  = 0;
		$total_receive        = 0;
		$user_balance         = 0;
		if (!get_role('admin')) {
			$user_balance 		= get_field($this->tb_users, ['id' => session('uid')], 'balance');
		}else{
			$total_users 		= $this->get_count_field_status($this->tb_users, '');
		}
		$total_transactions 	= $this->get_count_field_status($this->tb_transaction_logs, '');
		$total_spent_receive 	= $this->get_sum_value($this->tb_transaction_logs);

		/*----------  Orders  completed','processing','inprogress','pending','partial','canceled','refunded  ----------*/
		$data_orders_chart_spline = array(
			"time" 				=> $this->stats_log($this->tb_orders, 'completed')->date,
			"completed"  		=> $this->stats_log($this->tb_orders, 'completed')->value,
			"processing"   		=> $this->stats_log($this->tb_orders, 'processing')->value,
			"pending"    		=> $this->stats_log($this->tb_orders, 'pending')->value,
			"in progress"    	=> $this->stats_log($this->tb_orders, 'inprogress')->value,
			"partial"    		=> $this->stats_log($this->tb_orders, 'partial')->value,
			"canceled"    		=> $this->stats_log($this->tb_orders, 'canceled')->value,
			"refunded"    		=> $this->stats_log($this->tb_orders, 'refunded')->value,
		);
		$data_orders_chart_spline = json_encode($data_orders_chart_spline);
		$data_orders_chart_spline = str_replace("completed", lang("Completed"), $data_orders_chart_spline);
		$data_orders_chart_spline = str_replace("processing", lang("Processing"), $data_orders_chart_spline);
		$data_orders_chart_spline = str_replace("in progress", lang("In_progress"), $data_orders_chart_spline);
		$data_orders_chart_spline = str_replace("pending", lang("Pending"), $data_orders_chart_spline);
		$data_orders_chart_spline = str_replace("partial", lang("Partial"), $data_orders_chart_spline);
		$data_orders_chart_spline = str_replace("canceled", lang("Canceled"), $data_orders_chart_spline);
		$data_orders_chart_spline = str_replace("refunded", lang("Refunded"), $data_orders_chart_spline);

		$data_orders_chart_pie_tmp =  array(
			"completed"  		=> $this->get_count_field_status($this->tb_orders, 'completed'),
			"processing"   		=> $this->get_count_field_status($this->tb_orders, 'processing'),
			"pending"    		=> $this->get_count_field_status($this->tb_orders, 'pending'),
			"inprogress"    	=> $this->get_count_field_status($this->tb_orders, 'inprogress'),
			"partial"    		=> $this->get_count_field_status($this->tb_orders, 'partial'),
			"canceled"    		=> $this->get_count_field_status($this->tb_orders, 'canceled'),
			"refunded"    		=> $this->get_count_field_status($this->tb_orders, 'refunded'),
		);

		$data_orders_chart_pie 	 = json_encode($data_orders_chart_pie_tmp);
		$data_orders_chart_pie 	= str_replace("completed", lang("Completed"), $data_orders_chart_pie);
		$data_orders_chart_pie = str_replace("processing", lang("Processing"), $data_orders_chart_pie);
		$data_orders_chart_pie = str_replace("inprogress", lang("In_progress"), $data_orders_chart_pie);
		$data_orders_chart_pie = str_replace("pending", lang("Pending"), $data_orders_chart_pie);
		$data_orders_chart_pie = str_replace("partial", lang("Partial"), $data_orders_chart_pie);
		$data_orders_chart_pie = str_replace("canceled", lang("Canceled"), $data_orders_chart_pie);
		$data_orders_chart_pie = str_replace("refunded", lang("Refunded"), $data_orders_chart_pie);

		$data_orders = (object)array_merge($data_orders_chart_pie_tmp, array(
			"total"  					=> $this->get_count_field_status($this->tb_orders,''),
			"data_orders_chart_pie" 	=> $data_orders_chart_pie,
			"data_orders_chart_spline"  => $data_orders_chart_spline,
		));

		/*----------  Tickets  ----------*/
		$data_tickets_chart_spline = array(
			"time" 		=> $this->stats_log($this->tb_tickets, 'new')->date,
			"closed"    => $this->stats_log($this->tb_tickets, 'closed')->value,
			"new"  		=> $this->stats_log($this->tb_tickets, 'new')->value,
			"pending"   => $this->stats_log($this->tb_tickets, 'pending')->value,
		);

		$data_tickets_chart_spline = json_encode($data_tickets_chart_spline);
		$data_tickets_chart_spline = str_replace("closed", lang("Closed"), $data_tickets_chart_spline);
		$data_tickets_chart_spline = str_replace("new", lang("New"), $data_tickets_chart_spline);
		$data_tickets_chart_spline = str_replace("pending", lang("Pending"), $data_tickets_chart_spline);

		$data_tickets_chart_pie_tmp =  array(
			'closed' 	=> $this->get_count_field_status($this->tb_tickets, 'closed'),
			'new' 		=> $this->get_count_field_status($this->tb_tickets, 'new'),
			'pending' 	=> $this->get_count_field_status($this->tb_tickets, 'pending'),
		);

		$data_tickets_chart_pie = json_encode($data_tickets_chart_pie_tmp);
		$data_tickets_chart_pie = str_replace("closed", lang("Closed"), $data_tickets_chart_pie);
		$data_tickets_chart_pie = str_replace("new", lang("New"), $data_tickets_chart_pie);
		$data_tickets_chart_pie = str_replace("pending", lang("Pending"), $data_tickets_chart_pie);

		$data_tickets 					= (object)array_merge($data_tickets_chart_pie_tmp, array(
			"total"  					=> $this->get_count_field_status($this->tb_tickets,''),
			"data_tickets_chart_pie" 	=> $data_tickets_chart_pie,
			"data_tickets_chart_spline" => $data_tickets_chart_spline,
		));

		$data = (object)array(
			"data_tickets"    		=> $data_tickets,
			"data_orders"     		=> $data_orders,
			"total_users"     		=> $total_users,
			"total_transactions"    => $total_transactions,
			"total_spent_receive"   => $total_spent_receive,
			"user_balance"          => $user_balance,
		);

		return $data;
	}

	/*----------  Find the amount status of ticket  ----------*/
	private function get_count_field_status($table, $status = ''){

		if (!get_role('admin')) {
			$this->db->where('uid', session('uid'));
		}
		$this->db->select("id");
		$this->db->from($table);
		if ($status != "") {
			$this->db->where('status', $status);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	/*----------  get_data_chart_pie  ----------*/

	private function stats_log($table, $status = ""){
		$value_string = "";
		$date_string = "";

		$date_list = array();
		$date = strtotime(date('Y-m-d', strtotime(NOW)));

		$i = 7;
		//Get data
		if (!get_role("admin")) {
			$sql = "SELECT COUNT(created) as count, DATE(created) as created FROM `".$table."` WHERE status='".$status."' AND uid = '".session("uid")."' AND created > NOW() - INTERVAL 7 DAY GROUP BY DATE(created), status;";
			
		}else{
			$sql = "SELECT COUNT(created) as count, DATE(created) as created FROM `".$table."` WHERE status='".$status."' AND created > NOW() - INTERVAL 7 DAY GROUP BY DATE(created), status;";
		}

		for ($i; $i >= 0; $i--) { 
			$left_date = $date - 86400 * $i;
			$date_list[date('Y-m-d', $left_date)] = 0;
		}
		
		$query = $this->db->query($sql);

		if($query->result()){
			foreach ($query->result() as $key => $value) {
				if(isset($date_list[$value->created])){
					$date_list[$value->created] = $value->count;
				}
			}
		}

		$data_value = array();
		$data_date = array();

		foreach ($date_list as $date => $value) {
			$data_value[] = $value;
			$data_date[]  = $date;
		}

		return (object)array(
			"value" => $data_value,
			"date" => $data_date
		);
	}

	private function get_sum_value($table){
		if (!get_role("admin")) {
			$this->db->where("uid", session("uid"));
		}
		$this->db->select_sum("amount");
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->result();

		if ($result[0]->amount > 0) {
			return $result[0]->amount;
		}else{
			return 0;
		}

	}
}
