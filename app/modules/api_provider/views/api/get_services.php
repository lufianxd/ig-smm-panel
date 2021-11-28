<section class="page-title">
  <div class="row justify-content-between">
    <div class="col-md-6">
      <h1 class="page-title">
        <?=lang("list_of_api_services")?>
      </h1>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <select  name="api_ids" class="form-control order_by ajaxChange" data-url="<?=cn($module."/ajax_api_provider_services/")?>">
          <option value=""> <?=lang("choose_a_api_provider")?></option>
          <?php 
            if (!empty($api_lists)) {
              foreach ($api_lists as $row) {
          ?>
          <option value="<?=$row->ids?>"><?=$row->name?></option>
          <?php }}?>
        </select>
      </div>
    </div>
  </div>
</section>

<div class="row" id="result_ajaxSearch">
  <div class="col-md-12 data-empty text-center">
    <div class="content">
      <img class="img mb-1" src="<?=BASE?>assets/images/ofm-nofiles.png" alt="empty">
      <div class="title"><?=lang("look_like_there_are_no_results_in_here")?></div>
    </div>
  </div>
</div>
