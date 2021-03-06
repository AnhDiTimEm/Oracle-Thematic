<div class="navigation">
	<div class="container">
		<div class="inside">
			<div class="nav nav-tab menu">
				<a href="#settings" data-toggle="tab" class="btn"><img class="avatar-xl" src="<?php echo $user->getAvatar(); ?>" alt="avatar"></a>
				<a href="#discussions" data-toggle="tab" class="active"><i class="material-icons active" data-toggle="tooltip" title="+<?php echo count($allRoom)?>">chat_bubble_outline</i></a>
				<a href="#members" data-toggle="tab"><i class="material-icons">account_circle</i></a>
				<a href="#notifications" data-toggle="tab"><i class="material-icons" data-toggle="tooltip" title="+<?php echo count($listNotificationForRequest)?>">notifications_none</i></a>
				<!-- <a href="#notifications" data-toggle="tab" class="f-grow1"><i class="material-icons">notifications_none</i></a>
				<button class="btn mode"><i class="material-icons">brightness_2</i></button> -->
				<a href="#settings" data-toggle="tab"><i class="material-icons">settings</i></a>
				<a href="#signout" data-toggle="tab" onclick="visitPage();"><i class="material-icons">power_settings_new</i></a>
			</div>
		</div>
	</div>
</div>