<?php
$target_dir = "../foto/";
//$nama = basename($_FILES["fileToUpload"]["name"]);
//$splname = explode(".", $nama);
//$nip = "323232";
//$newnip = "$nip.$splname[1]";
if(isset($_POST['ok']))
{
   require_once '../config.php';
   $nip = $_REQUEST['nip'];
   $sql = " select * from Pegawai where nip='$nip'";
   $que = $conn->prepare($sql);
   $que->execute();
   $que->setFetchMode(PDO::FETCH_OBJ);
   $stmt = $que->fetch();
   //unlink($target_file);
    $target_file = $target_dir . $stmt->foto ;
    if($stmt->foto == "") {

        $namafoto = basename($_FILES["fileToUpload"]["name"]);
        $splname = explode(".", $namafoto);
        $newnip = "$nip.$splname[1]";
        $target_file = $target_dir . $newnip;
        $sqlup = "update Pegawai set foto='$newnip' where nip='$nip'";
        $queup = $conn->prepare($sqlup);
        $queup->execute();

    } elseif (file_exists($target_file))
        {


            unlink($target_file);
        }
}else{
    $target_file = $target_dir . $newnip ;
}

//echo "$newnip";

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists

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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

         header("location:pegawaial.php?nip=".$nip);
      
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
