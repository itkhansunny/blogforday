<?php 
session_start();

include("db.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE (username='{$username}' OR email='{$username}') AND (status=1)";

    $result = $conn->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $hash = $row['password'];

        if(password_verify($password, $hash)){
                $_SESSION['logIn']      = 1;
                $_SESSION['username']   = $row['username'];
                $_SESSION['email']      = $row['email'];
        }else{
            $_SESSION['error'] = "Password did not match";
            header("location:login.php");
        }
        
    }else{
        $_SESSION['error'] = "User not found";
        header("location:login.php");
    }

}

if(isset($_SESSION['logIn'])){
    if($_SESSION['logIn'] == 1){
        header('location:index.php');
    }else{
        header('location:login.php');
    }
}