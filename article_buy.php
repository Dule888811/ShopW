<?php
include_once 'core/init.php';
if(!User::isLoggedin()){
    header ('Location: index.php');
}
if(isset($_GET['article_id'])){
    $article_id = (int)$_GET['article_id'];
    $user_id = (int)$_SESSION['user_id'];
    Article::articleBuy($article_id, $user_id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

}
?>