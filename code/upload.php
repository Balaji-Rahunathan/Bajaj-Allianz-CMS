
<?php

include 'DBConfig.php'; 
// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
else{
    "connected";
}

$ftp_server = "ftp.augmo.net";
$ftp_user_name = "augmobxw";
$ftp_user_pass = "Augmo!@123";

//if($source_file)
//{
//echo $source_file,$destination_file,$temp;
//}
// set up basic connection
$conn_id = ftp_connect($ftp_server);


// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_pasv($conn_id, true);
// check connection
if ((!$conn_id) || (!$login_result)) {
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user $ftp_user_name";
    exit;
}

//file error
if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}

//file upload
else {
    $str    = $_POST['option'];
    $str1 = explode('z',$str);
    $option = $str1[0];
    $lang   = $str1[1];
    $name   = $_POST['name'];
    $sno    = $_POST['sno'];
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);


    ftp_mkdir($conn_id,"public_html/php/rajan/audio/$name/$option/");
    //move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], "../audio/$name/$option/". $lang .".". $ext);

    $path   = "http://augmo.net/php/rajan/audio/$name/$option/".$lang.".".$ext;
    
        
    $Sql_Query = "UPDATE $name SET $lang='$path' WHERE sno=$sno";
 
        
        if(mysqli_query($con,$Sql_Query)){
 
// If the record inserted successfully then show the message.
           // echo 'File Uploaded in'.$path ;
           echo "file uploaded in ".$path;
        }
   
}
mysqli_close($con);
?>
 