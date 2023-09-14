<?php
include('db.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];

    if(empty($username)){
        header("location:index.php?error= please the user name");
        exit();
    }
    elseif(empty($email)){
        header("location:index.php?error= please the email");
        exit();
    }
    else{
        $sql = "INSERT INTO `users`(`username`,`email`)VALUES('$username','$email')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("sql statement failed");
        }
        else {
            header("Location:index.php?success=Data has been inserted");
            exit();
        }
    }
}