<?php
include("config.php");//�����������ݿ�
if(!empty($_GET['qq']))//�õ����ݹ����Ĳ���$_GET�﷨
{
$sql="select * from `qqreg` where `qq`='".$_GET['qq']."'";//id��ͨ�����ݹ����ġ�
//��sql��ѯ�����ݿ���������ͨͨ��`����tab�����Ǹ���
$query=mysql_query($sql);//ִ��sql���
$rs=mysql_fetch_array($query);//��ԴתΪ���飬�����������±��⡢����id���������ݵȡ�
//print_r($rs);//��ʾ������ϸ��Ϣ
     if($rs['qq']==null)
   {
$qq=$_GET['qq'];
$sql="insert into `qqreg`(`id`,`qq`,`dates`,`contents`)
values(null,'$qq',now(),'2000')";
mysql_query($sql);//ִ��sql
echo "����ɹ���";
     }
else
{ echo $rs['contents'];
$sqlhit="update `qqreg` set hits=hits+1 where `qq`='".$_GET['qq']."'";
mysql_query($sqlhit);//

}



//Function name must be a string in ���������ǰ��$�ͻᱨ���ƴ���

}
else
{echo "����δ����";}
?>