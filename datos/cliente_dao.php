<?php

    include "cliente_entity.php"; //se importa para utilizarse despues
    include "conexion.php";

     class ClienteDao{
        //propiedades
        private $bd;


        //constructor
        public function __construct() {
            $this->bd=new Conexion();
        }

        //metodos
        public function insertar($entity){

            //inciando conexion
            $this->bd->conectar();

            $stmt = $this->bd->getConexion()->prepare("insert into Clientes (nombre,direccion,dui,telefono,email) values (?, ?, ?, ?, ?)");
            
            $this->cliente=$entity;

            $stmt->bindParam(1, $entity->getNombre());
            $stmt->bindParam(2, $entity->getDireccion());
            $stmt->bindParam(3, $entity->getDui());
            $stmt->bindParam(4, $entity->getTelefono());
            $stmt->bindParam(5, $entity->getEmail());

            $res=$stmt->execute();
            
            //cerrando conexion
            $this->bd->desconectar();
            
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function actualizar($entity){
             //inciando conexion
            $this->bd->conectar();
            $stmt = $this->bd->getConexion()->prepare("update  clientes set nombre=?,direccion=?,dui=?,telefono=?,email=? where id=?");
            
            $stmt->bindParam(1, $entity->getNombre());
            $stmt->bindParam(2, $entity->getDireccion());
            $stmt->bindParam(3, $entity->getDui());
            $stmt->bindParam(4, $entity->getTelefono());
            $stmt->bindParam(5, $entity->getEmail());
            $stmt->bindParam(6, $entity->getId());
    
            $res=$stmt->execute();
            
            //cerrando conexion
            $this->bd->desconectar();
            
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function eliminar($id){
             //inciando conexion
            $this->bd->conectar();
         
            $stmt = $this->bd->getConexion()->prepare("delete from clientes where id=?");
            
            $stmt->bindParam(1, $id);
    
            $res=$stmt->execute();
            
            //cerrando conexion
            $this->bd->desconectar();

            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function getClientes(){
             //inciando conexion
            $this->bd->conectar();

            $stmt= $this->bd->getConexion()->prepare("select * from clientes");

            $res=$stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //cerrando conexion
            $this->bd->desconectar();
            
            if($res){
                return $data;
            }else{
                return null;
            } 
        }

        public function getCliente($id){
            //inciando conexion
           $this->bd->conectar();

           $stmt= $this->bd->getConexion()->prepare("select * from clientes where id=?");

           $stmt->bindParam(1, $id);

           $res=$stmt->execute();
           $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

           $cliente=$data[0];

           //cerrando conexion
           $this->bd->desconectar();
           
           if($res){
               return $cliente;
           }else{
               return null;
           } 
        }
     }
?>