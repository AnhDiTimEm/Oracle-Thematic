<div class="tab-pane fade" id="members">
	<div class="search">
		<form class="form-inline position-relative">
			<input type="search" class="form-control" id="people" placeholder="Search Friend..." onfocusout="this.value=''">
			<button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
		</form>
		<button class="btn create" data-toggle="modal" data-target="#exampleModalCenter"><i class="material-icons">person_add</i></button>
	</div>
	<!-- <div class="list-group sort">
		<button class="btn filterMembersBtn active show" data-toggle="list" data-filter="all">All</button>
		<button class="btn filterMembersBtn" data-toggle="list" data-filter="online">Online</button>
		<button class="btn filterMembersBtn" data-toggle="list" data-filter="offline">Offline</button>
	</div>						 -->
	<div class="contacts">
		<h1>Contacts</h1>
		<div id="ajax_contacts"></div>
		<!-- <div class="list-group" id="contacts" role="tablist" name="contacts"> -->
		<?php
			// foreach($listFriend as $f){
			// echo '<a href="#listempty"';
			// if($f->getStatus()=="offline"){
			// 	echo' class="filterMembers all offline contact" data-toggle="list">
			// 	<img class="avatar-md" src="'.$f->getAvatar().'" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
			// 	<div class="status">
			// 		<i class="material-icons offline">fiber_manual_record</i>
			// 	</div>';
				
			// }
			// else if($f->getStatus()=="online"){
			// 	echo' class="filterMembers all online contact" data-toggle="list">
			// 	<img class="avatar-md" src="'.$f->getAvatar().'" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
			// 	<div class="status">
			// 		<i class="material-icons online">fiber_manual_record</i>
			// 	</div>';
				
			// }
			// echo'<div class="data">
			// 		<h5>'.$f->getName().'</h5>
			// 		<p>'.$f->getPhone().'</p>
			// 	</div>
			// 	<div class="person-add">
			// 		<i class="material-icons">person</i>
			// 	</div>
			// </a>';
			// }
		?>
			<!-- <a href="#listchat" class="filterMembers all online contact" data-toggle="list">
				<img class="avatar-md" src="./asset/img/avatars/avatar-female-1.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
				<div class="status">
					<i class="material-icons online">fiber_manual_record</i>
				</div>
				<div class="data">
					<h5>Janette Dalton</h5>
					<p>Sofia, Bulgaria</p>
				</div>
				<div class="person-add">
					<i class="material-icons">person</i>
				</div>
			</a>
			<a href="#listempty" class="filterMembers all online contact" data-toggle="list">
				<img class="avatar-md" src="./asset/img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
				<div class="status">
					<i class="material-icons online">fiber_manual_record</i>
				</div>
				<div class="data">
					<h5>Michael Knudsen</h5>
					<p>Washington, USA</p>
				</div>
				<div class="person-add">
					<i class="material-icons">person</i>
				</div>
			</a>
			<a href="#" class="filterMembers all online contact" data-toggle="list">
				<img class="avatar-md" src="./asset/img/avatars/avatar-male-2.jpg" data-toggle="tooltip" data-placement="top" title="Mariette" alt="avatar">
				<div class="status">
					<i class="material-icons online">fiber_manual_record</i>
				</div>
				<div class="data">
					<h5>Mariette Toles</h5>
					<p>Helena, Montana</p>
				</div>
				<div class="person-add">
					<i class="material-icons">person</i>
				</div>
			</a> -->
			<!-- <a href="#" class="filterMembers all offline contact" data-toggle="list">
				<img class="avatar-md" src="./asset/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
				<div class="status">
					<i class="material-icons offline">fiber_manual_record</i>
				</div>
				<div class="data">
					<h5>Keith Morris</h5>
					<p>Chisinau, Moldova</p>
				</div>
				<div class="person-add">
					<i class="material-icons">person</i>
				</div>
			</a> -->
		<!-- </div> -->
	</div>
</div>