<?php
/**
 * Created by PhpStorm.
 * User: Zebang
 * Date&time: 2016/1/1 10:57
 */
require_once "../include.php";
checklogined();
$sql ='select * from user29 ';
if(isset($_REQUEST['pro'])){
    $keywords=$_REQUEST['pro'];
    $where="where {$_REQUEST['att']} like '%{$keywords}%'";
    $sql = $sql.$where;
    if(getResultNum($link,$sql)){
        $mes = getResultNum($link,$sql);
        echo "<script>alert('已找到{$mes}条');</script>";

    }else{
        alertMes("没有找到所要信息",'../manage/system_user.php');
    }
}
$pageSize =10;
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
$result = getByPage($link,$sql,$page,$pageSize);
$totalRows=getResultNum($link,$sql);
$totalPage=ceil($totalRows/$pageSize);

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>系统管理-管理员管理</title>
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
                        <li class="on"><a href="system_user.php"><i class="icon-fonts">&#xe90c; </i>人员管理</a></li>
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
                <span class="crumb-name"><a href="manage_products.php">系统管理</a></span>
                <span class="crumb-step">></span>
                <span class="crumb-name">人员管理</span>
            </div>
        </div>
        <div class="main-content">
            <div class="search-wrap">
                <div class="search-content">

                        <table class="search-tab">
                            <tr>
                                <form action="../manage/system_user.php?att=u_id" method="post">
                                <th width="70">用户id:</th>
                                <td><input class="common-text" placeholder="id" name="pro"  type="text"></td>
                                <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                                    </form>

                                <th width="120">&nbsp;&nbsp;&nbsp;</th>
                                <td>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                </td>

                                    <form action="../manage/system_user.php?att=u_name" method="post">
                                <th width="70">用户名称:</th>
                                <td><input class="common-text" placeholder="用户名称" name="pro" value="" type="text"></td>
                                <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                                        </form>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="result-content">

                    <div class="content-title">
                        <div class="result-list">
                            <a href="add_user.php"><i class="icon-fonts iconn-style"> &#xe914;</i>新增管理员 </a>
                            <!--                            <a href="change_user.html"><i class="icon-fonts"> &#xe9c2;</i>更改信息</a>-->
                            <!--                            <a href="delete_user.html"><i class="icon-fonts"> &#xe912;</i>删除用户</a>-->
                        </div>
                    </div>
                    <div class="result-content">
                        <table class="result-tab" width="100%">
                            <tr class="tittle">
                                <th>管理员id</th>
                                <th>联系方式</th>
                                <th>管理员类型</th>

                                <th>管理员姓名</th>
                                <th>更新时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            <?php

                            foreach ($result as $item):?>

                                <tr>
                                    <td><?php echo $item['u_id']; ?></td>
                                    <td><?php echo $item['u_contact']; ?></td>
                                    <td><?php echo $item['u_ident']; ?></td>

                                    <td><?php echo $item['u_name']; ?></td>
                                    <td><?php echo $item['u_update_time']; ?></td>
                                    <td><?php echo $item['u_status']; ?></td>
                                    <td><?php if($item['u_id'] ==$_SESSION['id'] or $_SESSION['id'] =='super'){?>
                                        <input type="button" value="修改" class="btn btn-primary btn2" onclick="window.location = 'change_user.php?id=<?=$item['u_id']?>'">


                                        <input type="button" value="删除" class="btn btn-primary btn2" onclick="if(window.confirm('确定要删除吗？')){window.location='../admin/?act=delUser&id=<?=$item['u_id']?>';}else{ window.location='system_user.php'; }">
<?php }?>
                                    </td>
                                </tr>
                            <?php  endforeach; ?>
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
