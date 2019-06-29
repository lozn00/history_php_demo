
<?php
include("config.php");//引用链接数据库
if(!empty($_GET['password']))
{

 if($_GET['password']=="love")
 {
$d=$_GET['del'];
$sql="delete from `qqreg` where `id`='$d'";
mysql_query($sql);
echo "删除成功！"; 
echo "<br><a href=qqedit.php?password=>返回</a>";

}
else
{echo "密码错误！";}
}
else
{echo "非法入侵！";}
/* echo "<hr><a href='index.php'>返回前台</a>";
echo "-<a href='manger.php?userid=".$userid."&usersid=".$usersid."'>返回后台</a>"; */
?>
