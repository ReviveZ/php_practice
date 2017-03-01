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
                        <li><a href="shopping_order.php"><i class="icon-fonts">&#xe92e; </i>订单管理</a></li>
                        <li><a href="shopping_user_value.php"><i class="icon-fonts">&#xea74; </i>积分管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="info_notice.php"><i class="icon-fonts">&#xe95b; </i>资讯管理</a>
                    <ul class="sid-menu">
                        <li class="on"><a href="info_notice.php"><i class="icon-fonts">&#xe931; </i>公告管理</a></li>
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
                <span class="crumb-name">公告管理</span>
            </div>
        </div>
        <div class="main-content">
            <div class="publish">
                <form>
                    <ul>
                        <li>
                            <label><i class="require-red">*</i>公告标题：</label>
                            <input class="common-text" name="prod-name" size="50" type="text">
                        </li>
                        <li>
                            <label>上传文件：</label>
                            <input  type="file" value="浏览">
                        </li>
                        <li >
                            <label  class="la3">公告内容：</label>
                            <textarea name="content" class="common-text area" id="content" cols="30" style="width: 600px;height: auto"></textarea>
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
                        <th>附件</th>
                        <th>发布时间</th>
                        <th>发布状态</th>
                    </tr>
                    <?php include'../php/notices.php';
                    foreach ($result as $item): ?>
                        <tr>
                            <td><?php echo $item['n_name']; ?></td>
                            <td><?php echo $item['m_content']; ?></td>
                            <td><?php echo $item['n_file']; ?></td>
                            <td><?php echo $item['m_create']; ?></td>
                            <td><?php echo $item['n_state']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
                <h1 class="h1-no"><?php echo $nodate; ?></h1>

                <div class="list-page">
                    <span><?php echo $result->num_rows ?></span>
                    <span>条</span>
                </div>

        </div>
    </div>
</div>
</body>
</html>