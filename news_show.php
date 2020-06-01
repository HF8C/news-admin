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
        <link href="style/news_show.css" rel="stylesheet" type="text/css">
        <title>新闻系统显示页</title>
    </head>
    <body>
        <?php
        include 'inc/conn.php';
        $module_id=$_GET["module_id"];
        $news_id=$_GET["news_id"];
        $query="update news_info set times=times+1 where id='$news_id'";
        mysql_query($query,$id);
        ?>
        <div id="wrapper">
           <?php include 'inc/header.php';?>
            <section id="page_main">
                <div class="newscont">
                    <h2>当前位置:&nbsp;<a href="index.php">首页</a>->
                        <?php
                        $query2="select module_name from module_info where id='$module_id'";
                        $result2=  mysql_query( $query2,$id);
                        $module=  mysql_fetch_array($result2,MYSQL_ASSOC);
                        echo "<a href=news_list.php?module_id=".$module_id.">".$module["module_name"]."</a>"
                        ?>
                        <span>
                            <?php
                            $query3="select * from news_info where id='$news_id'";
                            $result3=  mysql_query( $query3,$id);
                            $news=  mysql_fetch_array($result3,MYSQL_ASSOC);
                           echo "-&gt;";
                           echo $news["title"];
                            ?>
                        </span>
                    </h2>
                  <div class="content">
                      <h1>
                          <?php
                          $query3="select * from news_info where id='$news_id'";
                          $result3=  mysql_query( $query3,$id);
                          $news=  mysql_fetch_array($result3,MYSQL_ASSOC);
                          echo $news["title"];
                          ?>
                      </h1>
                      <h3>浏览次数：<?php echo $news["times"];?> 添加时间：<?php echo $news["add_time"];?></h3>
                      <?php echo $news["cont"];?>
                  </div>
                </div>
            </section>
            <?php include 'inc/footer.php';?>
        </div>
    </body>
</html>
