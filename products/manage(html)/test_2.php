<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2016/1/1 10:02
 */require_once "../include.php";

$sql ='select * from group29';
//$pageSize =2;
//$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:10;
//$result = getAdminByPage($link,$sql,$page,$pageSize);
$totalRows=getResultNum($link,$sql);
echo $totalRows;


//$totalPage=ceil($totalRows/$pageSize);
