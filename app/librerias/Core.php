<?php
/**
 * trae la url ingresada, 
 * el controlador
 * un metodo
 * parametro
 * 
 * 
 */


class Core{
    protected $ControladorActual='paginas';
    protected $metodoActual='index';
    protected $parametros=[];


    public function __construct()
    {
        
        //print_r($this->getUrl());

        $url=$this->getUrl();

        //buscar en controladores si el controlador existe 
        if(file_exists('../app/controladores/'.ucwords($url[0]).'.php')){
            //si existe se setea como controlador por defecto 

            $this->ControladorActual=ucwords($url[0]);

            //unset indice 0

            unset($url[0]);
        }

        //requerir el controlador 
        require_once '../app/controladores/'.$this->ControladorActual.'.php';
        $this->ControladorActual= new $this->ControladorActual;

       //verficar la segunda parte de la url despues del slash  
      if(isset($url[1])){

          if(method_exists($this->ControladorActual,$url[1])){
            //verifico el metodo
                $this->metodoActual=$url[1];
            //unset indice
            unset($url[1]);

            }

      }


     // echo $this->metodoActual;

     //obtener los parametros
    $this->parametros = $url ? array_values($url) : [];
    
      //Llamar callback con parametros 
      call_user_func_array([$this->ControladorActual, $this->metodoActual], $this->parametros);


    }

    public function getUrl(){

       // echo $_GET['url'];

       if(isset($_GET['url'])){
            $url=rtrim($_GET['url'], '/');

            $url=filter_var($url, FILTER_SANITIZE_URL);

            $url = explode('/', $url);

            return $url;

       }

    }


}


?>