<br>
<div class="row">
   <div class="col-12">
      <div class="card">
          <div class="card-header bg-dark">
              <h4 class="card-title text-white">Quotes</h4>
               <p class="text-muted mb-0">List</p>
            </div><!--end card-header-->
            
            <div class="card-body">  
            <div class="table-rep-plugin table-responsive">
                <table id="QuotesList" width="100%" class="table table-bQuoteed table-hover">
                    <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Origin Address</th>
                            <th>Origin City</th>
                            <th>Destination Address</th>
                            <th>Destination City</th>
                            <th>Type Vehicle</th>
                            <th>Shipping Date</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Answer</th>
                            <th>Comments</th>
                            <th>Status</th>
                            <th class="text-center">Active</th>
                        </tr>
                     </thead>
                   </table>
</div>
            </div>
        </div>
    </div> <!-- end col -->
 </div> <!-- end row -->

 <div class="modal fade" id="ModalChangeStatus" role="dialog" aria-labelledby="ModalChangeStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title m-0" id="ModalChangeStatusLabel"> <i class="fas fa-file me-2"></i> Change status quote</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">

                                      <div class="col-md-12" >
                                            <label class="mb-1"><b>Quote ID</b></label>
                                            <input type="text" id="Id" readonly class="form-control">
                                        </div><br>
                                                    
                                    <div class="col-md-12" >
                                            <label class="mb-1"><b>Quote status</b><b class="text-danger">*</b></label>
                                            <select style="width: 100%;" id="QuoteStatus" name="QuoteStatus" class="form-control">
                                                <option selected value="">Select a status</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Cancelled">Cancelled</option>
                                            </select>
                                        </div>
                                        <br>
                                 </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
                <button type="button" onclick="UpdateStatusQuote()" class="btn btn-soft-primary btn-sm">Update quote</button>
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
    $('#QuotesList').DataTable({
        dom: 'Bfrtip',
            buttons: [
        {
            extend: 'excel',
            filename: 'Quotes List'
        },{
            extend: 'pdf',
            filename:  'Quotes List'
        }
    ],
      "bDestroy": true,
        "responsive": true,
            "ajax": {
                "url": "index.php?c=Quotes&a=View2",
            },
        columns:[
            {data: "Id"},
            {data: "FirstName"},
            {data: "LastName"},
            {data: "PickUpLocation"},
            {data: "OriginCity"},
            {data: "DeliveryLocation"},
            {data: "DestinyCity"},
            {data: "TypeVehicle"},
            {data: "ShippingDate"},
            {data: "Phone"},
            {data: "Email"},
            {data: "Answer"},
            {data: "Comments"},
            {data: "Status"},
            {data: "IsActive"}
        ],"columnDefs": [ {
            "targets":0,
            "render": function (data, type, row) {
                console.log(data);
                return '<center><a class="btn btn-primary" title="View quote" href="index.php?c=Quotes&a=View&Id='+data+'"> <i class="ti-file"></i></a> <button class="btn btn-info" onclick="ChangeStatus('+data+')"  title="Change status"> <i class="ti-loop"></i></button></center>';
            }}, {
                "targets": 14,
                "data": "IsActive",
                "render": function (data) {
                    return (data) == 1 ? '<center><button type="button" class="btn btn-success"> <i class="ti-check"></i> </button></center>': '<center><button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button></center>';
         }}]
    });


function UpdateStatusQuote(){

if($("#Id").val() != '' && $("#QuoteStatus").val() != ''){

        $.ajax({
            type: 'POST',
            url: "index.php?c=Quotes&a=UpdateStatusQuote",
            data:{ Id: $("#Id").val(), "QuoteStatus": $("#QuoteStatus").val()}
        }).then(function(response) {

            if(response == 'true'){
                
                $(".toast-success").html("Status updated");
                var myAlert = document.getElementById('toastSuccess');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();
                $("#ModalChangeStatus").modal('hide'); 
                location.reload();
            }else{

                $(".toast-error").html("(!) Error - Quote updated");
                var myAlert = document.getElementById('toastError');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();

                 $("#ModalChangeStatus").modal('hide'); 
            }

        });
  }

}

});

function ChangeStatus(QuoteId){
    $("#Id").val(QuoteId);
    $("#ModalChangeStatus").modal('show'); 
}


</script>
