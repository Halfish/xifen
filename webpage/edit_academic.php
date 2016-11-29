<?php
require_once('config.php');
session_start();
if (!isset($_SESSION['id'])) {
  Header("Location: index.html");
  exit;
}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

/*$ch = curl_init($server_base . "get_project.php?sid=" . $sid);*/
/*$ch = curl_init("http://localhost:80/hw/get_communication.php");*/
$ch = curl_init($server_base_backend . "get_communication");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
$nav_list = json_decode($res);

if (isset($_GET['sid'])) {
  $sid = $_GET['sid'];
  /*$ch = curl_init("http://localhost:80/hw/" . "get_communication.php?sid=" . $sid);*/
  $ch = curl_init($server_base_backend . "get_communication?sid=" . $sid);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $res = curl_exec($ch);
  $pro_info = json_decode($res);
  console_log($pro_info);
}

curl_close($ch);
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
    <script src="project_edit.js"></script>
		<link href="custom_css/index.css" rel="stylesheet">
		<link href="custom_css/edit_academic.css" rel="stylesheet">

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
            <a href="manage_academic.php" class="list-group-item">学术交流</a>
          </div>
        </div>

        <div class="col-sm-9">
          <div style="padding:10px 30px; border: solid #ccc 1px; margin-bottom:50px;">
            <p style="color:#666">登陆日期：<?php echo date("Y-m-d");?><span style="margin:0px 30px;">以<u>管理员</u>身份登陆</span><a href="login_check.php?logout=1">登出</a></p>
            <h3 style="text-align:center">编辑学术交流</h3>
            <form id="academic_form" class="form-horizontal" role="form" action="http://172.18.217.250:5000/set_academic" method="post">
              <input type="hidden" name="sid" value="<?php if (isset($sid)) echo $sid;?>">
              <div class="form-group form-group-1">
                <?php
                  if (isset($nav_list)) {
                    $year = 0;
                    $conferenceName = "";
                    foreach ($nav_list as $line) {
                      $category_name = $line->name;
                      $splist = $line->conferenceList;
                      foreach ($splist as $sp)
                        if (isset($sid) && $sp->sid == $sid) {
                          $year = $category_name;
                          $conferenceName = $sp->name;
                        }
                    }
                    echo '<label class="col-sm-2 control-label">年份</label>';
                    echo '<div class="col-sm-10">';
                    echo '<input name="cyear" id="cyear" type="text" class="form-control" placeholder="请输入年份" value="'.$year.'" />';
                    echo '</div>';
                    echo '<label class="col-sm-2 control-label">会议名称</label>';
                    echo '<div class="col-sm-10">';
                    echo '<input name="cname" id="cname" type="text" class="form-control" placeholder="请输入会议名称" value="'.$conferenceName.'" />';
                    echo '</div>';
                  }
                ?>
              </div>
              <div class="form-group form-group-2">
                <label class="col-sm-2 control-label">会议详情</label>
                <div class="col-sm-10">
                  <textarea name="cdetail" id="cdetail" class="form-control" placeholder="请输入会议详情"  rows="20"><?php if(isset($pro_info)) { echo $pro_info->conference_detail; }?></textarea>
                </div>
              </div>
              <div class="form-group form-group-2">
                <label class="col-sm-2 control-label">媒体报导</label>
                <div class="col-sm-10">
                  <?php
                    $conference_news = "";
                    if(isset($pro_info)) {
                      $alist = $pro_info->conference_news;
                      foreach ($alist as $aline) {
                        $conference_news .=  "<ctitle>" . $aline->title . "</ctitle> \n <clink>" . $aline->link . "</clink> \n\n";
                      }
                    }
                    echo '<textarea name="cnews" id="cnews" class="form-control" placeholder="请输入媒体报道 <ctitle></ctitle>表示标题 <clink></clink>表示链接" rows="20">'.$conference_news.'</textarea>';
                  ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button name="opt" type="submit" class="btn btn-default" value="1">保存</button>
                  <button name="opt" type="submit" class="btn btn-danger" value="0">删除</button><span id="msg" style="color:#f00;margin-left:20px;"></span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>