<?PHP


class Database{
    private $host = DB_HOST;
    private $usuario= DB_USUARIO;
    private $pswrd = DB_PSWRD;
    private $nombre_base = DB_NOMBRE;

    private $dbh; //database handler
    private $stmt; //ejecuta la consulta
    private $error;

    public function __construct()
    {
        //configurar conexion 

        $dsn = 'mysql:host='.$this->host.';dbname='.$this->nombre_base;

        $opciones = array(

            PDO::ATTR_PERSISTENT =>true, 
            PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
        );

        //CREO UNA INSTANCIA DE PDO 
        try{

            $this->dbh= new PDO($dsn, $this->usuario, $this->pswrd, $opciones);

            $this->dbh->exec('set names utf8');

        }catch(PDOException $e){

            $this->error= $e->getMessage();
            echo $this->error;
        }

    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($parametro, $valor, $tipo=null){

        if(is_null($tipo)){
            switch(true){
                case is_int($valor):
                    $tipo=PDO:: PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo =PDO:: PARAM_BOOL;
                break;  
                case is_null($valor):
                    $tipo =PDO:: PARAM_NULL;
                break;  
                default:
                    $tipo=PDO:: PARAM_STR;
                break;
            }
        }
        $this->stmt->bindvalue($parametro, $valor, $tipo);

    }

    public function execute(){
        return $this->stmt->execute();
    }

   public function registros(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);

    }
 
    public function rowCount(){
        return $this->stmt->rowCount();

    }

    public function registro() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    




}

?>