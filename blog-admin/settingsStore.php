<?php
session_start();
include("db.php");

$fileAttName    = "uploadedFile";
$uploadDir      = "images/";
$MaxFileSize    = 1000*1000;
$FileExtension  = ['png', 'jpg','jpeg'];
$FileMime       = ['image/png', 'image/jpeg'];
$table          = "post";

if(isset($_POST['save'])){

    $logo = $_POST['logo'];

    if($_FILES['uploadedFile']['size']>0){
        
        //File Delete Then Update
        if(file_exists($uploadDir.$logo) && !is_dir($uploadDir.$logo)){
            unlink($uploadDir.$logo);
        }

        /* Upload Function Start */

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

        function handelFile($uploadDir, $MaxFileSize, $fileAttName){
            $tempName   = $_FILES[$fileAttName]['tmp_name'];
            $filename   = basename($_FILES[$fileAttName]['name']);
            $isUpload   = is_uploaded_file($tempName);
            $validSize  = $_FILES[$fileAttName]['size']<= $MaxFileSize && $_FILES[$fileAttName]['size'] >= 0;

            if($isUpload && $validSize && allowedFiles($tempName, $filename)){
                $time           = date("ymd-His");
                $fileExtension  = pathinfo($filename, PATHINFO_EXTENSION);
                $fileNewName    = $time.".".$fileExtension;
                if(!move_uploaded_file($tempName, $uploadDir.$fileNewName)){
                    header('location:post-edit.php?alert=uFail');
                    exit();
                }
            }else{
                header('location:post-create.php?alert=invFormat');
                exit();
            }

            return $fileNewName; // return array 
        }

        /* Upload Function End*/
       $_POST['logo'] =  handelFile($uploadDir, $MaxFileSize, $fileAttName);
    }
    
    foreach ($_POST as $key => $value) {
        $sql = "UPDATE settings SET svalue='{$value}'  WHERE skey = '{$key}'";
        $conn->query($sql);
    }
    $_SESSION['success'] = "Settings successfully updated";
    header('location:settings.php');
}
