<?php
include 'db_config.php';
session_start();

if (isset($_GET['module_id']))
{
  $module_id=$_GET['module_id'];
}
if (isset($_GET['course_id']))
{
  $course_id=$_GET['course_id'];
}
$login_session = $_SESSION['login_user'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <video id="video" width="480" controls="true" poster="">

        <source type="video/mp4" src="video.mp4">
        
        </source>
        </video>    
</body>


</html>
<script>
document.getElementById("video").addEventListener("ended",function(e){ 

    var login_session='<?php echo $login_session; ?>';
    var module_id='<?php echo $module_id; ?>';
    var course_id='<?php echo $course_id; ?>';
   window.location.href="inside.php?module_id="+module_id+"&course_id="+course_id;


});
    
</script>

