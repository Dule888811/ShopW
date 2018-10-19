<?php
include_once 'core/init.php';
if(!User::isAdmin()){
    header ('Location: index.php');
}
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
  //  if(User::remove_user($id)){
  //      header("Location:edit_users.php");
 //   }else{
  //      echo "Došlo je do greške prilikom brisanja korisnika. Obratite se tehničkoj podršci.";
   //     <a href="edit_users.php">Nazad</a>
   // }
    User::removeUser($id);
    header("Location:edit_users.php");
}
?>