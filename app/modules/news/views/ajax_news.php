<div id="main-modal-content" class="news_announcement">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-pantone">
          <h4 class="modal-title"><i class="fe fe-award"></i> <?=lang("whats_new_on_smartpanel")?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body o-auto" >
          <?php
            if (!empty($news)) {
          ?>
          <?php
            $i = 0;
            foreach ($news as $key => $row) {
              switch ($row->type) {
                case 'new_services':
                  $type  = lang("New_services");
                  $color = "btn-info";
                  break;
                case 'disabled_services':
                  $type = lang("Disabled_services");
                  $color = "btn-orange";
                  break;
                case 'updated_services':
                  $type = lang("Updated_services");
                  $color = "btn-lime";
                  break;
                case 'announcement':
                  $type = lang("Announcement");
                  $color = "btn-primary";
                  break;
              }
          ?>
          <div class="news-item">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title btn round <?=$color?> btn-sm text-uppercase"><?=$type?></h3>
                <small class="text-muted m-l-5"><?=date("d/m/Y" , strtotime($row->created))?></small>
              </div>
              <div class="card-body desc">
                <?=htmlspecialchars_decode($row->description, ENT_QUOTES)?>
              </div>
            </div>
          </div>
            <?php }?>
          <?php }else{?>

          <div class="data-empty text-center">
            <div class="content">
              <img class="img mb-1" src="<?=BASE?>assets/images/ofm-nofiles.png" alt="empty">
              <div class="title"><?=lang("look_like_there_are_no_results_in_here")?></div>
            </div>
          </div>
          <?php }?>

        </div>
      </div>
    </div>
  </div>
</div>
