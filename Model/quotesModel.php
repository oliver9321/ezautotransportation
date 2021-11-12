<?php

class Quotes {

    private $pdo;

    public $Id;
    public $PickUpLocation;
    public $OriginCity;
    public $OriginState;
    public $OriginZipCode;
    public $DeliveryLocation;
    public $DestinyCity;
    public $DestinyState;
    public $DestinyZipCode;
    public $TypeVehicle;
    public $ShippingDate;
    public $FirstName;
    public $LastName;
    public $Phone;
    public $Email;
    public $LastModificationDate;
    public $UserIdLastModification;
    public $IsActive;
    public $Answer;
    public $Comments;
    public $Status;
    public $DateCreation;
    public $UserIDLastModification;

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
                $stm = $this->pdo->prepare("SELECT * FROM tbl_quotes where IsActive = 1");
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

    public function getCountQuotesPending(){
        $stm2 = $this->pdo->prepare("SELECT COUNT(Id) CountQuotesPending FROM tbl_quotes WHERE IsActive = 1 AND Status = 'Pending'");
        $stm2->execute();
        return $stm2->fetch();
    }

   /* public function Update($data)
    {   
        
        try
        {
            $sql = "UPDATE tbl_quotes SET
                        PickUpLocation  = ?,
                        OriginCity  = ?,
                        OriginState  = ?,
                        OriginZipCode  = ?,
                        DeliveryLocation  = ?,
                        DestinyCity  = ?,
                        DestinyState  = ?,
                        DestinyZipCode  = ?,
                        TypeVehicle  = ?,
                        ShippingDate  = ?,
                        FirstName  = ?,
                        LastName  = ?,
                        Phone  = ?,
                        Email  = ?,
                        Answer  = ?,
                        Comments  = ?,
                        Status = ?,
                        LastModificationDate  = ?,
                        UserIDLastModification  = ?,
                        IsActive  = ?
				    WHERE Id = ?";

$result = $this->pdo->prepare($sql)->execute(
                    array(
                        $data->PickUpLocation,
                        $data->OriginCity,
                        $data->OriginState,
                        $data->OriginZipCode,
                        $data->DeliveryLocation,
                        $data->DestinyCity,
                        $data->DestinyState,
                        $data->DestinyZipCode,
                        $data->TypeVehicle,
                        $data->ShippingDate,
                        $data->FirstName,
                        $data->LastName,
                        $data->Phone,
                        $data->Email,
                        $data->Answer,
                        $data->Comments,
                        $data->Status,
                        date("Y-m-d H:i:s"),
                        (int)$_SESSION['UserOnline']->Id,
                        (int)$data->IsActive,
                        intval($data->Id)
                    )
                );

                return $result;

        } catch (Exception $e)
        {
            die("Update quote: ".$e->getMessage());
        }
    }*/

    public function Edit2($id)
    {
        try
        {
            $QuoteData = array();
            $stm = $this->pdo->prepare("SELECT *  FROM tbl_quotes WHERE Id = ?");
            $stm->execute(array($id));
            $Quote = $stm->fetch(PDO::FETCH_OBJ);

            if($Quote){

                $stm2 = $this->pdo->prepare("SELECT *  FROM tbl_quote_details WHERE QuoteId = ?");
                $stm2->execute(array($id));
               
                $QuoteData['quote']               = $Quote;
                $QuoteData['quote_details']       = $stm2->fetchAll(PDO::FETCH_ASSOC);

                return $QuoteData;

            }else{
                return $QuoteData;
            }
          
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Create (Quotes $data)
    {
     
        try
        {
            $sql = "INSERT INTO tbl_quotes (
                        PickUpLocation,
                        OriginCity,
                        OriginState,
                        OriginZipCode,
                        DeliveryLocation,
                        DestinyCity,
                        DestinyState,
                        DestinyZipCode,
                        TypeVehicle,
                        ShippingDate,
                        FirstName,
                        LastName,
                        Phone,
                        Email,
                        Answer,
                        Comments,
                        DateCreation,
                        IsActive) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

   $this->pdo->prepare($sql)->execute(
                    array(
                        $data->PickUpLocation,
                        $data->OriginCity,
                        $data->OriginState,
                        $data->OriginZipCode,
                        $data->DeliveryLocation,
                        $data->DestinyCity,
                        $data->DestinyState,
                        $data->DestinyZipCode,
                        $data->TypeVehicle,
                        $data->ShippingDate,
                        $data->FirstName,
                        $data->LastName,
                        $data->Phone,
                        $data->Email,
                        $data->Answer,
                        $data->Comments,
                        date("Y-m-d H:i:s"),
                        1
                    )
                );
               
                return $this->pdo->lastInsertId();

        } catch (Exception $e)
        {
            die("insert quote:".$e->getMessage());
        }
    }

  

}