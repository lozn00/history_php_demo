<?php require'top.php';?>
<?php
include("config.php");//引用链接数据库
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
echo "登陆成功";
echo "3秒后自动跳转到指定页面<br>";

if($check_value['garde']=="1")
{

echo "<meta http-equiv='refresh' content='3;url=manger.php?userid=".$userid."&usersid=".$usersid."'>";
echo "<a href='manger.php?userid=".$userid."&usersid=".$usersid."'>等不及了，马上进入后台</a>";
}//权限lese
else
{
echo "<meta http-equiv='refresh' content='3;url=index.php?userid=".$userid."&usersid=".$usersid."'>";
echo "<a href='index.php?userid=".$userid."&usersid=".$usersid."'>等不及了，马上进入首页</a>";
}

}
else
  {
  echo "登陆失败，用户名或密码错误<hr>";
  }

}

?>
<form action="" method="post">
<table width=100% border="1" align="center" cellpadding="0" cellspacing="0"  bordercolor="#00FF00">
<tr><td>用户名称：<input name="username" type="text" id="name" value="admin" maxlength="15" size="30"></tr></td>
<tr><td>用户密码：<input name="userpwd" type="password" value="" maxlength="15" size="33"></tr></td>
<tr bgcolor="FFFFF0"><td><input type="submit" name="login" value="登陆用户"></tr></td></form>
<?php include("foot.php");?>
