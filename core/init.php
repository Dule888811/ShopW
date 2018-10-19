<?php
if(!isset($_SESSION)){
    session_start();
}
$GLOBALS['config'] = array(
		'DB' => array(
			'host' => '127.0.0.1' ,
			'user' => 'root' ,
			'password' => '' ,
			'db_name' => 'lrb'
		),
		'status' => true,
		'app_dir' => 'C:/wamp/www/cms/' ,
		'session' => array()
);

spl_autoload_register(function($className){
	require_once "classes/{$className}.class.php";
});
Article::init();
$errors = array();
ob_start();
if(isset($_SESSION['user_id'])){
	if(User::userDeactive($_SESSION['user_id'])){
		header('Location: logout.php ');
	}
}	
$pdo = Connect::getInstance();
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

?>