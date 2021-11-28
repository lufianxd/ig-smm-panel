<?php
  $ids = (!empty($lang->ids))? $lang->ids: '';
?>

<div class="row">
  <div class="col-md-12">
    <form class="form actionForm" action="<?=cn($module."/ajax_update/$ids")?>" data-redirect="<?=cn("$module")?>" method="POST">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?=lang("Language")?></h3>
                <div class="card-options">
                  <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                  <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label class=""><?=lang("language_code")?></label>
                              <select name="language_code" class="form-control">
                                <option value="0"><?=lang("choose_a_language_code")?></option>
                                <?php 
                                  $data_languageCodes = language_codes();
                                  if (is_array($data_languageCodes)) {
                                    foreach ($data_languageCodes as $key => $value) {
                                ?>
                                <option value="<?=$key?>" <?=(isset($lang->code)&&$lang->code == $key)?'Selected':''?>><?=$key?> - <?=$value?></option>
                                <?php }} ?>
                              </select>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class=""><?=lang("Location")?></label>
                              <input type="hidden" name="ids" value="<?=(isset($lang->ids))?$lang->ids:""?>">
                              <select name="country_code" class="form-control">
                                <option value="0"><?=lang("choose_your_country")?></option>
                                <?php 
                                  $data_countryCodes = country_codes();
                                  if (is_array($data_countryCodes)) {
                                    foreach ($data_countryCodes as $key => $value) {
                                ?>
                                <option value="<?=$key?>" <?=(isset($lang->country_code)&&$lang->country_code==$key)?'Selected':''?>> <?=$value?></option>
                                <?php }} ?>
                              </select>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class=""><?=lang("Status")?></label>
                              <select name="status" class="form-control">
                                <option value="1" <?=(isset($lang->status)&&$lang->status==1)?'Selected':''?>><?=lang("Active")?></option>
                                <option value="0" <?=(isset($lang->status)&&$lang->status==0)?'Selected':''?>><?=lang("Deactive")?></option>
                              </select>
                            </div>
                          </div>   

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class=""><?=lang("Default")?></label>
                              <select name="default" class="form-control">
                                <option value="0" <?=(isset($lang->is_default)&&$lang->is_default==0)?'Selected':''?>><?=lang("No")?></option>
                                <option value="1" <?=(isset($lang->is_default)&&$lang->is_default==1)?'Selected':''?>><?=lang("Yes")?></option>
                              </select>
                            </div>
                          </div>
    
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h3 class="card-title mb-3"><?=lang("translation_editor")?></h3>
                            </div>
                            <table class="table table-hover table-bordered table-vcenter text-nowrap card-table">
                                <thead>
                                  <tr>
                                    <th class="table-plus datatable-nosort"><?=lang("Key")?></th>
                                    <th class="datatable-nosort"><?=lang("Value")?></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $data_languageKeys = all_langugage_keys();
                                    if(is_array($data_languageKeys)){
                                      foreach ($data_languageKeys as $key => $value) {
                                  ?>
                                  <tr>
                                    <td class="table-plus" style="width: 40%">
                                      <?=(strlen($key) >= 20)?substr($key, 0, 17).'...': $key?></td>
                                    <td style="width: 60%;">
                                      <?php if(strlen($value) >= 64){?>
                                      <div class="form-group">
                                        <textarea class="form-control" name='lang[<?=$key?>]' style="max-height: 55px;"><?=(isset($lang_db[$key]))?$lang_db[$key]:$value?>
                                        </textarea>
                                      </div>
                                      <?php }else{?>
                                        <div class="form-group">
                                          <input class="form-control" type="text" name='lang[<?=$key?>]' value="<?=(isset($lang_db[$key]))? $lang_db[$key] : $value?>">
                                        </div>
                                      <?php }?>
                                    </td>
                                  </tr>
                                  <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 m-t-20">
                            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang("Save")?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </div> 
</div>
  
