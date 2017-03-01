<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/28 13:01
 */
function checkadmin($link ,$sql)
{
    return fetchOne($link ,$sql);
}
function checklogined(){
    if(@$_SESSION['id']==''){
        alertMes("请先登录",'../manage/menage_login.php');
    }
}
function logout($link){


    $id =$_SESSION['id'];
    $sql ="update user29 set u_status='down' where u_id='{$id}'";
    updateOne($link,$sql);
    $_SESSION=array();

    if(isset($_COOKIE[session_name()])){

        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
}

function addAdmin($link)
{
    if (empty($_POST['u_id']) or empty($_POST['u_passwd']) or empty($_POST['u_contact'])) {
        alertMes('添加失败，请填写必填项', 'add_user.php');
    } else {
        $arr = $_POST;
        $arr['u_passwd'] = md5($_POST['u_passwd']);
        $arr['u_create'] = date('Y-m-d');
        $arr['u_update_time'] = date('Y-m-d G;i:s');

        if (insert($link, "user29", $arr)) {
            alertMes('添加成功', '../manage/system_user.php');
        } else {
            alertMes('添加失败', '../manage/add_user.php');;
        }
    }
}

function getByPage($link,$sql, $page,$pageSize=2){

    $totalRows=getResultNum($link, $sql);
    $totalPage=ceil($totalRows/$pageSize);
    if($page<1||$page==null||!is_numeric($page)){
        $page=1;
    }
    if($page>=$totalPage)$page=$totalPage;
    $offset=($page-1)*$pageSize;
    $sql=$sql." limit {$offset},{$pageSize}";
    $rows=fetchAll($link,$sql);
//    if(!$rows){
//       return alertMes("sorry，无信息！","manage_product.php");
//    }
//    else
        return $rows;
}


//编辑管理员

function editAdmin($link,$id,$where){

    $sql="select * from user29 where u_id='{$id}'";
    $arr=fetchOne($link,$sql);

    if(!empty($_POST['u_passwd']))
    {
        $arr['u_passwd']=md5($_POST['u_passwd']);
    }
    if(!empty($_POST['u_name']))
    {
        $arr['u_name']=$_POST['u_name'];
    }
    if(!empty($_POST['u_contact']))
    {
        $arr['u_contact']=$_POST['u_contact'];
    }
    if(!empty($_POST['u_ident']))
    {
        $arr['u_ident']=$_POST['u_ident'];
    }

    $arr['u_update_time'] = date('Y-m-d G:i:s');

        if(update($link,"user29",$arr,"u_id='".$id."'")){
        alertMes("更改成功！",$where);
    }else{
        alertMes("更改失败",$where);
    }

}




function addUser($link){
    if (empty($_POST['u_id']) or empty($_POST['u_passwd']) or empty($_POST['u_contact'])) {
        alertMes('添加失败，请填写必填项', 'add_user.php');
    } else {
        $arr = $_POST;
        $arr['u_passwd'] = md5($_POST['u_passwd']);
        $arr['u_create'] = date('Y-m-d');
        $arr['u_update_time'] = date('Y-m-d G;i:s');

        if (insert($link, "usernor29", $arr)) {
            alertMes('添加成功', '../manage/system_people.php');
        } else {
            alertMes('添加失败', '../manage/add_people.php');;
        }
    }
}
//删除用户的操作

function delUser($link,$id,$where){
    if($id != 'super'){
    $sql1 ="select * from order29 where o_op = '{$id}'";
    if(fetchAll($link,$sql1)){
        $res = delete($link,"DELETE from order29 where o_op='{$id}'");
        if(!$res){
            alertMes('删除失败',$where);
        }
    }
    $sql2 ="select * from products29 where prod_peo = '{$id}'";
    if(fetchAll($link,$sql2)){
        $res = delete($link,"DELETE from products29 where prod_peo='{$id}'");
        if(!$res){
            alertMes('删除失败',$where);
        }
    }
    $sql3 ="select * from notcie29 where n_op = '{$id}'";
    if(fetchAll($link,$sql3)){
        $res = delete($link,"DELETE from notice29 where n_op='{$id}'");
        if(!$res){
            alertMes('删除失败',$where);
        }
    }
    $sql4 ="select * from message29 where m_op = '{$id}'";
    if(fetchAll($link,$sql4)){
        $res = delete($link,"DELETE from message29 where m_op='{$id}'");
        if(!$res){
            alertMes('删除失败',$where);
        }
    }
    $sql5 ="select * from comment29 where c_op = '{$id}'";
    if(fetchAll($link,$sql5)){
        $res = delete($link,"DELETE from comment29 where c_op='{$id}'");
        if(!$res){
            alertMes('删除失败',$where);
        }
    }else{
        alertMes("此用户不可删除",$where);
    }
    }

    $sql="DELETE from user29 where u_id='{$id}'";
    if(delete($link,$sql)){
        alertMes('删除成功',$where);
    }else{
        alertMes('删除失败',$where);
    }
}
// 编辑用户的操作

function editUser($link,$id,$where){
    $sql="select * from usernor29 where u_id='{$id}'";
    $arr=fetchOne($link,$sql);

    if(!empty($_POST['u_passwd']))
    {
        $arr['u_passwd']=md5($_POST['u_passwd']);
    }
    if(!empty($_POST['u_name']))
    {
        $arr['u_name']=$_POST['u_name'];
    }
    if(!empty($_POST['u_contact']))
    {
        $arr['u_contact']=$_POST['u_contact'];
    }

    $arr['u_update_time'] = date('Y-m-d G:i:s');

    if(update($link,"usernor29",$arr,"u_id='".$id."'")){
        alertMes("更改成功！",$where);
    }else{
        alertMes("更改失败",$where);
    }

}
function delPeople($link,$id,$where){
    $sql1 ="select * from order29 where o_user = '{$id}'";
    if(fetchAll($link,$sql1)){
        $res = delete($link,"DELETE from order29 where o_user='{$id}'");
        if(!$res){
            alertMes('删除订单失败',$where);
        }
    }
    alertMes("chenggong",$where);
    $sql="DELETE from usernor29 where u_id='{$id}'";
    if(delete($link,$sql)){
        alertMes('删除成功',$where);
    }else{
        alertMes('删除用户失败',$where);
    }
}

