<?php
include("db.php");

$table = "category";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "DELETE FROM {$table} WHERE id='{$id}'";

if($conn->query($sql)){
    header("location:category-create.php?alert=successDel");
}