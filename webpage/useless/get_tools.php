<?php

// sid 会议的id
if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];
    if ($sid == 1) {
        // ---- 链接 ---- //
        $tools_link = array(
            array('title'=>'MNIST', 'link'=>'http://yann.lecun.com/exdb/mnist/'),
            array('title'=>'Cifar', 'link'=>'https://www.cs.toronto.edu/~kriz/cifar.html')
        );

        // 呈现json格式的结果
        echo json_encode(array(
            "tools_link"=>$tools_link,
        ));
    }
}

?>