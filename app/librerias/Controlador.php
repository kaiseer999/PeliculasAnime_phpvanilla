<?php

//Clase de controlador principal
//se encarga de cargar las vistas y los modelos 

class Controlador{
    //Cargar modelo 
    public function modelo($modelo){

        require_once'../app/modelos/'.$modelo.'.php';
        //Instanciar el modelo 
        return new $modelo();

    }

    public function vista($vista, $datos =[]){
        
        //verifico si el archivo existe
        if(file_exists('../app/vistas/'.$vista.'.php')){
            require_once'../app/vistas/'.$vista.'.php';
        }else{

            die('La vista no existe');
        }


    }


}

?>