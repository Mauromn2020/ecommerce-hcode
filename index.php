<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {     
	echo "
	<center><br>
	<h2>
	<hr>PÁGINA INICIAL <br>
	<small>Ecommerce Hcode</small>><hr>
	</h2>
	<p><a href='/Home'>Home</a> | <a href='/'>Início</a></p>
	</center>
	";
});

$app->get('/Home', function() {     
	echo "
	<center><br>	
	<h2>
	<hr>HOME PAGE<br>
	<small>Ecommerce Hcode</small>><hr>
	</h2>
	<p><a href='/Home'>Home</a> | <a href='/'>Início</a></p>
	</center>
	";
});


$app->run();

 ?>

  