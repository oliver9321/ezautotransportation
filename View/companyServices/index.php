<br>
<a href="?c=companyServices&a=Edit" class="btn btn-info">New trucker company <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<div class="row">
   <div class="col-12">
      <div class="card">
          <div class="card-header bg-dark">
              <h4 class="card-title text-white">TRUCKER COMPANY LISTS</h4>
               <p class="text-muted mb-0">Report</p>
            </div><!--end card-header-->
            
            <div class="card-body">  
            <div class="table-rep-plugin table-responsive responsiveTable">
                <table id="companyServicesList" width="100%" class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip Code</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Email</th>
                            <th class="text-center">Active</th>
                            <th class="text-center">Edit</th>
                        </tr>
                     </thead>
                   </table>
</div>
            </div>
        </div>
    </div> <!-- end col -->

<script>
$(document).ready(function() {
    $.noConflict();
    $('#companyServicesList').DataTable({
        dom: 'Bfrtip',
            buttons: [{
            extend: 'excel',
            filename: 'Company Services List'
        },{
            extend: 'pdf',
            filename:  'Company Services List'
        }
    ],
      "bDestroy": true,
        "responsive": true,
            "ajax": {
                "url": "index.php?c=companyServices&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "CompanyName"},
            {data: "CompanyAddress"},
            {data: "CompanyCity"},
            {data: "CompanyState"},
            {data: "CompanyZipCode"},
            {data: "CompanyPhone1"},
            {data: "CompanyPhone2"},
            {data: "CompanyEmail"},
            {data: "IsActive"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":10,
            "data": "Editar",
            "render": function ( data) {
                return '<center><a class="btn btn-warning" href="index.php?c=companyServices&a=Edit&Id='+data+'" aria-label="Editar"> <i class="ti-pencil"></i></a></center>';
            }
        },{
                "targets": 9,
                "data": "IsActive",
                "render": function (data) {
                    return (data) == 1 ? '<center><button type="button" class="btn btn-success btn-sm"> <i class="ti-check"></i> </button></center>': '<center><button type="button" class="btn btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button></center>';
         }}]
    });

});
</script>
