<?php
include_once 'core/init.php';
if(!User::isAdmin()){
    header ('Location: index.php');
}
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $user = User::getUserDetails($id);
    if(!$user){
        die('GREŠKA! Korisnik ne postoji u bazi.');
    }
}
?>

<h3><img src="img/info.png">Informacioni karton za korisnika</h3><hr>
<table>
    <?php

        foreach ($user as $key=>$value){
            if($key !== 'password') {
                echo "<tr><td align='right'>" . strtoupper($key) . "::</td><td>" . $value . "</td></tr>";
            }
        }
    ?>
</table>
<?php echo "<a href='edit_users.php'>Nazad</a>"; ?>