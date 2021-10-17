<?php

require_once 'Config/Core.php'; 
require_once 'Model/ordersModel.php'; 
require_once 'Model/paymentsModel.php'; 
require_once 'Model/orderDetailsModel.php'; 
require_once 'Model/orderStatusModel.php';
require_once 'Model/customersModel.php';
require_once 'Model/companyServicesModel.php';
require_once 'Model/driversModel.php';

class OrdersController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Orders(); 
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin") {

            $rsOrders1              = $this->model->getCountOrdersPending();
            $CountOrdersPending     = $rsOrders1['CountOrders'];

            $rsOrders2             = $this->model->getCountOrdersDelivered();
            $CountOrdersDelivered    = $rsOrders2['CountOrders'];

            $rsOrders3              = $this->model->getCountOrdersCancelled();
            $CountOrdersCanceled    = $rsOrders3['CountOrders'];

            $rsOrders4              = $this->model->getCountOrdersPickedUp();
            $CountOrdersPickedUp    = $rsOrders4['CountOrders'];
            $this->orderStatus      = new OrderStatus();
            $OrderStatusList        =  $this->orderStatus->GetListOrderStatus();

            GetRouteView(null, "header");
            require_once 'View/orders/index.php';
            GetRouteView(null, "footer");

        }else{
            header('Location:index.php?c=login&a=index');
        }
    }

    public function Order(){

        if(count($_SESSION) > 0){

         if(isset($_SESSION['UserOnline']) && $_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager"){
                
                 $this->orderStatus    = new OrderStatus();
                 $OrderStatusList  =  $this->orderStatus->GetListOrderStatus();

                GetRouteView(null, "header");
                require_once 'View/orders/order.php';
                GetRouteView(null, "footer");

        }else{
            header('Location:index.php?c=login&a=index');
            }
            
        }else{
             header('Location:index.php?c=login&a=index');   
        }

    }

    //Vista
    public function View(){

  
        $OrderArray = "";

        if($_SESSION['UserOnline']->Profile == "admin") {
        
        if(isset($_REQUEST['Id'])){

            $this->orderStatus    = new OrderStatus();

            $OrderStatusList  =  $this->orderStatus->GetListOrderStatus();

            $OrderArray           = $this->model->Edit($_REQUEST['Id']);
            $Order                = $OrderArray['order'];
            $OrderDetail          = $OrderArray['order_details'];
            $OrderDetail          = json_encode($OrderDetail,true);
            $Payment              = $OrderArray['payments'];
            $CustomerOrigin       = $OrderArray['CustomerOrigin']; // OLIVER
            $CustomerDestination  = $OrderArray['CustomerDestination'];

            GetRouteView(null, "header");
            require_once 'View/orders/view.php';
            GetRouteView(null, "footer");
            
        
        }else{
            header('Location:index.php?c=dashboard&a=index');
        }


        }else{
            header('Location:index.php?c=login&a=index');
        }
    }

    public function List(){
        echo json_encode($this->model->View(), true);
    }

    public function OrderPending(){
         echo json_encode($this->model->OrderPending(), true);
    }

    public function OrderPickedUp(){
         echo json_encode($this->model->OrderPickedUp(), true);
    }

    //Vista Editar
    public function Edit(){

        $OrderArray = "";

        if($_SESSION['UserOnline']->Profile == "admin") {
        
        if(isset($_REQUEST['Id'])){

            $this->orderStatus    = new OrderStatus();
            $this->customer       = new Customers();
            $this->companies      = new CompanyServices();
            $this->drivers        = new Drivers();
            
            $OrderStatusList  =  $this->orderStatus->GetListOrderStatus();
            $CustomerList     =  $this->customer->GetListCustomers();
            $Companies        =  $this->companies->GetListCompanyServices();
            $DriverList       =  $this->drivers->GetListDrivers();

            $OrderArray           = $this->model->Edit($_REQUEST['Id']);

            $Order                = $OrderArray['order'];
            $CustomerOrigin       = $OrderArray['CustomerOrigin']; // OLIVER
            $CustomerDestination  = $OrderArray['CustomerDestination'];
            $CompanyService       = $OrderArray['CompanyService'];
            $Payment              = $OrderArray['payments'];
            $Driver               = $OrderArray['Driver'];
            $OrderDetail          = $OrderArray['order_details'];
            $OrderDetail          = json_encode($OrderDetail,true);
            
            GetRouteView(null, "header");
            require_once 'View/orders/edit.php';
            GetRouteView(null, "footer");
            
        
        }else{
            header('Location:index.php?c=dashboard&a=index');
        }


        }else{
            header('Location:index.php?c=login&a=index');
        }
    }

    //Guardar un registro
    public function Save()
    {
        //Se colocan los campos obligatorios en la tabla.
        if (isset($_REQUEST['IdCustomerOrigin']) && isset($_REQUEST['IdCustomerDestination'])) {

            $Orders = new Orders();
            $Orders->IsActive                = $_REQUEST['IsActive'];

            //Si viene un Id, es porque quieres hacer un Update, de lo contrario INSERT
            if ($Orders->Id > 0) {

                $Message =  $this->model->Update($Orders);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "/index.php?c=orders&a=Edit&Id="+$orders->Id+"; }, 100);</script>';
                } else {
                    header('Location:index.php?c=orders&a=index');
                }

            } else {

                $Message = $this->model->Create($Orders);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "../index.php"; }, 100);</script>';
                } else {
                    header('Location:index.php?c=orders&a=index');
                }
            }

        } else {
            header('Location:index.php?c=orders&a=Edit');
        }
    }
    
    public function SaveOrder(){

        if(isset($_POST['order']) && isset($_POST['vehicles'])){

            parse_str($_POST['order'], $params);
            $vehicles      = $_POST['vehicles'];
            $responseOrder = array("Error" => false, "Message"=>"", "OrderId"=>"");

            //Insertar
            if($params['Id'] == ''){
                
                if(count($params) > 0 && count($vehicles) > 0){

                    $Payment = new Payments();
                    $IdPayment = "";
    
                    $Payment->CardHolderName   = $params['CardHolderName'];
                    $Payment->CreditCard       = $params['CreditCard'];
                    $Payment->ExpDate          = $params['ExpDate'];
                    $Payment->Cvv              = $params['Cvv'];
                    $Payment->BillingAddress   = $params['BillingAddress'];
                    $Payment->BillingCity      = $params['BillingCity'];
                    $Payment->BillingState     = $params['BillingState'];
                    $Payment->BillingZipCode   = $params['BillingZipCode'];
                    $Payment->Reference        = $params['Reference'];
                    $Payment->Tel1             = $params['Tel1'];
                    $Payment->Tel2             = $params['Tel2'];
                    $Payment->PaymentEmail     = $params['PaymentEmail'];
                    $Payment->PaymentNote      = $params['PaymentNote'];
                    $Payment->IsActive         = 1;
        
                    $IdPayment = $Payment->Create($Payment);
                
                    //PASO 1: Insertar el pago
                    if($IdPayment){
    
                        $Orders = new Orders();
                        $IdOrder = "";
    
                        $Orders->IdCustomerOrigin         = $params['IdCustomerOrigin'];
                        $Orders->IdCustomerDestination    = $params['IdCustomerDestination'];
                        $Orders->OrderStatusID            = $params['OrderStatusID'];
                        $Orders->IdPayment                = $IdPayment;
                        $Orders->OrderDate                = $params['OrderDate'];
                        $Orders->PickUpDate               = $params['PickUpDate'];
                        $Orders->DeliveryDate             = $params['DeliveryDate'];
                        $Orders->OriginAddress            = $params['OriginAddress'];
                        $Orders->OriginCity               = $params['OriginCity'];
                        $Orders->OriginState              = $params['OriginState'];
                        $Orders->OriginZip                = $params['OriginZip'];
                        $Orders->OriginNote               = $params['OriginNote'];
                        $Orders->DestinationAddress       = $params['DestinationAddress'];
                        $Orders->DestinationCity          = $params['DestinationCity'];
                        $Orders->DestinationState         = $params['DestinationState'];
                        $Orders->DestinationZip           = $params['DestinationZip'];
                        $Orders->DestinationNote          = $params['DestinationNote'];
                        $Orders->Total                    = $params['Total'];
                        $Orders->Deposit                  = $params['Deposit'];
                        $Orders->IsActive                = 1;
    
                        $IdOrder = $Orders->Create($Orders);
        
                        if($IdOrder){
        
                            foreach ($vehicles as $key => $value) {
        
                                if($value['Brand'] != ''){
    
                                    $OrderDetails = new OrderDetails();
                                    $OrderDetailsID = "";
    
                                    $OrderDetails->IdOrder           = $IdOrder;
                                    $OrderDetails->Brand             = $value['Brand'];
                                    $OrderDetails->Model             = $value['Model'];
                                    $OrderDetails->Color             = $value['Color'];
                                    $OrderDetails->Year              = $value['Year'];
                                    $OrderDetails->Vin               = $value['Vin'];
                                    $OrderDetails->ConditionVehicle  = $value['ConditionVehicle'];
                                    $OrderDetails->CarrierType       = $value['CarrierType'];
                                    $OrderDetailsID                  = $OrderDetails->Create($OrderDetails);
                                   
                                    if($OrderDetailsID){
                                        $responseOrder['Error'] = false;
                                    }else{
                                        $responseOrder['Error'] = true;
                                        $responseOrder['Message'] = "Step [3] - Error order details module. Please check vehicle list";
                                        echo json_encode($responseOrder, true);
                                    }
        
                                }
                            
                            }
    
                            if($responseOrder['Error'] == false){
    
                                $responseOrder['OrderId'] = $IdOrder;
                                $responseOrder['Message'] = "The order #".$IdOrder." was created successfully";
                                echo json_encode($responseOrder, true);
    
                            }else{
    
                                if($IdOrder){
                                    $responseOrder['OrderId'] = $IdOrder;
                                    $responseOrder['Message'] = "The order #".$IdOrder." was created. but please check all fields";
                                    echo json_encode($responseOrder, true);
                                }
                               
                            }
        
                        }else{
                            $responseOrder['Error'] = true;
                            $responseOrder['Message'] = "Step [2] - Error in order module. Please check required fields: [IdCustomerOrigin,IdCustomerOrigin,OrderStatusID,IdPayment,OrderDate,PickUpDate,DeliveryDate,OriginAddress,OriginCity,OriginState,DestinationAddress,DestinationCity,DestinationState,Total,Deposit]";
                            echo json_encode($responseOrder, true);
                        }
        
                }else{
                    $responseOrder['Error'] = true;
                    $responseOrder['Message'] = "Step [1] - Error in payment module. Please check required fields: [CardHolderName,CreditCard,ExpDate,Cvv]";
                    echo json_encode($responseOrder, true);
                }
                    
            }else{
                $responseOrder['Error'] = true;
                $responseOrder['Message'] = "Step [0.2] - Error validation order. Vehicle list empty or order info not completed";
                echo json_encode($responseOrder, true);
            }
           
           
            }else{
                $responseOrder['Error'] = true;
                $responseOrder['Message'] = "Step [0.1] - Error validation order. Vehicle list empty or order info not completed";
                echo json_encode($responseOrder, true);
            }


            //Update regist
            }else{

                
          //Campos unicos por tabla
          //$Orders->IdCompanyService         = $params['IdCompanyService'];
          // $Orders->IdDriver                 = $params['IdDriver'];           // $Orders->ExtraTrukerFee           = $params['ExtraTrukerFee'];
          //  $Orders->TrukerOwesUs             = $params['TrukerOwesUs'];
           // $Orders->Earnings                 = $params['Earnings'];
           // $Orders->Cod                      = $params['Cod'];
           // $Orders->TrukerRate               = $params['TrukerRate'];
           // $Orders->RequestStatus            = $params['RequestStatus'];
                
            }
    }

    public function UpdateOrder(){

        if(isset($_POST['order']) && isset($_POST['vehicles'])){

            parse_str($_POST['order'], $params);
            $vehicles      = $_POST['vehicles'];
            $responseOrder = array("Error" => false, "Message"=>"", "OrderId"=>"");

            //Update order
            if($params['Id'] != ''){
                
                if(count($params) > 0 && count($vehicles) > 0){

                        if($params['PaymentID'] != "" ){
                            $this->updatePayment($params);
                        }else{
                            $responseOrder['Error'] = true;
                            $responseOrder['Message'] = "Payment ID or OrderID not found - Payment and Order module";
                            echo json_encode($responseOrder, true);
                            return;
                        }
                     
                            $Orders = new Orders();
                            $Orders->Id                       = $params['Id'];
                            $Orders->IdCustomerOrigin         = $params['IdCustomerOrigin'];
                            $Orders->IdCustomerDestination    = $params['IdCustomerDestination'];
                            $Orders->OrderStatusID            = $params['OrderStatusID'];
                            $Orders->IdPayment                = $params['PaymentID'];
                            $Orders->OrderDate                = $params['OrderDate'];
                            $Orders->PickUpDate               = $params['PickUpDate'];
                            $Orders->DeliveryDate             = $params['DeliveryDate'];
                            $Orders->OriginAddress            = $params['OriginAddress'];
                            $Orders->OriginCity               = $params['OriginCity'];
                            $Orders->OriginState              = $params['OriginState'];
                            $Orders->OriginZip                = $params['OriginZip'];
                            $Orders->OriginNote               = $params['OriginNote'];
                            $Orders->DestinationAddress       = $params['DestinationAddress'];
                            $Orders->DestinationCity          = $params['DestinationCity'];
                            $Orders->DestinationState         = $params['DestinationState'];
                            $Orders->DestinationZip           = $params['DestinationZip'];
                            $Orders->DestinationNote          = $params['DestinationNote'];
                            $Orders->Total                    = $params['Total'];
                            $Orders->Deposit                  = $params['Deposit'];
                            $Orders->ExtraTrukerFee           = $params['ExtraTrukerFee'];
                            $Orders->TrukerOwesUs             = $params['TrukerOwesUs'];
                            $Orders->Earnings                 = $params['Earnings'];
                            $Orders->Cod                      = $params['Cod'];
                            $Orders->TrukerRate               = $params['TrukerRate'];
                            $Orders->IsActive                = 1;
                            $Orders->CancelledNote           = "";
                            $Orders->IdCompanyService        = $params['IdCompanyService'];
                            $Orders->IdDriver                = $params['IdDriver'];
                            
                            $Orders->Update($Orders);
                            
                        
                        //update info company services
                        if($params['IdCompanyService'] != ""){
                            $this->updateCompanyServices($params);
                        }

                        //update info origin customer
                        if($params['IdCustomerOrigin'] != ""){
                            $this->updateCustomerOrigin($params);
                        }

                        //update info destination customer
                        if($params['IdCustomerDestination'] != ""){
                            $this->updateCustomerDestination($params);
                        }

                        //update info Drivers
                        if($params['IdDriver'] != ""){
                           $this->updateDriver($params);
                        }

                        //Actualizar la orden de vehiculos
                        if($Orders->Id != ""){

                            $OrderDetails = new OrderDetails();
                            $OrderDetails->DeleteOrderDetail($Orders->Id);
        
                            foreach ($vehicles as $key => $value) {
        
                                if($value['Brand'] != ''){
    
                                    $OrderDetails = new OrderDetails();
                                    $OrderDetailsID = "";
    
                                    $OrderDetails->IdOrder           = $Orders->Id;
                                    $OrderDetails->Brand             = $value['Brand'];
                                    $OrderDetails->Model             = $value['Model'];
                                    $OrderDetails->Color             = $value['Color'];
                                    $OrderDetails->Year              = $value['Year'];
                                    $OrderDetails->Vin               = $value['Vin'];
                                    $OrderDetails->ConditionVehicle  = $value['ConditionVehicle'];
                                    $OrderDetails->CarrierType       = $value['CarrierType'];
                                    $OrderDetailsID                  = $OrderDetails->Create($OrderDetails);
                                   
                                    if($OrderDetailsID){
                                        $responseOrder['Error'] = false;
                                    }else{
                                        $responseOrder['Error'] = true;
                                        $responseOrder['Message'] = "Step [3] - Error order details module. Please check vehicle list";
                                        echo json_encode($responseOrder, true);
                                    }
        
                                }
                            
                            }
    
                            if($responseOrder['Error'] == false){
    
                                $responseOrder['OrderId'] = $Orders->Id;
                                $responseOrder['Message'] = "The order #".$Orders->Id." was updated successfully";
                                echo json_encode($responseOrder, true);
    
                            }else{
    
                                if($Orders->Id){
                                    $responseOrder['OrderId'] = $Orders->Id;
                                    $responseOrder['Message'] = "The order #".$Orders->Id." was updated. but please check all fields";
                                    echo json_encode($responseOrder, true);
                                }
                               
                            }
        
                        }else{
                            $responseOrder['Error'] = true;
                            $responseOrder['Message'] = "Step [2] - Error in order module. Please check required fields: [IdCustomerOrigin,IdCustomerOrigin,OrderStatusID,IdPayment,OrderDate,PickUpDate,DeliveryDate,OriginAddress,OriginCity,OriginState,DestinationAddress,DestinationCity,DestinationState,Total,Deposit]";
                            echo json_encode($responseOrder, true);
                        }
        
                    
            }else{
                $responseOrder['Error'] = true;
                $responseOrder['Message'] = "Step [0.2] - Error validation order. Vehicle list empty or order info not completed";
                echo json_encode($responseOrder, true);
            }
           
           
            }else{
                $responseOrder['Error'] = true;
                $responseOrder['Message'] = "Step [0.1] - Error validation order. Vehicle list empty or order info not completed";
                echo json_encode($responseOrder, true);
            }

            }
    }

    public function updateCustomerOrigin($params){

        $customer = new Customers();
        $customer->Id     =  $params['IdCustomerOrigin'];
        $customer->Phone1 =  $params['OriginPhone1'];
        $customer->Phone2 =  $params['OriginPhone2'];
        $customer->Email  =  $params['OriginEmail'];
        
        return $customer->Update2($customer);

    }

    public function updateCustomerDestination($params){

        $customer = new Customers();
        $customer->Id     =  $params['IdCustomerDestination'];
        $customer->Phone1 =  $params['DestinationPhone1'];
        $customer->Phone2 =  $params['DestinationPhone2'];
        $customer->Email  =  $params['DestinationEmail'];
        
        return $customer->Update2($customer);

    }

    public function updateDriver($params){

        $Drivers = new Drivers();
        $Drivers->Id                      = $params['IdDriver'];
        $Drivers->DriverPhone1            = $params['DriverPhone1'];
        $Drivers->DriverPhone2            = $params['DriverPhone2'];

        return $Drivers->Update2($Drivers);
    }

    public function updateCompanyServices($params){

        $Company = new CompanyServices();
        $Company->Id                       = $params['IdCompanyService'];
        $Company->CompanyAddress           =  $params['CompanyAddress'];
        $Company->CompanyCity              =  $params['CompanyCity'];
        $Company->CompanyState             =  $params['CompanyState'];
        $Company->CompanyZipCode           =  $params['CompanyZipCode'];
        $Company->CompanyPhone1            =  $params['CompanyPhone1'];
        $Company->CompanyPhone2            =  $params['CompanyPhone2'];
        $Company->CompanyEmail             =  $params['CompanyEmail'];

        return $Company->Update2($Company);
    }

    public function updatePayment($params){

        $Payment = new Payments();
        $Payment->Id               = $params['PaymentID'];
        
        $Payment->CardHolderName   = $this->encryptIt(trim($params['CardHolderName']), KEY);
        $Payment->CreditCard       = $this->encryptIt(trim($params['CreditCard']), KEY);
        $Payment->ExpDate          = $this->encryptIt(trim($params['ExpDate']), KEY);
        $Payment->Cvv              = $this->encryptIt(trim($params['Cvv']), KEY);
        $Payment->BillingAddress   = $params['BillingAddress'];
        $Payment->BillingCity      = $params['BillingCity'];
        $Payment->BillingState     = $params['BillingState'];
        $Payment->BillingZipCode   = $params['BillingZipCode'];
        $Payment->Reference        = $params['Reference'];
        $Payment->Tel1             = $params['Tel1'];
        $Payment->Tel2             = $params['Tel2'];
        $Payment->PaymentEmail     = $params['PaymentEmail'];
        $Payment->PaymentNote      = $params['PaymentNote'];
        $Payment->IsActive         = 1;
       
        return $Payment->Update($Payment);
    }



    public function UpdateStatusOrder(){

        if(isset($_POST['Id']) && isset($_POST['OrderStatusID'])){

            $Orders = new Orders();
            $Orders->Id             = $_POST['Id'];
            $Orders->OrderStatusID  = $_POST['OrderStatusID'];
            $result = $Orders->UpdateStatusOrder($Orders);

            echo json_encode($result, true);

        }else{
            echo json_encode(false, true);
        }
    }

    public function PayOrder(){

        if(isset($_POST['Id']) && $_POST['Id'] != "" && isset($_POST['FieldSelected']) && $_POST['FieldSelected'] != ""){

            $Orders = new Orders();
            $result = "";

            if($_POST['FieldSelected'] == "ExtraTruckerFee"){
               
                $Orders->Id = $_POST['Id'];
                $Orders->ExtraTrukerFee  = 0;
                $result = $Orders->PayExtraTruckerFee($Orders);
                
            }else if($_POST['FieldSelected'] == "TruckerOwesUS"){
                
                $Orders->Id = $_POST['Id'];
                $Orders->TrukerOwesUs = 0;
                $result = $Orders->PayTruckerOwesUS($Orders);

            }
           
            echo json_encode($result, true);

        }else{
            echo json_encode(false, true);
        }
    }


    public function GetStatusOrder(){

        if(isset($_POST['OrderID']) && $_POST['OrderID'] != ""){

            $Orders = new Orders();
            $Orders->Id  = str_ireplace(array('&lt;b&gt;', '&lt;/b&gt;', '&lt;h2&gt;', '&lt;/h2&gt;'), '',htmlspecialchars(trim($_POST['OrderID'])));
            $result = $Orders->GetStatusOrderById($Orders);

            if($result){
                echo json_encode($result, true);
            }else{
                echo json_encode(false, true);
            }
 
        }else{
            echo json_encode(false, true);
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