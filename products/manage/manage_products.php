<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2015/12/27 23:16
 */
require_once "../include.php";
checklogined();
$sql = 'select * from products29 ';
if(isset($_REQUEST['pro']) ){
    $keywords=$_REQUEST['pro'];

$where="where {$_REQUEST['att']} like '%{$keywords}%'";
$sql = $sql.$where;
if(getResultNum($link,$sql)){
    $mes = getResultNum($link,$sql);
    echo "<script>alert('已找到{$mes}条');</script>";

}else{
    alertMes("没有找到所要信息",'../manage/manage_products.php');
}
}
if(isset($_REQUEST['sort'])){
    $sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : null;
    $sortpass ="order by {$sort} desc";
    $sql = $sql.$sortpass;
}
//echo "<script>alert('{$keywords}');</script>";
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
                <li><a href="../admin/doAction.php?act=userOut"">退出</a></li>
                <li>
                    <a href="">修改密码</a>
                </li>
                <li>
                    <a href="">管理员</a>
                </li>
                <li>
                    <a href=""><?php echo $_SESSION['id']; ?></a>
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
                <span class="crumb-name">产品管理</a></span>
            </div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                    <table class="search-tab">
                        <tr>
                            <form action="../manage/manage_products.php?att=prod_id" method="post">
                            <th width="70">编号:</th>
                            <td><input class="common-text" placeholder="编号" name="pro" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                            </form>
                            <form action="../manage/manage_products.php?att=prod_name" method="post">
                            <th width="70">名称:</th>
                            <td><input class="common-text" placeholder="名称" name="pro"  type="text">
                            </td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                            </form>
                            <form action="../manage/manage_products.php?att=prod_status" method="post">
                            <th width="70">状态:</th>
                            <td><select name="pro" class="select" >
                                    <option>-请选择-</option>
                                    <option value="up">上架</option>
                                    <option value="down">下架</option>
                                </select>
                            </td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                            </form>
                        </tr>
                    </table>

            </div>
        </div>
        <div class="main-content">

            <div class="content-title">
                <div class="result-list">
                    <a href="add_product.php"><i class="icon-fonts iconn-style"> &#xe914;</i>新增产品 </a>

                    <!--                            <a  href="change_products.html"><i class="icon-fonts"> &#xe9c2;</i>更改数据</a>-->
                    <!--                            <a href="delete_products.html"><i class="icon-fonts"> &#xe912;</i>删除数据</a>-->
                    <!--                            <i >&nbsp;&nbsp;&nbsp;</i>-->

                    <div class="shunxu">
                        <span><i class="icon-fonts update"> &#xe913;</i>排序:</span>
                                <span class="">
                                    <select id="" class="select" onchange="change(this.value)">
                                        <option>-请选择-</option>
                                        <option value="单价" onclick="window.location = '../manage/manage_products.php?sort= prod_sale'">商品单价</option>
                                        <option value="销售量" onclick="window.location = '../manage/manage_products.php?sort= prod_sale_mon'">销售量</option>
                                        <option value="利润" onclick="window.location = '../manage/manage_products.php?sort=prod_profit'">商品利润</option>
                                    </select>
                                </span>
                    </div>
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
                        <th>操作员</th>
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
<td><?php echo $item['prod_peo']; ?></td>
                            <td>
                                <input type="button" value="修改" class="btn btn-primary btn2"
                                       onclick="window.location = 'change_products.php?id=<?= $item['prod_id'] ?>'">


                                <input type="button" value="删除" class="btn btn-primary btn2"
                                       onclick="if(window.confirm('确定要删除吗？')){window.location='../admin/addadminaction.php?act=delPro&id=<?= $item['prod_id'] ?>';}else{ window.location='manage_products.php'; }">

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

        </div>
    </div>
</div>
</body>

</html>