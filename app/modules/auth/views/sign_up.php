
<div class="row">
  <div class="col-md-6 col-login mx-auto auth-form">
    <form class="card actionForm" action="<?=cn("auth/ajax_sign_up")?>" data-redirect="<?=cn()?>" method="POST">
      <div class="card-body p-t-10">
        <div class="card-title text-center">
          <div class="site-logo mb-2">
            <a href="<?=cn()?>">
              <img src="<?=get_option('website_logo', BASE."assets/images/logo.png")?>" alt="website-logo" style="max-height: 50px;">
            </a>
          </div>
          <h5><?=lang("register_now")?></h5>
        </div>
        <div class="form-group">
          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fe fe-user"></i>
            </span>
            <input type="text" class="form-control" name="first_name" placeholder="<?=lang("first_name")?>"  required>
          </div>
          
          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fe fe-user"></i>
            </span>
            <input type="text" class="form-control" name="last_name" placeholder="<?=lang("last_name")?>" required>
          </div>          
          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fe fe-mail"></i>
            </span>
            <input type="email" class="form-control" name="email" placeholder="<?=lang("Email")?>" required>
          </div>    
                
          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fa fa-key"></i>
            </span>
            <input type="password" class="form-control" name="password" placeholder="<?=lang("Password")?>" required>
          </div>    

          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fa fa-key"></i>
            </span>
            <input type="password" class="form-control" name="re_password" placeholder="<?=lang("Confirm_password")?>" required>
          </div>

          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fe fe-clock"></i>
            </span>
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

        <div class="form-group">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" name="terms" class="custom-control-input" />
            <span class="custom-control-label"><?=lang("i_agree_the")?> <a href="<?=cn('terms')?>"><?=lang("terms__policy")?></a></span>
          </label>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary btn-block"><?=lang("create_new_account")?></button>
        </div>
      </div>
    </form>
    <div class="text-center text-muted">
      <?=lang("already_have_account")?> <a href="<?=cn('auth/login')?>"><?=lang("Login")?></a>
    </div>
  </div>
</div>
