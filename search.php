<?php require'top.php';?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="1" bgcolor="#fffeee" bordercolor="#00ff00">
<form action="" method="get">
<tr><td>����:<input type="text" name="limits" maxlength="5" size="2" value="20"></td></tr>
<tr><td>��:<select name="tiaojian">
<option value="title">����</option>
<option value="contents">����</option>
</select>
<tr><td>�ؼ���:<input type="text" name="keys" value="��Ǩ"></td></tr>
<tr><td><input type="submit" name="subs" value="����"></td></tr>
</form>
<!--<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">-->
<?php
include("config.php");//�����������ݿ�
$sql="select * from `zheng`";
if(!empty($_GET['keys']))
{
$ziduan=$_GET['tiaojian'];
if($ziduan!="contents")
{
$ziduan="title";
}
echo "�������!<br>";
$arr=explode(" ",$_GET['keys']);
$a=" where ".$ziduan." like '%".$arr[0]."%'" ;//ģ������
if(count($arr)<6) //�ո�ָ����Ҳ��ܴ���6������ñ���
{
for($i=1;$i<count($arr);$i++)
{
$a.=" or ".$ziduan." like '%".$arr[$i]."%'";

}
}


$sql.=$a;
//echo $sql;
//print_r($arr);



}
else
{
$w=1;
if(!empty($_GET['limits']))
{
$tiaoshu="limit 0,".$_GET['limits'];
}
else
{
$tiaoshu="limit 0,15";
}

$sql="select * from `zheng` where $w order by id $tiaoshu";

}

//echo $sql="select * from `zheng` where $w order by id desc limit 10";//��ѯ���У�������ʾ10��
$quary=mysql_query($sql);//queryִֻ��һ��sql���
//$rs=mysql_fetch_array($quary);
//$rs1=mysql_fetch_array($quary); print_r(rs1);
//ִ��һ��array��ѯһ�㣬 ִ�еڶ��εõ��Ķ��С�����д2���������Կ�Ч����
//mysql_fetch_array���Եõ�����Ҳ���Եõ���ֵrowֻ�ܵõ��±ꡣ������print_r���ԡ�

//iconv_substr($rs['contents'],0,5,"gbk")��ʼλ�����ȣ������ȡ5���ַ�������Ӣ�ĽԿ�
$key=@$_GET['keys'];
//if($key!="")
//{print_r($arr);}

while($rs=mysql_fetch_array($quary))
{
	$title=$rs['title'];
	$content=$rs['contents'];
	if($key!="")
	{

		for($i=0;$i<count($arr);$i++)
      {
      	$title=preg_replace("/($arr[$i])/","<b><font color=#ffffef>\\1</font></b>",$title);
      	$content=preg_replace("/($arr[$i])/","<b><font color=#ff00ff>\\1</font></b>",$content);
       }



	}


?>
 <tr bgcolor="#green"><td>����:<a href="view.php?id=<?php echo $rs["id"]."&userid=".@$_GET["userid"]."&usersid=".@$_GET["usersid"];?>"><?php echo $title;?></a>
</td></tr>
<tr bgcolor="#ffffff"><td>ʱ��:<?php echo $rs['dates']?></td></tr>
<tr bgcolor="#ffffff"><td>��������:<br>
<?php
echo iconv_substr($content,0,300,"gbk")."..";
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