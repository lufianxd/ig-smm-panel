
<div class="page-header">
  <h1 class="page-title">
    <i class="fe fe-edit-3"></i> <?=lang('Edit_user')?>
  </h1>
</div>

<?php
  $ids = (!empty($user->ids))? $user->ids: '';
?>


<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("basic_information")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <form class="form actionForm" action="<?=cn($module."/ajax_update/$ids")?>" data-redirect="<?=cn("$module/update/$ids")?>" method="POST">
          <div class="form-body">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang("first_name")?> <span class="form-required">*</span></label>
                  <input class="form-control square" name="first_name" type="text" value="<?=(!empty($user->first_name))? $user->first_name: ''?>">
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label for="userinput5"><?=lang("last_name")?> <span class="form-required">*</span></label>
                    <input class="form-control square" name="last_name" type="text" value="<?=(!empty($user->last_name))? $user->last_name: ''?>">
                  </div>
              </div> 
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang('Email')?>  <span class="form-required">*</span></label>
                  <input class="form-control square" name="email" type="email" <?=(!empty($user->email))? 'disabled': ''?> value="<?=(!empty($user->email))? $user->email: ''?>">
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang('Timezone')?></label>
                  <select  name="timezone" class="form-control square">
                    <?php $time_zones = tz_list();
                      if (!empty($time_zones)) {
                        foreach ($time_zones as $key => $time_zone) {
                    ?>
                    <option value="<?=$time_zone['zone']?>" <?=(!empty($user->timezone) && $user->timezone == $time_zone["zone"])? 'selected': ''?>><?=$time_zone['time']?></option>
                    <?php }}?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang("account_type")?></label>
                  <select  name="role" class="form-control square">
                    <option value="user" <?=(!empty($user->role) && $user->role == "user")? 'selected': ''?>><?=lang("regular_user")?></option>
                    <option value="admin" <?=(!empty($user->role) && $user->role == "admin")? 'selected': ''?>><?=lang('admin')?></option>
                  </select>
                </div>
              </div> 

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label><?=lang('Status')?></label>
                  <select name="status" class="form-control square">
                    <option value="1" <?=(!empty($user->status) && $user->status == 1)? 'selected': ''?>><?=lang('Active')?></option>
                    <option value="0" <?=(isset($user->status) && $user->status != 1)? 'selected': ''?>><?=lang('Deactive')?></option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang('Password')?> <span class="required">*</span></label>
                  <input class="form-control square" name="password" type="password">
                  <small class="text-primary"><?=lang("note_if_you_dont_want_to_change_password_then_leave_these_password_fields_empty")?></small>
                </div>
              </div> 

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang('Confirm_password')?> <span class="required">*</span></label>
                  <input class="form-control square" name="re_password" type="password">
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="userinput8"><?=lang('Description')?></label>
                  <textarea id="editor"  rows="2" class="form-control square" name="desc" placeholder="Description"><?=(!empty($user->desc))? $user->desc: ''?></textarea>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang('Save')?></button>
              </div>
            </div>
          </div>
          <div class="">
          </div>
        </form>
      </div>
    </div>
  </div> 

  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("more_informations")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <form class="form actionForm" action="<?=cn($module."/ajax_update_more_infors/$ids")?>" data-redirect="<?=cn("$module/update/$ids")?>" method="POST">
          <div class="form-body">
            <div class="row">
              <?php
                if (!empty($user->more_information)) {
                  $infors     = $user->more_information;
                  $website    = get_value($infors, "website");
                  $phone      = get_value($infors, "phone");
                  $skype_id   = get_value($infors, "skype_id");
                  $what_asap  = get_value($infors, "what_asap");
                  $address    = get_value($infors, "address");
                }
              ?>  
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="userinput5"><?=lang('Website')?></label>
                  <input class="form-control square" name="website" type="text" value="<?=(!empty($website))? $website: ''?>">
                </div>
              </div> 

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang('Phone')?></label>
                  <input class="form-control square" name="phone" type="text" value="<?=(!empty($phone))? $phone: ''?>">
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang('Skype_id')?></label>
                  <input class="form-control square"  name="skype_id"  type="text" value="<?=(!empty($skype_id))? $skype_id: ''?>">
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang("whatsapp_number")?></label>
                  <input class="form-control square"  name="what_asap"  type="text" value="<?=(!empty($what_asap))? $what_asap: ''?>">
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?=lang('Address')?></label>
                  <input class="form-control square" name="address" type="text" value="<?=(!empty($address))? $address: ''?>">
                  <small class="text-primary"><?=lang("note_if_you_dont_want_add_more_information_then_leave_these_informations_fields_empty")?></small>
                </div>
              </div>
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang('Save')?></button>
              </div>
            </div>
          </div>
          <div class="">
          </div>
        </form>
      </div>
    </div>
  </div>  
  
  <?php
    if (!empty($ids)) {
  ?>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("Add_Funds")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <form class="form actionForm" action="<?=cn($module."/ajax_update_fund/$ids")?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="form-group">
            <label for="projectinput5"><?=lang("Funds")?></label>
            <input class="form-control square" name="funds" type="text" value="<?=(!empty($user->balance))? $user->balance: 0 ?>">
          </div>
          <div class="">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang("Submit")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php }?>
</div>

<script src="<?=BASE?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 100
  });
</script>