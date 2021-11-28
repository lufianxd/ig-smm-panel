<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MY_Model extends CI_Model
{
	function __construct(){
		parent::__construct();
		// Load the Database Module REQUIRED for this to work.
		$this->load->database();//Without it -> Message: Undefined property: XXXController::$db
	}
	
	function fetch($select = "*", $table = "", $where = "", $order = "", $by = "DESC", $start = -1, $limit = 0, $return_array = false)
	{
		$this->db->select($select);
		if($where != "")
		{
			$this->db->where($where);
		}
		if($order != "" && (strtolower($by) == "desc" || strtolower($by) == "asc"))
		{
			if($order == 'rand'){
				$this->db->order_by('rand()');
			}else{
				$this->db->order_by($order, $by);
			}
		}
		
		if((int)$start >= 0 && (int)$limit > 0)
		{
			$this->db->limit($limit, $start);
		}
		#Query
		$query = $this->db->get($table);
		if($return_array){
			$result = $query->result_array();
		} else {
			$result = $query->result();
		}
		$query->free_result();
		return $result;
	}	
	
	function get($select = "*", $table = "", $where = "", $order = "", $by = "DESC", $return_array = false)
	{
		$this->db->select($select);
		if($where != "")
		{
			$this->db->where($where);
		}
		if($order != "" && (strtolower($by) == "desc" || strtolower($by) == "asc"))
		{
			if($order == 'rand'){
				$this->db->order_by('rand()');
			}else{
				$this->db->order_by($order, $by);
			}
		}		
		#Query
		$query = $this->db->get($table);
		if($return_array){
			$result = $query->row_array();
		} else {
			$result = $query->row();
		}
		$query->free_result();

		return $result;
	}

	function delete($table, $ids, $check_user){
		if(!empty($ids)){
			if($check_user){
				$where = array("uid" => session("uid"));
			}else{
				$where = array();
			}

			if(!$ids){
				ms(array(
					"status"  => "error",
					"message" => lang('the_item_does_not_exist_please_try_again')
				));
			}

			if(is_array($ids)){
				foreach ($ids as $key => $id) {
					$where["ids"] = $id;
					$this->db->delete($table, $where);
				}
				
				ms(array(
					"status"  => "success",
					"ids"     => $ids,
					"message" => lang("Deleted_successfully")
				));
			}else{
				$item = $this->model->get("*", $table, "ids = '{$ids}'");
				if(!empty($item)){
					
					if(isset($item->role) && $item->role == "admin"){
						ms(array(
							"status"  => "error",
							"message" => lang("can_not_delete_administrator_account")
						));
					}

					$where["id"] = $item->id;
					$this->db->delete($table, $where);

					if ($table == "categories") {
						$this->db->delete("services", ["cate_id" => $item->id]);
					}

					if ($table == "api_providers") {
						$this->db->delete("services", ["api_provider_id" => $item->id]);
					}

					if ($table == "users") {
						$this->db->delete("tickets", ["uid" => $item->id]);
						$this->db->delete("ticket_messages", ["uid" => $item->id]);
						$this->db->delete("orders", ["uid" => $item->id]);
					}
					
					ms(array(
						"status"  => "success",
						"ids"     => $ids,
						"message" => lang("Deleted_successfully")
					));
				}else{
					ms(array(
						"status"  => "error",
						"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
					));
				}
			}
		}else{
			load_404();
		}
	}
	
	function check_record($fields, $table, $id, $check_user, $get_data){
		if (!$get_data) {
			if ($id == "") {
				return false;
			}
		}

		if($check_user){
			$where = array(
				"uid" => session("uid"),
				"id" => $id,
			);
		}else{
			$where = array(
				"id" => $id,
				"status" => 1
			);
		}

		$item = $this->model->get($fields, $table, $where);

		if ($get_data) {
			return $item;
		}

		if(!empty($item)){
			return true;
		}else{
			return false;
		}
	}

	function history_ip($userid){
		$user = $this->model->get("id, history_ip", USERS, "id = '{$userid}'");	
		if(!empty($user)){
			$history_ip_old = (array)json_decode($user->history_ip);
			$history_ip = ($history_ip_old == "")?array():$history_ip_old;
			/*$finder = get_curl("http://ip-api.com/json");
			$finder = json_decode($finder);*/
			$history_ip[] = get_client_ip();

			if(count($history_ip) >= 10){
				array_shift($history_ip);
			}

			$this->db->update(USERS, array('history_ip' => json_encode($history_ip)), array("id" => $userid));
		}	
	}

	function get_storage($check_type = "", $size = 0){
		$user = $this->model->get("*", USERS, "id = '".session("uid")."'");
		$data = array(
			"max_storage_size" => 100,
			"max_file_size" => 5,
			"total_storage_size" => 0
		);

		$this->db->select("uid, SUM(file_size) AS size");
		$this->db->from(FILE_MANAGER);
		$this->db->where("uid", session("uid"));
		$this->db->group_by("uid");
		$query = $this->db->get();
		if($query->row()){
			$result = $query->row();
			if(!empty($result)){
				$total_size = (float)$result->size/1024;
				$data['total_storage_size'] = $total_size;
			}
		}else{
			
		}

		if(!empty($user)){
			$permission = (array)json_decode($user->permission);
			if(!empty($permission)){
				if(isset($permission['max_storage_size'])){
					$data['max_storage_size'] = $permission['max_storage_size'];
				}

				if(isset($permission['max_file_size'])){
					$data['max_file_size'] = $permission['max_file_size'];
				}
			}
		}

		$data = (object)$data;

		switch ($check_type) {
			case 'storage':
				$total_size = $data->total_storage_size + $size/1024;
				if($total_size > $data->max_storage_size){
					ms(array(
						"status" => "error",
						"message" => lang("you_have_exceeded_the_storage_limit")
					));
				}
				break;

			case 'file':
				$size = $size/1024;
				if($size > $data->max_file_size){
					ms(array(
						"status" => "error",
						"message" => lang("you_have_exceeded_the_file_limit")
					));
				}

				$total_size = $data->total_storage_size + $size;
				if($total_size > $data->max_storage_size){
					ms(array(
						"status" => "error",
						"message" => lang("you_have_exceeded_the_storage_limit")
					));
				}
				break;
			
			default:
				return $data;
				break;
		}
	}		

	function send_email1($subject, $content, $userid){
		$user = $this->db->select("*")->from(USERS)->where("id", $userid)->get()->row();
		$package = $this->db->select("*")->from(PACKAGES)->where("type", 1)->get()->row();
		if(!empty($user)){
			//Send email
			$subject = nl2br($subject);
			$content = nl2br($content);

			$now = (int)strtotime(date("Y-m-d", strtotime(NOW)));
			$expiration_date = (int)strtotime($user->expiration_date);
			$days_left = ($expiration_date - $now)/(60*60*24);

			//Replace Subject
			$subject = str_replace("{full_name}", $user->fullname, $subject);
			$subject = str_replace("{days_left}", $days_left, $subject);
			$subject = str_replace("{expiration_date}", convert_date($user->expiration_date), $subject);
			$subject = str_replace("{trial_days}", $package->trial_day, $subject);
			$subject = str_replace("{email}", $user->email, $subject);
			$subject = str_replace("{activation_link}", cn("auth/activation/".$user->activation_key), $subject);
			$subject = str_replace("{recovery_password_link}", cn("auth/activation/".$user->reset_key), $subject);
			$subject = str_replace("{website_link}", cn(""), $subject);
			$subject = str_replace("{website_name}", get_option("website_title", "Stackposts - Social Marketing Tool"), $subject);

			//
			$content = str_replace("{full_name}", $user->fullname, $content);
			$content = str_replace("{days_left}", $days_left, $content);
			$content = str_replace("{expiration_date}", convert_date($user->expiration_date), $content);
			$content = str_replace("{trial_days}", $package->trial_day, $content);
			$content = str_replace("{email}", $user->email, $content);
			$content = str_replace("{activation_link}", cn("auth/activation/".$user->activation_key), $content);
			$content = str_replace("{recovery_password_link}", cn("auth/reset_password/".$user->reset_key), $content);
			$content = str_replace("{website_link}", cn(""), $content);
			$content = str_replace("{website_name}", get_option("website_title", "Stackposts - Social Marketing Tool"), $content);


			$template = Modules::run("email/template");
			$template = str_replace("{content}", $content, $template);

			$mail = new PHPMailer(true);
			$mail->CharSet = "utf-8";
			try {

			    if(get_option("email_protocol_type", "mail") == "smtp" && get_option("email_smtp_server", "") != "" && get_option("email_smtp_port", "") != ""){
					$mail->isSMTP();
					$mail->SMTPAuth = true;
					$mail->Host = get_option("email_smtp_server", "");
					$mail->Username = get_option("email_smtp_username", "");
					$mail->Password = get_option("email_smtp_password", "");
					$mail->SMTPSecure = get_option("email_smtp_encryption", "");
					$mail->Port = get_option("email_smtp_port", "");

				}else{
					$mail->isMail();
				}

				$email_from = get_option('email_from', '')?get_option('email_from', ''):"do-not-reply@gmail.com";
				$email_name = get_option('email_name', '')?get_option('email_name', ''):get_option('website_title', 'Social Planer - Social Marketing Tool');

			    //Recipients
			    $mail->setFrom($email_from, $email_name);
			    $mail->addAddress($user->email, $user->fullname);

			    //Content
			    $mail->isHTML(true);
			    $mail->Subject = $subject;
			    $mail->Body    = $template;
			    $mail->AltBody = $subject;

			    $mail->send();
			    return false;
			} catch (Exception $e) {
				return 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
			}

		}
	}

	function send_email($subject, $email_content, $user_id, $check_replace = true){
		$user_info = $this->get("first_name, last_name, email, timezone, reset_key, activation_key", USERS, "id = '{$user_id}' AND status = 1");

		if (empty($user_info)) {
			return "Account does not exists!";
		}
		/*----------  Get Mail Template  ----------*/
		$mail_template = file_get_contents(APPPATH.'/libraries/PHPMailer/template.php');

		/*----------  replace variable in email content, subject  ----------*/
		$email_from = get_option('email_from', '')?get_option('email_from', ''):"do-not-reply@smm.com";
		$email_name = get_option('email_name', '')?get_option('email_name', ''):get_option('website_title', '');
		$user_firstname = $user_info->first_name;
		$user_lastname  = $user_info->last_name;
		$user_timezone  = $user_info->timezone;
		$user_email     = $user_info->email;

		$website_link = PATH;
		$website_logo = get_option('website_logo', BASE."assets/images/logo.png");
		$website_name = get_option("website_name", "SMM PANEL");
		$copyright    = "&copy; 2019. ".get_option("website_name", "SMM PANEL");

		/*----------  Need to replace subject, content or Not  ----------*/
		if ($check_replace) {
			$subject = str_replace("{{user_firstname}}", $user_firstname, $subject);
			$subject = str_replace("{{user_lastname}}", $user_lastname, $subject);
			$subject = str_replace("{{user_timezone}}", $user_timezone, $subject);
			$subject = str_replace("{{user_email}}", $user_email, $subject);
			$subject = str_replace("{{website_name}}", $website_name, $subject);
			$subject = str_replace("{{recovery_password_link}}", cn("auth/reset_password/".$user_info->reset_key), $subject);

			$email_content = str_replace("{{user_firstname}}", $user_firstname, $email_content);
			$email_content = str_replace("{{user_lastname}}", $user_lastname, $email_content);
			$email_content = str_replace("{{user_timezone}}", $user_timezone, $email_content);
			$email_content = str_replace("{{user_email}}", $user_email, $email_content);
			$email_content = str_replace("{{website_name}}", $website_name, $email_content);
			$email_content = str_replace("{{recovery_password_link}}", cn("auth/reset_password/".$user_info->reset_key), $email_content);
		}

		$mail_template = str_replace("{{website_logo}}", $website_logo, $mail_template);
		$mail_template = str_replace("{{website_link}}", $website_link, $mail_template);
		$mail_template = str_replace("{{website_name}}", $website_name, $mail_template);
		$mail_template = str_replace("{{copyright}}", $copyright, $mail_template);
		$mail_template = str_replace("{{email_content}}", $email_content, $mail_template);

		/*----------  Call PHPMaler  ----------*/
		$this->load->library("Phpmailer_lib");
		$mail = new PHPMailer(true);
		$mail->CharSet = "utf-8";
		try {

			/*----------  Check send email through PHP mail or SMTP  ----------*/
			$email_protocol_type 	= get_option("email_protocol_type", "");
			$smtp_server 			= get_option("smtp_server", "");
			$smtp_port 				= get_option("smtp_port", "");
			$smtp_username 			= get_option("smtp_username", "");
			$smtp_password 			= get_option("smtp_password", "");
			$smtp_encryption 		= get_option("smtp_encryption", "");

			if($email_protocol_type == "smtp" && $smtp_server != "" && $smtp_port != "" && $smtp_username != "" && $smtp_password != ""){
			    $mail->isSMTP();
			    $mail->SMTPDebug = 0; 
			    //Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages                               
			    $mail->Host = $smtp_server; 
			    $mail->SMTPAuth = false;                             
			    if ($smtp_username != "" && $smtp_username != "")  {
			    	$mail->SMTPAuth = true;                             
			    	$mail->Username = $smtp_username;                
			    	$mail->Password = $smtp_password;                         
			    }                         
			    $mail->SMTPSecure = $smtp_encryption;                         
			    $mail->Port = $smtp_port;
			    $mail->SMTPOptions = array(
			        'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			        )
			    );                                    
			}else{
				// Set PHPMailer to use the sendmail transport
				$mail->isSendmail();
			}

		    //Recipients
		    $mail->setFrom($email_from, $email_name);
		    $mail->addAddress($user_email, $user_firstname);    
		    $mail->addReplyTo($email_from, $email_name);

		    //Content
		    $mail->isHTML(true); 
		    $mail->Subject = $subject;
		    $mail->MsgHTML($mail_template);

		    $mail->send();

		    return false;
		} catch (Exception $e) {
			$message = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
		    return $message;
		}
	}
}
