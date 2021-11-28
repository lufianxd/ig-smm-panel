<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($new->ids))? $new->ids: '';
        ?>
        <form class="form actionForm" action="<?=cn($module."/ajax_update/$ids")?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fe fe-edit"></i> <?=lang("edit_news_announcement")?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" >
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Type")?></label>
                    <select name="type" class="form-control square">
                      <option value="new_services" <?=(isset($new->type) && $new->type == 'new_services') ? 'selected' : ''?>> <?=lang("New_services")?></option>
                      <option value="disabled_services" <?=(isset($new->type) && $new->type == 'disabled_services') ? 'selected' : ''?>> <?=lang("Disabled_services")?></option>
                      <option value="updated_services" <?=(isset($new->type) && $new->type == 'updated_services') ? 'selected' : ''?>> <?=lang("Updated_services")?></option>
                      <option value="announcement" <?=(isset($new->type) && $new->type == 'announcement') ? 'selected' : ''?>><?=lang("Announcement")?></option>
                    </select>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?=lang("Start")?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker" name="create" onkeydown="return false"value="<?=(isset($new->created) ? date("d/m/Y",  strtotime($new->created)) : '')?>">
                    </div>
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?=lang("Expiry")?></label>
                    <div class="input-group">
                      <input type="text" class="form-control datepicker" name="expiry" onkeydown="return false" value="<?=(isset($new->expiry) ? date("d/m/Y",  strtotime($new->expiry)) : '')?>">
                    </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Status")?></label>
                    <select name="status" class="form-control square">
                      <option value="1" <?=(!empty($new->status) && $new->status == 1) ? 'selected' : ''?>><?=lang("Active")?></option>
                      <option value="0" <?=(isset($new->status) && $new->status != 1) ? 'selected' : ''?>><?=lang("Deactive")?></option>
                    </select>
                  </div>
                </div> 

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Description")?></label>
                    <textarea rows="3" id="editor" class="form-control square" name="description">
                      <?=(isset($new->description)) ? htmlspecialchars_decode($new->description, ENT_QUOTES) : ''?>
                    </textarea>
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
    height: 200
  });
</script>
<script>
  $(function(){
    $('.datepicker').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      // startDate: truncateDate(new Date())
    });
    <?php if (!isset($new->created) && !isset($new->expiry)) {

    ?>
    $(".datepicker").datepicker().datepicker("setDate", new Date());
    <?php }?>
    function truncateDate(date) {
      return new Date(date.getFullYear(), date.getMonth(), date.getDate());
    }

  });
</script>