
<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Enter purchase code</h3>
          </div>
          <div class="card-body">
            <form class="form actionForm" action="<?=cn($module."/update")?>" data-redirect="<?=cn($module)?>" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <?php
                    if (isset($_GET["error"]) && $_GET["error"] != "") {
                  ?>
                  <div class="payment-errors alert alert-icon alert-danger alert-dismissible">
                    <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                    <span class="payment-errors-message"><?=$_GET["error"]?></span>
                  </div>
                 <?php }?>
                  <div class="form-group">
                    <label>Your purchase code</label>
                    <input class="form-control square" type="password" name="purchase_code" value="<?=$purchase_code?>">
                  </div>
                  <div class="form-group">
                    <small class="text-danger">
                      Note: You can use your License code (Purchase code) for one domain only.
                    </small>
                  </div>
                  <div class="form-actions left">
                    <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1">
                      <?=lang("Submit")?>
                    </button>
                  </div>
                </div>  
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

