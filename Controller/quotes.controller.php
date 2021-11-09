<?php
require_once 'Config/Core.php'; 
require_once 'Model/quotesModel.php'; 

class QuotesController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Quotes(); 
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

        GetRouteView(null, "header");
        require_once 'View/quotes/index.php';
        GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
        }
    }

    public function View(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

         echo json_encode($this->model->View(), true);

        }else{
            header('Location:permision.php');
        }

    }

    //Vista Editar
  /*  public function Edit(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

          $OrderDetail = new Quotes();

        if(isset($_REQUEST['Id'])){
            $OrderDetail =  $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/orderDetails/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
        }
    }*/

  

}