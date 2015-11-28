<?php
/**
 * Created by HuangWei.
 * User: Administrator
 * Date: 2015/11/26
 * Time: 16:56
 */
require_once("../config/dbconfig.php");
class sudo{
    public function action(){
        $action=@$_GET['action'];
        if($action=="del"){
            $this->delete();

        }
        else if($action=="pass"){
            $this->pass();

        }
        else if($action=="pending"){
            $this->pending();

        }
        else if($action=="die_out"){
            $this->die_out();
        }

    }
    public function delete(){
        $UserID=@$_GET['UserID'];
        $sql="delete from media where UserID='$UserID'";
        $conn=new mysqli(HOST,UserName,PassWord,DataBase);
        $conn->query("set names UTF8");
        $conn->query($sql);
        header("location:manage.php");

    }
    public function pass(){

        $UserID=@$_GET['UserID'];
        $sql="update media set status='录取' where UserID='$UserID'" ;
        $conn=new mysqli(HOST,UserName,PassWord,DataBase);
        $conn->query("set names UTF8");
        $conn->query($sql);
        header("location:manage.php");



    }
    public function pending(){
        $UserID=@$_GET['UserID'];
        $sql="update media set status='待定' where UserID='$UserID'" ;
        $conn=new mysqli(HOST,UserName,PassWord,DataBase);
        $conn->query("set names UTF8");
        $conn->query($sql);
        header("location:manage.php");

    }
    public function die_out(){
        $UserID=@$_GET['UserID'];
        $sql="update media set status='淘汰' where UserID='$UserID'" ;
        $conn=new mysqli(HOST,UserName,PassWord,DataBase);
        $conn->query("set names UTF8");
        $conn->query($sql);
        header("location:manage.php");

    }
}
$show= new sudo();
$show->action();





?>