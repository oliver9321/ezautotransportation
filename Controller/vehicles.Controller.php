<?php

require_once 'Config/Core.php'; 
require_once 'Model/vehiclesModel.php'; 

class VehiclesController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Vehicles(); 
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

        GetRouteView(null, "header");
        require_once 'View/vehicles/index.php';
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

          $Vehicle = new Vehicles();

        if(isset($_REQUEST['Id'])){
            $Vehicle =  $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/vehicles/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
        }
    }

    //Guardar un registro
    public function Save()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_REQUEST['Brand']) || isset($_REQUEST['Model'])) {

            $Vehicles = new Vehicles();
            
            //Campos unicos por tabla
            $Vehicles->Id      = $_REQUEST['Id'];
            $Vehicles->Brand   = $_REQUEST['Brand'];
            $Vehicles->Model   = $_REQUEST['Model'];
           
            //Campos genericos
            $Vehicles->DateCreation            = date('Y-m-d H:i:s');
            $Vehicles->UserIdCreation          = $_SESSION['UserOnline']->Id;
            $Vehicles->LastModificationDate    = date('Y-m-d H:i:s');
            $Vehicles->UserIdLastModification  = $_SESSION['UserOnline']->Id;
            $Vehicles->IsActive                = $_REQUEST['IsActive'];

            //Si viene un Id, es porque quieres hacer un Update, de lo contrario INSERT
            if ($Vehicles->Id > 0) {
               $this->model->Update($Vehicles);
            } else {
               $this->model->Create($Vehicles);
            }

            header('Location:index.php?c=vehicles&a=index');

        } else {
            header('Location:index.php?c=vehicles&a=Edit');
        }
    }

    public function newVehicle()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_POST['Brand']) && isset($_POST['Model'])) {

            if($_POST['Brand'] != '' && $_POST['Model'] != ''){

                $Vehicle = new Vehicles();

                $Vehicle->Brand  = $_POST['Brand'];
                $Vehicle->Model  = $_POST['Model'];

                //Campos genericos
                $Vehicle->IsActive                = 1;

                echo json_encode($this->model->Create($Vehicle), true);
              
            }else{
                echo "Please, complete the required fields (*)";
            }

    }else{
        echo "Please, complete the required fields (*)";
    }   
}

public function GetListVehicles(){

    $response = array(
            'BrandsList' => $this->model->GetListBrands(),
            "ModelsList" => $this->model->GetListModels(),
    );
 
    echo json_encode($response, true);
}

public function GetModelsByBrand(){

    $Brand = $_POST['Brand'];

   if($Brand != ""){

    echo json_encode($this->model->GetModelsByBrand($Brand), true);

   }else{
     echo json_encode($this->model->GetAllModels(), true);
   }
}


}