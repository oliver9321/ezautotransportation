<?php

class QuoteDetails {

    private $pdo;

    public $Id;
    public $QuoteId;
    public $Brand;
    public $Model;
    public $Color;
    public $Year;
    public $StatusVehicle;
    public $ConditionVehicle;
    public $CarrierType;
    public $DateCreation;
    public $LastModificationDate;
    public $IsActive;

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
                $stm = $this->pdo->prepare("SELECT * FROM tbl_quote_details");
                $stm->execute();

                $row = $stm->fetchAll();

                $response = array();
                $response['success'] = true;
                $response['aaData'] = $row;
                
                return $response;

        }
        catch(Exception $e)
        {
            die("View QuoteDetails: ".$e->getMessage());
        }
    }

    public function Edit($id)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT *  FROM tbl_quote_details WHERE Id = ?");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die("Edit QuoteDetails: ".$e->getMessage());
        }
    }
  
    public function Update($data)
    {
        try
        {
            $sql = "UPDATE tbl_quote_details SET
						QuoteId =?,
                        Brand  = ?,
                        Model  = ?,
                        Color = ?,
                        Year =?,
                        ConditionVehicle =?,
                        CarrierType = ?,
                        StatusVehicle =?,
						LastModificationDate = ?,
						IsActive = ?
				    WHERE Id = ?";

$result=  $this->pdo->prepare($sql)
                ->execute(
                    array(
                       $data->QuoteId,
                        $data->Brand,
                        $data->Model,
                        $data->Color,
                        $data->Year,
                        $data->ConditionVehicle,
                        $data->CarrierType,
                        $data->StatusVehicle,
                        date("Y-m-d H:i:s") ,
                        (int)$data->IsActive,
                        intval($data->Id)
                    )
                );
                return $result;
        } catch (Exception $e)
        {
            die("Update QuoteDetails:".$e->getMessage());
        }
    }

    public function Create (QuoteDetails $data)
    {
        try
        {
       
           $sql = "INSERT INTO tbl_quote_details (QuoteId,Brand,Model,Year,ConditionVehicle,CarrierType,StatusVehicle,DateCreation,IsActive) VALUES (?,?,?,?,?,?,?,?,?)";
           $this->pdo->prepare($sql)->execute(array(
                        $data->QuoteId,
                        $data->Brand,
                        $data->Model,
                        $data->Year,
                        $data->ConditionVehicle,
                        $data->CarrierType,
                        $data->StatusVehicle,
                        date('Y-m-d H:i:s'),
                        1
                    )
                );

                return $this->pdo->lastInsertId();
                
        } catch (Exception $e)
        {
            die("Create QuoteDetails: ".$e->getMessage());
        }
    }
    
}