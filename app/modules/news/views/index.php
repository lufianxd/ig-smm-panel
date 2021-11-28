
<div class="page-header text-center">
  <h1 class="page-title">
    <?php 
      if(get_role("admin")) {
    ?>
    <a href="<?=cn("$module/update")?>" class="ajaxModal"><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="<?=lang("add_new")?>"><i class="fe fe-plus-square text-primary" aria-hidden="true"></i></span></a> 
    <?php }else{?>
    <span><i class="fe fe-help-circle" aria-hidden="true"></i></span>
    <?php }?>
    <?=lang("news__announcement")?>
  </h1>
</div>

<div class="row news-annoucement" id="result_ajaxSearch">
  <div class="col-md-12 col-xl-12">
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
              <th class="text-center w-1"><?=lang("No_")?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($news)) {
              $i = 0;
              foreach ($news as $key => $row) {
                switch ($row->type) {
                  case 'new_services':
                    $type  = lang("New_services");
                    $color = "btn-info";
                    break;
                  case 'disabled_services':
                    $type = lang("Disabled_services");
                    $color = "btn-orange";
                    break;
                  case 'updated_services':
                    $type = lang("Updated_services");
                    $color = "btn-lime";
                    break;
                  case 'announcement':
                    $type = lang("Announcement");
                    $color = "btn-primary";
                }
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td><?=$i?></td>
              <td width="55%"><?=htmlspecialchars_decode($row->description, ENT_QUOTES)?></td>
              <td><?=$type?></td>
              <td width="9%"><?=date("Y-m-d", strtotime($row->created))?></td>
              <td width="9%"><?=date("Y-m-d", strtotime($row->expiry))?></td>
              <td> 
                <?php 
                  if ($row->status == 1) {
                    if(isset($row->expiry) && strtotime($row->expiry) > strtotime(NOW)){
                ?>
                      <span class="btn round btn-info btn-sm"><?=lang("Active")?></span>
                      <?php }else{?>
                      <span class="btn round btn-danger btn-sm"><?=lang("Expired")?></span>
                    <?php }}else{?>
                    <span class="btn round btn-warning btn-sm"><?=lang("Deactive")?></span>
                <?php }?>
              </td>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                  <div class="dropdown-menu">
                    <a href="<?=cn("$module/ajax_notification/")?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-eye"></i> <?=lang("View")?> </a>

                    <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>

                    <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem">  <i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> 
                    </a>
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

</div>
