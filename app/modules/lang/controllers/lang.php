<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class lang extends MX_Controller {
	public $table;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

		//Config Module
		$this->tb_language_list       = LANGUAGE_LIST;
		$this->tb_language    		  = LANGUAGE;
		$this->module_icon = "fa fa-language";
		$this->columns = array(
			"name"      => lang("Name"),
			"code"      => lang("Code"),
			"icon"      => lang("Icon"),
			"default"   => lang("Default"),
			"created"   => lang("Created"),
			"status"    => lang("Status"),
		);
	}

	public function index(){

		$data = array(
			"columns" => $this->columns,
			"module"  => get_class($this),
			"languages" => $this->model->fetch("*", $this->tb_language_list),
		);
		$this->template->build('index', $data);
	}

	public function update($ids = ''){
		$data = array(
			"module"  => get_class($this),
			"module_icon" => $this->module_icon,
		);
		if(!empty($ids)){
			$checkLang = $this->model->get('*', $this->tb_language_list, "ids = '{$ids}'");
			if(!empty($checkLang)){
				$data['lang']      = $checkLang;
				$lang_data = $this->model->fetch('*', $this->tb_language, "lang_code = '{$checkLang->code}'");
				$lang_db = array();
				if(!empty($lang_data)){
					foreach ($lang_data as $key => $row) {
						$lang_db[$row->slug] = $row->value;
					}
				}
				$data['lang_db'] = $lang_db;
			}else{
				load_404();
			}
		}
		$this->template->build('update', $data);
	}

	public function ajax_update($ids = ""){
		$language_code       = post('language_code');
		$country_code        = post('country_code');
		$status    		     = (int)post('status');
		$default    		 = (int)post('default');
		$langs               = post('lang');
		$data = array(
			"code"               => $language_code,
			"country_code"       => $country_code,
			"status"             => $status,
			"is_default"         => $default,
		);
		// check exists language code
		if(!language_codes($language_code)){
			ms(array(
				"status"  => "error",
				"message" => lang("language_code_does_not_exists")
			));
		}

		// Check lang defaut
		if($default == 1){
			$checkLangDefault = $this->model->fetch('*',$this->tb_language_list, "is_default = 1");
			if(!empty($checkLangDefault)){
				$this->db->update($this->tb_language_list, array('is_default' => 0));
			}
		}
		if ($ids != '') {
			// check lang exists
			$checkLangList = $this->model->get('code, ids', $this->tb_language_list, "ids = '{$ids}'");
			if(!empty($checkLangList)){
				$this->db->update($this->tb_language_list, $data, ['ids' => $ids]);
				if(is_array($langs) && !empty($langs)){
					foreach ($langs as $slug => $value) {
						$checklang = $this->model->get('*', $this->tb_language,"slug = '{$slug}' AND lang_code = '{$language_code}'");
						if(!empty($checklang)){
							$this->db->update( $this->tb_language, array('value' => $value) , array('slug' => $slug , 'lang_code' => $language_code));
						}else{
							$this->db->insert( $this->tb_language, array(
								"ids"        => ids(),
								"lang_code"  => $language_code,
								"slug"       => $slug,
								"value"      => $value,
							));
						}
					}
					ms(array(
						'status'  => 'success',
						'message' => lang("Update_successfully"),
					));
				}
			}

		} else {
			$checklang = $this->model->get('*', $this->tb_language_list, "code = '{$language_code}'");
			if(!empty($checklang)){
				ms(array(
					'status'  => 'error',
					'message' => lang("language_code_already_exists"),
				));
			}
			$data['ids']     = ids();
			$data['created'] = NOW;
			$this->db->insert($this->tb_language_list, $data);
			if(is_array($langs) && !empty($langs)){
				foreach ($langs as $slug => $value) {
					$checklang = $this->model->get('*', $this->tb_language,"slug = '{$slug}' AND lang_code = '{$language_code}'");
					if(empty($checklang)){
						$this->db->insert( $this->tb_language,array(
							"ids"        => ids(),
							"lang_code"  => $language_code,
							"slug"       => $slug,
							"value"      => $value,
						));
					}
				}
				ms(array(
					'status'  => 'success',
					'message' => lang("Update_successfully"),
				));
			}
		}
	}

	public function export(){
		export_csv($this->table);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_language_list, $ids, false);
	}

	public function set_language($ids = ""){
		$checkLang = $this->model->get('*', $this->tb_language_list, "ids = '{$ids}'");
		if(!empty($checkLang)){
			unset_session('langCurrent');
			set_session('langCurrent',$checkLang);
			ms(array(
				'status'  => 'success',
				'message' => lang("Update_successfully"),
			));
		}
	}
}