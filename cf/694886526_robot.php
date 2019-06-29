<?php 
include("config.php");//引用链接数据库
$sql="select * from `qqreg` where `qq`=10000000";//
$query=mysql_query($sql);//执行sql命令。
$rs=mysql_fetch_array($query);
if($rs['shuoming']==null)
   {
   echo "error";
   }
   else
   //212120262829242128286C2629242828262522266C23252026282226246C212120262829242128286C2824252529282529256C272729242720242123276C2627242223222928296C23252629272423286C212723272022262627286C232022222522262228256C22272424242327252426A192B0DF8
   {
   echo $rs['shuoming'];
   }



?>










