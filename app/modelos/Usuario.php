<?php

class Usuario{

    
    private $db;

    public function __construct()
    {
        $this->db = new Database;

    }

   

    
    public function obtenerUsuarios() {
        $this->db->query("SELECT * FROM usuarios");
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerUsuario($username) {
        $this->db->query("SELECT * FROM usuarios WHERE NombreUsuario = :username");
        $this->db->bind(':username', $username);
        $resultado = $this->db->registro(); // Utiliza registro() en lugar de registros() para obtener un solo resultado
        return $resultado;
    }


    public function crearUsuario($nombreUsuario, $contrasena, $correoElectronico, $rol) {
        // Prepara la consulta SQL
        $this->db->query("INSERT INTO usuarios (NombreUsuario, Contraseña, CorreoElectronico, Rol) VALUES (:nombreUsuario, :contrasena, :correoElectronico, :rol)");
    
        // Enlaza los parámetros con los valores
        $this->db->bind(':nombreUsuario', $nombreUsuario);
        $this->db->bind(':contrasena', $contrasena);
        $this->db->bind(':correoElectronico', $correoElectronico);
        $this->db->bind(':rol', $rol);
    
        // Ejecuta la consulta
        return $this->db->execute();
    }
    
    
        
    }








?>