<?php
require_once 'core/init.php';
class Cart{
	private static $_pdo;
	public static function init(){
			self::$_pdo = Connect::getInstance();
	}
	public static function getClosedCartCode(){
		$query =self::$_pdo->query("SELECT * FROM closed_cart_code");
		if($query->rowCount() > 0){
			return $query->fetchAll(PDO::FETCH_ASSOC); 
		}else{
			return false;
		}
	}
   public static function get_cart_code($user_id){

        $query =self::$_pdo->prepare("SELECT DISTINCT cart_code FROM lrb.carts WHERE user_id = ? AND cart_user_status = 0");
        $query->bindParam(1, $user_id);
        $query->execute();
        if($query->rowCount() > 0){
            $rez = $query->fetch(PDO::FETCH_ASSOC);

            return $rez['cart_code'];
        }else{
            return date("ymdhis") . rand(0, 1000);
        }
    }
	public static function getCart($user_id){
		$query =self::$_pdo->prepare('SELECT articles.article_id, articles.article_name, articles.article_price
                           FROM lrb.articles LEFT JOIN lrb.carts
                           ON articles.article_id = carts.article_id
                           WHERE carts.user_id = :user_id AND cart_user_status = 0');
		$query->bindParam(':user_id', $user_id);
		if($query->execute()){
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}else{
			return false;
		}
	}
	public static function getCartByCode($cart_code){
		$cart_code = (string)$cart_code;
		$query =self::$_pdo->prepare("SELECT lrb.carts.user_id, lrb.carts.article_id, lrb.users.first_name, lrb.users.last_name, lrb.articles.article_name, lrb.articles.article_price
                           FROM lrb.carts LEFT JOIN lrb.users
                           ON lrb.carts.user_id = lrb.users.user_id
                           LEFT JOIN lrb.articles
                           ON lrb.carts.article_id = lrb.articles.article_id
                           WHERE lrb.carts.cart_code = :cart_code");
		$query->bindParam(':cart_code', $cart_code);
		$query->execute();
		if($query->rowCount() > 0){
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}else{
			return false;
		}
	}
	public static function cartArticleDrop($article_id, $user_id){
		$query =self::$_pdo->prepare('DELETE FROM lrb.carts WHERE article_id = :a_id AND user_id = :u_id AND cart_user_status = 0');
		$query->bindParam(':a_id', $article_id);
		$query->bindParam(':u_id', $user_id);
		if($query->execute()){
			return true;
		}else{
			return false;
		}
	}	
	public static function cartClose($user_id){
		 $query =self::$_pdo->prepare('UPDATE lrb.carts SET cart_user_status = 1 WHERE user_id = :u_id AND cart_user_status = 0');
		 $query->bindParam(':u_id', $user_id);
		if($query->execute()){
			return true;
		}else{
			return false;
		}
	}
	public static function cartDelete($cart_code){
		$query =self::$_pdo->prepare('DELETE FROM lrb.carts WHERE cart_code = :cart_code');
		$query->bindParam(':cart_code', $cart_code);
		if($query->execute()){
			return true;
		}else{
			return false;
		}
	}
	public static function cartAdminClose($cart_code){
		$cart_code = (string)$cart_code;
		$query =self::$_pdo->prepare("UPDATE lrb.carts SET cart_admin_status = 1 WHERE cart_code = :cart_code");
		$query->bindParam(':cart_code', $cart_code);
		if($query->execute()){
			return true;
		}else{
			return false;
		}
	}
   public static function getOpenCartCode(){
        $query =self::$_pdo->query("SELECT * FROM lrb.open_cart_code");
        if($query->rowCount() > 0){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
	
}
Cart::init();