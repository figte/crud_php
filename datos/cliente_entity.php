<?php
    class Cliente{

        //propiedades
        private $id;
        private $nombre;
        private $direccion;
        private $dui;
        private $telefono;
        private $email;


        //gettes y setters
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id=$id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setDireccion($direccion){
            $this->direccion=$direccion;
        }

        public function getDui(){
            return $this->dui;
        }

        public function setDui($dui){
            $this->dui=$dui;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function setTelefono($telefono){
            $this->telefono=$telefono;
        }
    
        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email=$email;
        }
    }
?>