<?php 
include("db.php");

$fileAttName    = "uploadedFile";
$uploadFolder   = "imagefolder/";
$MaxFileSize    = 1000*1000;
$FileExtension  = ['png', 'jpg','jpeg'];
$FileMime       = ['image/png', 'image/jpeg'];

if (isset($_POST['submit'])) {
    
    $id             = $_POST['id'];
    $fileName       = $_POST['image'];
    $title          = $_POST['post-title'];
    $content        = addslashes($_POST['post-content']);
    $category       = $_POST['post-category'];
    $status         = $_POST['post-status'];
    $titleSlug      = str_replace(" ","-",strtolower($title));
    $createon       = $updateon = time();

    if($_FILES['uploadedFile']['size']>0){

        if(file_exists($uploadFolder.$fileName)){
            unlink($uploadFolder.$fileName);
        }
        
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
                    echo "ERROR HERE 1";
                    exit();
                }
            }else{
                echo "ERROR HERE 2";
                exit();
            }

            return $fileNewName; // return array 
        }

        $fileName = handelFile($uploadFolder, $MaxFileSize, $fileAttName);
    }


    $sql = "UPDATE post SET title='$title', description='$content', category='$category', status = '$status', slug = '$titleSlug', image = '$fileName'  WHERE id = $id";


    if($conn->query($sql)){
        header('location:post-index.php');
        exit();
    }else{
        echo "ERROR: ". $sql. "<br>". $conn->error;
    }

}