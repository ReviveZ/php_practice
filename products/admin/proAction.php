<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/28 23:26
 */
// 添加商品

function addPro($link)
{

    if(empty($_POST['prod_id']) or empty($_POST['prod_name']) or empty($_POST['prod_sale']) or empty($_POST['prod_num']) or empty($_POST['prod_cost'])) {
        alertMes("添加失败，请填入必选项", "../manage/add_product.php");

    } else {
        $arr = $_POST;
        $arr['prod_profit'] = $_POST['prod_sale']-$_POST['prod_cost'];
        $arr['prod_peo'] = $_SESSION['id'];
        $arr['prod_in_time'] = date('Y-m-d');
        $arr['prod_updata_time'] = date('Y-m-d G;i:s');
        $res = insert($link, "products29", $arr);
        if ($res) {
            alertMes("添加成功！", "../manage/add_product.php");
        } else {
            alertMes("添加失败！", "../manage/add_product.php");
        }
    }

}
//编辑商品

function editPro($link,$id,$where){
    $sql="select * from products29 where prod_id='{$id}'";
    $arr=fetchOne($link,$sql);
    if(!empty($_POST['prod_name']))
    {
        $arr['prod_name']=$_POST['prod_name'];
    }
    if(!empty($_POST['prod_sale']))
    {
        $arr['prod_sale']=$_POST['prod_sale'];
    }
    if(!empty($_POST['prod_num']))
    {
        $arr['prod_num']=$_POST['prod_num'];
    }
    if(!empty($_POST['prod_cost']))
    {
        $arr['prod_cost']=$_POST['prod_cost'];
    }
    if(!empty($_POST['prod_img']))
    {
        $arr['prod_img']=$_POST['prod_img'];
    }
    if(!empty($_POST['prod_introduce']))
    {
        $arr['prod_introduce']=$_POST['prod_introduce'];
    }
    if(!empty($_POST['prod_mold']))
    {
        $arr['prod_mold']=$_POST['prod_mold'];
    }
    if(!empty($_POST['prod_status']))
    {
        $arr['prod_status']=$_POST['prod_status'];
    }

    if($arr['prod_sale'] > $arr['prod_cost']){
        $arr['prod_profit'] = $arr['prod_sale']-$arr['prod_cost'];
    }
    $arr['prod_updata_time'] = date('Y-m-d G:i:s');
    $arr['prod_peo'] = $_SESSION['id'];

   $res=update($link,"products29",$arr,"prod_id='".$id."'");

    if($res){

        alertMes("编辑成功!",$where);
    }else{

        alertMes("编辑失败!","../manage/change_products.php?id={$id}");

    }

}

function delPro($link,$id,$where){
    $sql1 ="select * from group29 where g_p1 = '{$id}'";
    if(fetchAll($link,$sql1)){
        $res = delete($link,"DELETE from group29 where g_p1='{$id}'");
        if(!$res){
            alertMes('删除订单失败',$where);
        }
    }
    $sql2 ="select * from group29 where g_p2 = '{$id}'";
    if(fetchAll($link,$sql2)){
        $res = delete($link,"DELETE from group29 where g_p2='{$id}'");
        if(!$res){
            alertMes('删除订单失败',$where);
        }
    }
    $sql3 ="select * from group29 where g_p3 = '{$id}'";
    if(fetchAll($link,$sql3)){
        $res = delete($link,"DELETE from group29 where g_p3='{$id}'");
        if(!$res){
            alertMes('删除订单失败',$where);
        }
    }
    $sql4 ="select * from group29 where g_p4= '{$id}'";
    if(fetchAll($link,$sql4)){
        $res = delete($link,"DELETE from group29 where g_p4='{$id}'");
        if(!$res){
            alertMes('删除订单失败',$where);
        }
    }
    $sql5 ="select * from order29 where o_prod = '{$id}'";
    if(fetchAll($link,$sql5)){
        $res = delete($link,"DELETE from order29 where o_prod='{$id}'");
        if(!$res){
            alertMes('删除订单失败',$where);
        }
    }
    $sql6 ="select * from comment29 where c_prod = '{$id}'";
    if(fetchAll($link,$sql6)){
        $res = delete($link,"DELETE from comment29 where c_prod='{$id}'");
        if(!$res){
            alertMes('删除订单失败',$where);
        }
    }
    $sql= "delete from products29 where prod_id = '{$id}'";
    $res=delete($link,$sql);
    if($res){
        alertMes("删除成功!",$where);
    }else{
        alertMes("删除失败!",$where);

    }

}


