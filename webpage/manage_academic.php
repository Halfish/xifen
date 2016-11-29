<?php
require_once('config.php');
session_start();
if (!isset($_SESSION['id'])) {
  Header("Location: index.html");
  exit;
}

/*$ch = curl_init($server_base . "get_project.php?sid=" . $sid);*/
/*$ch = curl_init("http://localhost:80/hw/get_communication.php");*/
$ch = curl_init($server_base_backend . "get_communication");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
$nav_list = json_decode($res);
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>首页</title>
    <link rel='icon' href='pics/logo.jpg' type='image/x-ico' />

		<!-- 新 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- 可选的Bootstrap主题文件（一般不用引入） -->
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<link href="custom_css/index.css" rel="stylesheet">
		<link href="custom_css/common.css" rel="stylesheet">

  </head>
  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="border-bottom: solid #ccc 1px;">
      <div class="container">
      	<div class="col-md-2 logo">
          <img src="pics/logo.jpg" height="130">
        </div>
        <div class="col-md-10">
          <p class="chn-title"><b>国家重点研发计划——重要热带病传播相关的入侵媒介及其病原体的生物学特性研究</b></p>
          <div class="row">
            <div class="col-md-9 eng-title">
              <p><b>National Research and Development Plan: Research on Biological Characteristics of the Tropical Disease Related Invasion vectors and Pathogens</b><p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="list-group">
            <a href="admin_home.php" class="list-group-item active">
              <h4 class="list-group-item-heading">
                管理系统
              </h4>
            </a>
            <a href="manage_projects.php" class="list-group-item">关于项目</a>
            <a href="manage_papers.php"   class="list-group-item">发表文章</a>
            <a href="manage_academic.php" class="list-group-item active">学术交流</a>
          </div>
        </div>

        <div class="col-sm-9">
          <div style="padding:10px 30px; border: solid #ccc 1px; margin-bottom:50px;">
            <p style="color:#666">登陆日期：<?php echo date("Y-m-d");?><span style="margin:0px 30px;">以<u>管理员</u>身份登陆</span><a href="login_check.php?logout=1">登出</a></p>
            <h3 style="text-align:center">学术交流管理</h3>
            <table class="table table-bordered" style="color:#666">
              <thead>
                <tr>
                  <th>年份</th>
                  <th>学术名称</th>
                  <th>操作</th></tr>
              </thead>
              <tbody>
              <?php
              if (isset($nav_list) or count($nav_list) == 0) {
                foreach ($nav_list as $line) {
                  $category_name = $line->name;
                  $splist = $line->conferenceList;
                  foreach ($splist as $spline) {
                    $spname = $spline->name;
                    $tsid = $spline->sid;
                    echo "<tr><td>$category_name</td>";
                    echo "<td>$spname</td>";
                    echo '<td><a href="edit_academic.php?sid=' . $tsid . '">编辑</a>&nbsp;&nbsp;';
                  }
                }
              }
              ?>
              </tbody>
            </table>
            <p><a href="edit_academic.php"><u>点击新建</u></a></p>
          </div>
        </div>
      </div>
    </div>
  </body>