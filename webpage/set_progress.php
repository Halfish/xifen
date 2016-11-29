<?php
session_start();
if (!isset($_SESSION['id'])) {
  Header("Location: index.html");
  exit;
}
$uid = $_SESSION['id'];
if (!isset($_POST['title']) || !isset($_POST['abstract']) || !isset($_POST['sid']) || !isset($_POST['img'])
   || !isset($_POST['body']) || !isset($_POST['opt'])) {
  Header("Location: index.html");
  exit;
}
echo "<p>[user id] $uid</p>";
echo "<p>[species id] ".$_POST['sid']."</p>";
echo "<p>[title] ".$_POST['title']."</p>";
echo "<p>[image link] ".$_POST['img']."</p>";
echo "<p>[body] ".$_POST['body']."</p>";
echo "<p>[operation (1:update 0:delete)] ".$_POST['opt']."</p>";
?>