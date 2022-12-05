<?php
session_start();
?>
<!DOCTYPE html>
        <html>
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <title>Page Title</title>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
            <script src='main.js'></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
            
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
                  <a class="nav-link active" aria-current="page" href="/can">首页</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="payment">支付</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="user">账户</a>
                </li>
                <li class="nav-item ml-80">
                  <a class="nav-link" href="logout">登出</a>
                  
                </li>
                <li class="nav-item" style="margin-left:40px;margin-top:8px;">
        <a href="#" style="color:white" > <i data-bs-toggle="modal" data-bs-target="#exampleModal" class="bi bi-cart"></i></a>
        <span class="position-relative top-0 start-0 translate-middle badge rounded-pill bg-danger">
        <?=count($_SESSION['cart']['Title'])?>
    <span class="visually-hidden">Cart</span>
  </span>
  
        </li>
       
              </ul>
            </div>
          </div>
          
        </nav>

        <div class="container">

        <div class="container">
  <div class="row">
    <div class="col">
    <div class="btn-group-vertical btn-group-lg" style="margin-top:3em" role="group" aria-label="Basic outlined example">
  <button onclick="tokensShow()" type="button" class="btn btn-outline-primary">用户代币额余</button>
  <button onclick="editpwdShow()" type="button" class="btn btn-outline-primary">改密码</button>
  <button onclick="editname()" type="button" class="btn btn-outline-primary">改用户名</button>
</div>
    </div>
    <!-- <div class="col">
    </div> -->
    <div class="col-9 h5 text-center" >
        <div style="visibility:hidden;text-align:center;
        margin-top:6em;border:1px solid blue;border-radius:20px" 
        id="tokensShow" class="h4">你现有<?=$_SESSION['Tokens']?>代币</div>
        <div style="visibility:hidden;margin-top:-80px" id="editpwd" class="col-md-12">
        <form method="post" action="changeUserInfo.php">
            <h2 class="text-center border-bottom border-primary">改密码</h2>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">目前密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="currentPassword" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">新密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="newPassword" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">确认新密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="rePassword" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="edit-pwd">改密码</button>
          </form>
    </div>
    <div style="visibility:hidden;margin-top:-280px" id="edituser" class="col-md-12">
        <form method="post" action="changeUserInfo.php">
            <h2 class="text-center border-bottom border-primary">改用户信息</h2>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">目前用户名</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="currentUsername" value=<?=$_SESSION['username']?> readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">新用户名</label>
              <div class="col-sm-8">
                <input type="tex" class="form-control" name="newUsername" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">目前手机号</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="currentPhoneNum" value=<?=$_SESSION['phone']?> readonly>
              </div>
              <div class="row mb-3">
              <label class="col-sm-2 col-form-label">新手机号</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="newPhoneNum" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="edit-user">确认</button>
          </form>
    </div>
    </div>
    
  </div>
</div>
        
       
        </div>
        <!-- <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">菜单</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="cart-container-container">
        <div class="cart-container">
            <div class="cart-table-container">
                <!-- <h2 id="order">Your Order</h2> -->
<?php if(count($_SESSION['cart']['Title'])>0){ ?>
        <table class="table">
            <thead>
                <tr>
                <th>NO.</th>
                <th>Dish</th>
                <th>Quantity</th>
                <th>Price</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $j=0;
            while($j<count($_SESSION['cart']['Title'])){
            ?>
            <tr>
                <td><?=$j+1?></td>
                <td><?=$_SESSION['cart']['Title'][$j]?></td>
                <td id="quantity"> <form method="post">
                    <button class="btn btn-primary" type="submit" name="reduce-btn" id="reduce-quantity-btn">-</button>
                    <input type="hidden" name="get-id" value="<?=$j?>">
                    <?=$_SESSION['cart']['Quantity'][$j]?>
                    <button class="btn btn-primary" type="submit" name="add-btn" id="add-quantity-btn">+</button>
                    <button class="btn btn-primary" type="submit" name="remove-btn" id="remove-btn">Remove</button>
                    </form>
            </td>
                <td><?=$_SESSION['cart']['Price'][$j]?></td>
            </tr>
        <?php $j++;}?>
                <tr id="total">
                    <td colspan="3" align="right">总价</td>
                    <td><?=$_SESSION['total']?></td>
                </tr>
            </tbody>
            </table>
            <?php }else echo "你的菜单是空的"; ?>
            </div>
            </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">退出</button>
        <button type="button" class="btn btn-primary">订购</button>
        <form method="post">
        <button name="clear-cart" type="submit" class="btn btn-secondary">清楚菜单</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        </body>
        </html>