<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='js/create-policy.js'></script>
    <style>
        .navbar-header {
            width: 50px;
        }

        .navbar {
            background-color: rgb(1, 92, 165);
            height: 65px;
            color:white;
        }

        .addPolicy {
            margin: 10px;
            width: 200px;
            height: 200px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            
        }
        .addPolicy h3{
            text-decoration: none;
        }
        .addPolicy img{
            margin:7px;
        }
        .submit{
            text-align:center;
            padding:10px;
        }

        .card {
            margin: 10px;
            width: 200px;
            height: 200px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            text-decoration: none;
            
        }
        .card img{
            max-width:100%;
            max-height:80%;
            
        }
        .pName{
            height:20%;
            padding:0px 7px;
            
        }
        .img{
            
            height:80%;
        }

        .drop {
            text-align: center;
            border: 1px solid rgb(1, 92, 165);
            padding: 5px;
            border-radius: 8px;
        }

        p {
            font-size: 12px;
        }

        h4 {
            font-size: 16px;
        }

        .modal {
            text-align: center;
            padding: 0!important;
            color:black;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
        .drop {
            /*Sort of important*/
            width: 300px;
            /*Sort of important*/
            height: 150px;
            position: absolute;
            left: 50%;

            margin-left: -150px;
            border: 2px dashed rgba(0, 0, 0, .3);
            border-radius: 20px;
            font-family: Arial;
            text-align: center;
            position: relative;

            font-size: 14px;
            color: rgba(0, 0, 0,.6);
        }


        .drop:hover {
            cursor: pointer;
        }

        /*Important*/

        .drop.mouse-over {
            border: 2px dashed rgba(0, 0, 0, .5);
            color: rgba(0, 0, 0, .5);
        }

     
    </style>

</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">
                    <img style="width:150px" src="http://augmo.net/src/Bajaj.JPG">
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-log-in"></span> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

<div class='container row'>
<a style='text-decoration:none' href='#' data-toggle="modal" data-target="#myModal">
    <div class='addPolicy'>

        <br>
        <br>
        <br>
        
            <div>
                <img src='../assets/images/addPolicy.svg' width='50px'>
                <h4>Add Policy</h4>
            </div>
        
        
    </div>
    </a>

<?php
session_start();
include 'DBConfig.php'; 

// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

// connect and login to FTP server
$ftp_server = "ftp.augmo.net";
$ftp_username = "augmobxw";
$ftp_userpass = "Augmo!@123";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

// get file list of current directory
$file_list = ftp_nlist($ftp_conn, "/public_html/php/rajan/audio/");

//$file=var_dump($file_list);

//echo $file_list;
//count($file_list);
$get        = $_SESSION['get'];
$targetId   = $_SESSION['targetId'];

$lang       = array('asamee','bengali','english','gujarati','hindi','kannad','malayalam','marathi','oriya','punjabi','tamil','telugu');

//Create Table
if(!empty($get->target_name))
{
$sql    = "CREATE TABLE `$get->target_name` (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,sno VARCHAR(30) NOT NULL,name VARCHAR(30) NOT NULL,$lang[0] VARCHAR(255),$lang[1] VARCHAR(255),$lang[2] VARCHAR(255),$lang[3] VARCHAR(255),$lang[4] VARCHAR(255),$lang[5] VARCHAR(255),$lang[6] VARCHAR(255),$lang[7] VARCHAR(255),$lang[8] VARCHAR(255),$lang[9] VARCHAR(255),$lang[10] VARCHAR(255),$lang[11] VARCHAR(255))";

if(mysqli_query($con,$sql)){
    echo ("<script>console.log('table created');</script>");
}
else{
    echo ("<script>console.log('table failed');</script>");
}
}


//Check target exists
$sql    = "SELECT * FROM targets WHERE imgname='$get->target_name'";
$result = mysqli_query($con,$sql);

if($result)
{
    echo ("<script>console.log('target id exist');</script>");
}
else
{
if(!empty($targetId))
{
//Save Target ID
$sql   = "INSERT INTO targets (imgname,targetid) VALUES ('$get->target_name','$targetId')";

if(mysqli_query($con,$sql)){
    echo ("<script>console.log('target id saved');</script>");

}
else{
    echo ("<script>console.log('target id failed');</script>");
}
}
}

for($i=2;$i<count($file_list);$i++)
{
    $imagePath = ftp_nlist($ftp_conn, "/public_html/php/rajan/audio/".$file_list[$i]."/target");
    $file	= str_replace(' ',' ',$file_list[$i]);
    echo "<a style='text-decoration:none' href='create-policy.php?name=$file'>";
    echo "<div class='card'>";
    echo "<div class='img'><img src='../audio/$file_list[$i]/target/$imagePath[2]'></div>";
    echo "<div class='pName'><h4>$file</h4></div>";
    echo "</div>";
    echo "</a>";
}

// close connection
session_unset();

ftp_close($ftp_conn);
session_destroy();
?>
</div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Policy</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="POST" action='../SampleSelector.php?select=PostNewTarget' enctype="multipart/form-data">
                            <label for='pName'>Policy Name</label> 
                            <input type='text' name='pName' placeholder="Policy Name">
                            <h4>Upload policy for image target generation</h4>
                        <div class='drop'>
                            <h4>Drop files here or click to upload</h4>
                            <p>Supported file types:".jpg" or non transparent ".png"
                            <br>Maximum size of 2 MB</p>   
                            <div class='clickHere'>                    
                                <input  type="file" id="a" name="picture" accept="image/jpeg*" />
                            </div>
                        </div>
                        <div class='submit'>
                            <input type="submit" class="btn btn-default"  value='Upload'>
                        </div>
                    </form>
                    
                </div>

            </div>

        </div>
    </div>




    <script>
        


        $('.drop').click(function () {

            $('#a').click();
        });
/*
        $('#a').change(function () {
            $('#name').html(function () {
                var fakePath = $('#a').attr('value').toString().split('\\');
                return fakePath[fakePath.length - 1];
            });
        });
*/
//image fit
        var img = $('.card img');
        $('.card img').load(funtion(){
            if(img.height > img.width) {
        $img.height = 'auto';
        $img.width = 'auto';
    }

        });


    </script>

</body>
<script src="main.js"></script>

</html>