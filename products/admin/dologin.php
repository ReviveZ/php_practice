<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/28 12:06
 */
require_once '../include.php';
$username=$_POST['user'];
$username=addslashes($username);
$password=md5($_POST['pwd']);
    $sql="select * from user29 where u_id='{$username}' and u_passwd='{$password}'";
    $row=checkAdmin($link,$sql);
    if($row){
        $_SESSION['adminName']=$username;
        $_SESSION['id']=$row['u_id'];
        $sql1= "update user29 set u_status='up' where u_id ='{$username}'";
        if(updateOne($link,$sql1)){
            alertMes("登陆成功","../manage/manage_products.php");
        }else{
            alertMes("登陆失败，重新登陆","../manage/menage_login.php");
        }
    }else{
        alertMes("登陆失败，重新登陆","../manage/menage_login.php");
    }
