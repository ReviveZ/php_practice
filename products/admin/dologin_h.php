<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/28 16:36
 */
require_once '../include.php';
$username=$_POST['user'];
$username=addslashes($username);
$password=md5($_POST['pwd']);

@$autoFlag=$_POST['autoFlag'];

    $sql="select * from user29 where u_id='{$username}' and u_passwd='{$password}'";
    $row=checkAdmin($link,$sql);
    if($row){
        //如果选了一周内自动登陆
        if($autoFlag){
            setcookie("Id",$row['u_id'],time()+7*24*3600);
            setcookie("adminName",$row['u_name'],time()+7*24*3600);
        }
        $_SESSION['adminName']=$row['username'];
        $_SESSION['adminId']=$row['id'];
        alertMes("登陆成功","home.html");
    }else{
        alertMes("登陆失败，重新登陆","../login.php");
    }
