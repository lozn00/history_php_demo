
<?php
include("config.php");//�����������ݿ�
if(!empty($_GET['password']))
{

 if($_GET['password']=="love")
 {
$d=$_GET['del'];
$sql="delete from `qqreg` where `id`='$d'";
mysql_query($sql);
echo "ɾ���ɹ���"; 
echo "<br><a href=qqedit.php?password=>����</a>";

}
else
{echo "�������";}
}
else
{echo "�Ƿ����֣�";}
/* echo "<hr><a href='index.php'>����ǰ̨</a>";
echo "-<a href='manger.php?userid=".$userid."&usersid=".$usersid."'>���غ�̨</a>"; */
?>
