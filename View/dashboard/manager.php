
  <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Logistic Transport</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div><!--end col-->
                                 
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4">
                                <a href="index.php?c=Customers&a=Index">
                                    <div class="card report-card bg-dark">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-white mb-0 fw-semibold">Customers</p>
                                                    <h3 class="m-0 text-white"><?=$CountCustomers?></h3>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-dark-alt">
                                                        <i data-feather="user-plus" class="align-self-center text-muted icon-sm"></i>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end card-body--> 
                                    </div><!--end card--> 
                                    </a>
                                </div> <!--end col--> 

                               
                                <div class="col-md-6 col-lg-4">
                                <a href="index.php?c=Orders&a=Index">
                                    <div class="card report-card bg-dark">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">                                                
                                                <div class="col">
                                                    <p class="text-white mb-0 fw-semibold">Orders</p>
                                                    <h3 class="m-0 text-white"><?=$CountOrders?></h3>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-dark-alt">
                                                        <i data-feather="shopping-cart" class="align-self-center text-muted icon-sm"></i>  
                                                    </div>
                                                </div> 
                                            </div>
                                        </div><!--end card-body--> 
                                    </div><!--end card--> 
                                    </a>
                                </div> <!--end col--> 
                               

                                <div class="col-md-6 col-lg-4">
                                <a href="index.php?c=Drivers&a=Index">
                                    <div class="card report-card bg-dark">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">  
                                                    <p class="text-white mb-0 fw-semibold">Drivers</p>                                         
                                                    <h3 class="m-0 text-white"><?=$CountDrivers ?></h3>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-dark-alt">
                                                        <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                                    </div>
                                                </div> 
                                            </div>
                                        </div><!--end card-body--> 
                                        </a>
                                    </div><!--end card--> 
                                </div> <!--end col-->                               
                            </div><!--end row-->
                            <br>
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title text-white">Orders pending</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <!--<div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   This Month</i>
                                                </a>
                                            </div> -->              
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body">
                                  
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive browser_users">
                                                    <table id="OrdersPending" class="table table-bordered table-hover" style="width:100%" >
                                                        <thead>
                                                        <tr class="bg-light">
                                                                <th></th>
                                                                <th class="text-center">Order ID</th>
                                                                <th class="text-center">Customer Origin</th>
                                                                <th class="text-center">Order Date</th>
                                                                <th class="text-center">PickUp Date</th>
                                                                <th class="text-center">Delivery Date</th>
                                                               <th class="text-center">Origin</th>
                                                               <th class="text-center">Destination</th>
                                                            </tr>
                                                        </thead>
                                                    </table>                                            
                                                </div><!--end /div-->
                                            </div><!--end card-body--> 
                                        </div><!--end card--> 
                                    </div> <!--end col--> 
                                  
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div><!--end col-->
                    </div><!--end row-->
  
                    
<script>

 $(document).ready(function() {

    $.noConflict();
   
 $('#OrdersPending').DataTable({
      'responsive': true,
        dom: 'Bfrtip',
      "bDestroy": true,
            "ajax": {
                "url": "index.php?c=Orders&a=OrderPending",
            },
        columns:[
            {data: "Id"},
            {data: "Id"},
            {data: "CustomerOrigin"},
            {data: "OrderDate"},
            {data: "PickUpDate"},
            {data: "DeliveryDate"},
            {data: "OriginCity"},
            {data: "DestinationCity"}
        ],"columnDefs": [{
            "targets":0,
            "data": "Editar",
            "render": function ( data) {
                return '<center><a class="btn btn-primary" title="View order" href="index.php?c=Orders&a=View&Id='+data+'"><i class="ti-file"></i></a></center>';
            }},
            {
            "targets":1,
            "data": "Id",
            "render": function ( data) {
                return '<center>'+data+'</center>';
            }
        }]
    });



});
</script>
