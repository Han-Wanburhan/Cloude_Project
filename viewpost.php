<?php include('server.php'); ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Post</title>

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<div class="postviewer">
		<div class="left">
			<div class="close">
				<i class="fas fa-xmark text-purple btn"></i>
			</div>
			<div class="behind-box">
				<div class="image_post"></div>
			</div>
		</div>
		<div class="right">
			<div class="top">
				<div class="box">
					<div class="topleft">
						<div class="left">
							<div class="profile-user"></div>
						</div>
						<div class="right">
							<div class="username text-purple">
								<b>KBung323</b>
							</div>
							<div class="timepost">22/5/2022</div>
						</div>
					</div>
					<div class="topright">
						<div class="showlike text-purple">21</div>
						<form action="like_db.php" method="post">
						<div class="btn-like">
							<button type="submit" name="like">  
							<i class="fa-solid fa-heart"></i>
							</button>
						</div>
						</form>
						<div class="btn-donate">
							<i class="fa-solid fa-circle-dollar-to-slot"></i>
						</div>
					</div>
				</div>
				<div class="bottom">
					<div class="caption">
						Good morning. My Friday Lorem ipsum dolor sit amet
						consectetur adipisicing elit. In, eos? Quos minus
						nihil quis culpa labore suscipit eaque adipisci,
						architecto necessitatibus commodi sed nesciunt
						accusamus laudantium iusto, magni nemo id!
						<div class="edit"><i class="fas fa-pen"></i></div>
					</div>
				</div>
				<hr />
				<?php
				include('server.php');
				$sql = mysqli_query($conn, "SELECT * FROM comment 
                                INNER JOIN user on comment.id_user = user.id
                                where id_post = 1");
				while ($row = mysqli_fetch_array($sql)) {
				?>
					<div class="bottom comment-zone">
						<div class="left">
							<div class="profile-user">
							<?php echo $row['img_profile']; ?>
							</div>
						</div>
						<div class="right">

							<div class="username text-purple">
								<?php echo $row['name']; ?>
							</div>
							<div class="comment"><?php echo $row['text_comment']; ?></div>

						</div>
					</div>
				<?php } ?>
				<form action="viewpost_db.php" method="post">
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
					<div class="bottom comment-zone">
						<div class="right">
							<div class="input_comment">
								<input type="text" placeholder="Comment..." name="comment"> <button type="submit" name="create_comment" class="btn login">Enter</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>