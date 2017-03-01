<?php
require_once "../include.php";
checklogined();
$sql ='select * from message29';
$pageSize =2;
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
@$result = getByPage($link,$sql,$page,$pageSize);
$totalRows=getResultNum($link,$sql);
$totalPage=ceil($totalRows/$pageSize);

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>咨询管理-留言</title>
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
                <span class="crumb-name"><a href="info_message.php">管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name">留言管理</span>
            </div>
        </div>
        <div class="main-content">
                <div class="content-title">
                    <div class="result-list">
                        <!--                        <a href="answer-message.html"><i class="icon-fonts iconn-style"> &#xe9e7;</i>回复 </a>-->
                        <!---->
                        <!--                        <a  href="delete-message.html"><i class="icon-fonts"> &#xea20;</i>删除</a>-->

                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr class="tittle">
                            <th>留言编号</th>
                            <th>留言状态</th>
                            <th>留言内容</th>
                            <th>回复内容</th>
<th>操作员</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <?php if($result){ foreach ($result as $item): ?>
                            <tr>
                                <td><?php echo $item['m_id']; ?></td>
                                <td><?php echo $item['m_status']; ?></td>
                                <td><?php echo $item['m_answer']; ?></td>
                                <td><?php echo $item['m_reply1']; ?></td>
                                <td><?php echo $item['m_op']; ?></td>
                                <td><?php echo $item['m_update']; ?></td>
                                <td>
                                    <input type="button" value="回复" class="btn btn-primary btn2" onclick="window.location = 'answer-message.php?id=<?=$item['m_id']?>'">

                                    <input type="button" value="删除" class="btn btn-primary btn2"  onclick="if(window.confirm('确定要删除吗？')){window.location='../admin/addadminaction.php?act=delMes&id=<?=$item['m_id']?>';}else{ window.location='info_message.php'; }">

                                </td>
                            </tr>
                        <?php endforeach; }?>

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
</div>
</body>
</html>