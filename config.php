<?php
require'config1.php';
@mysql_connect($sqladdress,$username,$databasepassword)//���ݿ�id��ַ/���ݿ��û���/���ݿ�����)��Ĭ�϶˿�Ϊ3306���δ�Ŀ��Բ���
or die("mysql����ʧ�ܣ�����ϵ����qq694886526");
$connect=mysql_connect($sqladdress,$username,$databasepassword);
if(!$connect){
exit('���ݿ�����ʧ�ܣ����������');
}
@mysql_select_db($databasename)or die("���ݿ�db����ʧ��");
mysql_query("set names 'gbk'");
/* @mysql_connect("localhost:3306","root","123456")//���ݿ�id��ַ/���ݿ��û���/���ݿ�����)��Ĭ�϶˿�Ϊ3306���δ�Ŀ��Բ���
or die("mysql����ʧ�ܣ�����ϵ����qq694886526");//or die����ָǰ�����ʧ�ܾ�ִ�к�������ʾϵ����
//@����Ĭ������ʧ�ܵ���ʾ��
@mysql_select_db("12345")or die("db����ʧ��");//�������ݿ���
//mysql_set_charset("GBK");//5.3������֧�� ǿ�����ݿ���룬Ҳ������mysql_query
mysql_query("set names 'gbk'");
//session_start(); */
function htmtocode($content) {
	$content = str_replace("\n", "<br>", str_replace("  ", "&nbsp;", $content));
	return $content;
}
?>