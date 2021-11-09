<br>

        <div class="row">
        <div class="col-md-12">

        <div class="row">
                                <div class="col-12 col-lg-6 col-xl"> 
                                    <div class="card" id="PendingBlock">
                                        <div class="card-body bg-warning">
                                            <div class="row align-items-center">
                                                <div class="col text-center">                                                                        
                                                    <span class="h4 text-white"><?=$CountOrdersPending?></span>      
                                                    <h6 class="text-white mt-2 m-0">Pending</h6>                
                                                </div><!--end col-->
                                            </div> <!-- end row -->
                                        </div><!--end card-body-->
                                    </div> <!--end card-body-->                     
                                </div><!--end col-->
                                <div class="col-12 col-lg-6 col-xl"> 
                                    <div class="card">
                                        <div class="card-body bg-primary">
                                            <div class="row align-items-center">
                                                <div class="col text-center">                                                                        
                                                    <span class="h4 text-white"><?=$CountOrdersPickedUp?></span>      
                                                    <h6 class="text-white mt-2 m-0">Picked up</h6>                
                                                </div><!--end col-->
                                            </div> <!-- end row -->
                                        </div><!--end card-body-->
                                    </div> <!--end card-body-->                     
                                </div><!--end col-->
                                <div class="col-12 col-lg-6 col-xl"> 
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">                                                                        
                                                    <span class="h4 text-white"><?=$CountOrdersDelivered?></span>      
                                                    <h6 class="text-white mt-2 m-0">Delivered</h6>                
                                                </div><!--end col-->
                                            </div> <!-- end row -->
                                        </div><!--end card-body-->
                                    </div> <!--end card-body-->                     
                                </div><!--end col-->
                                <div class="col-12 col-lg-6 col-xl"> 
                                    <div class="card bg-danger">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">                                                                        
                                                    <span class="h4 text-white"><?=$CountOrdersCanceled?></span>      
                                                    <h6 class="text-white mt-2 m-0">Cancelled</h6>                
                                                </div><!--end col-->
                                            </div> <!-- end row -->
                                        </div><!--end card-body-->
                                    </div> <!--end card-->                     
                                </div><!--end col-->                                
                            </div>
                            <br/>
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="card-title text-white">ORDER LIST</h4>
                    <p class="text-muted mb-0">Management</p>
                    </div><!--end card-header-->
                    
                    <div class="card-body">  
                    <!-- <table id="CustomerList" width="100%" class="table table-striped table-bordered dataTable mb-0  table-responsive">-->
                      
                            <table id="OrderList" class="table table-bordered table-hover" style="width:100%" >
                            <thead>
                               <tr class="bg-light ">
                                    <th class="text-center"><b>Order ID</b></th>
                                    <th class="text-center"><b>Options</b></th>
                                    <th class="text-center"><b>Status</b></th>
                                    <th class="text-center"><b>Customer Origin</b></th>
                                    <th class="text-center"><b>Origin Phone</b></th>
                                    <th class="text-center"><b>Customer Destination</b></th>
                                    <th class="text-center"><b>Destination Phone</b></th>
                                    <th class="text-center"><b>Order Date</b></th>
                                    <th class="text-center"><b>PickUp Date</b></th>
                                    <th class="text-center"><b>Delivery Date</b></th>
                                    <th class="text-center"><b>Origin City</b></th>
                                    <th class="text-center"><b>Destination City</b></th>
                                    <th class="text-center"><b>Trucker Company</b></th>
                                    <th class="text-center"><b>Trucker Phone</b></th>
                                    <th class="text-center"><b>Driver</b></th>
                                    <th class="text-center"><b>Driver Phone</b></th>
                                    <th class="text-center"><b>Origin Note</b></th>
                                    <th class="text-center"><b>Destination Note</b></th>
                                    <th class="text-center"><b>Cancelled Note</b></th>
                            </tfoot>
                                </tr>
                            </thead>
                            <tfoot>
                            <th class="text-center"><b>Order ID</b></th>
                                    <th class="text-center">Options</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center"><b>Customer Origin</b></th>
                                    <th class="text-center">Origin Phone</th>
                                    <th class="text-center"><b>Customer Destination</b></th>
                                    <th class="text-center">Destination Phone</th>
                                    <th class="text-center"><b>Order Date</b></th>
                                    <th class="text-center">PickUp Date</th>
                                    <th class="text-center">Delivery Date</th>
                                    <th class="text-center">Origin City</th>
                                    <th class="text-center">Destination City</th>
                                    <th class="text-center"><b>Trucker Company</b></th>
                                    <th class="text-center"><b>Trucker Phone</b></th>
                                    <th class="text-center"><b>Driver</b></th>
                                    <th class="text-center"><b>Driver Phone</b></th>
                                    <th class="text-center"><b>Origin Note</b></th>
                                    <th class="text-center"><b>Destination Note</b></th>
                                    <th class="text-center"><b>Cancelled Note</b></th>
                            </tfoot>
                        </table>
                        <hr>
                        <p class="text-mute"><b>Leyends:</b></p>
                        <p class="text-secondary"><i class="ti-file text-primary"></i> View order | <i class="ti-loop text-warning"></i> Edit order | <i class="ti-loop text-info"></i> Change status | <i class="ti-money text-success"></i> Go to view payment list</p>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        
