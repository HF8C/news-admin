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
        <link href="style/news_list.css" rel="stylesheet" type="text/css">
        <title>新闻列表页</title>
    </head>
    <body>
             <?php 
         include 'inc/conn.php';
         $module_id=$_GET["module_id"];
         $page_id=$_GET["page_id"];
         if($page_id=="")
           {
             $page_id=1;
           }
           $query="select * from news_info where module_id='$module_id'";
           $result= mysql_query($query,$id);
           $datanum= mysql_num_rows($result);
           $page_size=5;
           $page_num=  ceil($datanum/$page_size);
           $start=$page_size*($page_id-1);
        ?>
        <div id="wrapper">
           <?php include 'inc/header.php';?>
            <section id="page_main">
                <div class="newslist">
                    <h2>当前位置:<a href="index.php">首页</a>->
                     <?php
                     $query2="select module_name from module_info where id= '$module_id'";
                     $result2=  mysql_query($query2,$id);
                     $module=  mysql_fetch_array($result2,MYSQL_ASSOC);
                     echo "<a href=news_list.php?module_id=".$module_id.">".$module["module_name"]."</a>";
                     ?>
                    </h2>
                    <h3>
                        <?php
                        for($i=1;$i<=$page_num;$i++)
                            {
                            echo "[<a href=?module_id=".$module_id."&page_id=".$i.">".$i."</a>]";
                            }
                        ?>
                        &nbsp;第<?php echo $page_id;?>页，共<?php echo $page_num;?>页
                    </h3>
                    <ul class="news">
                        <?php
                        $query3="select * from news_info where module_id='$module_id'"
                            . "order by add_time desc limit $start,$page_size";
                        $result3=  mysql_query( $query3,$id);
                        $i=0;
                        while($news=  mysql_fetch_array($result3,MYSQL_ASSOC))
                            {
                            $i++;
                            ?>
                        
                        <li>
                            <a href="news_show.php?news_id=<?php echo $news["id"]?>
                               &module_id=<?php echo $module_id?>" target="_blank">
                                <?php echo $i."、".$news["title"]?>
                            </a>
                            <span><em>[<?php echo $news["times"]?>]</em>
                                <?php echo $news["add_time"]?>
                            </span>
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
