<?php
    session_start();
    if(isset($_SESSION['phone'])){
        if(isset($_POST['title'])){
            $food_title=$_POST['title'];
            if(!in_array($_POST['title'],$_SESSION['cart']['Title'])){
            $_SESSION['total']+=$_POST['price'];
            array_push($_SESSION['cart']['Title'],$_POST['title']);
            array_push($_SESSION['cart']['Price'],$_POST['price']);
            array_push($_SESSION['cart']['Quantity'],1);
            }
            else{
                $id = array_search($_POST['title'],$_SESSION['cart']['Title']);
                $_SESSION['cart']['Quantity'][$id]+=1;
                $_SESSION['total']+=$_POST['price'];
            }
    
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }



?>