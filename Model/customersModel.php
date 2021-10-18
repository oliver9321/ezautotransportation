<?php

class Customers {

    private $pdo;

    public $Id;
    public $Name;
    public $LastName;
    public $Phone1;
    public $Phone2;
    public $Email;
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
                $stm = $this->pdo->prepare("SELECT * FROM vw_customers");
                $stm->execute();
                $row = $stm->fetchAll();
               // $this->pdo = null;

                $response = array();
                $response['success'] = true;
                $response['aaData'] = $row;
                
                return $response;

        }
        catch(Exception $e)
        {
            die("View customers: ".$e->getMessage());
        }
    }

    public function Edit($id)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT *  FROM tbl_customers WHERE Id = ?");
            $stm->execute(array($id));
            $result = $stm->fetch(PDO::FETCH_OBJ);
           // $this->pdo = null;

            return $result;

        } catch (Exception $e)
        {
            die("Edit customers: ".$e->getMessage());
        }
    }
  
    public function Update($data)
    {

      
        try
        {
            $sql = "UPDATE tbl_customers SET
                        Name= ?,
                        LastName= ?,
                        Phone1= ?,
                        Phone2= ?,
                        Email= ?,
						LastModificationDate = ?,
						UserIdLastModification = ?,
						IsActive = ?
				    WHERE Id = ?";

$result = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Name,
                        $data->LastName,
                        $data->Phone1,
                        $data->Phone2,
                        $data->Email,
                        date("Y-m-d H:i:s") ,
                        (int)$_SESSION['UserOnline']->Id,
                        0,
                        intval($data->Id)
                    )
                );

              //  $this->pdo = null;

                return $result;

        } catch (Exception $e)
        {
            die("Update customers: ".$e->getMessage());
        }
    }


    public function Update2($data)
    {
        try
        {
            $sql = "UPDATE tbl_customers SET
                        Phone1= ?,
                        Phone2= ?,
                        Email= ?,
						LastModificationDate = ?,
						UserIdLastModification = ?,
						IsActive = ?
				    WHERE Id = ?";

$result = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Phone1,
                        $data->Phone2,
                        $data->Email,
                        date("Y-m-d H:i:s") ,
                        (int)$_SESSION['UserOnline']->Id,
                        (int)$data->IsActive,
                        intval($data->Id)
                    )
                );

                //$this->pdo = null;

                return $result;

        } catch (Exception $e)
        {
            die("Update customers: ".$e->getMessage());
        }
    }

    public function Create(Customers $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_customers (Name,LastName,Phone1,Phone2,Email,DateCreation,UserIdCreation,IsActive) VALUES (?,?,?,?,?,?,?,?)";

             $this->pdo->prepare($sql)->execute(
                    array(
                        $data->Name,
                        $data->LastName,
                        $data->Phone1,
                        $data->Phone2,
                        $data->Email,
                        date('Y-m-d H:i:s'),
                        (int)$_SESSION['UserOnline']->Id,
                        $data->IsActive
                    )
                );

                return $this->pdo->lastInsertId();

        } catch (Exception $e)
        {
            return "Create customers: ".$e->getMessage();
        }
    }

    public function getCountCustomers(){

        $stm2 = $this->pdo->prepare("SELECT COUNT(*) as CountCustomers FROM tbl_customers WHERE IsActive = 1");
        $stm2->execute();
        return $stm2->fetch();
    }

    
    public function GetListCustomers()
    {
        try
        {

            $stm = $this->pdo->prepare("SELECT Id, CONCAT(Name,' ',LastName) AS Customer FROM vw_customers WHERE IsActive = 1");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
          
            return $result;
            
        }
        catch(Exception $e)
        {
            die("GetListCustomers:  ".$e->getMessage());
        }
    }

}