<?php
session_start();

include("db.php");

$table = "category";

if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $slug = str_replace(" ", "", strtolower($name));

    if(!empty($name)){
        if(!preg_match('/^[a-zA-Z\s]/',$name)){
            header("location:category-create.php?alert=errorIC");
            exit();
        }
    }else{
            header("location:category-create.php?alert=errorE");
            exit();
    }

    $sql = "INSERT INTO {$table} (name,slug ) VALUES ('$name', '$slug') ";

    if($conn->query($sql)){
        header("location:category-create.php?alert=successS");
    }else{
        header("location:category-create.php?alert=errorUS");
    }
}

if(empty($_SESSION['logIn'])){
    if($_SESSION['logIn'] != 1){
        header("location:login.php");
    }
}