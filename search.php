<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="1" bgcolor="#fffeee" bordercolor="#00ff00">
<form action="" method="get">
<tr><td>条数:<input type="text" name="limits" maxlength="5" size="2" value="20"></td></tr>
<tr><td>搜:<select name="tiaojian">
<option value="title">标题</option>
<option value="contents">内容</option>
</select>
<tr><td>关键字:<input type="text" name="keys" value="情迁"></td></tr>
<tr><td><input type="submit" name="subs" value="搜索"></td></tr>
</form>
<!--<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">-->
<?php
include("config.php");//引用链接数据库
$sql="select * from `zheng`";
if(!empty($_GET['keys']))
{
$ziduan=$_GET['tiaojian'];
if($ziduan!="contents")
{
$ziduan="title";
}
echo "搜索完毕!<br>";
$arr=explode(" ",$_GET['keys']);
$a=" where ".$ziduan." like '%".$arr[0]."%'" ;//模糊搜索
if(count($arr)<6) //空格分隔查找不能大于6个。免得报错。
{
for($i=1;$i<count($arr);$i++)
{
$a.=" or ".$ziduan." like '%".$arr[$i]."%'";

}
}


$sql.=$a;
//echo $sql;
//print_r($arr);



}
else
{
$w=1;
if(!empty($_GET['limits']))
{
$tiaoshu="limit 0,".$_GET['limits'];
}
else
{
$tiaoshu="limit 0,15";
}

$sql="select * from `zheng` where $w order by id $tiaoshu";

}

//echo $sql="select * from `zheng` where $w order by id desc limit 10";//查询所有，倒序，显示10条
$quary=mysql_query($sql);//query只执行一次sql语句
//$rs=mysql_fetch_array($quary);
//$rs1=mysql_fetch_array($quary); print_r(rs1);
//执行一次array查询一层， 执行第二次得到的二列。可以写2个变量测试看效果。
//mysql_fetch_array可以得到键名也可以得到键值row只能得到下标。可以用print_r调试。

//iconv_substr($rs['contents'],0,5,"gbk")起始位，长度，编码截取5个字符，中文英文皆可
$key=@$_GET['keys'];
//if($key!="")
//{print_r($arr);}

while($rs=mysql_fetch_array($quary))
{
	$title=$rs['title'];
	$content=$rs['contents'];
	if($key!="")
	{

		for($i=0;$i<count($arr);$i++)
      {
      	$title=preg_replace("/($arr[$i])/","<b><font color=#ffffef>\\1</font></b>",$title);
      	$content=preg_replace("/($arr[$i])/","<b><font color=#ff00ff>\\1</font></b>",$content);
       }



	}


?>
 <tr bgcolor="#green"><td>标题:<a href="view.php?id=<?php echo $rs["id"]."&userid=".@$_GET["userid"]."&usersid=".@$_GET["usersid"];?>"><?php echo $title;?></a>
</td></tr>
<tr bgcolor="#ffffff"><td>时间:<?php echo $rs['dates']?></td></tr>
<tr bgcolor="#ffffff"><td>简叙内容:<br>
<?php
echo iconv_substr($content,0,300,"gbk")."..";
//echo "<hr>";
//echo $rs['contents']
?>
</td></tr>
<?php
}

?>

<tr bgcolor=#FFFFFF><td><b>联系我们</b>QQ694886526 手机 15576334267、13262274631</td></tr>
<tr  bgcolor=#FFFFFF><td><a href='http://51bwn.com/cf/update.html'>进入更新首页</a></td></tr>
<tr  bgcolor=#FFFFFF><td><a href='http://heijie.tk/qqxt'>进入扣扣系统</a></td></tr>
<tr  bgcolor=#FFFFFF><td><a href='http://shop108156197.taobao.com'>进入淘宝店铺</a></td></tr>
</table>
<?php require'foot.php';?>