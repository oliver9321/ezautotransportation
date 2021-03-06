<br>
<div class="row">
   <div class="col-12">
      <div class="card">
          <div class="card-header bg-dark">
              <h4 class="card-title text-white">Payments List</h4>
               <p class="text-muted mb-0">GENERAL REPORT</p>
            </div><!--end card-header-->
            
            <div class="card-body">  
            <table id="PaymentsList" width="100%" class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-light">
                            <th class="text-center">Options</th>
                             <th><b>Payment ID</b></th>
                             <th><b>Order ID</b></th>  
                             <th><b>Order Status</b></th>
                            <th><b>Customer</b></th>
                            <th><b>Company</b></th>                           
                            <th><b>Driver</b></th>
                            <th><b>Order date</th>  
                            <th class="sum"><b>Total</b></th>  
                            <th class="sum"><b>Deposit</b></th>  
                            <th class="sum text-success"><b>Earnings</b></th> 
                            <th class="sum text-warning"><b>Extra trucker fee</b</th>  
                            <th class="sum text-danger"><b>Trucker owes us</b></th>  
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
                            <th class="font-weight-bold"><b>Sum:</b></th>                           
                            <th></th>
                            <th></th>  
                            <th class="text-success font-weight-bold"></th>
                            <th class="text-warning font-weight-bold"></th>  
                            <th class="text-danger font-weight-bold"></th>  
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
            {data: "Name"},
            {data: "CompanyName"},
            {data: "DriverName"},
            {data: "OrderDate"},
            {data: "Total"},
            {data: "Deposit"},
            {data: "Earnings"},
            {data: "ExtraTrukerFee"},
            {data: "TrukerOwesUs"}
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
                "targets": 11,
                "render": function (data, type, row) {

                    let status = 'N/A';
                    if(data.includes('Pending')){
                        status = 'Pending'
                    }else if(data.includes('Paid')){
                        status = 'Paid'
                    }

                    let valueRow = data.substring(0,data.indexOf('-')); 

                    switch (status) {

                            case 'Pending':
                                data = '<center>'+valueRow+ '<span class="badge badge-soft-danger px-2">'+status+'</span></center>'
                            break;

                            case 'Paid':
                                data = '<center>'+valueRow+ '<span class="badge badge-soft-success px-2">'+status+'</span></center>'
                            break;

                            case 'N/A':
                                data = '<center>'+valueRow+ '<span class="badge badge-soft-secondary px-2">'+status+'</span></center>'
                            break;

                            default:
                                data = '<center>'+valueRow+ '<span class="badge badge-soft-secondary px-2">'+status+'</span></center>'
                            break;

                            }

                            return data;
         
                }},{
                "targets": 12,
                "render": function (data, type, row) {
                    let status = 'N/A';
                    if(data.includes('Pending')){
                        status = 'Pending'
                    }else if(data.includes('Paid')){
                        status = 'Paid'
                    }

                    let valueRow = data.substring(0,data.indexOf('-')); 

                    switch (status) {

                            case 'Pending':
                                data = '<center>'+valueRow+ '<span class="badge badge-soft-danger px-2"> '+status+'</span></center>'
                            break;

                            case 'Paid':
                                data = '<center>'+valueRow+ '<span class="badge badge-soft-success px-2">' +status+'</span></center>'
                            break;

                            case 'N/A':
                                data = '<center>'+valueRow+ '<span class="badge badge-soft-secondary px-2"> '+status+'</span></center>'
                            break;

                            default:
                                data = '<center>'+valueRow+ '<span class="badge badge-soft-secondary px-2"> '+status+'</span></center>'
                            break;

                            }

                            return data;
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
            
            $(".toast-success").html("The order has been paid");
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
