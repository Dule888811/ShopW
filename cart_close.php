<?php
include_once 'core/init.php';
if(!User::isLoggedin()){
    header ('Location: index.php');
}
if(isset($_SESSION['user_id'])){
    $user_id = (int)$_SESSION['user_id'];
    if(Cart::cartClose($user_id)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        echo "Greska pri zatvaranju korpe.";
    }
}
?>