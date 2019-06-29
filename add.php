<?php require'top.php';?>
<table border="1" align="center" bordercolor="00ff00" cellpadding="5" cellspacing="0" width="100%">
<?php
include("config.php");//引用链接数据库

if(!empty($_GET['userid'])&&!empty($_GET['usersid']))
{
$user_sql="SELECT * from zheng_user WHERE userid='1' and usersid='".$_GET['usersid']."'";
$run_sql=mysql_query($user_sql);//执行sql命令。
$shuzu_sid=mysql_fetch_array($run_sql);//资源转为数组，显示详细数组信息。
//print_r($shuzu_sid);查看数组信息
 if($_GET['userid']==$shuzu_sid['userid'] && $_GET['usersid']==$shuzu_sid['usersid'] && $shuzu_sid['garde']="1")
 {
echo "<tr><td>我的昵称:".$shuzu_sid["nickname"]."</td></tr>";
if(!empty($_POST['sub']))//如果没提交没有值会报错，所以加个判断sub就是下面表单中的sub按钮
{
$title=$_POST['title'];
$con=$_POST['con'];
$sql="insert into `zheng`(`id`,`title`,`dates`,`contents`)
values(null,'$title',now(),'$con')";
mysql_query($sql);
ECHO "<tr><td>发表成功</td></tr>";
//unset($_POST);
}
else
{echo "<tr bgcolor=#green><td>请填写内容</td></tr>";
}
/* print <<< yes2
<form action="#" method="post">
标题<input type="text" name="title"></td></tr>
内容<textarea rows="5" cols="50" name="con"></textarea></td></tr>
<input type="submit" name="sub" value="发表"></td></tr>
</form>
<hr>
<a href="index.php">返回首页</a>
yes2; */
 }
 else
 {echo "<tr><td>sid或id参数已失效，请重新登陆。</td></tr>";}
}
else
 {echo "<tr><td>非法操作，没有获取到用户id值sid值、请<a href='admin.php'>重新登陆</a></td></tr>";}

?>
<form action="<?php
echo "add.php?userid=".@$shuzu_sid["userid"]."&usersid=".@$shuzu_sid["usersid"];?>" method="post">
 <tr bgcolor="#green"><td>标题<input type="text" name="title" size="80"></td></tr>
 <tr bgcolor="white"><td>内容<br><textarea rows="30" cols=135 name="con"></textarea></td></tr>
 <tr bgcolor="white"><td><input type="submit" name="sub" value="添加"></td></tr>
</form>
</table>
<?php require'foot.php';?>