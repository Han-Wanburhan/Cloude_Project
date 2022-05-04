<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['like'])) {

    if (count($errors) == 0) {
        $sql = mysqli_query($conn, "SELECT * FROM `like` WHERE id_user = {$_SESSION['user_id']} and id_post = 1");
        if (mysqli_num_rows($sql) == 1) {
            $sql = "DELETE FROM `like` WHERE id_user='{$_SESSION['user_id']}'";
            mysqli_query($conn, $sql);
            header('location: viewpost.php');
        } else {
            $sql = "INSERT INTO `like`(id_user,id_post)VALUES(" . $_SESSION['user_id'] . ",1)";
            mysqli_query($conn, $sql);
            header('location: viewpost.php');
        }
    }
}
