    <div class="card sidebar">
      <div class="card-body o-auto">
        <div class="item mt-2">
          <div class="title"><?=lang("general_settings")?></div>
          <ul class="list-unstyled">
            <li class="active"><a href="javascript:void(0)" data-url="<?=cn($module."/ajax_get_contents")?>"  class="ajaxGetContents" data-content="website_setting"><?=lang("website_setting")?></a></li>

            <li><a href="javascript:void(0)" data-url="<?=cn($module."/ajax_get_contents")?>"  class="ajaxGetContents" data-content="website_logo"><?=lang("Logo")?></a></li>

            <li><a href="javascript:void(0)" data-url="<?=cn($module."/ajax_get_contents")?>"  class="ajaxGetContents" data-content="terms_policy"><?=lang("terms__policy_page")?></a></li>

            <li><a href="javascript:void(0)" data-url="<?=cn($module."/ajax_get_contents")?>"  class="ajaxGetContents" data-content="default_setting"><?=lang("default_setting")?></a></li>

            <li><a href="javascript:void(0)" data-url="<?=cn($module."/ajax_get_contents")?>"  class="ajaxGetContents" data-content="other"><?=lang("Other")?></a></li>

          </ul>
        </div>

        <div class="item mt-2">
          <div class="title"><?=lang("Email")?></div>
          <ul class="list-unstyled">
            <li><a href="javascript:void(0)" data-url="<?=cn($module."/ajax_get_contents")?>"  class="ajaxGetContents" data-content="email_setting"><?=lang("email_setting")?></a></li>
            <li><a href="javascript:void(0)" data-url="<?=cn($module."/ajax_get_contents")?>"  class="ajaxGetContents" data-content="email_template"><?=lang("email_template")?></a></li>
          </ul>
        </div>

        <div class="item mt-2">
          <div class="title"><?=lang("integrations")?></div>
          <ul class="list-unstyled">
            <li><a href="javascript:void(0)" data-url="<?=cn($module."/ajax_get_contents")?>"  class="ajaxGetContents" data-content="payment"><?=lang("Payment")?></a></li>
          </ul>
        </div>
      </div>
    </div>