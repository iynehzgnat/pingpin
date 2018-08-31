<?php
  session_start();

  if(!isset($_SESSION['log']) || empty($_SESSION['log'])|| $_SESSION['log']!=1){
    echo "<script>alert('请先登陆！');</script>";
    header("Refresh:0;url=index.html");
    exit();
  }
?>
<!doctype html>
<html>

<head>
    <title>兼职详情</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="detail.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>

<body>
    <div id="header">
        <div class="width_limit">
            <a class="logo" href="#home">
                <img id="logo_img" src="logo.png" alt="logo">
            </a>
            <div class="logoutdiv">
                <a href="index.html" class="header_tab logout">退出登录</a>
            </div>
            <div class="search">
                <form action="">
                    <input id="search_input" type="text" title="在此处输入搜索内容" placeholder="搜索相关兼职">
                    <a id="search_btn" href="#">
                        <img src="search-btn.png" alt="search" style="width: 25px;height: 25px;">
                    </a>
                </form>
            </div>
            <ul>
                <li>
                    <a href="home.html">首页</a>
                </li>
                <li>
                    <a href="#">申请兼职</a>
                </li>
                <li>
                    <a href="#">发布兼职</a>
                </li>
                <li>
                    <a href="#my" class="dropbtn">我的兼职</a>
                </li>
            </ul>
    
        </div>
    </div>

    <div id="content">
        <div id="content_abstract">
            <h1 id="pt_title">罗凡数学家教</h1>
            <div id="salary">150元/节</div>
        </div>
            
        <div id="cotent_detail">
            <div class="content_header">
                <span id="sub_title">兼职详情</span>
                <hr>
            </div>
            <div class="row">
                <span class="sub_title2">【工作内容】</span>
                <br>
                <span class="sub_content2">教授罗凡小朋友数学</span>
            </div>
            <div class="row">
                <span class="sub_title2">【工作要求】</span>
                <br>
                <span class="sub_content2">男男男</span>
            </div>
            <div class="row">
                <span class="sub_title2">【工作时间】</span>
                <br>
                <span class="sub_content2">17:00--19:00每周五</span>
            </div>
            <div class="row">
                <span class="sub_title2">【工作地点】</span>
                <br>
                <span class="sub_content2">华南理工大学C10-216</span>
            </div>
            <div class="row">
                <span class="sub_title2">【薪资待遇】</span>
                <br>
                <span class="sub_content2">120元/天</span>
            </div>
            <div class="row">
                <span class="sub_title2">【报名人数】</span>
                <br>
                <span class="sub_content2">12人</span>
            </div>
    </div>

</body>

</html>