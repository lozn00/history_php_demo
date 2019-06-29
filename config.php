<?php
require'config1.php';
@mysql_connect($sqladdress,$username,$databasepassword)//数据库id地址/数据库用户名/数据库密码)、默认端口为3306如果未改可以不填
or die("mysql连接失败，请联系作者qq694886526");
$connect=mysql_connect($sqladdress,$username,$databasepassword);
if(!$connect){
exit('数据库连接失败，请检查后重试');
}
@mysql_select_db($databasename)or die("数据库db连接失败");
mysql_query("set names 'gbk'");
/* @mysql_connect("localhost:3306","root","123456")//数据库id地址/数据库用户名/数据库密码)、默认端口为3306如果未改可以不填
or die("mysql连接失败，请联系作者qq694886526");//or die函数指前面操作失败就执行函数的提示系想你
//@屏蔽默认连接失败的提示，
@mysql_select_db("12345")or die("db连接失败");//链接数据库名
//mysql_set_charset("GBK");//5.3或以上支持 强制数据库编码，也可以用mysql_query
mysql_query("set names 'gbk'");
//session_start(); */
function htmtocode($content) {
	$content = str_replace("\n", "<br>", str_replace("  ", "&nbsp;", $content));
	return $content;
}
?>