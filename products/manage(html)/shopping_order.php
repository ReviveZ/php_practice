<?
require_once "../include.php";
checklogined();
$sql ='select * from order29';
$pageSize =2;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$result = getAdminByPage($link,$sql,$page,$pageSize);
$totalRows=getResultNum($link,$sql);
$totalPage=ceil($totalRows/$pageSize);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>购物管理-订单管理</title>
    <link rel="stylesheet" type="text/css" href="../css/common_manage.css">
    <link rel="stylesheet" type="text/css" href="../fonts/style.css">
    <link rel="stylesheet" type="text/css" href="../css/menage_products_style.css">
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
                <li><a href="../login.php">退出</a></li>
                <li>
                    <a href="">修改密码</a>
                </li>
                <li>
                    <a href="">管理员</a>
                </li>
                <li>
                    <a href="">名称</a>
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
                        <li><a href="manage_products.php"><i class="icon-fonts">&#xe944; </i> 产品管理</a></li>
                        <li><a href="manage_classify.html"><i class="icon-fonts">&#xe946; </i>分类管理</a></li>
                        <li><a href="manage_group.php"><i class="icon-fonts">&#xe919; </i>套餐管理</a></li>
                        <li><a href="manage_comment.php"><i class="icon-fonts">&#xe99a; </i>评论管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="system_setting.html"><i class="icon-fonts">&#xe941; </i> 系统管理</a>
                    <ul class="sid-menu">
                        <li><a href="system_setting.html"><i class="icon-fonts">&#xe911; </i>系统设置</a></li>
                        <li><a href="system_copy_return.html"><i class="icon-fonts">&#xe904; </i>备份还原</a></li>
                        <li><a href="system_user.php"><i class="icon-fonts">&#xe90c; </i>用户管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="shopping_order.php"><i class="icon-fonts">&#xe907; </i>购物管理</a>
                    <ul class="sid-menu">
                        <li class="on"><a href="shopping_order.php"><i class="icon-fonts">&#xe92e; </i>订单管理</a></li>
                        <li><a href="shopping_user_value.php"><i class="icon-fonts">&#xea74; </i>积分管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="info_notice.php"><i class="icon-fonts">&#xe95b; </i>资讯管理</a>
                    <ul class="sid-menu">
                        <li><a href="info_notice.php"><i class="icon-fonts">&#xe931; </i>公告管理</a></li>
                        <li><a href="info_message.php"><i class="icon-fonts">&#xe909; </i>留言管理</a></li>
                        <li><a href="info_link.html"><i class="icon-fonts">&#xe947; </i>友情链接</a></li>
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
                <span class="crumb-name"><a href="shopping_order.php">购物管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name">订单管理</span>
            </div>
        </div>
        <div class="main-content">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">订单编号:</th>
                            <td><input class="common-text" placeholder="编号" name="products-num" value="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                            <th width="70">用户id:</th>
                            <td><input class="common-text" placeholder="名称" name="products-name" value="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                            <th width="70">状态:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>

                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="main-content">
            <form name="my-form" id="my-form" method="post">
                <div class="content-title">
                    <div class="result-list">
<!--                        <a  href="change_order.html"><i class="icon-fonts"> &#xe9c2;</i>更改订单</a>-->
<!--                        <a href="delete_order.html"><i class="icon-fonts"> &#xe912;</i>删除订单</a>-->

                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr class="tittle">
                            <th>订单编号</th>
                            <th>用户名称</th>
                            <th>商品id</th>
                            <th>售价</th>
                            <th>数量</th>
                            <th>下单时间</th>
                            <th>状态</th>
                            <th>操作</th>

                        </tr>
                        <?php include'../php/orders.php';
                        foreach ($result as $item): ?>
                            <tr>
                                <td><?php echo $item['o_id']; ?></td>
                                <td><?php echo $item['o_user']; ?></td>
                                <td><?php echo $item['o_prod']; ?></td>
                                <td><?php echo $item['o_sale']; ?></td>
                                <td><?php echo $item['o_num']; ?></td>
                                <td><?php echo $item['o_create']; ?></td>
                                <td><?php echo $item['o_state']; ?></td>
                                <td>
                                    <input type="button" value="修改" class="btn btn-primary btn2" onclick="editUser(<?php echo $item['o_id'];?>)">

                                    <input type="button" value="删除" class="btn btn-primary btn2"  onclick="delUser(<?php echo $item['o_id'];?>)">
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>

                    <div class="list-page">
                        <ul>
                            <li><span> 共 <?php echo $totalRows ?></span>
                                <span>条</span>
                            </li>

                            <?php if ($totalRows > $pageSize): ?>
                                <li>
                                    <?php echo showPage($page, $totalPage); ?>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>