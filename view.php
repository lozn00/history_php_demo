<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#00EE00">
<?php
include("config.php");//�����������ݿ�
if(!empty($_GET['id']))//�õ����ݹ����Ĳ���$_GET�﷨
{
$sql="select * from `zheng` where `id`='".$_GET['id']."'";//id��ͨ�����ݹ����ġ�
//��sql��ѯ�����ݿ���������ͨͨ��`����tab�����Ǹ���
$query=mysql_query($sql);//ִ��sql���
$rs=mysql_fetch_array($query);//��ԴתΪ���飬�����������±��⡢����id���������ݵȡ�
//print_r($rs);//��ʾ������ϸ��Ϣ
//Function name must be a string in ���������ǰ��$�ͻᱨ���ƴ���
$sqlhit="update `zheng` set hits=hits+1 where `id`='".$_GET['id']."'";
mysql_query($sqlhit);
}
?>
 <tr bgcolor="#green"><td>���⣺<?php echo @$rs["title"];?></td></tr>
 <tr bgcolor="#ffffff"><td>����ʱ�䣺<?php echo @$rs['dates'];?></td></tr>
 <tr bgcolor="#ffffff"><td>�������<?php echo @$rs['hits'];?></td></tr>
 <tr bgcolor="#ffffff"><td>���ݣ�</br><?php echo htmtocode(@$rs["contents"]);?></td></tr>
</table>
<?php require'foot.php';?>
