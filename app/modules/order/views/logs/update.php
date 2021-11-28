
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($order->ids))? $order->ids: '';
        ?>
        <form class="form actionForm" action="<?=cn($module."/ajax_logs_update/$ids")?>" data-redirect="<?=cn($module."/log")?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?=lang("Edit_Order")?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label ><?=lang("order_id")?></label>
                    <input type="text" class="form-control square"  disabled value="<?=(!empty($order->id))? $order->id: ''?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label ><?=lang("api_orderid")?></label>
                    <input type="text" class="form-control square"  disabled value="<?=(!empty($order->api_order_id) && $order->api_order_id > 0)? $order->api_order_id: ''?>">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Type")?></label>
                    <input type="text" class="form-control square"  disabled value="<?=(!empty($order->api_order_id) && $order->api_order_id != 0 )? lang("API"): lang("Manual")?>">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?=lang("User")?></label>
                    <input type="text" class="form-control square" name="user_id" disabled value="<?=(!empty($order->uid))? get_field(USERS, ["id" => $order->uid], 'email'): ''?>">
                  </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?=lang("Service")?></label>
                    <input type="text" class="form-control square" name="service_id" disabled value="<?=(!empty($order->service_id))? get_field(SERVICES, ["id" => $order->service_id], 'name'): ''?>">
                  </div>
                </div>  
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label ><?=lang("Quantity")?></label>
                    <input type="text" class="form-control square" name="quantity" disabled value="<?=(!empty($order->quantity))? $order->quantity : ''?>">
                  </div>
                </div>    

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label ><?=lang("Amount")?></label>
                    <input type="text" class="form-control square" name="charge" disabled value="<?=(!empty($order->charge))? $order->charge : ''?>">
                  </div>
                </div>
                
                <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("Start_counter")?></label>
                    <input type="number" class="form-control square" name="start_counter" value="<?=(!empty($order->start_counter))? $order->start_counter : ''?>">
                  </div>
                </div>    
                            
                <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("Remains")?></label>
                    <input type="number" class="form-control square" name="remains" value="<?=(!empty($order->remains))? $order->remains : ''?>">
                  </div>
                </div>
                
                <div class="col-md-4 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("Status")?></label>
                    <select  name="status" class="form-control square">
                      <?php 
                        $order_status_array = order_status_array();
                        if(!empty($order_status_array)){
                        foreach ($order_status_array as $status) {
                      ?>
                      <option value="<?=$status?>" <?=(!empty($order->status) && $status == $order->status)? 'selected': ''?> ><?=order_status_title($status)?></option>
                     <?php }}?>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?=lang("Link")?></label>
                    <input type="text" class="form-control square" name="link" value="<?=(!empty($order->link))? $order->link : ''?>">
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
