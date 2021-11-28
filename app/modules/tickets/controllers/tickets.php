<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class tickets extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_tickets;
	public $tb_ticket_message;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_users      = USERS;
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_orders     = ORDER;
		$this->tb_tickets    = TICKETS;
		$this->tb_ticket_message    = TICKET_MESSAGES;

	}

	public function index(){
		$page        = (int)get("p");
		$page        = ($page > 0) ? ($page - 1) : 0;
		$limit_per_page = get_option("default_limit_per_page", 10);
		$query = array();
		$query_string = "";
		if(!empty($query)){
			$query_string = "?".http_build_query($query);
		}
		$config = array(
			'base_url'           => cn(get_class($this).$query_string),
			'total_rows'         => $this->model->get_tickets(true),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$tickets = $this->model->get_tickets(false, "all", $limit_per_page, $page * $limit_per_page);

		/*----------  Check auto delete ticket  ----------*/
		if (get_option("is_clear_ticket", "")) {
			$days = get_option("default_clear_ticket_days", "");
			$day_tmp           = strtotime(NOW) - ($days*24*60*60);
			$this->db->delete($this->tb_tickets, "changed <= '".date("Y-m-d H:i:s", $day_tmp)."'");
		}

		$data = array(
			"module"     => get_class($this),
			"tickets"    => $tickets,
			"links"		 => $links
		);
		$this->template->build("index", $data);
	}
	
	public function add(){
		$data = array(
			"module"   => get_class($this),
		);
		$this->load->view('add', $data);
	}	

	public function view($id = ""){
		if (get_role('admin')) {
			$ticket_status = get_field($this->tb_tickets, ['id' => $id], 'status');
			if (!empty($ticket_status) && $ticket_status == 'new') {
				$this->db->update($this->tb_tickets, ['status' => 'pending'], ['id' => $id]);
			}
		}
		
		$ticket = $this->model->get_ticket_detail($id);
		if (!empty($ticket)) {
			$ticket_content = $this->model->get_ticket_content($id);
			$data = array(
				"module"   => get_class($this),
				"ticket"   => $ticket,
				"ticket_content"   => $ticket_content
			);
			$this->template->build('update', $data);
		}else{
			load_404();
		}
	}

	public function ajax_add(){
		$subject 		= post("subject");
		$description    = post("description");

		if($subject == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("subject_is_required")
			));
		}

		switch ($subject) {

			case 'subject_order':
				$subject = lang("Order");

				$request = post("request");
				$orderid = post("orderid");
				if($request == ""){
					ms(array(
						"status"  => "error",
						"message" => lang("please_choose_a_request")
					));
				}
				if($orderid == ""){
					ms(array(
						"status"  => "error",
						"message" => lang("order_id_field_is_required")
					));
				}

				switch ($request) {
					case 'refill':
						$request = lang("Refill");
						break;
					case 'cancellation':
						$request = lang("Cancellation");
						break;
					case 'speed_up':
						$request = lang("Speed_Up");
						break;
					default:
						$request = lang("Other");
						break;
				}
				$subject = $subject. " - ".$request. " - ".$orderid;
				break;

			case 'subject_payment':
				$subject = "Payment";
				$payment = post("payment");
				$transaction_id = post("transaction_id");

				if($payment == ""){
					ms(array(
						"status"  => "error",
						"message" => lang("please_choose_a_payment_type")
					));
				}

				if($transaction_id == ""){
					ms(array(
						"status"  => "error",
						"message" => lang("transaction_id_field_is_required")
					));
				}

				switch ($payment) {
					case 'paypal':
						$payment = lang("Paypal");
						break;
					case 'stripe':
						$payment = lang("Stripe");
						break;
					case 'twocheckout':
						$payment = lang("2Checkout");
						break;
					default:
						$payment = lang("Other");
						break;
				}
				$subject = $subject. " - ".$payment. " - ".$transaction_id;

				break;

			case 'subject_service':
				$subject = lang("Service");
				break;
			
			default:
				$subject = lang("Other");
				break;
		}

		if($description == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("description_is_required")
			));
		}

		//
		$data = array(
			"ids"             => ids(),
			"uid"             => session('uid'),
			"subject"         => $subject,
			"description"     => $description,
			"changed"         => NOW,
			"created"         => NOW,
		);

		$this->db->insert($this->tb_tickets, $data);
		
		if ($this->db->affected_rows() > 0) {
			ms(array(
				"status"  => "success",
				"message" => lang("ticket_created_successfully")
			));
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
			));
		}
	}

	public function ajax_update($ids){
		$message 		= post("message");

		if($message == ""){
			ms(array(
				"status"  => "error",
				"message" => lang('message_is_required')
			));
		}

		//data
		$data = array(
			"ids"	          => ids(),
			"uid"             => session('uid'),
			"message"         => $message,
			"created"         => NOW,
			"changed"         => NOW,
		);

		$check_item = $this->model->get("ids, id, uid, subject", $this->tb_tickets, "ids = '{$ids}'");

		if(!empty($check_item)){
			$data["ticket_id"] = $check_item->id;
			$this->db->insert($this->tb_ticket_message, $data);
			if ($this->db->affected_rows() > 0) {

				/*----------  Update time for changed in Tickets  ----------*/
				$this->db->update($this->tb_tickets, ["changed" => NOW], ["id" => $check_item->id]);
				/*----------  Send email notification to new user  ----------*/
				if (get_option("is_ticket_notice_email", '')) {
					$subject = $check_item->subject;
					$ticket_number = $check_item->id;
					$subject = get_option("website_name", "") ." - #Ticket"."$ticket_number - $subject";
					$check_email_issue = $this->model->send_email($subject, $message , $check_item->uid, false);
					if ($check_email_issue) {
						ms(array(
							"status"  => "error",
							"message" => $check_email_issue,
						));
					}
				}

				ms(array(
					"status"  => "success",
					"message" => lang("your_email_has_been_successfully_sent_to_user")
				));
			}
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
			));
		}
	}
	
	public function ajax_change_status($ids){
		$status = post("status");
		$check_item = $this->model->get("ids,id", $this->tb_tickets, "ids = '{$ids}'");
		if(!empty($check_item)){
			$data["status"]  = $status;
			$data["changed"] = NOW;
			$this->db->update($this->tb_tickets, $data, ["ids" => $ids]);
			if ($this->db->affected_rows() > 0) {
				ms(array(
					"status"  => "success",
					"message" => lang("Update_successfully")
				));
			}
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
			));
		}
	}

	public function ajax_search(){
		$k = post("k");
		$tickets = $this->model->get_search_tickets($k);
		$data = array(
			"module"     => get_class($this),
			"tickets" => $tickets,
		);
		$this->load->view("ajax_search", $data);
	}

	public function ajax_order_by($status = ""){
		if (!empty($status) && $status !="" ) {
			$tickets = $this->model->get_tickets(false, $status);
			$data = array(
				"module"     => get_class($this),
				"tickets" 	 => $tickets,
			);
			$this->load->view("ajax_search", $data);
		}
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_tickets, $ids, false);
	}
}

