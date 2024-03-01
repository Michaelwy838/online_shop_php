<?php
session_start();
require_once('db.php');
if(isset($_POST['submit'])){
    $sql = "SELECT * FROM staff";
    $result = mysqli_query($conn, $sql);
    $staff = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username) || empty($createpassword) || empty($confirmpassword)){
        $_SESSION['error'] = "All Fields Are Required";
    }elseif(!filter_var($username, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid Email";
    }elseif(strlen($createpassword) < 8){
        $_SESSION['error'] = "Password is too Short";
    }elseif($createpassword != $confirmpassword){
        $_SESSION['error'] = "Passwords Don't Match";
    }
    for($i = 0; $i < count($staff); $i++){
        if($staff[$i]['username'] == $username){
            $_SESSION['error'] = "User Already Exists";
        }
    }

    if(isset($_SESSION['error'])){
        $_SESSION['data'] = $_POST;
        header('location: createuser.php');
        die();
    }else{
        $password = password_hash($confirmpassword, PASSWORD_DEFAULT);
        $sql = "INSERT into staff(username, password) VALUES('$username', '$password')";
        if(mysqli_query($conn, $sql)){
            $_SESSION['success'] = "A User $username has been created";
            header('location: staff.php');
        }
    }
}

?>