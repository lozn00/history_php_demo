<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFfe0" bordercolor="#00ff00">

<?php
include("config.php");//�����������ݿ�
function serach()
{
if(!empty($_GET['keys']))
{

$w=" `title` like '%".$_GET['keys']."%'" ;//ģ������
echo "�������!<br>";
}
else
{
$w=1;
}
if(!empty($_GET['limits']))
{
$tiaoshu=" limit ".$_GET['limits'];
}
else
{$tiaoshu='';}
$sql="select * from `zheng` where $w order by id desc $tiaoshu";
$quary=mysql_query($sql);
return $quary;
}
function pageurl()//�õ����·��+��ǰ�ļ���
{
$url=$_SERVER["REQUEST_URI"]; //��ȡ����������ĵ�ַ{��������}
$url=parse_url($url);//��URL�������й̶���ֵ������ĺ���
$url=$url["path"];//�������ת��Ϊ�����õ���Ե�ַ
return $url;
}

function pageinfo($getpage,$url="")//��ֹ���ָ�ҳ
{
$url=$url;
if($getpage>5)
{

echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==5)
{
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==4)
{
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==3)
{

echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==2)
{
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==1)
{
//echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-5).">".($getpage-5)."</a>|";
//echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-3).">".($getpage-3)."</a>|";
//echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}



}
$pagesize=10;//����ÿһҳ��ʾ������
$url=pageurl();//�õ���ǰ���·��
$sql=mysql_query("SELECT * FROM `zheng`");//��ִ��sqlȻ��ͳ������
$num = mysql_num_rows($sql);//��¼����
$countpage = ceil($num/10); //�����ҳ ��ȡ����
if(!empty($_GET["page"]))//ǿ����ת������ҳ����ҳ
{
$getpage=$_GET["page"];
$page=($getpage-1)*$pagesize;
}
else
{
    echo "<script language=\"javascript\">location.href='$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=1';</script>";
}

//�ù�ʽ����limitȡ��url��������
if($num > $pagesize)
{
 if($getpage<0)
 $getpage=1;
}
//������м�¼�������ڵ�ǰҳ��Ҫ��ʾ����������ô������limit��ǰ��
if($getpage<=1||$getpage=="1")
{//$page=0;$pagesize=11;
$sql1="select * from `zheng` order by id desc limit ".$pagesize;
}
else
{$sql1="select * from `zheng` order by id desc limit ".$page.",".$pagesize;//ִ��sql���
}
$query=mysql_query($sql1);
echo "<tr bgcolor=#00FF00><th>������".$num."������ ������ʱ�䵹��</th></tr>";

echo "<tr color=red><td>";
pageinfo($getpage);//����ǰҳ���ֺ���
echo $getpage."|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+1).">".($getpage+1)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+2).">".($getpage+2)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+3).">".($getpage+3)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+4).">".($getpage+4)."</a>|";
echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+5).">".($getpage+5)."</a>|<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+6).">".($getpage+6)."</a>";
echo "</td></tr>";


echo "<tr color=red><td>";

echo "<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage-1).">��ҳ</a>-<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".($getpage+1).">��ҳ</a>-
<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=1>��ҳ</a>-<a href=$url?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."&page=".$countpage.">βҳ</a>-<a href='search.php?userid=".$_GET["userid"]."&usersid=".$_GET["usersid"]."'>����</a>";

echo "</td></tr>";
//$rs=mysql_fetch_array($query);"."

while($rs=mysql_fetch_array($query))
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
<tr bgcolor=#FFFFFF>
<td><b>��ϵ���ǣ�</b>
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=694886526&site=qq&menu=yes">
<img border="0" src="http://wpa.qq.com/pa?p=2:694886526:52" alt="���������ҷ���Ϣ" title="���������ҷ���Ϣ"/></a>
694886526 �ֻ� 15576334267��13262274631 �ڽ������Ʒ����Ⱥ
<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=91b8ef925e87b9bfa684102ad572914c2debcbef2821587c6d39a93e52f45522">
<img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="�ڽ���ǨCF/QQ������" title="�ڽ���ǨCF/QQ������"></a>
106605356��Ǩ�ѣѻ����˹ٷ�����Ⱥ<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=932ecb4ed4f5e788c90d795e0fffef2303e59db637931328814b367470f4cbde">
<img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="��Ǩ�����˹ٷ�����Ⱥ" title="��Ǩ�����˹ٷ�����Ⱥ"></a> 298081857
</td>
</tr>
<tr bgcolor=#FFFFFF> <td><b>������ӣ�</b></td></tr>
<tr  bgcolor=#FFFFFF>
<td>
<table width=100% align="center">
<td><a href='http://51bwn.com/cf/update.html'>��Ǩ����</a>����ҳ</td>
<td>|<a href='http://tieba.baidu.com/f?kw=%BA%DA%BD%E7%CD%F8%C2%E7'>�ڽ�����</a>����</td>
<td>|<a href='http://shop108156197.taobao.com'>�ڽ�����</a>�Ա���</td>
<td>|<a href='http://tieba.baidu.com/p/3057401081'>��ǨQQ������</a>����ҳ</td><td>|<a href='http://wenwen.sogou.com/t/t818877.htm'>�ڽ�����</a>�����Ŷ�</td>
<td>|<a href='http://pan.baidu.com/share/home?uk=1044145898&view=share#category/type=0'>�ڽ�����</a>��Դ������</td>
<td>|<a href='http://51bwn.com/wapps/'>�ڽ����缯����Ƭ</a>��������</td>
</table>
</td>
</tr>
</table>
<?php require'foot.php';?>