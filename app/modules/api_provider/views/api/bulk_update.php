
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($api->ids))? $api->ids: '';
        ?>
        <form class="form actionForm" action="<?=cn($module."/ajax_bulk_services/$ids")?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?=lang("bulk_add_all_services")?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?=lang("api_provider_name")?></label>
                    <input type="text" class="form-control square" name="name" value="<?=(!empty($api->name))? $api->name: ''?>" disabled>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?=lang("api_url")?></label>
                    <input type="text" class="form-control square" name="api_url" value="<?=(!empty($api->url))? $api->url: ''?>" disabled>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?=lang("api_key")?></label>
                    <input type="text" class="form-control square" name="api_key" value="<?=(!empty($api->key))? $api->key: ''?>" disabled>
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
                    <label><?=lang("bulk_add_limit")?></label>
                    <select name="bulk_limit" class="form-control square">
                      <?php
                        for ($i = 0; $i <= 1000; $i++) {
                          if ($i % 25 == 0 && $i > 0) {
                      ?>
                      <option value="<?=$i?>"><?=$i?></option>
                      <?php }} ?>
                      <option value="all"><?=lang("All")?></option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <p class="text-primary"><?=lang("note_when_you_use_this_feature_the_system_will_bulk_add_services_categories_from_api_provider_and_set_price_percentage_increase")?></p>
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
