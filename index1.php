<?php require'top.php';?>
<table width=100% border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
<form action="" method="get">
<tr><td>����:<input type="text" name="limits" maxlength="5" size="2"></td></tr>
<tr><td>����:<input type="text" name="keys"></td></tr>
<tr><td><input type="submit" name="subs" value="����"></td></tr>
</form>
<!--<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">-->
<?php
include("config.php");//�����������ݿ�
$pagesize=10;//����ÿһҳ��ʾ������
$url=$_SERVER["REQUEST_URI"]; //��ȡ����������ĵ�ַ{��������}
$url=parse_url($url);//��URL�������й̶���ֵ������ĺ���
$url=$url[path];//�������ת��Ϊ�����õ���Ե�ַ

echo "<tr bgcolor=red><td>����".$num."ƪ</td></tr>";
if($_GET[page])
{
$getpage=$_GET[page];//get�õ�url�е�ҳ��
$page=($getpage-1)*$pagesize;//��ҳ��ʽ ����ǰҳ-1��xÿҳҪ��ʾ������
$page.=',';//limit sqlִ�����Ľṹ��
}
if($num > $pagesize)//��������������ڵ�ǰҳ���ҳ��
{
 if($getpage<=1)//ҳû�л�ȡ����С��1��ôǿ���޸�Ϊ��һҳ
 $getpage=1;
echo " <a href=$url?page=".($getpage-1).">��һҳ</a> <a href=$url?page=".($getpage+1).">��һҳ</a>";
}

echo $sql="SELECT * FROM `zheng` limit $page $pagesize ";//
$query=mysql_query($sql); //ִ��sql
$rs=mysql_fetch_array($quary)
while($rs)
{
?>
 <tr bgcolor="#green"><td>����:<a href="view.php?id=
 <?php echo $rs['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid'];?>">
 <?php echo $rs['title'];?>
 </a>
</td></tr>
<tr bgcolor="#ffffff"><td>ʱ��:<?php echo $rs['dates']?></td></tr>
<tr bgcolor="#ffffff"><td>����:<br>
<?php
echo iconv_substr($rs['contents'],0,20,"gbk")."..";
//echo "<hr>";
//echo $rs['contents']
?>
</td></tr>
<?php
}
?>
<tr bgcolor=#FFFFFF><td><b>��ϵ����</b>QQ694886526 �ֻ� 15576334267��13262274631</td></tr>
<tr  bgcolor=#FFFFFF><td><a href='http://51bwn.com/cf/update.html'>���������ҳ</a></td></tr>
<tr  bgcolor=#FFFFFF><td><a href='http://heijie.tk/qqxt'>����ۿ�ϵͳ</a></td></tr>
<tr  bgcolor=#FFFFFF><td><a href='http://shop108156197.taobao.com'>�����Ա�����</a></td></tr>
</table>
<?php require'foot.php';?>