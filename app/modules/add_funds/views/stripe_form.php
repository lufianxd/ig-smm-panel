<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title"><?=lang("stripe_creditdebit_card_payment")?></h3>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <!-- display errors returned by createToken -->
              <div class="payment-errors alert alert-icon alert-danger alert-dismissible d-none">
                <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                <span class="payment-errors-message"></span>
              </div>
              <form id="paymentFrm" method="post" action="<?=cn($module."/stripe/create_payment")?>">
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
                  <input type="number" class="form-control card-number" name="card_num" id="card_num" autocomplete="off" required>
                </div>
                <div class="row">
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label  class="form-label"><span class="hidden-xs"><?=lang("expiry_date")?></span> </label>
                      <div class="input-group">
                        <input type="number" name="exp_month" id="exp_month" class="card-expiry-month form-control" placeholder="MM" required>
                        <input type="number" name="exp_year" id="exp_year" class="card-expiry-year form-control" placeholder="YY" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="form-label">CVV</label>
                      <input type="number" name="cvv" id="cvv" class="form-control card-cvc" autocomplete="off" required>
                    </div>
                  </div>
                </div>
                
                <!-- hidden token input -->
                
                <!-- submit button -->
                <input type="submit" id="payBtn" class="btn btn-primary btn-lg btn-block" value="<?=lang("Submit")?>">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 2Checkout JavaScript library -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey("<?=get_option("stripe_publishable_key", '')?>");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").removeClass('d-none');
        $(".payment-errors-message").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>