<div class="page-header">
  <h1 class="page-title">
    <i class="fe fe-settings"></i> <?=lang("Settings")?>
  </h1>
</div>

<div class="row settings justify-content-center">
  <div class="col-md-12 col-lg-12">
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <?php
          $data = array(
            "module" => "setting",
          );
          $this->load->view('sidebar', $data);
        ?>
      </div>

      <div class="col-md-9 col-lg-9" id="result_get_contents">
        <?php
          $data = array(
            "module" => "setting",
          );
          $this->load->view('website_setting', $data);
        ?>
      </div>
    </div>
  </div>
</div>