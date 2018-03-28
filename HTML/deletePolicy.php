<?php

include 'DBConfig.php'; 

$name   = $_POST['name'];

$Sql_Query = "DROP TABLE `$name`";

if(mysqli_query($con,$Sql_Query))
{
    $sql    = "DELETE FROM targets WHERE imgname='$name'";
    if(mysqli_query($con,$sql))
    {
            $dirPath    = "../audio/$name";
            system("rm -rf ".escapeshellarg($dirPath));
            echo ("<script>console.log('Policy Deleted');</script>");
        
    }         
    
}
  

mysqli_close($con);
?>