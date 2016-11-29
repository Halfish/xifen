<?php
require_once('config.php');

session_start();
if (!isset($_SESSION['id'])) {
  Header("Location: index.html");
  exit;
}
$id = $_SESSION['id'];

//$ch = curl_init($server_base . "get_project.php");
$ch = curl_init($server_base_backend . "get_project");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
$nav_list = json_decode($res);

if (isset($_GET['sid'])) {
  $sid = $_GET['sid'];
  $ch = curl_init($server_base_backend . "get_project?sid=" . $sid);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $res = curl_exec($ch);
  $pro_info = json_decode($res);
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
            <a href="manage_academic.php" class="list-group-item">学术交流</a>
          </div>
        </div>
        
        <div class="col-sm-9">
          <div style="padding:10px 30px; border: solid #ccc 1px; margin-bottom:50px;">
            <p style="color:#666">登陆日期：<?php echo date("Y-m-d");?><span style="margin:0px 30px;">以<u>管理员</u>身份登陆</span><a href="login_check.php?logout=1">登出</a></p>
            <h3 style="text-align:center">编辑项目</h3>
            <form id="project_form" class="form-horizontal" role="form" action="http://172.18.217.250:5000/set_project" method="post">
              <input type="hidden" name="sid" value="<?php if (isset($sid)) echo $sid;?>">
              <input type="hidden" name="id"  value="<?php if (isset($id)) echo $sid;?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">物种名称</label>
                <div class="col-sm-10">
                  <input name="sname" id="sname" type="text" class="form-control" placeholder="请输入名称" value="<?php if(isset($pro_info)) {echo $pro_info->intro->name; }?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">所属类别</label>
                <div class="col-sm-10">
                <?php
                  $selected_name = "";
                  if (isset($nav_list)) {
                    foreach ($nav_list as $line) {
                      $category_name = $line->name;
                      $splist = $line->specieslist;
                      foreach ($splist as $sp) {
                        if (isset($sid) && $sp->sid == $sid) $selected_name = $category_name;
                      }
                    }
                  }
                ?>
                  <input name="category_name" type="text" class="form-control" placeholder="请输入类别名" value="<?php echo $selected_name ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">相关图片</label>
                <div class="col-sm-10">
                  <input name="intro_img" type="text" class="form-control"  placeholder="请输入链接" value="<?php if(isset($pro_info)) {echo $pro_info->intro->img; }?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">基本信息</label>
                <div class="col-sm-10">
                  <textarea name="info" id="info" class="form-control" rows="20"><?php if(isset($pro_info)) {echo $pro_info->info; }?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">项目介绍</label>
                <div class="col-sm-10">
                  <textarea name="intro_para" id="intro" class="form-control" rows="20"><?php if(isset($pro_info)) {echo $pro_info->intro->para; }?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">相关文章</label>
                <div class="col-sm-10">
                  <select name="aid" id="aid" class="form-control">
                    <option value="-1">新建</option>
                    <?php
                      if (isset($pro_info)) {
                        $alist = $pro_info->articlelist;
                        foreach ($alist as $aline) {
                          echo '<option id="title_'.$aline->aid.'" value="'.$aline->aid.'">'.$aline->title.'   '.$aline->link.'</option>';
                        }
                      }
                    ?>
                  </select>
                  <input name="atitle" id="atitle" style="margin:5px 0" type="text" class="form-control" placeholder="标题">
                  <input name="alink"  id="alink"  type="text" class="form-control" placeholder="链接">
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