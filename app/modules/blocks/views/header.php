<div class="header top  py-4">
  <div class="container">
    <div class="d-flex">
      <a class="" href="<?=cn()?>">
        <img src="<?=get_option('website_logo_white', BASE."assets/images/logo-white.png")?>" alt="Website logo" style="max-height: 40px;">
      </a>
      <div class="d-flex order-lg-2 ml-auto my-auto">
        <?php
          if (get_option("enable_news_announcement") == 1) {
        ?>
        <div class="notifcation">
          <a href="<?=cn("news/ajax_notification")?>" data-toggle="tooltip" data-placement="bottom" title="<?=lang("news__announcement")?>" class="ajaxModal text-white">
            <i class="fe fe-bell"></i>
            <div class="test">
              <span class="nav-unread <?=(isset($_COOKIE["news_annoucement"]) && $_COOKIE["news_annoucement"] == "clicked") ? "" : "change_color"?>"></span>
            </div>
          </a>
        </div>
        <?php }?>
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="background-image: url(<?=BASE?>assets/images/user-avatar.png)"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default text-white"><?=lang("Hi")?>, <span class="text-uppercase"><?=get_field(USERS, ["id" => session('uid')], 'first_name')?></span>!</span>
              <small class="text-muted  text-white d-block mt-1">
                <?php
                  if (!get_role("admin")) {

                ?>
                <?=lang("Balance")?>: <?=get_option('currency_symbol',"")?><?=currency_format(get_field(USERS, ["id" => session('uid')], 'balance'))?>
                <?php }else{?> 
                  <?=lang("Admin_account")?>
                <?php }?> 
              </small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="<?=cn('profile')?>">
              <i class="dropdown-icon fe fe-user"></i> <?=lang("Profile")?>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?=cn("auth/logout")?>">
              <i class="dropdown-icon fe fe-log-out"></i> <?=lang("Sign_out")?>
            </a>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler text-white d-lg-none ml-3 ml-lg-0 my-auto" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">

      <?php
        $array_allow = array('services', 'category', 'subscriptions', 'dripfeed', 'users', 'tickets', 'faqs', 'log', 'transactions');
        if (in_array(segment(1), $array_allow) || in_array(segment(2), $array_allow)) {
      ?>
      <div class="col-lg-3 ml-auto">
        <form class="input-icon my-3 my-lg-0">
          <input type="text" class="form-control ajaxSearchItem header-search"  data-url="<?=cn(segment(1)."/ajax_search")?>" placeholder="<?=lang("Search_for_")?>">
          <div class="input-icon-addon">
            <span class="js-search-loading-icon d-none" style="top: 0px;">
              <img src="<?=BASE?>assets/images/round-loading.svg" alt="round-loading" style="width: 14px; height: 14px;">
            </span>
            <span class="js-search-icon">
              <i class="fe fe-search"></i>
            </span>
          </div>
        </form>
      </div>
      <?php }?>
    
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
          <li class="nav-item">
            <a href="<?=cn('statistics')?>" class="nav-link <?=(segment(1) == 'statistics')?"active":""?>"><i class="fe fe-bar-chart-2"></i> <?=lang("Statistics")?></a>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link  <?=(segment(1) == 'dripfeed' || segment(1) == 'order' || segment(1) == 'subscriptions')?"active":""?>" data-toggle="dropdown"><i class="fe fe-edit"></i><?=lang('Order')?></a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="<?=cn('order/add')?>" class="dropdown-item "><?=lang("New_order")?></a>
              <a href="<?=cn('order/log')?>" class="dropdown-item "><?=lang("order_logs")?></a>
              <a href="<?=cn('dripfeed')?>" class="dropdown-item "><?=lang("dripfeed")?></a>
              <a href="<?=cn('subscriptions')?>" class="dropdown-item "><?=lang("Subscriptions")?></a>
            </div>
          </li>
          
          <?php
            if (get_role("admin")) {
          ?>
          <li class="nav-item">
            <a href="<?=cn('category')?>" class="nav-link <?=(segment(1) == 'category')?"active":""?>"><i class="fa fa-table"></i> <?=lang("Category")?></a>
          </li>
          
          <?php }?>

          <li class="nav-item dropdown">
            <a href="<?=cn('services')?>" class="nav-link <?=(segment(1) == 'services')?"active":""?>"><i class="fe fe-list"></i> <?=lang('Services')?></a>
          </li>   
                
          <li class="nav-item dropdown">
            <a href="<?=cn('api/docs')?>" class="nav-link <?=(segment(2) == 'docs')?"active":""?>"><i class="fe fe-share-2"></i> <?=lang("API")?></a>
          </li>
                    
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link <?=(segment(1) == 'tickets' || segment(1) == 'faqs')?"active":""?>" data-toggle="dropdown"><i class="fa fa-comments-o"></i><?=lang('Support')?></a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="<?=cn('tickets')?>" class="dropdown-item "><?=lang("Tickets")?></a>
              <a href="<?=cn('faqs')?>" class="dropdown-item "><?=lang("FAQs")?></a>
            </div>
          </li>
          
          <?php
            if (!get_role("admin")) {
          ?>
          <li class="nav-item dropdown">
            <a href="<?=cn('add_funds')?>" class="nav-link <?=(segment(1) == 'add_funds')?"active":""?>"><i class="fa fa-money"></i> <?=lang("Add_funds")?></a>
          </li>   

          <li class="nav-item dropdown">
            <a href="<?=cn('transactions')?>" class="nav-link <?=(segment(1) == 'transactions')?"active":""?>"><i class="fe fe-calendar"></i> <?=lang("Transaction_logs")?></a>
          </li>
          <?php }?>
          
          <?php if(get_role("admin")){?>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link <?=(segment(1) == 'news' || segment(1) == 'api_provider' || segment(1) == 'users' ||segment(1) == 'transactions' || segment(1) == 'setting')?"active":""?>" data-toggle="dropdown"><i class="fe fe-settings"></i><?=lang("Admin_area")?></a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="<?=cn('users')?>" class="dropdown-item"><?=lang("users")?></a>
              <a href="<?=cn('setting')?>" class="dropdown-item"><?=lang("Settings")?></a>
              <a href="<?=cn('api_provider')?>" class="dropdown-item"><?=lang("API_providers")?></a>
              <a href="<?=cn('transactions')?>" class="dropdown-item"><?=lang("Transaction_logs")?></a>
              <a href="<?=cn('news')?>" class="dropdown-item"><?=lang("news__announcement")?></a>
              <a href="<?=cn('language')?>" class="dropdown-item"><?=lang("Language")?></a>
              <a href="<?=cn('module')?>" class="dropdown-item"><?=lang("Enter_license")?></a>
              <a href="https://smartpanel.cf/docs/" class="dropdown-item"><?=lang("Documentation")?></a>
            </div>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </div>
</div>
