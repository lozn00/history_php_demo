<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="red">
<?php
include("config.php");//�����������ݿ�
if(!empty($_GET['userid'])&&!empty($_GET['usersid']))
{
$user_sql="SELECT * from zheng_user WHERE username='admin' and usersid='".$_GET['usersid']."'";
$run_sql=mysql_query($user_sql);//ִ��sql���
$shuzu_sid=mysql_fetch_array($run_sql);//��ԴתΪ���飬��ʾ��ϸ������Ϣ��
//print_r($shuzu_sid);//�鿴������Ϣ
 if($_GET['userid']==$shuzu_sid['userid'] && $_GET['usersid']==$shuzu_sid['usersid'])
 {
 echo "<tr bgcolor=green><td>�װ�����Ǩ����ӭ�����̨����</td></tr>";
echo "<tr><td>�ҵ�ID:".$shuzu_sid[userid]."</td></tr>";
echo "<tr><td>�û���:".$shuzu_sid[username]."</td></tr>";
echo "<tr><td>�ҵ��ǳ�:".$shuzu_sid[nickname]."</td></tr>";
function pageurl()//�õ����·��+��ǰ�ļ���
{
$url=$_SERVER["REQUEST_URI"]; //��ȡ����������ĵ�ַ{��������}
$url=parse_url($url);//��URL�������й̶���ֵ������ĺ���
$url=$url[path];//�������ת��Ϊ�����õ���Ե�ַ
return $url;
}
$url=pageurl();//�õ���ǰ���·��
echo "<tr><td><a href='add.php?userid=".$shuzu_sid[userid]."&usersid=".$shuzu_sid[usersid]."'>��������</a></td></tr>";
echo "<form action='$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=1'";
print <<< END1
 " method="post">
<tr><td>����:<input type="text" name="limits" maxlength="5" size="2"></td></tr>
<tr><td>�ؼ���:<input type="text" name="keys"></td></tr>
<tr><td><input type="submit" name="subs" value="����"></td></tr>
</form>
END1;


if(!empty($_POST['keys']))
{

$w=" `title` like '%".$_POST['keys']."%'"."or `content` like '%".$_POST['keys']."%'" ;//ģ������
$sql1="select * from `zheng` where".$w;
echo $sql1;
echo "<tr><td>�������!</td></tr>";
}
else
{

function pageinfo($getpage)//��ֹ���ָ�ҳ
{

if($getpage>5)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==5)
{
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==4)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==3)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==2)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==1)
{
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-6).">".($getpage-6)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-5).">".($getpage-5)."</a>|";
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-3).">".($getpage-3)."</a>|";
//echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}



}
$pagesize=10;//����ÿһҳ��ʾ������
//$url=pageurl();//�õ���ǰ���·��
$sql=mysql_query("SELECT * FROM `zheng`");//��ִ��sqlȻ��ͳ������
$num = mysql_num_rows($sql);//��¼����
$countpage = ceil($num/10); //�����ҳ ��ȡ����
if(!empty($_GET[page]))//ǿ����ת������ҳ����ҳ
{
$getpage=$_GET[page];
$page=($getpage-1)*$pagesize;
}
else
{
    echo "<script language=\"javascript\">location.href='$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=1';</script>";
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
$sql1="select * from `zheng` order by dates desc limit ".$pagesize;
}
else
{$sql1="select * from `zheng` order by id desc limit ".$page.",".$pagesize;//ִ��sql���
}
echo "<tr bgcolor=red><td>������".$num."������</td></tr>";
echo "<tr color=red><td>";
pageinfo($getpage);//����ǰҳ���ֺ���
echo $getpage."|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+1).">".($getpage+1)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+2).">".($getpage+2)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+3).">".($getpage+3)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+4).">".($getpage+4)."</a>|";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+5).">".($getpage+5)."</a>|<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+6).">".($getpage+6)."</a>";
echo "</td></tr>";
echo "<tr color=red><td>";
echo "<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage-1).">��ҳ</a>-<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".($getpage+1).">��ҳ</a>-
<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=1>��ҳ</a>-<a href=$url?userid=$_GET[userid]&usersid=$_GET[usersid]&page=".$countpage.">βҳ</a>-<a href='search.php'>����</a>";
echo "</td></tr>";

}

/* if(!empty($_GET['limits']))
{
$tiaoshu=" limit ".$_GET['limits'];
}
else
{$tiaoshu='';}
$sql="select * from `zheng` where $w order by id desc $tiaoshu";
$quary=mysql_query($sql);
return $quary; */
//}


$query=mysql_query($sql1);
while($rs=mysql_fetch_array($query))
{
?>
<tr color="green"><td>����:<a href="view.php?id=<?php echo $rs['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid'];?>"><?php echo $rs['title'];?></a>
</td></tr>
<tr><td><a href="modify.php?id=<?php
echo $rs['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid']
?>">�༭</a>|<a href="del.php?del=
<?php echo $rs['id']."&userid=".$_GET['userid']."&usersid=".$_GET['usersid'];?>">ɾ��</a>
</td></tr>
<tr><td>ʱ��:<?php echo $rs['dates']?></td></tr>
<tr bgcolor=#green><td>����:
<?php
echo iconv_substr($rs['contents'],0,9,"gbk")."..</td></tr>";
//echo $rs['contents']
?>
<?php
}

 }
 else
 {echo "<tr><td>id��������������<br><a href='admin.php'>���µ�½</a></td></tr>";}
}
else
{
echo "<tr><td>sid�����û�id����û�ж�ȡ������<a href='admin.php'>���µ�½</a></td></tr>";
}
?>
</table>
<?php require'foot.php';?>