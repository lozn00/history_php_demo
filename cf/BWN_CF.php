<?php
include("../config.php");//�����������ݿ�
if(!empty($_GET['id']))//�õ����ݹ����Ĳ���$_GET�﷨
{
$sql="select * from `qqreg` where `qq`='".$_GET['id']."'";//id��ͨ�����ݹ����ġ�
//��sql��ѯ�����ݿ���������ͨͨ��`����tab�����Ǹ���
$query=mysql_query($sql);//ִ��sql���
$rs=mysql_fetch_array($query);//��ԴתΪ���飬�����������±��⡢����id���������ݵȡ�
//print_r($rs);//��ʾ������ϸ��Ϣ
     if($rs['id']==null)
   {
$mode="/[^[0-9]/";//ƥ�������ַ�
$zifu=$_GET['id'];
if(preg_match ($mode,$zifu,$shuzu))
{
echo "�������󣬰�����ĸ���������ַ���";	//echo "ƥ��ɹ���".$shuzu[0]; Ҫ������ڣ��޸ģ�
print_r($arr);}
else
{       if($_GET['id']>100 && $_GET['id']<10000000000000)//���С��λ��˵���ǷǷ�������
   //������ĸ���в��룬���Ҫ����ƥ��
   {
               	 //����Ͳ�����Ŀ
 $qq=$_GET['id'];
    $sql="insert into `qqreg`(`id`,`qq`,`dates`,`contents`,`shuoming`)
   values(null,'$qq',now(),'2000','BWN_CF reg')";
     mysql_query($sql);//ִ��sql
      echo $rs['contents']."hello world";
   }

   else
   {echo "too long or too short???????";
   return;
   }


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
echo $rs['hits']."��Ǩ����";
	//$sqlhit="update `qqreg` set shuoming='autoadd_noreg_qq694886526����ʹ�����ƣ�����ϵ����' where `qq`='".$_GET['id']."'";
//mysql_query($sqlhit);//�ۼӼ���ʹ����}



echo "check you qqrobot use time over ��ǰ".$rs['hits'].",please add qq9694486526,you qq canot no register";
	//echo "ƥ��ɹ���".$shuzu[0]; Ҫ������ڣ��޸ģ�
print_r($arr);}
}

echo $rs['contents'];


//������ʽ��u����utf-8��!�����sƥ��ȫ�����ǵ���


$sqlhit="update `qqreg` set hits=hits+1,contents=".date('Y-m-j')." where `qq`='".$_GET['id']."'";
mysql_query($sqlhit);//�ۼӼ���ʹ����

}



//Function name must be a string in ���������ǰ��$�ͻᱨ���ƴ���

}
else
{echo "��Ǩ����";}
?>