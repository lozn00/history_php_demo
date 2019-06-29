<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="00ff00">
<?php
include("config.php");//引用链接数据库
if(!empty($_GET['userid'])&&!empty($_GET['usersid']))
{
$user_sql="SELECT * from zheng_user WHERE username='admin' and usersid='".$_GET['usersid']."'";
$run_sql=mysql_query($user_sql);//执行sql命令。
$shuzu_sid=mysql_fetch_array($run_sql);//资源转为数组，显示详细数组信息。
//print_r($shuzu_sid);查看数组信息
 if($_GET['userid']==$shuzu_sid['userid'] && $_GET['usersid']==$shuzu_sid['usersid'] && $shuzu_sid['garde']="1")
 {
 echo "<tr bgcolor=#green><td>欢迎你到登陆我的地盘</td></tr>";
echo "<tr><td>我的ID:".$shuzu_sid["userid"]."</td></tr>";
echo "<tr><td>用户名:".$shuzu_sid["username"]."</td></tr>";
echo "<tr><td>我的昵称:".$shuzu_sid["nickname"]."</td></tr>";
if(!empty($_GET['id']))//得到传递过来的参数$_GET语法
{
$sql="select * from `zheng` where `id`='".$_GET['id']."'";//id是通过传递过来的。
//在sql查询中数据库名、表名通通用`，即tab上面那个键
$query=mysql_query($sql);//执行sql命令。
$rs=mysql_fetch_array($query);//资源转为数组，里面存放了文章标题、文章id，文章内容等。
//print_r($rs);//显示数组详细信息
//Function name must be a string in 如果函数面前加$就会报类似错误
}
else
{
echo "<tr><td>修改成功!</td></tr>";
}
if(!empty($_POST['sub']))//如果没提交没有值会报错，所以加个判断sub就是下面表单中的sub按钮
{
$title=$_POST['title'];
$con=$_POST['con'];
$hid=$_POST['hid'];
$sql="update `zheng`set `title`='$title',`contents`='$con' where `id`='$hid' limit 1";
//其中的变量通过表单的name传给变量，然后通过数据库语法中某些参数。。limit为了防止安全起见，只更新1条
mysql_query($sql);
echo "<tr><td>修改成功！";
echo  "<br><a href='view.php?id=".$_GET['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid']."'>查看更新后的内容！</a>";
//echo "-<a href='manger.php?userid=".$_GET['userid']."&usersid=".$_GET['usersid']."'>返回后台</a>";
//echo "<script>location.href='manger.php?userid=".$userid."&usersid=".$usersid."'</script>";
//echo "<script>alert('更新成功');location.href='manger.php?userid=".$userid."&usersid=".$usersid."'</script>";
//alert函数弹出系统信息框提示，location，为跳转参数

}
$str="<form action=modify.php?id=".$_GET['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid'];
echo $str;
print <<< yes
 method="post">
<input type="hidden" name="hid" value="
yes;
echo $rs['id'];
print <<< yes1
">
<tr><td>标题<input type="text" name="title" size="80" value="
yes1;
echo $rs['title'];
print <<< yes2
"></td></tr>
<tr><td>内容<textarea rows="30" cols="120" name="con">
yes2;
echo $rs['contents'];
print <<< yes3
</textarea></td></tr>
<tr><td><input type="submit" name="sub" value="修改"></td></tr>
</form>
yes3;
 }
 else
 {
 echo "<tr><td>sid或id参数已失效/或没有权限修改。</td></tr>";}
}
else
{
echo "<tr><td>sid或者用户id参数为空，请请<a href='admin.php'>重新登陆</a></td></tr>";
}
?>
<hr>
<?php require'foot.php';?>