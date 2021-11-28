<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="form-group">
    <label><?=lang("service_name")?></label>
    <input type="hidden" name="service_id" id="service_id" value="<?=(!empty($service->id))? $service->id :''?>">
    <input type="hidden" class="form-control square" name="api_service_id" value="<?=(!empty($service->api_service_id))? $service->api_service_id : ''?>">
    <input type="hidden" class="form-control square" name="api_provider_id" value="<?=(!empty($service->api_provider_id))? $service->api_provider_id : ''?>">
    <input class="form-control square" name="service_type" type="hidden" value="<?=(!empty($service->type))? $service->type :''?>">
    <input class="form-control square" name="service_name" type="text" value="<?=(!empty($service->name))? $service->name :''?>" disabled>
  </div>
</div>   

<div class="col-md-4  col-sm-12 col-xs-12">
  <div class="form-group">
    <label><?=lang("minimum_amount")?></label>
    <input class="form-control square" name="service_min" type="text" value="<?=(!empty($service->min))? $service->min :''?>" id="min_amount" disabled>
  </div>
</div>

<div class="col-md-4  col-sm-12 col-xs-12">
  <div class="form-group">
    <label><?=lang("maximum_amount")?></label>
    <input class="form-control square" name="service_max" type="text" value="<?=(!empty($service->max))? $service->max :''?>" id="max_amount" disabled>
  </div>
</div>

<div class="col-md-4  col-sm-12 col-xs-12">
  <div class="form-group">
    <label><?=lang("price_per_1000")?> (<?=get_option("currency_symbol","")?>)</label>
    <input class="form-control square" name="service_price" type="text" value="<?=(!empty($service->price))? $service->price :'0.0'?>" disabled>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="form-group">
    <label for="userinput8"><?=lang("Description")?></label>
    <textarea id="editor" rows="2" name="service_desc" id="service_desc" class="form-control square" disabled>
      <?=(!empty($service->desc))? $service->desc :''?>
    </textarea>
  </div>
</div>



<script src="<?=BASE?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 100
  });
</script>