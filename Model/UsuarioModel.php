<?php
namespace Model;

class UsuarioModel extends ActiveRecord{
    protected static $tabla = 'users';
    protected static $carpeta = 'users/';
    protected static $columnasDB = ['id','nombre','apellido','edad','imagen'];
    
    public function __construct($args=[])
    {
        $this->id       = $args['id'] ?? null;
        $this->nombre   = $args['nombre'] ?? null;
        $this->apellido   = $args['apellido'] ?? null;
        $this->edad     = $args['edad'] ?? null;
        $this->imagen   = $args['imagen'] ?? null;
    }

    public function nombreImagen($imagen){
        $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
        $this->imagen = md5(uniqid(rand(), true)).".$extension";
    }
}