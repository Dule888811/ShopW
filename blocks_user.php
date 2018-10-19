<?php
include_once 'core/init.php';
if(!User::isAdmin()){
    header ('Location: index.php');
}
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    if(User::changeUserActive($id, 0)){
        header("Location:edit_users.php");
    }else{
        echo "Došlo je do greške prilikom blokiranja naloga. Obratite se tehničkoj podršci.";
        echo "<a href='edit_users.php'>Nazad</a>";
    }
}
?>