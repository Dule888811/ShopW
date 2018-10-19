<?php
include_once 'core/init.php';
if(!User::isAdmin()) header ('Location: index.php');
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    if(User::changeUserActive($id, 1)){
        header("Location:edit_users.php");
    }else{
        echo "Došlo je do greške prilikom aktivacije korisnika. Obratite se tehničkoj podršci.";
      echo "<a href='edit_users.php'>Nazad</a>";
    }
}
?>