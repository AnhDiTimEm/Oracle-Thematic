<div id="discussions" class="tab-pane fade active show">
	<div class="search">
		<form class="form-inline position-relative">
			<input type="search" class="form-control" id="conversations" placeholder="Search for conversations...">
			<button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
		</form>
		<button class="btn create" data-toggle="modal" data-target="#startnewchat"><i class="material-icons">create</i></button>
	</div>
	<div class="list-group sort">
		<button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
		<button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Read</button>
		<button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Unread</button>
	</div>						
	<div class="discussions">
		<h1>Discussions</h1>
		<div class="list-group" id="chats" role="tablist">
		<?php
			foreach ($allRoom as $key) {
				$typeRoom = $roomDao->GetTypeOfRoom($key);
				$memberList = $roomDao->GetAllMemberOfRoom($key);
				$member='';
				echo'
				<a href="#list-empty" class="filterDiscussions all unread single" id="list-empty-list" data-toggle="list" role="tab">
					<img class="avatar-md" src="./asset/img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
					<div class="status">
						<i class="material-icons offline">fiber_manual_record</i>
					</div>';
				if($typeRoom =="friend"){
					foreach($memberList as $m){
						if($m!=$_SESSION['user']){
							$member=$m;
						}
					}
					echo'
					<div class="data">
						<h5>'.$member.'</h5>
						<span>Sun</span>
						<p>How can i improve my chances of getting a deposit?</p>
					</div>';
				}
				else if($typeRoom == "group"){
					echo'
					<div class="data">
						<h5>'.'Group Code: '.$key.'</h5>
						<span>Sun</span>
						<p>How can i improve my chances of getting a deposit?</p>
					</div>';
				}
				echo'
			</a>
				';
			};
		?>
			<a href="#list-chat" class="filterDiscussions all unread single active" id="list-chat-list" data-toggle="list" role="tab">
				<img class="avatar-md" src="./asset/img/avatars/avatar-female-1.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
				<div class="status">
					<i class="material-icons online">fiber_manual_record</i>
				</div>
				<div class="data">
					<h5>Janette Dalton</h5>
					<span>Mon</span>
				</div>
			</a>									
			<!-- <a href="#list-empty" class="filterDiscussions all unread single" id="list-empty-list" data-toggle="list" role="tab">
				<img class="avatar-md" src="./asset/img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
				<div class="status">
					<i class="material-icons offline">fiber_manual_record</i>
				</div>
				<div class="data">
					<h5>Michael Knudsen</h5>
					<span>Sun</span>
					<p>How can i improve my chances of getting a deposit?</p>
				</div>
			</a>									
			<a href="#list-empty" class="filterDiscussions all read single" id="list-chat-list2" data-toggle="list" role="tab">
				<img class="avatar-md" src="./asset/img/avatars/avatar-female-2.jpg" data-toggle="tooltip" data-placement="top" title="Lean" alt="avatar">
				<div class="status">
					<i class="material-icons offline">fiber_manual_record</i>
				</div>
				<div class="data">
					<h5>hkhoa</h5>
					<span>Tus</span>
					<p>Hey Chris, could i ask you to help me out with variation...</p>
				</div>
			</a>
			<a href="#list-empty" class="filterDiscussions all read single" id="list-empty-list2" data-toggle="list" role="tab">
				<img class="avatar-md" src="./asset/img/avatars/avatar-male-2.jpg" data-toggle="tooltip" data-placement="top" title="Mariette" alt="avatar">
				<div class="status">
					<i class="material-icons offline">fiber_manual_record</i>
				</div>
				<div class="data">
					<h5>Mariette Toles</h5>
					<span>5 mins</span>
					<p>By injected humour, or randomised words which...</p>
				</div>
			</a> -->
		</div>
	</div>
</div>