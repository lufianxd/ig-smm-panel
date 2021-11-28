
<div class="col-md-12">
  <div class="title text-center text-info">
    <h3><?=lang("synchronization_results")?> <?="- ".$api_name?> </h3>
  </div>
</div>
<?php if(!empty($services_new) || !empty($services_disabled)){
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?=lang("lists")?></h3>
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
            <th><?=lang("service_id")?></th>
            <th><?=lang("Name")?></th>
            <th><?=lang("Status")?></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $i = 0;
            if (!empty($services_new)) {
              foreach ($services_new as $key => $row_new) {
                $i++;
          ?>
          <tr>
            <td  class="text-center"><?=$i?></td>
            <td><?=$row_new->service?></td>
            <td><div class="title"><?=$row_new->name?></div></td>
            <td><span class="btn round btn-info btn-sm"><?=lang("New")?></span></td>
          </tr>
          <?php }}?>
          <?php 
            if (!empty($services_disabled)) {
              foreach ($services_disabled as $key => $row_disabled) {
                $i++;
          ?>
          <tr>
            <td  class="text-center"><?=$i?></td>
            <td><?=$row_disabled->api_service_id?></td>
            <td><div class="title"><?=$row_disabled->name?></div></td>
            <td><span class="btn round btn-warning btn-sm"><?=lang("Disabled")?></span></td>
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