<div class="modal fade" id="ModalChangeStatus" role="dialog" aria-labelledby="ModalChangeStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title m-0" id="ModalChangeStatusLabel"> <i class="fas fa-file me-2"></i> Change status order</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">

                                      <div class="col-md-12" >
                                            <label class="mb-1"><b>Order ID</b></label>
                                            <input type="text" id="Id" readonly class="form-control">
                                        </div><br>
                                                    
                                    <div class="col-md-12" >
                                            <label class="mb-1"><b>Order status</b><b class="text-danger">*</b></label>
                                            <select style="width: 100%;" id="OrderStatusID" name="OrderStatusID" class="form-control">
                                                <option selected value="">Select a status</option>
                                                <?php foreach($OrderStatusList  as $key => $value): ?>
                                                <option value="<?= $value['Id']; ?>"> <?= $value['Status']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col-md-12" id="formCancelledNote">
                                            <label class="mb-1 text-danger"><b>Reason for cancellation*</b></label>
                                            <textarea id="CancelledNote" name="CancelledNote" class="form-control" placeholder="Enter the reason for cancelation" rows="3"></textarea>
                                        </div><br>
                                 </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
                <button type="button" onclick="UpdateStatusOrder()" class="btn btn-soft-primary btn-sm">Update order</button>
            </div>
            <!--end modal-footer-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<script src="assets/js/bootstrap.min.js"></script>
<script>

 let datatable = "";
$("#formCancelledNote").hide();

var permiso = " <?= ($_SESSION['UserOnline']->Profile == 'admin') ? true : false ?>";
let botonPayment = "";
if(permiso == true){
 botonPayment = '<a class="btn btn-success btn-sm" title="Go to View payment" href="index.php?c=Payments&a=Index"> <i class="ti-money"></i></a>';
}

$(document).ready(function() {

    $("body").addClass("enlarge-menu");
    $.noConflict();
 
    $('#OrderList tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search by '+title+'" />' );
    } );
 
   
