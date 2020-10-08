<?php 

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;


class User extends Model {
	const SESSION = "User";

    public static function login($login , $password){		
		
        $sql = new Sql();
		
		//$results = $sql->select(" SELECT * FROM tb_users WHERE deslogin = admin ");
        $results = $sql->select(" SELECT * FROM tb_users WHERE deslogin = :LOGIN ", array(
            ":LOGIN"=>$login
        ));
		
		
        if( count($results) === 0 ){
            //throw new \Exception("USUÁRIO INVÁLIDO !"); 
			header('Location: /admin/login');			
			exit;
        }

        $data = $results[0];
		
		//echo $password.'<br>'.$data["despassword"] ;
		
//		if($password == $data["despassword"]){			
//			//echo('<br>SENHAS IGUAIS!');
//			$user = new User();
//			$user->setData($data);
//			
//			$_SESSION[User::SESSION] = $user->getValues();
//			
//			return $user;
//		}else{
//			echo('<br>SENHAS DESIGUAIS!');
//			throw new \Exception("SENHA INVÁLIDA !");
//		}
		
		
		
		/**Se o password for igual ao passado */
        if ( password_verify( $password, $data["despassword"] ) === true ) {

			$user = new User();
			$user->setData($data);	
			$_SESSION[User::SESSION] = $user->getValues();
			return $user;
			
        } else {
			header("Location:/admin/login");			
		}
		
    }		
		
		public static function verifyLogin( $inadmin = true ){
			if(
				! isset($_SESSION[User::SESSION]) ||
				! $_SESSION[User::SESSION] ||
				! (int)$_SESSION[User::SESSION]["iduser"] > 0 ||
				(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin				
			){
				header("Location: /admin/login");	
			}	
		}
	
	
        
		public static function logout()
		{
			$_SESSION[User::SESSION] = NULL;
		}

}
?>