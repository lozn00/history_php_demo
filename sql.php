<?Php
include('config.php');
require'config.php';
require'config1.php';
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
  PRIMARY KEY  (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;";

mysql_query($create1);
echo '��zheng�����������ɹ�������װ�ɹ�';
$guanli="INSERT INTO `zheng_user` 
VALUES ('1', 'admin', '123456', 'mrphj@mrphj.com', '15576334267', '�����Ժ���', '��', '������Ǩ', '17c8752748d5b9689203e2da7fe72c73')";
mysql_query($guanli);
$guanli="INSERT INTO `zheng_user` 
VALUES ('10', 'mrphj', 'mrphjcom', '694886526@qq.com', '13262274631', '������Ǩ', '��', '��Ǩ', null)";
mysql_query($guanli);
$guanli="insert into `zheng`(`id`,`title`,`dates`,`contents`)
values(null,'��װ����ɹ���',now(),'��ǨQQ 694886526 �ֻ� 15576334267')";
mysql_query($guanli);
$user_sql="SELECT * from zheng_user where userid='1' or username='admin'";
$run_sql=mysql_query($user_sql);//��ѯ�û�����sql���
$shuzu_sid=mysql_fetch_array($run_sql);//��ȡ�����ж��Ƿ�������ݳɹ���
if($shuzu_sid['userpwd']!=""||$shuzu_sid['userid']!="")
{
echo "�����û���ɹ��������˺�Ϊ��admin,����Ϊ123456<br>";
}
else
{echo "�����������û�����ʧ�ܣ���ɾ�������ļ�config1.phpȻ�����°�װ<br>";
}
$zheng_sql="SELECT * from zheng";
$r_sql=mysql_query($zheng_sql);//��ѯ�û�����sql���
$zheng1_sid=mysql_fetch_array($r_sql);//��ȡ�����ж��Ƿ�������ݳɹ���
if($zheng1_sid['id']!=""||$zheng1_sid['title']!="")
{
echo "������Ϣ��ɹ�,���²�����Գɹ�";
}
else
{echo "������Ϣ��������Ϣ����ʧ�ܣ���ɾ�������ļ�config1.phpȻ�����°�װ";
}
?>