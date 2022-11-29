<?php 
include("db.php");

$table = "post";

/* Upload Function Start */

$fileAttName    = "uploadedFile";
$uploadFolder   = "imagefolder/";
$MaxFileSize    = 1000*1000;
$FileExtension  = ['png', 'jpg','jpeg'];
$FileMime       = ['image/png', 'image/jpeg'];

// Advance file upload
function allowedFiles($tempFileName, $uploadPath){
    global $FileExtension, $FileMime;
    //Get File extension and file mime type 
    $fileExt        = pathinfo($uploadPath, PATHINFO_EXTENSION);
    $fileMime       = mime_content_type($tempFileName);
    // Check is it in array
    $checkExt       = in_array($fileExt, $FileExtension);
    $checkMime      = in_array($fileMime, $FileMime);
    $allowedFile    = $checkExt && $checkMime;
    return $allowedFile; // 1
}

function handelFile($uploadFolder, $MaxFileSize, $fileAttName ){
    $tempName   = $_FILES[$fileAttName]['tmp_name'];
    $filename   = basename($_FILES[$fileAttName]['name']);
    $isUpload   = is_uploaded_file($tempName);
    $validSize  = $_FILES[$fileAttName]['size']<= $MaxFileSize && $_FILES[$fileAttName]['size'] >= 0;
    if($isUpload && $validSize && allowedFiles($tempName, $filename)){
        $time           = date("ymd-His");
        $fileExtension  = pathinfo($filename, PATHINFO_EXTENSION);
        $fileNewName    = $time.".".$fileExtension;
        if(!move_uploaded_file($tempName, $uploadFolder.$fileNewName)){
            header('location:post-create.php?alert=uFail');
            exit();
        }
    }else{
        header('location:post-create.php?alert=invFormat');
        exit();
    }

    return $fileNewName; // return array 
}

/* Upload Function End*/

if(isset($_POST['submit'])){
    
    $title          = $_POST['post-title'];
    $content        = $_POST['post-content'];
    $category       = $_POST['post-category'];
    $status         = $_POST['post-status'];
    $titleSlug      = strtolower(trim($title));
    $createon       = $updateon = time();

    if(empty($title)){
            header("location:post-create.php?alert=eTitle");
            exit();
    }

    if(empty($content)){
            header("location:post-create.php?alert=eContent");
            exit();
    }    
    if($category == ""){
            header("location:post-create.php?alert=eCategory");
            exit();
    }    
    if($status == ""){
            header("location:post-create.php?alert=eStatus");
            exit();
    }    
    
    $filename   = handelFile($uploadFolder, $MaxFileSize, $fileAttName); 
    

    $sql = "INSERT INTO {$table} (title, description, category, status, slug, image, createon, updateon) VALUES ('$title', '$content','$category','$status', '$titleSlug', '$filename' ,'$createon','$updateon') ";

    if($conn->query($sql)){
        header("location:post-index.php?alert=successS");
    }
}