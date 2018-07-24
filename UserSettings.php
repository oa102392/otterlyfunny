<?php
  //First we check who the current user is
  session_start();
  require 'db_connection.php';
 


  $id = $_SESSION['id'];



  //Then we check if the form has been submitted
  if (isset($_POST['submit'])) {
    //When we send a file using FILES, we also send all sorts of information regarding the file
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];

    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    //Here we are getting the extension of the uploaded file
    

    $fileExt = explode('.', $fileName);
    //Then we get the extention
    $fileActualExt = strtolower(end($fileExt));

    //Here we declare which extentions we want to allow to be uploaded (You can change these to any extention YOU want)
    $allowed = array("jpg", "jpeg", "png", "pdf");
function upload($fileActualExt, $fileSize){
    //First we check if the extention is allowed on the uploaded file
    if (in_array($fileActualExt, $allowed)) {
      //Then we check if there was an upload error
      if ($fileError === 0) {
        //Here we set a limit on the allowed file size (in this case 500mb)
        if ($fileSize < 500000) {

          $fileNameNew = "profile".$id.".".$fileActualExt;
          //Here we define where we want the new file uploaded to
          $fileDestination = 'uploads/'.$fileNameNew;
        
          move_uploaded_file($fileTmpName, $fileDestination);
          //Here we update the status of the "profileimg" table
          //We do this to change the profile image from the default one to the new one
          $sql = "UPDATE profileimg SET status=0 WHERE userid='$id';";
          $result = mysqli_query($conn, $sql);
          //Going back to the previous page
          header("Location: ../index.php?uploadsuccess");

          return $fileSize;
        }
        else {
          echo "Your file is too big!";
          return $fileSize;
        }
      }
      else {
        echo "There was an error uploading your file, try again!";
         return $fileError;
      }
    }
    else {
      echo "You cannot upload files of this type!";
      return $fileActualExt;
    }
  }
}