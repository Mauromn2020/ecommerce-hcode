<?php 
require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {   
	
	$page = new Hcode\Page();
	$page->setTpl("index");

});


$app->get('/Home', function() {     
	echo "
	<center><br>	
	<h2>
	<hr>HOME PAGE<br>
	<small>Ecommerce Hcode</small>><hr>
	</h2>
	<p><a href='/Home'>Home</a> | <a href='/'>Início</a> | <a href='/Pdo'>Pdo</a></p>
	</center>
	";
});


$app->get('/Pdo', function(){
	$sql = new Hcode\DB\Sql();
	$results = $sql->select("SELECT * FROM tb_users");
	echo json_encode($results);
});


$app->run();

?>

