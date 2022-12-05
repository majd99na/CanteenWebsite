<?php
if(isset($_SESSION['phone'])):
    header("Location: ");
else:

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='StyleReg.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
          <a class="nav-link " href="login">登录</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="register">注册</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container col-sm-5">
<div class="row cc">
<form method="post" action="register-processing.php">
<h2 class="text-center m-5 border-bottom border-primary">注册</h2>
<div class="row mb-3">
    <label for="inputName3" class="col-sm-2 col-form-label">姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName3" name="Full_Name" required="required">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">邮箱</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" required="required">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPhone3" class="col-sm-2 col-form-label">手机号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPhone3" name="Phone_Num" required="required">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="Password" required="required">
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">职业</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input onclick="showField()" class="form-check-input" type="radio" name="occu" id="gridRadios1" value="Customer" checked>
        <label class="form-check-label" for="gridRadios1">
          客人
        </label>
      </div>
      <div class="form-check">
        <input onclick="showField()" class="form-check-input" type="radio" name="occu" id="gridRadios2" value="Staff">
        <label class="form-check-label" for="gridRadios2">
          工作员
        </label>
      </div>
    </div>
    <div class="row mb-3" id="ShopNameInput" style="visibility:hidden">
    <label for="inputShop3" class="col-sm-2 col-form-label">餐厅名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputShop3" name="Shop_Name">
    </div>
  </div>  </fieldset>
  <div class="row mb-3">
    <label for="inputID3" class="col-sm-2 col-form-label">一卡通号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputID3" name="Id_Num" required>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="reg-btn">注册</button>
</form>
</div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

<?php
endif;
?>