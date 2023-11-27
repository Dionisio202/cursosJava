<?php

class buscar{
    public static function Busca($curso,$nivel){
        include_once("conexion.php");
        $objeto= new Conexion();
        $respuesta=$objeto->Conectar();
        $sql="SELECT * FROM estudiante WHERE curso=(SELECT id_cur FROM cursos WHERE nombre='$curso' and nivel='$nivel')";
        $resultado=$respuesta->prepare($sql);
        $resultado->execute();
        $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($datos);
    }
}
?>