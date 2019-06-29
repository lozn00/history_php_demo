<?php
@mysql_connect("localhost:3306","root","123456")//数据库id地址/数据库用户名/数据库密码)、默认端口为3306如果未改可以不填
or die("mysql连接失败，请联系作者qq694886526");//or die函数指前面操作失败就执行函数的提示系想你
//@屏蔽默认连接失败的提示，
@mysql_select_db("12345")or die("db连接失败");//链接数据库名
//mysql_set_charset("gbk")//5.3或以上支持 强制数据库编码，也可以用mysql_query
mysql_query("set names 'gbk'");
?>