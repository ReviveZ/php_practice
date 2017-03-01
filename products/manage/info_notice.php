<?php
require_once "../include.php";
checklogined();
$sql = 'select * from notice29';
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
    <title>咨询管理-公告</title>
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
                        <li class="on"><a href="info_notice.php"><i class="icon-fonts">&#xe931; </i>公告管理</a></li>
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
                <span class="crumb-name">公告管理</span>
            </div>
        </div>
        <div class="main-content">
            <div class="publish">
                <form action="../admin/addadminaction.php?act=addNotice" method="post" >
                    <ul>
                        <li>
                            <label><i class="require-red">*</i>公告标题：</label>
                            <input class="common-text" name="n_name" size="50" type="text">
                        </li>
                        <li >
                            <label  class="la3">公告内容：</label>
                            <textarea name="n_content" class="common-text area" id="content" cols="30" style="width: 600px;height: auto"></textarea>
                        </li>
                        <li class="la1">
                            <input class="btn btn-primary btn6 mr10" value="保存" type="submit">
                            <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                            <input class="btn btn6"  value="重置" type="reset">
                        </li>
                    </ul>

                </form>
            </div>
            <div class="have-publish">
                <table class="result-tab" width="100%">
                    <tr class="tittle">
                        <th>公告题目</th>
                        <th>公告内容</th>
                        <th>发布时间</th>
                        <th>发布状态</th>
                        <th>发布人</th>
                        <th>操作</th>
                    </tr>
                    <?php if($result){
                    foreach ($result as $item): ?>
                        <tr>
                            <td><?php echo $item['n_name']; ?></td>
                            <td><?php echo $item['n_content']; ?></td>
                            <td><?php echo $item['n_create']; ?></td>
                            <td><?php echo $item['n_state']; ?></td>
                            <td><?php echo $item['n_op']; ?></td>
                            <td><input type="button" value="关闭" class="btn btn-primary btn2" onclick="if(window.confirm('确定要关闭吗？')){window.location='../admin/addadminaction.php?act=editNotice&id=<?=$item['n_name']?>';}else{ window.location='system_user.php'; }"></td>
                        </tr>
                    <?php endforeach;} ?>

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
</body>
</html>