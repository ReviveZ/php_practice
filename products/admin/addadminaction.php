<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/28 17:43
 */
require_once '../include.php';
$act = $_REQUEST['act'];

if ($act == 'addadmin') {
    addAdmin($link);
} elseif ($act == "editAdmin") {
    $id = $_REQUEST['id'];
    editAdmin($link, $id, "../manage/system_user.php");
} elseif ($act == "delUser") {
    $id = $_REQUEST['id'];
    delUser($link, $id, "../manage/system_user.php");
} elseif ($act == "editMes") {
    $id = $_REQUEST['id'];
    editMes($link, $id, "../manage/info_message.php");
} elseif ($act == "delMes") {
    $id = $_REQUEST['id'];
    delMes($link, $id, "../manage/info_message.php");
} elseif ($act == "editGroup") {
    addPro($link);
} elseif ($act == "delGroup") {
    addPro($link);
} elseif ($act == "addPro") {
    addPro($link);
} elseif ($act == "editPro") {
    $id = $_REQUEST['id'];
    editPro($link, $id, "../manage/manage_products.php");
} elseif ($act == "delPro") {
    $id = $_REQUEST['id'];
    delPro($link, $id, "../manage/manage_products.php");
} elseif ($act == "addGroP") {
    addGroP($link);
} elseif ($act == "editGroP") {
    $id = $_REQUEST['id'];
    editGroP($link, $id, "../manage/manage_group.php");
} elseif ($act == "delGroP") {
    $id = $_REQUEST['id'];
    delGroP($link, $id, "../manage/manage_group.php");
} elseif ($act == "editCom") {
    $id = $_REQUEST['id'];
    editCom($link, $id, "../manage/manage_comment.php");
} elseif ($act == "editUpSale") {
    editUpSale($link, "../manage/manage_classify.php");
} elseif ($act == "editDownSale") {
    editDownSale($link, "../manage/manage_classify.php");
} elseif ($act == "saleHot") {
    saleHot($link, "../manage/manage_classify.php");
} elseif ($act == "saleCool") {
    saleCool($link, "../manage/manage_classify.php");
} elseif ($act == "saleNor") {
    saleNor($link, "../manage/manage_classify.php");
} elseif ($act == "limitTime") {
    saleNew($link, "../manage/manage_classify.php");
} elseif ($act == "searchPro") {
    $pass = $_REQUEST['att'];
    search("../manage/manage_products.php?att={$pass}");
} elseif ($act == 'addUser') {
    addUser($link);
} elseif ($act == "editUser") {
    $id = $_REQUEST['id'];
    editUser($link, $id, "../manage/system_people.php");
} elseif ($act == "delPeople") {
    alertMes('cg',"../manage/system_people.php");
    $id = $_REQUEST['id'];
    delPeople($link, $id, "../manage/system_people.php");
} elseif ($act == "editOrder") {
    $id = $_REQUEST['id'];
    editOrder($link, $id, "../manage/shopping_order.php");
} elseif ($act == "delOrder") {
    $id = $_REQUEST['id'];
    delOrder($link, $id, "../manage/shopping_order.php");
} elseif ($act == "editNotice") {
    $id = $_REQUEST['id'];
    editNotice($link, $id, "../manage/info_notice.php");
} elseif ($act == "addNotice") {
    addNotice($link);
}