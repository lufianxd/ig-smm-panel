<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" >
    <meta name="description" content="<?=get_option('website_desc', "SmartPanel - #1 SMM Reseller Panel - Best SMM Panel for Resellers. Also well known for TOP SMM Panel and Cheap SMM Panel for all kind of Social Media Marketing Services. SMM Panel for Facebook, Instagram, YouTube and more services!")?>">
    <meta name="keywords" content="<?=get_option('website_keywords', "smm panel, SmartPanel, smm reseller panel, smm provider panel, reseller panel, instagram panel, resellerpanel, social media reseller panel, smmpanel, panelsmm, smm, panel, socialmedia, instagram reseller panel")?>">
    <title><?=get_option('website_title', "SmartPanel - SMM Panel Reseller Tool")?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?=get_option('website_favicon', BASE."assets/images/favicon.png")?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">


    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    
    <script src="<?=BASE?>assets/js/vendors/jquery-3.2.1.min.js"></script>

    <!-- Core -->
    <link href="<?=BASE?>assets/css/core.css" rel="stylesheet">
      
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="<?=BASE?>assets/plugins/jquery-toast/css/jquery.toast.css">
    <link rel="stylesheet" href="<?=BASE?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">
    <link href="<?=BASE?>assets/css/util.css" rel="stylesheet">
    <link href="<?=BASE?>assets/css/general_page.css" rel="stylesheet">
    <link href="<?=BASE?>assets/css/layout.css" rel="stylesheet">
    <link href="<?=BASE?>assets/css/footer.css" rel="stylesheet">

    <script type="text/javascript">
      var token = '<?=$this->security->get_csrf_hash()?>',
          PATH  = '<?=PATH?>',
          BASE  = '<?=BASE?>';
      var    deleteItem = '<?=lang("Are_you_sure_you_want_to_delete_this_item")?>';
      var    deleteItems = '<?=lang("Are_you_sure_you_want_to_delete_all_items")?>';
    </script>

  </head>
  <body class="">
    <nav class="header-top navbar navbar-expand-lg navbar-light static-top fixed-top" id="headerNav">
      <div class="container">
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- smm.buglem1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5854049825040962"
     data-ad-slot="1706657789"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
        <a class="navbar-brand" href="<?=cn()?>">
          <img class="site-logo" src="<?=get_option('website_logo', BASE."assets/images/logo.png")?>" alt="Website logo">
        </a>
        <div class="d-flex order-lg-2 ml-auto">
          <ul class="navbar-nav list-inline ml-auto">

            <li class="nav-item list-inline-item">
              <a class="nav-link js-scroll-trigger" href="<?=cn()?>#home"><?=lang("Home")?></a>
            </li>
            
            <li class="nav-item list-inline-item">
              <a class="nav-link js-scroll-trigger" href="<?=cn()?>#features"><?=lang("What_we_offer")?></a>
            </li>            
             <?php
              if (get_option("enable_service_list_no_login") == 1) {
            ?>
            <li class="nav-item list-inline-item">
              <a class="nav-link js-scroll-trigger" href="<?=cn("services")?>"><?=lang("Services")?></a>
            </li>
            <?php }?>

          </ul>
          <div class="nav-item d-md-flex">
            <a class="link" href="<?=cn('auth/login')?>"><?=lang("Login")?></a>
            <a href="<?=cn('auth/signup')?>" class="btn btn-pill btn-outline-primary sign-up"><?=lang("Sign_Up")?></a>
          </div>
        </div>
      </div>
    </nav>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- smm.buglem2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5854049825040962"
     data-ad-slot="2873411554"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    
    <div class="page p-t-70">
      <div class="page-main">
        <div class="my-3 my-md-5">
          <div class="container">
            <?=$template['body']?>
          </div>
        </div>
        <div id="modal-ajax" class="modal fade" tabindex="-1"></div>
      </div>
    </div>
    
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- smm.buglem3 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5854049825040962"
     data-ad-slot="2972063021"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

    <?=Modules::run("blocks/footer");?>
    <script src="<?=BASE?>assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?=BASE?>assets/js/vendors/jquery.sparkline.min.js"></script>
    <script src="<?=BASE?>assets/js/core.js"></script>
    <script src="<?=BASE?>assets/js/general.js"></script>
  </body>
</html>