function getAllPro($link){
    $sql="select * from products29";
    $rows=fetchAll($link,$sql);
    return $rows;
}


function addGroP($link){
    if(empty($_POST['g_id']) or empty($_POST['g_name']) or empty($_POST['g_sale'])  or empty($_POST['g_status'])) {
        alertMes("添加失败，请填入必选项", "../manage/add_group.php");
    } else {
        if(!empty($_POST['g_p1']) ){
            $sql = "select prod_id from products29 WHERE prod_id='{$_POST['g_p1']}'";
            if(!fetchOne($link,$sql)){
                alertMes(alertMes("商品1无此产品！", "../manage/add_group.php"));
            }
        }
        if(!empty($_POST['g_p2']) ){
            $sql = "select prod_id from products29 WHERE prod_id='{$_POST['g_p2']}'";
            if(!fetchOne($link,$sql)){
                alertMes(alertMes("商品1无此产品！", "../manage/add_group.php"));
            }
        }
        if(!empty($_POST['g_p3']) ){
            $sql = "select prod_id from products29 WHERE prod_id='{$_POST['g_p3']}'";
            if(!fetchOne($link,$sql)){
                alertMes(alertMes("商品1无此产品！", "../manage/add_group.php"));
            }
        }
        if(!empty($_POST['g_p4']) ){
            $sql = "select prod_id from products29 WHERE prod_id='{$_POST['g_p4']}'";
            if(!fetchOne($link,$sql)){
                alertMes(alertMes("商品1无此产品！", "../manage/add_group.php"));
            }
        }
        $arr = $_POST;
        $arr['g_create'] = date('Y-m-d');
        $res = insert($link, "group29", $arr);
        if ($res) {
            alertMes("添加成功！", "../manage/add_group.php");
        }else{
            alertMes("添加失败！", "../manage/add_group.php");
        }
    }
}
function editGroP($link,$id,$where){
    $sql="select * from group29 where g_id='{$id}'";
    $arr=fetchOne($link,$sql);
    if(!empty($_POST['g_name']))
    {
        $arr['g_name']=$_POST['g_name'];
    }
    if(!empty($_POST['g_sale']))
    {
        $arr['g_sale']=$_POST['g_sale'];
    }
    if(!empty($_POST['g_p1']) ){
        $sql = "select prod_id from products29 WHERE prod_id='{$_POST['g_p1']}'";
        if(!fetchOne($link,$sql)){
            alertMes(alertMes("商品1无此产品！", "../manage/add_group.php"));
            }
    $arr['g_p1']=$_POST['g_p1'];
    }
    if(!empty($_POST['g_p2']) ){
        $sql = "select prod_id from products29 WHERE prod_id='{$_POST['g_p2']}'";
        if(!fetchOne($link,$sql)){
            alertMes(alertMes("商品1无此产品！", "../manage/add_group.php"));
            }
        $arr['g_p2']=$_POST['g_p2'];
    }
    if(!empty($_POST['g_p3']) ){
        $sql = "select prod_id from products29 WHERE prod_id='{$_POST['g_p3']}'";
        if(!fetchOne($link,$sql)){
            alertMes(alertMes("商品1无此产品！", "../manage/add_group.php"));
            }
        $arr['g_p3']=$_POST['g_p3'];
    }
    if(!empty($_POST['g_p4']) ){
        $sql = "select prod_id from products29 WHERE prod_id='{$_POST['g_p4']}'";
        if(!fetchOne($link,$sql)){
            alertMes(alertMes("商品1无此产品！", "../manage/add_group.php"));
            }
        $arr['g_p4']=$_POST['g_p4'];
    }
    if(!empty($_POST['g_n1']))
    {
        $arr['g_n1']=$_POST['g_n1'];
    }
    if(!empty($_POST['g_n2']))
    {
        $arr['g_n2']=$_POST['g_n2'];
    }

    if(!empty($_POST['g_n3']))
    {
        $arr['g_n3']=$_POST['g_n3'];
    }

    if(!empty($_POST['g_n4']))
    {
        $arr['g_n4']=$_POST['g_n4'];
    }
    if(!empty($_POST['g_status']))
    {
        $arr['g_status']=$_POST['g_status'];
    }

    $res=update($link,"group29",$arr,"g_id='".$id."'");

    if($res){

        alertMes("编辑成功!",$where);
    }else{

        alertMes("编辑失败!","../manage/change_group.php?id={$id}");
    }

}
function delGroP($link,$id,$where){

    $sql= "delete from group29 where g_id='{$id}'";
    $res=delete($link,$sql);
    if($res){
        alertMes("删除成功!",$where);
    }else{
        alertMes("删除失败!",$where);

    }

}
function saleHot($link,$where){
    $prop = $_POST['prop'];
    $sql = "select * from products29";
    $row = fetchAll($link,$sql);
    if(!$row) {
        alertMes("更新失败!", $where);
    }else{
    foreach($row as $item):
        if($item['prod_sale_year']>0 and $item["prod_sale_mon"]>0 and $item['prod_status'] = '上架')
        if($prop <= ($item["prod_sale_mon"]/$item['prod_sale_year'])  ){
            $sql1 = "update products29 set prod_mold='旺销'WHERE prod_id='{$item['prod_id']}'";
            $res = updateOne($link,$sql1);
            if(!$res){
                alertMes("更新失败!", $where);
            }
        }
    endforeach;
    }
    alertMes("更新成功!",$where);
}
function saleCool($link,$where){
    $prop = $_POST['prop'];
    $sql = "select * from products29";
    $row = fetchAll($link,$sql);
    if(!$row) {
        alertMes("更新失败!", $where);
    }else{
        foreach($row as $item):
            if($item['prod_sale_year']>0 and $item["prod_sale_mon"]>0 and $item['prod_status'] =='up')
                if($prop >= ($item["prod_sale_mon"]/$item['prod_sale_year'])  ){
                    $sql1 = "update products29 set prod_mold='滞销'WHERE prod_id='{$item['prod_id']}'";
                    $res = updateOne($link,$sql1);
                    if(!$res){
                        alertMes("更新失败!商品编号：{$item['prod_id']}", $where);
                    }
                }
        endforeach;
    }
    alertMes("更新成功!",$where);
}

