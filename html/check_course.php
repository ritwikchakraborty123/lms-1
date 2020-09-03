<?php
include 'db_config.php';
if(isset($_POST) & !empty($_POST)){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $sql = "SELECT COURSE_ID FROM courses WHERE COURSE_ID = '$username'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
        echo "<b style = 'color:#ff0000;'>"."COURSE ID Not Available";
    }else{
        echo "<b style ='color:#008000;'>"."COURSE ID Available";
    }
}
?>