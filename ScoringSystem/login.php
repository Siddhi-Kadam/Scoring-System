<?php
    include('includes/connect.php');
    if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo "Data entered!!!";
        echo $username,$password;
        if($username !=''||$password !=''){
            $query=mysqli_query($con,"select * from user where username='$username' && password='$password'"); 
            $ret=mysqli_fetch_array($query);
            if($ret>0){
                $_SESSION['ids']=$ret['username'];
                if($ret['status']=='teacher'){
                    //echo "Welcome Teacher".$_SESSION['ids'];
                    header('location:data.php');
                }
                if($ret['status']=='student'){
                    header('location:student.php');
                }
            }
            else{
                echo '<script type="text/javascript">';
                echo ' alert("No such account exists")';  //not showing an alert box.
                echo '</script>';
            }
        }
        else{
            echo '<script type="text/javascript">';
            echo ' alert("Fill Entries")';  //not showing an alert box.
            echo '</script>';
        }
    }
?>