<?php
session_start();
require_once 'DB.php';
if(isset($_SESSION['phone'])):
    $sql=mysqli_query($db,"SELECT Password FROM Users WHERE PhoneNum=".$_SESSION['phone']);
    $res=mysqli_fetch_assoc($sql);
    if(isset($_POST['edit-pwd'])){
        
        if($_POST['newPassword']!=$_POST['rePassword']){
           setcookie("pwdNotMatch","true",time()+2,"/");   
           header("Location: error");
        }
        elseif(!password_verify($_POST['currentPassword'],$res['Password'])){
            setcookie("er-pwdIncorrect","true",time()+2,"/");   
            header("Location: error");   
        }
        elseif(password_verify($_POST['currentPassword'],$res['Password'])){
            $password = password_hash($_POST['newPassword'],PASSWORD_BCRYPT);
            mysqli_query($db,"UPDATE Users SET Password='$password' WHERE PhoneNum=".$_SESSION['phone']);
            ?>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">改密码成功！</h4>
                        <p>您正在被重定向到登录页面，请稍候...</p>
                        <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                        </div>
                        <hr>
                        <p class="mb-0">如果您没有被自动重定向，请点击这里<a href="login">登录</a></p>
                    </div>
            <?php
            header("Refresh:3 , logout");
        }
    }
    elseif(isset($_POST["edit-user"])){
        $newusername=$_POST['newUsername'];
        $newphonenum=$_POST['newPhoneNum'];
        mysqli_query($db,"UPDATE Users SET FullName='$newusername',PhoneNum='$newphonenum' 
        WHERE PhoneNum=".$_SESSION['phone']);
        $_SESSION['phone']=$newphonenum;
        $_SESSION['username']=$newusername;
        header("Location: index");
    }
endif;
?>