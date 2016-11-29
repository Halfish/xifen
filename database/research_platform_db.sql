/*
Navicat MySQL Data Transfer

Source Server         : xifen
Source Server Version : 50716
Source Host           : 172.18.217.250:3306
Source Database       : research_platform

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2016-11-29 13:07:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
`announcement_id`  int(11) NOT NULL ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`content`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`pubDate`  datetime NULL DEFAULT NULL ,
PRIMARY KEY (`announcement_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of announcement
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
`article_id`  int(11) NOT NULL AUTO_INCREMENT ,
`title`  varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`year`  int(11) NULL DEFAULT NULL ,
`link`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`author`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`article_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of article
-- ----------------------------
BEGIN;
INSERT INTO `article` VALUES ('1', 'State Key Laboratory for Biology of Plant Disease and Insect Pests, Institute of Plant Protection, Chinese Academy of Agricultural Sciences, Beijing 100193, People’s Republic of China', '2015', 'http://zssom.sysu.edu.cn/NewsContent.aspx?newsid=328cca07-a713-4177-8241-c3a7ece67dc8&typeid=3f165ddf-2fc9-47e3-87cf-5ea733064c25', 'Department of Crop and Soil Sciences, Malheur County Extension, Oregon State University, Ontario'), ('2', 'The displacement of a species from a habitat by actions of another is the most severe outcome of interspecific interactions. This review focuses on recent developments in the understanding of (a) ecological mechanisms that lead to displacements, (b) how outcomes of interspecific interactions are affected by the context of where and when they occur, and (c) impacts of displacements.', '2015', 'http://zssom.sysu.edu.cn/NewsContent.aspx?newsid=98121b6a-202a-4050-bff4-92fed6fa207f&typeid=3f165ddf-2fc9-47e3-87cf-5ea733064c25', 'Expected final online publication date for the Annual Review of Entomology Volume 62 is January 07, 2017.'), ('3', 'State Key Laboratory for Biology of Plant Disease and Insect Pests, Institute of Plant Protection, Chinese Academy of Agricultural Sciences, Beijing 100193, People’s Republic of China', '2016', 'Department of Crop and Soil Sciences, Malheur County Extension, Oregon State University, Ontario', 'Department of Crop and Soil Sciences, Malheur County Extension, Oregon State University, Ontario'), ('4', 'The displacement of a species from a habitat by actions of another is the most severe outcome of interspecific interactions. This review focuses on recent developments in the understanding of (a) ecological mechanisms that lead to displacements, (b) how outcomes of interspecific interactions are affected by the context of where and when they occur, and (c) impacts of displacements. ', '2016', 'http://zssom.sysu.edu.cn/NewsContent.aspx?newsid=98121b6a-202a-4050-bff4-92fed6fa207f&typeid=3f165ddf-2fc9-47e3-87cf-5ea733064c25', 'xpected final online publication date for the Annual Review of Entomology Volume 62 is January 07, 2017.'), ('5', 'title', '2016', 'http://www.baidu.com', 'LeCun        '), ('6', 'hehe,title', '2015', 'http://www.qq.com', 'Yan Benggio');
COMMIT;

-- ----------------------------
-- Table structure for conference
-- ----------------------------
DROP TABLE IF EXISTS `conference`;
CREATE TABLE `conference` (
`conf_id`  int(11) NOT NULL ,
`year`  int(11) NULL DEFAULT NULL ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`conference_detail`  varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`conf_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of conference
-- ----------------------------
BEGIN;
INSERT INTO `conference` VALUES ('1', '2016', 'CVPR 2016', '<p>We are announcing the CVPR Industry EXPO 2017, and inviting you and your company to participate!</p>\r\n                              <p>From promising startups and creative standouts to the biggest industry leaders, this expo will be a showcase of companies that are pushing the boundaries of what’s possible with computer vision and machine learning technologies. Following the successful CVPR EXPO 2016, we are providing an exciting “trade-show” like atmosphere to foster maximal visibility and exposure for each on-site exhibitor. It is a unique opportunity for professors, students, researchers, budding entrepreneurs, technologists and others to cross paths and exchange the latest and newest ideas.</p>\r\n                              <p>CVPR EXPO 2017 will run at Hawaii Convention Center in Honolulu next July for the duration of IEEE CVPR, co-locating with the premier academic and technical presentations. Approximately 2,500-3,000 CVPR attendees will create a one-of-a-kind opportunity for networking, recruiting, inspiration and motivation.</p>'), ('2', '2016', '会议2', 'good conference'), ('3', '2016', '会议3', 'another one ?!'), ('4', '2016', '会议4', 'we will talk about this later. 哈哈哈'), ('5', '2015', '会议5', 'I don\'t know what am I doing'), ('6', '2015', '会议6', 'I have been to LA to see KB.'), ('7', '2015', '会议7', 'No one is better than Stephen Curry beyond the three-point line, except Ray Allen.');
COMMIT;

-- ----------------------------
-- Table structure for conference_news
-- ----------------------------
DROP TABLE IF EXISTS `conference_news`;
CREATE TABLE `conference_news` (
`news_id`  int(11) NOT NULL AUTO_INCREMENT ,
`conf_id`  int(11) NULL DEFAULT NULL ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`link`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`news_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=14

;

-- ----------------------------
-- Records of conference_news
-- ----------------------------
BEGIN;
INSERT INTO `conference_news` VALUES ('1', '1', 'CVPR2016 主旨演讲及焦点论文速览，深度学习垄断地位遭质疑', 'http://news.hexun.com/2016-06-30/184666240.html'), ('2', '1', '黑科技涌现 CVPR 2016这是要火的节奏', 'http://www.leiphone.com/news/201606/T8SmRbIWubC36Vyd.html'), ('3', '2', '搞个大新闻', 'http://www.baidu.com'), ('6', '5', '新浪不靠谱，还是上腾讯新闻', 'http://news.qq.com'), ('7', '6', '多读书，多看报', 'http://www.baidu.com'), ('11', '4', '看新闻，就上新浪网', 'http://www.sina.com.cn'), ('12', '4', '看新闻，不要上新浪网', 'http://news.qq.com'), ('13', '3', 'no big news', 'http://www.baidu.com');
COMMIT;

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
`sid`  int(11) NOT NULL ,
`group_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`info`  varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`direction`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`task`  varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`sid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of member
-- ----------------------------
BEGIN;
INSERT INTO `member` VALUES ('1', '主要负责团队', '吴忠道', '吴忠道，男、1962年4月出生、江西人。中共党员、医学博士、教授、博士生导师， 1997年毕业于南京医科大学，获得医学博士学位，同年9月入原中山医科大学基础医学博士后流动站工作。1999年6月出站并留校工作，2001年晋升为教授。1992年12月-1993年7月在美国哈佛大学公共卫生学院进修热带医学。曾在江西省寄生虫病研究所工作。\r\n   现任中山医学院党委书记，寄生虫学教研室主任、蛋白质组学研究实验室副主任，中山大学人类疾病基因组研究所所长。\r\n   主要研究兴趣是“基于组学特征的感染与炎症调节”。主持完成的《日本血吸虫中国大陆株表达基因谱的研究》获得2002年中国高校自然科学二等奖，2003广东省科技进步三等奖。2008年获得中山大学教学名师奖，2010年获得第六届广东省高等教育教学成果奖一等奖。2012年获得宝钢优秀教师奖，2015年获得广东省第七届教学名师奖。现担任教育部医学人文素质教学指导委员会委员、全国高等医学教育学会基础医学教育分会副理事长、广东省本科高校文化素质教育教学指导委员会委员。', '抗感染免疫与免疫调节。', '主持或参与了国家“973”课题、“863”课题、国家传染病重大专项、广东省团队项目等多项科研项目。目前主持 1项“973”课题、3项国家自然科学基金课题。在Nucleic Acids Res，J Infect Dise， PLoS Negl Trop Dis，PLoS ONE，Int J Parasitol，J Biomed Biotechnol， Immunol Res， Parasitol Res， Parasite Immunol等国际专业杂志上发表论文近 100多篇。主持完成的《日本血吸虫中国大陆株表达基因谱的研究》获得2002年中国高校自然科学二等奖，2003广东省科技进步三等奖。'), ('2', '主要负责团队', '肖宁', '肖宁，男，大学教授，著名学者', '微生物学', '发表论文多篇'), ('3', '主要负责团队', '胡薇', '胡薇，女，著名学者', '生态学', '参与多项国家课题'), ('4', '主要负责团队', '陈晓光', '陈晓光，男，学者', '生物学', '在国际注明刊物上发表了很多的论文'), ('5', '团队 A', '成员 1', 'Info 1', 'direction 1', 'task 1'), ('6', '团队 A', '成员 2', 'info 2', 'direction 2`', 'task 2'), ('7', '团队 A', '成员 3', 'info 3', 'direction 3', 'task 3'), ('8', '团队 B', '成员 1', 'info b 1', 'direction b 1', 'task b 1'), ('9', '团队 B', '成员 2', 'info b 2', 'direction b2', 'task b2'), ('10', '团队 B', '成员 3', 'info b3', 'direction b3', 'task b3');
COMMIT;

-- ----------------------------
-- Table structure for member_article
-- ----------------------------
DROP TABLE IF EXISTS `member_article`;
CREATE TABLE `member_article` (
`article_id`  int(11) NOT NULL ,
`member_id`  int(11) NULL DEFAULT NULL ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`link`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`article_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of member_article
-- ----------------------------
BEGIN;
INSERT INTO `member_article` VALUES ('1', '1', '人体寄生虫学', 'http://www.icourses.cn/coursestatic/course_3474.html'), ('2', '1', '中山医学院吴忠道教授', 'http://zssom.sysu.edu.cn/Teacher/TeacherInfo.aspx?level=1&typeid=3490d724-577e-45bb-b6e2-e33cfa1d7ac4&tid=31173a2d-ecd6-49e3-873b-6f59cf5d0862'), ('3', '2', '肖宁', 'http://www.baidu.com'), ('4', '2', 'xiaoning', 'http://www.baidu.com'), ('5', '3', 'huwei', 'http://www.baidu.com'), ('6', '3', 'huwei', 'http://www.baidu.com'), ('7', '4', '陈晓光', 'http://www.baidu.com'), ('8', '4', '陈晓光_2', 'http://www.baidu.com'), ('9', '5', 'A1', 'http://www.baidu.com'), ('10', '6', 'A2', 'http://www.baidu.com'), ('11', '7', 'A3', 'http://www.baidu.com'), ('12', '8', 'B1', 'http://www.baidu.com'), ('13', '9', 'B2', 'http://www.baidu.com'), ('14', '10', 'B3', 'http://www.baidu.com'), ('15', '11', 'C1', 'http://www.baidu.com'), ('16', '12', 'C2', 'http://www.baidu.com'), ('17', '13', 'C3', 'http://www.baidu.com');
COMMIT;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
`news_id`  int(11) NOT NULL ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`content`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`pubDate`  datetime NULL DEFAULT NULL ,
PRIMARY KEY (`news_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of news
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for progress
-- ----------------------------
DROP TABLE IF EXISTS `progress`;
CREATE TABLE `progress` (
`progress_id`  int(11) NOT NULL ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`date`  date NULL DEFAULT NULL ,
`img`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`body`  varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`progress_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of progress
-- ----------------------------
BEGIN;
INSERT INTO `progress` VALUES ('1', '附属三院高志良教授团队发表乙肝治愈标志物研究新成果: 标志着在肝脏病研究方面已进入国际先进行列', '2016-08-05', 'http://news2.sysu.edu.cn/images/content/2016-08/20160805165457964456.jpg', 'what!!!!'), ('2', '附属三院高志良教授团队发表乙肝治愈标志物研究新成果: 标志着在肝脏病研究方面已进入国际先进行列', '2016-08-05', 'http://news2.sysu.edu.cn/images/content/2016-08/20160805165457964456.jpg', 'what!!!!'), ('3', '附属三院高志良教授团队发表乙肝治愈标志物研究新成果: 标志着在肝脏病研究方面已进入国际先进行列', '2016-08-05', 'http://news2.sysu.edu.cn/images/content/2016-08/20160805165457964456.jpg', 'what!!!!'), ('4', '附属三院高志良教授团队发表乙肝治愈标志物研究新成果: 标志着在肝脏病研究方面已进入国际先进行列', '2016-08-05', 'http://news2.sysu.edu.cn/images/content/2016-08/20160805165457964456.jpg', 'what!!!!'), ('5', '附属三院高志良教授团队发表乙肝治愈标志物研究新成果: 标志着在肝脏病研究方面已进入国际先进行列', '2016-08-05', 'http://news2.sysu.edu.cn/images/content/2016-08/20160805165457964456.jpg', 'what!!!!'), ('6', '附属三院高志良教授团队发表乙肝治愈标志物研究新成果: 标志着在肝脏病研究方面已进入国际先进行列', '2016-08-05', 'http://news2.sysu.edu.cn/images/content/2016-08/20160805165457964456.jpg', 'what!!!!'), ('7', '附属三院高志良教授团队发表乙肝治愈标志物研究新成果: 标志着在肝脏病研究方面已进入国际先进行列', '2016-08-05', 'http://news2.sysu.edu.cn/images/content/2016-08/20160805165457964456.jpg', 'what!!!!'), ('8', '附属三院高志良教授团队发表乙肝治愈标志物研究新成果: 标志着在肝脏病研究方面已进入国际先进行列', '2016-08-05', 'http://news2.sysu.edu.cn/images/content/2016-08/20160805165457964456.jpg', 'what!!!!');
COMMIT;

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
`project_id`  int(11) NOT NULL ,
`speciesName`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`intro`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`progress`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`related`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`info`  varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`img`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`para`  varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`project_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of project
-- ----------------------------
BEGIN;
INSERT INTO `project` VALUES ('1', '螺', '螺', 'hehe', '目前项目已经完成DNA90%的测序工作。', null, '藁杆双脐螺（学名：Biomphalaria straminea）为扁蜷螺科双脐螺属的动物。分布于巴西以及中国大陆的香港、深圳等地，一般生活于池塘、小水渠以及水流较缓的河流沿岸。', 'http://a.hiphotos.baidu.com/baike/w%3D268%3Bg%3D0/sign=e03e224e033b5bb5bed727f80ee8b204/b7fd5266d0160924631281fed40735fae6cd341b.jpg', 'hehe'), ('2', '螺', '福寿螺', '你好呀', '目前项目已经完成DNA88%的测序工作。', null, null, null, 'hehe'), ('3', '螺', '褐云玛瑙螺', null, '目前项目已经完成DNA70%的测序工作。mamam', null, null, null, null), ('4', '蚊蝶', '白纹伊蚊', null, '目前项目已经完成DNA60%的测序工作。', null, null, null, null), ('5', '蚊蝶', '埃及伊蚊', null, '还没开始', null, null, null, null), ('6', '病原体', '锥虫', null, '已经搞定', null, null, null, null), ('7', '病原体', '疟原虫', null, '测完了', null, null, null, null), ('8', '病原体', '血吸虫', null, '恩', null, null, null, null);
COMMIT;

-- ----------------------------
-- Table structure for project_article
-- ----------------------------
DROP TABLE IF EXISTS `project_article`;
CREATE TABLE `project_article` (
`article_id`  int(11) NOT NULL ,
`project_id`  int(11) NULL DEFAULT NULL ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`link`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`article_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of project_article
-- ----------------------------
BEGIN;
INSERT INTO `project_article` VALUES ('1', '1', '新区监测点今年未发现双脐螺', 'http://www.sina.com.cn'), ('2', '1', '小心，双脐螺出没大学城', 'http://www.sina.com.cn');
COMMIT;

-- ----------------------------
-- Table structure for project_paper
-- ----------------------------
DROP TABLE IF EXISTS `project_paper`;
CREATE TABLE `project_paper` (
`paper_id`  int(11) NOT NULL ,
`project_id`  int(11) NULL DEFAULT NULL ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`link`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`paper_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of project_paper
-- ----------------------------
BEGIN;
INSERT INTO `project_paper` VALUES ('1', '1', '深圳市曼氏血吸虫中间宿主藁杆双脐螺的调查分析,潘世定，陈佩玑，容寿铭，刘杰生，王洁坤，...', 'http://www.sina.com.cn'), ('2', '1', '藁杆双脐螺在中国内陆的分布现状与传病风险,黄少玉，张启明，李晓恒，卓晖', 'http://www.sina.com.cn'), ('3', '1', '曼氏血吸虫中间宿主——藁杆双脐螺Biomphalaria straminea(Dunker)在我国的发现,刘月英，王耀先，张文珍', 'http://www.sina.com.cn');
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
`session_id`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`datetime`  datetime NOT NULL ,
PRIMARY KEY (`session_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
INSERT INTO `sessions` VALUES ('21d334d6-38f4-4169-b52c-e1f027ce1370', '2016-11-28 19:36:16'), ('5b3f47c0-fa7b-49b8-ab2d-d3514897467b', '2016-11-28 19:32:48'), ('5e83485f-3669-4f1a-b01b-a3186bae7683', '2016-11-28 21:00:46'), ('64f89adb-dc19-40f2-bdb7-fda73a61204c', '2016-11-27 21:41:06'), ('7c1b8f67-a747-4866-abe2-7c830e92cf1b', '2016-11-28 19:47:06'), ('a47d1124-ceb5-4975-a422-419376493b74', '2016-11-28 19:29:19'), ('a557b1b7-39d1-4d83-985f-af1f5e0af55f', '2016-11-28 19:27:26'), ('b3743c83-860a-4973-9088-a36f93dece5b', '2016-11-28 21:00:43');
COMMIT;

-- ----------------------------
-- Table structure for team
-- ----------------------------
DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
`team_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`intro`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`research`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`topic`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`paperlist`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`papers`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`team_name`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of team
-- ----------------------------
BEGIN;
INSERT INTO `team` VALUES ('主要负责团队', '网站主要负责团队!', null, null, null, null), ('团队A', '这是团队A！', null, null, null, null);
COMMIT;

-- ----------------------------
-- Table structure for tools
-- ----------------------------
DROP TABLE IF EXISTS `tools`;
CREATE TABLE `tools` (
`tools_id`  int(11) NULL DEFAULT NULL ,
`sid`  int(11) NULL DEFAULT NULL ,
`title`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`link`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tools
-- ----------------------------
BEGIN;
INSERT INTO `tools` VALUES ('1', '1', 'mnist', 'http://yann.lecun.com/exdb/mnist/'), ('2', '1', 'Google House Numbers from Steet View', 'http://ufldl.stanford.edu/housenumbers/'), ('3', '2', 'CIFAR-10', 'http://www.cs.toronto.edu/~kriz/cifar.html'), ('4', '2', 'ImageNet', 'http://www.image-net.org/'), ('5', '3', 'Microsoft COCO', 'http://mscoco.org/home/'), ('6', '3', 'Flickr Data', 'http://yahoolabs.tumblr.com/post/89783581601/one-hundred-million-creative-commons-flickr-images');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
`user_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`password`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`tel`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type`  int(11) NOT NULL ,
`team_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`is_checked`  int(1) NOT NULL ,
PRIMARY KEY (`user_name`),
FOREIGN KEY (`team_name`) REFERENCES `team` (`team_name`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `team_id` (`team_name`) USING BTREE ,
INDEX `team_name` (`team_name`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('admin', '管理员', 'pbkdf2:sha1:1000$56tTCEfq$3fb1fd73f1e114b25d77fc770ec6d37471f7c649', 'admin@qq.com', '10086', '2', null, '1'), ('ddd', 'ddd', 'pbkdf2:sha1:1000$Qbd7wT9W$ba19cbee7e5bb6c8b072650aebd67a4ad2142986', 'd', 'a', '0', '主要负责团队', '1'), ('ee', 'ee', 'pbkdf2:sha1:1000$DZv1oGG6$122febbd39c31ec3ed8c9630a1ddbeab477bb3d5', 'ee', 'ee', '1', '团队A', '0'), ('super_admin', '超级管理员', 'pbkdf2:sha1:1000$s5MH1Wsd$c2f1df2a2e532bd5d224ec1f3b224f0f698505b2', 'super_admin@qq.com', '10000', '3', null, '1'), ('test3', 'test3', 'pbkdf2:sha1:1000$yRtcFM2n$b0c280f934bd9d7fcf9f5377baaeece9d44526d7', 'test3@qq.com', '120', '0', '主要负责团队', '1'), ('zhs', 'zhs', 'halfish', '123@qq.com', '110', '0', '主要负责团队', '0'), ('测试用户', '测试', 'pbkdf2:sha1:1000$CLttbQox$7bc2e8122d7d6b5d72a079543e48a34dd103342b', '22@qq.com', '22', '0', '主要负责团队', '1');
COMMIT;

-- ----------------------------
-- Auto increment value for article
-- ----------------------------
ALTER TABLE `article` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for conference_news
-- ----------------------------
ALTER TABLE `conference_news` AUTO_INCREMENT=14;
SET FOREIGN_KEY_CHECKS=1;
