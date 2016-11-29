<?php
session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  Header("Location: index.html");
  exit;
}

$debug = true;

if (!$debug && !isset($_POST['id'])) {
  Header("Location: index.html");
  exit;
}

if ($debug) $_SESSION['id'] = 1;
else $_SESSION['id'] = $_POST['id'];

Header("Location: admin_home.php");
?>