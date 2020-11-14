<?php
    class Conexion{
        private $host ;
        private $dbname ;
        private $username ;
        private $password;

        private $conexion;

        //constructor
        public function __construct() {
             $this->host = 'localhost';
             $this->dbname = 'bd_negocio';
             $this->username = 'root';
             $this->password = '';
        }
        //metodos
        public function conectar(){
            //creando la conexion
            try {
                $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
               // echo "conexion a $this->dbname de $this->host establecida.";

               
            } catch (PDOException $pe) {
                //se captura y se muestra un mensaje antes algun error
                die("No se puedo conectar a $this->dbname :" . $pe->getMessage());
            }
        }

        public function desconectar(){
             //cerrando conexion
             $this->conexion=null;
        }

        public function getConexion(){
            return $this->conexion;
        }

    }
?>
