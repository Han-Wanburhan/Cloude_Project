<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['create_comment'])) {
    $text_comment = mysqli_real_escape_string($conn, $_POST['comment']);

    if (count($errors) == 0) {
        $sql = "INSERT INTO comment(id_user,id_post,text_comment,time_stamp)VALUES(" . $_SESSION['user_id'] . ",1,'$text_comment',CURRENT_TIMESTAMP)";
        mysqli_query($conn, $sql);
        header('location: viewpost.php');
    }
    
}
