<?php

class CompanyServices {

    private $pdo;

    public $Id;
    public $CompanyName;
    public $CompanyAddress;
    public $CompanyCity;
    public $CompanyState;
    public $CompanyZipCode;
    public $CompanyPhone1;
    public $CompanyPhone2;
    public $CompanyEmail;
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

                $stm = $this->pdo->prepare("SELECT Id,  CompanyName,  CompanyAddress,  CompanyCity, CompanyPhone1, CompanyPhone2, CompanyEmail, DateCreation, UserIdCreation, LastModificationDate, UserIdLastModification, IsActive FROM tbl_company_services");
                $stm->execute();

                $row = $stm->fetchAll();

                $response = array();
                $response['success'] = true;
                $response['aaData'] = $row;
                
                return $response;

        }
        catch(Exception $e)
        {
            die("View CompanyServices: ".$e->getMessage());
        }
    }

    public function Edit($id)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT Id,  CompanyName,  CompanyAddress,  CompanyCity, CompanyPhone1, CompanyPhone2, CompanyEmail, DateCreation, UserIdCreation, LastModificationDate, UserIdLastModification, IsActive FROM tbl_company_services WHERE Id = ?");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die("Edit Company Services: ".$e->getMessage());
        }
    }
  
    public function Update($data)
    {

        try
        {
            $sql = "UPDATE tbl_company_services SET
                CompanyName= ?,
                CompanyAddress = ?,
                CompanyCity = ?,
                CompanyState =?,
                CompanyZipCode =?,
                CompanyPhone1= ?,
                CompanyPhone2= ?,
                CompanyEmail= ?,
                LastModificationDate= ?,
                UserIdLastModification= ?,
                IsActive= ?
                WHERE Id = ?";

   $result =  $this->pdo->prepare($sql)->execute(
                    array(
                        $data->CompanyName,
                        $data->CompanyAddress,
                        $data->CompanyCity,
                        $data->CompanyState,
                        $data->CompanyZipCode,
                        $data->CompanyPhone1,
                        $data->CompanyPhone2,
                        $data->CompanyEmail,
                        date("Y-m-d H:i:s") ,
                        (int)$_SESSION['UserOnline']->Id,
                        (int)$data->IsActive,
                        intval($data->Id)
                    )
                );
                return $result;
        } catch (Exception $e)
        {
            die("Update Company Services: ".$e->getMessage());
        }
    }

    public function Update2($data)
    {

        try
        {
            $sql = "UPDATE tbl_company_services SET
                CompanyAddress = ?,
                CompanyCity = ?,
                CompanyState =?,
                CompanyZipCode =?,
                CompanyPhone1= ?,
                CompanyPhone2= ?,
                CompanyEmail= ?,
                LastModificationDate= ?,
                UserIdLastModification= ?,
                IsActive= ?
                WHERE Id = ?";

   $result =  $this->pdo->prepare($sql)->execute(
                    array(
                        $data->CompanyAddress,
                        $data->CompanyCity,
                        $data->CompanyState,
                        $data->CompanyZipCode,
                        $data->CompanyPhone1,
                        $data->CompanyPhone2,
                        $data->CompanyEmail,
                        date("Y-m-d H:i:s") ,
                        (int)$_SESSION['UserOnline']->Id,
                        (int)$data->IsActive,
                        intval($data->Id)
                    )
                );
                return $result;
        } catch (Exception $e)
        {
            die("Update Company Services: ".$e->getMessage());
        }
    }

    public function Create (CompanyServices $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_company_services (CompanyName,CompanyAddress,CompanyCity,CompanyState,CompanyZipCode,CompanyPhone1,CompanyPhone2,CompanyEmail,DateCreation,UserIdCreation,IsActive) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)->execute(
                    array(
                        $data->CompanyName,
                        $data->CompanyAddress,
                        $data->CompanyCity,
                        $data->CompanyState,
                        $data->CompanyZipCode,
                        $data->CompanyPhone1,
                        $data->CompanyPhone2,
                        $data->CompanyEmail,
                        date('Y-m-d H:i:s'),
                        (int)$_SESSION['UserOnline']->Id,
                        1
                    )
                );

                return $this->pdo->lastInsertId();

        } catch (Exception $e)
        {
            die("Create CompanyServices: ".$e->getMessage());
        }
    }

    public function GetListCompanyServices()
    {
        try
        {

            $stm = $this->pdo->prepare("SELECT Id, CompanyName FROM tbl_company_services WHERE IsActive = 1");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch(Exception $e)
        {
            die("GetListCompanyServices: ".$e->getMessage());
        }
    }


}