<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($order->ids))? $order->ids: '';
        ?>
        <form class="form actionForm" action="<?=cn($module."/ajax_update/$ids")?>" data-redirect="<?=cn($module)?>" method="POST">
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
                    <input type="text" class="form-control square"  disabled value="<?=(!empty($order->api_service_id) && $order->api_service_id > 0 )? lang("API"): lang("Manual")?>">
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
                    <label ><?=lang("Runs")?></label>

                    <input type="text" class="form-control square" name="runs" disabled value="<?=(!empty($order->runs))? $order->runs: ''?>" >
                  </div>
                </div> 

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("interval")?></label>
                    <input type="text" class="form-control square" name="interval" disabled value="<?=(!empty($order->interval) && $order->interval > 0)? $order->interval : ''?>">
                  </div>
                </div> 
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Status")?></label>
                    <select  name="status" class="form-control square">
                      <?php 
                        $order_dripfeed_status_array = order_dripfeed_status_array();
                        if(!empty($order_dripfeed_status_array)){
                        foreach ($order_dripfeed_status_array as $status) {
                      ?>
                      <option value="<?=$status?>" <?=(!empty($order->status) && $status == $order->status)? 'selected': ''?> ><?=($status == 'inprogress') ? lang("Active") : order_status_title($status)?></option>
                     <?php }}?>
                    </select>
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
