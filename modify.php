<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="00ff00">
<?php
include("config.php");//�����������ݿ�
if(!empty($_GET['userid'])&&!empty($_GET['usersid']))
{
$user_sql="SELECT * from zheng_user WHERE username='admin' and usersid='".$_GET['usersid']."'";
$run_sql=mysql_query($user_sql);//ִ��sql���
$shuzu_sid=mysql_fetch_array($run_sql);//��ԴתΪ���飬��ʾ��ϸ������Ϣ��
//print_r($shuzu_sid);�鿴������Ϣ
 if($_GET['userid']==$shuzu_sid['userid'] && $_GET['usersid']==$shuzu_sid['usersid'] && $shuzu_sid['garde']="1")
 {
 echo "<tr bgcolor=#green><td>��ӭ�㵽��½�ҵĵ���</td></tr>";
echo "<tr><td>�ҵ�ID:".$shuzu_sid["userid"]."</td></tr>";
echo "<tr><td>�û���:".$shuzu_sid["username"]."</td></tr>";
echo "<tr><td>�ҵ��ǳ�:".$shuzu_sid["nickname"]."</td></tr>";
if(!empty($_GET['id']))//�õ����ݹ����Ĳ���$_GET�﷨
{
$sql="select * from `zheng` where `id`='".$_GET['id']."'";//id��ͨ�����ݹ����ġ�
//��sql��ѯ�����ݿ���������ͨͨ��`����tab�����Ǹ���
$query=mysql_query($sql);//ִ��sql���
$rs=mysql_fetch_array($query);//��ԴתΪ���飬�����������±��⡢����id���������ݵȡ�
//print_r($rs);//��ʾ������ϸ��Ϣ
//Function name must be a string in ���������ǰ��$�ͻᱨ���ƴ���
}
else
{
echo "<tr><td>�޸ĳɹ�!</td></tr>";
}
if(!empty($_POST['sub']))//���û�ύû��ֵ�ᱨ�����ԼӸ��ж�sub����������е�sub��ť
{
$title=$_POST['title'];
$con=$_POST['con'];
$hid=$_POST['hid'];
$sql="update `zheng`set `title`='$title',`contents`='$con' where `id`='$hid' limit 1";
//���еı���ͨ������name����������Ȼ��ͨ�����ݿ��﷨��ĳЩ��������limitΪ�˷�ֹ��ȫ�����ֻ����1��
mysql_query($sql);
echo "<tr><td>�޸ĳɹ���";
echo  "<br><a href='view.php?id=".$_GET['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid']."'>�鿴���º�����ݣ�</a>";
//echo "-<a href='manger.php?userid=".$_GET['userid']."&usersid=".$_GET['usersid']."'>���غ�̨</a>";
//echo "<script>location.href='manger.php?userid=".$userid."&usersid=".$usersid."'</script>";
//echo "<script>alert('���³ɹ�');location.href='manger.php?userid=".$userid."&usersid=".$usersid."'</script>";
//alert��������ϵͳ��Ϣ����ʾ��location��Ϊ��ת����

}
$str="<form action=modify.php?id=".$_GET['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid'];
echo $str;
print <<< yes
 method="post">
<input type="hidden" name="hid" value="
yes;
echo $rs['id'];
print <<< yes1
">
<tr><td>����<input type="text" name="title" size="80" value="
yes1;
echo $rs['title'];
print <<< yes2
"></td></tr>
<tr><td>����<textarea rows="30" cols="120" name="con">
yes2;
echo $rs['contents'];
print <<< yes3
</textarea></td></tr>
<tr><td><input type="submit" name="sub" value="�޸�"></td></tr>
</form>
yes3;
 }
 else
 {
 echo "<tr><td>sid��id������ʧЧ/��û��Ȩ���޸ġ�</td></tr>";}
}
else
{
echo "<tr><td>sid�����û�id����Ϊ�գ�����<a href='admin.php'>���µ�½</a></td></tr>";
}
?>
<hr>
<?php require'foot.php';?>