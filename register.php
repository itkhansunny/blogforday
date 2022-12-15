<?php

include("blog-admin/config.php");
include("blog-admin/db.php");

if(isset($_POST['register'])){
    $username   = $_POST['register'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $hash       = password_hash($password, PASSWORD_DEFAULT);
    $time       = time();
    $token      = bin2hex(random_bytes(3));

    $message = "<h1>Thank you for registration in our website. Please click on link to confirm registration.</h1> <br/> <a href='http://phpd.test/blog/register.php?active=".$token."'>Active Account</a>";

    $sentMail = sentMail($email, $username, "Blog Registration Activation Mail", $message);
    
    if($sentMail){
        $sql = "INSERT INTO users (username, email, password, token, status, role, createon, updateon) VALUES ('$username', '$email', '$hash', '$token', '0', 'admin', '$time', '$time')";

        if($conn->query($sql)){
            echo "<h1 style='color:green'> Please check your mail to active your account</h1>";
            exit();
        }
    }

}

if(isset($_GET['active'])){
    $token = $_GET['active'];

    $sql = "SELECT * FROM users where token = '{$token}'";

    $result = $conn->query($sql);
   
    if($result->num_rows >0){
        
        $row = $result->fetch_assoc();
        
        if($row['token'] == $token){

            $sql = "UPDATE users SET token='', status = '1' WHERE id = {$row['id']} ";

            if($conn->query($sql) == TRUE)
            {
                echo "<h1 style='color:green'>Account activated</h1>";
            }
        }
    }
}