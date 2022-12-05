<?php
session_start();
if(isset($_SESSION['phone'])){
    if(isset($_POST['buy'])){
        if($_SESSION['total']*2 > $_SESSION['Tokens']){
            setcookie("notEnoughT","true",time()+3,"/");
            header("Location: error");
        }
        else{
            require_once "DB.php";
            $_SESSION["Tokens"]-=$_SESSION['total']*2;
            mysqli_query($db,"UPDATE Users SET Tokens=".$_SESSION['Tokens']." WHERE PhoneNum=".$_SESSION['phone']);
            $i=0;
            while($i<count($_SESSION['cart']['Title'])){
            array_splice($_SESSION['cart']['Title'],$i);
            array_splice($_SESSION['cart']['Price'],$i);
            array_splice($_SESSION['cart']['Quantity'],$i);
            }
            $_SESSION['total']=0;
            }
        }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">顶成功！</h4>
                        <p>您正在被重定向到登录页面，请稍候...</p>
                        <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                        </div>
                        <hr>
                        <p class="mb-0">如果您没有被自动重定向，请点击这里<a href="index">首页</a></p>
                    </div>

<?php
header("Refresh:5,login");



    }


?>