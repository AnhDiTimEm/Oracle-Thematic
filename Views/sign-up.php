<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Sign Up – Swipe</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="./asset/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="./asset/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="./asset/img/favicon.png" type="image/png" rel="icon">
		<style>
/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
		}

		/* Firefox */
		input[type=number] {
		-moz-appearance: textfield;
}
</style>
	</head>
	<body class="start">
		<main>
			<div class="layout">
				<!-- Start of Sign Up -->
				<div class="main order-md-2">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>Create Account</h1>
									<div class="third-party">
										<button class="btn item bg-blue">
											<i class="material-icons">pages</i>
										</button>
										<button class="btn item bg-teal">
											<i class="material-icons">party_mode</i>
										</button>
										<button class="btn item bg-purple">
											<i class="material-icons">whatshot</i>
										</button>
									</div>
									<p>or use your email for registration:</p>
									<form class="signup" action="?signup=1" method="POST">
										<div class="form-parent">
											<div class="form-group">
												<input type="number" name="inputPhone" id="inputPhone" class="form-control" placeholder="Your Phone" onchange="CheckInformation()" onkeydown="CheckInformation()" required>
												<button class="btn icon"><i class="material-icons">phone</i></button>
											</div>
										</div>
										<div class="form-group">
											<input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" onchange="CheckInformation()" onkeydown="CheckInformation()" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<div class="form-group">
											<input type="password" name="reinputPassword" id="reinputPassword" class="form-control" placeholder="Confirm Password" onchange="CheckInformation()" onkeydown="CheckInformation()" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<button id="sign-up" type="submit" class="btn button" disabled>Sign Up</button> <!--formaction="?signup"-->
										<p id="SignupNotification" style="color: red;"></p>
										<div class="callout">
											<span>Already a member? <a href="http://localhost/Oracle-Thematic">Sign In</a></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign Up -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-1">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2>Welcome Back!</h2>
								<p>To keep connected with your friends please login with your personal info.</p>
								<a href="?signin" class="btn button">Sign In</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
			</div> <!-- Layout -->
		</main>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="./asset/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="./asset/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="./asset/js/vendor/popper.min.js"></script>
		<script src="./asset/js/bootstrap.min.js"></script>
		<script src="./script.js"></script>
	</body>


</html>