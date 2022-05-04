<?php include('server.php'); ?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

$sql = "SELECT post.*, USER.*, COUNT(id_user) AS post_amount FROM post LEFT JOIN USER ON post.id_user = USER.id  WHERE id_user=4";
$result = $conn->query($sql);

$sqli = "SELECT * FROM post WHERE id_user=4";
$res = $conn->query($sqli);
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php 

    while($row = $result->fetch_assoc()) {
    

    ?>
    <div class="profile">
        <div class="top">
            <div class="left">
                <div class="img_profile"  style="background-image: url('<?php  echo $row['img_profile']; ?>');">
                    <div class="greyscale">
                        <i class="fas fa-pen"></i>
                    </div>
                </div>
            </div>
            <div class="middle-logo">
                <div class="username text-purple"><b><b><?php  echo $row['name']; ?></b></b></div>
                <div class="aboutme">
                <b><?php  echo $row['about_me']; ?></b>
                </div>
            </div>
            <div class="right">
                <div class="btn donate">
                    Donate &nbsp;
                    <i class="fa-solid fa-circle-dollar-to-slot"></i>
                </div>
                <div class="group">
                    <div class="box">
                        <div class="imgpostlogo">
                            <i class="fas fa-images"></i>
                        </div>
                        <div class="txt_amount_post text-purple">
                        <b><?php  echo $row['post_amount']; ?> Posts</b>
                        </div>
                    </div>
                    <div class="box">
                        <div class="imgedit_profile">
                            <i class="fas fa-pen"></i>
                        </div>
                        <div class="txt_edit_profile text-purple">Edit</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="profile-bottom">
    <?php 

    while($row1 = $res->fetch_assoc()) {


    ?>
        <div class="imgpost" style="background-image: url('<?php  echo $row1['image']; ?>');">
            <div class="greyscale">
                <div class="box">
                    <div class="like-inside">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="txt_like-inside">23</div>
                </div>
                <div class="box">
                    <div class="comment-inside">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <div class="txt_comment-inside">3</div>
                </div>
            </div>
        </div>
        
    <?php } ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>