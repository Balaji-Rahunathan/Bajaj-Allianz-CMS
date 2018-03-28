<?php

include 'DBConfig.php'; 



$name   = $_POST['name'];
$sno    = $_POST['sno'];


$Sql_Query = "DELETE FROM `$name` WHERE sno = $sno";

if(mysqli_query($con,$Sql_Query))
{
            
    echo "Row Deleted";
}
   

mysqli_close($con);
?>