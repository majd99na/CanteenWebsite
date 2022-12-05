
<?php
require_once 'DB.php';
require_once 'db_data.php';
if($db_userdata==FALSE)
    die(mysqli_error($db));
$allow=false;
$Login_error=false;
if(isset($_POST['Submit-btn']))
{
    $username_input=$_POST['PhoneNum'];
    $password_input=$_POST['Password'];
    while($db_fetched = mysqli_fetch_assoc($db_userdata)):
        if($db_fetched['PhoneNum']==$username_input && password_verify($password_input,$db_fetched['Password'])):
        $allow = true;
        break;
        else:
        $allow = false;
        endif;
    endwhile;
    }

if($allow && !$Login_error):
    session_start();
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + 3600;
    $_SESSION['phone'] = $username_input;
    $_SESSION['username']=$db_fetched['FullName'];
    $_SESSION['cart']['Title'] = array();
    $_SESSION['cart']['Price'] = array();
    $_SESSION['cart']['Quantity'] = array();
    $_SESSION['total'] = 0;
    $_SESSION['Tokens']=$db_fetched['Tokens'];
    header("Location: /can");
else:
    $Login_error=true;
    setcookie("er-Login","true",time()+1,"/");
    header("Location: error");
endif;


?>