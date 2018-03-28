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

$name   = 'newtable';
$sno    = '2';
$lang   = 'english';
$path   = 'http://augmo.net/rajan/';

    $CheckSQL = "SELECT * FROM $name";
 
// Executing SQL Query.
   // $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

  //  if($check){
        
    $Sql_Query = "INSERT INTO $name ($lang) VALUES ('$path')";
 
        
        if(mysqli_query($con,$Sql_Query)){
 
// If the record inserted successfully then show the message.
            echo 'File Uploaded in'. $path ;
        }
 
        
  //  }
    
mysqli_close($con);
?>