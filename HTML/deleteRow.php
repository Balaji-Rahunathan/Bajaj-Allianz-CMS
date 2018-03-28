<?php

include 'DBConfig.php'; 
// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }


$name   = $_POST['name'];
$sno    = $_POST['sno'];


//$CheckSQL = "SELECT * FROM $name";
 
// Executing SQL Query.
   // $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

    //if($check){
                $Sql_Query = "DELETE FROM $name WHERE sno = $sno";

                if(mysqli_query($con,$Sql_Query))
                {
 
// If the record inserted successfully then show the message.
           
                    echo "Row Deleted";
                }
   
//}
mysqli_close($con);
?>