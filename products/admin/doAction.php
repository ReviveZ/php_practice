<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/28 15:32
 */
require_once '../include.php';

$act=$_REQUEST['act'];
if($act==="reg"){
    $mes=reg();
}elseif($act==="login"){
    $mes=login();
}elseif($act==="userOut"){
    logout($link);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Insert title here</title>
</head>
<body>
<?php
$mes ='';
if($mes){
    echo $mes;
}else{
    alertMes('退出！！','../manage/menage_login.php');
}
?>

</body>
</html>