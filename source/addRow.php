<?php

include 'DBConfig.php'; 


$name   = $_POST['name'];
$sno    = $_POST['sno'];


//$CheckSQL = "SELECT * FROM $name";
 
// Executing SQL Query.
   // $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

    //if($check){
                $Sql_Query = "INSERT INTO `$name` (sno) VALUES ('$sno')";

                if(mysqli_query($con,$Sql_Query))
                {
 
// If the record inserted successfully then show the message.
           
                    echo "Row inserted";
                }
   
//}
mysqli_close($con);
?>