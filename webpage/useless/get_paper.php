<?php

        // ---- 相关文章 ---- //
        // 文章标题+超链接
        $articlelist2016 = array(
            array('title'=>'The displacement of a species from a habitat by actions of another is the most severe outcome of interspecific interactions. This review focuses on recent developments in the understanding of (a) ecological mechanisms that lead to displacements, (b) how outcomes of interspecific interactions are affected by the context of where and when they occur, and (c) impacts of displacements. ','author'=>'Expected final online publication date for the Annual Review of Entomology Volume 62 is January 07, 2017. ','number'=>'4', 'link'=>'http://zssom.sysu.edu.cn/NewsContent.aspx?newsid=98121b6a-202a-4050-bff4-92fed6fa207f&typeid=3f165ddf-2fc9-47e3-87cf-5ea733064c25'),
            array('title'=>'State Key Laboratory for Biology of Plant Disease and Insect Pests, Institute of Plant Protection, Chinese Academy of Agricultural Sciences, Beijing 100193, People’s Republic of China', 'author'=>'Department of Crop and Soil Sciences, Malheur County Extension, Oregon State University, Ontario','number'=>'3','link'=>'http://zssom.sysu.edu.cn/NewsContent.aspx?newsid=328cca07-a713-4177-8241-c3a7ece67dc8&typeid=3f165ddf-2fc9-47e3-87cf-5ea733064c25')
        );
        $articlelist2015 = array(
                    array('title'=>'The displacement of a species from a habitat by actions of another is the most severe outcome of interspecific interactions. This review focuses on recent developments in the understanding of (a) ecological mechanisms that lead to displacements, (b) how outcomes of interspecific interactions are affected by the context of where and when they occur, and (c) impacts of displacements. ','author'=>'Expected final online publication date for the Annual Review of Entomology Volume 62 is January 07, 2017. ','number'=>'2', 'link'=>'http://zssom.sysu.edu.cn/NewsContent.aspx?newsid=98121b6a-202a-4050-bff4-92fed6fa207f&typeid=3f165ddf-2fc9-47e3-87cf-5ea733064c25'),
                    array('title'=>'State Key Laboratory for Biology of Plant Disease and Insect Pests, Institute of Plant Protection, Chinese Academy of Agricultural Sciences, Beijing 100193, People’s Republic of China', 'author'=>'Department of Crop and Soil Sciences, Malheur County Extension, Oregon State University, Ontario','number'=>'1','link'=>'http://zssom.sysu.edu.cn/NewsContent.aspx?newsid=328cca07-a713-4177-8241-c3a7ece67dc8&typeid=3f165ddf-2fc9-47e3-87cf-5ea733064c25')
                );
        // 呈现json格式的结果
        echo json_encode(array(
            "articlelist2015"=>$articlelist2015,
            "articlelist2016"=>$articlelist2016
        ));


?>