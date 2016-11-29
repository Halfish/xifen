<?php

// sid 团队的id
if (!isset($_GET['sid'])) {
    // ---- 主要负责团队 ---- //
    $splist1 = array(
        array('name'=>'吴忠道', 'sid'=>1),
        array('name'=>'肖宁', 'sid'=>2),
        array('name'=>'胡薇', 'sid'=>3),
        array('name'=>'陈晓光', 'sid'=>4)
    );
    $c1 = new TeamInfo();
    $c1->name = "主要负责团队";
    $c1->memberList = $splist1;
    // ---- 参与团队A ---- //
    $splist2 = array(
        array('name'=>'成员1', 'sid'=>5),
        array('name'=>'成员2', 'sid'=>6),
        array('name'=>'成员3', 'sid'=>7)
    );
    $c2 = new TeamInfo();
    $c2->name = "团队A";
    $c2->memberList = $splist2;
    // ---- 参与团队B ---- //
    $splist3 = array(
        array('name'=>'成员1', 'sid'=>8),
        array('name'=>'成员2','sid'=>9),
        array('name'=>'成员3','sid'=>10)
    );
    $c3 = new TeamInfo();
    $c3->name = "团队B";
    $c3->memberList = $splist3;
    // 呈现json格式的结果
    echo json_encode(array($c1, $c2, $c3));
} else {
    $sid = $_GET['sid'];
    if ($sid == 1) {
        // ---- 成员简介 ---- //
        $info = "&nbsp;&nbsp;&nbsp;吴忠道，男、1962年4月出生、江西人。中共党员、医学博士、教授、博士生导师， 1997年毕业于南京医科大学，获得医学博士学位，同年9月入原中山医科大学基础医学博士后流动站工作。1999年6月出站并留校工作，2001年晋升为教授。1992年12月-1993年7月在美国哈佛大学公共卫生学院进修热带医学。曾在江西省寄生虫病研究所工作。<br>
                     &nbsp;&nbsp;&nbsp现任中山医学院党委书记，寄生虫学教研室主任、蛋白质组学研究实验室副主任，中山大学人类疾病基因组研究所所长。<br>
                      &nbsp;&nbsp;&nbsp主要研究兴趣是“基于组学特征的感染与炎症调节”。主持完成的《日本血吸虫中国大陆株表达基因谱的研究》获得2002年中国高校自然科学二等奖，2003广东省科技进步三等奖。2008年获得中山大学教学名师奖，2010年获得第六届广东省高等教育教学成果奖一等奖。2012年获得宝钢优秀教师奖，2015年获得广东省第七届教学名师奖。现担任教育部医学人文素质教学指导委员会委员、全国高等医学教育学会基础医学教育分会副理事长、广东省本科高校文化素质教育教学指导委员会委员。";
        // ---- 研究方向 ---- //
        $direction = "&nbsp;&nbsp;&nbsp;抗感染免疫与免疫调节。";
        // ---- 研究成果 ---- //
        $task = "&nbsp;&nbsp;&nbsp;主持或参与了国家“973”课题、“863”课题、国家传染病重大专项、广东省团队项目等多项科研项目。目前主持 1项“973”课题、3项国家自然科学基金课题。在Nucleic Acids Res，J Infect Dise， PLoS Negl Trop Dis，PLoS ONE，Int J Parasitol，J Biomed Biotechnol， Immunol Res， Parasitol Res， Parasite Immunol等国际专业杂志上发表论文近 100多篇。主持完成的《日本血吸虫中国大陆株表达基因谱的研究》获得2002年中国高校自然科学二等奖，2003广东省科技进步三等奖。";
        // ---- 相关文章 ---- //
        // 文章标题+超链接
        $articlelist = array(
            array('title'=>'人体寄生虫学', 'link'=>'http://www.icourses.cn/coursestatic/course_3474.html'),
            array('title'=>'中山医学院吴忠道教授', 'link'=>'http://zssom.sysu.edu.cn/Teacher/TeacherInfo.aspx?level=1&typeid=3490d724-577e-45bb-b6e2-e33cfa1d7ac4&tid=31173a2d-ecd6-49e3-873b-6f59cf5d0862')
        );
        // 呈现json格式的结果
        echo json_encode(array(
            "info"=>$info,
            "direction"=>$direction,
            "task"=>$task,
            "articlelist"=>$articlelist
        ));
    }
}

class TeamInfo {
    public $name = "";
    public $memberList = "";
}

?>