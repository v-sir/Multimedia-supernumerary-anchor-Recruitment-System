
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
                        <?
                        session_start();
                        if($_SESSION['login_status']!="" && $_SESSION['user']!=""){
                            echo"<li class='active'>
                            <a href='logout.php'>注销</a>
                        </li>";
                        }


                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row clearfix show-it">
        <div class="col-md-12 column">

        </div>
        <table class="table table-striped table-bordered white-bg">
            <tr>
                <td colspan="14"><a  class="btn btn-success btn-block">管理中心</a></td>
            </tr>
            <tr>
                <th>UserID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>学号</th>
                <th>电话</th>
                <th>学院</th>
                <th>QQ</th>
                <th>使用软件情况</th>
                <th>兴趣</th>
                <th>希望收获</th>
                <th>想做的电台节目类型</th>
                <th>附件</th>
                <th>操作</th>
                <th>状态</th>
            </tr>



<?php
/**
 * Created by HuangWei.
 * User: Administrator
 * Date: 2015/11/26
 * Time: 12:46
 */
require_once("../config/dbconfig.php");
class manage{
    public function is_login(){
        session_start();
        if($_SESSION['login_status']=="" && $_SESSION['user']==""){
            header("Location:admin.php");

        }
        else{
            $this->show_info();

        }
    }
    public function show_info(){
        $dir="http://duomeiti.sky31.com/multimedia/media/";
        $sql="select * from media";
        $conn=new mysqli(HOST,UserName,PassWord,DataBase);
        if($conn->connect_error){
            die('数据库连接错误：'.$conn->connect_error);
        }
        $conn->query("set names UTF8");
        $result=$conn->query($sql);

        while($row=$result->fetch_assoc()){
            $filename1=$row['school_no'].".mp3";
            $filename2=$row['school_no'].".wav";
            echo"<tr>
                <td>$row[UserID]</td>
                <td>$row[name]</td>
                <td>$row[sex]</td>
                <td>$row[school_no]</td>
                <td>$row[mobile]</td>
                <td>$row[school]</td>
                <td>$row[qq]</td>
                <td>$row[used]，$row[other]</td>
                <td>$row[interesting]</td>
                <td>$row[learn]</td>
                <td>$row[media_type]</td>
                <td><a href =$dir$filename1>mp3</a>&nbsp;&nbsp;<a href =$dir$filename2 >wav</a></td>
                <td><a href='sudo.php?action=del&UserID=$row[UserID]' class='btn btn-primary btn-xs'>删除</a>&nbsp;&nbsp;&nbsp;<a href='sudo.php?action=pass&UserID=$row[UserID]' class='btn btn-danger btn-xs'>录取</a>&nbsp;&nbsp;&nbsp;<a href='sudo.php?action=pending&UserID=$row[UserID]' class='btn btn-warning btn-xs'>待定</a>&nbsp;&nbsp;&nbsp;<a href='sudo.php?action=die_out&UserID=$row[UserID]' class='btn btn-success btn-xs'>淘汰</a></td>
                <td>$row[status]</td>

            </tr>


            ";

        }
    }
}
$show= new manage();
$show->is_login();
echo" </table>
    </div>
</div>
</div>
<div class=\"row\">
    <div class=\"col-md-12\">
        <h6><font color=\"#3a87ad\">&copy; 2004-2015 多媒体</font></h6>
    </div>
</div>
</div>
</body>
</html>";
?>

