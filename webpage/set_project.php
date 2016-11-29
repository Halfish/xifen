<?php
session_start();
if (!isset($_SESSION['id'])) {
  Header("Location: index.html");
  exit;
}
$uid = $_SESSION['id'];
if (!isset($_POST['sname']) || !isset($_POST['cid']) || !isset($_POST['cname']) || !isset($_POST['intro_img'])
   || !isset($_POST['info']) || !isset($_POST['intro_para']) || !isset($_POST['aid'])
   || !isset($_POST['atitle']) || !isset($_POST['alink']) || !isset($_POST['opt'])) {
  Header("Location: index.html");
  exit;
}
echo "<p>[user id] $uid</p>";
echo "<p>[species id] ".$_POST['sid']."</p>";
echo "<p>[species name] ".$_POST['sname']."</p>";
echo "<p>[category id] ".$_POST['cid']."</p>";
echo "<p>[category name] ".$_POST['cname']."</p>";
echo "<p>[image link] ".$_POST['intro_img']."</p>";
echo "<p>[species information] ".$_POST['info']."</p>";
echo "<p>[project information] ".$_POST['intro_para']."</p>";
echo "<p>[article id] ".$_POST['aid']."</p>";
echo "<p>[article title] ".$_POST['atitle']."</p>";
echo "<p>[article link] ".$_POST['alink']."</p>";
echo "<p>[operation (1:update 0:delete)] ".$_POST['opt']."</p>";
?>