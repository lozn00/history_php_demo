<?php require'top.php';?>
<?php
include("config.php");//�����������ݿ�
if(!empty($_POST['login']))
{
$check_sql="SELECT * FROM zheng_user  WHERE userpwd='".$_POST['userpwd']."' and username='".$_POST['username']."'";
$check=mysql_query($check_sql);
$check_value=mysql_fetch_array($check);
//print_r($check_value);
if($_POST['userpwd']==$check_value['userpwd']&&!empty($_POST['username'])&&!empty($_POST['userpwd']))
   {
$usersid=md5($_POST["userpwd"].time());
$userid=$check_value["userid"];
$up_sid="update zheng_user set usersid='".$usersid."' where userid='".$check_value['userid']."'";
mysql_query($up_sid);
echo "��½�ɹ�";
echo "3����Զ���ת��ָ��ҳ��<br>";

if($check_value['garde']=="1")
{

echo "<meta http-equiv='refresh' content='3;url=manger.php?userid=".$userid."&usersid=".$usersid."'>";
echo "<a href='manger.php?userid=".$userid."&usersid=".$usersid."'>�Ȳ����ˣ����Ͻ����̨</a>";
}//Ȩ��lese
else
{
echo "<meta http-equiv='refresh' content='3;url=index.php?userid=".$userid."&usersid=".$usersid."'>";
echo "<a href='index.php?userid=".$userid."&usersid=".$usersid."'>�Ȳ����ˣ����Ͻ�����ҳ</a>";
}

}
else
  {
  echo "��½ʧ�ܣ��û������������<hr>";
  }

}

?>
<form action="" method="post">
<table width=100% border="1" align="center" cellpadding="0" cellspacing="0"  bordercolor="#00FF00">
<tr><td>�û����ƣ�<input name="username" type="text" id="name" value="admin" maxlength="15" size="30"></tr></td>
<tr><td>�û����룺<input name="userpwd" type="password" value="" maxlength="15" size="33"></tr></td>
<tr bgcolor="FFFFF0"><td><input type="submit" name="login" value="��½�û�"></tr></td></form>
<?php include("foot.php");?>
