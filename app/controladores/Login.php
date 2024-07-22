<?php

class Login extends Controlador{

    private $usuarioModelo;

    public function __construct()
    {
        $this->usuarioModelo= $this->modelo('Usuario');

    }

    public function Ingresar(){

        $this->vista('paginas/Login');
    }

    public function LogIn() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = isset($_POST['NombreUsuario']) ? $_POST['NombreUsuario'] : '';
            $password = isset($_POST['Contraseña']) ? $_POST['Contraseña'] : '';
    
            if (empty($username) || empty($password)) {
                $this->vista('login', ['error' => 'Por favor, complete ambos campos.']);
                return;
            }
    
            $user = $this->usuarioModelo->obtenerUsuario($username);
    
            if ($user) {
                $contrasenaIngresada = $password;
    
                if (password_verify($contrasenaIngresada, $user->Contraseña)) {
                    session_start();
                    $_SESSION['user'] = $user->IdUsuario;
    
                    // Verifica el rol del usuario
                    if ($user->Rol === 'Admin') {
                        // Usuario con rol de Admin
                        redireccionar('/Admin/inicio'); // Redirige a la página de administrador
                    } else {
                        // Usuario con rol de Usuario
                        redireccionar('/Usuario/Inicio'); // Redirige a la página de usuario
                    }
                } else {
                    redireccionar('/Login/Ingresar?exito=false');
                }
            } else {
                redireccionar('/Login/Ingresar?exito=false');
            }
        }
    }
    
    
    

    public function logout() {
    // Inicia la sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Elimina todas las variables de sesión
    $_SESSION = array();

    // Destruye la sesión
    session_destroy();

    // Redirige al usuario a la página de inicio de sesión o a donde desees
    redireccionar('/Login/Ingresar');
    }

    public function Registro(){

        $this->vista('paginas/Registro');
    }

    public function crearUsuario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recupera los datos del formulario
            $nombreUsuario = isset($_POST['NombreUsuario']) ? $_POST['NombreUsuario'] : '';
            $contrasena = isset($_POST['Contraseña']) ? $_POST['Contraseña'] : '';
            $correoElectronico = isset($_POST['CorreoElectronico']) ? $_POST['CorreoElectronico'] : '';
            $rol = 'Usuario'; // Valor por defecto: "Usuario"
    
            // Realiza validaciones y procesa los datos, por ejemplo, asegúrate de que los campos no estén vacíos
            if (empty($nombreUsuario) || empty($contrasena) || empty($correoElectronico)) {
                // Mostrar un mensaje de error si los campos están vacíos
                $this->vista('registro', ['error' => 'Por favor, complete todos los campos.']);
                return;
            }
    
            // Hashea la contraseña (puedes usar password_hash)
            $contrasenaHasheada = password_hash($contrasena, PASSWORD_BCRYPT);
    
            // Llama a un método del modelo para insertar el usuario en la base de datos
            $usuarioCreado = $this->usuarioModelo->crearUsuario($nombreUsuario, $contrasenaHasheada, $correoElectronico, $rol);
    
            if ($usuarioCreado) {
                // El usuario se creó con éxito, puedes redirigir a una página de inicio de sesión
               // redireccionar('/Login/Ingresar');
            } else {
                // Hubo un error al crear el usuario, muestra un mensaje de error
                $this->vista('registro', ['error' => 'Hubo un error al crear el usuario.']);
            }
        } else {
            // Muestra el formulario de registro
            $this->vista('registro');
        }
    }
    




}

?>