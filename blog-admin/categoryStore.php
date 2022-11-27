<?php 

include("db.php");

$table = "category";

if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $slug = strtolower(trim($name));

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