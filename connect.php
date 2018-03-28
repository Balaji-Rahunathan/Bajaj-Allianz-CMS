<?php

$connect=mysql_connect('localhost','augmobxw_user','123456','augmobxw_tutorial');




if($connect)
{
echo "connected";
}else
echo "not connected";

$res=mysql_query("SHOW DATABASES");

while($row1=mysql_fetch_assoc($res))
{
echo $row1['Database'] ."\n";


$sql = "SELECT id, username, password, email FROM login";

$result = mysql_query($connect, $sql); 

if(mysql_num_rows($result)>0)

{

while($row = mysql_fetch_assoc($result));{
echo "ID:".$row['id']."Username:".$row['username']."Password:".$row['Password']."Email:".$row['email'];

}}


}
?>
