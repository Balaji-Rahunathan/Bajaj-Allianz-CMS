<html>
<head>
<style>

body{
  font-family:verdana;
}

.result{
  font-family:courier;
  color:black;
}
</style>
</head>
<body>
<h1>Augmo Database</h1>
<br />
<br />
<br />


<?php
require_once 'GetTarget.php';
require_once 'UpdateTarget.php';
require_once 'DeleteTarget.php';
require_once 'PostNewTarget.php';
require_once 'GetAllTargets.php';

include 'DBConfig.php';
//include 'source/json.php';
session_start();
unset($_SESSION['get']);
unset($_SESSION['targetId']);
unset($_SESSION['status']);
unset($_SESSION['target']);

$instance = null;
$name1	= $_POST['pName'];
$name	= str_replace(' ','-',$name1);
$location= $_FILES['picture']['tmp_name'];
$_SESSION['target']=$name;


//Json




if( isset( $_GET['select']) ){

	$selection = $_GET['select'];

	echo "<div> $selection RESULT :</div><br/>";

	echo "<div class='result'>";

	switch( $selection ){

case "GetTarget" :
			$instance = new GetTarget();
			break;
case "UpdateTarget" :
      $pName  = $_POST['policyName'];
      $nam    = str_replace(' ','-',$pName);
      $sql   = "SELECT targetid FROM targets WHERE imgname='$pName'";
      $result = mysqli_query($con,$sql);

  if($result)
      {
        $row = mysqli_fetch_assoc($result);
        $targetId = $row['targetid'];


        $sql    = "SELECT * from `$pName`";
        $result = mysqli_query($con,$sql);
        $count  = mysqli_num_rows($result);
        for($a=1;$a<=$count;$a++)
        {

        ${sql.$a}    = "SELECT * from `$pName` WHERE sno=$a";
        ${result.$a} = mysqli_query($con,${sql.$a});

        $sqll    = "SELECT * from targets WHERE imgname='$pName'";
        $resultt = mysqli_query($con,$sqll);

        }

        $lang       = array('dummy','asamee','bengali','english','gujarati','hindi','kannad','malayalam','marathi','oriya','punjabi','tamil','telugu');

        while($roww = mysqli_fetch_assoc($resultt))
        {
        $z .=   '{"policy name":"';
        $z .= $nam;
        $z .= '",';
        $z .=    '"coverageios" : "';
        $z .=  $roww['coverageios'];
        $z .=  '",';
        $z .=    '"coverageandroid" : "';
        $z .=  $roww['coverageandroid'];
        $z .=  '",';
        $z .=    '"headerios" : "';
        $z .=  $roww['headerios'];
        $z .=  '",';
        $z .=    '"headerandroid" : "';
        $z .=  $roww['headerandroid'];
        $z .=  '",';
        }
        $z .= '"language selected":{';

        for($b=1;$b<13;$b++)
        {

        $z .=   '"';
        $z .=   $lang[$b];
        $z .=   '":';

        $z .=   '{';
        for($i=1;$i<$count+1;$i++)//3
        {

        $z .=   '"';
        $z .=   'option'.$i;
        $z .=   '":{';
        while($row = mysqli_fetch_assoc(${result.$i}))
        //while($row = mysqli_fetch_assoc($result))
        {
        $z .=   '"name":';
        $z .=   '"';
        $z .=   $row['name'];
        $z .=   '",';
        $z .=   '"link":';
        $z .=   '"';
        $z .=   $row[$lang[$b]];
        if($i==$count)
        {
        $z .=   '"}';
        }else{
        $z .=   '"},';
        }


        }
        mysqli_data_seek(${result.$i}, 0);
        }
        if($lang[$b]=='telugu')
        {
          $z .=   '}';
        }else{
          $z .=   '},';
        }
        }
        $z .=   '}}';

    }

    //echo $z,$targetId;
    //$targetId="d3f5a6472c0443d2b0445ca5febd15cd";
    //$metadata="fuck off";
    $instance = new UpdateTarget(null,null,$z,$targetId);
			break;
case "DeleteTarget" :
    $pName  = $_POST['policyName'];
    $sql    = "SELECT targetid FROM targets WHERE imgname='$pName'";
    $result = mysqli_query($con,$sql);
    if($result)
    {
      $row = mysqli_fetch_assoc($result);
      $targetId = $row['targetid'];
      $Sql_Query = "DROP TABLE `$pName`";

      if(mysqli_query($con,$Sql_Query))
      {
          $sql1    = "DELETE FROM targets WHERE imgname='$pName'";
          if(mysqli_query($con,$sql1))
          {
                  $dirPath    = "audio/$pName";
                  system("rm -rf ".escapeshellarg($dirPath));
                  $instance = new DeleteTarget($targetId);
          }

      }
    }


			break;
case "PostNewTarget" :
      //Create directory & Upload files in it
      ftp_mkdir($conn_id,"public_html/php/rajan/audio/$name/");
			ftp_mkdir($conn_id,"public_html/php/rajan/audio/$name/target/");
			ftp_chdir($conn_id,"public_html/php/rajan/audio/$name/target/");
			echo "new directory is" .ftp_pwd($conn_id);


			$source_file = $_FILES['picture']['name'];
			$destination_file = $source_file;
			$temp		=$_FILES['picture']['tmp_name'];
			$dir=ftp_pwd($conn_id).'/'.$destination_file;
			echo $dir;
			$path = str_replace("/public_html","http://augmo.net",$dir);
			echo "this is path".$path;
			// upload the file
			$upload = ftp_put($conn_id, $destination_file, $temp, FTP_BINARY);
			//$move 	= move_uploaded_file($temp,$destination_file);
			if (!$upload) {
			echo "FTP upload has failed!";
			} else {
			echo "Uploaded $source_file to $ftp_server as $destination_file";
      }

			$instance = new PostNewTarget($name,$path);
			break;
case "GetAllTargets" :
			$instance = new GetAllTargets();
			break;
default :
			echo "INVALID SELECTION";
			break;

	}

	echo "</div>";


	echo "<br /><div>~~~~~~~~~~~~~~~</div><br />";

}
// check upload status
mysqli_close($conn_id);

?>


<div>Samples:</div>
<br />
<div>
<a href="SampleSelector.php?select=GetTarget"><b>GetTarget.php</b> queries a single target by target id.</a>
</div>
<br />
<div>
<a href="SampleSelector.php?select=GetAllTargets"><b>GetAllTargets.php</b> queries for all target ids in a Cloud Reco database.</a>
</div>
<br />
<div>
<a href="SampleSelector.php?select=UpdateTarget"><b>UpdateTarget.php</b> updates the metadata for a target.</a>
</div>
<br />
<div>
<a href="SampleSelector.php?select=DeleteTarget"><b>DeleteTarget.php</b> deletes a target from its Cloud Database.</a>
</div>
<br />
<div>
<a href="SampleSelector.php?select=PostNewTarget"><b>PostNewTarget.php</b> uploads a new target to a Cloud Database.</a>
</div>
<br />
<br />
<br />
<br />
<div>
<a href="CheckPHPEnvironment.php">Review your PHP installation.</a>
</div>
</body>
</html>
