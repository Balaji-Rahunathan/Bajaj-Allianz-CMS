<?php
session_start();

unset($_SESSION['email']);
unset($_SESSION['failed']);
header("location:index.php");

 ?>
