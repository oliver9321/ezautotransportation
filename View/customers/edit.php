<div id="toastWarning" class="toast align-items-center text-white bg-warning border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body toast-warning">
                <!-- Message from js -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>

            <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Customers</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="?c=Dashboard&a=Index">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="?c=Customers&a=Index">Customers list</a></li>
                                        <li class="breadcrumb-item active"><a href="#"><b>Form</b></a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<br>

<div class="row">
    
   <div class="col-sm-12">
     
   <form id="frm-Customers" action="?c=Customers&a=Save" method="post" enctype="multipart/form-data">

            <input type="hidden" name="Id" id="Id" value="<?=$Customer->Id; ?>" />
            <input type="text" name="IsActive" id="IsActive" value="<?=$Customer->IsActive?>">

                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <div class="card">
                            <div class="card-header  bg-dark">
                                <h1 class="card-title text-white">Customer maintenance</h1>
                                <p class="text-muted mb-0">Form</p>
                            </div>
                   
                            <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="Name">*Customer name:</label>
                                        <input type="text" class="form-control" id="Name" name="Name" aria-describedby="Name" placeholder="Enter Customer name" value="<?php echo $Customer->Name; ?>"> 
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="LastName">*Customer last name:</label>
                                        <input type="text" class="form-control" id="LastName" name="LastName"  aria-describedby="LastName" placeholder="Enter Customer last name" value="<?php echo $Customer->LastName; ?>">
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="Phone1">*Number phone 1:</label>
                                        <input type="tel" class="form-control" id="Phone1" name="Phone1" aria-describedby="Phone1" placeholder="1-(555)-555-5555" value="<?php echo $Customer->Phone1; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="Phone2">Number phone 2:</label>
                                        <input type="tel" class="form-control" id="Phone2" name="Phone2" aria-describedby="Phone2" placeholder="1-(555)-555-5555" value="<?php echo $Customer->Phone2; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="Email">*Email:</label>
                                        <input type="tel" class="form-control" id="Email" name="Email" aria-describedby="Email" placeholder="Email" value="<?php echo $Customer->Email; ?>">
                                    </div>

                                    <?php if($Customer->Id != null){?>
                                        <button type="submit" class="btn btn-warning">Update <i class="fa fa-refresh"></i> </button>
                                        <div class="mb-3">
                                            <br>
                                            <div class="form-check form-switch form-switch-danger">
                                            <input class="form-check-input" type="checkbox" id="IsActiveChange" checked="">
                                                <label class="form-check-label text-da" for="IsActive"><b> <i class="fa fa-trash"></i> Click for delete</b></label> 
                                            </div>
                                            </div>
                                       
                                    <?php }else {?>
                                        <button type="submit"  class="btn btn-success">Submit <i class="fa fa-save"></i> </button>
                                    <?php }?>
                           
                            </div>
                           
                        </div>
                    </div>
                </div>
    </form>
</div>
</div>


<script src="assets/js/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        var IsActive = "<?=$Customer->IsActive?>";
     
        if(IsActive == 1){
            $("#IsActiveChange").prop("checked", false);
        }else{
            $("#IsActiveChange").prop("checked", true);
        }
        
        $('#IsActiveChange').change(function() {

            if($(this).prop('checked') == true){

                $(".toast-warning").html("(x) This record will be deleted.");
                var myAlert2 = document.getElementById('toastWarning');
                var bsAlert2 = new bootstrap.Toast(myAlert2);
                bsAlert2.show();

                 $("#IsActive").val(0);
                 setTimeout(function(){  $("#frm-Customers").submit();}, 2000)
                
            }else{
                $("#IsActive").val(1);
            }

         
        });

    });

</script>


