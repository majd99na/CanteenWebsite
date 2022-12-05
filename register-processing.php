<?php
require 'DB.php';
if(isset($_POST['reg-btn'])){
    require_once 'db_data.php';
    $fullname=$_POST['Full_Name'];
    $email = $_POST['email'];
    $phonenum=$_POST['Phone_Num'];
    $card_id=$_POST['Id_Num'];
    $occu = $_POST['occu'];
    $password=password_hash($_POST['Password'],PASSWORD_BCRYPT);
    $shopName=$_POST['Shop_Name'];
    while($db_fetched=mysqli_fetch_assoc($db_userdata)){
        if($db_fetched['PhoneNum']==$phonenum){
            setcookie("er-PN-exists","true",time()+1,"/");
            header("Location: error");
            die();
        }
    }
    if($occu=="Customer"):
    $sql=$db->prepare("INSERT INTO Users(FullName,Email,PhoneNum,IdNum,Occu,Password) VALUES(?,?,?,?,?,?)");
    
    $sql->bind_param("ssssss",$fullname,$email,$phonenum,$card_id,$occu,$password);
    $sql->execute();
    elseif($occu=="Staff"):
        $res=mysqli_query($db,"SELECT * FROM Users WHERE Occu='Staff'");
        $shopNO=$res->num_rows+1;
        $sql=$db->prepare("INSERT INTO Users(FullName,Email,PhoneNum,IdNum,Occu,Password,Shop,Shop_Name) VALUES(?,?,?,?,?,?,?,?)");
    
    $sql->bind_param("ssssssis",$fullname,$email,$phonenum,$card_id,$occu,$password,$shopNO,$shopName);
    $sql->execute();
    endif;
    if($db->error||$sql->error){
        // $error=$db->error;
        setcookie("er-reg","true",time()+2,"/");
        header("Location: error");
    }
    else{
        if(mysqli_query($db,"SELECT * FROM Users WHERE FullName='$fullname'")){
            ?>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">注册成功！</h4>
                        <p>您正在被重定向到登录页面，请稍候...</p>
                        <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                        </div>
                        <hr>
                        <p class="mb-0">如果您没有被自动重定向，请点击这里<a href="login">登录</a></p>
                    </div>
<?php
header("Refresh:5,login");
        }
    }
    //header("Location: login.php");
}
?>