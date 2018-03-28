<?php

include 'DBConfig.php';
// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
else{
    "connected";
}

$name   = 'newtable';
$sno    = '2';
$lang   = 'english';
$path   = 'http://augmo.net/rajan/';

    $CheckSQL = "SELECT * FROM $name";

// Executing SQL Query.
   // $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

  //  if($check){

    $Sql_Query = "INSERT INTO $name ($lang) VALUES ('$path')";


        if(mysqli_query($con,$Sql_Query)){

// If the record inserted successfully then show the message.
            echo 'File Uploaded in'. $path ;
        }


  //  }

mysqli_close($con);

/*$(document).on('click','.remove',function(){
    var name    = $(this).parent().siblings('a').children('.pName').children('.policy').text();
    //alert(name);
    var form_data = new FormData();
    form_data.append('name', name);
    $.ajax({
            url: 'deletePolicy.php', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function (php_script_response) {
                window.location.reload();
            }
        });
});
/*
        $('#a').change(function () {
            $('#name').html(function () {
                var fakePath = $('#a').attr('value').toString().split('\\');
                return fakePath[fakePath.length - 1];
            });
        });

//image fit
var img = $('.card img');
$('.card img').load(funtion(){
if(img.height > img.width) {
            img.height = 'auto';
            img.width = 'auto';
        }
    });
*/





?>


<?php

include 'DBConfig.php';


$sql     = "SELECT * from `kishore-kumar`";
$sql1    = "SELECT * from `kishore-kumar` WHERE sno=1";
$sql2    = "SELECT * from `kishore-kumar` WHERE sno=2";
$sql3    = "SELECT * from `kishore-kumar` WHERE sno=3";


$result = mysqli_query($con,$sql);
$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql3);
$count  = mysqli_num_rows($result);

$lang       = array('dummy','asamee','bengali','english','gujarati','hindi','kannad','malayalam','marathi','oriya','punjabi','tamil','telugu');

echo '{"policy name":"Global Insurance Poliy",';
echo "<BR />";
echo '"language selected":{';
echo "<BR />";



$c=1;

    for($b=1;$b<13;$b++)
    {
    echo "<BR />";
    echo '"';
    echo $lang[$b];
    echo '":';
    echo "<BR />";
    echo '{';
    for($i=1;$i<$count+1;$i++)//3
    {
    echo "<BR />";
    echo '"';
    echo 'option'.$i;
    echo '":{';
    while($row = mysqli_fetch_assoc(${result.$i}))
    //while($row = mysqli_fetch_assoc($result))
    {
    echo '"name":';
    echo '"';
    echo $row['name'];
    echo '",';
    echo '"link":';
    echo '"';
    echo $row[$lang[$b]];
    if($i==$count)
    {
    echo '"}';
    }else{
    echo '"},';
    }
    echo "<BR />";

}
mysqli_data_seek(${result.$i}, 0);
}
if($lang[$b]=='telugu')
{
  echo '}';
}else{
  echo '},';
}

}
echo '}}';

mysqli_close($con);
?>
//Renamepolicy
<?php

include 'DBConfig.php';


$name   = $_POST['name'];
$sno    = $_POST['sno'];
$newName1= $_POST['newName'];
$newName = str_replace(' ','-',$newName1);


$Sql_Query = "RENAME TABLE `$name` TO `$newName`";

    if(mysqli_query($con,$Sql_Query))
        {
            $sql = "UPDATE targets SET imgname='$newName' WHERE imgname='$name'";
            if(mysqli_query($con,$sql))
            {
                rename("../audio/$name/","../audio/$newName/");

                echo $newName;
            }
            else{echo "failed1";}
        }
        else{
        echo "Failed";
        }

//}
mysqli_close($con);
?>


session_start();
if($_SESSION['status'] || $_SESSION['targetId'] || $_SESSION['get'] || $_SESSION['target'])
{
unset($_SESSION['get']);
unset($_SESSION['targetId']);
unset($_SESSION['status']);
unset($_SESSION['target']);
header("Refresh:0");
}
