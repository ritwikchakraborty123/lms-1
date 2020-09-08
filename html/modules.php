<?php
if (isset($_GET['link']))
{
  $course_id=$_GET['link'];
}
include 'db_config.php';
session_start();

$login_session = $_SESSION['login_user'];

$sql="SELECT * FROM `module` WHERE `COURSE_ID` LIKE '$course_id' ";
$row=mysqli_query($conn,$sql);
echo "<h1>Click on Required Module</h1>";


$tot=0;
while($r=mysqli_fetch_assoc($row))
{

    echo ' <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .dot{
            height:10px;
            width:10px;
            background-color: green;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
    </head>
    <body>';
      $mod=$r['MODULE_ID'];
    $sql1=" SELECT * FROM `seen` WHERE `MODULE_ID` LIKE '$mod' AND `USER_ID` LIKE '$login_session' ";  
    $cnt=0;
    $row1=mysqli_query($conn,$sql1);
    while($r1=mysqli_fetch_assoc($row1))
    {
        $cnt+=1;
    }
    if($cnt>0)
    echo '<h3><span class="dot"> </span> '.$r['MODULE_NAME'].'  with conatin video '.$r['VIDEO_NAME'].'</h3><br>';
    else
    {
      echo '<h3> '.$r['MODULE_NAME'].'  with conatin video '.$r['VIDEO_NAME'].'</h3><br>';
      $tot+=1;
    }


    echo'<a href="video_demo.php?module_id='.$r['MODULE_ID'] .'&course_id='.$course_id.' "> click here</a>';
    
}
if($tot==0)
{
  echo'<br><br>
  <a href="assessment.php">
  <button type="submit">Take assessment</button>
  </a>
  ';
}

echo'</body>
</html>';






?>