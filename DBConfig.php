<?php
 
//Define your host here.
$HostName = "localhost";
 
//Define your database name here.
$DatabaseName = "augmobxw_ar";
 
//Define your database username here.
$HostUser = "augmobxw_user";
 
//Define your database password here.
$HostPass = "123456";
 

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
?>