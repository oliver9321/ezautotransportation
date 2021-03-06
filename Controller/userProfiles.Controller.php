<?php

require_once 'Config/Core.php'; // Obligatorio en todos los controladores
require_once 'Model/userProfilesModel.php'; //Insertar Modelo correspondiente al controlador

class UserProfilesController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new UserProfiles(); // Se instancia el Modelo. Nombre de la clase del modelo
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin") {

        GetRouteView(null, "header");
        require_once 'View/userProfiles/index.php';
        GetRouteView(null, "footer");

        }else{
            header('Location:index.php?c=login&a=index');
        }
    }

    //Vista
    public function View(){

        if($_SESSION['UserOnline']->Profile == "admin") {
         echo json_encode($this->model->View(), true);
        }else{
            header('Location:index.php?c=login&a=index');
        }

    }

    //Vista Editar
    public function Edit(){

        if($_SESSION['UserOnline']->Profile == "admin") {

          $UserProfile = new UserProfiles();

        if(isset($_REQUEST['Id'])){
            $UserProfile =  $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/userProfiles/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:index.php?c=login&a=index');
        }
    }

    //Guardar un registro
    public function Save()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_REQUEST['Profile'])) {

            $UserProfiles = new UserProfiles();
            
            //Campos unicos por tabla
            $UserProfiles->Id           = $_REQUEST['Id'];
            $UserProfiles->Profile      = $_REQUEST['Profile'];
            $UserProfiles->Description  = $_REQUEST['Description'];
            $UserProfiles->IsActive     = $_REQUEST['IsActive'];

            //Si viene un Id, es porque quieres hacer un Update, de lo contrario INSERT
            if ($UserProfiles->Id > 0) {
                $this->model->Update($UserProfiles);
            } else {
               $this->model->Create($UserProfiles);
            }

            header('Location:index.php?c=userProfiles&a=index');

        } else {
            header('Location:index.php?c=userProfiles&a=Edit');
        }
    }

}