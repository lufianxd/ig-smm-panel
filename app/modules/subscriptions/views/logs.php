<section class="page-title">
  <div class="row justify-content-between">
    <div class="col-md-6">
      <h1 class="page-title">
        <a href="<?=cn("order/add")?>">
          <span class="add-new" data-toggle="tooltip" data-placement="bottom" data-original-title="<?=lang("add_new")?>"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
        </a>
        <?=lang("Subscriptions")?>
      </h1>
    </div>
    <div class="col-md-2">
      <div class="form-group ">
        <select  name="status" class="form-control order_by ajaxChange" data-url="<?=cn($module."/ajax_order_by/")?>">
          <option value="all"> <?=lang("sort_by")?></option>
          <option value="all"> <?=lang("All")?></option>
          <?php 
            $status_array = order_subscriptions_status_array();
            if (!empty($status_array)) {
              foreach ($status_array as $row_status) {
          ?>
          <option value="<?=$row_status?>"><?=order_status_title($row_status)?></option>
          <?php }}?>
        </select>
      </div>
    </div>
  </div>
</section>

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($order_logs)){
  ?>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("Lists")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-vcenter card-table">
          <thead>
            <tr>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($order_logs)) {
              $i = 0;
              foreach ($order_logs as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td class="text-center"><?=$row->id?></td>
              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-center"><?=($row->api_order_id == 0 || $row->api_order_id ==-1)? "" : $row->api_order_id?></td>
              <td><?=get_field(USERS, ['id' => $row->uid], "email")?></td>
              <?php } ?>
              <td>
                <div class="title">
                  <h6><?=get_field(SERVICES, ['id' => $row->service_id], "name")?></h6>
                </div>
                <div>
                  <small>
                    <?php
                      if (!empty($row->sub_expiry) && strtotime($row->sub_expiry) != "") {
                        $expiry = convert_timezone($row->sub_expiry, "user");
                        $expiry = date("Y-m-d", strtotime($expiry));
                      }else{
                        $expiry = "";
                      } 
                    ?>
                    <ul style="margin:0px">
                      <?php
                        if (get_role("admin")) {
                      ?>
                      <li><?=lang("Type")?>: <?=(!empty($row->api_service_id) && $row->api_service_id > 0)? lang("API")." (".get_field(API_PROVIDERS, ['id' => $row->api_provider_id], "name").")" : lang("Manual")?></li>
                      <?php }?>
                      <li><?=lang("Username")?>: <strong><?=$row->username?></strong></li>
                      <li><?=lang("Quantity")?>: <strong><?=$row->sub_min?>/<?=$row->sub_max?></strong></li>
                      <li><?=lang("Posts")?>: <strong><?=($row->sub_response_posts > 0) ? $row->sub_response_posts : 0 ?> / <?=($row->sub_posts == -1) ? "&infin;" : $row->sub_posts?></strong></li>
                      <li><?=lang("Delay")?>: <strong><?=($row->sub_delay == "" || $row->sub_delay == 0)? lang("No_delay") : $row->sub_delay . " ".lang("minutes")?></strong></li>
                      <li><?=lang("Expiry")?>: <strong><?=$expiry?></strong></li>
                    </ul>
                  </small>
                </div>
              </td>
              <td><?=convert_timezone($row->created, "user")?></td>
              <td><?=convert_timezone($row->changed, "user")?></td>
              <td>
                <?php
                  if ($row->sub_status == "Active") {
                    $btn_background = "btn-info";
                  }elseif ($row->sub_status == "Paused") {
                    $btn_background = "btn-orange";
                  }elseif($row->sub_status == "Completed"){
                    $btn_background = "btn-blue";
                  }else{
                    $btn_background = "btn-danger";
                  }
                ?>
                <span class="btn round btn-sm <?=$btn_background?>"><?=order_status_title($row->sub_status)?></span>
              </td>
              <!-- in_array($row->sub_status, array('Active', 'Paused')) ||  -->
              <?php 
                if (get_role("admin")) {
              ?>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                  <div class="dropdown-menu">
                    <?php 
                      if ($row->sub_status == "Active" && !get_role("admin")) {
                    ?>
                    <a href="<?=cn("$module/ajax_change_status_item/".$row->ids)?>" data-redirect="<?=cn($module)?>" data-status="Paused" class="dropdown-item ajaxChangeStatusItem"><i class="dropdown-icon fe fe-pause-circle"></i> Pause </a>
                    <?php }?>
                    <?php 
                      if ($row->sub_status == "Paused" && !get_role("admin")) {
                    ?>
                    <a href="<?=cn("$module/ajax_change_status_item/".$row->ids)?>" data-redirect="<?=cn($module)?>" data-status="Active" class="dropdown-item ajaxChangeStatusItem"><i class="dropdown-icon fe fe-play-circle"></i> Resume </a>

                    <a href="<?=cn("$module/ajax_change_status_item/".$row->ids)?>" data-redirect="<?=cn($module)?>" data-status="Cancelled" class="dropdown-item ajaxChangeStatusItem"><i class="dropdown-icon fe fe-x-circle"></i> Cancel </a>
                    <?php } ?>
                    <?php
                      if (get_role("admin")) {
                    ?>
                    <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>

                    <a href="<?=cn("$module/ajax_log_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
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
    </div>
  </div>
  <div class="col-md-12">
    <div class="float-right">
      <?=$links?>
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
</div>
