<?php
session_start();
if (isset($_GET['logout'])) {
  $_SESSION = array();
  if (isset($_COOKIE[session_name()])) {
    setCookie(session_name(), '', time()-3600, '/');
  }
  session_destroy();
  Header("Location: index.html");
  exit;
}

$debug = false;

if (!$debug && !isset($_POST['id'])) {
  Header("Location: index.html");
  exit;
}

if ($debug) $_SESSION['id'] = 1;
else $_SESSION['id'] = $_POST['id'];

Header("Location: admin_home.php");
?>
