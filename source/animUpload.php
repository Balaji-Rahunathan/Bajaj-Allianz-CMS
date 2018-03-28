<?php

include 'DBConfig.php';


//file error
if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}

//file upload
else {

  $option = $_POST['option'];
  $plat   = $_POST['option1'];
  $name   = $_POST['name'];
  $imgname= $option.$plat;
  $filename = $_FILES['file']['name'];
  ftp_mkdir($conn_id,"public_html/php/rajan/audio/$name/anim/");
  ftp_chdir($conn_id,"public_html/php/rajan/audio/$name/anim/");

  move_uploaded_file($_FILES['file']['tmp_name'], "../audio/$name/anim/". $filename);

  $path   = "http://augmo.net/php/rajan/audio/$name/anim/".$filename;
  //echo "echo $name";

  $Sql_Query = "UPDATE targets SET $imgname='$path' WHERE imgname='$name'";
  //$Sql_Query = "UPDATE targets SET $imgname='kishore'";

      if(mysqli_query($con,$Sql_Query)){

// If the record inserted successfully then show the message.
         // echo 'File Uploaded in'.$path ;
         echo "File uploaded successfully";
      }

}
mysqli_close($con);
?>
