<?php

class Orders {

    private $pdo;

    public $Id;
    public $IdCustomerOrigin;
    public $IdCustomerDestination;
    public $IdCompanyService;
    public $IdDriver;
    public $OrderStatusID;
    public $IdPayment;
    public $OrderDate;
    public $PickUpDate;
    public $DeliveryDate;
    public $OriginAddress;
    public $OriginCity;
    public $OriginState;
    public $OriginZip;
    public $OriginNote;
    public $DestinationAddress;
    public $DestinationCity;
    public $DestinationState;
    public $DestinationZip;
    public $DestinationNote;
    public $Total;
    public $Deposit;
    public $ExtraTrukerFee;
    public $TrukerOwesUs;
    public $Earnings;
    public $Cod;
    public $TrukerRate;
    public $DateCreation;
    public $UserIdCreation;
    public $LastModificationDate;
    public $UserIdLastModification;
    public $IsActive;
    public $CancelledNote;
    public $CustomerOrigin;
    public $CustomerDestination;
    public $PaymentStatus;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function View()
    {
        try
        {
                $stm = $this->pdo->prepare("SELECT Id, IdPayment, Status, CustomerOrigin, CustomerOrigin, CustomerOriginPhone1, CustomerDestination, CustomerDestinationPhone1, OrderDate, PickUpDate, DeliveryDate, OriginCity, DestinationCity, Deposit, CompanyServices, CompanyPhone1, DriverName, DriverPhone1, OriginNote, DestinationNote, CancelledNote, PaymentStatus, DateCreation FROM vw_orders where IsActive = 1");
                $stm->execute();

                $row = $stm->fetchAll();

                $response = array();
                $response['success'] = true;
                $response['aaData'] = $row;
                
                return $response;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function OrderPending()
    {
        try
        {
                $stm = $this->pdo->prepare("SELECT Id, CustomerOrigin, CustomerDestination, OrderDate, PickUpDate, DeliveryDate, OriginCity, DestinationCity FROM vw_orders where IsActive = 1 AND Status ='Pending'");
                $stm->execute();

                $row = $stm->fetchAll();

                $response = array();
                $response['success'] = true;
                $response['aaData'] = $row;
                
                return $response;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function OrderPickedUp()
    {
        try
        {
                $stm = $this->pdo->prepare("SELECT Id, CustomerOrigin, CustomerDestination, PickUpDate, DeliveryDate, OriginCity, DestinationCity FROM vw_orders where IsActive = 1 AND Status ='Picked Up'");
                $stm->execute();

                $row = $stm->fetchAll();

                $response = array();
                $response['success'] = true;
                $response['aaData'] = $row;
                
                return $response;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    
    public function GetOrderById($id)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT *  FROM tbl_orders WHERE Id = ? AND IsActive = 1");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Edit($id)
    {
        try
        {
            $OrderData = array();
            $stm = $this->pdo->prepare("SELECT *  FROM tbl_orders WHERE Id = ?");
            $stm->execute(array($id));
            $Order = $stm->fetch(PDO::FETCH_OBJ);

            if($Order){

                $stm2 = $this->pdo->prepare("SELECT *  FROM tbl_order_details WHERE IdOrder = ?");
                $stm2->execute(array($id));
    
                $IdPayment = $Order->IdPayment;
                $stm3 = $this->pdo->prepare("SELECT *  FROM tbl_payments WHERE Id = ?");
                $stm3->execute(array($IdPayment));

                $IdCustomerOrigin = $Order->IdCustomerOrigin;
                $stm4 = $this->pdo->prepare("SELECT *  FROM tbl_customers WHERE Id = ?");
                $stm4->execute(array($IdCustomerOrigin));

                $IdCustomerDestination = $Order->IdCustomerDestination;
                $stm5 = $this->pdo->prepare("SELECT *  FROM tbl_customers WHERE Id = ?");
                $stm5->execute(array($IdCustomerDestination));

                $IdCompanyService = $Order->IdCompanyService;
                $stm6 = $this->pdo->prepare("SELECT *  FROM tbl_company_services WHERE Id = ?");
                $stm6->execute(array($IdCompanyService));

                $IdDriver = $Order->IdDriver;
                $stm7 = $this->pdo->prepare("SELECT *  FROM tbl_drivers WHERE Id = ?");
                $stm7->execute(array($IdDriver));
               
                $OrderData['order']               = $Order;
                $OrderData['order_details']       = $stm2->fetchAll(PDO::FETCH_ASSOC);
               
                $payments                  = $stm3->fetch(PDO::FETCH_OBJ);
                $payments->CardHolderName   = $this->decryptIt(trim($payments->CardHolderName), KEY);
                $payments->CreditCard       = $this->decryptIt(trim($payments->CreditCard), KEY);
                $payments->ExpDate          = $this->decryptIt(trim($payments->ExpDate), KEY);
                $payments->Cvv              = $this->decryptIt(trim($payments->Cvv), KEY);

                $OrderData['payments']      = $payments;

                $OrderData['CustomerOrigin']      = $stm4->fetch(PDO::FETCH_OBJ);
                $OrderData['CustomerDestination'] = $stm5->fetch(PDO::FETCH_OBJ);
                $OrderData['CompanyService']      = $stm6->fetch(PDO::FETCH_OBJ);
                $OrderData['Driver']              = $stm7->fetch(PDO::FETCH_OBJ);

                return $OrderData;

            }else{
                return $OrderData;
            }
          
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetOrderDetailsByOrderId($OrderId){

        $stm2 = $this->pdo->prepare("SELECT *  FROM tbl_order_details WHERE IdOrder = ?");
        $stm2->execute(array($OrderId));
        return $stm2->fetchAll(PDO::FETCH_ASSOC);

    }
  
    public function Edit2($id)
    {
        try
        {
            $OrderData = array();
            $stm = $this->pdo->prepare("SELECT *  FROM vw_orders WHERE Id = ?");
            $stm->execute(array($id));
            $Order = $stm->fetch(PDO::FETCH_OBJ);

            if($Order){

                $stm2 = $this->pdo->prepare("SELECT *  FROM tbl_order_details WHERE IdOrder = ?");
                $stm2->execute(array($id));
    
                $IdCompanyService = $Order->IdCompanyService;
                $stm6 = $this->pdo->prepare("SELECT *  FROM tbl_company_services WHERE Id = ?");
                $stm6->execute(array($IdCompanyService));

                $IdDriver = $Order->IdDriver;
                $stm7 = $this->pdo->prepare("SELECT *  FROM tbl_drivers WHERE Id = ?");
                $stm7->execute(array($IdDriver));
               
                $OrderData['order']               = $Order;
                $OrderData['order_details']       = $stm2->fetchAll(PDO::FETCH_ASSOC);
          
                $Order->CardHolderName   = $this->decryptIt(trim($Order->CardHolderName), KEY);
                $Order->CreditCard       = $this->decryptIt(trim($Order->CreditCard), KEY);
                $Order->ExpDate          = $this->decryptIt(trim($Order->ExpDate), KEY);
                $Order->Cvv              = $this->decryptIt(trim($Order->Cvv), KEY);

                $OrderData['CompanyService']      = $stm6->fetch(PDO::FETCH_OBJ);
                $OrderData['Driver']              = $stm7->fetch(PDO::FETCH_OBJ);

                return $OrderData;

            }else{
                return $OrderData;
            }
          
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    public function Update($data)
    {   
        
        try
        {
            $sql = "UPDATE tbl_orders SET
                        IdCustomerOrigin  = ?,
                        IdCustomerDestination  = ?,
                        IdCompanyService  = ?,
                        IdDriver  = ?,
                        OrderStatusID  = ?,
                        IdPayment  = ?,
                        OrderDate  = ?,
                        PickUpDate  = ?,
                        DeliveryDate  = ?,
                        OriginAddress  = ?,
                        OriginCity  = ?,
                        OriginState  = ?,
                        OriginZip  = ?,
                        OriginNote  = ?,
                        DestinationAddress  = ?,
                        DestinationCity  = ?,
                        DestinationState  = ?,
                        DestinationZip  = ?,
                        DestinationNote  = ?,
                        Total  = ?,
                        Deposit  = ?,
                        ExtraTrukerFee  = ?,
                        TrukerOwesUs = ?,
                        Earnings  = ?,
                        Cod  = ?,
                        TrukerRate  = ?,
						LastModificationDate = ?,
						UserIdLastModification = ?,
						IsActive = ?,
                        CancelledNote = ?,
                        PaymentStatus= ?
				    WHERE Id = ?";

$result = $this->pdo->prepare($sql)->execute(
                    array(
                        $data->IdCustomerOrigin,
                        $data->IdCustomerDestination,
                        $data->IdCompanyService,
                        $data->IdDriver,
                        $data->OrderStatusID,
                        $data->IdPayment,
                        $data->OrderDate,
                        $data->PickUpDate,
                        $data->DeliveryDate,
                        $data->OriginAddress,
                        $data->OriginCity,
                        $data->OriginState,
                        $data->OriginZip,
                        $data->OriginNote,
                        $data->DestinationAddress,
                        $data->DestinationCity,
                        $data->DestinationState,
                        $data->DestinationZip,
                        $data->DestinationNote,
                        $data->Total,
                        $data->Deposit,
                        $data->ExtraTrukerFee,
                        $data->TrukerOwesUs,
                        $data->Earnings,
                        $data->Cod,
                        $data->TrukerRate,
                        date("Y-m-d H:i:s"),
                        (int)$_SESSION['UserOnline']->Id,
                        (int)$data->IsActive,
                        $data->CancelledNote,
                        $data->PaymentStatus,
                        intval($data->Id)
                    )
                );

                return $result;

        } catch (Exception $e)
        {
            die("Update order: ".$e->getMessage());
        }
    }

    public function Create (Orders $data)
    {
     
        try
        {
            $sql = "INSERT INTO tbl_orders(
                IdCustomerOrigin,
                IdCustomerDestination,
                OrderStatusID,
                IdPayment,
                OrderDate,
                PickUpDate,
                DeliveryDate,
                OriginAddress,
                OriginCity,
                OriginState,
                OriginZip,
                OriginNote,
                DestinationAddress,
                DestinationCity,
                DestinationState,
                DestinationZip,
                DestinationNote,
                Total,
                Deposit,
                DateCreation,
                UserIdCreation,
                IsActive) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

   $this->pdo->prepare($sql)->execute(
                    array(
                        $data->IdCustomerOrigin,
                        $data->IdCustomerDestination,
                        $data->OrderStatusID,
                        $data->IdPayment,
                        $data->OrderDate,
                        $data->PickUpDate,
                        $data->DeliveryDate,
                        $data->OriginAddress,
                        $data->OriginCity,
                        $data->OriginState,
                        $data->OriginZip,
                        $data->OriginNote,
                        $data->DestinationAddress,
                        $data->DestinationCity,
                        $data->DestinationState,
                        $data->DestinationZip,
                        $data->DestinationNote,
                        $data->Total,
                        $data->Deposit,
                        date('Y-m-d H:i:s'),
                        (int)$_SESSION['UserOnline']->Id,
                        1
                    )
                );
               
                return $this->pdo->lastInsertId();

        } catch (Exception $e)
        {
            die("insert order:".$e->getMessage());
        }
    }

    public function getCountOrders(){

        $stm2 = $this->pdo->prepare("SELECT COUNT(*) as CountOrders FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4"); //Distinta de cancelado
        $stm2->execute();
        return $stm2->fetch();
    }

    public function getCountOrdersPending(){

        $stm2 = $this->pdo->prepare("SELECT COUNT(*) as CountOrders FROM tbl_orders WHERE IsActive = 1 and OrderStatusID = 1"); //Pending
        $stm2->execute();
        return $stm2->fetch();
    }

    public function getCountOrdersCancelled(){

        $stm2 = $this->pdo->prepare("SELECT COUNT(*) as CountOrders FROM tbl_orders WHERE IsActive = 1 and OrderStatusID = 4"); // canceled
        $stm2->execute();
        return $stm2->fetch();
    }

    public function getCountOrdersDelivered(){

        $stm2 = $this->pdo->prepare("SELECT COUNT(*) as CountOrders FROM tbl_orders WHERE IsActive = 1 and OrderStatusID = 3"); //Delivered
        $stm2->execute();
        return $stm2->fetch();
    }

    public function getCountOrdersPickedUp(){

        $stm2 = $this->pdo->prepare("SELECT COUNT(*) as CountOrders FROM tbl_orders WHERE IsActive = 1 and OrderStatusID = 2"); //PickUp
        $stm2->execute();
        return $stm2->fetch();
    }

    
    public function getSumEarnings(){
        $datetime = date('m');
        $stm2 = $this->pdo->prepare("SELECT IFNULL(FORMAT(SUM(coalesce(Earnings,0)),2,'en_US'),0) as Earnings FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4 AND MONTH(DateCreation) = ?");
        $stm2->execute(array($datetime));
        return $stm2->fetch();
    }

    public function getSumEarningsToday(){
        // 4-> Canceled
        $datetime = date('Y-m-d');
        $stm2 = $this->pdo->prepare("SELECT IFNULL(FORMAT(SUM(coalesce(Earnings,0)),2,'en_US'),0) as Earnings FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4  AND DATE(DateCreation) = ?");
        $stm2->execute(array($datetime));
        return $stm2->fetch();
    }

    public function getSumTotalToday(){
        $datetime = date('Y-m-d');
        $stm2 = $this->pdo->prepare("SELECT IFNULL(FORMAT(SUM(coalesce(Deposit ,0)),2,'en_US'),0) as Total FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4 AND DATE(DateCreation) = ?");
        $stm2->execute(array($datetime));
        return $stm2->fetch();
    }

    public function getSumTotal(){
        $datetime = date('m');
        $stm2 = $this->pdo->prepare("SELECT IFNULL(FORMAT(SUM(coalesce(Deposit ,0)),2,'en_US'),0)  as Total FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4 AND MONTH(DateCreation) = ?");
        $stm2->execute(array($datetime));
        return $stm2->fetch();
    }

    public function getSumTrukerOwesUsToday(){
        $datetime = date('Y-m-d');
        $stm2 = $this->pdo->prepare("SELECT IFNULL(FORMAT(SUM(coalesce(TrukerOwesUs,0)),2,'en_US'),0) as TrukerOwesUs FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4 AND DATE(DateCreation) = ?");
        $stm2->execute(array($datetime));
        return $stm2->fetch();
    }

    public function getSumTrukerOwesUs(){
        $datetime = date('m');
        $stm2 = $this->pdo->prepare("SELECT IFNULL(FORMAT(SUM(coalesce(TrukerOwesUs,0)),2,'en_US'),0) as TrukerOwesUs FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4 AND MONTH(DateCreation) = ?");
        $stm2->execute(array($datetime));
        return $stm2->fetch();
    }

    public function getSumLoss(){
        $datetime = date('m');
        $stm2 = $this->pdo->prepare("SELECT IFNULL(FORMAT(SUM(coalesce(ExtraTrukerFee,0)),2,'en_US'),0) as ExtraTrukerFee FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4 AND MONTH(DateCreation) = ?");
        $stm2->execute(array($datetime));
        return $stm2->fetch();
    }

    
    public function getSumLossToday(){
        $datetime = date('Y-m-d');
        $stm2 = $this->pdo->prepare("SELECT IFNULL(FORMAT(SUM(coalesce(ExtraTrukerFee,0)),2,'en_US'),0) as ExtraTrukerFee FROM tbl_orders WHERE IsActive = 1 AND OrderStatusID != 4 AND DATE(DateCreation) = ?");
        $stm2->execute(array($datetime));
        return $stm2->fetch();
    }


    public function GetStatusOrderById($data){

        $stm = $this->pdo->prepare("SELECT Id, CustomerOrigin, Status, OrderDate, PickUpDate, DeliveryDate, LastModificationDate FROM vw_orders WHERE Id = ? AND IsActive = 1");
        $stm->execute(array($data->Id));
        return  $stm->fetch(PDO::FETCH_OBJ);
    }

    public function UpdateStatusOrder($data){

        try{
            if($data->OrderStatusID == 4){

                $sql = "UPDATE tbl_orders SET OrderStatusID  = ?, CancelledNote = ?, TrukerOwesUs = 0, Deposit = 0, ExtraTrukerFee = 0, Earnings = 0 , Cod = 0, Total = 0, TrukerRate = 0, PaymentStatus = 'N/A' WHERE Id = ? AND IsActive = 1";
                return $this->pdo->prepare($sql)->execute(array($data->OrderStatusID,$data->CancelledNote, $data->Id));

            }else{

                $sql = "UPDATE tbl_orders SET OrderStatusID  = ? WHERE Id = ? AND IsActive = 1";
                return $this->pdo->prepare($sql)->execute(array($data->OrderStatusID, $data->Id ));
            }
            

    } catch (Exception $e){
        die("UpdateStatusOrder: ".$e->getMessage());
    }

 }

 public function PayExtraTruckerFeeAndTrukerOwesUs($data){
    
    try{
        $sql = "UPDATE tbl_orders SET PaymentStatus  = ? WHERE Id = ? AND IsActive = 1";
        return $this->pdo->prepare($sql)->execute(array($data->PaymentStatus, $data->Id));
    } catch (Exception $e){
        die("PayExtraTruckerFee: ".$e->getMessage());
    }

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