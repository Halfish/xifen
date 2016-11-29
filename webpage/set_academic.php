<?php
session_start();
if (!isset($_SESSION['id'])) {
  Header("Location: index.html");
  exit;
}
$uid = $_SESSION['id'];

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

if (!isset($_POST['cyear']) || !isset($_POST['cname']) || !isset($_POST['cdetail'])
   ||!isset($_POST['cnews']) || !isset($_POST['opt'])){
  Header("Location: index.html");
  exit;
}
echo "<p>[user id] $uid</p>";
echo "<p>[conference id] ".$_POST['sid']."</p>";
echo "<p>[conference year] ".$_POST['cyear']."</p>";
echo "<p>[conference name] ".$_POST['cname']."</p>";
echo "<p>[conference detail] ".$_POST['cdetail']."</p>";
echo "<p>[conference news] ".$_POST['cnews']."</p>";
echo "<p>[operation (1:update 0:delete)] ".$_POST['opt']."</p>";
?>