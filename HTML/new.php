<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        .navbar-header {
            width: 50px;
        }

        .navbar {
            background-color: rgb(1, 92, 165);
            height: 65px;
        }
        th, td { 
            padding:10px;
            text-align: center; 
        }
        input[type="file"]{
            cursor: pointer;

        }
        .addAudio{
                width:30px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">
                    <img style="width:150px" src="http://augmo.net/src/Bajaj.JPG">
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-log-in"></span> Logout</a>
                </li>
            </ul>
        </div>
    </nav>
<?php
$name = $_GET['name'];
//$pName = str_replace('-',' ',$name);
?>
    <div>
        <form>
            <h2>Create Policy</h2>
            <label for="policy">Policy Name</label>
            <input type="text" name="policy" id="policy" value="<?php echo $name?>">
            <table id="tab_logic">
                <tr>
                    <th colspan='1'>S.No</th>
                    <th colspan='1'>Option Name</th>
                    <th colspan='12'>Language(Audio files)</th>

                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Asamee</th>
                    <th>Bengali</th>
                    <th>English</th>
                    <th>Gujarati</th>
                    <th>Hindi</th>
                    <th>Kanand</th>
                    <th>Malayalam</th>
                    <th>Marathi</th>
                    <th>Oriya</th>
                    <th>Punjabi</th>
                    <th>Tamil</th>
                    <th>Telugu</th>

                </tr>
                <tr id='addr0'>
                    <td>1</td>
                    <td>
                        <input type='text' name='coverage' value='coverage'>
                    </td>
                    <td>
                            <label for="upload1">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload1' name='coverageAudio' accept="audio/*" style="display:none">
                                    </label>     
                        
                    </td>
                    <td>
                            <label for="upload2">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload2' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload3">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload3' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload4">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload4' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload5">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload5' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload6">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload6' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload7">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload7' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload8">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload8' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload9">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload9' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload10">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload10' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload11">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload11' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    <td>
                            <label for="upload12">
                                    <img class='addAudio' src="../assets/images/add.svg">
                                    <input type='file' id='upload12' name='coverageAudio' accept="audio/*" style="display:none">
                                  </label>
                        
                    </td>
                    
                </tr>
                <!--Importent points to remember-->
                <tr id='addr1'>
                        <td>2</td>
                        <td>
                            <input type='text' name='imp' value='Importent points to remember'>
                        </td>
                        <td>
                                <label for="upload13">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload13' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload14">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload14' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload15">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload15' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload16">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload16' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload17">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload17' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload18">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload18' name='mpAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload19">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload19' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload20">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload20' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload21">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload21' name='mpAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload22">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload22' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload23">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload23' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload24">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload24' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        
                    </tr>
                    <!--Importent points to remember-->
                <tr id='addr2'>
                        <td>2</td>
                        <td>
                            <input type='text' name='imp' value='Importent points to remember'>
                        </td>
                        <td>
                                <label for="upload25">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload25' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload26">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload26' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload27">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload27' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload28">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload28' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload29">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload29' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload30">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload30' name='mpAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload31">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload31' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload32">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload32' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload33">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload33' name='mpAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload34">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload34' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload35">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload35' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        <td>
                                <label for="upload36">
                                        <img class='addAudio' src="../assets/images/add.svg">
                                        <input type='file' id='upload36' name='impAudio' accept="audio/*" style="display:none">
                                      </label>
                            
                        </td>
                        
                    </tr>
            </table>


        </form>
        <button class='add_new'>Add new</button>
    </div>

</body>
<script>





/*$(document).ready(function() {
  var i = 2;
  $("#add_new").click(function() {
  //$('tr').find('input').prop('disabled',true)
    $('#addr' + i).html("<td>" + (i + 1) + "</td><td><td><input type='text' name='imp' value='Importent points to remember'></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td><td><label for='upload25'><img class='addAudio' src='../assets/images/add.svg'><input type='file' id='upload25' name='impAudio' accept='audio/*' style='display:none'></label></td>");    

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
    i++;
  });
});*/

$("input").change(function(){
        $(this).siblings('img').attr("src",'../assets/images/success.svg');
});



</script>
</html>

