<?php
    /*En este archivo se procesaran las peticiones y el enrrutamiento
    de la aplicacion*/
    include "cliente_controller.php";

//-----------------PROCESAMIENTO DE LA URL de la peticion HTTP-------------------------------
    //obteniendo la ruta de la peticion
    $ruta=$_SERVER['REQUEST_URI'];
    // echo $ruta;

    //quitando parametros despues de la ruta
    //siguen despues del signo de ?
    if (strpos($ruta, '?')) {
        $ruta = strstr($ruta, '?', true);
    }
//---------------------------------------------------------------------------------------------

    //rutas para crud de clientes
    $controlador=new ClienteController();
    
    switch ($ruta) {
        case '/crud/':
            $controlador->index();
            break;
        case '/crud/index':
            $controlador->index();
            break;
        case '/crud/guardarForm':
            $controlador->vista_guardar();
            break;
        case '/crud/guardar':{
            //creando objeto para registrar cliente
            $cliente=new Cliente();

            //obteniendo datos de la peticion y
            //asignandolos al objeto

            $cliente->setNombre($_POST['nombre']);
            $cliente->setDireccion($_POST['direccion']);
            $cliente->setDui($_POST['dui']);
            $cliente->setTelefono($_POST['telefono']);
            $cliente->setEmail($_POST['email']);
            
            $controlador->guardar($cliente);

            break;
        }
        case '/crud/eliminar':{
            $id=$_GET['id'];
            $controlador->eliminar($id);
            break;
        }   
        case '/crud/actualizarForm':{
            $id=$_GET['id'];
            $controlador->vista_actualizar($id);
            break;
        }
        case '/crud/actualizar':{
             //creando objeto para modificar cliente
             $cliente=new Cliente();

             //obteniendo datos de la peticion y
             //asignandolos al objeto
            
             $cliente->setId($_POST['id']);
             $cliente->setNombre($_POST['nombre']);
             $cliente->setDireccion($_POST['direccion']);
             $cliente->setDui($_POST['dui']);
             $cliente->setTelefono($_POST['telefono']);
             $cliente->setEmail($_POST['email']);

            $controlador->actualizar($cliente);
            break;
        }

        default:  //ruta para estado 404 not found
            $controlador->error();
            break;
    }   

?>