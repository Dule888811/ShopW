<?php
include_once 'core/init.php';
if(!User::isAdmin()){
    header ('Location: index.php');
}
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    if(Article::changeArticleAction($id, 'NE')){
        header("Location:edit_articles.php");
    }else{
        echo "Došlo je do greške prilikom ukidanja akcije za proizvod. Obratite se tehničkoj podršci.";
    }
}
?>