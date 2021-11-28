<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class users extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_users      = USERS;
		$this->module_name   = 'Users';
		$this->module_icon   = "fa ft-users";
		$this->columns = array(
			"name"           => lang("User_profile"),
			"balance"        => lang('Funds'),
			"desc"           => lang('Description'),
			"created"        => lang("Created"),
			"status"         => lang('Status'),
		);
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
			'total_rows'         => $this->model->get_users_list(true),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$users = $this->model->get_users_list(false, "all", $limit_per_page, $page * $limit_per_page);
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"users"        => $users,
			"links"        => $links,
		);

		$this->template->build('index', $data);
	}

	public function update($ids = ""){
		$user    = $this->model->get("*", $this->tb_users, "ids = '{$ids}' ");

		$data = array(
			"module"    => get_class($this),
			"user" 		=> $user,
		);
		$this->template->build('update', $data);
	}

	public function mail($ids = ""){
		$user    = $this->model->get("ids, first_name, last_name, email", $this->tb_users, "ids = '{$ids}' ");

		$data = array(
			"module"    => get_class($this),
			"user" 		=> $user,
		);
		$this->load->view('mail_to_user', $data);
	}

	public function ajax_update($ids = ""){
		$api_key 			= create_random_string_key(32);
		$first_name         = post('first_name');
		$last_name          = post('last_name');
		$email              = post('email');
		$password           = post('password');
		$re_password        = post('re_password');
		$status             = (int)post('status');
		$role               = post('role');
		$timezone           = post('timezone');
		$desc               = post('desc');

		if($first_name == '' || $last_name == ''){
			ms(array(
				'status'  => 'error',
				'message' => lang("please_fill_in_the_required_fields"),
			));
		}

		$data = array(
			"first_name"              => $first_name,
			"last_name"               => $last_name,
			"role"                    => $role,
			"status"                  => $status,
			"timezone"                => $timezone,
			"desc"        	          => $desc,
			"changed"                 => NOW,
		);

		if($password != ''|| $ids == ''){
			if($password == ''){
				ms(array(
					'status'  => 'error',
					'message' => lang("Password_is_required"),
				));
			}

			if(strlen($password) < 6){
				ms(array(
					'status'  => 'error',
					'message' => lang("Password_must_be_at_least_6_characters_long"),
				));
			}

			if($re_password!= $password){
				ms(array(
					'status'  => 'error',
					'message' => lang("Password_does_not_match_the_confirm_password"),
				));
			}
			$data['password'] = md5($password);
		}
		
		if($ids != ''){
			$checkUser = $this->model->get('id, ids, email', $this->tb_users, "`ids` = '{$ids}'");

			if(empty($checkUser)){
				ms(array(
					'status'  => 'error',
					'message' => lang("There_was_an_error_processing_your_request_Please_try_again_later"),
				));
			}

			// check email
			$checkUserEmail = $this->model->get('email, ids', $this->tb_users,"email='{$email}' AND `ids` != '{$ids}'");
			if(!empty($checkUserEmail)){
				ms(array(
					'status'  => 'error',
					'message' => lang('An_account_for_the_specified_email_address_already_exists_Try_another_email_address'),
				));
			}
			if($this->db->update( $this->tb_users, $data ,"ids = '{$ids}'")){
				ms(array(
					'status'  => 'success',
					'message' => lang("Update_successfully"),
				));
			}
		}else{

			if($email == ''){
				ms(array(
					'status'  => 'error',
					'message' => lang("email_is_required"),
				));
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      	ms(array(
					'status'  => 'error',
					'message' => lang("invalid_email_format"),
				));
		    }

		    // check email
			$checkUserEmail = $this->model->get('email, ids', $this->tb_users,"email='{$email}'");
			if(!empty($checkUserEmail)){
				ms(array(
					'status'  => 'error',
					'message' => lang('An_account_for_the_specified_email_address_already_exists_Try_another_email_address'),
				));
			}

			$data['ids']     = ids();
			$data['created'] = NOW;
			$data['email']   = $email;


			if($this->db->insert( $this->tb_users,$data)){
				ms(array(
					'status'  => 'success',
					'message' => lang("Update_successfully"),
				));
			}
		}
	}
	
	public function ajax_send_email(){
		$user_email = post("email_to");
		$subject    = post("subject");
		$email_content    = post("email_content");

		if($subject == ''){
			ms(array(
				'status'  => 'error',
				'message' => lang("subject_is_required"),
			));
		}

		if($email_content == ''){
			ms(array(
				'status'  => 'error',
				'message' => lang("message_is_required"),
			));
		}

		$user = $this->model->get("id, email", $this->tb_users, "email = '{$user_email}'");
		if (!empty($user)) {
			$subject = get_option("website_name", "") ." - ".$subject;
			$check_email_issue = $this->model->send_email($subject, $email_content, $user->id, false);
			if ($check_email_issue) {
				ms(array(
					"status"  => "error",
					"message" => $check_email_issue,
				));
			}
			ms(array(
				"status"  => "success",
				"message" => lang("your_email_has_been_successfully_sent_to_user"),
			));
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("the_account_does_not_exists"),
			));
		}
	}

	public function ajax_update_more_infors($ids = ''){
		$website            = post('website');
		$phone              = post('phone');
		$skype_id           = post('skype_id');
		$what_asap          = post('what_asap');
		$address            = post('address');

		$more_information = array(
			"website"         => $website,
			"phone"        	  => $phone,
			"what_asap"       => $what_asap,
			"skype_id"        => $skype_id,
			"address"         => $address,
		);

		$data = array(
			"more_information"        => json_encode($more_information),
			"changed"                 => NOW,
		);

		if($ids != ''){
			$checkUser = $this->model->get('id,ids,email', $this->tb_users, "`ids` = '{$ids}'");

			if(empty($checkUser)){
				ms(array(
					'status'  => 'error',
					'message' => lang("There_was_an_error_processing_your_request_Please_try_again_later"),
				));
			}

			if($this->db->update($this->tb_users, $data, "ids ='{$ids}'")){
				ms(array(
					'status'  => 'success',
					'message' => lang("Update_successfully"),
				));
			}
		}else{
			ms(array(
				'status'  => 'error',
				'message' => lang("There_was_an_error_processing_your_request_Please_try_again_later"),
			));
		}
	}

	public function ajax_update_fund($ids = ""){
		$funds     = post('funds');

		$checkUser = $this->model->get('id, ids, email, balance', $this->tb_users, "`ids` = '{$ids}'");
		if ($ids == "" || empty($checkUser)) {
			ms(array(
				'status'  => 'error',
				'message' => lang("the_account_does_not_exists"),
			));
		}
		
		if ($funds == '') {
			ms(array(
				'status'  => 'error',
				'message' => 'Incorrect funds',
			));
		}

		if(!is_numeric($funds) && $funds != 0){
			ms(array(
				'status'  => 'error',
				'message' => lang('the_input_value_was_not_a_correct_number'),
			));
		}

		$data = array(
			"balance" => $funds,
		);

		if($this->db->update( $this->tb_users, $data ,"ids = '{$ids}'")){
			ms(array(
				'status'  => 'success',
				'message' => lang("Update_successfully"),
			));
		}
	}

	public function ajax_search(){
		$k = post("k");
		$users = $this->model->get_users_by_search($k);
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"users"   => $users,
		);
		$this->load->view("ajax_search", $data);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_users, $ids, false);
	}
}