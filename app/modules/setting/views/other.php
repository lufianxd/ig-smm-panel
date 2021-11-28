
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-sliders"></i> <?=lang("other_settings")?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?=cn($module)?>">
          <div class="row">

            <div class="col-md-12 col-lg-12">

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("enable_https")?></h5>
              <div class="form-group">
                <div class="custom-switches-stacked">
                  <label class="custom-switch">
                    <input type="radio" name="enable_https" class="custom-switch-input" value="0" <?=(get_option('enable_https', 0) == 0)? "checked" : ''?>>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description"><?=lang("Deactive")?></span>
                  </label>
                  <label class="custom-switch">
                    <input type="radio" name="enable_https" value="1" class="custom-switch-input" <?=(get_option('enable_https', 0) == 1)? "checked" : ''?>> 
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description"><?=lang("Active")?></span>
                  </label>
                  <small class="text-danger"><?=lang("note_please_make_sure_the_ssl_certificate_has_the_active_status_in_your_hosting_before__you_activate")?> </small>
                </div>
              </div>
              
              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("emded_code")?></h5>
              <div class="form-group">
                <textarea rows="10" name="embed_javascript" class="form-control"><?=get_option('embed_javascript', '')?></textarea>
                <small class="text-danger"><?=lang("note_only_supports_javascript_code")?></small>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("social_media_links")?></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("Facebook")?></label>
                    <input class="form-control" name="social_facebook_link" value="<?=get_option('social_facebook_link',"https://www.facebook.com/")?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("Instagram")?></label>
                    <input class="form-control" name="social_instagram_link" value="<?=get_option('social_instagram_link',"https://www.instagram.com/")?>">
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("Pinterest")?></label>
                    <input class="form-control" name="social_pinterest_link" value="<?=get_option('social_pinterest_link',"https://www.pinterest.com/")?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("Twitter")?></label>
                    <input class="form-control" name="social_twitter_link" value="<?=get_option('social_twitter_link',"https://twitter.com/")?>">
                  </div>
                </div>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("contact_informations")?></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("Tel")?></label>
                    <input class="form-control" name="contact_tel" value="<?=get_option('contact_tel',"+12345678")?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("Email")?></label>
                    <input class="form-control" name="contact_email" value="<?=get_option('contact_email',"do-not-reply@smartpanel.com")?>">
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("working_hour")?></label>
                    <input class="form-control" name="contact_work_hour" value="<?=get_option('contact_work_hour',"Mon - Sat 09 am - 10 pm")?>">
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
