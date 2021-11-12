<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: POST");

require_once 'Config/Core.php'; 
require_once 'Model/ordersModel.php'; 
require_once 'Model/quotesModel.php'; 
require_once 'Model/paymentsModel.php'; 
require_once 'Model/orderDetailsModel.php'; 
require_once 'Model/quoteDetailsModel.php'; 
require_once 'Model/orderStatusModel.php';
require_once 'Model/customersModel.php';
require_once 'Model/companyServicesModel.php';
require_once 'Model/driversModel.php';
require_once 'Model/vehiclesModel.php';

class OrdersController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Orders(); 
    }

    //Vista Index
    public function Index(){

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

            
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
            header('Location:permision.php');
        }
    }

    public function Order(){

        if(count($_SESSION) > 0){

            if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {
                
                    $this->orderStatus    = new OrderStatus();
                    $this->customer       = new Customers();
                    $this->companies      = new CompanyServices();
                    $this->drivers        = new Drivers();
                    
                 $OrderStatusList  =  $this->orderStatus->GetListOrderStatus();
                 $CustomerList     =  $this->customer->GetListCustomers();
                 $Companies        =  $this->companies->GetListCompanyServices();
                 $DriverList       =  $this->drivers->GetListDrivers();

                GetRouteView(null, "header");
                require_once 'View/orders/order.php';
                GetRouteView(null, "footer");

        }else{
            header('Location:permision.php');
            }
            
        }else{
             header('Location:permision.php');   
        }

    }

    //Vista
    public function View(){

  
        $OrderArray = "";

        if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {
        
        if(isset($_REQUEST['Id'])){

            $this->orderStatus    = new OrderStatus();
            $this->customer       = new Customers();
            $this->companies      = new CompanyServices();
            $this->drivers        = new Drivers();
            
            $OrderStatusList  =  $this->orderStatus->GetListOrderStatus();
            $CustomerList     =  $this->customer->GetListCustomers();
            $Companies        =  $this->companies->GetListCompanyServices();
            $DriverList       =  $this->drivers->GetListDrivers();

            $OrderArray           = $this->model->Edit2($_REQUEST['Id']);

            $Order                = $OrderArray['order'];
          // $CustomerOrigin       = $OrderArray['CustomerOrigin']; // OLIVER
            //$CustomerDestination  = $OrderArray['CustomerDestination'];
            $CompanyService       = $OrderArray['CompanyService'];
            //$Payment              = $OrderArray['payments'];

            $OrderDetail          = $OrderArray['order_details'];
            $OrderDetail          = json_encode($OrderDetail,true);

            GetRouteView(null, "header");
            require_once 'View/orders/view.php';
            GetRouteView(null, "footer");
            
        
        }else{
            header('Location:index.php?c=dashboard&a=index');
        }


        }else{
            header('Location:permision.php');
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
            $this->vehicles       = new Vehicles();

            $ColorsList = array(
                "White"=>"White",
                "Black"=>"Black",
                "Gray"=>"Gray",
                "Silver"=>"Silver",
                "Blue"=>"Blue",
                "Red"=>"Red",
                "Brown/Beige"=>"Brown/Beige",
                "Yellow/Gold"=>"Yellow/Gold",
                "Green"=>"Green",
                "Other"=>"Other"
            );

            $CarrierList = array(
                "Open"=>"Open",
                "Enclosed"=>"Enclosed"
            );

            $ConditionList = array(
                "Running"=>"Running",
                "Non-running"=>"Non-running"
            );
            
            $OrderStatusList  =  $this->orderStatus->GetListOrderStatus();
            $CustomerList     =  $this->customer->GetListCustomers();
            $Companies        =  $this->companies->GetListCompanyServices();
            $DriverList       =  $this->drivers->GetListDrivers();

            $BrandsList        = $this->vehicles->GetListBrands();
            $ModelsList        = $this->vehicles->GetListModels();

            $OrderArray           = $this->model->Edit($_REQUEST['Id']);

            $Order                = $OrderArray['order'];
            $CustomerOrigin       = $OrderArray['CustomerOrigin']; // OLIVER
            $CustomerDestination  = $OrderArray['CustomerDestination'];
            $CompanyService       = $OrderArray['CompanyService'];
            $Payment              = $OrderArray['payments'];
            $Driver               = $OrderArray['Driver'];
            $OrderDetail2          = $this->model->GetOrderDetailsByOrderId($_REQUEST['Id']);
            
            GetRouteView(null, "header");
            require_once 'View/orders/edit.php';
            GetRouteView(null, "footer");
            
        
        }else{
            header('Location:index.php?c=dashboard&a=index');
        }


        }else{
            header('Location:permision.php');
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
                        $Orders->Total                    = str_replace(',','',$params['Total']);
                        $Orders->Deposit                  = str_replace(',','',$params['Deposit']);
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
                                    $OrderDetails->IsActive          = 1;
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

            }
    }

    public function saveQuote(){

        if(isset($_POST['quote']) && isset($_POST['vehicles'])){

            parse_str($_POST['quote'], $params);
            $vehicles      = $_POST['vehicles'];
            $responseOrder = array("Error" => false, "Message"=>"", "QuoteId"=>"");
            $VehiclesEmail = "<table border='1'  align='center' cellpadding='5' cellspacing='0' class='contentMainTable2' ><thead class='thead-dark'><tr><th>Brand</th><th>Model</th><th>Year</th><th>Condition</th><th>Carrier</th><th>Status</th></tr></thead><tbody>";

                if(count($params) > 0 && count($vehicles) > 0){
             
                        $Quote = new Quotes();
                        $QuoteId = "";
    
                        $Quote->PickUpLocation           = $params['PickUpLocation'];
                        $Quote->OriginCity               = $params['OriginCity1'];
                        $Quote->OriginState              = $params['OriginState2'];
                        $Quote->OriginZipCode            = $params['ZipCode'];
                        $Quote->DeliveryLocation         = $params['DeliveryLocation'];
                        $Quote->DestinyCity              = $params['DestinyCity'];
                        $Quote->DestinyState             = $params['DestinyState'];
                        $Quote->DestinyZipCode           = $params['ZipCode2'];
                        $Quote->TypeVehicle              = $params['TypeVehicle'];
                        $Quote->Comments                 = $params['comments'];
                        $Quote->ShippingDate             = $params['ShippingDate'];
                        $Quote->FirstName                = $params['FirstName'];
                        $Quote->LastName                 = $params['LastName'];
                        $Quote->Phone                    = $params['Phone'];
                        $Quote->Email                    = $params['Email'];
                        $Quote->IsActive                 = 1;
                        $QuoteId = $Quote->Create($Quote);
                       
                        if($QuoteId){

                            $Quote->Id = $QuoteId;
                            
                            foreach ($vehicles as $key => $value) {
        
                                if($value['Brand'] != ''){
    
                                    $QuoteDetails = new QuoteDetails();
                                    $QuoteDetailsID = "";
    
                                    $QuoteDetails->QuoteId           = $QuoteId;
                                    $QuoteDetails->Brand             = $value['Brand'];
                                    $QuoteDetails->Model             = $value['Model'];
                                    $QuoteDetails->Year              = $value['Year'];
                                    $QuoteDetails->ConditionVehicle  = $value['ConditionVehicle'];
                                    $QuoteDetails->CarrierType       = $value['CarrierType'];
                                    $QuoteDetails->StatusVehicle     = $value['StatusVehicle'];
                                    $QuoteDetails->IsActive          = 1;
                                    $QuoteDetailsID                  = $QuoteDetails->Create($QuoteDetails);


                                    if($QuoteDetailsID){
                                        $VehiclesEmail.="<tr><td>".$QuoteDetails->Brand."</td><td>".$QuoteDetails->Model."</td><td>".$QuoteDetails->Year."</td><td>".$QuoteDetails->ConditionVehicle."</td><td>".$QuoteDetails->CarrierType."</td><td>".$QuoteDetails->StatusVehicle."</td></tr>";
                                        $responseOrder['Error'] = false;
                                    }else{
                                        $responseOrder['Error'] = true;
                                        $responseOrder['Message'] = "Step [3] - Error quote details. Please check vehicle list";
                                        echo json_encode($responseOrder, true);
                                    }
        
                                }
                            
                            }
                            $VehiclesEmail .= "</tbody></table>";
    
                            if($responseOrder['Error'] == false){
    
                                $responseOrder['QuoteId'] = $QuoteId;
                                $responseOrder['Message'] = "We will be in contact with you soon";
                                $this->SendEmail($Quote,$VehiclesEmail);
                                echo json_encode($responseOrder, true);
                              
                            }else{
    
                                if($QuoteId){
                                    $responseOrder['QuoteId'] = $QuoteId;
                                    $responseOrder['Message'] = "The quote #".$QuoteId." was created. but please check all fields";
                                    echo json_encode($responseOrder, true);
                                }
                               
                            }
        
                        }else{
                            $responseOrder['Error'] = true;
                            $responseOrder['Message'] = "Step [2] - Error in quote. Please check required fields";
                            echo json_encode($responseOrder, true);
                        }
        
                    
            }else{
                $responseOrder['Error'] = true;
                $responseOrder['Message'] = "Step [0.2] - Error validation order. Vehicle list empty or order info not completed";
                echo json_encode($responseOrder, true);
            }
           
          

            }
    }

    public function SendEmail($Quote,$VehiclesEmail){
        
        $emailto   = 'sales@ezautotransportationusa.com';
        $emailfrom = $Quote->Email != '' ? $Quote->Email:'info@ezautotransportationusa.com';
        $customer  = $Quote->FirstName.' '.$Quote->LastName;
        $fromname  = strtoupper($customer);
        $subject   = 'Quote #'.$Quote->Id.' - '.$customer;
        $url = "https://ezautotransportationusa.com/system/index.php?c=Quotes&a=View&Id=".$Quote->Id;

$HTML_EMAIL = '<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="EN">

<head>
<style type="text/css">
    @media screen {
        @font-face {
            font-family: "Lato";
            font-style: normal;
            font-weight: 400;
            src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
        }

        body,
        html {
            margin: 0px;
            padding: 0px;
            -webkit-font-smoothing: antialiased;
            text-size-adjust: none;
            width: 100% !important;
            background: #F9F9FF;
            font-family: "Lato", "Lucida Grande", "Lucida Sans Unicode", Tahoma, Sans-Serif;
            word-break: break-word;
        }

        .contentMainTable {
            background: #FFFFFF;
            border: 1px solid #EEEEFF;
            margin-top: 98px;
            margin-bottom: 69px;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
            height: auto;
        }

        .contentMainTable2 {
            border: 1px solid #EEEEFF;
            margin-top: 80px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            height: auto;
            text-align: center;
            font-size: 16px;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .logoImage {
            margin-top: -50px;
            padding-bottom: 7px;
        }

        h1 {
            font-weight: bold;
            font-size: 30px;
            font-family: "Lato";
            letter-spacing: 0px;
            color: #25254E;
        }

        p {
            font-weight: 300;
            font-size: 14px;
            letter-spacing: 0px;
            color: #4D4D80;
        }

        .greyLine {
            border: 1px solid #CED7F7;
            width: 100%;
            margin-top: 32px
        }

        h2 {
            font-weight: bold;
            font-size: 15px;
            letter-spacing: 0px;
            color: #25254E;
        }

        h3 {
            font-weight: 300;
            font-size: 15px;
            letter-spacing: 0px;
            color: #4D4D80;
        }

        .footer {
            margin-top: 32px;
            margin-bottom: 20px;
            font-size: 11px;
            font-weight: 300px;
            color: #4D4D80;
        }

        .footerIcons img {
            margin-left: 11px;
            margin-right: 11px;
        }

        .blueButton {
            background: #8AA1EB;
            border-radius: 10px;
            padding: 17px 35px;
            border: none;
            color: #FFFFFF;
            font-size: 15px;
            margin-bottom: 32px;
            cursor: pointer;
        }

        .blueButton:focus {
            outline: none;
            border: 2px solid #5457FF;
            padding: 15px 33px;
        }

        @media only screen and (max-width: 480px) {

            table,
            table tr td,
            table td {
                width: 100%;
            }

            .contentMainTable {
                width: 100%;
                border: none;
            }

            body,
            html {
                background: #FFFFFF;
            }

            h1 {
                font-size: 24px;
            }
        }
    }
</style>
<title>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body style="padding:0; margin: 0;">
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="body_table">
    <tbody>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="20" cellspacing="0" width="100%" class="contentMainTable">

                    <tbody>

                        <tr>
                            <td align="center" valign="top">
                                <center> <span class="isDesktop">
                                        <h1>Quote #'.$Quote->Id.'</h1>
                                    </span></center>
                                <div class="greyLine"></div>
                                <center>
                                    <h3 style="padding-top: 1.5%;"><b>Customer: </b>'.$customer.' | <b>Shipping Date:</b> '.$Quote->ShippingDate.' | <b>Phone:</b> '.$Quote->Phone.' | <b>Email:</b> '.$Quote->Email.'</h3>
                                </center>

                                <table border="0" cellpadding="20" cellspacing="0" width="100%" id="content">

                                    <tbody>
                                        <tr>
                                            <td align="left" valign="top">
                                                <span class="isDesktop">
                                                    <h2 class="font-weight-bold mb-4">Origin:</h2>
                                                    <p class="mb-1">'.$Quote->PickUpLocation.'</p>
                                                    <p class="mb-1">'.$Quote->OriginState.', '.$Quote->OriginCity.'</p>
                                                    <p class="mb-1">'.$Quote->OriginZipCode.'</p>
                                                </span>
                                            </td>

                                            <td align="right" valign="top">
                                                <span class="isDesktop">
                                                    <h2 class="font-weight-bold mb-4">Destination:</h2>
                                                    <p class="mb-1">'.$Quote->DeliveryLocation.'</p>
                                                    <p class="mb-1">'.$Quote->DestinyState.', '.$Quote->DestinyCity.'</p>
                                                    <p class="mb-1">'.$Quote->DestinyZipCode.'</p>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>

                                    '.$VehiclesEmail.'
                                    <div class="greyLine"></div><br>
                                </table>

                                <div class="greyLine"></div><br>
                             <!-- <center> <a target="_blank" href="'.$url.'"><button class="blueButton">See quote</button></a>
                                </center>-->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
</body>

</html>
';

        $headers = 
            'Return-Path: ' . $emailfrom . "\r\n" . 
            'From: ' . $fromname . ' <' . $emailfrom . '>' . "\r\n" . 
            'X-Priority: 3' . "\r\n" . 
            'X-Mailer: PHP ' . phpversion() .  "\r\n" . 
            'Reply-To: ' . $fromname . ' <' . $emailfrom . '>' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" . 
            'Content-Transfer-Encoding: 8bit' . "\r\n" . 
            'Content-type:text/html;charset=UTF-8' . "\r\n";

        $params = '-f ' . $emailfrom;

        return mail($emailto, $subject, $HTML_EMAIL, $headers, $params);

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
                            $Orders->Total                    = str_replace(',','',$params['Total']);
                            $Orders->Deposit                  = str_replace(',','',$params['Deposit']);
                            $Orders->ExtraTrukerFee           = str_replace(',','',$params['ExtraTrukerFee']);
                            $Orders->TrukerOwesUs             = str_replace(',','',$params['TrukerOwesUs']);
                            $Orders->Earnings                 = str_replace(',','',$params['Earnings']);
                            $Orders->Cod                      = str_replace(',','',$params['Cod']);
                            $Orders->TrukerRate               = str_replace(',','',$params['TrukerRate']);
                            $Orders->CancelledNote           = "";
                            $Orders->PaymentStatus           = "N/A";
                            if($Orders->ExtraTrukerFee > 0 || $Orders->TrukerOwesUs > 0){
                                $Orders->PaymentStatus = "Pending"; 
                            }

                            $Orders->IdCompanyService        = $params['IdCompanyService'];
                            $Orders->IdDriver                = $params['IdDriver'];
                            $Orders->IsActive                = 1;
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

            }else{
                $responseOrder['Error'] = true;
                $responseOrder['Message'] = "Step [0] - Error to process the order";
                echo json_encode($responseOrder, true);
            }
    }

    public function updateCustomerOrigin($params){

        $customer = new Customers();
        $customer->Id     =  $params['IdCustomerOrigin'];
        $customer->Phone1 =  $params['OriginPhone1'];
        $customer->Phone2 =  $params['OriginPhone2'];
        $customer->Email  =  $params['OriginEmail'];
        $customer->IsActive = 1;

        return $customer->Update2($customer);

    }

    public function updateCustomerDestination($params){

        $customer = new Customers();
        $customer->Id     =  $params['IdCustomerDestination'];
        $customer->Phone1 =  $params['DestinationPhone1'];
        $customer->Phone2 =  $params['DestinationPhone2'];
        $customer->Email  =  $params['DestinationEmail'];
        $customer->IsActive = 1;
        
        return $customer->Update2($customer);

    }

    public function updateDriver($params){

        $Drivers = new Drivers();
        $Drivers->Id                      = $params['IdDriver'];
        $Drivers->DriverPhone1            = $params['DriverPhone1'];
        $Drivers->DriverPhone2            = $params['DriverPhone2'];
        $Drivers->IsActive = 1;

        return $Drivers->Update2($Drivers);
    }

    public function updateCompanyServices($params){

        $Company = new CompanyServices();
        $Company->Id                       =  $params['IdCompanyService'];
        $Company->CompanyAddress           =  $params['CompanyAddress'];
        $Company->CompanyCity              =  $params['CompanyCity'];
        $Company->CompanyState             =  $params['CompanyState'];
        $Company->CompanyZipCode           =  $params['CompanyZipCode'];
        $Company->CompanyPhone1            =  $params['CompanyPhone1'];
        $Company->CompanyPhone2            =  $params['CompanyPhone2'];
        $Company->CompanyEmail             =  $params['CompanyEmail'];
        $Company->IsActive = 1;

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
            $Orders->CancelledNote  = $_POST['CancelledNote'];
            $Orders->IsActive = 1;
            $result = $Orders->UpdateStatusOrder($Orders);

            echo json_encode($result, true);

        }else{
            echo json_encode(false, true);
        }
    }

    public function PayOrder(){

        if(isset($_POST['Id']) && $_POST['Id'] != ""){

            $Orders = new Orders();
            $result = "";

                $Orders->Id = $_POST['Id'];
                $Orders->PaymentStatus = 'Paid';
                $result = $Orders->PayExtraTruckerFeeAndTrukerOwesUs($Orders);

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