<?php
    include('includes/connect.php');
    if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
        $id = $_POST['id'];
        $rollNo = $_POST['rollNo'];
        $sub1 = $_POST['sub1'];
        $sub2 = $_POST['sub2'];
        $sub3 = $_POST['sub3'];
        $sub4 = $_POST['sub4'];
        $sub5 = $_POST['sub5'];
        if($rollNo !=''||$sub1 !=''||$sub2 !=''||$sub3 !=''||$sub4 !=''||$sub5 !=''){
            $percent = (($sub1+$sub2+$sub3+$sub4+$sub5)/500)*100;
            $query = mysqli_query($con, "update scores set sub1='$sub1', sub2='$sub2', sub3='$sub3',sub4='$sub4',sub5='$sub5',percent='$percent' where id='$id'");
            header('Location: data.php');
        }
        else{
            echo '<script type="text/javascript">';
            echo ' alert("Some Fields are Blank")';  //not showing an alert box.
            echo '</script>';
        }
    }
?>