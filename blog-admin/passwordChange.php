<?php
session_start();

include("db.php");

if(isset($_POST['submit'])){
    $oldPassword        = $_POST['oldpass'];
    $newPassword        = $_POST['newpass'];
    $confirmPassword    = $_POST['conpass'];
    $username           = $_SESSION['username'];
    $newPassHash        = password_hash($newPassword, PASSWORD_DEFAULT );

    $sql = "SELECT * FROM users WHERE username='{$username}'";

    $result = $conn->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $hash = $row['password'];

        if(password_verify($oldPassword, $hash)){
            if($newPassword == $confirmPassword){
                $sql = "UPDATE users SET password='$newPassHash' WHERE username='{$username}'";
                if($conn->query($sql)){
                    $_SESSION['success'] = "Password was changed successfully";
                    header("location:changePassword.php");
                }
            }else{
                $_SESSION['error'] = "New password and Confirm password was not match";
                header("location:changePassword.php");
            }
        }else{
            $_SESSION['error'] = "Old password was incorrect";
            header("location:changePassword.php");
        }
        
    }else{
        $_SESSION['error'] = "User not found";
        header("location:login.php");
    }
}