<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/27 23:16
 */
require_once "../include.php";
checklogined();
$sql ='select * from products29';
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
    <title>管理系统-商品管理</title>
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
                <li><a href="doAction.php?act=userOut"">退出</a></li>
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
                        <li class="on"><a href="manage_products.php"><i class="icon-fonts">&#xe944; </i> 产品管理</a></li>
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
                        <li><a href="shopping_order.php"><i class="icon-fonts">&#xe92e; </i>订单管理</a></li>
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
                <span class="crumb-name"><a href="manage_products.php">商品管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name">产品管理</a></span>
            </div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">编号:</th>
                            <td><input class="common-text" placeholder="编号" name="products-id" value="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                            <th width="70">名称:</th>
                            <td><input class="common-text" placeholder="名称" name="products-name" value="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>


                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>

                        </tr>
                    </table>
                    <table class="search-tab">
                        <tr>
                            <th width="70">状态:</th>
                            <td><input class="common-text" placeholder="状态" name="prod-status" value="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <td>（销售状态为“旺销”和“不畅”）</td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="main-content">
            <form name="my-form" action="../php/products.php" method="post">
                <div class="content-title">
                    <div class="result-list">
                        <a href="add_product.html"><i class="icon-fonts iconn-style"> &#xe914;</i>新增产品 </a>

                        <!--                            <a  href="change_products.html"><i class="icon-fonts"> &#xe9c2;</i>更改数据</a>-->
                        <!--                            <a href="delete_products.html"><i class="icon-fonts"> &#xe912;</i>删除数据</a>-->
                        <!--                            <i >&nbsp;&nbsp;&nbsp;</i>-->
                        <a href="#"><i class="icon-fonts update"> &#xe913;</i>排序</a>

                        <form  class="shunxu" action="../php/products.php">

                            <input type="radio" name="status" value="单价" >物品单价
                            <i >&nbsp;&nbsp;</i>
                            <input type="radio" name="status" value="销售量" >销售量
                            <i >&nbsp;&nbsp;</i>
                            <input type="radio" name="status" value="利润" >利润总量
                        </form>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr class="tittle">
                            <th>商品编号</th>
                            <th>商品名称</th>
                            <th>售价</th>
                            <th>库存</th>
                            <th>销售情况</th>
                            <th>月销售量</th>
                            <th>状态</th>
                            <th>关键字1</th>
                            <th>关键字2</th>
                            <th>关键字3</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        foreach ($result as $item): ?>
                            <tr>
                                <td><?php echo $item['prod_id']; ?></td>
                                <td><?php echo $item['prod_name']; ?></td>
                                <td><?php echo $item['prod_sale']; ?></td>
                                <td><?php echo $item['prod_num']; ?></td>
                                <td><?php echo $item['prod_mold']; ?></td>
                                <td><?php echo $item['prod_sale_mon']; ?></td>
                                <td><?php echo $item['prod_status']; ?></td>
                                <td><?php echo $item['prod_import1']; ?></td>
                                <td><?php echo $item['prod_import2']; ?></td>
                                <td><?php echo $item['prod_import3']; ?></td>
                                <td>
                                    <input type="button" value="修改" class="btn btn-primary btn2" )">

                                    <input type="button" value="删除" class="btn btn-primary btn2"  )">

                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                    <!--<h1 class="h1-no">--><?php //echo $nodate; ?><!--</h1>-->

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