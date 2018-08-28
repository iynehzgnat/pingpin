<?php
    include_once("mysql.php");
    include_once("easySecure.php");
    include_once("../assets/api/User.php");

    function checklen($str,$name,$len){
        if(mb_strlen($str,'utf8')>$len){
            $show=$name."长度不能超过".$len."!";
            echo "<script>alert('$show');</script>";
            header("Refresh:0;url=../hiring.html");
            exit();
        }
    }

    $len1=20;
    $len2=15;
    $len3=18;

    if (empty($_POST)) {	
        echo "<script type='text/javascript' src='../js/popwindow.js'>pupopTip('200px','120px','数据超过post_max_size!','../images/error.png','25px');</script>";
        header("Refresh:0;url=../register.html");
        exit();
    }

    $username =lib_replace_end_tag($_POST['username']) ;
    checklen($username,"用户名",$len1);

    if ($username == null){
        echo "<script type='text/javascript' src='../js/popwindow.js'>pupopTip('200px','120px','请输入用户名！','../images/error.png','25px');</script>";
        header("Refresh:0;url=../register.html");
        exit();
    }

    $password = lib_replace_end_tag($_POST['password']);
    checklen($password,"密码",$len2);

    $verify = lib_replace_end_tag($_POST['verify']);
    checklen($verify,"确认密码",$len2);

    if ($password == null||$verify == null){
        echo "<script type='text/javascript' src='../js/popwindow.js'>pupopTip('200px','120px','请输入密码!','../images/error.png','25px');</script>";
        header("Refresh:0;url=../register.html");
        exit();
    }

    if ($password != $verify) {
        echo "<script type='text/javascript' src='../js/popwindow.js'>pupopTip('200px','120px','输入的密码与确认密码不相等！','../images/error.png','25px');</script>";
        header("Refresh:0;url=../register.html");
        exit();
    }

    $name = lib_replace_end_tag($_POST['name']);
    checklen($name,"真实姓名",$len2);


    $phone = lib_replace_end_tag($_POST['phone']);  
    checklen($phone,"联系电话",$len3);

    $sex = lib_replace_end_tag($_POST['sex']);
    checklen($sex,"性别",$len2);

    


    $userNameSQL = "SELECT * FROM user WHERE username = '$username'";
    getConnect();
    $resultSet = mysql_query($userNameSQL);
    if (mysql_num_rows($resultSet) > 0) {
        echo "<script type='text/javascript' src='../js/popwindow.js'>pupopTip('200px','120px','用户名已被占用<br>请更换其他用户名','../images/error.png','25px');</script>";
        header("Refresh:0;url=../register.html");
        exit();
	
    }

    addUser($username,$password,$name,$phone,$sex);
?>