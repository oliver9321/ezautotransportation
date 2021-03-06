<?php

require_once 'Config/Core.php'; // Obligatorio en todos los controladores
require_once 'Model/orderStatusModel.php'; //Insertar Modelo correspondiente al controlador

class OrderStatusController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new OrderStatus(); // Se instancia el Modelo. Nombre de la clase del modelo
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin") {

        GetRouteView(null, "header");
        require_once 'View/orderStatus/index.php';
        GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
        }
    }

    //Vista
    public function View(){

        if($_SESSION['UserOnline']->Profile == "admin") {

         echo json_encode($this->model->View(), true);

        }else{
            header('Location:permision.php');
        }

    }

    //Vista Editar
    public function Edit(){

        if($_SESSION['UserOnline']->Profile == "admin") {

          $OrderStatus = new OrderStatus();

        if(isset($_REQUEST['Id'])){
            $OrderStatus =  $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/orderStatus/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
        }
    }

    //Guardar un registro
    public function Save()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_REQUEST['Status']) ) {

            $OrderStatus = new OrderStatus();
            
            //Campos unicos por tabla
            $OrderStatus->Status   = $_REQUEST['Status'];
            $OrderStatus->Id       = $_REQUEST['Id'];
            $OrderStatus->IsActive  = $_REQUEST['IsActive'];

            //Si viene un Id, es porque quieres hacer un Update, de lo contrario INSERT
            if ($OrderStatus->Id > 0) {
                $this->model->Update($OrderStatus);
            } else {
               $this->model->Create($OrderStatus);
            }

            header('Location:index.php?c=orderStatus&a=index');

        } else {
            header('Location:index.php?c=orderStatus&a=Edit');
        }
    }

}