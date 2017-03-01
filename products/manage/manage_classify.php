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
    <title>管理系统-分类管理</title>
    <link rel="stylesheet" type="text/css" href="../css/common_manage.css">
    <link rel="stylesheet" type="text/css" href="../fonts/style.css">
    <link rel="stylesheet" type="text/css" href="../css/menage_products_style.css">
    <link rel="stylesheet" type="text/css" href="../css/product_style.css">
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
                        <li><a href="manage_products.php"><i class="icon-fonts">&#xe944; </i> 产品管理</a></li>
                        <li class="on"><a href="manage_classify.php"><i class="icon-fonts">&#xe946; </i>分类管理</a></li>
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
                        <li><a href="info_link.php"><i class="icon-fonts">&#xe947; </i>友情链接</a></li>
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
                <span class="crumb-name">分类管理</span>
            </div>
        </div>
        <div class="main-content">
            <div class="sum">
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr class="tittle">
                            <th>商品编号</th>
                            <th>商品单价利润</th>
                            <th>商品售出月数量</th>
                            <th>商品月利润</th>
                            <th>商品总售出数量</th>
                            <th>商品总利润</th>
                        </tr>
                        <?php $yN=$yL=$nN=$nL=0;
                        foreach ($result as $item):
                        if($item['prod_mold']){?>

                        <tr>
                            <td><?php echo $item['prod_id']; ?></td>
                            <td><?php echo $item['prod_sale'] -$item['prod_cost']; ?></td>
                            <td><?php echo $item['prod_sale_mon'];$yN=$yN+$item['prod_sale_mon']; ?></td>
                            <td><?php echo ($item['prod_sale'] -$item['prod_cost'])*$item['prod_sale_mon'];
                                $yL = $yL+($item['prod_sale'] -$item['prod_cost'])*$item['prod_sale_mon'];?></td>
                            <td><?php echo $item['prod_sale_year'];
                                $nN=$nN+$item['prod_sale_year'];?></td>
                            <td><?php echo ($item['prod_sale'] -$item['prod_cost'])*$item['prod_sale_year'];
                                $nL = $nL+($item['prod_sale'] -$item['prod_cost'])*$item['prod_sale_year'];?></td>
                            <?php }endforeach; ?>
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
                    </div>
                </div>
                <div class="sum-sale">
                    <span>总月售出数量：</span>
                    <span class="sp1"><?php echo $yN; ?></span>
                    <span>总月利润：</span>
                    <span class="sp1"><?php echo $yL; ?></span>
                    <span>总售出数量：</span>
                    <span class="sp1"><?php echo $nN; ?></span>

                    <span>总利润：</span>
                    <span class="sp1"><?php echo $nL; ?></span>
                </div>
            </div>
            <div class="sale-status">
                <div class="hot-sale">
                    <form action="../admin/addadminaction.php?act=saleHot" method="post"   >
                        <label class="la4">销售旺销比例：</label>
                        <input class="common-text required"  name="prop" size="50"  type="text" >
                        <input class="btn btn-primary btn6 mr10" value="确认" type="submit">
                        <br><i class="require-red i4">*以小数形式*</i>
                    </form>
                </div>
                <div class="hot-sale">
                    <form action="../admin/addadminaction.php?act=saleNor" method="post" >
                        <label class="la4">销售正常（上限）</label>
                        <input class="common-text required"  name="prop_up" size="50"  type="text" style="width: 185px">
                        <label class="la4">（下限）</label>
                        <input class="common-text required"  name="prop_down" size="50"  type="text" style="width: 185px">
                        <input class="btn btn-primary btn6 mr10" value="确认" type="submit">
                        <br><i class="require-red i4">*以小数形式*</i>
                    </form>
                </div>
                <div class="cool-sale">
                    <form action="../admin/addadminaction.php?act=saleCool" method="post"   >
                        <label class="la4">销售不畅比例：</label>
                        <input class="common-text required"  name="prop" size="50" value="" type="text" >
                        <input class="btn btn-primary btn6 mr10" value="确认" type="submit">
                        <br><i class="require-red i4">*以小数形式*</i>
                    </form>
                </div>
                <div class="cool-sale">
                    <form action="../admin/addadminaction.php?act=limitTime" method="post"   >
                        <label class="la4">新品时间限制：</label>
                        <input class="common-text required"  name="limit" size="50"  type="text" >

                        <input class="btn btn-primary btn6 mr10" value="确认" type="submit"><br><i class="require-red i4">*请输入整数形式*</i>
                        <br><br><i style="color: #9D9D9D ;">---------------------------------------------------------------------------------------------------------------------------------------------------------------</i>
                    </form>
                </div>
                <div class="down-sale">
                    <form action="../admin/addadminaction.php?act=editDownSale" method="post"   >
                        <ul>
                            <li><label class="la4">销售降价比例：</label></li>
                            <li class="la7">
                                <label class="la4 la5">商品id：</label>
                                <input class="common-text required"  name="id" size="20"  type="text" >
                            </li>
                            <li>
                                <label class="la4 la5 la6">比例：</label>
                                <input class="common-text required"  name="prop" size="50"  type="text" >
                                <input class="btn btn-primary btn6 mr10" value="确认" type="submit">
                                <br><i class="require-red i4 i5">*以小数形式*</i>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="up-sale">
                    <form action="../admin/addadminaction.php?act=editUpSale" method="post"  >
                        <ul>
                            <li><label class="la4">销售升价比例：</label></li>
                            <li class="la7">
                                <label class="la4 la5">商品id：</label>
                                <input class="common-text required"  name="id" size="20"  type="text" >
                            </li>
                            <li>
                                <label class="la4 la5 la6">比例：</label>
                                <input class="common-text required"  name="prop" size="50"  type="text" >
                                <input class="btn btn-primary btn6 mr10" value="确认" type="submit">
                                <br><i class="require-red i4 i5">*以小数形式*</i>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>