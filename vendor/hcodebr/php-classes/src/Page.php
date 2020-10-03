<?php 
namespace Hcode ;  // vendor/hcodebr/php-classes/src
use Rain\Tpl;      // vendor/rain/raintpl/library/Rain/Tpl.php

class Page {

    private $tpl;
    private $options = [];
    private $defaults = [
        "data"=>[]
    ];


    /** CRIA O HEADER DA PÁGINA ******************* */
    public function __construct( $opts = array() ){

        //Junta as opções recebidas $opts no construct, com as do array defaults[]
        $this->options = array_merge($this->defaults, $opts);

        // configura o rain tpl
        $config = array(
            "tpl_dir"   => $_SERVER['DOCUMENT_ROOT']."/views/",
            "cache_dir" => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
            "debug"     => true // set to false to improve the speed
        );
        Tpl::configure( $config );

        $this->tpl = new Tpl;
        $this->setData( $this->options["data"] );            
        $this->tpl->draw("header");
    }
    

    /******** CRIA O CONTEÚDO PA PÁGINA ********************** */  
    public function setTpl( $name,  $data = array(),  $returnHTML = false ){
        $this->setData($data);
        return $this->tpl->draw( $name, $returnHTML );
    }
    

    /********* CRIA O FOOTER PA PÁGINA ************** */
    public function __destruct(){
        $this->tpl->draw("footer"); 
    }


    /********* MÉTODOS DIVERSOS CRIADOS  ************** */
    private function setData($data = array() ){
        foreach ($data as $key => $value) {
            $this->tpl->assign( $key, $value );
        }
    }



} // FECHA A CLASSE
?>