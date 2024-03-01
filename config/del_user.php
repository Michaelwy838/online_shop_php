<?php
session_start();
require_once('db.php');
$id = filter_var($_POST['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if(isset($_POST["submit$id"])){
    $uid = filter_var($_POST['uid'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "DELETE from staff WHERE id = '$uid'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'You Have Deleted a user';
        header('location: staff.php');
        die();
    }
}

?>