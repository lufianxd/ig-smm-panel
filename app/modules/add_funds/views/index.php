
<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <div class="tabs-list">
              <ul class="nav nav-tabs">
                <?php
                  if (!get_option("is_active_paypal") && !get_option("is_active_stripe") && !get_option("is_active_2checkout") && !get_option("is_active_manual")) {
                ?>
                <li class="">
                  <a class="active show" data-toggle="tab" href="#payment_null">Payment Gateway</a>
                </li>
                <?php }?>

                <?php
                if (get_option("is_active_paypal")) {
                ?>
                <li class="">
                  <a class="active show" data-toggle="tab" href="#paypal"><i class="fa fa-cc-paypal"></i> <?=lang("Paypal")?></a>
                </li>
                <?php }?>
                <?php
                if (get_option("is_active_stripe")) {
                ?>
                <li>
                  <a data-toggle="tab" href="#stripe"><i class="fa fa-cc-stripe"></i> <?=lang("Stripe")?></a>
                </li> 
                <?php }?>
                <?php
                if (get_option("is_active_2checkout")) {
                ?>
                <li>
                  <a data-toggle="tab" href="#2checkout"><i class="fa fa-credit-card"></i> <?=lang("2Checkout")?></a>
                </li> 
                <?php }?>
                <?php
                if (get_option("is_active_manual")) {
                ?>
                <li>
                  <a data-toggle="tab" href="#manual"><i class="fa fa-hand-o-right"></i> <?=lang("manual_payment")?></a>
                </li>
                <?php }?>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">

              <?php
                  if (!get_option("is_active_paypal") && !get_option("is_active_stripe") && !get_option("is_active_2checkout") && !get_option("is_active_manual")) {
                ?>
                <div id="payment_null" class="tab-pane fade in active show">
                    <div class="row">
                      <div class="col-md-12">
                        
                        <div class="form-group">
                          <div class="alert alert-danger p-t-10" role="alert">
                            <?=lang("there_is_no_any_payment_gateway_at_the_present")?>
                          </div>
                        </div>

                      </div>  
                    </div>
                </div>
              <?php }?>

              <?php
                if (get_option("is_active_paypal")) {
              ?>
              <div id="paypal" class="tab-pane fade in active show">
                <form class="form actionForm" action="<?=cn($module."/process")?>" data-redirect="<?=cn($module."/paypal/create_payment")?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <?php 
                        if (get_option("paypal_client_id", '') != "" && get_option("paypal_client_secret", '') != "") {
                      ?>
                      <div class="for-group text-center">
                        <img src="<?=BASE?>/assets/images/paypal.svg" alt="Paypay icon">
                        <p class="p-t-10"><small><?=sprintf(lang("you_can_deposit_funds_with_paypal_they_will_be_automaticly_added_into_your_account"), 'Paypal')?></small></p>
                      </div>

                      <div class="form-group">
                        <label><?=sprintf(lang("amount_usd"), get_option("currency_code",''))?></label>
                        <input class="form-control square" type="number" name="amount" placeholder="<?=get_option('currency_symbol').get_option('payment_transaction_min')?>">
                        <input type="hidden" name="payment_method" value="paypal">
                      </div>                      

                      <div class="form-group">
                        <small class=""><?=lang("transaction_fee")?>: <strong><?=(get_option("paypal_chagre_fee", 4))?>%</strong></small>
                      </div>

                      <div class="form-group">
                        <label class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="agree" value="1">
                          <span class="custom-control-label"><?=lang("yes_i_understand_after_the_funds_added_i_will_not_ask_fraudulent_dispute_or_chargeback")?></span>
                        </label>
                      </div>
                      
                      <div class="form-actions left">
                        <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1">
                          <?=lang("Pay")?>
                        </button>
                      </div>

                      <?php }else{?>
                      <div class="form-group">
                        <div class="alert alert-danger p-t-10" role="alert">
                          <?=lang("this_payment_gateway_is_not_already_active_at_the_present")?>
                        </div>
                      </div>
                      <?php }?>

                    </div>  
                  </div>
                </form>
              </div>
              <?php }?>
              <?php
                if (get_option("is_active_stripe")) {
              ?>
              <div id="stripe" class="tab-pane fade">
                <form class="form actionForm" action="<?=cn($module."/process")?>" data-redirect="<?=cn($module."/stripe_form")?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <?php 
                        if (get_option("stripe_secret_key", '') != "" && get_option("stripe_publishable_key", '') != "") {
                      ?>
                      <div class="for-group text-center">
                        <img src="<?=BASE?>/assets/images/payments/stripe-dark.svg" alt="Stripe icon">
                        <p class="p-t-10"><small><?=sprintf(lang("you_can_deposit_funds_with_paypal_they_will_be_automaticly_added_into_your_account"), 'Stripe')?></small></p>
                      </div>

                      <div class="form-group">
                        <label><?=sprintf(lang("amount_usd"), get_option("currency_code",''))?></label>
                        <input class="form-control square" type="number" name="amount" placeholder="<?=get_option('currency_symbol').get_option('payment_transaction_min')?>" id="">
                        <input type="hidden" name="payment_method" value="stripe">
                      </div>

                      <div class="form-group">
                        <small class=""><?=lang("transaction_fee")?>: <strong><?=(get_option("stripe_chagre_fee", 4))?>%</strong></small>
                      </div>

                      <div class="form-group">
                        <label class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="agree" value="1">
                          <span class="custom-control-label"><?=lang("yes_i_understand_after_the_funds_added_i_will_not_ask_fraudulent_dispute_or_chargeback")?></span>
                        </label>
                      </div>
                      
                      <div class="form-actions left">
                        <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1">
                          <?=lang("Pay")?>
                        </button>
                      </div>
                      <?php }else{?>
                      <div class="form-group">
                        <div class="alert alert-danger p-t-10" role="alert">
                          <?=lang("this_payment_gateway_is_not_already_active_at_the_present")?>
                        </div>
                      </div>
                      <?php }?>
                    </div> 
                  </div> 
                </form>
              </div>
              <?php }?>
              <?php
                if (get_option("is_active_2checkout")) {
              ?>
              <div id="2checkout" class="tab-pane fade">
                <form class="form actionForm" action="<?=cn($module."/process")?>" data-redirect="<?=cn($module."/two_checkout_form")?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <?php 
                        if (get_option("2checkout_publishable_key", '') != "" && get_option("2checkout_private_key", '') != "" && get_option("2checkout_seller_id", '') != "") {
                      ?>
                      <div class="for-group text-center">
                        <img src="<?=BASE?>/assets/images/2checkout.svg" alt="2checkout icon">
                        <p class="p-t-10"><small><?=sprintf(lang("you_can_deposit_funds_with_paypal_they_will_be_automaticly_added_into_your_account"), '2Checkout')?></small></p>
                      </div>

                      <div class="form-group">
                        <label><?=sprintf(lang("amount_usd"), get_option("currency_code",''))?></label>
                        <input class="form-control square" type="number" name="amount" placeholder="<?=get_option('currency_symbol').get_option('payment_transaction_min')?>" id="">
                        <input type="hidden" name="payment_method" value="two_checkout">
                      </div>


                      <div class="form-group">
                        <small class=""><?=lang("transaction_fee")?>: <strong><?=(get_option("twocheckout_chagre_fee", 4))?>%</strong></small>
                      </div>

                      <div class="form-group">
                        <label class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="agree" value="1">
                          <span class="custom-control-label"><?=lang("yes_i_understand_after_the_funds_added_i_will_not_ask_fraudulent_dispute_or_chargeback")?></span>
                        </label>
                      </div>
                      
                      <div class="form-actions left">
                        <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1">
                          Pay
                        </button>
                      </div>
                      <?php }else{?>
                      <div class="form-group">
                        <div class="alert alert-danger p-t-10" role="alert">
                          <?=lang("this_payment_gateway_is_not_already_active_at_the_present")?>
                        </div>
                      </div>
                      <?php }?>
                    </div>  
                  </div>
                </form>
              </div>
              <?php }?>
              <?php
                if (get_option("is_active_manual")) {
              ?>
              <div id="manual" class="tab-pane fade">
                <form class="form actionForm" action="#" data-redirect="<?=cn($module."/log")?>" method="POST">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="form-group">
                        <p class="p-t-10">
                        <?=lang("you_can_make_a_manual_payment_to_cover_an_outstanding_balance_you_can_use_any_payment_method_in_your_billing_account_for_manual_once_done_open_a_ticket_and_contact_with_administrator")?>
                        </p>
                      </div>

                    </div> 
                  </div> 
                </form>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

