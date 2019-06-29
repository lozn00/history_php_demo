<?php require'top.php';?>
<table width=100% border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
<?php
include("config.php");//����t����ݿ�
if(!empty($_GET['userid'])&&!empty($_GET['usersid'])&&!empty($_GET['del']))
{
$user_sql="SELECT * from zheng_user WHERE userid='1' and usersid='".$_GET['usersid']."'";
$run_sql=mysql_query($user_sql);//ִ��sql���
$shuzu_sid=mysql_fetch_array($run_sql);//��ԴתΪ���飬��ʾ��ϸ������Ϣ��
//print_r($shuzu_sid);�鿴������Ϣ
 if($_GET['userid']==$shuzu_sid['userid'] && $_GET['usersid']==$shuzu_sid['usersid'] && $shuzu_sid['garde']="1")
 {
 echo "��ӭ�㵽��½�ҵĵ���";
echo "<br>�ҵ��ǳ�:".$shuzu_sid["nickname"];
$d=$_GET['del'];
$sql="delete from `zheng` where `id`='$d'";
mysql_query($sql);

echo "<tr><td>ɾ��ɹ���</td></tr>";
 }
 else
 {echo "<tr><td>sid��id������ʧЧ����û��Ȩ�޹��?�����µ�½��</td></tr>";}
}
else
{
echo "<tr><td>sid�����û�id����Ϊ�գ���<a href='admin.php'>���µ�½</a></td></tr>";
}
/* echo "<hr><a href='index.php'>����ǰ̨</a>";
echo "-<a href='manger.php?userid=".$userid."&usersid=".$usersid."'>���غ�̨</a>"; */
?>
</table>
<?php require'foot.php';?>