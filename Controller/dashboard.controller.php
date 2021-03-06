<?php

require_once 'Config/Core.php';
require_once 'Model/dashboardModel.php';
require_once 'Model/driversModel.php'; 
require_once 'Model/ordersModel.php'; 
require_once 'Model/paymentsModel.php'; 
require_once 'Model/customersModel.php'; 
require_once 'Model/quotesModel.php'; 

class dashboardController{

    private $model;
    private $driversModel;
    private $ordersModel;
    private $customersModel;
    private $quoteModel;
 
    public function __CONSTRUCT(){

        $this->model          = new dashboard();
      //  $this->paymentsModel  = new Payments();
       
    }

    public function Index(){

        if(count($_SESSION) > 0){
        
             if($_SESSION['UserOnline']->Profile == "admin"){

                $this->driversModel   = new Drivers();
                $rsDrivers      = $this->driversModel->getCountDrivers();
                $CountDrivers   = $rsDrivers['CountDrivers'];

                $this->customersModel = new Customers();
                $rsCustomers    = $this->customersModel->getCountCustomers();
                $CountCustomers = $rsCustomers['CountCustomers'];

                $this->ordersModel    = new Orders();
                $rsOrders       = $this->ordersModel->getCountOrders();
                $CountOrders    = $rsOrders['CountOrders'];

                $rsSumEarnings  = $this->ordersModel->getSumEarnings();
                $SumEarnings    = $rsSumEarnings['Earnings'];

                $rsSumEarningsToday  = $this->ordersModel->getSumEarningsToday();
                $SumEarningsToday    = $rsSumEarningsToday['Earnings'];

                $rsSumTotalToday = $this->ordersModel->getSumTotalToday();
                $SumTotalToday   = $rsSumTotalToday['Total'];

                $rsSumTotal = $this->ordersModel->getSumTotal();
                $SumTotal   = $rsSumTotal['Total'];

                $rsSumTrukerOwesUsToday = $this->ordersModel->getSumTrukerOwesUsToday();
                $SumTrukerOwesUsToday    = $rsSumTrukerOwesUsToday['TrukerOwesUs'];

                $rsSumTrukerOwesUs   = $this->ordersModel->getSumTrukerOwesUs();
                $SumTrukerOwesUs     = $rsSumTrukerOwesUs['TrukerOwesUs'];

                $rsSumLossToday = $this->ordersModel->getSumLossToday();
                $SumLossToday    = $rsSumLossToday['ExtraTrukerFee'];

                $rsSumGetSumLoss   = $this->ordersModel->getSumLoss();
                $SumLossMonth     = $rsSumGetSumLoss['ExtraTrukerFee'];

                $this->quoteModel = new Quotes();
                $rsCountQuotes = $this->quoteModel->getCountQuotesPending();
               $countPendingQuotes = $rsCountQuotes['CountQuotesPending'];

               // GetRouteView(null, "header");
                require_once 'View/header.php';
                require_once 'View/dashboard/index.php';
                require_once 'View/footer.php';

               }else{
                    header('Location:permision.php');
               }
               
         }else{
            header('Location:permision.php'); 
         }
         
    }

    
    public function Manager(){

      if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") {

        
        $this->driversModel   = new Drivers();
        $rsDrivers      = $this->driversModel->getCountDrivers();
        $CountDrivers   = $rsDrivers['CountDrivers'];

        $this->customersModel = new Customers();
        $rsCustomers    = $this->customersModel->getCountCustomers();
        $CountCustomers = $rsCustomers['CountCustomers'];

        $this->ordersModel    = new Orders();
        $rsOrders       = $this->ordersModel->getCountOrders();
        $CountOrders    = $rsOrders['CountOrders'];

      GetRouteView(null, "header");
      require_once 'View/dashboard/manager.php';
      require_once 'View/footer.php';
      
    }else{
      header('Location:permision.php'); 
     }
    
    }

}