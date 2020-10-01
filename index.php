<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {     
	echo "
	<center>
	<h2>
	<hr>PÁGINA INICIAL <br>
	<small>Ecommerce Hcode</small>><hr>
	</h2>
	</center>
	";
});

$app->get('/Home', function() {     
	echo "
	<center>
	<h2>
	<hr>HOME PAGE<br>
	<small>Ecommerce Hcode</small>><hr>
	</h2>
	</center>
	";
});


$app->run();

 ?>

 <center>
 <h2>
 <hr>PÁGINA INICIAL <br>
 <small>Ecommerce Hcode</small>><hr>
 </h2>
 </center>