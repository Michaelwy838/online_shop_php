<?php
    $conn = mysqli_connect('localhost', 'root', '', 'ntandy_foods');

    if(!$conn){
        echo 'query error: '. mysqli_connect_error($conn);
    }
?>