
<?php
session_start();
include 'DBConfig.php';

$email  = $_POST['email'];
$pass   = $_POST['pass'];


$sql  = "select * from login where email='$email'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
//echo $row['pass'];
if($row['pass']==$pass)
{
  $_SESSION['email'] = $email;
  header("location:add%20policy.php");
}
else{
  $_SESSION['failed'] = "Username or Password incorrect";
  header("location:index.php");
}

mysqli_close($con);
?>
