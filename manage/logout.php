<?php
/**
 * Created by HuangWei.
 * User: Administrator
 * Date: 2015/11/26
 * Time: 19:42
 */

session_start();
$_SESSION=array();
session_destroy();
header('Location:admin.php');
?>