<?php

if(isset($_POST['submit'])){
    require('db.php');
    session_start();

    $email = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "SELECT * from staff WHERE username = '$email'";
    $result = mysqli_query($conn, $sql);
    $staff = mysqli_fetch_assoc($result);
    $db_password = $staff['password'];


    if(empty($email) || empty($password)){
        $_SESSION['error'] = "All Fields Are Required";
    }elseif(!array_filter($staff)){
        $_SESSION['error'] = "User Doesnot Exist";
    }elseif(empty($staff)){
        $_SESSION['error'] = "User Not Found";
    }elseif(!password_verify($password, $db_password)){
        $_SESSION['error'] = "Incorrect Password";
    }

    if(isset($_SESSION['error'])){
        header('location: index.php');
        die();
    }else{
        $_SESSION['success'] = "session has been created for $email";
        $_SESSION['status'] = $staff['status'];
        $_SESSION['id'] = $staff['id'];
        header('location: orders.php');
        die();
    }


    // if(empty($email) || empty($password)){
    //     $_SESSION['error'] = "All Fields Are Required";
    // }

    // for($i = 0; $i < count($staff); $i++){
    //     if($staff[$i]['username'] == $email){
    //         $db_password = $staff[$i]['password'];
    //     }else{
    //         $_SESSION['error'] = "User Doesnot Exist";
    //         header('location: http://localhost/ntandy_foods/ntandy_foods_admin/');
    //         die();
    //     }
    // }
    // if(password_verify($password, $db_password)){

    // }


}


?>