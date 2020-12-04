<?php
	session_start();
	error_reporting(0);
    $con=mysqli_connect("localhost", "root", "","scoringsystem");
    if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
    }
    
?>