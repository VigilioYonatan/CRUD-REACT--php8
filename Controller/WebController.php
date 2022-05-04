<?php
namespace Controller;

use Model\UsuarioModel;

class WebController{
    public static function getUser(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            unset($_POST['METHOD']);
            $user = new UsuarioModel($_POST);

            if(isset($_FILES)){
                $imagen = $_FILES['imagen'];
                $user->nombreImagen($imagen);
                $user->crearCarpeta();
                $user->guardarImagen($imagen, $user->imagen);
            }
            $resultado = $user->guardar();
            
            echo json_encode([$resultado, "user"=>$user]);
            exit();
        }
    }

    public static  function getAllUser()
    {
     if($_SERVER['REQUEST_METHOD'] === 'GET'){
         $users = UsuarioModel::all();
        echo json_encode($users);
     }  
    }

    
    public static  function eliminarUser()
    {
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
         $user = UsuarioModel::find($_POST['id']);
         $user->eliminarImagen($user->imagen);
         $user->eliminar();
        echo json_encode(["resultado" => true, "id" => $user->id]);
     }  
    }


    public static  function editarUser()
    {
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $userEditado = new UsuarioModel($_POST);
        if(isset($_FILES['imagen'])){
            $idUser =  $userEditado::where('id', $userEditado->id);
            $userEditado->eliminarImagen($idUser->imagen);

            $imagen = $_FILES['imagen'];
            $userEditado->nombreImagen($imagen);
            $userEditado->crearCarpeta();
            $userEditado->guardarImagen($imagen, $userEditado->imagen);
           
        }
        $userEditado->guardar();

        echo json_encode(["user" => $userEditado]);

     }  
    }
}