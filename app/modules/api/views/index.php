<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("api_documentation")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body collapse show">
        <div class="x_content">
          <p class="note"><?=lang("note_please_read_the_api_intructions_carefully_its_your_solo_responsability_what_you_add_by_our_api")?></p>
          <table class="table table-hover table-bordered projects">
            <thead>
              <tr>
                <td><?=lang("http_method")?></td>
                <td>POST</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?=lang("response_format")?></td>
                <td>Json</td>
              </tr>
              <tr>
                <td>API URL</td>
                <td><a href="<?=$api_url?>"><?=$api_url?></a></td>
              </tr>

              <tr>
                <td><?=lang("api_key")?></td>
                <td><?=$api_key?></td>
              </tr>
          </table>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="<?=BASE?>example.txt" class="btn btn-round btn-primary" target="_blank"><?=lang("download_php_code_examples")?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("place_new_order")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <div class="x_content">
          <table class="table table-hover table-bordered projects">
            <thead>
              <tr>
                <th><?=lang("parameter")?></th>
                <th><?=lang("Description")?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($new_order)) {
                  foreach ($new_order as $key => $row) {
              ?>
              <tr>
                <td><?=$key?></td>
                <td><?=$row?></td>
              </tr>
              <?php }} ?>
            </tbody>
          </table>
          <div class="title"><h4><?=lang("example_response")?></h4></div>
          <div class="card-body">
            <pre>
{
  "status": "success",
  "order": 32
}
            </pre>
          </div>
        </div>            
      </div>
    </div>
  </div>



  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("status_order")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">

        <div class="x_content">
          <table class="table table-hover table-bordered projects">
            <thead>
              <tr>
                <th><?=lang("parameter")?></th>
                <th><?=lang("Description")?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($status_order)) {
                  foreach ($status_order as $key => $row) {
              ?>
              <tr>
                <td><?=$key?></td>
                <td><?=$row?></td>
              </tr>
              <?php }} ?>
            </tbody>
          </table>


          <div class="title"><h4><?=lang("example_response")?></h4></div>
          <div class="card-body">
            <pre>
{
  "order": "32",
  "status": "pending",
  "charge": "0.0360",
  "start_count": "0",
  "remains": "0"
}
            </pre>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> <?=lang("multiple_orders_status")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <div class="x_content">
          <table class="table table-hover table-bordered projects">
            <thead>
              <tr>
                <th><?=lang("parameter")?></th>
                <th><?=lang("Description")?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($status_orders)) {
                  foreach ($status_orders as $key => $row) {
              ?>
              <tr>
                <td><?=$key?></td>
                <td><?=$row?></td>
              </tr>
              <?php }} ?>
            </tbody>
          </table>


          <div class="title"><h4><?=lang("example_response")?></h4></div>
          <div class="card-body">
            <pre>
  {
      "12": {
          "order": "12",
          "status": "processing",
          "charge": "1.2600",
          "start_count": "0",
          "remains": "0"
      },
      "2": "Incorrect order ID",
      "13": {
          "order": "13",
          "status": "pending",
          "charge": "0.6300",
          "start_count": "0",
          "remains": "0"
      }
  }
            </pre>
          </div>
        </div>

      </div>
    </div>
  </div>
  
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("services_lists")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <div class="x_content">
          <table class="table table-hover table-bordered projects">
            <thead>
              <tr>
                <th><?=lang("parameter")?></th>
                <th><?=lang("Description")?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($services)) {
                  foreach ($services as $key => $row) {
              ?>
              <tr>
                <td><?=$key?></td>
                <td><?=$row?></td>
              </tr>
              <?php }} ?>
            </tbody>
          </table>
          <div class="title"><h4><?=lang("example_response")?></h4></div>
          <div class="card-body">
            <pre>
[
  {
      "service": "5",
      "name": "Instagram Followers [15K] ",
      "category": "Instagram - Followers [Guaranteed\/Refill] - Less Drops \u2b50",
      "rate": "1.02",
      "min": "500",
      "max": "10000"
  },
  {
      "service": "9",
      "name": "Instagram Followers - Max 300k - No refill - 30-40k\/Day",
      "category": "Instagram - Followers [Guaranteed\/Refill] - Less Drops \u2b50",
      "rate": "0.04",
      "min": "500",
      "max": "300000"
  },
  {
      "service": "10",
      "name": "Instagram Followers ( 30 days auto refill ) ( Max 350K ) (Indian Majority )",
      "category": "Instagram - Followers [Guaranteed\/Refill] - Less Drops \u2b50",
      "rate": "1.2",
      "min": "100",
      "max": "350000"
  }
]
            </pre>
          </div>
        </div>
      </div>
    </div>
  </div>  

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("Balance")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        
        <div class="x_content">
          <table class="table table-hover table-bordered projects">
            <thead>
              <tr>
                <th><?=lang("parameter")?></th>
                <th><?=lang("Description")?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($balance)) {
                  foreach ($balance as $key => $row) {
              ?>
              <tr>
                <td><?=$key?></td>
                <td><?=$row?></td>
              </tr>
              <?php }} ?>
            </tbody>
          </table>
          <div class="title"><h4><?=lang("example_response")?></h4></div>
          <div class="card-body">
            <pre>
  {
      "status": "success",
      "balance": "0.03",
      "currency": "USD"
  }
            </pre>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

