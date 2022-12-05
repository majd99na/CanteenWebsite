<?php
session_start();
if(isset($_SESSION['phone'])):
        print("You are already logged in !");
        header("Location: /can");
        $now = time();
        if(isset($_SESSION['expire'])):
        if($now>$_SESSION['expire']):
            session_destroy();
        endif;
    endif;
else:
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleLogin.css">
    <link rel="stylesheet" href="main.css">
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
          <a class="nav-link active" href="login">登录</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register">注册</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
        <div class="col-md-8">
        <form method="post" action="login-auth">
            <h2 class="text-center m-5 border-bottom border-primary">登录</h2>
            <div class="row mb-3">
              <label for="inputPhone3" class="col-sm-2 col-form-label">手机号</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputPhone3" name="PhoneNum">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword3" name="Password">
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="Submit-btn">登录</button>
          </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
<?php
endif;
?>