<?php
$Directory = "photo";
function deleteDir($Directory){
 //���Ŀ¼�Ƿ���ڣ����������˳�����
 is_dir($Directory) or die("Ŀ¼��  $Directory ������");
 //��Ŀ¼
 $handle = openDir($Directory);
 //ѭ������Ŀ¼
 while(($file_name = readdir($handle))!==false){
  //�ļ�·��
  $file_path = $Directory.DIRECTORY_SEPARATOR.$file_name;
  //���Ŀ¼Ϊ . �� .. ��ִ���������
  if($file_name!="." && $file_name!=".."){
   //�����Ŀ¼
   if(is_dir($file_path)){
    //���ú��������ݹ��������Ŀ¼���ļ�
    deleteDir($file_path);
   }else{
          echo $file_path."<br><img src=$file_path><br>";
    //ɾ���ļ�
    //if(unlink($file_path)){
    // echo "<br>ɾ���ļ�: $file_path �ɹ���";
    //}else{
  //die("<br>ɾ���ļ��� $file_path ʧ�ܣ�");
    //}
   }
  }
 }
 //�ر��ļ�
 closedir($handle);
 //ɾ��Ŀ¼
 //if(rmdir($Directory))
 //{
  //echo "ɾ��Ŀ¼�� $Directory �ɹ���";
 //}
}
deleteDir($Directory);

echo "<br><a href=index.php>������Դ</a>";
?>