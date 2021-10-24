<?php

require_once 'Config/Core.php'; 
require_once 'Model/usersModel.php'; 
require_once 'Model/userProfilesModel.php';

class UsersController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Users(); 
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin") {

        GetRouteView(null, "header");
        require_once 'View/users/index.php';
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

          $User = new Users();
          $userProfile = new UserProfiles();
          $userProfileList =  $userProfile->GetListUserProfiles();

        if(isset($_REQUEST['Id'])){
            $User           =  $this->model->Edit($_REQUEST['Id']);
            $User->Password = trim($this->decryptIt(trim($User->Password), KEY));
        }

       GetRouteView(null, "header");
       require_once 'View/users/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
        }
    }

    //Guardar un registro
    public function Save()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_REQUEST['Name']) && isset($_REQUEST['UserName']) && isset($_REQUEST['Password'])) {

            $Users = new Users();
            
            //Campos unicos por tabla
            $Users->Id                    = $_REQUEST['Id'];
            $Users->ProfileUserId         = $_REQUEST['ProfileUserId'];
            $Users->Name                  = $_REQUEST['Name'];
            $Users->LastName              = $_REQUEST['LastName'];
            $Users->UserName              = $_REQUEST['UserName'];
            $Users->Password              = trim($this->encryptIt(trim($_REQUEST['Password']), KEY));
            $Users->Email                 = $_REQUEST['Email'];
            $Users->Image                 = 'logoTransport.png';
            $Users->IsActive              = $_REQUEST['IsActive'];

            //Si viene un Id, es porque quieres hacer un Update, de lo contrario INSERT
            if ($Users->Id > 0) {
                $this->model->Update($Users);
            } else {
                $this->model->Create($Users);
            }

            header('Location:index.php?c=users&a=Index');

        } else {
            header('Location:index.php?c=users&a=Edit');
        }
    }

    function encryptIt($string, $key) {

        $result = '';
        for($i=0; $i<strlen($string)*5; $i++) {
           $char = substr($string, $i, 1);
           $keychar = substr($key, ($i % strlen($key))-1, 1);
           $char = chr(ord($char)+ord($keychar));
           $result.=$char;
        }
        return base64_encode($result);
 }


 function decryptIt($string, $key) {

        $result = '';
        $string = base64_decode($string);
        for($i=0; $i<strlen($string); $i++) {
           $char = substr($string, $i, 1);
           $keychar = substr($key, ($i % strlen($key))-1, 1);
           $char = chr(ord($char)-ord($keychar));
           $result.=$char;
        }
        return $result;
     }

}