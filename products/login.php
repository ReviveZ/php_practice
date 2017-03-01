<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet"  type="text/css" href="css/stype_login.css">
</head>
<body>
<div class="wrapper">
    <p class="p1">Welcome</p>
    <form method="post" action="admin/dologin_h.php"  target="_self">
    <input type="text" name="user" placeholder="用户名">
    <input type="password" name="pwd" placeholder="密码">
    <button type="submit" name="login" class="submit">登录</button>
<label class="checkbox">
    <input type="checkbox" name="autoFlag" value="123" >记住我
        </label>
<!--     alert("123");-->
    </form>
    <div class="mamage">
    <a href="register.html" class="register">注册</a>
    <a href="findback.html" class="findtoback">找回密码</a>
        <a href="home.html" class="register">&nbsp;返回首页</a>
    </div>

    <div class="bottom">
       Copyright &copy; 2015-2015 <a href="manage/menage_login.php">系统登陆</a>
    </div>
</div>
</body>
</html>