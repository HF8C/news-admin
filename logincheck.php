<?php
session_start();
include ("inc/conn.php");
$manage_name=$_POST["manage_name"];
$password=$_POST["password"];
//����ǵ������¼�����������֤�û����
if($manage_name!="" and $password!="")
   {
     //�����û����Ƿ����
    $query="select * from manage_user_info where manage_name='$manage_name'";
    $rst=  mysql_query($query,$id);
    if(mysql_num_rows($rst)==0)
        {
        echo "<script>alert('�û��������ڣ�');location.href='login.php';</script>";
        }
   else {
     $info=  mysql_fetch_array($rst,MYSQL_ASSOC);
     if($info["password"]!=$password)
         {
         echo "<script>alert('���벻��ȷ��');location.href='login.php';</script>";
         }
    else {
        //ע��session����̨����ҳ��¼�������֤
        $_SESSION["manage_name"]=$info["manage_name"];
        $today=date("Y-m-d H:i:s");
        $query ="update manage_user_info set last_time='$today'"
            . "where manage_name='$manage_name' and password='$password'";
    mysql_query($query,$id);
    echo "<script>location.href='manage/index.php';</script>";
         }
        }
    }
 else {
      echo "<script>alert('�û��������벻��Ϊ�գ�');location.href='login.php';</script>" ; 
      }
