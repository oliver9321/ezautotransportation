<?php
require_once 'Config/Core.php'; // Obligatorio en todos los controladores
require_once 'Model/orderDetailsModel.php'; //Insertar Modelo correspondiente al controlador

class OrderDetailsController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new OrderDetails(); // Se instancia el Modelo. Nombre de la clase del modelo
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

        GetRouteView(null, "header");
        require_once 'View/orderDetails/index.php';
        GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
        }
    }

    //Vista
    public function View(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

         echo json_encode($this->model->View(), true);

        }else{
            header('Location:permision.php');
        }

    }

    //Vista Editar
    public function Edit(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

          $OrderDetail = new OrderDetails();

        if(isset($_REQUEST['Id'])){
            $OrderDetail =  $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/orderDetails/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
        }
    }

    //Guardar un registro
    public function Save()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_REQUEST['Brand']) && isset($_REQUEST['Model'])  && isset($_REQUEST['IdOrder'])) {

            $OrderDetails = new OrderDetails();
            
            //Campos unicos por tabla
            $OrderDetails->IdOrder         = $_REQUEST['IdOrder'];
            $OrderDetails->Brand           = $_REQUEST['Brand'];
            $OrderDetails->Model           = $_REQUEST['Model'];
            $OrderDetails->Color           = $_REQUEST['Color'];
            $OrderDetails->Year            = $_REQUEST['Year'];
            $OrderDetails->ConditionVehicle  = $_REQUEST['ConditionVehicle'];
            $OrderDetails->CarrierType     = $_REQUEST['CarrierType'];
            $OrderDetails->IsActive        = $_REQUEST['IsActive'];

            //Si viene un Id, es porque quieres hacer un Update, de lo contrario INSERT
            if ($OrderDetails->Id > 0) {
                $this->model->Update($OrderDetails);
            } else {
                $Message = $this->model->Create($OrderDetails);
            }

            header('Location:index.php?c=orderDetails&a=index');

        } else {
            header('Location:index.php?c=orderDetails&a=Edit');
        }
    }

}