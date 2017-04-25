<?php
/*
* Autor <jCarlos:Mendoza/>
* Código: UsuarioController.php
* Fecha: 20/04/2017
*/

require_once '../models/conexion.php';
require_once '../models/usuario_model.php';


// Mostrar y Buscar enlaces y mostrar con Ajax
if(isset($_POST['action']) && !empty($_POST['action']))
{
  $action = $_POST['action'];
    if($action)
    {
      $search  = $_POST['search'];
      $enlaces = Usuario::readUsuario($search);
      print $enlaces;
    }
}

// Busqueda por elemento
if(isset($_GET['query']) && !empty($_GET['query']))
{
    $id     = $_GET['query'];
    $enlace = Usuario::getUsuarioById($id);
}


// Obtenemos los datos de la vista para Update o Create
if(isset($_POST['create_update']) && !empty($_POST['create_update']))
{

// Parametros de formulario
  $nombre   = $_POST['nombre'];
  $ap_pat   = $_POST['ap_pat'];
  $ap_mat   = $_POST['ap_mat'];
  $usu      = $_POST['usu'];
  $pw       = $_POST['pw'];


            // Ejecutando el método Update
            if(isset($_POST['id']) && !empty($_POST['id']))
            {
              // Id de usuario
                $id       = $_POST['id'];
                // Instancia de usuario
                $usuario  = new Usuario($id, $nombre, $ap_pat, $ap_mat, $usu, $pw);
                // Método updateUsuario para actualizar registro
                $result   = $usuario->updateUsuario();
                // Mensaje a vista
                if($result)
                          $message = "Usuario editado correctamente.";
                else
                          $message = "Usuario no editado.";
            }
            // Ejecutando el método Create
            else
            {
              // Instancia de usuario y método createUsuario para guardar datos
                $usuario  = new Usuario('', $nombre, $ap_pat, $ap_mat, $usu, $pw);
                $result   = $usuario->createUsuario();
                // Mensaje a vista
                if($result)
                          $message = "Usuario creado correctamente.";
                else
                          $message = "Usuario no creado.";
            }


        // Refrescar enlaces
        $enlaces = Usuario::readUsuario('');
}

// Eliminamos usuario
if(isset($_GET['_query']) && !empty($_GET['_query']))
{
    $id     = $_GET['_query'];
    // Instancia de usuario y método deleteUsuario
    $result = Usuario::deleteUsuario($id);
    // Ménsaje a vista
    if($result)
            $message = "Usuario eliminado correctamente.";
    else
            $message = "Usuario no eliminado.";

            // Refrescar enlaces
            $enlaces = Usuario::readUsuario('');
}



?>
