<?php
include("config.php");//�����������ݿ�
if(!empty($_GET['password']))
{

 if($_GET['password']=="love")
 {

if(!empty($_GET['id']))//�õ����ݹ����Ĳ���$_GET�﷨
{
$sql="select * from `qqreg` where `id`='".$_GET['id']."'";//id��ͨ�����ݹ����ġ�
//��sql��ѯ�����ݿ���������ͨͨ��`����tab�����Ǹ���
$query=mysql_query($sql);//ִ��sql���
$rs=mysql_fetch_array($query);//��ԴתΪ���飬�����������±��⡢����id���������ݵȡ�
//print_r($rs);//��ʾ������ϸ��Ϣ
//Function name must be a string in ���������ǰ��$�ͻᱨ���ƴ���
}
else
{
echo "�޸ĳɹ�!";
}
if(!empty($_POST['sub']))//���û�ύû��ֵ�ᱨ�����ԼӸ��ж�sub����������е�sub��ť
{
$qq=$_POST['qq'];
$con=$_POST['con'];
$hid=$_POST['hid'];
$shuoming=$_POST['shuoming'];
$sql="update `qqreg`set `qq`='$qq',`contents`='$con',`shuoming`='$shuoming' where `id`='$hid' limit 1";
//���еı���ͨ������name����������Ȼ��ͨ�����ݿ��﷨��ĳЩ��������limitΪ�˷�ֹ��ȫ�����ֻ����1�� 
mysql_query($sql);
ECHO "��������Ϊ��<br>";
echo "�޸ĳɹ���";

echo "<a href='qqedit.php?password=".$_GET['password']."'>���غ�̨</a>";
//echo "<script>location.href='manger.php?userid=".$userid."&usersid=".$usersid."'</script>";
//echo "<script>alert('���³ɹ�');location.href='manger.php?userid=".$userid."&usersid=".$usersid."'</script>";
//alert��������ϵͳ��Ϣ����ʾ��location��Ϊ��ת����
}

print <<< yes
<form action="#" method="post">
<input type="hidden" name="hid" value="
yes;
echo $rs['id'];
print <<< yes1
">
����<input type="text" name="qq" value="
yes1;
echo $rs['qq'];
print <<< yes2
"><br>
״̬<input type="text" name="con" value="
yes2;
echo $rs['contents'];
print <<< yes3
"><br>
˵��<textarea rows="5" cols="50" name="shuoming">
yes3;
echo $rs['shuoming'];
print <<< yes4
</textarea><br>
<input type="submit" name="sub" value="�޸�">
</form>
yes4;
 }
 else
 {
 echo "sid��id������ʧЧ/��û��Ȩ���޸ġ�";}
}
else
{
echo "���������������µ�½qqedit.php?password=</a>";
}
?>

