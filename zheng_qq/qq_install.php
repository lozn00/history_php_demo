
<?php

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
$create1="CREATE TABLE `qqreg` (
`id` int(5) NOT NULL auto_increment,
  `qq` varchar(50) default NULL,
  `dates` date default NULL,
  `contents` text,
  `hits` int(11) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;";

mysql_query($create1);

$guanli="insert into `qqreg`(`id`,`qq`,`dates`,`contents`)
values(null,'35068264',now(),'2000')";
mysql_query($guanli);
$user_sql="SELECT * from zheng_user where userid='1' or username='admin'";
$run_sql=mysql_query($user_sql);//查询用户数据sql命令。
$shuzu_sid=mysql_fetch_array($run_sql);//获取参数判断是否插入数据成功了
if($shuzu_sid['userpwd']!=""||$shuzu_sid['userid']!="")
{
echo "创建用户表成功，<br>";
}
else
{echo "创建表或插入用户数据失败，请删除配置文件config1.php然后重新安装<br>";
}

?>