<?php require'top.php';?>
<table width=100% border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
<form action="" method="get">
<tr><td>条数:<input type="text" name="limits" maxlength="5" size="2"></td></tr>
<tr><td>内容:<input type="text" name="keys"></td></tr>
<tr><td><input type="submit" name="subs" value="搜索"></td></tr>
</form>
<!--<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">-->
<?php
include("config.php");//引用链接数据库
$pagesize=10;//定义每一页显示的条数
$url=$_SERVER["REQUEST_URI"]; //获取服务器后面的地址{除域名外}
$url=parse_url($url);//将URL解析成有固定键值的数组的函数
$url=$url[path];//数组变量转换为变量得到相对地址

echo "<tr bgcolor=red><td>共有".$num."篇</td></tr>";
if($_GET[page])
{
$getpage=$_GET[page];//get得到url中的页数
$page=($getpage-1)*$pagesize;//翻页公式 （当前页-1）x每页要显示的条数
$page.=',';//limit sql执行语句的结构，
}
if($num > $pagesize)//如果所有数量大于当前页面的页数
{
 if($getpage<=1)//页没有获取到或小于1那么强行修改为第一页
 $getpage=1;
echo " <a href=$url?page=".($getpage-1).">上一页</a> <a href=$url?page=".($getpage+1).">下一页</a>";
}

echo $sql="SELECT * FROM `zheng` limit $page $pagesize ";//
$query=mysql_query($sql); //执行sql
$rs=mysql_fetch_array($quary)
while($rs)
{
?>
 <tr bgcolor="#green"><td>标题:<a href="view.php?id=
 <?php echo $rs['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid'];?>">
 <?php echo $rs['title'];?>
 </a>
</td></tr>
<tr bgcolor="#ffffff"><td>时间:<?php echo $rs['dates']?></td></tr>
<tr bgcolor="#ffffff"><td>内容:<br>
<?php
echo iconv_substr($rs['contents'],0,20,"gbk")."..";
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