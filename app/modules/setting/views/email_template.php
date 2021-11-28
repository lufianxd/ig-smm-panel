
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-edit"></i> <?=lang("email_template")?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?=cn($module)?>">
          <div class="row">
            <div class="col-md-12 col-lg-12">

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("new_user_welcome_email")?></h5>
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="email_welcome_email_subject" value="<?=get_option('email_welcome_email_subject', getEmailTemplate("welcome")->subject)?>">
              </div>   

              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="email_welcome_email_content" id="welcome" class="form-control"><?=get_option('email_welcome_email_content', getEmailTemplate("welcome")->content)?>
                </textarea>
              </div> 

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("new_user_notification_email")?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="email_new_registration_subject" value="<?=get_option('email_new_registration_subject', getEmailTemplate("new_user")->subject)?>">
              </div>   
               
              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="email_new_registration_content" id="register" class="form-control"><?=get_option('email_new_registration_content', getEmailTemplate("new_user")->content)?>

                </textarea>
              </div>   

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("password_recovery")?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="email_password_recovery_subject" value="<?=get_option('email_password_recovery_subject', getEmailTemplate("forgot_password")->subject)?>">
              </div>    
              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="email_password_recovery_content" id="recovery" class="form-control"><?=get_option('email_password_recovery_content', getEmailTemplate("forgot_password")->content)?>
                </textarea>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("payment_notification_email")?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="email_payment_notice_subject" value="<?=get_option('email_payment_notice_subject', getEmailTemplate("payment")->subject)?>">
              </div>    
              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="email_payment_notice_content" id="payment" class="form-control"><?=get_option('email_payment_notice_content', getEmailTemplate("payment")->content)?>
                </textarea>
              </div>

              <div class="form-group">
                <div class="small">
                  <strong><?=lang("note")?></strong> <?=lang("you_can_use_following_template_tags_within_the_message_template")?><br> 
                  <ul>
                    <li>{{user_firstname}} - <?=lang("displays_the_users_first_name")?></li>
                    <li>{{user_lastname}} - <?=lang("displays_the_users_last_name")?></li>
                    <li>{{user_email}} - <?=lang("displays_the_users_email")?></li>
                    <li>{{user_timezone}} - <?=lang("displays_the_users_timezone")?></li>
                    <li>{{recovery_password_link}} - <?=lang("displays_recovery_password_link")?></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-footer">
                <button class="btn btn-primary btn-min-width btn-lg text-uppercase"><?=lang("Save")?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

<script src="<?=BASE?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>

  CKEDITOR.replace( 'register', {
    height: 150
  });

  CKEDITOR.replace( 'welcome', {
    height: 150
  });

  CKEDITOR.replace( 'recovery', {
    height: 150
  });
  
  CKEDITOR.replace( 'payment', {
    height: 150
  });

</script>
