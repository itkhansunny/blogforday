<?php 

$successS   = "Post create successfully";
$successSU  = "Post updated successfully";
$successDel = "Post deleted successfully";

if(isset($_GET['alert'])){
    
    $alert = $_GET['alert'];
    
    if($alert == "successS"){
        echo $success = $successS;
    } else
     if($alert == "successSU"){
        echo $success = $successSU;
    } else
     if($alert == "successDel"){
        echo $successDel = $successDel;
    }
}

