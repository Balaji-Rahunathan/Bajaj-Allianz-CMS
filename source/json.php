<?php



 function metadata($name)
{
    include 'DBConfig.php';
    //$name='kishore-kumar';
    $sql    = "SELECT * from `$name`";
    $result = mysqli_query($con,$sql);
    $count  = mysqli_num_rows($result);
    for($a=1;$a<=$count;$a++)
    {

    ${sql.$a}    = "SELECT * from `$name` WHERE sno=$a";
    ${result.$a} = mysqli_query($con,${sql.$a});

    }

    $lang       = array('dummy','asamee','bengali','english','gujarati','hindi','kannad','malayalam','marathi','oriya','punjabi','tamil','telugu');

    echo '{"policy name":"Global Insurance Poliy",';
    echo "<BR />";
    echo '"language selected":{';
    echo "<BR />";

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
}



mysqli_close($con);
?>
