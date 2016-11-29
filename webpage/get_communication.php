<?php

// sid 会议的id
if (!isset($_GET['sid'])) {
    // ---- 2016年会议 ---- //
    $splist1 = array(
        array('name'=>'CVPR 2016', 'sid'=>1),
        array('name'=>'会议2', 'sid'=>2),
        array('name'=>'会议3', 'sid'=>3),
        array('name'=>'会议4', 'sid'=>4)
    );
    $c1 = new ConferenceInfo();
    $c1->name = "2016";
    $c1->conferenceList = $splist1;
    // ---- 2015年会议 ---- //
    $splist2 = array(
        array('name'=>'会议5', 'sid'=>5),
        array('name'=>'会议6', 'sid'=>6),
        array('name'=>'会议7', 'sid'=>7)
    );
    $c2 = new ConferenceInfo();
    $c2->name = "2015";
    $c2->conferenceList = $splist2;
    // 呈现json格式的结果
    echo json_encode(array($c1, $c2));
} else {
    $sid = $_GET['sid'];
    if ($sid == 1) {
        // ---- 会议详情 ---- //
        $conference_detail = "<p>We are announcing the CVPR Industry EXPO 2017, and inviting you and your company to participate!</p>
                              <p>From promising startups and creative standouts to the biggest industry leaders, this expo will be a showcase of companies that are pushing the boundaries of what’s possible with computer vision and machine learning technologies. Following the successful CVPR EXPO 2016, we are providing an exciting “trade-show” like atmosphere to foster maximal visibility and exposure for each on-site exhibitor. It is a unique opportunity for professors, students, researchers, budding entrepreneurs, technologists and others to cross paths and exchange the latest and newest ideas.</p>
                              <p>CVPR EXPO 2017 will run at Hawaii Convention Center in Honolulu next July for the duration of IEEE CVPR, co-locating with the premier academic and technical presentations. Approximately 2,500-3,000 CVPR attendees will create a one-of-a-kind opportunity for networking, recruiting, inspiration and motivation.</p>";
        // ---- 媒体报导 ---- //
        $conference_news = array(
            array('title'=>'CVPR2016 主旨演讲及焦点论文速览，深度学习垄断地位遭质疑', 'link'=>'http://news.hexun.com/2016-06-30/184666240.html'),
            array('title'=>'黑科技涌现 CVPR 2016这是要火的节奏', 'link'=>'http://www.leiphone.com/news/201606/T8SmRbIWubC36Vyd.html')
        );
        // 呈现json格式的结果
        echo json_encode(array(
            "conference_detail"=>$conference_detail,
            "conference_news"=>$conference_news,
        ));
    }
}

class ConferenceInfo {
    public $name = "";
    public $conferenceList = "";
}

?>