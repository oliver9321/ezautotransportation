<br>
<div class="position-fixed top-0 end-0 p-3" style=" z-index: 9999999 !important;">
    <div id="toastSuccess" class="toast align-items-center text-white bg-success border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body toast-success">
                <!-- Message from js -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
    <div id="toastError" class="toast align-items-center text-white bg-danger border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body toast-error">
                <!-- Message from js -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="row">
   <div class="col-12">
      <div class="card">
          <div class="card-header bg-info">
              <h2 class="card-title text-white"><b>Payments List</b></h2>
               <p class="mb-0 text-white">SUMARIZE REPORT</p>
            </div><!--end card-header-->
            
            <div class="card-body">  
                <table id="PaymentsList" width="100%" class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-light"><th class="text-center">Options</th>
                             <th><b>Payment ID</b></th>
                             <th><b>Order ID</b></th>  
                             <th><b>Order Status</b></th>
                             <th class="text-warning"><b>Extra trucker fee?</b</th>  
                            <th class="text-danger"><b>Trucker owes us?</b></th>                            
                            <th><b>Customer</b></th>
                            <th><b>Company</b></th>                           
                            <th><b>Driver</b></th>
                            <th><b>Order date</th>  
                            <th class="sum"><b>Total</b></th>  
                            <th class="sum"><b>Deposit</b></th>  
                            <th class="sum text-warning"><b>Extra trucker fee</b</th>  
                            <th class="sum text-danger"><b>Trucker owes us</b></th>  
                            <th class="sum text-success"><b>Earnings</b></th>  
                        </tr>
                     </thead>
                     <tbody></tbody>
                     <tfoot>
                     <tr class="bg-light">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>                           
                            <th></th>
                            <th></th>                           
                            <th></th>
                            <th class=" font-weight-bold"><b>Total:</b></th>
                            <th class=""></th>  
                            <th class=""></th>  
                            <th class="text-warning font-weight-bold"></th>  
                            <th class="text-danger font-weight-bold"></th>  
                            <th class="text-success font-weight-bold"></th>  
                        </tr>
                    </tfoot>
                   </table>
            </div>
        </div>
    </div> <!-- end col -->
 </div> <!-- end row -->
 <div class="modal" id="ModalMarkPaid" role="dialog" aria-labelledby="ModalMarkPaidLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title m-0" id="ModalMarkPaidLabel"> <i class="fas fa-car me-2"></i> Mark as paid</h6>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">

                                      <div class="col-md-12" >
                                            <label class="mb-1"><b>Order ID</b></label>
                                            <input type="text" id="Id" readonly class="form-control">
                                            <span class="text-muted">The amount greater than 0 will be paid.</span>
                                        </div><br>
                                                    
                                 </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
                <button type="button" onclick="PayOrder()" class="btn btn-soft-success">Pay</button>
            </div>
            <!--end modal-footer-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<script src="assets/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $.noConflict();
    $('#PaymentsList').DataTable({
        "order": [[ 2, "desc" ]],
        "footerCallback": function(row, data, start, end, display) {
        var api = this.api();
        
        api.columns('.sum', {
            page: 'current'
        }).every(function() {
            var sum = this.data().reduce(function(a, b) {
               
                a1 = a.toString().replace(',',''); 
                b2 = b.toString().replace(',',''); 
      
                var x = parseFloat(a1) || 0;
                var y = parseFloat(b2) || 0;
                return x + y;

            }, 0);

            $(this.footer()).html(sum.toLocaleString('en-US', {maximumFractionDigits:2, style: 'currency', currency: 'USD' }));

        });
        },
        "responsive": true,
            "ajax": {
                "url": "index.php?c=Payments&a=View",
            },
                dom: 'Bfrtip',
                buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            },{
                extend: 'excel',
                filename: 'Order Status List'
            },{
                extend: 'pdf',
                filename:  'Order Status List'
            }
        ],
        columns:[
            {data: "OrderID"},
            {data: "PaymentID"},
            {data: "OrderID"},
            {data:"Status"},
            {data: "Debemos"},
            {data: "NosDeben"},
            {data: "Name"},
            {data: "CompanyName"},
            {data: "DriverName"},
            {data: "OrderDate"},
            {data: "Total"},
            {data: "Deposit"},
            {data: "ExtraTrukerFee"},
            {data: "TrukerOwesUs"},
            {data: "Earnings"}
        ],"columnDefs": [
            {
            "targets":0,
            "data": "OrderID",
            "render": function ( data) {
                return '<center><a class="btn btn-primary btn-sm" title="View order" href="index.php?c=Orders&a=View&Id='+data+'"> <i class="ti-file"></i></a> | <button class="btn btn-success btn-sm" onclick="ChangeStatus('+data+')"  title="Pay pending"> <i class="fa fa-money-bill"></i></button></center>';
            }}, {
                "targets": 3,
                "render": function (data, type, row) {

                    switch (data) {

                            case 'Pending':
                                data = '<center><span class="badge badge-soft-warning px-2">'+data+'</span></center>'
                            break;

                            case 'Picked up':
                                data = '<center><span class="badge badge-soft-primary px-2">'+data+'</span></center>'
                            break;

                            case 'Delivered':
                                data = '<center><span class="badge badge-soft-success px-2">'+data+'</span></center>'
                            break;

                            case 'Cancelled':
                                data = '<center><span class="badge badge-soft-danger px-2">'+data+'</span></center>'
                            break;
                    
                        default:
                                data = '<center><span class="badge badge-soft-secondary px-2">'+data+'</span></center>'
                            break;
                    }

                    return data;
                }}, {
                "targets": 4,
                "render": function (data, type, row) {
                    return (data == "Pending" ?  '<center><span class="badge badge-soft-danger px-2">'+data+'</span></center>'  : '<center><span class="badge badge-soft-dark px-2">'+data+'</span></center>')
         
                }},{
                "targets": 5,
                "render": function (data, type, row) {
                    return (data == "Pending" ?  '<center><span class="badge badge-soft-danger px-2">'+data+'</span></center>'  : '<center><span class="badge badge-soft-dark px-2">'+data+'</span></center>')
         
                }} ]
    });

});

function ChangeStatus(OrderID){
    $("#Id").val(OrderID);
    $("#ModalMarkPaid").modal('show'); 
}

function PayOrder(){

    if($("#Id").val() != ''){

    $.ajax({
        type: 'POST',
        url: "index.php?c=Orders&a=PayOrder",
        data:{ Id: $("#Id").val()}
     }).then(function(response) {

        if(response == 'true' || response == true){
            
            $(".toast-success").html("Paid order !");
            var myAlert = document.getElementById('toastSuccess');
            var bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();
           
        }else{

            $(".toast-error").html("(!) error - Order update");
            var myAlert = document.getElementById('toastError');
            var bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();

        }
        $("#ModalMarkPaid").modal('hide'); 
        location.reload();

     });
    }
}
</script>
