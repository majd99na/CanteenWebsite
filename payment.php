<?php
session_start();
if(isset($_POST['pay-btn'])):
    require_once 'DB.php';
    
    $result = mysqli_query($db,"SELECT password FROM Users WHERE PhoneNum=".$_SESSION['phone']);
    $result= mysqli_fetch_assoc($result);
    if(!password_verify($_POST['password'],$result['password'])):
        setcookie("er-pwdIncorrect","true",time()+2,"/");
        header("Location: error");
    elseif(password_verify($_POST['password'],$result['password'])):
      $tokens = $_POST['tokens'];
      mysqli_query($db,"UPDATE Users SET Tokens=Tokens+$tokens WHERE PhoneNum=".$_SESSION['phone']);
      $_SESSION['Tokens']+=$tokens;
      if($db->error){
        die($db->error);
      }
    ?>
            <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
        <a class="navbar-brand w-25 text-center nav-title" >北工大食堂系统</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/can">首页</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="payment">支付</a>
            </li>
            <li class="nav-item ml-80">
            <a class="nav-link" href="logout">登出</a>
            </li>
        </ul>
        </div>
        </div>
        </nav>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
                    <div class="alert alert-success mt-5" role="alert">
                        <h4 class="alert-heading text-center">支付成功！</h4>
                        <hr>
                        <p class="mb-0 ">你已经买了<?=$_POST['tokens']?>代币</p>
                    </div>
<?php
endif;
    else:
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand w-25 text-center nav-title" >北工大食堂系统</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/can">首页</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="payment">支付</a>
        </li>
        <li class="nav-item ml-80">
          <a class="nav-link" href="logout">登出</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container row justify-content-center ">
<div class="col-sm-3"></div>
<form class="w-50" method="post">
<div class="row mb-4">
<h2 class="text-center m-5 border-bottom border-primary">支付</h2>
    <label for="inputToken3" class="col-sm-2 col-form-label">代币</label>
    <div class="col-sm-10">
      <input oninvalid="this.setCustomValidity('请填多少币')" type="number" 
      class="form-control" id="inputToken3" required="required" 
      oninput="tokens_price() ; setCustomValidity('')"
      name="tokens">
    </div>
  </div>
  <div class="row mb-4">
    <label for="inputPassword3" class="col-sm-2 col-form-label">密码</label>
    <div class="col-sm-10">
      <input oninvalid="this.setCustomValidity('请输入密码')" oninput="setCustomValidity('')" 
      type="password" class="form-control" id="inputPassword3" 
      required="required" name="password">
    </div>
  </div>
  
  <div class="row mb-4">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input oninvalid="this.setCustomValidity('确认吗？')"  oninput="setCustomValidity('')" class="form-check-input" type="checkbox" id="gridCheck1" required="required">
        <label class="form-check-label" for="gridCheck1">
          确认
        </label>
      </div>
    </div>
  </div>
  <p id="price"></p>
  <button type="submit" class="btn btn-primary" name="pay-btn">支付</button>
</form>
</div>
</body>
</html>
<?php
endif;
?>