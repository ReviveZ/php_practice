<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>后台管理登录</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_login.css">
</head>
<body>
    <div class="wrapper">
        <h1>后台管理</h1>
        <div class="border">
            <div class="style">
                <form action="../admin/dologin.php" method="post" onSubmit="return InputCheck(this)">
                    <ul class="items">
                        <li>
                            <label for="user">用户名：</label>
                            <input type="text"  id="user" name="user"  class="admin_input_style" />
                        </li>
                        <li>
                            <label for="pwd">密码：</label>
                            <input type="password"  id="pwd"  name="pwd"
class="admin_input_style" />
                        </li>
                        <!--<li>-->
                            <!--<label >验证码：</label>-->
                            <!--<input type="text"  name="verify" class="admin_input_style password_icon"></li>-->
                            <!--<img src="../admin/getVerify.php" alt="" />-->
                        <!--<li>-->
                            <input type="submit" name="login" value="登录" class="sublimt" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <p class="copyright"><a  href="../home.html">返回首页</a> Copyright © 2015-2015</p>
    </div>
</body>
</html>