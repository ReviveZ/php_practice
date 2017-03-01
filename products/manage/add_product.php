<?php
require_once "../include.php";
checklogined();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>添加商品</title>
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
                <span class="crumb-name"><a href="manage_products.php"> 产品管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name">添加商品</span>
            </div>
            <div class="main-top-right">
                <!--<span class="crumb-step renew"><a onclick="history.go(-1)" ><i class="icon-fonts">&#xe90e;</i></a> </span>-->
                <span class="crumb-step renew"><a href="manage_products.php"><i class="icon-fonts">&#xe916;</i></a> </span>
            </div>
        </div>
        <div class="main-content">
            <div class="result-content">
                <form action="../admin/addadminaction.php?act=addPro" method="post" >
                    <table  class="insert-tab"  width="100%">
                        <tbody>

                        <tr>
                            <th><i class="require-red">*</i>商品编号：</th>
                            <td>
                                <input class="common-text required"  name="prod_id" size="50" value="" type="text" >
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>商品名称：</th>
                            <td><input class="common-text" name="prod_name" size="50" type="text"></td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>商品售价：</th>
                            <td><input class="common-text" name="prod_sale" size="50" type="text"></td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>商品成本：</th>
                            <td><input class="common-text" name="prod_cost" size="50"  type="text"></td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>商品库存：</th>
                            <td><input class="common-text" name="prod_num" size="50" type="text"></td>
                        </tr>
                        <tr>
                            <th width="120"><i class="require-red"></i>分类：</th>
                            <td>
                                <select name="prod_mold" id="catid" class="required">
                                    <option value="正常">正常</option>
                                    <option value="旺销">旺销</option >
                                    <option value="滞销">滞销</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th width="120"><i class="require-red"></i>商品状态：</th>
                            <td>

                                    <input type="radio" name="prod_status" value="up" >上架
                                    <i >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                                    <input type="radio" name="prod_status" value="down" >下架

                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <th>关键字1：</th>-->
<!--                            <td><input class="common-text" name="prod-name" size="50" type="text"></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>关键字2：</th>-->
<!--                            <td><input class="common-text" name="prod-name" size="50" type="text"></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <th>关键字3：</th>-->
<!--                            <td><input class="common-text" name="prod-name" size="50" type="text"></td>-->
<!--                        </tr>-->
                        <tr>
                            <th><i class="require-red">*</i>商品图：</th>
                            <td><input name="prod_img"  value="浏览" type="file"></td>
                        </tr>
                        <tr>
                            <th>商品说明：</th>
                            <td><textarea name="prod_introduce" class="common-textarea" id="content" cols="30" style="width: 80%;height: auto" ></textarea></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="td1">
                                <input class="btn btn-primary btn6 mr10" value="保存" type="submit">
                                <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                                <input class="btn btn6"  value="重置" type="reset">
                            </td>
                        </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>