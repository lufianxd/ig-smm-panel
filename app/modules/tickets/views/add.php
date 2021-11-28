<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" id="add_new_ticket">
        <form class="form actionForm" action="<?=cn($module."/ajax_add")?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fe fe-edit"></i> <?=lang("add_new_ticket")?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" >
            <div class="form-body">
              <div class="row justify-content-md-center">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Subject")?></label>
                    <select name="subject" class="form-control square ajaxChangeTicketSubject">
                      <option value="subject_order"><?=lang("Order")?></option>
                      <option value="subject_payment"><?=lang("Payment")?></option>
                      <option value="subject_service"><?=lang("Service")?></option>
                      <option value="subject_other"><?=lang("Other")?></option>
                    </select>
                  </div>

                  <div class="form-group subject-order">
                    <label><?=lang("Request")?></label>
                    <select name="request" class="form-control square">
                      <option value="refill"><?=lang("Refill")?></option>
                      <option value="cancellation"><?=lang("Cancellation")?></option>
                      <option value="speed_up"><?=lang("Speed_Up")?></option>
                      <option value="other"><?=lang("Other")?></option>
                    </select>
                  </div>

                  <div class="form-group subject-order">
                    <label><?=lang("order_id")?></label>
                    <input class="form-control square" type="text" name="orderid" placeholder="<?=lang("for_multiple_orders_please_separate_them_using_comma_example_123451234512345")?>">
                  </div>

                  <div class="form-group subject-payment d-none">
                    <label><?=lang("Payment")?></label>
                    <select name="payment" class="form-control square">
                      <option value="paypal"><?=lang("Paypal")?></option>
                      <option value="stripe"><?=lang("Stripe")?></option>
                      <option value="twocheckout"><?=lang("2Checkout")?></option>
                      <option value="other"><?=lang("Other")?></option>
                    </select>
                  </div>

                  <div class="form-group subject-payment d-none">
                    <label><?=lang("Transaction_ID")?></label>
                    <input class="form-control square" type="text" name="transaction_id" placeholder="<?=lang("enter_the_transaction_id")?>">
                    </select>
                  </div>
                </div> 
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Description")?></label>
                    <textarea rows="3" id="editor" class="form-control square" name="description"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang("Submit")?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?=lang("Cancel")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?=BASE?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 200
  });
</script>