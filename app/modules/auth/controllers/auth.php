<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class auth extends MX_Controller {
	public $tb_users;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->tb_users = USERS;

		if(session("uid") && segment(2) != 'logout'){
			redirect(cn("statistics"));
		}
	}

	public function index(){
		redirect(cn("auth/login"));
	}

	public function timezone(){
		set_session("client_timezone", post("timezone"));
	}

	public function login(){
		$data = array();
		$this->template->set_layout('auth');
		$this->template->build('sign_in', $data);
	}

	public function logout(){
		unset_session("uid");
		if (get_option("is_maintenance_mode")) {
			delete_cookie("verify_maintenance_mode");
		}
		redirect(cn(''));
	}

	public function signup(){
		$data = array();
		$this->template->set_layout('auth');
		$this->template->build('sign_up', $data);
	}

	public function forgot_password(){
		$data = array();
		$this->template->set_layout('auth');
		$this->template->build('forgot_password', $data);
	}

	public function reset_password(){
		/*----------  check users exists  ----------*/
		$reset_key = segment(3);
		$user = $this->model->get("id, ids, email", $this->tb_users, "reset_key = '{$reset_key}'");
		if (!empty($user)) {
			// redirect to change password page
			$data = array(
				"reset_key" => $reset_key,
			);
			$this->template->set_layout("auth");
			$this->template->build("change_password", $data);
		}else{
			redirect(cn("auth/login"));
		}
		
	}

	public function ajax_sign_up($ids = ""){
		$terms              = post('terms');
		$api_key 			= create_random_string_key(32);
		$first_name         = post('first_name');
		$last_name          = post('last_name');
		$email              = post('email');
		$password           = post('password');
		$re_password        = post('re_password');
		$timezone           = post('timezone');

		if($first_name == '' || $last_name == '' || $password == ''|| $email == ''){
			ms(array(
				'status'  => 'error',
				'message' => lang("please_fill_in_the_required_fields"),
			));
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      	ms(array(
				'status'  => 'error',
				'message' => lang("invalid_email_format"),
			));
	    }

		if($password != ''){
			if(strlen($password) < 6){
				ms(array(
					'status'  => 'error',
					'message' => lang("Password_must_be_at_least_6_characters_long"),
				));
			}

			if($re_password!= $password){
				ms(array(
					'status'  => 'error',
					'message' => lang("Password_must_be_at_least_6_characters_long"),
				));
			}
		}

		if (!$terms) {
			ms(array(
				'status'  => 'error',
				'message' => lang("oops_you_must_agree_with_the_terms_of_services_or_privacy_policy"),
			));
		}

		$data = array(
			"ids"					  => ids(),
			"first_name"              => $first_name,
			"last_name"               => $last_name,
			"password"                => md5($password),
			"timezone"                => $timezone,
			"api_key"                 => $api_key,
			"reset_key"               => ids(),
			"activation_key"          => ids(),
			"changed"                 => NOW,
		);
		
		if($email != ''){
		    // check email
			$checkUserEmail = $this->model->get('email, ids', $this->tb_users,"email='{$email}'");
			if(!empty($checkUserEmail)){
				ms(array(
					'status'  => 'error',
					'message' => lang("An_account_for_the_specified_email_address_already_exists_Try_another_email_address"),
				));
			}

			$data['created'] = NOW;
			$data['email']   = $email;

			if($this->db->insert($this->tb_users, $data)){
				$uid = $this->db->insert_id();
				set_session('uid', $uid);

				/*----------  Check is send welcome email or not  ----------*/
				if (get_option("is_welcome_email", '')) {
					$check_send_email_issue = $this->model->send_email(get_option('email_welcome_email_subject', ''), get_option('email_welcome_email_content', ''), $uid);
					if($check_send_email_issue){
						ms(array(
							"status" => "error",
							"message" => $check_send_email_issue,
						));
					}
				}

				/*----------  Send email notificaltion for Admin  ----------*/
				if (get_option("is_new_user_email", '')) {
					$subject = get_option('email_new_registration_subject', '');
					$subject = str_replace("{{website_name}}", get_option("website_name", "SmartPanel"), $subject);

					$email_content = get_option('email_new_registration_content', '');
					$email_content = str_replace("{{user_firstname}}", $first_name, $email_content);
					$email_content = str_replace("{{user_lastname}}", $last_name, $email_content);
					$email_content = str_replace("{{website_name}}", get_option("website_name", "SmartPanel"), $email_content);
					$email_content = str_replace("{{user_timezone}}", $timezone, $email_content);
					$email_content = str_replace("{{user_email}}", $email, $email_content);

					$admin_id = $this->model->get("id", $this->tb_users, "role = 'admin'","id","ASC")->id;
					if ($admin_id == "") {
						$admin_id = 1;
					}
					
					$check_send_email_issue = $this->model->send_email( $subject, $email_content, $admin_id, false);
					if($check_send_email_issue){
						ms(array(
							"status" => "error",
							"message" => $check_send_email_issue,
						));
					}
				}
				

				ms(array(
					'status'  => 'success',
					'message' => lang("welcome_you_have_signed_up_successfully"),
				));
			}else{
				ms(array(
					"status"  => "Failed",
					"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
				));
			}
		}
	}

	public function ajax_sign_in(){
		$email    = post("email");
		$password = md5(post("password"));
		$remember = post("remember");

		if($email == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("email_is_required")
			));
		}

		if($password == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("Password_is_required")
			));
		}

		$user = $this->model->get("id, status, ids, email, password", $this->tb_users, "email = '{$email}' AND password = '{$password}'");
		if(!empty($user)){
			if($user->status != 1){
				ms(array(
					"status"  => "error",
					"message" => lang("your_account_has_not_been_activated")
				));
			}
			set_session("uid", $user->id);
			$this->model->history_ip($user->id);

			if($remember){
				set_cookie("cookie_email", encrypt_encode(post("email")), 1209600);
				set_cookie("cookie_pass", encrypt_encode(post("password")), 1209600);
			}else{
				delete_cookie("cookie_email");
				delete_cookie("cookie_pass");
			}

			ms(array(
				"status"  => "success",
				"message" => lang("Login_successfully")
			));

		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("email_address_and_password_that_you_entered_doesnt_match_any_account_please_check_your_account_again")
			));
		}
	}

	public function ajax_forgot_password(){
		$email = post("email");

		if($email == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("email_is_required")
			));
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		  	ms(array(
				"status"  => "error",
				"message" => lang("invalid_email_format")
			));
		}

		$user = $this->model->get("*", USERS, "email = '{$email}'");
		if(!empty($user)){
			$email_error = $this->model->send_email(get_option("email_password_recovery_subject", ""), get_option("email_password_recovery_content", ""), $user->id);

			if($email_error){
				ms(array(
					"status"  => "error",
					"message" => $email_error
				));
			}

			ms(array(
				"status"  => "success",
				"message" => lang("we_have_send_you_a_link_to_reset_password_and_get_back_into_your_account_please_check_your_email"),
			));
		}else{
			ms(array(
				"status" => "error",
				"message" => lang("the_account_does_not_exists")
			));
		}
	}

	public function ajax_reset_password($reset_key = ""){
		$user = $this->model->get("id, ids, email", $this->tb_users, "reset_key = '{$reset_key}'");
		$password           = post('password');
		$re_password        = post('re_password');

		if($password == '' || $re_password == ''){
			ms(array(
				'status'  => 'error',
				'message' => lang("please_fill_in_the_required_fields"),
			));
		}

		if($password != ''){
			if(strlen($password) < 6){
				ms(array(
					'status'  => 'error',
					'message' => lang("Password_must_be_at_least_6_characters_long"),
				));
			}

			if($re_password != $password){
				ms(array(
					'status'  => 'error',
					'message' => lang("Password_must_be_at_least_6_characters_long"),
				));
			}
		}

		if (!empty($user)) {
			$data = array(
				"password"  => md5($password),
				"reset_key" => ids(),
				"changed"	=> NOW,
			);

			$this->db->update($this->tb_users, $data, "id = '".$user->id."'");
			if ($this->db->affected_rows() > 0) {
				ms(array(
					"status"   => "success",
					"message"  => lang("your_password_has_been_successfully_changed"),
				));
			}else{
				ms(array(
					"status"  => "Failed",
					"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
				));
			}
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
			));
		}
	}
}