<?php require'top.php';?>
<table border="1" align="center" bordercolor="00ff00" cellpadding="5" cellspacing="0" width="100%">
<?php
include("config.php");//�����������ݿ�

if(!empty($_GET['userid'])&&!empty($_GET['usersid']))
{
$user_sql="SELECT * from zheng_user WHERE userid='1' and usersid='".$_GET['usersid']."'";
$run_sql=mysql_query($user_sql);//ִ��sql���
$shuzu_sid=mysql_fetch_array($run_sql);//��ԴתΪ���飬��ʾ��ϸ������Ϣ��
//print_r($shuzu_sid);�鿴������Ϣ
 if($_GET['userid']==$shuzu_sid['userid'] && $_GET['usersid']==$shuzu_sid['usersid'] && $shuzu_sid['garde']="1")
 {
echo "<tr><td>�ҵ��ǳ�:".$shuzu_sid["nickname"]."</td></tr>";
if(!empty($_POST['sub']))//���û�ύû��ֵ�ᱨ�����ԼӸ��ж�sub����������е�sub��ť
{
$title=$_POST['title'];
$con=$_POST['con'];
$sql="insert into `zheng`(`id`,`title`,`dates`,`contents`)
values(null,'$title',now(),'$con')";
mysql_query($sql);
ECHO "<tr><td>����ɹ�</td></tr>";
//unset($_POST);
}
else
{echo "<tr bgcolor=#green><td>����д����</td></tr>";
}
/* print <<< yes2
<form action="#" method="post">
����<input type="text" name="title"></td></tr>
����<textarea rows="5" cols="50" name="con"></textarea></td></tr>
<input type="submit" name="sub" value="����"></td></tr>
</form>
<hr>
<a href="index.php">������ҳ</a>
yes2; */
 }
 else
 {echo "<tr><td>sid��id������ʧЧ�������µ�½��</td></tr>";}
}
else
 {echo "<tr><td>�Ƿ�������û�л�ȡ���û�idֵsidֵ����<a href='admin.php'>���µ�½</a></td></tr>";}

?>
<form action="<?php
echo "add.php?userid=".@$shuzu_sid["userid"]."&usersid=".@$shuzu_sid["usersid"];?>" method="post">
 <tr bgcolor="#green"><td>����<input type="text" name="title" size="80"></td></tr>
 <tr bgcolor="white"><td>����<br><textarea rows="30" cols=135 name="con"></textarea></td></tr>
 <tr bgcolor="white"><td><input type="submit" name="sub" value="���"></td></tr>
</form>
</table>
<?php require'foot.php';?>