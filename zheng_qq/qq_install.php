
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
$run_sql=mysql_query($user_sql);//��ѯ�û�����sql���
$shuzu_sid=mysql_fetch_array($run_sql);//��ȡ�����ж��Ƿ�������ݳɹ���
if($shuzu_sid['userpwd']!=""||$shuzu_sid['userid']!="")
{
echo "�����û���ɹ���<br>";
}
else
{echo "�����������û�����ʧ�ܣ���ɾ�������ļ�config1.phpȻ�����°�װ<br>";
}

?>