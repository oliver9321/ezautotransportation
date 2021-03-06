<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'Config/Database.php';
$controller = 'login';

if(!isset($_REQUEST['c']))
{
     require_once "Controller/$controller.controller.php";

    if (file_exists("Controller/$controller.controller.php")) {
        $controller = ucwords($controller).'Controller';
        $controller = new $controller;
        $controller->Index();
    }else{
        echo "Check the next files: </br><br>CONTROLADOR:Controller/".$controller.".controller.php<br>Model: Model/".$controller."Model.php<br>View: View/".$controller."/index";
    }

}
else
{
        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';

    try{

        if (file_exists("Controller/$controller.controller.php")) {

            require_once("Controller/$controller.controller.php");
            $controller = ucwords($controller) . 'Controller';
            $controller = new $controller;
            call_user_func(array($controller, $accion));

         }else{
            echo "VERIFIQUE QUE ESTEN CREADO LOS SIGUIENTES ARCHIVOS: </br><br>CONTROLADOR:Controller/".$controller.".controller.php<br>MODELO:Model/".$controller."Model.php<br>VISTA: View/".$controller."/index";
        }


    }catch(Exception $e){
        echo $e;
    }


}
