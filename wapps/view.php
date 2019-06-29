<?php
$Directory = "photo";
function deleteDir($Directory){
 //检查目录是否存在，不存在则退出程序
 is_dir($Directory) or die("目录：  $Directory 不存在");
 //打开目录
 $handle = openDir($Directory);
 //循环遍历目录
 while(($file_name = readdir($handle))!==false){
  //文件路径
  $file_path = $Directory.DIRECTORY_SEPARATOR.$file_name;
  //如果目录为 . 或 .. 则不执行下面代码
  if($file_name!="." && $file_name!=".."){
   //如果是目录
   if(is_dir($file_path)){
    //调用函数本身，递归遍历所有目录和文件
    deleteDir($file_path);
   }else{
          echo $file_path."<br><img src=$file_path><br>";
    //删除文件
    //if(unlink($file_path)){
    // echo "<br>删除文件: $file_path 成功！";
    //}else{
  //die("<br>删除文件： $file_path 失败！");
    //}
   }
  }
 }
 //关闭文件
 closedir($handle);
 //删除目录
 //if(rmdir($Directory))
 //{
  //echo "删除目录： $Directory 成功！";
 //}
}
deleteDir($Directory);

echo "<br><a href=index.php>返回来源</a>";
?>