function saleNor($link,$where){
    $prop_up = $_POST['prop_up'];
    $prop_down = $_POST['prop_down'];
    $sql = "select * from products29";
    $row = fetchAll($link,$sql);
    if(!$row) {
        alertMes("更新失败!", $where);
    }else{
        foreach($row as $item):
            if($item['prod_sale_year']>0 and $item["prod_sale_mon"]>0 and $item['prod_status'] =='up')
                if($prop_up >= ($item["prod_sale_mon"]/$item['prod_sale_year'] ) && $prop_down <= ($item["prod_sale_mon"]/$item['prod_sale_year'] )){
                    $sql1 = "update products29 set prod_mold='正常' WHERE prod_id='{$item['prod_id']}'";
                    $res = updateOne($link,$sql1);
                    if(!$res){
                        alertMes("更新失败!商品编号：{$item['prod_id']}", $where);
                    }
                }
        endforeach;
    }
    alertMes("更新成功!",$where);
}
function saleNew($link,$where){
    $limit = ceil($_POST["limit"]);
    $sql = "select * from products29";
    $row = fetchAll($link,$sql);
    if(!$row) {
        alertMes("更新失败!", $where);
    }else{
        foreach($row as $item):
            if( $item['prod_status'] =='up'){
                $days =(strtotime(date('y:m:d')) -strtotime($item['prod_in_time']))/86400;
                if($days <= $limit){
                    $sql1 = "update products29 set prod_new='新品' WHERE prod_id='{$item['prod_id']}'";
                    $res = updateOne($link,$sql1);
                    if(!$res){
                        alertMes("更新失败!商品编号：{$item['prod_id']}", $where);
                    }
                }
            }
        endforeach;
    }
    alertMes("更新成功!",$where);
}


