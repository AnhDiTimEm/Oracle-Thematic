<div id="discussions" class="tab-pane fade active show">
	<div class="search">
		<form class="form-inline position-relative">
			<input type="search" class="form-control" id="conversations" placeholder="Search for conversation....." onfocusout="this.value=''">
			<button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
		</form>
		<button class="btn create" data-toggle="modal" data-target="#startnewchat"><i class="material-icons">create</i></button>
	</div>
	<!-- <div class="list-group sort">
		<button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
		<button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Read</button>
		<button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Unread</button>
	</div>						 -->
	<div class="discussions">
		<h1>Discussions</h1>
		<div id="showChatRoom"></div>
		<?php
		// echo 
		// 	'<div class="list-group" id="chats" role="tablist">';
		// 		foreach ($allRoom as $key) {
		// 			$typeRoom = $roomDao->GetTypeOfRoom($key);
		// 			$memberList = $roomDao->GetAllMemberOfRoom($key);
		// 			if($typeRoom =="friend"){
		// 				foreach($memberList as $m){
		// 					if($m!=$_SESSION['user']){
		// 						$friend_Phone=$m;
		// 					}
		// 				}
		// 				$friend = $dao->GetUserByPhone($friend_Phone);
		// 				echo'
		// 				<a href="';
		// 				if($friend->getStatus()=="offline")
		// 				{
		// 					echo'#list-empty-'.$key.'';
		// 					echo'" class="filterDiscussions all unread single" id="list-empty-list" data-toggle="list" role="tab">';
		// 				}
		// 				else{
		// 					echo'#list-chat-'.$key.'';
		// 					echo'" class="filterDiscussions all unread single" id="list-chat-list" data-toggle="list" role="tab">';
		// 				};
		// 				echo'
		// 					<img class="avatar-md" src="'.$friend->getAvatar().'" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
		// 					<div class="status">
		// 						<i class="material-icons ';
		// 				if($friend->getStatus()=="offline")
		// 				{
		// 					echo'offline';
		// 				}else{
		// 					echo'online';
		// 				};
		// 				echo'">fiber_manual_record</i>
		// 					</div>';
		// 				echo'
		// 				<div class="data">
		// 					<h5>'.$friend->getName().'</h5>
		// 					<span>Sun</span>
		// 					<p>How can i improve my chances of getting a deposit?</p>
		// 				</div>';
		// 			}
		// 			else if($typeRoom == "group"){
		// 				echo'
		// 				<a href="#list-chat-'.$key.'" class="filterDiscussions all unread single" id="list-chat-list" data-toggle="list" role="tab">
		// 					<img class="avatar-md" src="./Resources/images/group.jpg" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
		// 					<div class="status">
		// 						<i class="material-icons online">fiber_manual_record</i>
		// 					</div>';
		// 				echo'
		// 				<div class="data">
		// 					<h5>'.'Group Code: '.$key.'</h5>
		// 					<span>Sun</span>
		// 					<p>How can i improve my chances of getting a deposit?</p>
		// 				</div>';
		// 			}
		// 			echo'
		// 			</a>
		// 		';
		// 	};
		// echo'</div>'
		?>
	</div>
</div>
