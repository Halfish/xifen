<?php

// sid 物种的id
if (!isset($_GET['sid'])) {
    // ---- 第一类生物 ---- //
    $splist1 = array(
        array('name'=>'藁杆双脐螺', 'sid'=>1),
        array('name'=>'福寿螺', 'sid'=>2),
        array('name'=>'褐云玛瑙螺', 'sid'=>3)
    );
    $c1 = new Category();
    $c1->name = "螺";
    $c1->specieslist = $splist1;
    // ---- 第二类生物 ---- //
    $splist2 = array(
        array('name'=>'白纹伊蚊', 'sid'=>4),
        array('name'=>'埃及伊蚊', 'sid'=>5)
    );
    $c2 = new Category();
    $c2->name = "蚊蝶";
    $c2->specieslist = $splist2;
    // ---- 第三类生物 ---- //
    $splist3 = array(
        array('name'=>'锥虫', 'sid'=>6),
        array('name'=>'疟原虫','sid'=>7),
        array('name'=>'血吸虫','sid'=>8)
    );
    $c3 = new Category();
    $c3->name = "病原体";
    $c3->specieslist = $splist3;
    // 呈现json格式的结果
    echo json_encode(array($c1, $c2, $c3));
} else {
    $sid = $_GET['sid'];
    if ($sid == 1) {
        // ---- 基本信息介绍 ---- //
        $info = "藁杆双脐螺（学名：Biomphalaria straminea）为扁蜷螺科双脐螺属的动物。分布于巴西以及中国大陆的香港、深圳等地，一般生活于池塘、小水渠以及水流较缓的河流沿岸。";
        // ---- 项目进展简介 ---- //
        $progress = "目前项目已经完成DNA90%的测序工作。";
        // ---- 项目组发表的文章 ---- //
        // 文章标题+超链接
        $paperlist = array(
            array('title'=>'深圳市曼氏血吸虫中间宿主藁杆双脐螺的调查分析,潘世定，陈佩玑，容寿铭，刘杰生，王洁坤，...', 'link'=>'www.sina.com.cn'),
            array('title'=>'藁杆双脐螺在中国内陆的分布现状与传病风险,黄少玉，张启明，李晓恒，卓晖', 'link'=>'www.sina.com.cn'),
            array('title'=>'曼氏血吸虫中间宿主——藁杆双脐螺Biomphalaria straminea(Dunker)在我国的发现,刘月英，王耀先，张文珍', 'link'=>'www.sina.com.cn')
        );
        // ---- 相关文章 ---- //
        // 文章标题+超链接
        $articlelist = array(
            array('title'=>'新区监测点今年未发现双脐螺', 'link'=>'www.sina.com.cn'),
            array('title'=>'小心，双脐螺出没新洲河', 'link'=>'www.sina.com.cn')
        );
        // ---- 项目介绍 ---- //
        $intro = array(
            'name'=>"螺",
            'img'=>"http://www.cdcp.org.cn/gdsjbyfkzzx/xxc/201506/6892104cba654ca28ba6c776fcaf1521/images/1303482f76b34888a132046c76e2c23a.gif",
            'para'=>"对藁杆双脐螺的研究有助于帮组治疗某种疾病。对藁杆双脐螺的研究有助于帮组治疗某种疾病。对藁杆双脐螺的研究有助于帮组治疗某种疾病。对藁杆双脐螺的研究有助于帮组治疗某种疾病。对藁杆双脐螺的研究有助于帮组治疗某种疾病。对藁杆双脐螺的研究有助于帮组治疗某种疾病。"
        );
        // 呈现json格式的结果
        echo json_encode(array(
            "info"=>$info,
            "progress"=>$progress,
            "paperlist"=>$paperlist,
            "articlelist"=>$articlelist,
            "intro"=>$intro
        ));
    }
}

class Category {
    public $name = "";
    public $specieslist = "";
}

?>