<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
function GetImageExtension($imagetype)
     {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           case 'video/mkv': return' .mp4';
           case 'video/mp4': return' .mp4';

           default: return false;
       }
     }
session_start();

$username = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($username);
  $name = $_POST['imageName'];
  $image = addslashes(file_get_contents($_FILES['imagePath']['tmp_name'])); //SQL Injection defence!
  $path = addslashes($_FILES['imagePath']['name']);
  $text = $_POST['imageText'];
  $category = $_POST['btn'];



echo $name;
echo $path;
echo $text;
echo $category;
echo $user[0];
$insert = $db_man->newImageInfo55($name,$path, $text,$category,$user[0]);
 
 






echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["imagePath"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imagePath"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imagePath"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imagePath"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



header("Location: ../mypicturesalbum.php?val=$category");

?>
