<?php include('server.php'); ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

$sql = "SELECT post.*, USER.*, COUNT(LIKE.id_post) AS like_amount FROM post LEFT JOIN `like` ON post.id = LIKE.id_post LEFT JOIN USER ON post.id_user = USER.id GROUP BY post.id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Home Page</title>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
			integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>

		<link rel="stylesheet" href="style.css" />
	</head>

	<body bgcolor="#14213d">
    <?php 
    while($row = $result->fetch_assoc()) {
    

    ?>
		<center>
			<div class="postbox">
				<div class="top">
					<div class="left">
						<div class="profileimg"></div>
						<div class="box">
							<div class="username text-purple">
                            <b><?php  echo $row['name']; ?></b>
                            </div>
							<div class="posttime"><?php  echo date("F j, Y, g:i a", strtotime($row['time_stamp'])); ?></div>
						</div>
					</div>
					<div class="right">
						<div class="showlike text-purple"><?php  echo $row['like_amount']; ?></div>
						<div class="btn-like">
							<i class="fa-solid fa-heart"></i>
						</div>
					</div>
					<!-- <i class="fa-regular fa-heart"></i> -->
				</div>
				<div class="imgpost"><?php  echo $row['image']; ?></div>
				<div class="bottom">
                    <div class="top">
						<div class="btn-comment">
							<i class="fa-regular fa-comment-dots"></i>
						</div>
						<div class="btn-donate">
							<i class="fa-solid fa-circle-dollar-to-slot"></i>
						</div>
					</div>
					<div class="bottom">
						<div class="caption">
							<?php  echo $row['caption']; ?>
						</div>
					</div>
					
				</div>
			</div>
		</center>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
			integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
        <?php } ?>
	</body>
</html>
