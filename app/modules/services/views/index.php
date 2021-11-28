<section class="page-title m-b-20">
  <div class="row justify-content-between">
    <div class="col-md-2">
      <h1 class="page-title">
        <?php 
          if(get_role("admin")) {
        ?>
        <a href="<?=cn("$module/update")?>" class="ajaxModal"><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="<?=lang("add_new")?>" data-original-title="Add new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span></a> 
        <?php }else{?>
          <i class="fe fe-list" aria-hidden="true"> </i> 
        <?php }?>
        <?=lang("Services")?>
      </h1>
    </div>
    <div class="col-md-10">
      <?php
        if (get_option("enable_explication_service_symbol")) {
      ?>
      <div class="btn-list">
        <span class="btn round btn-secondary ">⭐ = <?=lang("__good_seller")?></span>
        <span class="btn round btn-secondary ">⚡️ = <?=lang("__speed_level")?></span>
        <span class="btn round btn-secondary ">🔥 = <?=lang("__hot_service")?></span>
        <span class="btn round btn-secondary ">💎 = <?=lang("__best_service")?></span>
        <span class="btn round btn-secondary ">💧 = <?=lang("__drip_feed")?></span>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($categories)){
    foreach ($categories as $key => $services) {
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=$key?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <?php if (!empty($services)) {
      ?>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-outline table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1">ID</th>
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
            <tr class="tr_<?=$row->ids?>">
              <td class="text-center text-muted"><?=$row->id?></td>
              <td>
                <div class="title"><?=$row->name?></div>
              </td>
              
              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-muted"><?=(!empty($row->add_type) && $row->add_type == "api")? lang("API"): lang('Manual')?></td>
              <td class="text-muted"><?=(!empty($row->api_service_id))? $row->api_service_id: ""?></td>
              <td class="text-muted"><?=(!empty($row->api_name))? $row->api_name : ""?></td>
              <?php }?>
              <?php
                $decimal_places = get_option('currency_decimal', 2);
              ?>
              <td><?=currency_format($row->price, $decimal_places)?></td>
              <td><?=$row->min?> / <?=$row->max?></td>
              <td>
                <a href="<?=cn("$module/desc/".$row->ids)?>" class="ajaxModal">
                  <span class="btn round btn-info btn-sm"><?=lang("Details")?></span> 
                </a>
              </td>
              <?php
                if (get_role("admin")) {
              ?>
              <td>
                <?=(!empty($row->dripfeed) && $row->dripfeed == 1) ? lang("Active") : 'Deactive'?>
              </td>  
              <td>
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="btn round btn-info btn-sm"><?=lang("Active")?></span>
                  <?php }else{?>
                  <span class="btn round btn-warning btn-sm"><?=lang("Deactive")?></span>
                <?php }?>
              </td>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                  <div class="dropdown-menu">
                    <?php
                      if (get_role("admin")) {
                    ?>
                    <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>

                    <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
                    <?php }?>
                  </div>
                </div>
              </td>
              <?php }?>

            </tr>
            <?php }}?>
            
          </tbody>
        </table>
      </div>
      <?php }?>
    </div>
  </div>
  <?php }}else{?>
  <div class="col-md-12 data-empty text-center">
    <div class="content">
      <img class="img mb-1" src="<?=BASE?>assets/images/ofm-nofiles.png" alt="empty">
      <div class="title"><?=lang("look_like_there_are_no_results_in_here")?></div>
    </div>
  </div>
  <?php } ?>
</div>
