
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-pantone">
          <h4 class="modal-title"><i class="fe fe-book-open"></i> <?=$service->name?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <div class="form-body">
            <div class="row justify-content-md-center">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <div class="content">
                    <?php
                      if (!empty($service->desc)) {
                        echo html_entity_decode(utf8_decode($service->desc), ENT_QUOTES);
                      }else{
                    ?>
                    <div class="text-center m-t-50 m-b-50">
                      <img class="img mb-1" src="<?=BASE?>assets/images/ofm-nofiles.png" alt="empty">
                      <div class="title text-muted"><?=lang("look_like_there_are_no_results_in_here")?></div>
                    </div>
                    <?php }?>    

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?=lang("Cancel")?></button>
        </div>
      </div>
    </div>
  </div>
</div>
