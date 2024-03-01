<?php 
    $id = $_POST['id'];
if(isset($_POST["submit$id"])){

    require('db.php');
    session_start();
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $sql = "UPDATE userdetails set status = 1 WHERE uid = '$uid'";

    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = "$name's order has been completed";
        header('location: orders.php');
    }
}
?>