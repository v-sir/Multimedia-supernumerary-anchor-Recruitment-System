<?php
/**
 * Created by HuangWei.
 * User: Administrator
 * Date: 2015/11/26
 * Time: 13:04
 */
session_start();
$UserName=$_POST['UserName'];
$PassWord=$_POST['PassWord'];
if($UserName=="root" && $PassWord=="root" ){

    $_SESSION['login_status']=md5("sgdfygsiu") ;
    $_SESSION['user']=$UserName;
    header("location:manage.php");

}
else{
    echo'<script>alert("Incorrect username or password! ");window.location="admin.php"</script>';

}

?>