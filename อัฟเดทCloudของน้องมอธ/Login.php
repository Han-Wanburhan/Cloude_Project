<?php include('server.php');
include('login_db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<link rel="stylesheet" href="style.css" />
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="left" data-aos="fade-right">
			<div class="logo">
				<div class="image"></div>
			</div>
			<div class="title text-purple">มังกรคุง.com</div>
		</div>
		<form action="login_db.php" method="post">

			<div class="right">
				<div class="box" data-aos="fade-left">
					<div class="username">
						<input type="text" placeholder="Username" name="username" />
					</div>
					<div class="password">
						<input type="password" placeholder="Password" name="password" />
					</div>
					<div class="failed_login">
						<?php if (isset($_SESSION['error'])) : ?>
							<div class="error">
								<?php
								echo $_SESSION['error'];
								unset($_SESSION['error']);
								?>
							</div>
						<?php endif ?>
					</div>
					<button type="submit" name="login_user" class="btn login">LOGIN</button>
					<div class="line">
						<hr />
					</div>
					<center>
						<div class="btn create_acc" onclick="window.location.href='register.php'">
							Create New Account
						</div>
					</center>
					<div class="note_create_acc">
						<b>Create Account</b> to connect and share with the
						people in your life
					</div>
				</div>
			</div>
		</form>
	</div>

	<script>
		AOS.init();
	</script>
</body>

</html>