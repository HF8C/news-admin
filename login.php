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
        <title>新闻管理页面</title>
        <link href="style/login.css" rel="stylesheet" type="text/css">
          
    </head>
    <body>
        
        <div id="wrapper">
            <h2>多模块新闻管理系统登录</h2>
            <div id="frm">
                <form action="logincheck.php" method="post">
                    <dl>
                        <dt><span>用户名</span></dt>
                        <dd><input type="text" class="txt" name="manage_name"/></dd>
                        <dt><span>密&nbsp;&nbsp;码</span></dt>
                        <dd><input type="password" class="txt" name="password"/></dd>
                        <p>
                            <input type="submit" class="btn" value="登录"/>
                            <input type="reset" value="重置" class="btn"/>
                        </p>
                    </dl>
                </form>
            </div>
            <div id="footer">
                <p><a href="http://www.cqvist.net/">重庆安全技术职业学院</a>计网专业 黄凤成</p>
            </div>
        </div>
    </body>
</html>
