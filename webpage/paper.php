<?php
require_once('config.php');

$ch = curl_init($server_base_backend . 'get_paper');
//$ch = curl_init("http://localhost:80/hw/get_paper.php");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
$paper_list = json_decode($res);

// 关闭cURL资源，并且释放系统资源
curl_close($ch);
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>研究团队</title>
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

  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
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
            <div class="col-md-3 search-box">
              <div id="custom-search-input">
                <div class="input-group col-md-12">
                  <input type="text" class="  search-query form-control" placeholder="搜索" />
                  <span class="input-group-btn">
                    <button class="btn btn-danger" type="button">
                      <span class=" glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
	      <div class="blog-masthead">
		      <div class="row">
		      	<div class="col-md-10 col-md-offset-1">
			        <nav class="blog-nav" >
			          <a class="blog-nav-item" href="index.html">首页</a>
                          <a class="blog-nav-item" href="project.php">关于项目</a>
                          <a class="blog-nav-item" href="team.php">研究团队</a>
                          <a class="blog-nav-item" href="progress.php">项目进展</a>
                          <a class="blog-nav-item active" href="paper.php">发表文章</a>
                          <a class="blog-nav-item" href="communication.php">学术交流</a>
                          <a class="blog-nav-item" href="tools.php">数据/工具</a>
			        </nav>
			    	</div>
			    </div>
		    </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- 发表文章 -->
            <div class="col-sm-12>
                <div class="paper_body">
                    <div class="container">

                            <div class="paper_sub">
                              <?php
                                echo '<div class="table_sty"><ul><ol reversed="">';
                                echo '<p><strong>2016</strong></p>';
                                echo '<hr style="height:1px;border:none;border-top:1px solid #555555;" />';
                                if (!isset($paper_list) || $paper_list->articlelist2016 == "") {
                                 echo '<p style="color:#222">暂无信息</p>';
                                 } else {
                                  $alist = $paper_list->articlelist2016;
                                  foreach ($alist as $line) {
                                  echo '<li><a href="' . $line->link . '">' . $line->title . '</a></li>';
                                  echo '<p>' . $line->author . '</p>';
                                   }
                                   }
                                   echo '<br>';
                                   echo '<p><strong>2015</strong></p>';
                                   echo '<hr style="height:1px;border:none;border-top:1px solid #555555;" />';
                                   if (!isset($paper_list) || $paper_list->articlelist2015 == "") {
                                   echo '<p style="color:#222">暂无信息</p>';
                                   } else {
                                   $alist = $paper_list->articlelist2015;
                                   foreach ($alist as $line) {
                                   echo '<li><a href="' . $line->link . '">' . $line->title . '</a></li>';
                                   echo '<p>' . $line->author . '</p>';
                                    }
                                     }
                                     echo '<hr style="height:1px;border:none;border-top:1px solid #555555;" />';
                                     echo '</ol></ul></div>';
                                     ?>


                </div>
            </div>
            </div>
        </div>
        <footer class="footer">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="col-sm-6 project-introduction">
                      <p><b>相关链接</b></p>
                      <p><a href="http://zssom.sysu.edu.cn/">中山大学中山医学院</a></p>
                      <p><a href="http://www.ipd.org.cn/">中国疾病预防控制中心寄生虫病预防控制所</a></p>
                      <p><a href="http://life.fudan.edu.cn/ ">复旦大学生命科学学院</a></p>
                      <p><a href="http://www.ipd.org.cn/">南方医科大学公共卫生与热带医学学院</a></p>
                    </div>
                    <div class="col-sm-5">
                      <p><b>资源共享</b></p>
                      <p><a href="http://www.chinaias.cn/wjPart/index.aspx ">中国外来入侵物种数据库</a></p>
                      <p><a href="http://www.iucngisd.org/gisd/">全球入侵物种数据库GISD</a></p>
                      <p><a href="https://www.vectorbase.org/">人类病原体无脊椎动物媒介生物信息资源数据库（VectorBase）</a></p>
                    </div>
                  </div>
                  <div class="col-sm-3 col-sm-offset-1">
                    <div class=" QRcode-reminder">
                      <p>请关注我们的公众号：</p>
                    </div>
                    <!-- <div class="col-sm-4"> -->
                      <img src="pics/QRcode.png" height="105">
                    <!-- </div> -->
                  </div>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                  <p>Copyright &copy; 2016 <a href="http://www.sysu.edu.cn/2012/cn/index.htm">中山大学</a> &nbsp&nbsp&nbsp
                  联系我们：<a href="mailto:wuzhd@mail2.sysu.edu.cn">wuzhd@mail2.sysu.edu.cn</a></p>
                  <p>地址：中国广州市中山二路74号中山大学北校区（邮政编码：510080）</p>
                </div>
              </footer>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>