function editDownSale($link, $where)
{
    $id = null;
    $prop = $_POST["prop"];
    if (!empty($_POST['id'])) {
        $id = "where prod_id='{$_POST["id"] }'";
    }
    $sql = "select * from products29 " . $id;
    if ($id == null) {
        $row = fetchAll($link, $sql);
        if (!$row) {
            alertMes("更新失败!", $where);
        } else {
            foreach ($row as $item):
                if ($item['prod_status'] == 'up') {
                    $sale = $item['prod_sale'] * (1 - $prop);
                    $sql1 = "update products29 set prod_sale={$sale} WHERE prod_id='{$item['prod_id']}'";
                    $res = updateOne($link, $sql1);
                    if (!$res) {
                        alertMes("更新失败!商品编号：{$item['prod_id']}", $where);
                    }
                }
            endforeach;
        }
    }else{
            $row = fetchOne($link, $sql);
            if (!$row) {
                alertMes("更新失败!", $where);
            } else {
                if ($row['prod_status'] == 'up') {
                    $sale = $row['prod_sale'] * (1 - $prop);
                    $sql1 = "update products29 set prod_sale={$sale} ".$id;
                    $res = updateOne($link, $sql1);
                    if (!$res) {
                        alertMes("更新失败!商品编号：{$id}", $where);
                    }
                }
            }

        }
    alertMes("更新成功!", $where);
}
function editUpSale($link, $where)
{
    $id = null;
    $prop = $_POST["prop"];
    if (!empty($_POST['id'])) {
        $id = "where prod_id='{$_POST['id']}'";
    }
    $sql = "select * from products29 " . $id;
    if ($id === null) {
        $row = fetchAll($link, $sql);
        if (!$row) {
            alertMes("更新失败!", $where);
        } else {
            foreach ($row as $item):
                if ($item['prod_status'] == 'up') {
                    $sale = $item['prod_sale'] * (1 + $prop);
                    $sql1 = "update products29 set prod_sale={$sale} WHERE prod_id='{$item['prod_id']}'";
                    $res = updateOne($link, $sql1);
                    if (!$res) {
                        alertMes("更新失败!商品编号：{$item['prod_id']}", $where);
                    }
                }
            endforeach;
        }
    }else{
        $row = fetchOne($link, $sql);
        if (!$row) {
            alertMes("更新失败000!", $where);
        } else {
            if ($row['prod_status'] == 'up') {
                $sale = $row['prod_sale'] * (1 + $prop);
                $sql1 = "update products29 set prod_sale={$sale}".$id;
                $res = updateOne($link, $sql1);
                if (!$res) {
                    alertMes("更新失败!商品编号：{$id}", $where);
                }
            }
        }

    }
    alertMes("更新成功!", $where);
}


function editOrder($link,$id,$where){
    if(empty($_POST['o_state']))
    {
        alertMes("请输入订单状态!", $where);
    }else {
        $sql = "select * from order29 where o_id='{$id}'";
        $arr = fetchOne($link, $sql);
        if (!empty($_POST['o_prod'])) {
            $arr['o_prod'] = $_POST['o_prod'];
        }
        if (!empty($_POST['o_num'])) {
            $arr['o_num'] = $_POST['o_num'];
        }

$arr['o_op'] =$_SESSION['id'];
        $arr['o_state'] = $_POST['o_state'];
        $res = update($link, "order29", $arr, "o_id='" . $id . "'");

        if ($res) {

            alertMes("编辑成功!", $where);
        } else {

            alertMes("编辑失败!", "../manage/change_order.php?id={$id}");

        }
    }

}

function delOrder($link,$id,$where)
{

    $sql = "delete from order29 where o_id='{$id}'";
    $res = delete($link, $sql);
    if ($res) {
        alertMes("删除成功!", $where);
    } else {
        alertMes("删除失败!", $where);

    }
}