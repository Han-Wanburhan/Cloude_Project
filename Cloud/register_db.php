<?php 
    session_start();
    include ('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $age = mysqli_real_escape_string($conn,$_POST['age']);

        if (empty($email)){
            array_push($error,"Email is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($password)){
            array_push($error,"password is required");
            $_SESSION['error'] = "Password is required";
        }
        if (empty($username)){
            array_push($error,"Username is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($name)){
            array_push($error,"Name is required");
            $_SESSION['error'] = "Name is required";
        }
        if (empty($gender)){
            array_push($error,"Gender is required");
            $_SESSION['error'] = "Gender is required";
        }
        if (empty($age)){
            array_push($error,"Age is required");
            $_SESSION['error'] = "Age is required";
        }
        $user_check_query =  "SELECT * FROM user WHERE username = '$username' OR email = 'email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc ($query);

        if ($result){ // if user exists
            if ($result['username']=== $username){
                array_push($errors,"Username already exists");
            }
            if ($result['email']=== $email){
                array_push($errors,"email already exists");
            }

        }
        
        if(count($errors) == 0) {
            $password = md5($password);
            $sql = "INSERT INTO user(username,password,email,name,gender,age)VALUES('$username','$password','$email','$name','$gender','$age')";
            mysqli_query($conn,$sql);
            $_SESSION['username']=$username;
            $_SESSION['success']="You are now login";
            header('location: index.php');
        }
    
    }
?>