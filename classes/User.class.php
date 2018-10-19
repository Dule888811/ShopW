<?php
	require_once 'core/init.php';
	class User {
		private static $_pdo;
       public static function init(){
			self::$_pdo = Connect::getInstance();
		}
      public static  function userData($user_id){
            $query =self::$_pdo->prepare("SELECT * FROM lrb.users WHERE user_id = :id");
            $query->bindParam(":id", $user_id);
            $query->execute();
            if($query->rowCount() == 1){
                return $query->fetch(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        }
		public static function userDeactive($id){
			 $q = self::$_pdo->prepare("SELECT * FROM lrb.users WHERE user_id = :id AND WHERE active = 0");
			 $q->bindParam(':id', $id);
			 $q->execute();
			if($q->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
		public static function isLoggedin(){
			if(isset($_SESSION['user_id'])){
				return true;
			}else{
				return false;
			}
		}
		public static function userCount(){
			$q = self::$_pdo->query('SELECT user_id FROM lrb.users WHERE active = 1');
			return $q->rowCount();
		}
		public static function usernameExists($username){
			$query =self::$_pdo->prepare('SELECT user_id FROM lrb.users WHERE username = :name');
			$query->bindParam(':name', $username);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}
		public static function isUnactivated(){
			if(isset($_SESSION['active_status']) && $_SESSION['active_status'] == 0){
				return true;
			}else{
				return false;
			}
		}
		public static function userExists($password, $username){

				$query = self::$_pdo->prepare('SELECT user_id, username, first_name, last_name, email, active FROM lrb.users WHERE username = :name AND password = :pass');
				$query->bindParam(':name', $username);
				$query->bindParam(':pass', $password);
				$query->execute();
				if($query->rowCount() == 1){
					$_SESSION['userInfo'] = $query->fetch();
					return true;
					}else{
					return false;
					}
		}
		public static function isAdmin(){
			if(isset($_SESSION['admin']) AND $_SESSION['admin'] == true){
						return true;
			}else{
						return false;
			}
		}
		 public static  function getUserDetails($id){
			$query =self::$_pdo->prepare('SELECT * FROM lrb.users WHERE user_id = :id');
			$query->bindParam(':id', $id);
			$query->execute();
			if($query->rowCount() == 1){
				return $query->fetch(PDO::FETCH_ASSOC);
			}else{
				return false;
			}
		}
		
		
		public static function emialExists($email){
			$query = self::$_pdo->prepare('SELECT user_id FROM lrb.users WHERE email = :email');
			$query->bindParam(':email', $email);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
				}
		}
		public static function getAllUsers(){
			if($query =self::$_pdo->query("SELECT * FROM lrb.users")){
			return	$results = $query->fetchAll(PDO::FETCH_ASSOC);
			}else {
				return false;
			}	
		}
		public static function removeUser($id){
			$query =self::$_pdo->prepare('DELETE FROM lrb.users WHERE user_id = :id');
			$query->bindParam(':id', $id);
				if($query->execute()){
				return true;
				}else{
				return false;
				}
		}
		public static function changeUserActive($id, $status){
			$query =self::$_pdo->prepare('UPDATE lrb.users SET active = :status WHERE user_id = :id');
			$query->bindParam(':status', $status);
			$query->bindParam(':id', $id);
			if($query->execute()){
				return true;
			}else{
			return false;
			}
		}
       public static function registerNewUser($username, $password, $first_name, $last_name, $email){

            $query =self::$_pdo->prepare('INSERT INTO lrb.users(username, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?)');
            $query->bindParam(1, $username);
            $query->bindParam(2, $password);
            $query->bindParam(3, $first_name);
            $query->bindParam(4, $last_name);
            $query->bindParam(5, $email);
            if($query->execute()){
                return true;
            }else{
                return false;
            }
	    }
	}
	User::init();
	
?>