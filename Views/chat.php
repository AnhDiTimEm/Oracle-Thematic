<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<title>Eagle Chat</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="./asset/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		
		<!-- Swipe core CSS -->
		<link href="./asset/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="./asset/img/favicon.png" type="image/png" rel="icon">

	</head>
	<body>
		<main>
			<div class="layout">
				<!-- Start of Navigation -->
				<?php require_once SITE_ROOT."/Views/layout/navigation.php"; ?>
				<!-- End of Navigation -->
	
				<!-- Start of Sidebar -->
				<div class="sidebar" id="sidebar">
				
					<div class="container">
						<div class="col-md-12">
							<div class="tab-content">

								<!-- Start of Contacts -->
								<?php require_once SITE_ROOT."/Views/layout/sidebar/contacts.php"; ?>
								<!-- End of Contacts -->

								<!-- Start of Discussions -->
								<?php require_once SITE_ROOT."/Views/layout/sidebar/discussions.php"; ?>
								<!-- End of Discussions -->

								<!-- Start of Notifications -->
								<?php require_once SITE_ROOT."/Views/layout/sidebar/notifications.php"; ?>
								<!-- End of Notifications -->

								<!-- Start of Settings -->
								<?php require_once SITE_ROOT."/Views/layout/sidebar/settings.php"; ?>
								<!-- End of Settings -->

							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->

				<!-- Start of Add Friends -->
				<?php require_once SITE_ROOT."/Views/layout/add-friends.php"; ?>
				<!-- End of Add Friends -->

				<!-- Start of Create Chat -->
				<?php require_once SITE_ROOT."/Views/layout/create-chat.php"; ?>
				<!-- End of Create Chat -->

				<div class="main">
					<div class="tab-content" id="nav-tabContent">

						<!-- Start of Babble -->
						<?php 
							foreach ($listNotificationForRequest as $noti) 
							{
								require SITE_ROOT."/Views/layout/chat-request.php";
							}
						?>
						<!-- End of Babble -->

					</div>
				</div>

			</div> <!-- Layout -->
		</main>
		<!-- Bootstrap/Swipe core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!-- <script src="./asset/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<script>window.jQuery || document.write('<script src="./asset/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="./asset/js/vendor/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- <script src="./asset/js/swipe.min.js"></script> -->
		<script src="./asset/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				updateData();

				setInterval(function(){
					updateData()
				},1000);
				function updateData(){
					$.ajax({
						url:"Views/status.php",
						method:"POST",
						success:function(data){
							$('#ajax_contacts').html(data);
						}
					})
				}
			});
		</script>
		<script>
			// function scrollToBottom(el) { el.scrollTop = el.scrollHeight; }
			// scrollToBottom(document.getElementById('content'));
			//Logout Function
				function visitPage(){window.location="?signout"}
				$(".menu a i").on("click",function(){$(".menu a i").removeClass("active"),$(this).addClass("active")}),$("#contact, #recipient").click(function(){$(this).remove()}),$(function(){$('[data-toggle="tooltip"]').tooltip()}),$(document).ready(function(){$(".filterMembers").not(".all").hide("3000"),$(".filterMembers").not(".all").hide("3000"),$(".filterMembersBtn").click(function(){var t=$(this).attr("data-filter");$(".filterMembers").not("."+t).hide("3000"),$(".filterMembers").filter("."+t).show("3000")})}),$(document).ready(function(){$(".filterDiscussions").not(".all").hide("3000"),$(".filterDiscussions").not(".all").hide("3000"),$(".filterDiscussionsBtn").click(function(){var t=$(this).attr("data-filter");$(".filterDiscussions").not("."+t).hide("3000"),$(".filterDiscussions").filter("."+t).show("3000")})}),$(document).ready(function(){$(".filterNotifications").not(".all").hide("3000"),$(".filterNotifications").not(".all").hide("3000"),$(".filterNotificationsBtn").click(function(){var t=$(this).attr("data-filter");$(".filterNotifications").not("."+t).hide("3000"),$(".filterNotifications").filter("."+t).show("3000")})}),$(document).ready(function(){$("#people").on("keyup",function(){var t=$(this).val().toLowerCase();$("#contacts a").filter(function(){$(this).toggle($(this).text().toLowerCase().indexOf(t)>-1)})})}),$(document).ready(function(){$("#conversations").on("keyup",function(){var t=$(this).val().toLowerCase();$("#chats a").filter(function(){$(this).toggle($(this).text().toLowerCase().indexOf(t)>-1)})})}),$(document).ready(function(){$("#notice").on("keyup",function(){var t=$(this).val().toLowerCase();$("#alerts a").filter(function(){$(this).toggle($(this).text().toLowerCase().indexOf(t)>-1)})})}),$(document).ready(function(){clicked=!0,$(".mode").click(function(){clicked?($("head").append('<link href="dist/css/dark.min.css" id="dark" type="text/css" rel="stylesheet">'),clicked=!1):($("#dark").remove(),clicked=!0)})}),$(".back").click(function(){$("#call"+$(this).attr("name")).hide(),$("#chat"+$(this).attr("name")).removeAttr("style")}),$(".connect").click(function()
				{$("#chat"+$(this).attr("name")).hide(),$("#call"+$(this).attr("name")).show()});
		</script>

	</body>
</html>