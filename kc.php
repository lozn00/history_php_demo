<?php
include("kc.html");
if(!@$f=fopen("num.txt","r"))//判断如果文件不存在则提示文件不存在。
//r为只读方式打开，文件不存在不能创建文件，但是加入@能单行屏蔽错误
{
 echo "文件不存在";
 $num=0;
}
 else
 {
  $num=fgets($f,10);//实际上获得9 ，fgets获得资源函数
  fclose($f);//释放资源缓冲，节省内存函数。
 }
 $num++;
 $ff=fopen("num.txt","w");
 //w，如果文件不存在则建立内容，鼠标指针光标在文件开头，文件存在则清空文件内容
 fwrite($ff,$num);
  fclose($ff);
  echo "<br><hr>当前页面访问次数为";
  $numarr=str_split($num);//此函数拆分数字为单个数组
      //print_r($numarr);
  //echo "<img src='img/".$num.".jpg'>"
  foreach($numarr as $z)
  { 
   echo "<img src='image/".$z.".png'>";
  }
?>