<div class="page-header">
  <h1 class="page-title">
    <a href="<?=cn("$module/update")?>" class=""><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span></a> 
    <?=lang("Language")?>
  </h1>
</div>

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($languages)){
  ?>
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
        <table class="table table-hover table-bordered table-vcenter text-nowrap card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?=lang("No_")?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              <th><?=lang("Action")?></th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($languages)) {
              $i = 0;
              foreach ($languages as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td><?=$i?></td>
              <td>
                <div class="title"><h6><?=language_codes($row->code)?></h6></div>
              </td>
              <td class="text-uppercase"><?=$row->code?></td>
              <td><span class="flag-icon flag-icon-<?=strtolower($row->country_code)?>"></span></td>
              <td><?=($row->is_default==1)? lang('Yes') : lang('No') ?></td>
              <td><?=$row->created?></td>
              <td>
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="btn round btn-info btn-sm"><?=lang("Active")?></span>
                  <?php }else{?>
                  <span class="btn round btn-warning btn-sm"><?=lang("Deactive")?></span>
                <?php }?>
              </td>
              <td>
                <div class="btn-group">
                  <a href="<?=cn("$module/update/".$row->ids)?>" class="btn round btn-primary btn-sm"><span class="p-l-5 p-r-5"><i class="fa fa-edit"></i></span>
                  </a>
                  <button type="button" class="btn round btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  </button>
                  <div class="dropdown-menu">

                    <a class="dropdown-item ajaxDeleteItem" href="<?=cn("$module/ajax_delete_item/".$row->ids)?>"><i class="dropdown-icon fe fe-trash"></i> <?=lang("Delete")?>
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
  <?php }else{?>
  <div class="col-md-12 data-empty text-center">
    <div class="content">
      <img class="img mb-1" src="<?=BASE?>assets/images/ofm-nofiles.png" alt="empty">
      <div class="title"><?=lang("look_like_there_are_no_results_in_here")?></div>
    </div>
  </div>
  <?php } ?>
</div>