<?php

include 'DBConfig.php';


$name   = $_POST['name'];
$sno    = $_POST['sno'];
$newName1= $_POST['newName'];
$newName = str_replace(' ','-',$newName1);


$Sql_Query = "DROP TABLE `$name`";

    if(mysqli_query($con,$Sql_Query))
        {
          $lang       = array('asamee','bengali','english','gujarati','hindi','kannad','malayalam','marathi','oriya','punjabi','tamil','telugu');

          //Create Table

            $sql    = "CREATE TABLE `$newName` (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,sno VARCHAR(30) NOT NULL,name VARCHAR(30) NOT NULL,$lang[0] VARCHAR(255),$lang[1] VARCHAR(255),$lang[2] VARCHAR(255),$lang[3] VARCHAR(255),$lang[4] VARCHAR(255),$lang[5] VARCHAR(255),$lang[6] VARCHAR(255),$lang[7] VARCHAR(255),$lang[8] VARCHAR(255),$lang[9] VARCHAR(255),$lang[10] VARCHAR(255),$lang[11] VARCHAR(255))";

            if(mysqli_query($con,$sql))
            {
                //echo ("<script>console.log('table created');</script>");
            }
            else
            {
                //echo ("<script>console.log('table failed');</script>");
            }
            $sql = "UPDATE targets SET imgname='$newName',coverageandroid=null,coverageios=null,headerios=null,headerandroid=null WHERE imgname='$name'";
            if(mysqli_query($con,$sql))
            {
                rename("../audio/$name/","../audio/$newName/");
                //$dirPath    = "../audio/$name";
                //system("rm -rf ".escapeshellarg($dirPath));
                //ftp_mkdir($conn_id,"../audio/$newName/");
                echo $newName;
                //header("location:add policy.php");
            }
        }
        else{
        echo "Failed";
        }

//}
mysqli_close($con);
?>
