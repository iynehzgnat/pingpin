<?php

include_once("mysql.php");

    function addUser($username,$password,$name,$phone,$sex){
        getConnect();

        //插入用户主要信息
        $registerSQL1 = "INSERT INTO user VALUES('$username', '$password',0)";
        $res1 = mysql_query($registerSQL1);

        //插入用户其它信息
        $registerSQL2 = "INSERT INTO userinfo VALUES('$username', '$name', '$phone', '$sex')";
        $res2 = mysql_query($registerSQL2);

        //检测信息
        if($res1&&$res2){
            mysql_query("COMMIT");
        }
        else{
            mysql_query("ROLLBACK");  
            closeConnect();      
            echo "<script>alert('注册信息错误！');</script>";
            header("Refresh:0;url=../register.html");
            exit();
        }


        //检查数据是否插入成功
        $userSQL1 = "SELECT * FROM user WHERE username = '$username'";
        $userSQL2 = "SELECT * FROM userinfo WHERE username = '$username'";
    
        $userResult1 = mysql_query($userSQL1);
        $userResult2 = mysql_query($userSQL2);
    
        if (mysql_num_rows($userResult1) > 0 && mysql_num_rows($userResult2) > 0) {
            echo "<script>alert('用户注册成功');</script>";
            header("Refresh:0;url=../index.html");
        } 
        else {
            echo "<script>alert('用户注册失败');</script>";
            header("Refresh:0;url=../register.html");
        }

        closeConnect();
    }

    function updateUser($username,$password,$name,$phone,$sex){
        getConnect();

        //更新password
        $updateSQL1 = "UPDATE user set password = '$password' WHERE username = '$username' ";
        $res1 = mysql_query($updateSQL1);

        //更新name，phone，sex
        $updateSQL2 = "UPDATE userinfo set name = '$name', phone = '$phone', set sex = '$sex' WHERE username = '$username' ";
        $res2 = mysql_query($updateSQL2);

        //检测信息
        if($res1&&$res2){
            mysql_query("COMMIT");
        }
        else{
            mysql_query("ROLLBACK");
            closeConnect();        
            echo "<script>alert('修改信息错误！');</script>";
            header("Refresh:10;url=../home.html");
            exit();
        }

        //修改成功
        echo "<script>alert('修改成功！');</script>";
        header("Refresh:0;url=../home.html");
        closeConnect();
    }

    /*************************
     * 
     *   我的兼职
     *  （未完成）
     * 
     *************************/
    /*
    function myApplication($username){
        getConnect();
        //插入申请兼职信息
        $mySQL1 = "SELECT id FROM application WHERE username = $username" 
        "INSERT INTO application VALUES('$username', '$id', null)";
        $res1 = mysql_query($insertSQL1);
    
        //检测信息
        if($res1){
            mysql_query("COMMIT");
        }
        else{
            mysql_query("ROLLBACK");  
            closeConnect();      
            echo "<script>alert('申请兼职错误！');</script>";
            header("Refresh:10;url=../apply_detail.html");
            exit();
        }
    
        //检查申请兼职信息提交是否成功
        $appSQL1 = "SELECT * FROM application WHERE username = '$username'";
        
        $appResult1 = mysql_query($userSQL1);
        
        if (mysql_num_rows($userResult1) > 0) {
            echo "<script>alert('申请兼职成功,请等待回复');</script>";
            header("Refresh:0;url=../apply_detail.html");
        } 
        else {
            echo "<script>alert('申请兼职失败');</script>";
            header("Refresh:0;url=../apply_detail.html");
        }
    
        closeConnect();
    }*/
	
    function deleteUser($username){
        getConnect();

        //删除application表中的user项
        $deleteSQL3 = "DELETE FROM application WHERE username = '$username'";
        $res3 = mysql_query($deleteSQL3);

        //删除publishment表中的user项
        $deleteSQL4 = "DELETE FROM publishment WHERE username = '$username'";
        $res4 = mysql_query($deleteSQL4);


        //删除userinfo表中的user项
        $deleteSQL1 = "DELETE FROM userinfo WHERE username = '$username'";
        $res1 = mysql_query($deleteSQL1);

        //删除user表中的user项
        $deleteSQL2 = "DELETE FROM user WHERE username = '$username'";
        $res2 = mysql_query($deleteSQL2);



        //检测信息
        if($res1&&$res2&&$res3&&res4){
            mysql_query("COMMIT");
        }
        else{
            mysql_query("ROLLBACK");
            closeConnect();        
            echo "<script>alert('删除用户错误！');</script>";
            header("Refresh:10;url=../console.php");
            exit();
        }

        //修改成功
        echo "<script>alert('删除用户成功！');</script>";
        header("Refresh:0;url=../console.php");
        closeConnect();
    }

function setAdmin($username){
    getConnect();

    //更新password
    $updateSQL1 = "UPDATE user set role = 1 WHERE username = '$username' ";
    $res1 = mysql_query($updateSQL1);

    //检测信息
    if($res1){
         mysql_query("COMMIT");
    }
    else{
        mysql_query("ROLLBACK");
        closeConnect();        
        echo "<script>alert('设置管理员错误！');</script>";
        header("Refresh:10;url=../author.php");
         exit();
    }

    //修改成功
    echo "<script>alert('设置管理员成功！');</script>";
    header("Refresh:0;url=../author.php");
    closeConnect();
}




?>