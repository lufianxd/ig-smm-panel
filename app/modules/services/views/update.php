
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($service->ids))? $service->ids: '';
        ?>
        <form class="form actionForm" action="<?=cn($module."/ajax_update/$ids")?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?=lang("edit_service")?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group emoji-picker-container">
                    <label ><?=lang("package_name")?></label>
                    <input type="text"  data-emojiable="true" class="form-control square" name="name" value="<?=(!empty($service->name))? $service->name: ''?>">
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
                    <input type="number" class="form-control square" name="min" value="<?=(!empty($service->min))? $service->min :  get_option('default_min_order',"")?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("maximum_amount")?></label>
                    <input type="number" class="form-control square" name="max" value="<?=(!empty($service->max))? $service->max : get_option('default_max_order',"")?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("Price")?></label>
                    <input type="text" class="form-control square" name="price" value="<?=(!empty($service->price))? $service->price: currency_format(get_option('default_price_per_1k',"0.80"),2)?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("Status")?></label>
                    <select name="status" class="form-control square">
                      <option value="1" <?=(!empty($service->status) && $service->status == 1)? 'selected': ''?>><?=lang("Active")?></option>
                      <option value="0" <?=(isset($service->status) && $service->status != 1)? 'selected': ''?>><?=lang("Deactive")?></option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("dripfeed")?></label>
                    <select name="dripfeed" class="form-control square">
                      <option value="0" <?=(isset($service->dripfeed) && $service->dripfeed != 1)? 'selected': ''?>><?=lang("Deactive")?></option>
                      <option value="1" <?=(!empty($service->dripfeed) && $service->dripfeed == 1)? 'selected': ''?>><?=lang("Active")?></option>
                    </select>
                  </div>
                </div>

                <?php
                  if (!empty($service->add_type) && $service->add_type != "") {
                ?>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("Type")?></label>
                    <input type="text" class="form-control square" value="<?=(!empty($service->add_type) && $service->add_type == "api")? lang('API'): lang('Manual')?>" disabled>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("api_provider_name")?></label>
                    <input type="text" class="form-control square" value="<?=(!empty($service->api_provider_id) && $service->api_provider_id != "") ? get_field(API_PROVIDERS, ['id' => $service->api_provider_id], "name") : ""?>" disabled>
                  </div>
                </div>
                <?php }?>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Description")?></label>
                    <textarea rows="3" id="editor" class="form-control square" name="desc"><?=(!empty($service->desc))? html_entity_decode(utf8_decode($service->desc), ENT_QUOTES): ''?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="<?=cn("api_provider/services")?>" class="btn round btn-info btn-min-width mr-1 mb-1"><?=lang("add_new_service_via_api")?></a>
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

<script>
  $(function() {
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: "<?=BASE?>assets/plugins/emoji-picker/lib/img/",
      popupButtonClasses: 'fa fa-smile-o'
    });
    window.emojiPicker.discover();
  });
</script>