<?php
	require_once 'core/init.php';
	class Article
    {
        private static $_pdo;

        public static function init()
        {
            self::$_pdo = Connect::getInstance();
        }

        public static function updateArticle($article_id, $article_name, $article_price, $article_lager, $article_type, $brend_id, $article_description)
        {
            $query = self::$_pdo->prepare('UPDATE lrb.articles SET article_name = :a_name, article_price = :a_price, article_lager = :a_lager, article_type = :a_type, brend_id = :b_id, article_description = :a_description WHERE article_id = :a_id');
            $query->bindParam(':a_name', $article_name);
            $query->bindParam(':a_price', $article_price);
            $query->bindParam(':a_lager', $article_lager);
            $query->bindParam(':a_type', $article_type);
            $query->bindParam(':b_id', $brend_id);
            $query->bindParam(':a_description', $article_description);
            $query->bindParam(':a_id', $article_id);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function selectBrends()
        {
            if ($query = self::$_pdo->query('SELECT * FROM lrb.brends')) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }

        public static function articleData($article_id)
        {
            $query = self::$_pdo->prepare('SELECT * FROM lrb.articles  LEFT JOIN lrb.brends ON lrb.articles.brend_id = lrb.brends.brend_id WHERE article_id = :id');
            $query->bindParam(':id', $article_id);
            $query->execute();
            if ($query->rowCount() == 1) {
                return $query->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }

        public static function addNewArticle($article_name, $article_price, $article_lager, $article_type, $brend_id, $article_description)
        {
            $query = self::$_pdo->prepare('INSERT INTO lrb.articles(article_name, article_price, article_lager, article_type, article_description, brend_id) VALUES (:a_name, :a_price, :a_lager, :a_type, :a_description, :b_id)');
            $query->bindParam(':a_name', $article_name);
            $query->bindParam(':a_price', $article_price);
            $query->bindParam(':a_lager', $article_lager);
            $query->bindParam(':a_type', $article_type);
            $query->bindParam(':a_description', $article_description);
            $query->bindParam(':b_id', $brend_id);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function articleBuy($article_id, $user_id)
        {
            $cart_code = Cart::get_cart_code($user_id);
            $query = self::$_pdo->prepare('INSERT INTO lrb.carts (article_id, user_id, cart_code) VALUES (:a_id, :u_id, :cart_code)');
            $query->bindParam(':a_id', $article_id);
            $query->bindParam(':u_id', $user_id);
            $query->bindParam(':cart_code', $cart_code);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function changeArticleAction($id, $action)
        {
            $query = self::$_pdo->prepare('UPDATE lrb.articles SET article_action = :action WHERE article_id = :id');
            $query->bindParam(':action', $action);
            $query->bindParam(':id', $id);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function removeArticle($id)
        {
            $query = self::$_pdo->prepare('DELETE FROM lrb.articles WHERE article_id = :id');
            $query->bindParam(':id', $id);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function articlesDataType($type)
        {
            $query = self::$_pdo->prepare("SELECT * FROM lrb.articles WHERE article_type = :type");
            $query->bindParam(":type", $type);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }

        public static function articlesData($brend_id = null)
        {
            if (isset($brend_id)) {
                $id = $brend_id;
                $query = self::$_pdo->prepare('SELECT * FROM lrb.articles WHERE brend_id = :id');
                $query->bindParam(":id", $id);
                $query->execute();
                if ($query->rowCount() > 0) {
                    return $query->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    return false;
                }
            } else {
                $query = self::$_pdo->query('SELECT * FROM lrb.articles LEFT JOIN lrb.brends ON lrb.articles.brend_id = lrb.brends.brend_id');
                if ($query->rowCount() > 0) {
                    return $query->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    return false;
                }
            }
        }

        public static function deleteComment($id)
        {
            $query = self::$_pdo->prepare('DELETE FROM lrb.comments WHERE comment_id = :id');
            $query->bindParam(':id', $id);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function insertComment($user_id, $article_id, $comment)
        {
            $query = self::$_pdo->prepare('INSERT INTO lrb.comments (user_id, article_id, comment) VALUES (:u_id, :a_id, :comment)');
            $query->bindParam(':u_id', $user_id);
            $query->bindParam(':a_id', $article_id);
            $query->bindParam(':comment', $comment);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function comments($article_id)
        {
            $query = self::$_pdo->prepare("SELECT lrb.comments.comment_id, lrb.comments.comment, lrb.comments.time, lrb.users.first_name
                           FROM lrb.comments LEFT JOIN lrb.users
                           ON comments.user_id = users.user_id
                           WHERE article_id = :a_id");
            $query->bindParam(':a_id', $article_id);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }


    
}
