<?php
include 'db_config.php';
session_start();
if(isset($_SESSION['login_user']))
{
    $login_session = $_SESSION['login_user'];
}

if (isset($_GET['module_id']))
{
  $module_id=$_GET['module_id'];
}
if (isset($_GET['course_id']))
{
  $course_id=$_GET['course_id'];
}

$sql=" INSERT INTO `seen` (`MODULE_ID`, `USER_ID`, `COURSE_ID`) VALUES ('$module_id', '$login_session','$course_id') ";
mysqli_query($conn,$sql);
header("Location: modules.php?link=$course_id");

?>