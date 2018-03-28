<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='js/create-policy.js'></script>
    <link rel="stylesheet" type='text/css' href="style/create-policy.css">
    

    <style>
    .navbar-header {
    width: 50px;
}

.navbar {
    background-color: rgb(1, 92, 165);
    height: 65px;
    color:white;
}
th, td { 
    padding:10px;
    text-align: center; 
}
input[type="file"]{
    cursor: pointer;

}
img{
        width:30px;
}

#edit{
    font-size:14px;
    padding-left:20px;
    cursor:pointer;
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
include 'DBConfig.php'; 
// Creating connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

$name = $_GET['name'];
$result = mysqli_query($con, "SELECT * FROM $name");



//$pName = str_replace('-',' ',$name);<?php echo $name

?>
    <div>
    
    <h2>Policy Name: <strong class='policy'><?php echo $name ?></strong><span ><a style='text-decoration:none' href='#' data-toggle="modal" data-target="#myModal" id='edit'>Edit</a></span></h2>

    

    <form method="POST" action='uploadAudio.php?name=<?php echo $name?>' enctype="multipart/form-data">
            <h2>Create Policy</h2>
            
            
            

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
                <tbody>
                    
              
               </tbody>
            </table>


        </form>
        <button type = 'button' class='add_new'>Add new</button>
        <button type = 'button' class='delete'>Delete Row</button>
       
        
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Policy Name</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                <label for='pName'>Policy Name</label> 
                            <input type='text' name='pName' id='pName' placeholder="Policy Name">
                    <form method="POST" action='#' enctype="multipart/form-data">
                           
                </div>
                </form>
                        <div class='submitBtn'>
                        <button type = 'button' class='renamePolicy'>Submit</button>
                        </div>
                    
                    
                </div>

            </div>

        </div>
    </div>


</body>
<script>
$('#edit').on('click', function(){
    $("#MyModal").modal();
});


$('.delete').on('click',function(){
    
    var sno = $('#tab_logic tr:last td:first-child' ).text();
    document.getElementById("tab_logic").deleteRow(-1);
    var form_data = new FormData();
    form_data.append('sno', sno);
    form_data.append('name', name);
    $.ajax({
            url: 'deleteRow.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function (php_script_response) {
                //alert(php_script_response); // display response from the PHP script, if any
                //addTable();
                //window.location.reload();
                //location.reload(true);
            }
        });
});



$(document).on('click','.renamePolicy',function(){
    var newName = $('#pName').val();
    var name    = $('.policy').text();
    var form_data = new FormData();
    form_data.append('name', name);
    form_data.append('newName', newName);
    $.ajax({
            url: 'renamePolicy.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function (php_script_response) {
                $('.policy').text(php_script_response);
                $('#myModal').modal('hide');
                //window.location.search = jQuery.query.set("name", php_script_response);


                //alert(php_script_response); // display response from the PHP script, if any
                //addTable();
                //window.location.reload();
                //location.reload(true);
            }
        });
});



$('.add_new').on('click',function(){

    var no = $('#tab_logic tr:last td:first-child' ).text();
    addRow(no);
    //var sno = $('#tab_logic tr:last').attr('id');
    //alert(sno);
    var sno = $('#tab_logic tr:last td:first-child' ).text();
    var form_data = new FormData();
    form_data.append('sno', sno);
    form_data.append('name', name);
    $.ajax({
            url: 'addRow.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function (php_script_response) {
                //alert(php_script_response); // display response from the PHP script, if any
                //addTable();
                //window.location.reload();
                //location.reload(true);
            }
        });

});



$(document).on('change', 'input:file', function () {
        var file_data = $(this).prop('files')[0];
        var form_data = new FormData();
        var option = this.className;
        $(this).siblings("img").attr("src", "../assets/images/success.svg");
        var name = $('.policy').val();
        var sno = $(this).parent().parent().siblings('.sno').text();
        //alert(option);        
        form_data.append('file', file_data);
        form_data.append('option', option);
        form_data.append('name', name);
        form_data.append('sno', sno);
        //alert(form_data);                             
        $.ajax({
            url: 'upload.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function (php_script_response) {
                //alert(php_script_response); // display response from the PHP script, if any
                //addTable();
            }
        });

    });


</script>
</html>