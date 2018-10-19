<?php
include_once 'core/init.php';


if(User::isAdmin() && isset($_GET['delete_comment_id'])){
    $id = (int)$_GET['delete_comment_id'];
    if(!Article::deleteComment($id)) die('Greška pri brisanju komentara.');
}
if(!User::isLoggedin()) exit('Morate biti ulogovani da biste komentarisali proizvode i videli komentare.');
if(isset($_POST['comment']) && isset($_GET['article_id']) && isset($_GET['user_id'])){
    $comment = htmlentities($_POST['comment'], ENT_QUOTES);
    if(!Article::insertComment($_GET['user_id'], $_GET['article_id'], $_POST['comment'])){
        echo "<b>Greška pri unosu komentara u bazu.</b>";
    }
}
if(isset($_GET['article_id'])){
    $article_id = (int)$_GET['article_id'];
    $comments = Article::comments($article_id);
    if($comments){
        ?>
        <h3>Komentari o proizvodu</h3>
        <?php
        foreach ($comments as $comment){
            ?>
                <h4><?php echo $comment['first_name'] ?></h4>
                <small><?php echo $comment['time'] ?></small>
                <p><?php echo $comment['comment'] ?></p>
                <?php if(User::isAdmin()){ ?>
                <a href="article_comment.php?article_id=<?php echo $article_id ?>&delete_comment_id=<?php echo $comment['comment_id'] ?>">Ukloni komentar</a>
                <?php }?>
                <hr>
            <?php
        }
    }else{
        echo 'Nema komentara za ovaj proizvod.';
    }
    ?>
    
        <form action="article_comment.php?article_id=<?php echo $article_id ?>&user_id=<?php echo $_SESSION['user_id'] ?>" method="POST">
            <label for="comment">Vaš komentar</label></br>
            <textarea cols=40 rows=5 name="comment"></textarea></br>
            <input type="submit" value="Pošalji">
        </form>
    <a href="brends.php">Nazad na brendove</a>
    
    <?php
}
?>