<?php

class OrderStatus {

    private $pdo;

    public $Id;
    public $Status;
    public $DateCreation;
    public $UserIdCreation;
    public $LastModificationDate;
    public $UserIdLastModification;
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

                $stm = $this->pdo->prepare("SELECT * FROM tbl_order_status");
                $stm->execute();

                $row = $stm->fetchAll();

                $response = array();
                $response['success'] = true;
                $response['aaData'] = $row;
                
                return $response;

        }
        catch(Exception $e)
        {
            die("View orderStatus: ".$e->getMessage());
        }
    }

    public function Edit($id)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT *  FROM tbl_order_status WHERE Id = ?");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die("Edit orderStatus:".$e->getMessage());
        }
    }
  
    public function Update($data)
    {
        try
        {
            $sql = "UPDATE tbl_order_status SET
						Status  = ?,
						LastModificationDate = ?,
						UserIdLastModification = ?,
						IsActive = ?
				    WHERE Id = ?";

$result= $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Status,
                        date("Y-m-d H:i:s") ,
                        (int)$_SESSION['UserOnline']->Id,
                        (int)$data->IsActive,
                        intval($data->Id)
                    )
                );
                return $result;
        } catch (Exception $e)
        {
            die("Update orderStatus: ".$e->getMessage());
        }
    }

    public function Create (OrderStatus $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_order_status (Status,DateCreation,UserIdCreation,IsActive) VALUES (?,?,?,?)";

           $this->pdo->prepare($sql)->execute(
                    array(
                        $data->Status,
                        date('Y-m-d H:i:s'),
                        (int)$_SESSION['UserOnline']->Id,
                        1
                    )
                );

                return $this->pdo->lastInsertId();

        } catch (Exception $e)
        {
            die("Create OrderStatus: ".$e->getMessage());
        }
    }

    public function GetListOrderStatus()
    {
        try
        {

            $stm = $this->pdo->prepare("SELECT Id, Status FROM tbl_order_status WHERE IsActive = 1");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch(Exception $e)
        {
            die("GetListOrderStatus:".$e->getMessage());
        }
    }


}