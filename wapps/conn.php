<?php
@mysql_connect("localhost:3306","root","123456")//���ݿ�id��ַ/���ݿ��û���/���ݿ�����)��Ĭ�϶˿�Ϊ3306���δ�Ŀ��Բ���
or die("mysql����ʧ�ܣ�����ϵ����qq694886526");//or die����ָǰ�����ʧ�ܾ�ִ�к�������ʾϵ����
//@����Ĭ������ʧ�ܵ���ʾ��
@mysql_select_db("12345")or die("db����ʧ��");//�������ݿ���
//mysql_set_charset("gbk")//5.3������֧�� ǿ�����ݿ���룬Ҳ������mysql_query
mysql_query("set names 'gbk'");
?>