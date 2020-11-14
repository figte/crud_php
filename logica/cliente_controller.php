<?php
   
   include "./datos/cliente_dao.php";


    class ClienteController{
        //propiedades
        private $dao;

        //constructor
        public function __construct() {
            //instanciando el objeto DAO
            $this->dao=new ClienteDao();
        }

        //metodos
        public function guardar($cliente){
            
            $res=$this->dao->insertar($cliente);

            //evaluando resultado de la operacion
            if(true){
                //redireccionando al index
               header("Location: index"); 
            }else{
                echo "Error al guardar";
            }
        }

        public function actualizar($cliente){
              //obteniendo la vista
              $res=$this->dao->actualizar($cliente); 

            //evaluando resultado de la operacion
           if(true){
               //redireccionando al index
            header("Location: index"); 
           }else{
               echo "Error al eliminar";
           }
           
        }

        public function eliminar($id){
           $res=$this->dao->eliminar($id); 

            //evaluando resultado de la operacion
           if(true){
               //redireccionando al index
            header("Location: index"); 
           }else{
               echo "Error al eliminar";
           }

        }

        public function getClientes(){
            return $this->dao->getClientes();
        }

        public function getCliente($id){
            return $this->dao->getCliente($id);
        }


        //vistas
        public function index(){
            //obtenendo los registro de clientes 
            //esta variable se podra procesar en la vista
           $clientes=$this->getClientes();

           //obteniendo la vista
           include "./vistas/index.php";
         
            
        }
          
        public function vista_guardar(){
           //obteniendo la vista
           include "./vistas/guardar.php";
            
        }

        public function vista_actualizar($id){
            $cliente=$this->getCliente($id);
            //obteniendo la vista
            include "./vistas/actualizar.php"; 
         }

         //vista para ruta no encontrada
        public function error(){
            echo "Error 404";
         }

    }


?>