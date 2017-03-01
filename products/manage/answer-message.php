<?php
require_once "../include.php";
checklogined();
$id = isset($_GET['id'])?$_GET['id']:"*******无法显示********";
$sql="select * from message29 where m_id={$id}";
$row=fetchOne($link,$sql);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>咨询管理-留言-回复</title>
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
                        <li><a href="shopping_order.php"><i class="icon-fonts">&#xe92e; </i>订单管理</a></li>
                        <li><a href="shopping_user_value.php"><i class="icon-fonts">&#xea74; </i>积分管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="info_notice.php"><i class="icon-fonts">&#xe95b; </i>资讯管理</a>
                    <ul class="sid-menu">
                        <li><a href="info_notice.php"><i class="icon-fonts">&#xe931; </i>公告管理</a></li>
                        <li class="on"><a href="info_message.php"><i class="icon-fonts">&#xe909; </i>留言管理</a></li>
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
                <span class="crumb-name"><a href="info_notice.php">资讯管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name"><a href="info_message.php">留言管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name">回复留言</span>
            </div>
        </div>
        <div class="main-content">
            <div class="add-wrap">
                <form action="../admin/addadminaction.php?act=editMes&id=<?=$id?>" method="post" >
                    <ul>

                    <li class="li6">
                        <label><i class="require-red"></i>编号：<?php echo $id;?></label>
                    </li>
                    <li class="li4">
                        <label>内容：</label><span><?php echo $row['m_answer'];?></span>

                    </li>
                    <li>
                        <label>回复内容1：</label>
                        <input class="common-text required"  name="m_reply1" size="50"  placeholder="<?php echo $row['m_reply1'];?>" value="" type="text" >
                    </li>
                    <li class="li3">
                        <label><i class="require-red">*</i>套餐状态：</label>
                        <input type="radio" name="m_status" value="未回复" >未回复
                        <i >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                        <input type="radio" name="m_status" value="已回复" >已回复
                        <i >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                        <input type="radio" name="m_status" value="关闭" >关闭
                    </li>
                    <li class="td1">
                        <input class="btn btn-primary btn6 mr10" value="保存" type="submit">
                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                        <input class="btn btn6"  value="重置" type="reset">
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