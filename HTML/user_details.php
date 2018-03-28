<?php
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php"); 
  // Importing DBConfig.php file.
  
}
include 'DBConfig.php'; 
?>

<html>
<head>
<title>User Details | AquaAmaze</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>

tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}
th {
    height: 50px;
}
th {
font-size:15px;
align:center;
    height: 50px;
    background-color: rgba(19, 35, 47, 0.9); ;
    color: white;
}
td{
margin:auto;
}
.submit{
    background-color: #4CAF50; /* Green */
    border: none;
    border-radius: 8px;
    cursor: pointer;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    
    }
    
    .submit:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="order_list.php">AquaAmaze</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="order_list.php">Order List</a></li>
      <li class="active"><a href="#">User Details</a></li>     
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li style="text-align=right"><a href="logout.php">Logout</a></li>
    </ul>
  </div> 
</nav>
<div class="container-fluid" style="background-color:White">
	<br>
	<br>
	<h1 style="font-size:60px" class=text-center style="color:Black"><b>User List</b></h1>
	<br>
	<br>
	</div>
<?php


 
// Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

if (!$con)

  {

  die('Could not connect: ' . mysqli_error());

  }

$result = mysqli_query($con, "SELECT * FROM accounts");

 echo"

 <div class=container-fluid> 
<table class='table table-hover table-responsive' border = 1 id='table'>

<tr>

<th>Id</th>

<th>Name</th>

<th>Mobile</th>


<th>Email</th>

<th>Address</th>
<th>Area</th>
<th>City</th>
<th>Pincode</th>
<th>User History</th>
</tr>";

 

while($row = mysqli_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['id'] . "</td>";

  echo "<td>" . $row['first_name'] ." ".$row['last_name']. "</td>";

  echo "<td>" . $row['phone'] . "</td>";

  echo " <td>". $row['email'] . "
  

 



  </td>";
  
  echo "<td>" . $row['address'] . "</td>";
  echo "<td>" . $row['area'] . "</td>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['pincode'] . "</td>";
  echo "<td>
  
 <form id='sampleForm' name='sampleForm' method='post' action='user_history.php'>
 <input type='hidden' name='total' id='total' value=". $row['email'] .">
 <input type='submit' name='submit' class='btn btn-primary' value= 'History'>
 </form>
  
  </td>";




  echo "</tr>";

  }

echo "</table> </div> ";

 

mysqli_close($con);

?>




</body>
</html>
