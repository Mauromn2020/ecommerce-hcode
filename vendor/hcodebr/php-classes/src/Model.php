<?php 
    
namespace Hcode;

class Model {

    private $values = [];
    
    /** Pega os dados da função que foi chamada e os argumentos passados */
    public function __call($name, $args){

        $method = substr( $name, 0, 3 );  //3 primeiras letras da string passada set... ou get...
        $fieldName  = substr( $name, 3, strlen($name) );  // as últimas letras da string ...Xxx...até o final 
		
		switch($method){
				
			case "get":
				return $this->values[$fieldName];
			break;	
				
			case "set":
				$this->values[$fieldName] = $args[0];
			break;		
				
		}	
    }

	
	public function setData( $data = array() ){
		foreach($data as $key => $value){
			$this->{"set".$key}($value);	
		}		
	}
	
	public function getValues(){
		return $this->values;	
	}
	
	


}
?>      