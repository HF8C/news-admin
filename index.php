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
        <title>前台首页</title>
    </head>
    <body>
        
        <?php include 'inc/conn.php';?>
        <div id="wrapper">
           <?php 
           include 'inc/header.php';
           ?>
            <section id="page_main">
                <?php
                 $query2="select * from module_info order by show_order";
                 $result2=  mysql_query($query2,$id);
                   while ($module2=  mysql_fetch_array($result2,MYSQL_ASSOC))
                   {
                       ?>
                 <div class="cont">
                     <h2><?php echo $module2["module_name"];?><a href="news_list.php?module_id=<?php echo $module2["id"]?>">更多...</a></h2>
                    <ul class="cont_list">
                        <?php 
                           $query3="select * from news_info where module_id='$module2[id]'"
                               . "order by add_time desc limit 0,5";
                           $result3=  mysql_query($query3,$id);
                           if(mysql_num_rows($result3)==0)
                               {
                               echo "<p>暂无相关新闻</p>";
                               }
                               else {
                               $i=0;
                           while ($new=  mysql_fetch_array($result3,MYSQL_ASSOC))
                           {
                               $i++;
                              ?>
                        <li><a href="news_show.php?news_id=<?php echo $new["id"]?>&module_id=<?php echo $module2["id"]?>">
                                <?php echo $i."、";?>&nbsp;<?php echo $new["title"]?>
                            </a>
                            <span><em>[<?php echo $new["times"]?>]</em><?php echo $new["add_time"]?></span></li>
                              <?php
                           } }
                        ?>
                       
                    </ul>
                </div>
                       <?php
                  }
                ?>
            </section>
            <?php include 'inc/footer.php';?>
        </div>
    </body>
</html>
