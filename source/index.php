<?php
session_start();
$failed     = $_SESSION['failed'];
if(isset($_SESSION['failed']))
{
  echo "<script type='text/javascript'>alert('$failed');</script>";
  unset($_SESSION['failed']);

}
?>
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <style>
    .form {
        background-color:white;
        color:rgb(34, 34, 34);
        font-weight:bold;

        margin:150px auto;
        padding:20px;
        height:350px;
        width: 350px;
        box-shadow: 0 3px 6px rgba(1, 92, 165,0.16), 0 3px 6px rgba(1, 92, 165,0.23);
        border-radius: 10px;
        border: 1px solid rgb(1, 92, 165);

    }
    .email{
      padding-top: 20px;
    }
    .pass{
      padding-top: 20px;
    }
    .submit1{
      padding-top: 30px;
      text-align: right;
    }


    </style>
</head>

<body>
    <div>
    <div class='form'>
      <form class='w3-container' action='login.php' method='POST'>
          <div class='admin'>
            <h2>Admin Login</h2>
          </div>
          <div class='email'>
            <label>Email</label>
            <input type="email" class='w3-input' name="email" id="email" autocomplete="null">
            </div>
            <div class='pass'>
            <label>Password</label>
            <input type="password" class='w3-input' name="pass" id="pass" autocomplete="null">

            </div>
            <div class='submit1'>
            <input name="submit" class='submit btn btn-primary' type='submit' value="Login"/>
            </div>
        </form>

    </div>
</div>
</body>
<script>

</script>

</html>
