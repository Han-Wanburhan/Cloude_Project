<?php include ('server.php');?>
<?php
    session_start();
    if (!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
    ?>
<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <center>
        <div action="upload.php" method="post" enctype="multipart/form-data" class="post">
            <div class="top">
                <div class="create_post text-purple">
                    <b>CREATE POST</b>
                </div>
                <div class="close">
                    <i class="fas fa-xmark text-purple btn"></i>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <div class="userimg"></div>
                    <div class="username text-purple"><?php echo $_SESSION["username"]; ?></div>
                </div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="uploadBox btn">
                        <input type="file" name="image">
                        <i class="fas fa-image"></i>

                        <div class="txt_Upload text-purple">Upload Picture</div>
                    </div>
                    <div class="description">
                        <textarea placeholder="What do you think..." name="caption"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Upload">
                </form>
            </div>
        </div>
    </center>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>