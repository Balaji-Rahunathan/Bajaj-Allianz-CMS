<?php

include 'DBConfig.php'; 

require_once '../GetTarget.php';
require_once '../UpdateTarget.php';
require_once '../DeleteTarget.php';
require_once '../PostNewTarget.php';
require_once '../GetAllTargets.php';
// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

$name   = $_POST['name'];
$sno    = $_POST['sno'];
$newName1= $_POST['newName'];
$newName = str_replace(' ','-',$newName1);

//$CheckSQL = "SELECT * FROM $name";
 
// Executing SQL Query.
   // $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

    //if($check){
                $Sql_Query = "RENAME TABLE `$name` TO `$newName`";

                if(mysqli_query($con,$Sql_Query))
                {
 
// If the record inserted successfully then show the message.
                    $instance = new UpdateTarget();
                    $newName2 = str_replace('-',' ',$newName);
                    
                    echo $newName2;
                }
                else{
                    echo "Failed";
                }
   
//}
mysqli_close($con);
?>