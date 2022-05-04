<?php
session_start();
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>REGISTER</title>
	<link rel="stylesheet" href="style.css" />
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
	<div class="container">
		<div class="left" data-aos="fade-right">
			<div class="logo">
				<div class="image"></div>
			</div>
			<div class="title text-purple">Title</div>
		</div>

		<div class="right">
			<div class="box" data-aos="fade-left">
				<form action="register_db.php" method="post">
					<?php include('errors.php'); ?>
					<?php if (isset($_SESSION['error'])) : ?>
						<div class="error">
							<h3>
								<?php
								echo $_SESSION['error'];
								unset($_SESSION['error']);
								?>
							</h3>
						</div>
					<?php endif ?>
					<div class="txtregister">REGISTER</div>
					<div class="txt_input">Username</div>
					<div class="input_username">
						<input type="text" placeholder="Username" name="username" />
					</div>
					<div class="txt_input">Password</div>
					<div class="input_password">
						<input type="password" placeholder="Password" name="password" />
					</div>
					<div class="txt_input">Email</div>
					<div class="input_email">
						<input type="email" placeholder="Email" name="email" />
					</div>
					<div class="txt_input">Name</div>
					<div class="input_name">
						<input type="text" placeholder="Name" name="name" />
					</div>
					<div class="row">
						<div class="group">
							<div class="txt_input">Gender</div>
							<div class="input_gender">
								<select name="gender">
									<option value="1">ชาย</option>
									<option value="2">หญิง</option>
									<option value="3">อื่นๆ</option>
								</select>
							</div>
						</div>
						<div class="group">
							<div class="txt_input">Age</div>
							<div class="input_age">
								<input type="text" placeholder="Age" name="age" />
							</div>
						</div>
					</div>
					<div class="bottom-center">
						<button type="submit" name="reg_user" class="btn create_acc">Create New Account</button>
					</div>
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