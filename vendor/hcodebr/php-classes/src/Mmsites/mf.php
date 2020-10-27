<?php 
	namespace Hcode\Mmsites;

	class Mf {		
		
		public function __construct(){
			define('EMPRESA','MMsites');
			define('SLOGAN','Web Development');
		}		
		
		
		/*****************************************************  
		MENSAGEM  
		*****************************************************/
		public function msg($tipo, $mensagem){			
			echo"
				<div class='alert alert-$tipo alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
					</button>
					<strong>MENSAGEM:<br></strong>$mensagem
				</div>			
			";			
		}
		
		
		
		/***************************************************  
		ALERTA  
		****************************************************/
		public function alerta($mensagem){	
			echo "<script>alert('$mensagem')</script>"; 
		}

	}
?>