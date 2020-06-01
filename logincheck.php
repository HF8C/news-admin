<?php
session_start();
include ("inc/conn.php");
$manage_name=$_POST["manage_name"];
$password=$_POST["password"];
//如果是点击“登录”后，则进行验证用户身份
if($manage_name!="" and $password!="")
   {
     //检验用户名是否存在
    $query="select * from manage_user_info where manage_name='$manage_name'";
    $rst=  mysql_query($query,$id);
    if(mysql_num_rows($rst)==0)
        {
        echo "<script>alert('用户名不存在！');location.href='login.php';</script>";
        }
   else {
     $info=  mysql_fetch_array($rst,MYSQL_ASSOC);
     if($info["password"]!=$password)
         {
         echo "<script>alert('密码不正确！');location.href='login.php';</script>";
         }
    else {
        //注册session做后台管理页登录的身份验证
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
      echo "<script>alert('用户名或密码不能为空！');location.href='login.php';</script>" ; 
      }
