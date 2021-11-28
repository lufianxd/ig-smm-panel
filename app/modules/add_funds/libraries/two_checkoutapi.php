<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once("2checkout/Twocheckout.php");

/**
 * 
 */
class two_checkoutapi{
	
	public function __construct($two_checkout_privateKey = null, $two_checkout_sellerId = null, $mode = "") {
		Twocheckout::privateKey('245A85CD-7E54-4CED-BAC3-A70C5D02953F');
		Twocheckout::sellerId('901405797');
		if ($mode == "sandbox") {
			Twocheckout::sandbox(true);
		}else{
			Twocheckout::sandbox(false);
		}
	}

	/**
	 *
	 * Define Payment && Create payment.
	 *
	 */
	public function create_payment($data_charge = ""){
		$result = array();
		if (is_array($data_charge) && $data_charge["token"] != '') {
			try {
				// Charge a credit card
				$response = Twocheckout_Charge::auth($data_charge);
				if ($response['response']['responseCode'] == 'APPROVED') {
					$result = (object)array(
						"status" => "success",
						"response"    => $response['response'],
					);
				}else{
					$result = (object)array(
						"status" 		=> "error",
						"response"      => '',
					);
				}
			} catch (Twocheckout_Error $e) {
				$result = (object)array(
					"status" => "error",
					"message" => $e->getMessage(),
				);
			}

			return $result;
		}else{
			redirect(cn("add_funds"));
		}
	}
}


