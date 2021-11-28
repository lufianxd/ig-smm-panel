

<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title"><?=lang("2checkout_creditdebit_card_payment")?></h3>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <form id="paymentFrm" method="post" action="<?=cn($module."/two_checkout/create_payment")?>">

                <div class="form-group">
                  <label class="form-label"><?=sprintf(lang("amount_usd"), get_option("currency_code",''))?></label>
                  <input type="number" class="form-control" value="<?=$amount?>" disabled>
                </div>

                <div class="form-group">
                  <label class="form-label"><?=lang("user_information")?></label>
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-user"></i>
                    </span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="<?=lang("Your_name")?>" required autofocus>
                  </div>    

                  <div class="input-icon m-t-20">
                    <span class="input-icon-addon">
                      <i class="fe fe-mail"></i>
                    </span>
                    <input type="text" class="form-control" name="email" id="email" placeholder="<?=lang("Email")?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label"><?=lang("card_number")?></label>
                  <input type="number" class="form-control" name="card_num" id="card_num" autocomplete="off" required>
                </div>
                <div class="row">
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label  class="form-label"><span class="hidden-xs"><?=lang("expiry_date")?></span> </label>
                      <div class="input-group">
                        <input type="number" name="exp_month" id="exp_month" class="form-control" placeholder="MM" required>
                        <input type="number" name="exp_year" id="exp_year" class="form-control" placeholder="YY" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="form-label">CVV</label>
                      <input type="number" name="cvv" id="cvv" class="form-control" autocomplete="off" required>
                    </div>
                  </div>
                </div>
                
                <!-- hidden token input -->
                <input id="token" name="token" type="hidden" value="">
                
                <!-- submit button -->
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="<?=lang("Submit")?>">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 2Checkout JavaScript library -->
<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
<?php
  if (get_option('payment_environment',"") == "sandbox") {
    $payment_environment = 'sandbox';
  }else{
    $payment_environment = 'production';
  }
?>
<script>
// Called when token created successfully.
var successCallback = function(data) {
  var myForm = document.getElementById('paymentFrm');

  // Set the token as the value for the token input
  myForm.token.value = data.response.token.token;

  // Form submission
  myForm.submit();
};

// Called when token creation fails.
var errorCallback = function(data) {
  if (data.errorCode === 200) {
    tokenRequest();
  } else {
    alert(data.errorMsg);
  }
};

var tokenRequest = function() {
  // Setup token request arguments
  var args = {
    sellerId: "<?=get_option('2checkout_seller_id',"")?>",
    publishableKey: "<?=get_option('2checkout_publishable_key',"")?>",
    ccNo: $("#card_num").val(),
    cvv: $("#cvv").val(),
    expMonth: $("#exp_month").val(),
    expYear: $("#exp_year").val()
  };

  // Make the token request
  TCO.requestToken(successCallback, errorCallback, args);
};

$(function() {
  // Pull in the public encryption key for our environment
  TCO.loadPubKey("<?=$payment_environment?>");

  $("#paymentFrm").submit(function(e) {
    // Call our token request function
    tokenRequest();
    // Prevent form from submitting
    return false;
  });
});
</script>