
<?php
  $data_tickets_log = $data_log->data_tickets;
  $data_orders_log  = $data_log->data_orders;
?>
<div class="row justify-content-center row-card statistics">

  <div class="col-sm-12">
    <div class="row">
      <?php
        if (get_role("admin")) {
      ?>
      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-success-gradient text-white mr-3">
              <i class="fe fe-users"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_log->total_users?></h4>
                <small class="text-muted "><?=lang("total_users")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }else{ ?>
      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-success-gradient text-white mr-3">
              <i class="fe fe-dollar-sign"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=get_option('currency_symbol',"")?><?=currency_format($data_log->user_balance, get_option('currency_decimal'))?></h4>
                <small class="text-muted "><?=lang("your_balance")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-info-gradient text-white mr-3">
              <i class="fe fe-dollar-sign"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=get_option('currency_symbol',"")?><?=(!empty($data_log->total_spent_receive)) ? currency_format($data_log->total_spent_receive, get_option('currency_decimal')) : 0?></h4>
                <small class="text-muted ">
                  <?=(get_role("admin") ? lang("total_amount_recieved") : lang("total_amount_spent"))?>
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-warning-gradient text-white mr-3">
              <i class="fe fe-shopping-cart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->total?></h4>
                <small class="text-muted "><?=lang("total_orders")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-danger-gradient text-white mr-3">
              <i class="fa fa-ticket"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_tickets_log->total?></h4>
                <small class="text-muted "><?=lang("total_tickets")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      
      <!-- Order -->
      <div class="col-sm-12 charts">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=lang("recent_orders")?></h3>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="p-4 card">
                <div id="orders_chart_spline" style="height: 20rem;"></div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="p-4 card">
                <div id="orders_chart_pie" style="height: 20rem;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-list"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->total?></h4>
                <small class="text-muted "><?=lang("total_orders")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-check"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 number"><?=$data_orders_log->completed?></h4>
                <small class="text-muted"><?=lang("Completed")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-trending-up"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->processing?></h4>
                <small class="text-muted "><?=lang("Processing")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-loader"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->inprogress?></h4>
                <small class="text-muted "><?=lang("In_progress")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-pie-chart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->pending?></h4>
                <small class="text-muted "><?=lang("Pending")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fa fa-hourglass-half"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->partial?></h4>
                <small class="text-muted "><?=lang("Partial")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>    

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-x-square"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->canceled?></h4>
                <small class="text-muted "><?=lang("Canceled")?></small>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-rotate-ccw"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->refunded?></h4>
                <small class="text-muted "><?=lang("Refunded")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>    
      <?php
        if (get_role('admin')) {
      ?>
      <!-- tickets -->
      <div class="col-sm-12 charts">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=lang("recent_tickets")?></h3>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="p-4 card">
                <div id="tickets_chart_spline" style="height: 20rem;"></div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="p-4 card">
                <div id="tickets_chart_pie" style="height: 20rem;"></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fa fa-ticket"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_tickets_log->total?></h4>
                <small class="text-muted "><?=lang("total_tickets")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-mail"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 number"><?=$data_tickets_log->new?></h4>
                <small class="text-muted"><?=lang("New")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-pie-chart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_tickets_log->pending?></h4>
                <small class="text-muted "><?=lang("Pending")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-check"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_tickets_log->closed?></h4>
                <small class="text-muted "><?=lang("Closed")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

    Chart_template.chart_spline('#orders_chart_spline', <?=$data_orders_log->data_orders_chart_spline?>);
    Chart_template.chart_pie('#orders_chart_pie', <?=$data_orders_log->data_orders_chart_pie?>);

    Chart_template.chart_spline('#tickets_chart_spline', <?=$data_tickets_log->data_tickets_chart_spline?>);
    Chart_template.chart_pie('#tickets_chart_pie', <?=$data_tickets_log->data_tickets_chart_pie?>);
  });
</script>

