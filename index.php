<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFfe0" bordercolor="#00ff00">

<?php
include("config.php");//引用链接数据库
function serach()
{
if(!empty($_GET['keys']))
{

$w=" `title` like '%".$_GET['keys']."%'" ;//模糊搜索
echo "搜索完毕!<br>";
}
else
{
$w=1;
}
if(!empty($_GET['limits']))
{
$tiaoshu=" limit ".$_GET['limits'];
}
else
{$tiaoshu='';}
$sql="select * from `zheng` where $w order by id desc $tiaoshu";
$quary=mysql_query($sql);
return $quary;
}
function pageurl()//得到相对路径+当前文件名
{
$url=$_SERVER["REQUEST_URI"]; //获取服务器后面的地址{除域名外}
$url=parse_url($url);//将URL解析成有固定键值的数组的函数
$url=$url["path"];//数组变量转换为变量得到相对地址
return $url;
}

function pageinfo($getpage,$url="")//防止出现负页
{
$url=$url;
if($getpage>5)
{

echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==5)
{
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==4)
{
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==3)
{

echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==2)
{
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==1)
{
//echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-5).">".($getpage-5)."</a>|";
//echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-3).">".($getpage-3)."</a>|";
//echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}



}
$pagesize=10;//定义每一页显示的条数
$url=pageurl();//得到当前相对路径
$sql=mysql_query("SELECT * FROM `zheng`");//先执行sql然后统计总数
$num = mysql_num_rows($sql);//记录条数
$countpage = ceil($num/10); //算出总页 并取整数
if(!empty($_GET["page"]))//强制跳转到设置页的首页
{
$getpage=$_GET["page"];
$page=($getpage-1)*$pagesize;
}
else
{
    echo "<script language=\"javascript\">location.href='$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=1';</script>";
}

//用公式觉得limit取得url的条数。
if($num > $pagesize)
{
 if($getpage<0)
 $getpage=1;
}
//如果所有记录总数大于当前页面要显示的条数，那么把设置limit的前面
if($getpage<=1||$getpage=="1")
{//$page=0;$pagesize=11;
$sql1="select * from `zheng` order by id desc limit ".$pagesize;
}
else
{$sql1="select * from `zheng` order by id desc limit ".$page.",".$pagesize;//执行sql语句
}
$query=mysql_query($sql1);
echo "<tr bgcolor=#00FF00><th>共发表".$num."条文章 按发表时间倒序</th></tr>";

echo "<tr color=red><td>";
pageinfo($getpage);//调用前页数字函数
echo $getpage."|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+1).">".($getpage+1)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+2).">".($getpage+2)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+3).">".($getpage+3)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+4).">".($getpage+4)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+5).">".($getpage+5)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+6).">".($getpage+6)."</a>";
echo "</td></tr>";


echo "<tr color=red><td>";

echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">上页</a>-<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+1).">下页</a>-
<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=1>首页</a>-<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".$countpage.">尾页</a>-<a href='search.php?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."'>搜索</a>";

echo "</td></tr>";
//$rs=mysql_fetch_array($query);"."

while($rs=mysql_fetch_array($query))
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
<tr bgcolor=#FFFFFF>
<td><b>联系我们：</b>
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=694886526&site=qq&menu=yes">
<img border="0" src="http://wpa.qq.com/pa?p=2:694886526:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
694886526 手机 15576334267、13262274631 黑界网络产品交流群
<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=91b8ef925e87b9bfa684102ad572914c2debcbef2821587c6d39a93e52f45522">
<img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="黑界情迁CF/QQ机器人" title="黑界情迁CF/QQ机器人"></a>
106605356情迁ＱＱ机器人官方体验群<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=932ecb4ed4f5e788c90d795e0fffef2303e59db637931328814b367470f4cbde">
<img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="情迁机器人官方体验群" title="情迁机器人官方体验群"></a> 298081857
</td>
</tr>
<tr bgcolor=#FFFFFF> <td><b>相关链接：</b></td></tr>
<tr  bgcolor=#FFFFFF>
<td>
<table width=100% align="center">
<td><a href='http://51bwn.com/cf/update.html'>情迁火线</a>更新页</td>
<td>|<a href='http://tieba.baidu.com/f?kw=%BA%DA%BD%E7%CD%F8%C2%E7'>黑界网络</a>贴吧</td>
<td>|<a href='http://shop108156197.taobao.com'>黑界网络</a>淘宝店</td>
<td>|<a href='http://tieba.baidu.com/p/3057401081'>情迁QQ机器人</a>更新页</td><td>|<a href='http://wenwen.sogou.com/t/t818877.htm'>黑界网络</a>问问团队</td>
<td>|<a href='http://pan.baidu.com/share/home?uk=1044145898&view=share#category/type=0'>黑界网络</a>资源下载区</td>
<td>|<a href='http://51bwn.com/wapps/'>黑界网络集团名片</a>在线制作</td>
</table>
</td>
</tr>
</table>
<?php require'foot.php';?>