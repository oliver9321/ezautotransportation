<?php
require_once 'Config/Core.php'; 
require_once 'Model/companyServicesModel.php'; 

class CompanyServicesController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new CompanyServices(); 
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

        GetRouteView(null, "header");
        require_once 'View/companyServices/index.php';
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

          $CompanyService = new CompanyServices();

        if(isset($_REQUEST['Id'])){
            $CompanyService =  $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/companyServices/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:index.php?c=login&a=index');
        }
    }

    //Guardar un registro
    public function Save()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_REQUEST['CompanyName']) && isset($_REQUEST['CompanyPhone1'])) {

            $CompanyServices = new CompanyServices();
            
            //Campos unicos por tabla
            $CompanyServices->Id                = $_REQUEST['Id'];
            $CompanyServices->CompanyName       = $_REQUEST['CompanyName'];
            $CompanyServices->CompanyAddress    = $_REQUEST['CompanyAddress'];
            $CompanyServices->CompanyCity       = $_REQUEST['CompanyCity'];
            $CompanyServices->CompanyState      = $_REQUEST['CompanyState'];
            $CompanyServices->CompanyZipCode    = $_REQUEST['CompanyZipCode'];
            $CompanyServices->CompanyPhone1     = $_REQUEST['CompanyPhone1'];
            $CompanyServices->CompanyPhone2     = $_REQUEST['CompanyPhone2'];
            $CompanyServices->CompanyEmail      = $_REQUEST['CompanyEmail'];
            $CompanyServices->IsActive          = $_REQUEST['IsActive'];

            //Si viene un Id, es porque quieres hacer un Update, de lo contrario INSERT
            if ($CompanyServices->Id > 0) {
                $this->model->Update($CompanyServices);
            } else {
                $this->model->Create($CompanyServices);
            }
            
            header('Location:index.php?c=companyServices&a=index');

        } else {
            header('Location:index.php?c=companyServices&a=Edit');
        }
    }

    public function NewCompany()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_POST['CompanyName']) && isset($_POST['CompanyPhone1']) &&  isset($_POST['CompanyAddress'])) {

            if($_POST['CompanyName'] != '' && $_POST['CompanyPhone1'] != '' && $_POST['CompanyAddress'] != ''){

                $companyServices= new CompanyServices();

                $companyServices->CompanyName      = $_POST['CompanyName'];
                $companyServices->CompanyAddress   = $_POST['CompanyAddress'];
                $companyServices->CompanyCity      = $_POST['CompanyCity'];
                $companyServices->CompanyState     = $_POST['CompanyState'];
                $companyServices->CompanyZipCode   = $_POST['CompanyZipCode'];
                $companyServices->CompanyPhone1    = $_POST['CompanyPhone1'];
                $companyServices->CompanyPhone2    = $_POST['CompanyPhone2'];
                $companyServices->CompanyEmail     = $_POST['CompanyEmail'];

                //Campos genericos
                $companyServices->IsActive = 1;

                echo json_encode($this->model->Create($companyServices), true);
              
            }else{
                echo "Please, complete the required fields (*)";
            }

    }else{
        echo "Please, complete the required fields (*)";
    }   
}

public function GetListCompanyServices(){
    echo json_encode($this->model->GetListCompanyServices(), true);
}


public function GetInfoCompanyServicesById(){

    if(isset($_POST['Id'])){
        echo json_encode($this->model->Edit($_POST['Id']), true);
    }else{
        echo json_encode(false, true);
    }

}

}