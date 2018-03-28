<?php
	 function getdata()
		{
// Importing DBConfig.php file.
include 'DBConfig.php';

// Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $q =$_GET["name"];

		$sql = "SELECT * from `$q` ORDER BY sno ASC";
		
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
        'telugu'		 => $row["telugu"]);
		}
		
		return json_encode($jsonarray);
		}
		echo '{"accounts":';
		print_r (getdata());
		echo "}";
		
		
		/*$filename = date("d,m,Y").".json";
		if(file_put_contents($filename, getdata()))
		{
		echo $filename. " created";
		}*/
		?>