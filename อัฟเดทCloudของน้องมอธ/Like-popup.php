<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<center>
		<div class="like">
			<div class="top">
				<div class="text-purple"><b><?php

											$query = mysqli_query($conn, "SELECT COUNT(*) FROM `like` WHERE id_post=1");
											$roww = mysqli_fetch_array($query);
											$total = $roww[0];
											echo $total
											?></b></div>
				<div class="close"></div>
				<i class="fas fa-xmark text-purple btn"></i>
			</div>
		<div class="bottom">
			<?php
			$sql = mysqli_query($conn, "SELECT * FROM `like` 
                                INNER JOIN user on `like`.id_user = user.id
                                where id_post = 1");
			while ($row = mysqli_fetch_array($sql)) {
			?>
				<div class="box">
					<div class="inside-box">
						<div class="profile-user"><?php echo $row['img_profile'] ?> </div>
						<div class="username text-purple"> <?php echo $row['name'] ?> </div>
					</div>
					<div class="heart"><i class="fas fa-heart"></i></div>
				</div>
				<?php } ?>
		</div>
	</div>
	</center>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>