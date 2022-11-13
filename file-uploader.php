<?php
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]);   //get full path of file selected 
$uploadOk = 1;
$extFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));     //get extension only of file selected

isset($_POST["submit"]);
// Check file size
if ($_FILES["uploadedFile"]["size"] > 500000) {
  echo "<script language='javascript'>\n";
  echo "alert('Sorry, your file is large than 500k.'); window.location.href='upload.php';";
  echo "</script>\n";
  $uploadOk = 0;
}

// Allow only csv file formats
if($extFileType != "csv" ) {
  echo "<script language='javascript'>\n";
  echo "alert('Sorry, only csv files are allowed.'); window.location.href='upload.php';";
  echo "</script>\n";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["uploadedFile"]["name"])). " has been uploaded.";
    rename ($target_file  , $target_dir."allowed_csv.csv");

    echo "<script language='javascript'>\n";
    echo "alert('The file ". htmlspecialchars( basename( $_FILES["uploadedFile"]["name"])). " has been uploaded.'); window.location.href='upload.php';";
    echo "</script>\n";
  } else {
    echo "<script language='javascript'>\n";
    echo "alert('Sorry, there was an error uploading your file.'); window.location.href='upload.php';";
    echo "</script>\n";
  }
}