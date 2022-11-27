<?php 

include("db.php");

$table = "category";

if(isset($_POST['submit'])){
    
    $name   = $_POST['name'];
    $id     = $_POST['id'];
    $slug   = strtolower(trim($name));

    if(!empty($name)){
        if(!preg_match('/^[a-zA-Z\s]/',$name)){
            header("location:category-create.php?alert=errorIC");
            exit();
        }
    }else{
            header("location:category-create.php?alert=errorE");
            exit();
    }

    $sql = "UPDATE {$table} SET name='{$name}', slug='{$slug}' WHERE id = {$id} ";

    if($conn->query($sql)){
        header("location:category-create.php?alert=successSU");
    }else{
        header("location:category-create.php?alert=errorUS");
    }
}