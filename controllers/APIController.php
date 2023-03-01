<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController {
    public static function index(){
        $servicios = Servicio::all();
        
        foreach($servicios as $servicio){
            $array=array(
                array($servicio->id,$servicio->nombre,$servicio->precio),
                array($servicio->id,$servicio->nombre,$servicio->precio)
            );

        }
        debuguear($array);

        
        
    }

    public static function guardar(){
        
        // Almacena la cita y devuelve el id

        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado['id'];

        // Almacena la cita y el servicio

        // Almacena servicios con id cita
        $idServicios = explode(",",$_POST['servicios']);

        foreach($idServicios as $idServicio){

            $args = [
                'citaid' => $id,
                'servicioid' => $idServicio
            ];

            $citaServicio = New CitaServicio($args);

            $citaServicio->guardar();
            
        }

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $servicios = CitaServicio::findservice($id);
            foreach($servicios as $servicio){
                $servicio->eliminar();
            }
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }

    }    

}