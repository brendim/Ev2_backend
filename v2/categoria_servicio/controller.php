<?php

class Controlador
{
    private $lista;

    public function __construct()
    {
        $this->lista = [];
    }

    public function getAll()
    {
        $con = new Conexion();
        $sql = "SELECT id, nombre, imagen, texto, activo FROM categoria_servicio;";
        $rs = mysqli_query($con->getConnection(), $sql);
        if ($rs) {
            while ($tupla = mysqli_fetch_assoc($rs)) {
                $tupla['activo'] = $tupla['activo'] == 1 ? true : false;
                array_push($this->lista, $tupla);
            }
            mysqli_free_result($rs);
        }
        $con->closeConnection();
        return $this->lista;
    }

    public function postNuevo($_nuevoObjeto)
    {
        $con = new Conexion();
     //  var_dump($_nuevoObjeto);
       $id = count($this->getAll()) + 1;
        $sql = "INSERT INTO categoria_servicio (id, nombre, imagen, texto, activo) VALUES ($id,'$_nuevoObjeto->nombre_nuevo', '$_nuevoObjeto->imagen_nuevo', '$_nuevoObjeto->texto_nuevo', true)";
    //echo $sql;
         // INSERT INTO categoria_servicio (id, nombre, imagen, texto, activo) VALUES (0, 'NOMBRE', 'URL IMAGEN', 'TEXTO', true);
        //ejecutar sql
        $rs = [];
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = null;
        }
        // var_dump($rs);
        //cerar conexion
        $con->closeConnection();
        //rs -> resultado de la ejecucion de la query
        if ($rs) {
            return true;
        } 
        return null; 
    }

    public function patchEncenderApagar($_id, $_accion)
    {
        $con = new Conexion();
        $sql = "UPDATE categoria_servicio SET activo = true WHERE id = 0;";
     //   $sql = "UPDATE categoria_servicio SET activo = false WHERE id = 0";
        //UPDATE categoria_servicio SET activo = true WHERE id = 0
         echo $sql;
        //ejecutar sql
        $rs = [];
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = null;
        }
        // var_dump($rs);
        //cerar conexion
        $con->closeConnection();
        //rs -> resultado de la ejecucion de la query
        if ($rs) {
            return true;
        }
        return null;
    }

    public function putNombreById($_nuevo, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE categoria_servicio SET nombre = '$_nuevo' WHERE id = 5;";
        //UPDATE categoria_servicio SET nombre = 'Nuevo nombre', imagen = 'Nueva url imagen', texto = 'Nuevo texto' WHERE id = 0;
         echo $sql;
        //ejecutar sql
        $rs = [];
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = null;
        }
        // var_dump($rs);
        //cerar conexion
        $con->closeConnection();
        //rs -> resultado de la ejecucion de la query
        if ($rs) {
            return true;
        }
        return null;
    }

    public function putImagenById($_nuevo, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE categoria_servicio SET imagen = '$_nuevo' WHERE id = 5;";
        //UPDATE pregunta_frecuente SET pregunta = 'Nueva pregunta', respuesta = 'Nueva respuesta' WHERE id = 0;
        // echo $sql;
        //ejecutar sql
        $rs = [];
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = null;
        }
        // var_dump($rs);
        //cerar conexion
        $con->closeConnection();
        //rs -> resultado de la ejecucion de la query
        if ($rs) {
            return true;
        }
        return null;
    }


    public function putTextoById($_nuevo, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE categoria_servicio SET texto = '$_nuevo' WHERE id = 5;";
        //UPDATE pregunta_frecuente SET pregunta = 'Nueva pregunta', respuesta = 'Nueva respuesta' WHERE id = 0;
        // echo $sql;
        //ejecutar sql
        $rs = [];
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = null;
        }
        // var_dump($rs);
        //cerar conexion
        $con->closeConnection();
        //rs -> resultado de la ejecucion de la query
        if ($rs) {
            return true;
        }
        return null;
    }



    public function deleteById($_id)
    {
        $con = new Conexion();
        $sql = "DELETE FROM categoria_servicio WHERE id = $_id;";
        //echo $sql;
        //ejecutar sql
        $rs = [];
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = null;
        }
        // var_dump($rs);
        //cerar conexion
        $con->closeConnection();
        //rs -> resultado de la ejecucion de la query
        if ($rs) {
            return true;
        }
        return null;
    }
}
