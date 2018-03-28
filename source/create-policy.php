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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    td {
      padding:20px;
      text-align: center;
    }

    th{

      color:white;
      padding: 6px;
      text-align: center;
    }
    input[type=file]{
        cursor: pointer;

    }
    label img{
      cursor: pointer;
    }

    #edit{
        font-size:14px;
        padding-left:20px;
        cursor:pointer;
    }
    .submitFinal{
      position: relative;
      left:85%;
      top:350px;
    }
    .add_new,.delete{
      margin-top:30px;
      font-size:14px;
    }
    .assetbundle{
      margin-top: 50px;
    }
    .cPolicy{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      padding:0;
      padding-bottom: 200px;
      border-radius: 5px;
      margin-bottom: 50px;
      height: 100%;
      background: linear-gradient(180deg, rgb(1, 92, 165) 75px, white 75px);
    }
    i{
      padding:5px;
    }
    h1{
        padding-top:20px;
        padding-bottom: 20px;
    }

    h2{
      padding-bottom:20px;
    }
    #coverage{
      height:100px;
      margin-bottom:100px;
    }
    #header{
      height:150px;
    }
    .ul li{
      display:inline;
    }

    /* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
    visibility: hidden; /* Hidden by default. Visible on click */
    min-width: 250px; /* Set a default minimum width */
    margin-left: -125px; /* Divide value of min-width by 2 */
    background-color: #333; /* Black background color */
    color: #fff; /* White text color */
    text-align: center; /* Centered text */
    border-radius: 2px; /* Rounded borders */
    padding: 16px; /* Padding */
    position: fixed; /* Sit on top of the screen */
    z-index: 1; /* Add a z-index if needed */
    left: 50%; /* Center the snackbar */
    bottom: 30px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
    visibility: visible; /* Show the snackbar */

/* Add animation: Take 0.5 seconds to fade in and out the snackbar.
However, delay the fade out process for 2.5 seconds */
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>
</head>

<body>
<!--Navbar-->
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="add policy.php" class="navbar-brand">
                    <img style="width:150px" src="http://augmo.net/src/Bajaj.JPG">
                </a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="logout.php">
                        <span class="glyphicon glyphicon-log-in"></span> Logout</a>
                </li>
            </ul>
        </div>
</nav>

<!--Create Connection-->
<?php
    include 'DBConfig.php';





    $name = $_GET['name'];

    $result = mysqli_query($con, "SELECT * FROM $name");




?>


<!--Table and Heading-->

    <h1>Create Policy</h1>
    <h2>Policy Name: <strong class='policy'><?php echo $name ?></strong><span ><!--<a style='text-decoration:none' href='#' data-toggle="modal" data-target="#myModal" id='edit'>Edit</a>--></span></h2>



    <form method="POST" action='../SampleSelector.php?select=UpdateTarget' enctype="multipart/form-data">

      <input type='hidden' class='policyName' name='policyName' value=''>


<div class='container cPolicy' >
  <div style="overflow-x:auto;">
            <table id="tab_logic">

                <tr class='th'>
                    <th colspan='1'>S.No</th>
                    <th colspan='1'>Option Name</th>
                    <th colspan='12'>Language(Audio files)</th>

                </tr>
                <tr class='th'>
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
          </div>
            <input type='submit' class='submitFinal btn btn-default' value='Submit'>
            <button type = 'button' class='add_new btn btn-primary'><i class="fa fa-plus"></i>Add</button>
            <button type = 'button' class='delete btn btn-danger'><i class="fa fa-trash"></i></span>Delete</button>

    </form>





