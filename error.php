
<?php
if(isset($_COOKIE['er-PN-exists'])):
  $er_PN_EX=true;
elseif(isset($_COOKIE['er-Login'])):
  $er_Login=true;
elseif(isset($_COOKIE['er-pwdIncorrect'])):
  $er_pwdIncorrect=true;
elseif(isset($_COOKIE['er-reg'])):
  $er_reg=true;
elseif(isset($_COOKIE['pwdNotMatch'])):
  $er_pwdNotMatch=true;
elseif(isset($_COOKIE['notEnoughT'])):
    $er_NotEnoughT=true;
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='StyleLogin.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <div class="container">
    
      <?php
      if(isset($er_PN_EX)):
      ?>
      <div class="alert alert-danger col-lg-8 text-center" role="alert">
        手机号已经存在，请在这里 <a href="login" class="alert-link ">登录</a>
      </div>
      <?php
      elseif(isset($er_Login)):
      ?>
      <div class="alert alert-danger col-lg-8 text-center" role="alert">
        登录失败，请确保您输入了正确的登录信息 ，再试 <a href="login" class="alert-link ">登录</a>
      </div>
      <?php elseif(isset($er_pwdIncorrect)):?>
        <div class="alert alert-danger col-lg-8 text-center" role="alert">
            密码错误，请输入正确的密码！
            <?php header("Refresh:3, ".$_SERVER['HTTP_REFERER']) ?>
      </div>
      <?php
      elseif(isset($er_reg)):
        ?>
                <div class="alert alert-danger col-lg-8 text-center" role="alert">
                注册遇到了问题 ，请再试试 <a href="register" class="alert-link ">注册</a>
      </div>
      <?php
      elseif(isset($er_pwdNotMatch)):
        ?>
      <div class="alert alert-danger col-lg-8 text-center" role="alert">
               新密码和确认密码不一致，请在试试！
               <?php header("Refresh:3, ".$_SERVER['HTTP_REFERER']) ?>
      </div>
      <?php 
      elseif(isset($er_NotEnoughT)):
      ?>
      <div class="alert alert-danger col-lg-8 text-center" role="alert">
               代币不足够
               <?php header("Refresh:3, ".$_SERVER['HTTP_REFERER']) ?>
      </div>
      <?php endif; ?>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>