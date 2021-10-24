
           <br> <div class="row col-sm-8 offset-sm-2">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Users</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="?c=Dashboard&a=Index">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="?c=users&a=Index">Users list</a></li>
                                        <li class="breadcrumb-item active"><a href="#"><b>Form</b></a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<div class="row">
    
   <div class="col-sm-12">
     
   <form id="frm-users" action="?c=users&a=Save" method="post" enctype="multipart/form-data">

            <input type="hidden" name="Id" id="Id" value="<?= $User->Id; ?>" />
            <input type="hidden" name="IsActive" id="IsActive" value="<?= $User->Id?>" >

                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h4 class="card-title text-white">Users</h4>
                                <p class="text-muted mb-0">Management</p>
                            </div>
                   
                            <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="Name">*Name:</label>
                                        <input type="text" class="form-control" id="Name" name="Name" aria-describedby="Name" placeholder="Enter Name" value="<?= $User->Name; ?>"> 
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="LastName">Last name:</label>
                                        <input type="text" class="form-control" id="LastName" name="LastName" aria-describedby="LastName" placeholder="Enter Last Name" value="<?= $User->LastName; ?>"> 
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="UserName">*User name:</label>
                                        <input type="text" class="form-control" id="UserName" name="UserName" aria-describedby="UserName" placeholder="Enter User Name" value="<?= $User->UserName; ?>"> 
                                    </div>

                                    
                                    <div class="mb-3">
                                    <label for="ProfileUserId text-danger"><b>*Profile:</b></label>
                                    <select id="ProfileUserId" name="ProfileUserId" class="form-control select2">
                                        <option value="" selected>Select user profile</option>
                                        <?php foreach($userProfileList as $a): ?>
                                            <option value="<?=  $a['Id']; ?>"><?=  $a['userProfile']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="Password">*Password:</label>
                                        <input type="text" class="form-control" id="Password" name="Password" aria-describedby="Password" placeholder="Enter Password" value="<?= $User->Password; ?>"> 
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="Email">*Email:</label>
                                        <input type="text" class="form-control" id="Email" name="Email" aria-describedby="Email" placeholder="Enter Email" value="<?= $User->Email; ?>"> 
                                    </div>

                                    <!--<div class="mb-3">
                                        <label class="form-label text-danger" for="Image">Imagen:</label>
                                        <input type="text" class="form-control" id="Image" name="Image" aria-describedby="Image" placeholder="" value="<?= $User->Image; ?>"> 
                                    </div>-->
                            
                                    <?php if($User->Id != null){?>
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

        var IsActive = "<?=$User->IsActive?>";
     
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
              setTimeout(function(){  $("#frm-users").submit();}, 2000)
             
         }else{
             $("#IsActive").val(1);
         }

      
     });
    });

</script>


