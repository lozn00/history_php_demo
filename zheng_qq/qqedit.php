<?php
if(empty($_GET['password']))
{ echo "<script language=\"javascript\">location.href='qqedit.php?password=1';</script>";
}

include("config.php");//�����������ݿ�
//iconv_substr($rs['contents'],0,5,"gbk")��ʼλ�����ȣ������ȡ5���ַ�������Ӣ�ĽԿ�
$result=$_POST['subs'];
if(!empty($result))
{
$qq=$_POST['qq'];
$word=" `qq` like '%".$qq."%' ORDER by id desc";//ģ������
$sql="select * from `qqreg` where ".$word;
}
else{$sql="select * from `qqreg` ORDER by id desc limit 10";}

$quary=mysql_query($sql);//queryִֻ��һ��sql���
$num = mysql_num_rows($quary);
echo "��ǰ��".$num."����¼<br>";

while($rs=mysql_fetch_array($quary))
{
?>
<?php echo $rs['id'];?>.<a target="_blank" href=blackworld_hjwl.php?qq=<?php echo $rs['qq'];?>>QQ</a>:






<a target="_blank" href="http://<?php echo $rs['qq'].".qzone.qq.com";?>"><?php echo $rs['qq'];?></a>
<a target="_blank" href=http://wpa.qq.com/msgrd?v=3&uin=<?php echo $rs['qq'];?>><img src=http://wpa.qq.com/pa?p=2:<?php echo $rs['qq'];?>:52></a>
<br>
<a href="qq_modify.php?id=<?php
echo $rs['id']."&password=".$_GET['password']?>">�༭</a>|<a href="delqq.php?del=
<?php echo $rs['id']."&password=".$_GET['password'];?>">ɾ��</a>
<br>ʹ��ʱ��:<?php echo $rs['dates']?>
<br>��ǰ״̬:
<?php
echo $rs['contents'];
//echo iconv_substr($rs['contents'],0,9,"gbk")."..";
echo "<br>ʹ�ô���:";
echo $rs['hits'];
echo "<br>��ע��Ϣ:".$rs['shuoming'];
echo "<hr>";

?>
<?php
}
if($_GET['password']==love)
{echo '<a href=blackworld_hjwl.php?qq=694886526>���һ��qq</a>';}
?>
<form action="qqedit.php?password=<?php echo $_GET['password']; ?>" method="post">
����ָ��QQ:<input type="text" name="qq" value=<?php echo $qq?>><br>
<input type="submit" name="subs" value="����">
</form
<hr>
��ǨQQ�����˹�������Ȩ
