<br>
<div class="row">
   <div class="col-12">
      <div class="card">
          <div class="card-header bg-dark">
              <h4 class="card-title text-white">Quotes</h4>
               <p class="text-muted mb-0">Report</p>
            </div><!--end card-header-->
            
            <div class="card-body">  
            <div class="table-rep-plugin table-responsive">
                <table id="QuotesList" width="100%" class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>PickUp Location</th>
                            <th>Origin City</th>
                            <th>Origin State</th>
                            <th>Delivery Location</th>
                            <th>Destination City</th>
                            <th>Destination State</th>
                            <th>Type Vehicle</th>
                            <th>Shipping Date</th>
                            <th>First Name</th>
                            <th>Last Name</th>
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


<script>
$(document).ready(function() {
    $.noConflict();
    $('#QuotesList').DataTable({
        scrollX:        true,
        scrollCollapse: true,
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
                "url": "index.php?c=Quotes&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "PickUpLocation"},
            {data: "OriginCity"},
            {data: "OriginState"},
            {data: "DeliveryLocation"},
            {data: "DestinyCity"},
            {data: "DestinyState"},
            {data: "TypeVehicle"},
            {data: "ShippingDate"},
            {data: "FirstName"},
            {data: "LastName"},
            {data: "Phone"},
            {data: "Email"},
            {data: "Answer"},
            {data: "Comments"},
            {data: "Status"},
            {data: "IsActive"}
        ],"columnDefs": [ {
                "targets": 16,
                "data": "IsActive",
                "render": function (data) {
                    return (data) == 1 ? '<center><button type="button" class="btn btn-success"> <i class="ti-check"></i> </button></center>': '<center><button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button></center>';
         }}]
    });

});
</script>
