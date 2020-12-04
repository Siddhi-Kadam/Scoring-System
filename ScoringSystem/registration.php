<?php
    include('includes/connect.php');
    if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        echo "Data entered!!!";
        echo $username,$password,$status;
        if($username !=''||$password !=''||$status!=''){
            $query = mysqli_query($con, "insert into user(username,password,status) values ('$username','$password','$status')");
            $ret=mysqli_fetch_array($query);
            header('location:index.html');
        }
        else{
            echo '<script type="text/javascript">';
            echo ' alert("Fill Entries")';  //not showing an alert box.
            echo '</script>';
        }
    }
?>