<?php
include("../config.php");//引用链接数据库
if(!empty($_GET['qq']))//得到传递过来的参数$_GET语法
{
$sql="select * from `qqreg` where `qq`='".$_GET['qq']."'";//id是通过传递过来的。
//在sql查询中数据库名、表名通通用`，即tab上面那个键
$query=mysql_query($sql);//执行sql命令。
$rs=mysql_fetch_array($query);//资源转为数组，里面存放了文章标题、文章id，文章内容等。
//print_r($rs);//显示数组详细信息
     if($rs['qq']==null)
   {
$mode="/[^[0-9]/";//匹配整个字符
$zifu=$_GET['qq'];
if(preg_match ($mode,$zifu,$shuzu))
{
echo "参数错误，包含字母，或其它字符！";	//echo "匹配成功！".$shuzu[0]; 要让其过期，修改！
print_r($arr);}
else
{       if($_GET['qq']>1000000 && $_GET['qq']<100000000000)//如果小于7位数说明是非法操作！
   //不许字母进行插入，因此要进行匹配
   {
               	 //否则就插入条目
 $qq=$_GET['qq'];
    $sql="insert into `qqreg`(`id`,`qq`,`dates`,`contents`,`shuoming`)
   values(null,'$qq',now(),'2000','autoadd_noreg_qq694886526')";
     mysql_query($sql);//执行sql
      echo $rs['contents'];
   }

   else
   {echo "too long or too short???????";}


}



}//如果已经存在了，那么就要进行判断才行
else
{
$mode="/auto/";//匹配整个字符
$zifu=$rs['shuoming'];
if(preg_match ($mode,$zifu,$shuzu))
{

if($rs['hits']>15 && $rs['contents']!=15)//限制只能使用15次
             {

	$sqlhit="update `qqreg` set shuoming='autoadd_noreg_qq694886526超过使用限制，请联系管理',contents='15' where `qq`='".$_GET['qq']."'";
mysql_query($sqlhit);//累加计算使用数}



echo "check you qqrobot use time over 当前".$rs['hits'].",please add qq9694486526,you qq canot no register";
	//echo "匹配成功！".$shuzu[0]; 要让其过期，修改！
print_r($arr);}
}

echo $rs['contents'];


//正则表达式中u开启utf-8，!后面加s匹配全部而非单行


$sqlhit="update `qqreg` set hits=hits+1 where `qq`='".$_GET['qq']."'";
mysql_query($sqlhit);//累加计算使用数

}



//Function name must be a string in 如果函数面前加$就会报类似错误

}
else
{echo "参数未传递";}
?>