<?php
if(empty($_GET['password']))
{ echo "<script language=\"javascript\">location.href='qqedit.php?password=1';</script>";
}

include("config.php");//引用链接数据库
//iconv_substr($rs['contents'],0,5,"gbk")起始位，长度，编码截取5个字符，中文英文皆可
$result=$_POST['subs'];
if(!empty($result))
{
$qq=$_POST['qq'];
$word=" `qq` like '%".$qq."%' ORDER by id desc";//模糊搜索
$sql="select * from `qqreg` where ".$word;
}
else{$sql="select * from `qqreg` ORDER by id desc limit 10";}

$quary=mysql_query($sql);//query只执行一次sql语句
$num = mysql_num_rows($quary);
echo "当前共".$num."条记录<br>";

while($rs=mysql_fetch_array($quary))
{
?>
<?php echo $rs['id'];?>.<a target="_blank" href=blackworld_hjwl.php?qq=<?php echo $rs['qq'];?>>QQ</a>:






<a target="_blank" href="http://<?php echo $rs['qq'].".qzone.qq.com";?>"><?php echo $rs['qq'];?></a>
<a target="_blank" href=http://wpa.qq.com/msgrd?v=3&uin=<?php echo $rs['qq'];?>><img src=http://wpa.qq.com/pa?p=2:<?php echo $rs['qq'];?>:52></a>
<br>
<a href="qq_modify.php?id=<?php
echo $rs['id']."&password=".$_GET['password']?>">编辑</a>|<a href="delqq.php?del=
<?php echo $rs['id']."&password=".$_GET['password'];?>">删除</a>
<br>使用时间:<?php echo $rs['dates']?>
<br>当前状态:
<?php
echo $rs['contents'];
//echo iconv_substr($rs['contents'],0,9,"gbk")."..";
echo "<br>使用次数:";
echo $rs['hits'];
echo "<br>备注信息:".$rs['shuoming'];
echo "<hr>";

?>
<?php
}
if($_GET['password']==love)
{echo '<a href=blackworld_hjwl.php?qq=694886526>添加一个qq</a>';}
?>
<form action="qqedit.php?password=<?php echo $_GET['password']; ?>" method="post">
管理指定QQ:<input type="text" name="qq" value=<?php echo $qq?>><br>
<input type="submit" name="subs" value="搜索">
</form
<hr>
情迁QQ机器人管理与授权
