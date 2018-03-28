<?php
 $servername = "localhost";
 $username = "augmobxw_user";
 $password = "123456";
 $dbname = "augmobxw_tutorial";

 $connect = mysqli_connect($servername, $username, $password, $dbname);

if(!$connect)
{
  die("Connection failed" .mysqli_connect_error());
}

$sql = "SELECT id, username, password, email FROM login";

/*id, username, password, email FROM login*/


$result = mysqli_query($connect, $sql); 

if(mysqli_num_rows($result)>0)

{

while($row = mysqli_fetch_assoc($result)){
//echo "ID:".$row['id']."Username:".$row['username']."Password:".$row['Password']."Email:".$row['email'] ."<br>" ;

$myArr = array($row['id'],$row['username'],$row['password'],$row['email']);
$myJson = json_encode($myArr);
echo($myJson)."<br>";
}}


 ?>
