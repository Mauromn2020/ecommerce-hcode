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

		// Se result for zero desvia para pg login	
        if( count($results) === 0 ){
			header('Location: /admin/login');			
			exit;
        }

        $data = $results[0];
		
		
		
/*--------------------------------------------------------------
Password-verify - Verifica se o password é igual ao passado 
--------------------------------------------------------------*/		
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

/*--------------------------------------------------------------
VerifyLogin - Verifica se esta logado, etc...
--------------------------------------------------------------*/	
		public static function verifyLogin( $inadmin = true ){
			if(
				! isset($_SESSION[User::SESSION]) ||
				! $_SESSION[User::SESSION] ||
				! (int)$_SESSION[User::SESSION]["iduser"] > 0 ||
				(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin				
			){
				header("Location: /admin/login");	
				exit;
			}	
		}
	
/*--------------------------------------------------------------
List All - Lista os usuário do banco de dados
--------------------------------------------------------------*/
		public function listAll(){
			header("Location:/admin/login");
			exit;
		}
	
	
 
/*--------------------------------------------------------------
Logout - Desloga o usuário
--------------------------------------------------------------*/	
		public static function logout()	{
			$_SESSION[ User::SESSION ] = NULL;
		}

}
?>