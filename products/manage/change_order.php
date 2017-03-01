<?php
require_once "../include.php";
checklogined();
$id = isset($_GET['id'])?$_GET['id']:"*******无法显示********";
$sql="select * from order29 where o_id='{$id}'";
$row=fetchOne($link,$sql);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>购物管理-订单管理</title>
    <link rel="stylesheet" type="text/css" href="../css/common_manage.css">
    <link rel="stylesheet" type="text/css" href="../fonts/style.css">
    <link rel="stylesheet" type="text/css" href="../css/menage_products_style.css">
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
                        <li><a href="manage_products.php"><i class="icon-fonts">&#xe944; </i> 产品管理</a></li>
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
                        <li class="on"><a href="shopping_order.php"><i class="icon-fonts">&#xe92e; </i>订单管理</a></li>
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
                <span class="crumb-name"><a href="manage_products.php">购物管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name"><a href="shopping_order.php">订单管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name">更改订单</span>
            </div>
        </div>
        <form action="../admin/addadminaction.php?act=editOrder&id=<?=$id?>" method="post" >
        <div class="add-wrap">
            <ul>
                <li class="li6">
                    <label>订单编号：<?php echo $id;?></label>

                <li class="li6">
                    <label>用户名称：<?php echo $row['o_user'];?></label>

                <li>
                    <label><i class="require-red">*</i>商品：</label>
                    <input class="common-text required"  name="o_prod" size="50" placeholder="<?php echo $row['o_prod'];?>" type="text" >
                </li>
                <li>
                    <label><i class="require-red">*</i>商品数量：</label>
                    <input class="common-text required"  name="o_num" size="50" value="" type="text" >
                </li class="li6">
                    <label><i class="require-red">*</i>订单状态：</label>
                    <input type="radio" name="o_state" value="已接单" >已接单
                    <i >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                    <input type="radio" name="o_state" value="未接单" >未接单
                <li class="td1">
                    <input class="btn btn-primary btn6 mr10" value="保存" type="submit">
                    <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                    <input class="btn btn6"  value="重置" type="reset">
                </li>

            </ul>
        </div>
    </div>
</div>
</body>
</html>