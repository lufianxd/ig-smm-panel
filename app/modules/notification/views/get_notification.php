<?php if(!check_expiration_date()){?>
<div class="notification">
	<div class="notification-board">
		<ul>
			<li class="danger"><i class="ft-alert-circle"></i> <?=lang("your_account_has_expired_Please_renew_for_further_use")?></li>
		</ul>
	</div>
</div>
<?php }?>