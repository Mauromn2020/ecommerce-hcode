<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;


$app = new \Slim\Slim();

$app->config('debug', true);


$app->get('/', function() { 	
	$page = new Page();
	$page->setTpl("index");
});


$app->get('/admin', function() { 
	
	//echo 'PÁGINA INICIAL';
	
	User::verifyLogin();
	
	$page = new PageAdmin();
	$page->setTpl("index");
});


$app->get('/admin/login', function() {
	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	$page->setTpl("login");
});

$app->get('/Home', function() {     
	echo "
	<center><br>	
	<h2>
	<hr>HOME PAGE<br>
	<small>Ecommerce Hcode</small>><hr>
	</h2>
	<p> <a href='/'>Início</a> | <a href='/Pdo'>Pdo</a></p>
	</center>
	";
});


$app->get('/admin/logout', function() {
	User::logout();
	header("Location: /admin/login");
	exit;
});



$app->run();





/*CONSULTA A TABELA USER E MOSTRA NA TELA***************
$app->get('/Pdo', function(){
	$sql = new Hcode\DB\Sql();
	$results = $sql->select("SELECT * FROM tb_users");
	echo json_encode($results);	
});
*/
?>






