<?php
include("../config.php");//�����������ݿ�
if(!empty($_GET['qq']))//�õ����ݹ����Ĳ���$_GET�﷨
{
$sql="select * from `qqreg` where `qq`='".$_GET['qq']."'";//id��ͨ�����ݹ����ġ�
//��sql��ѯ�����ݿ���������ͨͨ��`����tab�����Ǹ���
$query=mysql_query($sql);//ִ��sql���
$rs=mysql_fetch_array($query);//��ԴתΪ���飬�����������±��⡢����id���������ݵȡ�
//print_r($rs);//��ʾ������ϸ��Ϣ
     if($rs['qq']==null)
   {
$mode="/[^[0-9]/";//ƥ�������ַ�
$zifu=$_GET['qq'];
if(preg_match ($mode,$zifu,$shuzu))
{
echo "�������󣬰�����ĸ���������ַ���";	//echo "ƥ��ɹ���".$shuzu[0]; Ҫ������ڣ��޸ģ�
print_r($arr);}
else
{       if($_GET['qq']>1000000 && $_GET['qq']<100000000000)//���С��7λ��˵���ǷǷ�������
   //������ĸ���в��룬���Ҫ����ƥ��
   {
               	 //����Ͳ�����Ŀ
 $qq=$_GET['qq'];
    $sql="insert into `qqreg`(`id`,`qq`,`dates`,`contents`,`shuoming`)
   values(null,'$qq',now(),'2000','autoadd_noreg_qq694886526')";
     mysql_query($sql);//ִ��sql
      echo $rs['contents'];
   }

   else
   {echo "too long or too short???????";}


}



}//����Ѿ������ˣ���ô��Ҫ�����жϲ���
else
{
$mode="/auto/";//ƥ�������ַ�
$zifu=$rs['shuoming'];
if(preg_match ($mode,$zifu,$shuzu))
{

if($rs['hits']>15 && $rs['contents']!=15)//����ֻ��ʹ��15��
             {

	$sqlhit="update `qqreg` set shuoming='autoadd_noreg_qq694886526����ʹ�����ƣ�����ϵ����',contents='15' where `qq`='".$_GET['qq']."'";
mysql_query($sqlhit);//�ۼӼ���ʹ����}



echo "check you qqrobot use time over ��ǰ".$rs['hits'].",please add qq9694486526,you qq canot no register";
	//echo "ƥ��ɹ���".$shuzu[0]; Ҫ������ڣ��޸ģ�
print_r($arr);}
}

echo $rs['contents'];


//������ʽ��u����utf-8��!�����sƥ��ȫ�����ǵ���


$sqlhit="update `qqreg` set hits=hits+1 where `qq`='".$_GET['qq']."'";
mysql_query($sqlhit);//�ۼӼ���ʹ����

}



//Function name must be a string in ���������ǰ��$�ͻᱨ���ƴ���

}
else
{echo "����δ����";}
?>