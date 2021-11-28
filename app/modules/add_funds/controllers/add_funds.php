<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class add_funds extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
	}

	public function index(){
		$data = array(
			"module"        => get_class($this),
		);

		$this->template->build('index', $data);
	}

	public function process(){
		$amount = post("amount");
		$agree  = post("agree");

		if ($amount  == "") {
			ms(array(
				"status"  => "error",
				"message" => lang("amount_is_required"),
			));
		}

		if ($amount  < 0) {
			ms(array(
				"status"  => "error",
				"message" => lang("amount_must_be_greater_than_zero"),
			));
		}

		if ($amount  < get_option('payment_transaction_min')) {
			
			ms(array(
				"status"  => "error",
				"message" => lang("minimum_amount_is")." ".get_option('currency_symbol').get_option('payment_transaction_min'),
			));
		}

		if (!$agree) {
			ms(array(
				"status"  => "error",
				"message" => lang("you_must_confirm_to_the_conditions_before_paying")
			));
		}

		switch (post('payment_method')) {

			case 'paypal':
				$transaction_fee = get_option("paypal_chagre_fee", 4);
				break;

			case 'stripe':
				$transaction_fee = get_option("stripe_chagre_fee", 4);
				break;

			case 'two_checkout':
				$transaction_fee = get_option("twocheckout_chagre_fee", 4);
				break;
			
			default:
				$transaction_fee = 3;
				break;
		}
		$total_amount = $amount + (($amount*$transaction_fee)/100);

		set_session("real_amount", $amount);
		set_session("amount", $total_amount);
		ms(array(
			"status" => "success",
			"message" => lang("processing_"),
		));
	}

	public function two_checkout_form(){
		$data = array(
			"module"        => get_class($this),
			"amount"        => session('amount'),
		);
		$this->template->build('2checkout_form', $data);
	}

	public function stripe_form(){
		$data = array(
			"module"        => get_class($this),
			"amount"        => session('amount'),
		);
		$this->template->build('stripe_form', $data);
	}

	public function success(){
		$id = session("transaction_id");
		$transaction = $this->model->get("*", $this->tb_transaction_logs, "id = '{$id}' AND uid ='".session('uid')."'");
		if (!empty($transaction)) {
			$data = array(
				"module"        => get_class($this),
				"transaction"   => $transaction,
			);
			unset_session("transaction_id");
			$this->template->build('payment_successfully', $data);
		}else{
			redirect(cn("add_funds"));
		}
	}

	public function unsuccess(){
		$data = array(
			"module"        => get_class($this),
		);
		$this->template->build('payment_unsuccessfully', $data);
	}

}