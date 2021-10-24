
           <br> <div class="row col-sm-8 offset-sm-2">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Users Profiles</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="?c=Dashboard&a=Index">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="?c=userProfiles&a=Index">Users profiles list</a></li>
                                        <li class="breadcrumb-item active"><a href="#"><b>Management</b></a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<div class="row">
    
   <div class="col-sm-12">
     
   <form id="frm-userProfiles" action="?c=userProfiles&a=Save" method="post" enctype="multipart/form-data">

            <input type="hidden" name="Id" id="Id" value="<?= $UserProfile->Id; ?>" />
            <input type="hidden" name="IsActive" id="IsActive" value="<?= $UserProfile->Id ?>" >

                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h4 class="card-title text-Management">User Profiles</h4>
                                <p class="text-muted mb-0">Management</p>
                            </div>
                   
                            <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="Profile">*User profile name:</label>
                                        <input type="text" class="form-control" id="Profile" name="Profile" aria-describedby="Profile" placeholder="Enter User Profile name" value="<?= $UserProfile->Profile; ?>"> 
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="Description">* Description:</label>  
                                        <input type="text" class="form-control" id="Description" name="Description" aria-describedby="Description" placeholder="Enter Description name" value="<?= $UserProfile->Description; ?>"> 
                                    </div>
                                    
                                    <?php if($UserProfile->Id != null){?>
                                        <button type="submit" class="btn btn-warning">Update <i class="fa fa-refresh"></i> </button>
                                        <div class="mb-3">
                                            <br>
                                            <div class="form-check form-switch form-switch-danger">
                                            <input class="form-check-input" type="checkbox" id="IsActiveChange" checked="">
                                                <label class="form-check-label text-da" for="IsActive"><b> <i class="fa fa-trash text-danger"></i> Click for delete</b></label> 
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

        var IsActive = "<?=$UserProfile->IsActive?>";
     
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
              setTimeout(function(){  $("#frm-userProfiles").submit();}, 2000)
             
         }else{
             $("#IsActive").val(1);
         }

      
     });

    });

</script>


