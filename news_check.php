<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="GB2312">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style/index.css" rel="stylesheet" type="text/css">
        <link href="style/news_check.css" rel="stylesheet" type="text/css">
        <title>新闻检索页</title>
    </head>
    <body>
        <?php
        include 'inc/conn.php';
        $key=$_POST["key"];
        $module_id=$_POST["module_id"];
        if($module_id!="")
            {
            $query="select module_name from module_info where id='$module_id'";
            $result=  mysql_query($query,$id);
            $module=  mysql_fetch_array($result,MYSQL_ASSOC);
            $module_name=$module["module_name"];
            }
       else {
           $module_name="全部";
            }
        ?>
        <div id="wrapper">
           <?php include 'inc/header.php';?>
            <section id="page_main">
             <div class="newslist">
                 <h2>当前位置:<a href="index.php">首页</a>->
                     <?php
                        $query1="select module_name from module_info where id='$module_id'";
                        $result1=  mysql_query( $query1,$id);
                        $module=  mysql_fetch_array($result1,MYSQL_ASSOC);
                        echo "<a href=news_list.php?module_id=".$module_id.">".$module["module_name"]."</a>"
                        ?>
                 </h2>
                    <h3>检索条件->检索关键字是：<span><?php echo $key;?></span>
                    检索范围是：<span><?php echo $module_name;?></span>
                    </h3>
                    <ul class="news">
                        <?php
                        $query2="select * from news_info where title like'%$key%'";
                        if($module_id!=0)
                        {
                            $query2.="and module_id ='$module_id'";
                            
                        }
                        $result2=  mysql_query( $query2,$id);
                        $i=0;
                        while ($news=  mysql_fetch_array($result2,MYSQL_ASSOC))
                        {
                           $i++;
                           ?>
                         <li>
                             <a href="news_show.php?news_id=<?php echo $news["id"]?> &module_id=<?php echo $news["module_id"]?>" target="_blank">
                                <?php echo $i."、".$news["title"]?></a>
                             <span><em>[<?php echo $news["times"]?>]</em><?php echo $news["add_time"]?></span>
                         </li>
                          <?php
                        }
                        ?>
                       
  
                    </ul>
                </div>
            </section>
            <?php include 'inc/footer.php';?>
        </div>
    </body>
</html>
