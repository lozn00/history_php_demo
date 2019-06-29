<?php
include("config.php");//引用链接数据库
if(!empty($_GET['password']))
{

 if($_GET['password']=="love")
 {

if(!empty($_GET['id']))//得到传递过来的参数$_GET语法
{
$sql="select * from `qqreg` where `id`='".$_GET['id']."'";//id是通过传递过来的。
//在sql查询中数据库名、表名通通用`，即tab上面那个键
$query=mysql_query($sql);//执行sql命令。
$rs=mysql_fetch_array($query);//资源转为数组，里面存放了文章标题、文章id，文章内容等。
//print_r($rs);//显示数组详细信息
//Function name must be a string in 如果函数面前加$就会报类似错误
}
else
{
echo "修改成功!";
}
if(!empty($_POST['sub']))//如果没提交没有值会报错，所以加个判断sub就是下面表单中的sub按钮
{
$qq=$_POST['qq'];
$con=$_POST['con'];
$hid=$_POST['hid'];
$shuoming=$_POST['shuoming'];
$sql="update `qqreg`set `qq`='$qq',`contents`='$con',`shuoming`='$shuoming' where `id`='$hid' limit 1";
//其中的变量通过表单的name传给变量，然后通过数据库语法中某些参数。。limit为了防止安全起见，只更新1条 
mysql_query($sql);
ECHO "表单内容已为空<br>";
echo "修改成功！";

echo "<a href='qqedit.php?password=".$_GET['password']."'>返回后台</a>";
//echo "<script>location.href='manger.php?userid=".$userid."&usersid=".$usersid."'</script>";
//echo "<script>alert('更新成功');location.href='manger.php?userid=".$userid."&usersid=".$usersid."'</script>";
//alert函数弹出系统信息框提示，location，为跳转参数
}

print <<< yes
<form action="#" method="post">
<input type="hidden" name="hid" value="
yes;
echo $rs['id'];
print <<< yes1
">
标题<input type="text" name="qq" value="
yes1;
echo $rs['qq'];
print <<< yes2
"><br>
状态<input type="text" name="con" value="
yes2;
echo $rs['contents'];
print <<< yes3
"><br>
说明<textarea rows="5" cols="50" name="shuoming">
yes3;
echo $rs['shuoming'];
print <<< yes4
</textarea><br>
<input type="submit" name="sub" value="修改">
</form>
yes4;
 }
 else
 {
 echo "sid或id参数已失效/或没有权限修改。";}
}
else
{
echo "参数错误，请请重新登陆qqedit.php?password=</a>";
}
?>

