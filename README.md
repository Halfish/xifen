# 系分（xifen）
系统分析大作业，六人组小组作业

## 服务器：
代码见 web_server 文件夹

|框架|硬件|IP和端口|测试|
|:-:|:-:|:-:|:-:|:-:|
|使用 Flask 框架搭建|CIS 实验室 TITAN 机器|172.18.217.250:5000|http://172.18.217.250:5000/get_project?sid=1|

## 前端
代码见 webpage 文件夹，用了 Apache 服务器，使用 xampp 提供服务

本地启动后从 [http://localhost/xifen/webpage](http://localhost/xifen/webpage) 进入首页

## 数据库
数据库文件备份在 ./database/research_platform_db.sql 中，可以按照下面的命令恢复
```mysql
# enter into mysql command line
mysql> create database research_platform;
```

```shell
mysql -u root -p research_platform < research_platform_db.sql
```
