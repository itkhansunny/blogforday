<?php 
session_start();

if(isset($_SESSION['logIn'])){
    if($_SESSION['logIn'] == 1){
        unset($_SESSION['logIn']);
        header('location:login.php');
    }else{
        header('location:login.php');
    }
}