<?php
	 function getdata()
		{
// Importing DBConfig.php file.
include 'DBConfig.php';

// Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $q =$_GET["name"];

		$sql = "SELECT * from `$q`,`targets` WHERE targets.imgname='$q' ORDER BY `$q`.sno ASC";

		$result = mysqli_query($con, $sql);

		$jsonarray = array();

		while($row = mysqli_fetch_assoc($result)){

		$jsonarray[] = array(
		'sno'		     => $row["sno"],
		'name' 	         => $row["name"],
		'asamee' 	     => $row["asamee"],
    'bengali'	 	 => $row["bengali"],
    'english'		 => $row["english"],
    'gujarati'		 => $row["gujarati"],
    'hindi'		     => $row["hindi"],
    'kannad'		 => $row["kannad"],
    'malayalam'		 => $row["malayalam"],
    'marathi'		 => $row["marathi"],
    'oriya'		     => $row["oriya"],
    'punjabi'		 => $row["punjabi"],
    'tamil'		     => $row["tamil"],
    'telugu'		 => $row["telugu"],
		'imgname'		     		=> $row["imgname"],
 		'imgloc' 	         	=> $row["imgloc"],
 		'targetid' 	     		=> $row["targetid"],
     'coverageandroid'	=> $row["coverageandroid"],
     'coverageios'		 	=> $row["coverageios"],
     'headerandroid'		=> $row["headerandroid"],
     'headerios'		    => $row["headerios"]);
		}

		return json_encode($jsonarray);
		}
		echo '{"accounts":';
		print_r (getdata());
		echo "}";


		?>