datatable = $('#OrderList').DataTable({
    "order": [[ 0, "desc" ]],
    initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that.search(this.value).draw();
                    }
                } );
            } );
        },
        "autoWidth": true,
        scrollX:        true,
        scrollCollapse: true,
       dom: 'Bfrtip',
       buttons: [{
            extend: 'excel',
            filename: 'Order List'
        },{
            extend: 'pdf',
            filename: 'Order List'
        }
    ],
      "bDestroy": true,
            "ajax": {
                "url": "index.php?c=Orders&a=List",
            },
        columns:[
            {data: "Id"},
            {data: "Id"},
            {data: "Status"},
            {data: "CustomerOrigin"},
            {data: "CustomerOriginPhone1"},
            {data: "CustomerDestination"},
            {data: "CustomerDestinationPhone1"},
            {data: "OrderDate"},
            {data: "PickUpDate"},
            {data: "DeliveryDate"},
            {data: "OriginCity"},
            {data: "DestinationCity"},
            {data: "CompanyServices"},
            {data: "CompanyPhone1"},
            {data: "DriverName"},
            {data: "DriverPhone1"},
            {data: "OriginNote"},
            {data: "DestinationNote"},
            {data: "CancelledNote"}
            
        ],"columnDefs": [
            {
            "targets":1,
            "data": "Editar",
            "render": function (data, type, row) {
                let permiso2 = "<?= ($_SESSION['UserOnline']->Profile == 'admin') ? true : false ?>";
                let botonEditar = "";
                if(permiso2 == true){
                    botonEditar = '<a class="btn btn-warning btn-sm" href="index.php?c=Orders&a=Edit&Id='+data+'" title="Edit order"> <i class="ti-pencil"></i></a>';
                }

                return '<center><a class="btn btn-primary btn-sm" title="View order" href="index.php?c=Orders&a=View&Id='+data+'"> <i class="ti-file"></i></a>'+botonEditar+' <button class="btn btn-info btn-sm" onclick="ChangeStatus('+data+')"  title="Change status"> <i class="ti-loop"></i></button>'+botonPayment+'</center>';
            }}, {
                "targets": 2,
                "render": function (data, type, row) {

                    switch (data) {

                            case 'Pending':
                                data = '<center><span class="badge badge-soft-warning px-2"><b>'+data+'</b></span></center>'
                            break;

                            case 'Picked up':
                                data = '<center><span class="badge badge-soft-primary px-2"><b>'+data+'</b></span></center>'
                            break;

                            case 'Delivered':
                                data = '<center><span class="badge badge-soft-success px-2"><b>'+data+'</b></span></center>'
                            break;

                            case 'Cancelled':
                                data = '<center><span class="badge badge-soft-danger px-2"><b>'+data+'</b></span></center>'
                            break;
                    
                        default:
                                data = '<center><span class="badge badge-soft-secondary px-2"><b>'+data+'</b></span></center>'
                            break;
                    }

                    return data;
                }}
            ]
    });


});

function ChangeStatus(OrderID){
    $("#Id").val(OrderID);
    $("#ModalChangeStatus").modal('show'); 
}

$("#OrderStatusID").change(function(){

    if($("#OrderStatusID").val() == 4){
        $("#formCancelledNote").show();
    }else{
        $("#formCancelledNote").hide();
    }

});

function UpdateStatusOrder(){

    if($("#Id").val() != '' && $("#OrderStatusID").val() != ''){

    if($("#OrderStatusID").val() == 4 && $("#CancelledNote").val() ==""){

           $(".toast-error").html("Cancelled note is required");
           var myAlert = document.getElementById('toastError');
            var bsAlert = new bootstrap.Toast(myAlert);
             bsAlert.show();
    }else{

            $.ajax({
                type: 'POST',
                url: "index.php?c=Orders&a=UpdateStatusOrder",
                data:{ Id: $("#Id").val(), "OrderStatusID": $("#OrderStatusID").val(), "CancelledNote": $("#CancelledNote").val()}
            }).then(function(response) {

                if(response == 'true'){
                    
                    $(".toast-success").html("Status updated");
                    var myAlert = document.getElementById('toastSuccess');
                    var bsAlert = new bootstrap.Toast(myAlert);
                    bsAlert.show();
                    $("#ModalChangeStatus").modal('hide'); 
                    location.reload();
                }else{

                    $(".toast-error").html("(!) Error - Order updated");
                    var myAlert = document.getElementById('toastError');
                    var bsAlert = new bootstrap.Toast(myAlert);
                    bsAlert.show();

                     $("#ModalChangeStatus").modal('hide'); 
                }

            });
      }
    }
}

</script>