<div class='assetbundle'>
    <div id='header'>
    <ul class='ul'>
      <h3>Animation</h3>
      <h4>Header</h4>
      <li>
    <label for='android'>Android:
    <img class = 'ha' src=../assets/images/upload.svg width=50px>
    <input type='file' name='header' class='anim' id='android' style="display:none"></label>
  </li>
  <li>
    <label for='ios'>IOS:
    <img class = 'hi' src=../assets/images/upload.svg width=50px>
    <input type='file' name='header' class='anim' id='ios'style="display:none"></label>
  </li>

    <h4>Coverage</h4>
    <li>
    <label for='android1'>Android:
      <img class = 'ca' src=../assets/images/upload.svg width=50px>
    <input type='file' name='coverage' class='anim' id='android1' style="display:none"></label>
    </li>
    <li>
    <label for='ios1'>IOS:
      <img class = 'ci' src=../assets/images/upload.svg width=50px>
    <input type='file' name='coverage' class='anim' id='ios1' style="display:none"></label>
    </li>

  </ul>
</div>
</div>
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
                        <div class='modal-footer submitBtn'>
                        <button type = 'button' class='renamePolicy'>Submit</button>
                        </div>


                </div>

            </div>

        </div>
<div id="snackbar"></div>

</body>


<script>

  $( document ).ready(function(){
    var name   = $('.policy').text();
    $('.policyName').val(name);
    //alert($('.policyName').val());
  });



  //Modal Open
  $('#edit').on('click', function(){
      $("#MyModal").modal();
  });


  //Delete ajax
  $('.delete').on('click',function(){
      var name    = $('.policy').text();
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


  //Rename ajax
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
                  window.location.href = "add policy.php"
                  //window.location.reload("http://augmo.net/php/rajan/html/" + php_script_response);
                  //window.location.search = jQuery.query.set("name", php_script_response);


                  //alert(php_script_response); // display response from the PHP script, if any
                  //addTable();

                  //location.reload(true);
              }
          });
  });


  //Add new row ajax
  $(document).on('click','.add_new',function(){
      var name    = $('.policy').text();
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
                location.reload();
                  //alert(php_script_response); // display response from the PHP script, if any
                  //addTable();
                  //window.location.reload();
                  //location.reload(true);
              }
          });

  });


  //File Upload ajax
  $(document).on('change', '.impAudio', function () {
          var file_data = $(this).prop('files')[0];
          var form_data = new FormData();
          var option = $(this).attr('name');
          $(this).siblings("img").attr("src", "../assets/images/success.svg");
          var name = $('.policy').text();
          var sno = $(this).parent().parent().siblings('.sno').text();
          //alert(option+name+sno);
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
                  var x = document.getElementById("snackbar")
                  x.innerHTML = php_script_response;
                  // Add the "show" class to DIV
                  x.className = "show";

                  // After 3 seconds, remove the show class from DIV
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

                  //addTable();
              }
          });

      });

  //File Upload ajax
  $(document).on('change', '.anim', function () {
          var file_data = $(this).prop('files')[0];
          var form_data = new FormData();
          var option    = $(this).attr('name');
          var option2    = $(this).attr('id');
          var option1    = option2.replace(/\d+/g, '');
          var name = $('.policy').text();
          $(this).siblings("img").attr("src", "../assets/images/success.svg");
          //alert(option+option1);
          form_data.append('file', file_data);
          form_data.append('option', option);
          form_data.append('option1', option1);
          form_data.append('name', name);
          $.ajax({
              url: 'animUpload.php', // point to server-side PHP script
              dataType: 'text',  // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,
              type: 'POST',
              success: function (php_script_response) {
                  console.log(php_script_response);
                  var x = document.getElementById("snackbar")
                  x.innerHTML = php_script_response;
                  // Add the "show" class to DIV
                  x.className = "show";

                  // After 3 seconds, remove the show class from DIV
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000); // display response from the PHP script, if any
                  //addTable();
              }
          });

          });
      //Option ajax
  $(document).on('change', 'input:text', function () {
          var option    = $(this).val();
          var form_data = new FormData();
          var name = $('.policy').text();
          var sno = $(this).parent().siblings('.sno').text();
          form_data.append('option', option);
          form_data.append('name', name);
          form_data.append('sno', sno);
          //alert(form_data);
          $.ajax({
              url: 'option.php', // point to server-side PHP script
              dataType: 'text',  // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,
              type: 'POST',
              success: function (php_script_response) {
                  console.log(php_script_response); // display response from the PHP script, if any
                  //addTable();
              }
          });

      });


</script>
</html>
