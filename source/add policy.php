<?php
session_start();
if(isset($_SESSION['email']))
{


 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .navbar-header {
            width: 50px;
        }

        .navbar {
            background-color: rgb(1, 92, 165);
            height: 65px;
            color:white;
        }
        .edit{
            position:absolute;
            bottom:5px;
            left:3px;
            width:48%;
        }
        /*.remove{
            position:absolute;
            bottom:5px;
            right:0px;
            width:48%;
            color:white;
        }*/


        .delete{
            position:absolute;
            bottom:5px;
            right:3px;
            width:48%;
            color:white;
        }

        .addPolicy {
            margin: 10px;
            width: 200px;
            height: 250px;
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
            height: 250px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            text-decoration: none;

        }
        .card img{
            max-width:100%;
            max-height:80%;

        }
        .pName{
            position:relative;
            bottom:30px;
            height:20%;
            padding:0px 7px;

        }
        .img{

            height:100%;
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
            height: 100px;
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
<!--Navbar-->
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="add policy.php" >
                    <img style="width:150px" src="http://augmo.net/src/Bajaj.JPG">
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="logout.php">
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

<!--Create Connection-->
<?php

    include 'DBConfig.php';



$get        = $_SESSION['get'];
$targetId   = $_SESSION['targetId'];
$status     = $get->result_code;
$target     = $_SESSION['target'];
echo ("<script>console.log('$target');</script>");
if(isset($target))
{
if($status == "AuthenticationFailure" || $status == "RequestTimeTooSkewed" || $status == "TargetNameExist" || $status == "UnknownTarget" || $status == "BadImage" || $status == "ImageTooLarge" || $status == "MetadataTooLarge" || $status == "DateRangeError" || $status == "Fail" )
{
  $dirPath    = "../audio/$target";
  system("rm -rf ".escapeshellarg($dirPath));
echo ("<script>alert('$status');</script>");
}
}


$lang       = array('asamee','bengali','english','gujarati','hindi','kannad','malayalam','marathi','oriya','punjabi','tamil','telugu');

//Create Table
    if(!empty($get->target_name))
    {
            $sql    = "CREATE TABLE `$get->target_name` (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,sno VARCHAR(30) NOT NULL,name VARCHAR(30) NOT NULL,$lang[0] VARCHAR(255),$lang[1] VARCHAR(255),$lang[2] VARCHAR(255),$lang[3] VARCHAR(255),$lang[4] VARCHAR(255),$lang[5] VARCHAR(255),$lang[6] VARCHAR(255),$lang[7] VARCHAR(255),$lang[8] VARCHAR(255),$lang[9] VARCHAR(255),$lang[10] VARCHAR(255),$lang[11] VARCHAR(255))";

            if(mysqli_query($con,$sql))
            {
                echo ("<script>console.log('table created');</script>");
            }
            else
            {
                echo ("<script>console.log('table failed');</script>");
            }
    }

//


//Check target exists
    $sql    = "SELECT * FROM targets WHERE targetid='$targetId'";
    $result = mysqli_query($con,$sql);

    if ( $result->num_rows > 0 )
    {
        echo ("<script>console.log('target id exist');</script>");
    }
    else
    {
        if(!empty($targetId))
        {
    //Save Target ID
            $sql   = "INSERT INTO targets (imgname,targetid) VALUES ('$get->target_name','$targetId')";

                if(mysqli_query($con,$sql))
                {
                    echo ("<script>console.log('target id saved');</script>");


                }
                else
                {
                    echo ("<script>console.log('target id failed');</script>");
                }
        }
    }
//
// get file list of current directory
$file_list = ftp_nlist($conn_id, "/public_html/php/rajan/audio/");
//Policy list
$sql1    = "SELECT * FROM targets ORDER BY id ASC";
$result1 = mysqli_query($con,$sql1);
$i=2;
$j='imgname';
while($row = mysqli_fetch_assoc($result1))
{



        $imagePath = ftp_nlist($conn_id, "/public_html/php/rajan/audio/".$row[$j]."/target");
        $file	= str_replace(' ','-',$file_list[$i]);

        echo "<div class='card'>";
        echo "<div class='img'><img src='../audio/$row[$j]/target/$imagePath[2]'></div>";
        echo "<div class='pName'><h4 class='policy'>$row[$j]</h4></div>";
        echo "<div class='container row'>";
        echo "<div><a href='create-policy.php?name=$row[$j]' class='edit btn btn-primary btn-sm' >Edit</a></div>";
        echo "<div><a href='#' class='delete btn btn-danger btn-sm' id='delete'>Delete</a></div>";
        echo "</div>";
        echo "</div>";
        $i++;




}
}else
{
  echo "<script type='text/javascript'>alert('Please login to use this page');</script>";
  header("location:index.php");
}


// close connection

ftp_close($ftp_conn);

?>
</div>

<!-- Add Policy Modal -->
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
                            <input type='text' name='pName' placeholder="Policy Name" required>
                            <h4>Upload policy for image target generation</h4>
                        <div class='drop'>
                            <p>Supported file types:".jpg" or non transparent ".png"
                            <br>Maximum size of 2 MB</p>
                            <div class='clickHere'>
                                <input  type="file" id="a" name="picture" accept="image/jpeg*" required/>
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


<!--Delete Modal -->
<div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Policy</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="POST" action='../SampleSelector.php?select=DeleteTarget' enctype="multipart/form-data">

                            <h4>Are you sure?</h4>
                            <input type='hidden' class='hide' name='policyName' value=''>

                        <div class='submit'>
                            <input type='button' data-dismiss="modal" class="btn btn-default" value='Cancel'>
                            <input type="submit" class="btn btn-default remove"  value='Delete'>
                        </div>
                    </form>

                </div>

            </div>

        </div>
</div>


<script>



$(document).on('click','#delete',function(){
  var policyName  = $(this).parent().parent().siblings('.pName').children('.policy').text();
  //alert(policyName);
  $("#myModal1").modal();
  $(".hide").val(policyName);
  });


  /*$('input').on('keypress', function (event) {
      var regex = new RegExp("/^([a-zA-Z]+\s)*[a-zA-Z]+$/");
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
         event.preventDefault();
         return false;
      }
  });*/


</script>

</body>


</html>
