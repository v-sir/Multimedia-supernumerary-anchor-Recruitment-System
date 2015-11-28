<?php
/**
 * Created by HuangWei.
 * User: Administrator
 * Date: 2015/11/25
 * Time: 10:22
 */
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json; charset=utf-8");
require_once("../lib/response.php");
require_once("../config/dbconfig.php");
class form_submit{
    public function action(){
        $action=@$_GET['action'];
        if($action=="upload"){
            $this->upload();
        }
        else if($action=="submit"){
            $this->info_check();

        }

    }
    public function upload(){
        $type=@$_GET['ask_method'];
        $upfile=$_FILES["upfile"];
		header("Content-type:text/html;charset=utf-8");


        if($upfile!="")
        {

            $name=$upfile["name"];
            if(substr_count($name, 'mp3')){
                $name=$_POST['school_no'].".mp3";
            }
            else{
                $name=$_POST['school_no'].".wav";
            }

            $media_type=$upfile["type"];
            $tmp_name=$upfile["tmp_name"];
            switch ($media_type){
                case 'audio/wav':$okType=true;
                    break;
                case 'audio/mp3':$okType=true;
                    break;
                default :$okType=false;
            }

            if($okType){

                $error=$upfile["error"];
                $dir=dirname(__FILE__)."/media/";
                if(!is_dir($dir)){
                    mkdir($dir,0777);
                }

                move_uploaded_file($tmp_name,"media/".$name);
                if($error==0){
                    $code=0;
                    $msg="success!";
                    $data=array(
                        'media_id'=>"$_POST[school_no]"
                    );
                    api_response::api_method($type,$code,$msg,$data);


                }elseif ($error==1){
                    $code=-1;
                    $msg="error:Exceeded the file size, set in the php.ini file!";
                    $data="null";
                    api_response::api_method($type,$code,$msg,$data);

                }elseif ($error==2){
                    $code=-1;
                    $msg="error:Exceeds the specified value of the options file size MAX_FILE_SIZE!";
                    $data="null";
                    api_response::api_method($type,$code,$msg,$data);
                }elseif ($error==3){
                    $code=-1;
                    $msg="fail:File was only partially uploaded!";
                    $data="null";
                    api_response::api_method($type,$code,$msg,$data);
                }elseif ($error==4){
                    $code=-1;
                    $msg="error:Empty file upload!";
                    $data="null";
                    api_response::api_method($type,$code,$msg,$data);
                }
            }
            else{
                $code=-1;
                $msg="error:Invalid file type!";
                $data="null";
                api_response::api_method($type,$code,$msg,$data);
            }



        }
        else {

            $code = -1;
            $msg = "error:Files not selected!";
            $data = "null";
            api_response::api_method($type, $code, $msg, $data);
        }


    }
    public function info_check(){
        $type=@$_GET['ask_method'];
        $name=@$_POST['name'];
        $school_no=@$_POST['school_no'];
        $mobile=@$_POST['mobile'];
        $qq=@$_POST['qq'];
        $media_type=@$_POST['media_type'];

        if($name=="" || $mobile=="" || $school_no==""|| $qq=="" || $media_type==""){
            $code=-1;
            $msg = "error:Options with * can not be empty!";
            $data = "null";
            api_response::api_method($type, $code, $msg, $data);

        }
        else{
            $this->submit();
        }

    }
    public function submit(){
        $type=@$_GET['ask_method'];
        $dir=dirname(__FILE__)."/media/";
        $filename1=@$_POST['school_no'].".mp3";
        $filename2=@$_POST['school_no'].".wav";
        $name=@$_POST['name'];
        $school_no=@$_POST['school_no'];
        $mobile=@$_POST['mobile'];
        $qq=@$_POST['qq'];
        $school=@$_POST['school'];
        $sex=@$_POST['sex'];
        $media_type=@$_POST['media_type'];
        $interesting=@$_POST['interesting'];
        $learn=@$_POST['learn'];
        //$media_url="http://weixin.faeries-land.com/multimedia/media/".@$_POST['upfile'];
        $used=@$_POST['used'];
        $other=@$_POST['other'];
        $create_at=date("Y-m-d H:i:s");

        if(file_exists($dir.$filename1)||file_exists($dir.$filename2)) {
            $sql="insert into media(name,school_no,mobile,qq,school,sex,media_type,interesting,learn,status,used,other,create_at)
            values('$name','$school_no','$mobile','$qq','$school','$sex','$media_type','$interesting','$learn','','$used','$other','$create_at') ";
            $conn=new mysqli(HOST,UserName,PassWord,DataBase);
            $conn->query("set names UTF8");
            $result=$conn->query($sql);
            if($result){
                $sql="select* from media where school_no='$_POST[school_no]' order by create_at desc ";
                $result=$conn->query($sql);
                $row=$result->fetch_array();
                if($row){
                    $code=0;
                    $msg="success!";
                    $data=array(
                        'UserID'=>"$row[UserID]",
                        'name'=>"$row[name]",
                        'school_no'=>"$row[school_no]",
                        'mobile'=>"$row[mobile]",
                        'qq'=>"$row[qq]",
                        'school'=>"$row[school]",
                        'sex'=>"$row[sex]",
                        'interesting'=>"$row[interesting]",
                        'learn'=>"$row[learn]",
                        'status'=>"$row[status]",
                        'used'=>"$row[used]",
                        'other'=>"$row[other]"

                    );
                    api_response::api_method($type,$code,$msg,$data);

                }

            }
            else{
                $code = -1;
                $msg = "error:Database Exceptions!";
                $data = "null";
                api_response::api_method($type, $code, $msg, $data);
            }



        }
        else{
            $code = -1;
            $msg = "error:File not uploaded!";
            $data = "null";
            api_response::api_method($type, $code, $msg, $data);

        }




    }
}
$show=new form_submit();
$show->action();
?>