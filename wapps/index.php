<?php
header("content-Type:text/html;charset=GB2312");
/* 要想正常打印汉字，表头要gb2312，header("content-Type:text/html;charset=GB2312");
文件全部编码保存为gb2312，
但是需要打印的汉字却要转换为uft8编码
$myname1=mb_convert_encoding($myname,"utf-8","GB2312"); */
//引用链接数据库

//session基本知识
//imagecreatefromjpegd读取图形
//imagecolorallocate创建夜色
//imagettftext写入带字体的文字
//imagecopy图片整合（相当于水印）
//imagejpeg生成图片或者预览
if(!empty($_POST['sub']))
{
$ifempty=1;
//未提交内容禁止显示图片，如果提交表单了，则通过变量告诉while语句要显示图片了
$myname=$_POST['myname'];
$myarea=$_POST['myarea'];
$myqq=$_POST['myqq'];
$myphone=$_POST['myphone'];
$mywebsite=$_POST['mywebsite'];
$mysay=$_POST['mysay'];
$getjpg=imagecreatefromjpeg(dirname(__FILE__)."/tool/bg.jpg");//读取图片素材
$namecolor=imagecolorallocate($getjpg,255,0,0);
$color=imagecolorallocate($getjpg,0,0,0);//设置字体颜色
$myname1=mb_convert_encoding($myname,"utf-8","GB2312");//转换内容、gb2312转utf-8
//echo mb_detect_encoding($myname)."检测编码为UFT-8";
$myarea1=mb_convert_encoding($myarea,"utf-8","GB2312");
//字体大小，角度、图片x坐标，y坐标，颜色，字体文件，欲写入的名字

imagettftext($getjpg,22,0,250,145,$namecolor,dirname(__FILE__)."/tool/hei.ttf",$myname1);
imagettftext($getjpg,12,0,240,190,$color,dirname(__FILE__)."/tool/hei.ttf",$myarea1);
imagettftext($getjpg,12,0,240,230,$color,dirname(__FILE__)."/tool/hei.ttf",$myphone);
imagettftext($getjpg,12,0,240,262,$color,dirname(__FILE__)."/tool/shuzi.ttf",$myqq);
imagettftext($getjpg,12,0,240,295,$color,dirname(__FILE__)."/tool/hei.ttf",$mywebsite);

//imagecopy($myname,$myqq,121,131,0,0,50,50);
//原图层，被覆盖图层，x,y坐标，0,0从哪里挖空，50,50为文件宽度大小
//imagejpeg($getjpg,$myname.".jpg");//生成文件
$time=gmdate('YmdHis', time()); //输出为：2007-03-14 04:15:27
$Directory="photo";
if(is_dir($Directory))
  {imagejpeg($getjpg,"photo/".$time.".jpg");//生成图片
echo "<br>个性化图片制作完成";
unset($_POST);}
  else
  { create("photo");}//创建目录
 
 


}
else
{
echo "黑界网络集团名片在线制作";
}
if(!empty($ifempty))
{
?>
<img src="<?php echo "photo/".$time.".jpg";?>">
<?php
echo "<br>请鼠标右击保存图片/或查看下载地址";
}





//$dir_name="tmp_data";
function create($dir_name)
{

if(mkdir($dir_name))//在当前目录下创建目录tmp_data
{
  echo"目录".$dir_name."不存在，已创建成功!，请刷新后重新填写。";
  
  //在目录tmp_data中创建一个文件tmp.txt,并向其中写入一些内容
/*   if($fp=fopen($dir_name."/tmp.txt",'a'))
  {
     if(write($fp,"创建目录并放入文件！."))
        {
        echo"<hr>";
		}
		else
		{
        echo"在目录".$dir_name."下创建文件tmp.txt";
        }
  } */
}
else
{
    echo"创建图片目录photo失败!因此也将无法写入图片";
    exit;
}
}








?>
<form action="" method="post">
<!-- 上面为隐藏表单，传递到上面hid变量，然后实现某些功能-->
姓名:<input type="text" name="myname" value="罗正" maxlength="5"><br>
地址:<input type="text" name="myarea" value="湖南省娄底市新化县石冲口镇潮水铺村" maxlength="25"><br>
手机:<input type="text" name="myphone" value="15576334267" maxlength="23"><br>
ＱＱ:<input type="text" name="myqq" value="694886526" maxlength="11"><br>
网址:<input type="text" name="mywebsite" value="http://51bwn.com" maxlength="25"><br>
口号:<input type="text" name="mysay" value="技术成就梦想，知识改变未来!" maxlength="14"><br>
<input type="submit" name="sub" value="提交信息">
</form>
<hr>
如果制作图片异常，请点击这里删除photo目录下面的文件，<a href=del.php>请点击删除。</a>
<hr><a href="http://51bwn.com">情迁首页</a>-<a href="view.php">查看网友制作</a>
<hr>黑界网络、嘿嘿，一个有梦想的团队、望有朝一天能真正的成为一个集团、一个公司，嘿嘿，这个梦想很遥远哦！QQ694886526、有理想、有共同爱好的、也就是志同道合的朋友欢迎加入哦！群106605356

