<?php
session_start();
if(!isset($_SESSION['phone'])):
?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <link rel='stylesheet' type='text/css' media='screen' href='StyleLogin.css'>
            <div class="container">
            <div class="alert alert-danger col-lg-8 text-center" role="alert">
            Please <a href="login" class="alert-link ">Login</a> to show this page
            </div>
            </div>
<?php
else:
  if(isset($_POST['add-btn'])) {
    $_SESSION['total']+=$_SESSION['cart']['Price'][$_POST['get-id']];
    $_SESSION['cart']['Quantity'][$_POST['get-id']]++;
    setcookie("opencart","true",time()+5,"/");
    ?>
     
    <?php
 }
 elseif(isset($_POST['reduce-btn'])){
     if($_SESSION['cart']['Quantity'][$_POST['get-id']]==1){
        $_SESSION['total']-=$_SESSION['cart']['Price'][$_POST['get-id']];
        array_splice($_SESSION['cart']['Title'],$_POST['get-id'],1);
        array_splice($_SESSION['cart']['Price'],$_POST['get-id'],1);
        array_splice($_SESSION['cart']['Quantity'],$_POST['get-id'],1);
     }
     else{
     $_SESSION['total']-=$_SESSION['cart']['Price'][$_POST['get-id']];
     $_SESSION['cart']['Quantity'][$_POST['get-id']]--;
     }
     if(count($_SESSION['cart']['Title'])>0){
      setcookie("opencart","true",time()+5,"/");
     }
     else{
         $added_or_reduced=false;
     }
 }
 elseif(isset($_POST['remove-btn'])){
        $_SESSION['total']-=$_SESSION['cart']['Price'][$_POST['get-id']]*
        $_SESSION['cart']['Quantity'][$_POST['get-id']];
        array_splice($_SESSION['cart']['Title'],$_POST['get-id'],1);
        array_splice($_SESSION['cart']['Price'],$_POST['get-id'],1);
        array_splice($_SESSION['cart']['Quantity'],$_POST['get-id'],1);
        if(count($_SESSION['cart']['Title'])>0){
          setcookie("opencart","true",time()+5,"/");
        }
        else{
            $added_or_reduced=false;
        }
 }
 elseif(isset($_POST['clear-cart'])){
    $i=0;
    while($i<count($_SESSION['cart']['Title'])){
    array_splice($_SESSION['cart']['Title'],$i);
    array_splice($_SESSION['cart']['Price'],$i);
    array_splice($_SESSION['cart']['Quantity'],$i);
    }
    $_SESSION['total']=0;
    }
    if(isset($_GET['shop'])):
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
        <a style="color:white" > <i id="cart" data-bs-toggle="modal" data-bs-target="#exampleModal" class="bi bi-cart"></i></a>
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
        
        <div class="row row-cols-1 row-cols-md-3 g-4 m-2 ">
            
     <?php
        $shop=$_GET['shop'];
        require_once 'DB.php';
        $res = mysqli_query($db,"SELECT * FROM shop".$shop);
        while($menu = mysqli_fetch_assoc($res)):
            $dir = $menu['img_dir'];
            $dir=str_replace("\\","/",$dir);
     ?> 
            <div class="col">
            <ion-card class="card p-2" style="">
    <div class="card-img" style="background-image:url('<?=$dir?>'); background-size: cover;
   background-repeat: no-repeat;
   background-position: center center;
   height: 200px; margin-top:20px;"></div>
    <ion-card-content>
      <p>
      <h5 class="card-title"><?=$menu['food_name']?></h5>
      <h6 class="card-title"><?=$menu['price']."元"?></h6>
      </p>  
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="title" value="<?=$menu['food_name']?>">
        <input type="hidden" name="ShopId" value="<?=$shop?>">
        <input type="hidden" name="price" value="<?=$menu['price']?>">
      <button type="submit" class="btn btn-primary">添加到购物车</button>
      </form>
    </ion-card-content>
</ion-card>
        </div>
            <?php
            endwhile;
            ?>
        </div>
        </div>
        <div class="modal" tabindex="-1">
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
</div>

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
                    <td colspan="2" align="right">总价</td>
                    <td><?=$_SESSION['total']."元 (".doubleval($_SESSION['total']*2)."代币)"?></td>
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
        <form method="post" action="buy.php">
        <button name="buy" type="submit" class="btn btn-primary">订购</button>
        </form>
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
        
    
    <?php
    if(isset($_COOKIE['opencart'])):
      ?>
          <script>
            console.log("hi");
          document.getElementById('cart').click();
          </script>
      <?php
      setcookie("opencart", '', time()-1000, '/');
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
      </ul>
    </div>
  </div>
  
</nav>
<div class="container">
<div class="row row-cols-1 row-cols-md-1">
  <?php require_once 'DB.php';
      $res = mysqli_query($db,"SELECT Shop,Shop_Name FROM Users WHERE Occu='Staff'");
      while($shopNames=mysqli_fetch_assoc($res)):
       
        ?>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" ><?=$shopNames['Shop_Name']?></h5>
        <form method="get">
            <input type="hidden" name="shop" value=<?=$shopNames['Shop']?>>
        <input type="submit" class="btn btn-primary" value="进去点菜">
        </form>
      </div>
    </div>
  </div>
        <?php
      endwhile;
      ?>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
<?php 

endif;
endif;
?>
