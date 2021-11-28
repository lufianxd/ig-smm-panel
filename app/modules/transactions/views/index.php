<div class="page-header">
  <h1 class="page-title">
    <i class="fe fe-calendar"></i> <?=lang("Transaction_logs")?>
  </h1>
</div>
<div class="row" id="result_ajaxSearch">
  <?php if (!empty($transactions)) {
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang('Lists')?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-outline table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?=lang('No_')?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center"><?=lang('Action')?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($transactions)) {
              $i = 0;
              foreach ($transactions as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td><?=$i?></td>
              <?php
                if (get_role("admin")) {
              ?>
              <td>
                <div class="title"><?=get_field('general_users', ["id" => $row->uid], "email")?></div>
              </td>
              <?php }?>
              <td><?=$row->transaction_id?></td>
              <td class="">

                <?php if($row->type == 'paypal'){?>
                <i class="payment payment-paypal"></i> 
                <?php }?>
                
                <?php if($row->type == '2checkout'){?>
                <i class="payment payment-2checkout"></i> 
                <?php }?>

                <?php if($row->type == 'stripe'){?>
                <i class="payment payment-stripe"></i> 
                <?php }?>

              </td>
              <td><?=get_option("currency_symbol", '')?><?=$row->amount?> </td>
              <td><?=convert_timezone($row->created, 'user')?></td>
              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
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
      <div class="title"><?=lang('look_like_there_are_no_results_in_here')?></div>
    </div>
  </div>
  <?php }?>
</div>
