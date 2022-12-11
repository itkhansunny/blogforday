<?php 
session_start();

include("db.php");

$uploadFolder   = "imagefolder/";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "SELECT * FROM post WHERE id='{$id}'";

$result = $conn->query($sql);

if($result->num_rows>0){
$post = $result->fetch_assoc();

$fileName = $post['image'];

if(file_exists($uploadFolder.$fileName)){
    unlink($uploadFolder.$fileName);
}

$sql = "DELETE FROM post WHERE id='{$id}'";

if($conn->query($sql)){
    $_SESSION['success'] = "Delete successful";
    header("location:post-index.php");
}

}

