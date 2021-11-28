
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-settings"></i> <?=lang("default_setting")?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?=cn($module)?>">
          <div class="row">

            <div class="col-md-12 col-lg-12">
              
              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("Pagination")?></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("limit_the_maximum_number_of_rows_per_page")?></label>
                    <select name="default_limit_per_page" class="form-control square">
                      <?php
                        for ($i = 1; $i <= 100; $i++) {
                          if ($i%5 == 0) {
                      ?>
                      <option value="<?=$i?>" <?=(get_option("default_limit_per_page", 10) == $i)? "selected" : ''?>><?=$i?></option>
                      <?php }} ?>
                    </select>
                  </div>
                </div>   
              </div>   

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("price_percentage_increase")?></h5>
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("use_for_sync_and_bulk_add_services")?></label>
                    <select name="default_price_percentage_increase" class="form-control square">
                      <?php
                        for ($i = 1; $i <= 1000; $i++) {
                      ?>
                      <option value="<?=$i?>" <?=(get_option("default_price_percentage_increase", 30) == $i)? "selected" : ''?>><?=$i?>%</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>  
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=sprintf(lang('auto_rounding_to_X_decimal_places'), "X")?></label>
                    <select name="auto_rounding_x_decimal_places" class="form-control square">
                      <?php
                        for ($i = 1; $i <= 4; $i++) {
                      ?>
                      <option value="<?=$i?>" <?=(get_option("auto_rounding_x_decimal_places", 2) == $i)? "selected" : ''?>><?=$i?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>   

              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("default_tickets_log")?></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="custom-controls-stacked">
                    <label class="form-label"><?=lang("auto_clear_ticket_lists")?></label>
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="is_clear_ticket" value="0">
                      <input type="checkbox" class="custom-control-input" name="is_clear_ticket" value="1" <?=(get_option('is_clear_ticket',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label"><?=lang("clear_ticket_lists_after_x_days_without_any_response_from_user")?></label>
                    <select  name="default_clear_ticket_days" class="form-control square">
                      <?php 
                        for ($i = 1; $i <= 90; $i++) { 
                      ?>
                      <option value="<?=$i?>" <?=(get_option('default_clear_ticket_days', 30) == $i)? 'selected': ''?>> <?=$i?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("default_service")?></h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label"><?=lang("default_min_order")?></label>
                    <input class="form-control" name="default_min_order" value="<?=get_option('default_min_order', 300)?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label"><?=lang("default_max_order")?></label>
                    <input class="form-control" name="default_max_order" value="<?=get_option('default_max_order', 5000)?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label"><?=lang("default_price_per_1000")?></label>
                    <input class="form-control" name="default_price_per_1k" value="<?=get_option('default_price_per_1k',"0.80")?>">
                  </div>
                </div>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("dripfeed_option")?></h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_drip_feed" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_drip_feed" value="1" <?=(get_option('enable_drip_feed',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                  <small class="text-danger"><?=lang("note_please_make_sure_the_dripfeed_feature_has_the_active_status_in_api_provider_before_you_activate")?></small>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("default_runs")?> </label>
                    <input class="form-control" name="default_drip_feed_runs" value="<?=get_option('default_drip_feed_runs', 10)?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("default_interval_in_minutes")?></label>
                    <select name="default_drip_feed_interval" class="form-control square">
                      <?php
                        for ($i = 1; $i <= 60; $i++) {
                          if ($i%10 == 0) {
                      ?>
                      <option value="<?=$i?>" <?=(get_option("default_drip_feed_interval", 30) == $i)? "selected" : ''?>><?=$i?></option>
                      <?php }} ?>
                    </select>
                  </div>
                </div>    

              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("explication_of_the_service_symbol")?></h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_explication_service_symbol" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_explication_service_symbol" value="1" <?=(get_option('enable_explication_service_symbol',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>
              </div>

              <h5 class="text-info m-t-10"><i class="fe fe-link"></i> <?=lang("displays_the_service_lists_without_login_or_register")?></h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_service_list_no_login" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_service_list_no_login" value="1" <?=(get_option('enable_service_list_no_login',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>
              </div>

              <h5 class="text-info m-t-10"><i class="fe fe-link"></i> <?=lang("displays_news__announcement_feature")?></h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_news_announcement" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_news_announcement" value="1" <?=(get_option('enable_news_announcement',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>
              </div>

            </div> 
            <div class="col-md-8">
              <div class="form-footer">
                <button class="btn btn-primary btn-min-width btn-lg text-uppercase"><?=lang("Save")?></button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
