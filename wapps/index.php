<?php
header("content-Type:text/html;charset=GB2312");
/* Ҫ��������ӡ���֣���ͷҪgb2312��header("content-Type:text/html;charset=GB2312");
�ļ�ȫ�����뱣��Ϊgb2312��
������Ҫ��ӡ�ĺ���ȴҪת��Ϊuft8����
$myname1=mb_convert_encoding($myname,"utf-8","GB2312"); */
//�����������ݿ�

//session����֪ʶ
//imagecreatefromjpegd��ȡͼ��
//imagecolorallocate����ҹɫ
//imagettftextд������������
//imagecopyͼƬ���ϣ��൱��ˮӡ��
//imagejpeg����ͼƬ����Ԥ��
if(!empty($_POST['sub']))
{
$ifempty=1;
//δ�ύ���ݽ�ֹ��ʾͼƬ������ύ���ˣ���ͨ����������while���Ҫ��ʾͼƬ��
$myname=$_POST['myname'];
$myarea=$_POST['myarea'];
$myqq=$_POST['myqq'];
$myphone=$_POST['myphone'];
$mywebsite=$_POST['mywebsite'];
$mysay=$_POST['mysay'];
$getjpg=imagecreatefromjpeg(dirname(__FILE__)."/tool/bg.jpg");//��ȡͼƬ�ز�
$namecolor=imagecolorallocate($getjpg,255,0,0);
$color=imagecolorallocate($getjpg,0,0,0);//����������ɫ
$myname1=mb_convert_encoding($myname,"utf-8","GB2312");//ת�����ݡ�gb2312תutf-8
//echo mb_detect_encoding($myname)."������ΪUFT-8";
$myarea1=mb_convert_encoding($myarea,"utf-8","GB2312");
//�����С���Ƕȡ�ͼƬx���꣬y���꣬��ɫ�������ļ�����д�������

imagettftext($getjpg,22,0,250,145,$namecolor,dirname(__FILE__)."/tool/hei.ttf",$myname1);
imagettftext($getjpg,12,0,240,190,$color,dirname(__FILE__)."/tool/hei.ttf",$myarea1);
imagettftext($getjpg,12,0,240,230,$color,dirname(__FILE__)."/tool/hei.ttf",$myphone);
imagettftext($getjpg,12,0,240,262,$color,dirname(__FILE__)."/tool/shuzi.ttf",$myqq);
imagettftext($getjpg,12,0,240,295,$color,dirname(__FILE__)."/tool/hei.ttf",$mywebsite);

//imagecopy($myname,$myqq,121,131,0,0,50,50);
//ԭͼ�㣬������ͼ�㣬x,y���꣬0,0�������ڿգ�50,50Ϊ�ļ���ȴ�С
//imagejpeg($getjpg,$myname.".jpg");//�����ļ�
$time=gmdate('YmdHis', time()); //���Ϊ��2007-03-14 04:15:27
$Directory="photo";
if(is_dir($Directory))
  {imagejpeg($getjpg,"photo/".$time.".jpg");//����ͼƬ
echo "<br>���Ի�ͼƬ�������";
unset($_POST);}
  else
  { create("photo");}//����Ŀ¼
 
 


}
else
{
echo "�ڽ����缯����Ƭ��������";
}
if(!empty($ifempty))
{
?>
<img src="<?php echo "photo/".$time.".jpg";?>">
<?php
echo "<br>������һ�����ͼƬ/��鿴���ص�ַ";
}





//$dir_name="tmp_data";
function create($dir_name)
{

if(mkdir($dir_name))//�ڵ�ǰĿ¼�´���Ŀ¼tmp_data
{
  echo"Ŀ¼".$dir_name."�����ڣ��Ѵ����ɹ�!����ˢ�º�������д��";
  
  //��Ŀ¼tmp_data�д���һ���ļ�tmp.txt,��������д��һЩ����
/*   if($fp=fopen($dir_name."/tmp.txt",'a'))
  {
     if(write($fp,"����Ŀ¼�������ļ���."))
        {
        echo"<hr>";
		}
		else
		{
        echo"��Ŀ¼".$dir_name."�´����ļ�tmp.txt";
        }
  } */
}
else
{
    echo"����ͼƬĿ¼photoʧ��!���Ҳ���޷�д��ͼƬ";
    exit;
}
}








?>
<form action="" method="post">
<!-- ����Ϊ���ر������ݵ�����hid������Ȼ��ʵ��ĳЩ����-->
����:<input type="text" name="myname" value="����" maxlength="5"><br>
��ַ:<input type="text" name="myarea" value="����ʡ¦�����»���ʯ�����ˮ�̴�" maxlength="25"><br>
�ֻ�:<input type="text" name="myphone" value="15576334267" maxlength="23"><br>
�ѣ�:<input type="text" name="myqq" value="694886526" maxlength="11"><br>
��ַ:<input type="text" name="mywebsite" value="http://51bwn.com" maxlength="25"><br>
�ں�:<input type="text" name="mysay" value="�����ɾ����룬֪ʶ�ı�δ��!" maxlength="14"><br>
<input type="submit" name="sub" value="�ύ��Ϣ">
</form>
<hr>
�������ͼƬ�쳣����������ɾ��photoĿ¼������ļ���<a href=del.php>����ɾ����</a>
<hr><a href="http://51bwn.com">��Ǩ��ҳ</a>-<a href="view.php">�鿴��������</a>
<hr>�ڽ����硢�ٺ٣�һ����������Ŷӡ����г�һ���������ĳ�Ϊһ�����š�һ����˾���ٺ٣���������ңԶŶ��QQ694886526�������롢�й�ͬ���õġ�Ҳ����־ͬ���ϵ����ѻ�ӭ����Ŷ��Ⱥ106605356

