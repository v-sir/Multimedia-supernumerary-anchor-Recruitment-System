
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>多媒体编外后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="多媒体编外后台管理系统">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/flat-ui.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/flat-ui.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">多媒体编外后台管理系统</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="./">多媒体编外后台管理系统</a>
        </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#">登陆</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row clearfix show-it">
        <div class="col-md-12 column">
            <form action="login.php" method="post">
                <div class="login-form">
                    <div class="form-group">
                        账号：<input type="text" class="form-control login-field" name="UserName" id="tid" placeholder="请输入账号/手机号/邮箱" required/>
                        <label class="login-field-icon fui-cmd" for="tid"></label>
                    </div>
                    <div class="form-group">
                        密码：<input type="password" class="form-control login-field" name="PassWord" id="tid" placeholder="请输入密码" required/>
                        <label class="login-field-icon fui-cmd" for="tid"></label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">登陆</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h6><font color="#3a87ad">&copy; 2004-2015 多媒体</font></h6>
        </div>
    </div>
</div>
</body>
</html>

