
<?php

include 'DBConfig.php';


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
    //echo $name,$option;

    //ftp_mkdir($conn_id,"public_html/php/rajan/audio/$name/");
    ftp_mkdir($conn_id,"public_html/php/rajan/audio/$name/$option/");
    ftp_chdir($conn_id,"public_html/php/rajan/audio/$name/$option/");
    //$dir    = getcwd();

    //echo ("<script>console.log($dir);</script>");
    //move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], "../audio/$name/$option/". $lang .".". $ext);

    $path   = "http://augmo.net/php/rajan/audio/$name/$option/".$lang.".".$ext;
    //echo ("<script>console.log($path);</script>");

    $Sql_Query = "UPDATE `$name` SET $lang='$path' WHERE sno='$sno'";


        if(mysqli_query($con,$Sql_Query)){

// If the record inserted successfully then show the message.
           // echo 'File Uploaded in'.$path ;
           echo "File uploaded successfully";
        }else{
        echo "Failed to upload";
}
}
mysqli_close($con);
?>
