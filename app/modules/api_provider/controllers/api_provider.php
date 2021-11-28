<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class api_provider extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $tb_orders;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_users       		= USERS;
		$this->tb_categories 		= CATEGORIES;
		$this->tb_services   		= SERVICES;
		$this->tb_api_providers   	= API_PROVIDERS;
		$this->tb_orders     		= ORDER;
		$this->columns = array(
			"name"             => lang("Name"),
			"api_url"          => lang("api_url"),
			"api_key"          => lang("api_key"),
			"balance"          => lang("balance"),
			"desc"             => lang("Description"),
			"status"           => lang("Status"),
		);
	}

	public function index(){
		$api_lists = $this->model->get_api_lists();
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"api_lists"    => $api_lists,
		);

		$this->template->build('index', $data);
	}

	public function update($ids = ""){
		$api    = $this->model->get("*", $this->tb_api_providers, "ids = '{$ids}' ");
		$data = array(
			"module"   		=> get_class($this),
			"api" 			=> $api,
		);
		$this->load->view('update', $data);
	}

	public function ajax_update($ids = ""){
		$name 		= post("name");
		$api_url  	= trim(post("api_url"));
		$api_key 	= trim(post("api_key"));
		$status 	= (int)post("status");
		$description 		= post("description");

		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("name_is_required")
			));
		}

		if($api_url == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("api_url_is_required")
			));
		}

		if($api_key == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("api_key_is_required")
			));
		}

		//
		$data = array(
			"uid"             => session('uid'),
			"name"            => $name,
			"key"         	  => $api_key,
			"url"         	  => $api_url,
			"description"     => $description,
			"status"          => $status,
		);

		/*----------  Check API status   ----------*/
		if (!empty($api_key) && !empty($api_url) && $status == 1) {
			$data_post = array(
				'key' => $api_key,
	            'action' => 'services',
			);

			$data_connect = $this->connect_api($api_url, $data_post);
			$data_connect = json_decode($data_connect);
			if (empty($data_connect) || !is_array($data_connect)) {
				ms(array(
					"status"  => "error",
					"message" => lang("api_provider_does_not_exists")
				));
			}
		}

		$check_item = $this->model->get("ids, id", $this->tb_api_providers, "ids = '{$ids}'");
		if(empty($check_item)){
			$data["ids"]     = ids();
			$data["changed"] = NOW;
			$data["created"] = NOW;
			$this->db->insert($this->tb_api_providers, $data);
		}else{
			$data["changed"] = NOW;
			$this->db->update($this->tb_api_providers, $data, array("ids" => $check_item->ids));
			$this->db->update($this->tb_services, ["status" => $status], array("api_provider_id" => $check_item->id));
		}
		
		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
	}

	public function ajax_update_api_provider($ids){
		if ($ids != "" ) {
			$api = $this->model->get("*", $this->tb_api_providers, ["ids" => $ids]);
			if (!empty($api)) {
				$data_post = array(
					'key' => $api->key,
		            'action' => 'balance',
				);

				$data_connect = $this->connect_api($api->url, $data_post);
				$data_connect = json_decode($data_connect);

				if (empty($data_connect) || !isset($data_connect->balance)) {
					ms(array(
						"status"  => "error",
						"message" => lang("api_provider_does_not_exists")
					));
				}else{
					$data = array(
						"balance" 	        => $data_connect->balance,
						"currency_code" 	=> $data_connect->currency,
					);

					$this->db->update($this->tb_api_providers, $data, ["ids" => $api->ids]);

					ms(array(
						"status"  => "success",
						"message" => lang("Update_successfully")
					));
				}

			}else{
				ms(array(
					"status"  => "error",
					"message" => lang("api_provider_does_not_exists")
				));
			}
		}
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_api_providers, $ids, true);
	}

	public function services(){
		$api_lists = $this->model->get_api_lists(true);
		$data = array(
			"module"       => get_class($this),
			"api_lists"    => $api_lists,
			
		);

		$this->template->build('api/get_services', $data);
	}

	/**
	 *
	 * Sync services
	 *
	 */
	public function sync_services($ids = ""){
		if (!empty($ids)) {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}' AND status = 1");
			if (!empty($api)) {
				$data = array(
					"module"       => get_class($this),
					"api"          => $api,
				);
				
				$this->load->view('api/sync_update', $data);
			}
		}
	}

	public function ajax_sync_services($ids){
		$price_percentage_increase = (int)post("price_percentage_increase");
		$request = (int)post("request");
		$decimal_places = get_option("auto_rounding_x_decimal_places", 2);
		if ($price_percentage_increase === "") {
			ms(array(
				"status"  => "error",
				"message" => lang("price_percentage_increase_in_invalid_format")
			));
		}

		if ($ids != "") {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}' AND status = 1");
			if (!empty($api)) {
				$data_post = array(
					'key' => $api->key,
		            'action' => 'services',
				);

				$data_services = $this->connect_api($api->url, $data_post);
				$api_services = json_decode($data_services);

				if (empty($api_services) || !is_array($api_services)) {
					ms(array(
						"status"  => "error",
						"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
					));
				}

				$services = $this->model->fetch("*", $this->tb_services, ["api_provider_id" => $api->id]);

				if (empty($services) && !$request) {
					ms(array(
						"status"  => "error",
						"message" => lang("service_lists_are_empty_unable_to_sync_services")
					));
				}

				if (!empty($api_services)) {
					$api_services_by_key= [];
					$services_by_key = [];
					$services_new = [];
					$i = 0;
					foreach ($api_services as $api_key => $api_service) {
						$i++;
						$check_services_exists = false;
						$api_services_by_key[$api_service->service] = $api_service;

						foreach ($services as $key => $service) {
							$services_by_key[$service->api_service_id] = $service;
							/*----------  update price  ----------*/
							if ($service->api_service_id == $api_service->service) {
								$check_services_exists = true;
								/*----------  Auto round up ----------*/
								$rate = $api_service->rate;
								$new_rate = round($rate + (($rate*$price_percentage_increase)/100), $decimal_places);
								$service_type = strtolower(str_replace(" ", "_", $api_service->type));
								$data_service = array(
									"name"            	=> $api_service->name,
									"min"             	=> $api_service->min,
									"max"             	=> $api_service->max,
									"dripfeed"  	    => $api_service->dripfeed,
									"price"           	=> $new_rate,
									"type"        	    => $service_type,
									"changed"  	        => NOW,
								);
								$this->db->update($this->tb_services, $data_service, ["api_service_id" => $api_service->service, "api_provider_id" => $api->id, "ids" => $service->ids ]);
							}
						}

						/*----------  insert new service  ----------*/
						if (!$check_services_exists) {
							$services_new[] = $api_service;

							if (!$request) {
								continue;
							}

							$category_name = trim($api_service->category);
							$check_category = $this->model->get("ids, id, name", $this->tb_categories, "name = '{$category_name}'");
							$service_type = strtolower(str_replace(" ", "_", $api_service->type));

							/*----------  Auto round up ----------*/
							$rate = $api_service->rate;
							$new_rate = round($rate + (($rate*$price_percentage_increase)/100), $decimal_places);
							$data_service = array(
								"uid"             	=> session('uid'),
								"name"            	=> $api_service->name,
								"min"             	=> $api_service->min,
								"max"             	=> $api_service->max,
								"price"           	=> $new_rate,
								"add_type"        	=> 'api',
								"type"        	    => $service_type,
								"api_provider_id"  	=> $api->id,
								"api_service_id"  	=> $api_service->service,
								"dripfeed"  	    => $api_service->dripfeed,
								"ids"  				=> ids(),
								"status"  			=> 1,
								"changed"  			=> NOW,
								"created"  			=> NOW,
							);	

							if (!empty($check_category)) {
								$cate_id = $check_category->id;
								$data_service["cate_id"] = $cate_id;
								$this->db->insert($this->tb_services, $data_service);
							}else{
								/*----------  insert category  ----------*/
								$data_category = array(
									"ids"  			  => ids(),
									"uid"             => session('uid'),
									"name"            => $category_name,
									"sort"            => $i,
									"changed"         => NOW,
									"created"         => NOW,
								);
								$this->db->insert($this->tb_categories, $data_category);
								if ($this->db->affected_rows() > 0) {
									$cate_id = $this->db->insert_id();
									$data_service["cate_id"] = $cate_id;
									$this->db->insert($this->tb_services, $data_service);
								}
							}
						}
					}
				}else{
					ms(array(
						"status"  => "error",
						"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
					));
				}				

				$services_disabled = array_diff_key($services_by_key, $api_services_by_key);
				/*----------  Disable these services  ----------*/
				if (!empty($services_disabled)) {
					foreach ($services_disabled as $key => $service_disabled) {
						$this->db->update($this->tb_services, ["status" => 0, "changed" => NOW], ["api_provider_id" => $api->id, "id" => $service_disabled->id]);
					}
				}
				$data = array(
					"api_id"           	=> $api->id,
					"api_name"         	=> $api->name,
					"services_new"     	=> ($request)? $services_new : "",
					"services_disabled" => $services_disabled,
				);
				$this->load->view("api/results_sync", $data);

			}else{
				ms(array(
					"status"  => "error",
					"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
				));
			}

		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("api_provider_does_not_exists")
			));
		}
	}

	/**
	 *
	 * Bulk add all services
	 *
	 */
	public function bulk_services($ids = ""){
		if (!empty($ids)) {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}' AND status = 1");
			if (!empty($api)) {
				$data = array(
					"module"       => get_class($this),
					"api"          => $api,
				);
				
				$this->load->view('api/bulk_update', $data);
			}
		}
	}

	public function ajax_bulk_services($ids){
		$price_percentage_increase = (int)post("price_percentage_increase");
		$bulk_limit 			   = post("bulk_limit");
		$decimal_places            = get_option("auto_rounding_x_decimal_places", 2);

		if ($price_percentage_increase === "") {
			ms(array(
				"status"  => "error",
				"message" => lang("price_percentage_increase_in_invalid_format")
			));
		}

		if ($bulk_limit === "") {
			ms(array(
				"status"  => "error",
				"message" => lang("bulk_add_limit_in_invalid_format")
			));
		}

		if ($ids != "") {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}' AND status = 1");
			if (!empty($api)) {
				$data_post = array(
					'key' => $api->key,
		            'action' => 'services',
				);

				$data_services = $this->connect_api($api->url, $data_post);
				$data_services = json_decode($data_services);

				if (empty($data_services) || !is_array($data_services)) {
					ms(array(
						"status"  => "error",
						"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
					));
				}
				$i = 0;
				foreach ($data_services as $key => $row) {
					$rate = $row->rate;
					/*----------  Auto round up ----------*/
					$new_rate = round($rate + (($rate*$price_percentage_increase)/100), $decimal_places);
					if ($i < $bulk_limit || $bulk_limit == "all") {
						/*----------  check Category and add it  ----------*/
						$check_services = $this->model->get("id, ids, api_provider_id, api_service_id", $this->tb_services, "api_provider_id ='{$api->id}' AND api_service_id ='{$row->service}' AND uid = '".session('uid')."'");
						if(empty($check_services)){
							$category_name = trim($row->category);
							$check_category = $this->model->get("ids, id, name", $this->tb_categories, "name = '{$category_name}'");
							$service_type = strtolower(str_replace(" ", "_", $row->type));
							$data_service = array(
								"uid"             	=> session('uid'),
								"name"            	=> $row->name,
								"min"             	=> $row->min,
								"max"             	=> $row->max,
								"price"           	=> $new_rate,
								"add_type"        	=> 'api',
								"type"        	    => $service_type,
								"api_provider_id"  	=> $api->id,
								"api_service_id"  	=> $row->service,
								"dripfeed"  	    => $row->dripfeed,
								"ids"  				=> ids(),
								"status"  			=> 1,
								"changed"  			=> NOW,
								"created"  			=> NOW,
							);	

							if (!empty($check_category)) {
								$cate_id = $check_category->id;
								$data_service["cate_id"] = $cate_id;
								$this->db->insert($this->tb_services, $data_service);
								$i++;
							}else{
								/*----------  insert category  ----------*/
								$data_category = array(
									"ids"  			  => ids(),
									"uid"             => session('uid'),
									"name"            => $category_name,
									"sort"            => $i,
									"changed"         => NOW,
									"created"         => NOW,
								);

								$this->db->insert($this->tb_categories, $data_category);
								if ($this->db->affected_rows() > 0) {
									$cate_id = $this->db->insert_id();
									$data_service["cate_id"] = $cate_id;
									$this->db->insert($this->tb_services, $data_service);
									$i++;
								}
							}
							
						}else{
							$service_type = strtolower(str_replace(" ", "_", $row->type));
							$data_service = array(
								"uid"             	=> session('uid'),
								"name"            	=> $row->name,
								"min"             	=> $row->min,
								"max"             	=> $row->max,
								"dripfeed"  	    => $row->dripfeed,
								"price"           	=> $new_rate,
								"type"        	    => $service_type,
								"changed"  	        => NOW,
							);
							$this->db->update($this->tb_services, $data_service, ["api_service_id" => $row->service, "api_provider_id" => $api->id, "ids" => $check_services->ids ]);
						}
					}else{
						break;
					}

				}
				ms(array(
					"status"  => "success",
					"message" => lang("Update_successfully")
				));
			}else{
				ms(array(
					"status"  => "error",
					"message" => lang("api_provider_does_not_exists")
				));
			}

		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("api_provider_does_not_exists")
			));
		}
	}

	public function ajax_api_provider_services($ids = ""){
		if (!empty($ids)) {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}'");
			if (!empty($api)) {
				$data_post = array(
					'key' => $api->key,
		            'action' => 'services',
				);
				$data_services = $this->connect_api($api->url, $data_post);
				$data_services = json_decode($data_services);
				
				if (empty($data_services) || !is_array($data_services)) {
					ms(array(
						"status"  => "error",
						"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
					));
				}

				$data_columns = array(
					"service_id"       => lang("service_id"),
					"name"             => lang("Name"),
					"category"         => lang("Category"),
					"price"            => lang("rate_per_1000"),
					"min_max"          => lang("min__max_order"),
					"drip_feed"        => lang("dripfeed"),
				);
				
				$categories  = $this->model->fetch("*", $this->tb_categories, "status = 1", 'sort','ASC');
				$data = array(
					"api_id"	 => $api->id,
					"api_ids"	 => $api->ids,
					"module"     => get_class($this),
					"columns"    => $data_columns,
					"services"   => $data_services,
					"categories" => $categories,
				);
				$this->load->view("api/ajax_get_services", $data);
			}else{
				ms(array(
					"status"  => "error",
					"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
				));
			}
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
			));
		}
	}

	public function ajax_add_api_provider_service(){
		$api_provider_id    = post("api_provider_id");
		$api_service_id 	= post("service_id");
		$type 	            = post("type");
		$type               = strtolower(str_replace(" ", "_", $type));
		$name 				= post("name");
		$category			= post("category");
		$min	    		= post("min");
		$dripfeed	        = post("dripfeed");
		$max	    		= post("max");
		$price	    		= (float)post("price");
		$desc 				= post("desc");
		$price_percentage_increase = (int)post("price_percentage_increase");
		$decimal_places = get_option("auto_rounding_x_decimal_places", 2);
		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("name_is_required")
			));
		}

		if($category == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("category_is_required")
			));
		}

		if($min == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("min_order_is_required")
			));
		}

		if($max == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("max_order_is_required")
			));
		}

		if($min > $max){
			ms(array(
				"status"  => "error",
				"message" => lang("max_order_must_to_be_greater_than_min_order")
			));
		}

		if($price == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("price_invalid")
			));
		}

		if(strlen(substr(strrchr($price, "."), 1)) > $decimal_places || strlen(substr(strrchr($price, "."), 1)) < 0){
			ms(array(
				"status"  => "error",
				"message" => lang("price_invalid_format")
			));
		}

		$new_rate = round($price + (($price*$price_percentage_increase)/100), $decimal_places);
		$data = array(
			"uid"             => session('uid'),
			"cate_id"         => $category,
			"name"            => $name,
			"desc"            => $desc,
			"min"             => $min,
			"max"             => $max,
			"price"           => $new_rate,
			"add_type"        => 'api',
			"type"            => $type,
			"api_provider_id" => $api_provider_id,
			"api_service_id"  => $api_service_id,
			"dripfeed"        => $dripfeed,
		);

		$check_item = $this->model->get("ids", $this->tb_services, "api_provider_id ='{$api_provider_id}' AND api_service_id ='{$api_service_id}' AND uid = '".session('uid')."'");
		
		if(empty($check_item)){
			$data["ids"]     = ids();
			$data["status"]  = 1;
			$data["changed"] = NOW;
			$data["created"] = NOW;
			$this->db->insert($this->tb_services, $data);
		}else{
			$this->db->update($this->tb_services, $data, ["ids" => $check_item->ids]);
		}

		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
		
	}

	public function cron($type = ""){
		switch ($type) {
			case 'order':
				/*----------  Get all order through API  ----------*/
				$orders = $this->model->get_all_orders();
				if (!empty($orders)) {
					foreach ($orders as $key => $row) {
						$api = $this->model->get("url, key", $this->tb_api_providers, ["id" => $row->api_provider_id] );
						if (!empty($api)) {
							$data_post = array(
								'key' 	   => $api->key,
					            'action'   => 'add',
					            'service'  => $row->api_service_id,
							);

							switch ($row->service_type) {
								case 'subscriptions':
									$data_post["username"] = $row->username;
									$data_post["min"]      = $row->sub_min;
									$data_post["max"]      = $row->sub_max;
									$data_post["posts"]    = ($row->sub_posts == -1) ? 0 : $row->sub_posts ;
									$data_post["delay"]    = $row->sub_delay;
									$data_post["expiry"]   = (!empty($row->sub_expiry))? date("d/m/Y",  strtotime($row->sub_expiry)) : "";//change date format dd/mm/YYYY
									break;

								case 'custom_comments':
									$data_post["link"]     = $row->link;
									$data_post["comments"] = json_decode($row->comments);
									break;

								case 'mentions_with_hashtags':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["usernames"]    = $row->usernames;
									$data_post["hashtags"]     = $row->hashtags;
									break;

								case 'mentions_custom_list':
									$data_post["link"]         = $row->link;
									$data_post["usernames"]    = json_decode($row->usernames);
									break;

								case 'mentions_hashtag':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["hashtag"]      = $row->hashtag;
									break;
									
								case 'mentions_user_followers':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["username"]     = $row->username;
									break;

								case 'mentions_media_likers':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["media"]        = $row->media;
									break;

								case 'package':
									$data_post["link"]         = $row->link;
									break;	

								case 'custom_comments_package':
									$data_post["link"]         = $row->link;
									$data_post["comments"]     = json_decode($row->comments);
									break;

								case 'comment_likes':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["username"]     = $row->username;
									break;
								
								default:

									$data_post["link"] = $row->link;
									$data_post["quantity"] = $row->quantity;
									if (isset($row->is_drip_feed) && $row->is_drip_feed == 1) {
										$data_post["runs"]     = $row->runs;
										$data_post["interval"] = $row->interval;
										$data_post["quantity"] = $row->dripfeed_quantity;
									}else{
										$data_post["quantity"] = $row->quantity;
									}
									
									break;
							}
							$response = $this->connect_api($api->url, $data_post);
							$response = json_decode($response);

							if (isset($response->error) && $response->error != "") {
								echo $response->error."<br>";
								$data = array(
									"note"        => $response->error,
									"changed"     => NOW,
								);
								$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
							}

							if (!empty($response->order) && $response->order != "") {
								$this->db->update($this->tb_orders, ["api_order_id" => $response->order, "changed" => NOW], ["id" => $row->id]);
							}
						}else{
							echo "API Provider does not exists.<br>";
						}
					}

				}else{
					echo "There is no order at the present.<br>";
				}
				echo "Successfully";
				break;

			case 'status_subscriptions':
				$orders = $this->model->get_all_subscriptions_status();

				if (!empty($orders)) {
					foreach ($orders as $key => $row) {
						$api = $this->model->get("id, url, key", $this->tb_api_providers, ["id" => $row->api_provider_id] );
						if (!empty($api)) {
							$data_post = array(
								'key' 	   => $api->key,
					            'action'   => 'status',
					            'order'    => $row->api_order_id,
							);
							$response = $this->connect_api($api->url, $data_post);
							$response = json_decode($response);
							if (isset($response->error) && $response->error != "") {
								echo $response->error."<br>";
								$data = array(
									"note"        => $response->error,
									"changed"     => NOW,
								);
								$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
							}
							if (!empty($response->status) && $response->status != "") {
								$rand_time = rand(60, 300);
								$data = array(
									"sub_status"        		=> $response->status,
								    "sub_response_orders" 	    => json_encode($response->orders),
								    "sub_response_posts" 	    => $response->posts,
								    "note" 	                    => "",
								    "changed"           		=> date('Y-m-d H:i:s', strtotime(NOW) + $rand_time),
								);

								if ($response->status == "Completed" || $response->status == "Canceled") {
									if ($response->status == "Completed") {
										$data["status"] = strtolower($response->status);
									}
									if ($response->status == "Canceled") {
										$data["status"] = 'canceled';
									}
									
								}

								if (!empty($response->orders)) {
									foreach ($response->orders as $key => $order_id) {
										$check_order = $this->model->get("api_order_id", $this->tb_orders, ["api_order_id" => $order_id, "api_provider_id" => $api->id]);

										$data_post_order = array(
											'key' 	   => $api->key,
								            'action'   => 'status',
								            'order'    => $order_id,
										);
										$response_order = $this->connect_api($api->url, $data_post_order);
										$response_order = json_decode($response_order);
										if (isset($response_order->status) && empty($check_order)) {
											$data_order = array(
												"ids" 	        	            => ids(),
												"uid" 	        	            => $row->uid,
												"cate_id" 	    	            => $row->cate_id,
												"service_id" 		            => $row->service_id,
												"service_type" 		            => "default",
												"link" 	        	            => "https://www.instagram.com/".$row->username,
												"quantity" 	    	            => ($response_order->remains > 0) ? $response_order->remains : 0,
												"remains" 	    	            => $response_order->remains,
												"start_counter" 	            => $response_order->start_count,
												"charge" 	    	            => $response_order->charge,
												"api_provider_id"  	            => $row->api_provider_id,
												"api_service_id"  	            => $row->api_service_id,
												"api_order_id"  	            => $order_id,
												"status"			            => ($response_order->status == "In progress")? "inprogress" :  strtolower($response_order->status),
												"sub_response_posts"			=> 1,
												"changed" 	    	            => NOW,
												"created" 	    	            => NOW,
											);
											$this->db->insert($this->tb_orders, $data_order);
										}

									}

								}

								$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
							}

						}else{
							echo "API Provider does not exists.<br>";
						}
					}

				}else{
					echo "There is no order at the present.<br>";
				}
				echo "Successfully";
				break;

			case 'status':
				/*----------  Get all order through API  ----------*/
				$orders = $this->model->get_all_orders_status();
				
				if (!empty($orders)) {
					foreach ($orders as $key => $row) {
						$api = $this->model->get("url, key", $this->tb_api_providers, ["id" => $row->api_provider_id] );
						if (!empty($api)) {
							$data_post = array(
								'key' 	   => $api->key,
					            'action'   => 'status',
					            'order'    => $row->api_order_id,
							);
							$response = $this->connect_api($api->url, $data_post);
							$response = json_decode($response);
							if (isset($response->error) && $response->error != "") {
								echo $response->error."<br>";
								$data = array(
									"note"        => $response->error,
									"changed"     => NOW,
								);
								$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
							}

							if (isset($response->status) && $response->status != "") {
								$data = array();
								$rand_time = rand(300, 900);
								switch ($row->is_drip_feed) {
									case 1:
										if (isset($response->runs)) {
											$data = array(
											    "sub_response_orders" => json_encode($response),
											    "changed"             => date('Y-m-d H:i:s', strtotime(NOW) + $rand_time),
											    "status"             => ($response->status == "In progress") ? "inprogress" :  strtolower($response->status),
											);
										}
										break;
									
									default:

										$data = array(
										    "start_counter" => $response->start_count,
										    "remains"       => $response->remains,
										    "note" 	        => "",
										    "changed"       => date('Y-m-d H:i:s', strtotime(NOW) + $rand_time),
										    "status"        => ($response->status == "In progress") ? "inprogress" :  strtolower($response->status),
										);

										// Update quantity to order through subscriptions
										if ($row->sub_response_posts == 1 && $row->service_type == "default") {
											if ($response->remains > 0) {
												$data["quantity"] = $response->remains;
											}
											$rand_time_sub = rand(60, 120);
											$data["changed"] = date('Y-m-d H:i:s', strtotime(NOW) + $rand_time_sub);

											/*----------  Subtract userbalance with all order by subscriptions  ----------*/
											if ($response->status == "Completed" && $row->sub_response_posts == 1) {
												// calculate charge
												$quantity = $row->quantity;
												$service  = $this->model->get("price, id", $this->tb_services, ["id" => $row->service_id]);
												$total_charge = 0;
												if (empty($service)) {
													$total_charge = ($quantity*$service->price)/1000;
													if ($total_charge = 0) {
														$total_charge = $response->charge;
													}
												}else{
													$total_charge = $response->charge;
												}

												$user   = $this->model->get("id, balance", $this->tb_users, ["id"=> $row->uid]);
												if (!empty($user) && $total_charge > 0) {
													$balance = $user->balance;
													$balance = $balance - $total_charge;
													if ($balance < 0) {
														$balance = 0;
													}
													$this->db->update($this->tb_users, ["balance" => $balance], ["id"=> $row->uid]);
												}
												
												$data["charge"] = $total_charge;
											}
										}
										break;
								}


								if (!empty($data)) {
									/*----------  Add fund back when status equal Refunded, Partial  ----------*/
									if ($row->sub_response_posts != 1 && ($response->status == "Refunded" || $response->status == "Partial" || $response->status == "Canceled") ) {
										$charge = $row->charge;
										$user   = $this->model->get("id, balance", $this->tb_users, ["id"=> $row->uid]);
										if (!empty($user)) {
											$balance = $user->balance;
											$balance += $charge;
											$this->db->update($this->tb_users, ["balance" => $balance], ["id"=> $row->uid]);
										}
									}
									$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
								}
							}
							

						}else{
							echo "API Provider does not exists.<br>";
						}
					}

				}else{
					echo "There is no order at the present.<br>";
				}
				echo "Successfully";
				break;
		}
	}

	private function connect_api($url, $post = array("")) {
        $_post = Array();

        if (is_array($post)) {
          foreach ($post as $name => $value) {
            $_post[] = $name.'='.urlencode($value);
          }
        }

        if (is_array($post)) {
          $url_complete = join('&', $_post);
        }
        $url = $url."?".$url_complete;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'API (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
          $result = false;
        }
        curl_close($ch);
        return $result;
    }

}