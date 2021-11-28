

<section class="page-title">
  <div class="row justify-content-between">
    <div class="col-md-6">
      <h1 class="page-title">
        <a href="<?=cn("$module/add")?>" class="ajaxModal"><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="<?=lang("add_new")?>" data-original-title="Add new"><i class="fe fe-plus-square text-primary" aria-hidden="true"></i></span></a> 
        <?=lang("Tickets")?>
      </h1>
    </div>
    <div class="col-md-2">
      <div class="form-group ">
        <select  name="status" class="form-control order_by ajaxChange" data-url="<?=cn($module."/ajax_order_by/")?>">
          <option value="all"> <?=lang("sort_by")?></option>
          <option value="all"> <?=lang("All")?></option>
          <?php 
            $status_array = ticket_status_array();
            if (!empty($status_array)) {
              foreach ($status_array as $row_status) {
          ?>
          <option value="<?=$row_status?>"><?=ticket_status_title($row_status)?></option>
          <?php }}?>
        </select>
      </div>
    </div>
  </div>
</section>

<div class="row justify-content-end" id="result_ajaxSearch">
  <?php if(!empty($tickets)){?>
  <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <?=lang("Lists")?>
        </h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>

      <div class="card-body">
        <div class="ticket-lists">
          <?php 
            foreach ($tickets as $key => $row) {
              $short_name_user = '<i class="fe fe-user"></i>';
              if (!empty($row->first_name)) {
                $last_name_user = $row->last_name;
                $first_name_user = $row->first_name;
                $short_name_user = $first_name_user[0].$last_name_user[0];
              }
          ?>
          <div class="item tr_<?=$row->ids?>">
            <a href="<?=cn("$module/".$row->id)?>" class="p-l-5 d-flex text-decoration-none">
              <div class="media-left p-r-10">
                  <span class="avatar avatar-md">
                      <span class="media-object rounded-circle text-circle <?=$row->status?>"><?=$short_name_user?></span>
                  </span>
              </div>
              <div class="content">
                <div class="subject text-truncate <?=(isset($row->status) && $row->status == "closed") ? "text-muted" : ""?>"><?="#".$row->id." - ".$row->subject?></div>
                <div class="email"><?=$row->first_name." ".$row->last_name." - ".$row->user_email?></div>
                <div class="time">
                  <small><?=convert_timezone($row->changed, 'user')?> </small>
                </div>
              </div>
            </a>

            <div class="action item-action dropdown m-t-10">
              <?php
                $button_type = "btn-info";
                if (!empty($row->status)) {
                  switch ($row->status) {
                    case 'pending':
                      $button_type = "btn-primary";
                      break;
                    case 'closed':
                      $button_type = "btn-gray";
                      break;
                    case 'new':
                      $button_type = "btn-info";
                      break;
                  }
                }
              ?>
              <a href="javascript:void(0)"class="m-r-5">
                <span class="btn round <?=$button_type?> btn-sm"><small><?=ticket_status_title($row->status)?></small>
                </span>
              </a>
              <?php 
              if(get_role("admin")) {?>
              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0)" data-url="<?=cn($module."/ajax_change_status/".$row->ids)?>" data-status="new" class="ajaxChangeStatus dropdown-item"> <i class="dropdown-icon fe fe-mail"></i> <?=lang("mark_as_new")?></a>

                <a href="javascript:void(0)" data-url="<?=cn($module."/ajax_change_status/".$row->ids)?>" data-status="pending" class="ajaxChangeStatus dropdown-item"> <i class="dropdown-icon fa fa-envelope-open"></i> <?=lang("mark_as_pending")?></a>

                <a href="javascript:void(0)" data-url="<?=cn($module."/ajax_change_status/".$row->ids)?>" data-status="closed" class="ajaxChangeStatus dropdown-item"> <i class="dropdown-icon fe fe-unlock"></i> <?=lang("mark_as_closed")?></a>

                <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="ajaxDeleteItem dropdown-item"> <i class="dropdown-icon fe fe-trash"></i> <?=lang("Delete")?></a>
              </div>
              <?php }?>
            </div>
            <div class="clearfix"></div>
          </div>
          <?php }?>
        </div>
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
  <?php } ?>
</div>
