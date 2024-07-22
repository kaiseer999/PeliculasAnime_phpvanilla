<?php

class Articulo{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function obtenerArticulo(){

        $this->db->query("select * from articulos");

        return $this->db->registros();  

    }



} 


?>