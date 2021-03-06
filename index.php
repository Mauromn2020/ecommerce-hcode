<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Mmsites\Mf;

$app = new \Slim\Slim();
//$mf  = new Mf();
//$mf->alerta(EMPRESA.'\n'.SLOGAN);
//$mf->msg('success','Mensagem aqui !');
//$mf->msg('danger','Mensagem aqui !');
//$mf->msg('warning','Mensagem aqui !');

$app->config('debug', true);


$app->get('/tst', function(){	
	User::verifyLogin();
	echo 'TESTE<br>';
	echo session_encode() ;
	echo '<br>A session esta ativa ? ';
	echo session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
	echo '<br>'. session_id();
	echo '<br>'. session_name();
	echo '<br>'. session_cache_expire();
	echo '<br>'. substr(session_encode(), 53, 8);
	echo '<br>'. substr(session_encode(), 91, 7);
	$sessao = explode( ";", session_encode() );
});

$app->get('/', function() { 	
	$page = new Page();
	$page->setTpl("index");
});


$app->get('/admin', function() { 
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



/** Recebe login e senha e chama metodo login */
$app->post('/admin/login', function(){
	User::login($_POST["login"], $_POST["password"]);
	header("Location: /admin");
	exit;  // parar a execução aqui
});

$app->get('/admin/logout' , function(){
	User::logout();
	header('Location: /admin/login');
	exit;	
});






/* Chama a tela de Lista de usuarios */
$app->get('/admin/users' , function(){
	User::verifyLogin();
	//$users = User::listAll();	
	$page = new PageAdmin();
	$page->setTpl("users");
});

/* Chama a tela de Lista de usuarios */
$app->get('/admin/usuarios' , function(){
	User::verifyLogin();
	//$users = User::listAll();	
	$page = new PageAdmin();
	$page->setTpl("usuarios");
});





/* Chama a tela de Create usuario */
$app->get('/admin/users/create' , function(){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("users-create");
});

/* Chama a tela de Update usuarios */
$app->get('/admin/users/:iduser' , function($iduser){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("users-update");
});



/* Recebe os dados para criar novo usuário*/
$app->post('/admin/users/create', function(){
	User::verifyLogin();	
});

/* Recebe os dados para alterar um usuário*/
$app->post('/admin/users/:idusers', function($iduser){
	User::verifyLogin();	
});

/* Recebe o iduser para deletar*/
$app->delete('/admin/users/:idusers', function($iduser){
	User::verifyLogin();	
});




$app->run();

/*** CONSULTA NA TABELA E MOSTRA NA TELA  ***
$app->get('/Pdo', function(){
	$sql = new Hcode\DB\Sql();
	$results = $sql->select("SELECT * FROM tb_users");
	echo json_encode($results);	
});
*/
?>






