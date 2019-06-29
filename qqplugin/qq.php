<?php
include("config.php");//引用链接数据库
if(!empty($_GET['qq']))//得到传递过来的参数$_GET语法
{
$sql="select * from `qqreg` where `qq`='".$_GET['qq']."'";//id是通过传递过来的。
//在sql查询中数据库名、表名通通用`，即tab上面那个键
$query=mysql_query($sql);//执行sql命令。
$rs=mysql_fetch_array($query);//资源转为数组，里面存放了文章标题、文章id，文章内容等。
//print_r($rs);//显示数组详细信息
     if($rs['qq']==null)
   {
$qq=$_GET['qq'];
$sql="insert into `qqreg`(`id`,`qq`,`dates`,`contents`)
values(null,'$qq',now(),'2000')";
mysql_query($sql);//执行sql
echo "插入成功！";
     }
else
{ echo $rs['contents'];
$sqlhit="update `qqreg` set hits=hits+1 where `qq`='".$_GET['qq']."'";
mysql_query($sqlhit);//

}



//Function name must be a string in 如果函数面前加$就会报类似错误

}
else
{echo "参数未传递";}
?>