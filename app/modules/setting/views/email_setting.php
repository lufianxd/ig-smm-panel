
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-mail"></i> <?=lang("email_setting")?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?=cn($module)?>">
          <div class="row">
            <div class="col-md-12 col-lg-12">

<!--               <div class="form-group">
                <div class="form-label">Mail system</div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="is_mail_system" value="1">
                    <span class="custom-control-label">Enable</span>
                  </label>
                </div>
              </div> -->

              <div class="form-group">
                <div class="form-label"><?=lang("email_notifications")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_welcome_email" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_welcome_email" value="1" <?=(get_option('is_welcome_email',"") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("new_user_welcome_email")?></span>
                  </label>
                </div>

                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_new_user_email" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_new_user_email" value="1" <?=(get_option('is_new_user_email',"") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("new_user_notification_email")?> <small><?=lang("receive_notification_when_a_new_user_registers_to_the_site")?></small></span>
                  </label>
                </div>

                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_payment_notice_email" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_payment_notice_email" value="1" <?=(get_option('is_payment_notice_email',"") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("payment_notification_email")?> <small><?=lang("send_notification_when_a_new_user_add_funds_successfully_to_user_balance")?></small></span>
                  </label>
                </div>

                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_ticket_notice_email" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_ticket_notice_email" value="1" <?=(get_option('is_ticket_notice_email',"") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("ticket_notification_email")?> <small><?=lang("send_notification_to_user_when_admin_reply_to_a_ticket")?></small></span>
                  </label>
                </div>

                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_order_notice_email" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_order_notice_email" value="1" <?=(get_option('is_order_notice_email',"") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("order_notification_email")?> <small><?=lang("receive_notification_when_a_user_place_order_successfully")?></small></span>
                  </label>
                </div>

              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("From")?></label>
                <input class="form-control" name="email_from" value="<?=get_option('email_from',"")?>">
              </div>  

              <div class="form-group">
                <label class="form-label"><?=lang("your_name")?></label>
                <input class="form-control" name="email_name" value="<?=get_option('email_name',"")?>">
              </div>
              
              <div class="form-group">
                <div class="form-label"><?=lang("email_protocol")?></div>
                <div class="custom-switches-stacked">
                  <label class="custom-switch">
                    <input type="radio" name="email_protocol_type" class="custom-switch-input" value="php_mail" <?=(get_option('email_protocol_type',"php_mail") == 'php_mail')? "checked" : ''?>>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description"><?=lang("php_mail_function")?></span>
                  </label>
                  <label class="custom-switch">
                    <input type="radio" name="email_protocol_type" value="smtp" class="custom-switch-input" <?=(get_option('email_protocol_type',"php_mail") == 'smtp')? "checked" : ''?>> 
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description"><?=lang("SMTP")?> <small><?=lang("recommended")?></small></span>
                  </label>
                  <small><strong><?=lang("note")?></strong> <?=lang("sometime_email_is_going_into__recipients_spam_folders_if_php_mail_function_is_enabled")?></small>
                </div>
              </div>  

              <div class="row smtp-configure <?=(get_option('email_protocol_type',"") == 'smtp')? "" : 'd-none'?>">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label"><?=lang("smtp_server")?></label>
                    <input class="form-control" name="smtp_server" value="<?=get_option('smtp_server',"")?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("smtp_port")?> <small>(25, 465, 587, 2525)</small></label>
                    <input class="form-control" name="smtp_port" value="<?=get_option('smtp_port',"")?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("smtp_encryption")?></label>
                    <select  name="smtp_encryption" class="form-control square">
                      <option value="none" <?=(get_option('smtp_encryption',"") == 'none')? "selected" : ''?>>None</option>
                      <option value="ssl" <?=(get_option('smtp_encryption',"") == 'ssl')? "selected" : ''?> >SSL</option>
                      <option value="tls" <?=(get_option('smtp_encryption',"") == 'tls')? "selected" : ''?> >TLS</option>
                  </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("smtp_username")?></label>
                    <input class="form-control" name="smtp_username" value="<?=get_option('smtp_username',"")?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("smtp_password")?></label>
                    <input class="form-control" name="smtp_password" value="<?=get_option('smtp_password',"")?>">
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-8">
              <div class="form-footer">
                <button class="btn btn-primary btn-min-width btn-lg text-uppercase"><?=lang("Save")?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
