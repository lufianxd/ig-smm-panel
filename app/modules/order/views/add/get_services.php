

<label><?=lang("order_service")?></label>
<select name="service_id" class="form-control square ajaxChangeService" data-url="<?=cn($module."/order/get_service/")?>">
  <option> <?=lang("choose_a_service")?></option>
  <?php
    if (!empty($services)) {
      $service_item_default = $services[0];
      foreach ($services as $key => $service) {
  ?>
  <option value="<?=$service->id?>" data-type="<?=$service->type?>" data-dripfeed="<?=$service->dripfeed?>"><?=$service->name?></option>
  <?php }}?>
</select>
