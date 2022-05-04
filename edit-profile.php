<?php 
session_start();
if(!isset($_SESSION["user_id"])){
    header("location: index.php");
}
    include('server.php');
     if (isset($_POST["submit"])){
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $about_me = mysqli_real_escape_string($conn, $_POST["about_me"]);
             
		$img_profile_name = $_FILES["img_profile"]["name"];
		$img_profile_tmp_name = $_FILES["img_profile"]["tmp_name"];
		$img_profile_size = $_FILES["img_profile"]["size"];
		$img_profile_new_name = rand() . $img_profile_name;

		$img_donate_name = $_FILES["img_donate"]["name"];
		$img_donate_tmp_name = $_FILES["img_donate"]["tmp_name"];
		$img_donate_size = $_FILES["img_donate"]["size"];
		$img_donate_new_name = rand() . $img_donate_name;
	
		if($img_profile_size === $img_donate_size > 10485760){
			echo "<script>alert('Photo is very big. Maxmimum photo uploading size is 10MB. '); </script>";
		}
		 else {
			$sql = "UPDATE USER SET name='$name', about_me='$about_me', img_profile='./images/peofile/$img_profile_new_name', img_donate='./images/donate/$img_donate_new_name' WHERE id='{$_SESSION["user_id"]}'";
			$result = mysqli_query($conn, $sql);
			if($result){
				echo"<script>alert('Profile Updated successfully. '); </script>";
				move_uploaded_file($img_profile_tmp_name, "images/profile/" . $img_profile_new_name);
				move_uploaded_file($img_donate_tmp_name, "images/donate/" . $img_donate_new_name);
			} else {
				echo "<script>alert('Profile can not Update. '); </script>";
				echo $conn->error;
			}
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Edit Profile</title>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
			integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>

		<link rel="stylesheet" href="style.css" />
	</head>
	<body bgcolor="e7e7e7">
		<div class="edit-profile">
			<div class="top">
				<div class="box box-1">
					<div class="title text-purple">Edit Profile</div>
                    <form action="./edit-profile.php" method="post" enctype="multipart/form-data">
                    <?php 
                        $sql ="SELECT * FROM user WHERE id='{$_SESSION["user_id"]}'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)){   
                    ?>
					<div class="close">
						<i class="fas fa-xmark text-purple btn" onclick="window.location.href='profile.html'"></i>
					</div>
				</div>
			</div>
            
			<div class="bottom">
				<div class="box box-2">
					<div class="group">
						<div class="logoedit middle"><i class="fas fa-pen"></i></div>
						<div class="txt_edit_name text-purple txt">
							Edit user name
						</div>
					</div>

					<div class="txt_input_name">
						<input type="text" placeholder="name" id="name" name="name" value="<?php echo $row['name'];?>"/>
					</div>
				</div>

				<div class="box box-3">
					<div class="group">
						<div class="logoedit"><i class="fas fa-pen"></i></div>
						<div class="edit_img text-purple txt">Edit profile image</div>
					</div>
					<div class="btn_upimg"></div>
				</div>
                <div class="btn_upimg">
                    <div class="group">
                    <label for="img_profile">Photo</label>
                    <input type="file" accept="image/*" id="img_profile" name="img_profile" require>
                    <img src="uplodes/<?php echo $row["img_profile"];?>" alt="">
                </div>
                </div>

				<div class="box box-4">
					<div class="group">
						<div class="logoedit"><i class="fas fa-pen"></i></div>
						<div class="txt_edit_caption text-purple txt">
							Edit caption
						</div>
					</div>
					<div class="box_input_caption">
						<!-- <textarea placeholder="Caption here"></textarea> -->
                        <textarea input type="text" placeholder="Caption here" name="about_me"  value="<?php echo $row['about_me'];?>" required></textarea>
					</div>
				</div>
                    

				<div class="box box-5">
					<div class="group">
						<div class="logoedit"><i class="fas fa-pen"></i></div>
						<div class="txt_edit_donation text-purple txt">
							Edit Donation
						</div>
					</div>
					<div class="btn upimg_donate text-purple"><i class="fas fa-image"></i></div>
					<label for="img_donate">Donation</label>
                    <input type="file" accept="image/*" id="img_donate" name="img_donate" require>
                    <img src="uplodes/<?php echo $row["img_donate"];?>" alt=""></div>      
				</div>
                <?php
                    }
                 }
                ?>
                <div class="bottom-center">
                    <!-- <button type="submit" class="btn">Update Profile</button> -->
						<input type="submit" name="submit" class="btn create_acc" value="Edit Profile">
					</div>	
				</div>
			</div>
		</div>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
			integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer">
		</script>
        </form>
	</body>
</html>