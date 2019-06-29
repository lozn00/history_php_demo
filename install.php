<?php 
if(file_exists('config1.php')){
exit("<font color=red>本程序由情迁制作，如果您想要本初学者程序，请加QQ694886526,管理员请删除config1.php文件，再进行安装</font>");}
?>
<html><head><title>情迁个人发布系统</title>
<body>
<?php
if(!$_POST['submit'])
{
echo"<form method='post' action='install.php'>
数据库地址<br/>
<input type='text' name='sqladdress' value='localhost'/><br/>
数据库名<br/>
<input type='text' name='databasename' value=''><br/>
用户名<br/>
<input type='text' name='username' value=''/><br/>
密码<br/>
<input type='password' name='databasepassword' value=''/><br/>
<input type='submit' name='submit' value='安装'></form>
<div class='a'>该程序由<a href='http://mrphj.com'>blackworld</a>开发，您可以在不侵犯作者版权的情况下免费使用该程序。当您使用该程序，就默认了该程序可能带来的一切风险</div>";
}
?>
<?php
if($_POST['submit'])
{
$sqladdress=$_POST['sqladdress'];
$username=$_POST['username'];
$databasepassword=$_POST['databasepassword'];
$databasename=$_POST['databasename'];
$config='<?php 
$sqladdress="'.$sqladdress.'";$username="'.$username.'";$databasepassword="'.$databasepassword.'";$databasename="'.$databasename.'";?>';
$ok=file_put_contents('config1.php',$config);//写入链接数据库的文件
require'config.php';
$sql="CREATE TABLE `zheng` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `dates` date default NULL,
  `contents` text,
  `hits` int(11) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=gbk;";
mysql_query($sql);
$create1="CREATE TABLE `zheng_user` (
  `userid` int(6) NOT NULL auto_increment,
  `username` varchar(10) NOT NULL,
  `userpwd` varchar(20) NOT NULL,
  `useremail` varchar(30) default NULL,
  `userphone` varchar(11) default NULL,
  `userinfo` text,
  `usersex` varchar(1) default NULL,
  `nickname` varchar(20) default NULL,
  `usersid` varchar(50) default NULL,
  `garde` varchar(50) default NULL,
  PRIMARY KEY  (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;";

mysql_query($create1);
echo '表单zheng发布表单创建成功，程序安装成功';
$guanli="INSERT INTO `zheng_user` 
VALUES ('1', 'admin', '123456', 'mrphj@mrphj.com', '15576334267', '我来自湖南', '男', '情随事迁', '17c8752748d5b9689203e2da7fe72c73')";
mysql_query($guanli);
$guanli="INSERT INTO `zheng_user` 
VALUES ('10', 'mrphj', 'mrphjcom', '694886526@qq.com', '13262274631', '我是情迁', '男', '情迁', null)";
mysql_query($guanli);
$guanli="insert into `zheng`(`id`,`title`,`dates`,`contents`)
values(null,'安装程序成功！',now(),'情迁QQ 694886526 手机 15576334267')";
mysql_query($guanli);
$user_sql="SELECT * from zheng_user where userid='1' or username='admin'";
$run_sql=mysql_query($user_sql);//查询用户数据sql命令。
$shuzu_sid=mysql_fetch_array($run_sql);//获取参数判断是否插入数据成功了
if($shuzu_sid['userpwd']!=""||$shuzu_sid['userid']!="")
{
echo "创建用户表成功，管理账号为：admin,密码为123456<br>";
}
else
{echo "创建表或插入用户数据失败，请删除配置文件config1.php然后重新安装<br>";
}
$zheng_sql="SELECT * from zheng";
$r_sql=mysql_query($zheng_sql);//查询用户数据sql命令。
$zheng1_sid=mysql_fetch_array($r_sql);//获取参数判断是否插入数据成功了
if($zheng1_sid['id']!=""||$zheng1_sid['title']!="")
{
echo "创建信息表成功,文章插入测试成功";
}
else
{echo "创建信息表或插入信息数据失败，请删除配置文件config1.php然后重新安装";
}
}
?>