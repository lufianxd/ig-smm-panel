<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($faq->ids))? $faq->ids: '';
        ?>
        <form class="form actionForm" action="<?=cn($module."/ajax_update/$ids")?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fe fe-edit"></i> <?=lang("Edit_FAQ")?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Question")?></label>
                    <input type="text" class="form-control square" name="question" value="<?=(!empty($faq->question))? $faq->question: ''?>">
                  </div>
                </div>  

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label for="eventRegInput1"><?=lang("Default_sorting_number")?></label>
                    <input type="number" class="form-control square" name="sort" value="<?=(!empty($faq->sort))? $faq->sort: ''?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("")?>Status</label>
                    <select name="status" class="form-control square">
                      <option value="1" <?=(!empty($faq->status) && $faq->status == 1) ? 'selected' : ''?>><?=lang("Active")?></option>
                      <option value="0" <?=(isset($faq->status) && $faq->status != 1) ? 'selected' : ''?>><?=lang("Deactive")?></option>
                    </select>
                  </div>
                </div> 

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Answer")?></label>
                    <textarea rows="3" id="editor" class="form-control square" name="answer" placeholder="About Project"><?=(!empty($faq->answer))? $faq->answer: ''?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang("Submit")?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?=lang("Cancel")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?=BASE?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 150
  });
</script>