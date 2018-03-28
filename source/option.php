<?php

include 'DBConfig.php';

$name   = $_POST['name'];
$sno    = $_POST['sno'];
$option = $_POST['option'];


$Sql_Query = "UPDATE `$name` SET name='$option' WHERE sno=$sno";


if(mysqli_query($con,$Sql_Query)){

// If the record inserted successfully then show the message.

       echo 'Option created';
    }


mysqli_close($con);
?>
