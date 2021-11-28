<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'paypal/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
/**
 * Paypal PHP SDK
 */
class paypalapi {
	private $apiContext;
	
	public function __construct($paypal_client_id = null, $paypal_client_secret = null, $mode = "") {
		if ($paypal_client_secret != "" && $paypal_client_id != "") {
			$this->apiContext = new \PayPal\Rest\ApiContext(
		        new \PayPal\Auth\OAuthTokenCredential($paypal_client_id, $paypal_client_secret)
			);
		}
	}

	/**
	 *
	 * Define Payment && Create payment.
	 *
	 */
	function  create_payment($data = "", $mode){
		/*----------  Set Sanbox mode or Live  ----------*/
		$this->apiContext->setConfig(
	        array(
	            'mode' => $mode,
	        )
	    );
		
		// Create new payer and method
		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		// Set redirect URLs
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($data->redirectUrls)
		  ->setCancelUrl($data->cancelUrl);

		// Set payment amount
		$amount = new Amount();
		$amount->setCurrency($data->currency)
		  ->setTotal($data->amount);

		// Set transaction object
		$transaction = new Transaction();
		$transaction->setAmount($amount)
		  ->setDescription("Payment description");

		// Create the full payment object
		$payment = new Payment();
		$payment->setIntent('sale')
		  ->setPayer($payer)
		  ->setRedirectUrls($redirectUrls)
		  ->setTransactions(array($transaction));
		
		// Create payment with valid API context
		try {
		  	$payment->create($this->apiContext);

		  	// Get PayPal redirect URL and redirect the customer
		  	$approvalUrl = $payment->getApprovalLink();

		  // Redirect the customer to $approvalUrl
		  	redirect($approvalUrl);
		} catch (PayPal\Exception\PayPalConnectionException $ex) {
		  pr($ex->getMessage(), 1);
		} 

	}

	/**
	 *
	 * Execute payment 
	 * If the customer accepts the payment, you can execute the payment.
	 * To execute the payment, set the payment ID and payer ID parameters in the request:
	 *
	 */
	public function execute_payment($paymentId, $payerId, $mode){

		$this->apiContext->setConfig(
	        array(
	            'mode' => $mode,
	        )
	    );
		// Get payment object by passing paymentId
		$payment = Payment::get($paymentId, $this->apiContext);
		// Execute payment with payer ID
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		try {
		  // Execute payment
		  $result = $payment->execute($execution, $this->apiContext);
		} catch (PayPal\Exception\PayPalConnectionException $ex) {
		  pr($ex->getMessage(), 1);
		  die($ex);
		}

		return $result;
	}
}