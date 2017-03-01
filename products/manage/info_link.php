<?php

require_once "../include.php";
checklogined();
$sql = 'select * from products29';
$pageSize = 10;
$page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;
$result = getByPage($link, $sql, $page, $pageSize);

$totalRows = getResultNum($link, $sql);
$totalPage = ceil($totalRows / $pageSize);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>咨询管理-链接</title>
    <link rel="stylesheet" type="text/css" href="../css/common_manage.css">
    <link rel="stylesheet" type="text/css" href="../fonts/style.css">
    <link rel="stylesheet" type="text/css" href="../css/others.css">
</head>
<body>
<div class="top-wrap">
    <div class="top-inner">
        <div class="top-left">
            <ul class="top-list">
                <li><a class="on" href="manage_products.php">管理首页</a></li>
                <li><a href="../home.html">网站首页</a></li>
            </ul>
        </div>
        <div class="top-right">
            <ul class="top-info-list">
                <li><a href="../admin/doAction.php?act=userOut"">退出</a></li>
                <li>
                    <a href="">修改密码</a>
                </li>
                <li>
                    <a href="">管理员</a>
                </li>
                <li>
                    <a href=""><?php echo $_SESSION['id'];?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container-wrap">
    <div class="side-wrap">
        <div class="side-tittle">
            <a href="manage_products.php"><h1><i class="icon-fonts">&#xe940; </i>菜单</h1></a>
        </div>
        <div class="side-content">
            <ul class="side-list">
                <li>
                    <a href="manage_products.php"><i class="icon-fonts">&#xe925; </i> 商品管理</a>
                    <ul class="sid-menu">
                        <li><a href="manage_products.php"><i class="icon-fonts">&#xe944; </i>产品管理</a></li>
                        <li><a href="manage_classify.php"><i class="icon-fonts">&#xe946; </i>分类管理</a></li>
                        <li><a href="manage_group.php"><i class="icon-fonts">&#xe919; </i>套餐管理</a></li>
                        <li><a href="manage_comment.php"><i class="icon-fonts">&#xe99a; </i>评论管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="system_setting.php"><i class="icon-fonts">&#xe941; </i> 系统管理</a>
                    <ul class="sid-menu">
                        <li><a href="system_setting.php"><i class="icon-fonts">&#xe911; </i>系统设置</a></li>
                        <li><a href="system_people.php"><i class="icon-fonts">&#xe904; </i>用户管理</a></li>
                        <li><a href="system_user.php"><i class="icon-fonts">&#xe90c; </i>人员管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="shopping_order.php"><i class="icon-fonts">&#xe907; </i>购物管理</a>
                    <ul class="sid-menu">
                        <li><a href="shopping_order.php"><i class="icon-fonts">&#xe92e; </i>订单管理</a></li>
                        <li><a href="shopping_user_value.php"><i class="icon-fonts">&#xea74; </i>积分管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="info_notice.php"><i class="icon-fonts">&#xe95b; </i>资讯管理</a>
                    <ul class="sid-menu">
                        <li><a href="info_notice.php"><i class="icon-fonts">&#xe931; </i>公告管理</a></li>
                        <li><a href="info_message.php"><i class="icon-fonts">&#xe909; </i>留言管理</a></li>
                        <li class="on"><a href="info_link.php"><i class="icon-fonts">&#xe947; </i>友情链接</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-wrap">
        <div class="main-top">
            <div class="main-top-list">
                <i class="icon-fonts">&#xe900;</i>
                <a href="manage_products.php">首页</a>
                <span class="crumb-step">></span>
                <span class="crumb-name"><a href="manage_products.php">资讯管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name">链接管理</span>
            </div>
        </div>
        <div class="main-content">
            <div class="link-wrap">
                <form action="" name="my-form" >
                    <ul>
                        <li class="li2"><label>链接1：</label></li>
                        <li>
                            <label>名称:</label>
                            <input class="common-text required"  name="prod-num" size="10"  type="text" >
                            <label>地址:</label>
                            <input class="common-text required"  name="prod-num" size="50" value="" type="text" >
                        </li>
                        <li class="li2"><label>链接2：</label></li>
                        <li>
                            <label>名称:</label>
                            <input class="common-text required"  name="prod-num" size="10"  type="text" >
                            <label>地址:</label>
                            <input class="common-text required"  name="prod-num" size="50" value="" type="text" >
                        </li>
                        <li class="li2"><label>链接3：</label></li>
                        <li>
                            <label>名称:</label>
                            <input class="common-text required"  name="prod-num" size="10"  type="text" >
                            <label>地址:</label>
                            <input class="common-text required"  name="prod-num" size="50" value="" type="text" >
                        </li>
                        <li>
                            <input class="btn btn-primary btn6 mr10 sub999" value="LINK" type="submit">
                        </li>
                    </ul>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>