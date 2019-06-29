<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#00EE00">
<?php
include("config.php");//引用链接数据库
if(!empty($_GET['id']))//得到传递过来的参数$_GET语法
{
$sql="select * from `zheng` where `id`='".$_GET['id']."'";//id是通过传递过来的。
//在sql查询中数据库名、表名通通用`，即tab上面那个键
$query=mysql_query($sql);//执行sql命令。
$rs=mysql_fetch_array($query);//资源转为数组，里面存放了文章标题、文章id，文章内容等。
//print_r($rs);//显示数组详细信息
//Function name must be a string in 如果函数面前加$就会报类似错误
$sqlhit="update `zheng` set hits=hits+1 where `id`='".$_GET['id']."'";
mysql_query($sqlhit);
}
?>
 <tr bgcolor="#green"><td>标题：<?php echo @$rs["title"];?></td></tr>
 <tr bgcolor="#ffffff"><td>发表时间：<?php echo @$rs['dates'];?></td></tr>
 <tr bgcolor="#ffffff"><td>点击量：<?php echo @$rs['hits'];?></td></tr>
 <tr bgcolor="#ffffff"><td>内容：</br><?php echo htmtocode(@$rs["contents"]);?></td></tr>
</table>
<?php require'foot.php';?>
