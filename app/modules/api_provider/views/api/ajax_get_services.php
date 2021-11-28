<?php if(!empty($services)){
?>
<?php
  $api_id   = (!empty($api_id))? $api_id: '';
  $api_ids  = (!empty($api_ids))? $api_ids: '';
?>
<div class="col-md-12 col-xl-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?=lang("Lists")?></h3>
      <?php 
        if ($api_ids != "") {
      ?>
      <div class="card-options">
        <a href="<?=cn($module."/bulk_services/$api_ids")?>" class="ajaxModal btn btn-pill btn-info btn-sm"><span class="mr-1"><i class="fe fe-plus-square"></i></span><?=lang("bulk_add_all_services")?>
        </a>
      </div>
      <?php } ?>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-bordered table-vcenter card-table">
        <thead>
          <tr>
            <th class="text-center w-1"><?=lang("No_")?></th>
            <?php if (!empty($columns)) {
              foreach ($columns as $key => $row) {
            ?>
            <th><?=$row?></th>
            <?php }}?>
            
            <?php
              if (get_role("admin")) {
            ?>
            <th><?=lang("Action")?></th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($services)) {
            $i = 0;
            foreach ($services as $key => $row) {
            $i++;
          ?>
          <tr class="tr_<?=$row->service?>">
            <td  class="text-center"><?=$i?></td>
            <td>
                <div class="title"><?=$row->service?></div>
            </td>
            <td class=""><?=$row->name?> </td>
            <td class=""><?=$row->category?> </td>
            <td><?=currency_format($row->rate, 2)?></td>
            <td><?=$row->min?> / <?=$row->max?></td>
            <td class=""><?=($row->dripfeed == 1)? lang("Active") : lang("Deactive")?> </td>
            <td class="text-center">
              <div class="item-action dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="<?=cn("$module/add_service/")?>" data-serviceid="<?=$row->service?>" data-category="<?=$row->category?>" data-name="<?=$row->name?>" data-min="<?=$row->min?>" data-max="<?=$row->max?>" data-price="<?=$row->rate?>" data-type="<?=$row->type?>" data-dripfeed="<?=$row->dripfeed?>" data-api_provider_id="<?=$api_id?>" class="ajaxAddService dropdown-item"><i class="dropdown-icon fe fe-plus-square"></i> <?=lang("add_update_service")?></a>
                </div>
              </div>
            </td>
          </tr>
          <?php }}?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php }else{?>
<div class="col-md-12 data-empty text-center">
  <div class="content">
    <img class="img mb-1" src="<?=BASE?>assets/images/ofm-nofiles.png" alt="empty">
    <div class="title"><?=lang("look_like_there_are_no_results_in_here")?></div>
  </div>
</div>
<?php }?>

<div id="modal-add-service" class="modal fade" tabindex="-1">
  <div id="main-modal-content">
    <div class="modal-right">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          
          <form class="form actionForm" action="<?=cn($module."/ajax_add_api_provider_service")?>" method="POST">
            <div class="modal-header bg-pantone">
              <h4 class="modal-title"><i class="fa fa-edit"></i><?=lang("add_update_service")?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <div class="form-body">
                <div class="row justify-content-md-center">

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label ><?=lang("Name")?></label>
                      <input type="text" class="form-control square" name="name">
                      <input type="hidden" class="form-control square" name="service_id">
                      <input type="hidden" class="form-control square" name="api_provider_id">
                      <input type="hidden" class="form-control square" name="dripfeed">
                      <input type="hidden" class="form-control square" name="type">
                    </div>
                  </div>
                                  
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label><?=lang("choose_a_category")?></label>
                      <select  name="category" class="form-control square">
                        <?php if(!empty($categories)){
                          foreach ($categories as $key => $category) {
                        ?>
                        <option value="<?=$category->id?>" <?=(!empty($service->ids) && $category->id == $service->cate_id)? 'selected': ''?> ><?=$category->name?></option>
                       <?php }}?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label><?=lang("minimum_amount")?></label>
                      <input type="number" class="form-control square" name="min">
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label><?=lang("maximum_amount")?></label>
                      <input type="number" class="form-control square" name="max">
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label><?=lang("Price")?></label>
                      <input type="text" class="form-control square" name="price" disabled>
                      <input type="hidden" class="form-control square" name="price">
                    </div>
                  </div>
                  
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label><?=lang("price_percentage_increase")?> <?=sprintf(lang('auto_rounding_to_X_decimal_places'), get_option("auto_rounding_x_decimal_places", 2))?></label>
                      <select name="price_percentage_increase" class="form-control square">
                        <?php
                          for ($i = 0; $i <= 1000; $i++) {
                        ?>
                        <option value="<?=$i?>" <?=(get_option("default_price_percentage_increase", 30) == $i)? "selected" : ''?>><?=$i?>%</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label><?=lang("Description")?></label>
                      <textarea rows="3" id="editor" class="form-control square" name="desc"></textarea>
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
</div>

<script src="<?=BASE?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 100
  });
</script>