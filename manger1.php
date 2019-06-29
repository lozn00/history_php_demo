<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="red">
<?php
include("config.php");//引用链接数据库
if(!empty($_GET['userid'])&&!empty($_GET['usersid']))
{
$user_sql="SELECT * from zheng_user WHERE username='admin' and usersid='".$_GET['usersid']."'";
$run_sql=mysql_query($user_sql);//执行sql命令。
$shuzu_sid=mysql_fetch_array($run_sql);//资源转为数组，显示详细数组信息。
//print_r($shuzu_sid);//查看数组信息
 if($_GET['userid']==$shuzu_sid['userid'] && $_GET['usersid']==$shuzu_sid['usersid'])
 {
 echo "<tr bgcolor=green><td>亲爱的情迁，欢迎进入后台管理</td></tr>";
echo "<tr><td>我的ID:".$shuzu_sid[userid]."</td></tr>";
echo "<tr><td>用户名:".$shuzu_sid[username]."</td></tr>";
echo "<tr><td>我的昵称:".$shuzu_sid[nickname]."</td></tr>";
function pageurl()//得到相对路径+当前文件名
{
$url=$_SERVER["REQUEST_URI"]; //获取服务器后面的地址{除域名外}
$url=parse_url($url);//将URL解析成有固定键值的数组的函数
$url=$url[path];//数组变量转换为变量得到相对地址
return $url;
}
$url=pageurl();//得到当前相对路径
echo "<tr><td><a href='add.php?userid=".$shuzu_sid[userid]."&usersid=".$shuzu_sid[usersid]."'>发表内容</a></td></tr>";
echo "<form action='$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=1'";
print <<< END1
 " method="post">
<tr><td>条数:<input type="text" name="limits" maxlength="5" size="2"></td></tr>
<tr><td>关键字:<input type="text" name="keys"></td></tr>
<tr><td><input type="submit" name="subs" value="搜索"></td></tr>
</form>
END1;


if(!empty($_POST['keys']))
{

$w=" `title` like '%".$_POST['keys']."%'"."or `content` like '%".$_POST['keys']."%'" ;//模糊搜索
$sql1="select * from `zheng` where".$w;
echo $sql1;
echo "<tr><td>搜索完毕!</td></tr>";
}
else
{

function pageinfo($getpage)//防止出现负页
{

if($getpage>5)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==5)
{
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==4)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==3)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==2)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==1)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}



}
$pagesize=10;//定义每一页显示的条数
//$url=pageurl();//得到当前相对路径
$sql=mysql_query("SELECT * FROM `zheng`");//先执行sql然后统计总数
$num = mysql_num_rows($sql);//记录条数
$countpage = ceil($num/10); //算出总页 并取整数
if(!empty($_GET[page]))//强制跳转到设置页的首页
{
$getpage=$_GET[page];
$page=($getpage-1)*$pagesize;
}
else
{
    echo "<script language=\"javascript\">location.href='$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=1';</script>";
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
$sql1="select * from `zheng` order by dates desc limit ".$pagesize;
}
else
{$sql1="select * from `zheng` order by id desc limit ".$page.",".$pagesize;//执行sql语句
}
echo "<tr bgcolor=red><td>共发表".$num."条文章</td></tr>";
echo "<tr color=red><td>";
pageinfo($getpage);//调用前页数字函数
echo $getpage."|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+1).">".($getpage+1)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+2).">".($getpage+2)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+3).">".($getpage+3)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+4).">".($getpage+4)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+5).">".($getpage+5)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+6).">".($getpage+6)."</a>";
echo "</td></tr>";
echo "<tr color=red><td>";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">上页</a>-<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+1).">下页</a>-
<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=1>首页</a>-<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".$countpage.">尾页</a>-<a href='search.php'>搜索</a>";
echo "</td></tr>";

}

/* if(!empty($_GET['limits']))
{
$tiaoshu=" limit ".$_GET['limits'];
}
else
{$tiaoshu='';}
$sql="select * from `zheng` where $w order by id desc $tiaoshu";
$quary=mysql_query($sql);
return $quary; */
//}


$query=mysql_query($sql1);
while($rs=mysql_fetch_array($query))
{
?>
<tr color="green"><td>标题:<a href="view.php?id=<?php echo $rs['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid'];?>"><?php echo $rs['title'];?></a>
</td></tr>
<tr><td><a href="modify.php?id=<?php
echo $rs['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid']
?>">编辑</a>|<a href="del.php?del=
<?php echo $rs['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid'];?>">删除</a>
</td></tr>
<tr><td>时间:<?php echo $rs['dates']?></td></tr>
<tr bgcolor=#green><td>内容:
<?php
echo iconv_substr($rs['contents'],0,9,"gbk")."..</td></tr>";
//echo $rs['contents']
?>
<?php
}

 }
 else
 {echo "<tr><td>id错误或者密码错误。<br><a href='admin.php'>重新登陆</a></td></tr>";}
}
else
{
echo "<tr><td>sid或者用户id参数没有读取到，请<a href='admin.php'>重新登陆</a></td></tr>";
}
?>
</table>
<?php require'foot.php';?>