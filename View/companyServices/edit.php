<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
<br>
          <div class="row col-sm-8 offset-sm-2">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Truker Company</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="?c=Dashboard&a=Index">Dashboard</a></li>
                                        <li class="breadcrumb-item "><a href="?c=companyServices&a=Index">Truker Company list</a></li>
                                        <li class="breadcrumb-item active"><a href="#"><b>Management</b></a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<div class="row">
    
   <div class="col-sm-12">
     
   <form id="frm-companyServices" action="?c=companyServices&a=Save" method="post" enctype="multipart/form-data">

            <input type="hidden" name="Id" id="Id" value="<?= $CompanyService->Id; ?>" />
            <input type="hidden" name="IsActive" id="IsActive" value="<?= $CompanyService->IsActive?>" >

                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h4 class="card-title text-white">Truker Company</h4>
                                <p class="text-muted mb-0">Management</p>
                            </div>
                   
                            <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="CompanyName">*Company name:</label>
                                        <input type="text" class="form-control" id="CompanyName" name="CompanyName" aria-describedby="CompanyName" placeholder="Enter the company name" value="<?= $CompanyService->CompanyName; ?>" required> 
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="CompanyAddress">*Address:</label>
                                        <input type="text" class="form-control" id="CompanyAddress" name="CompanyAddress"  aria-describedby="CompanyAddress" placeholder="Enter the address" value="<?= $CompanyService->CompanyAddress; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="CompanyCity">*City:</label>
                                        <input type="text" class="form-control" id="CompanyCity" name="CompanyCity"  aria-describedby="CompanyCity" placeholder="Enter the city" value="<?= $CompanyService->CompanyCity; ?>" required>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="CompanyState">*State:</label>
                                        <input type="text" class="form-control" id="CompanyState" name="CompanyState"  aria-describedby="CompanyState" placeholder="Enter the state" value="<?= $CompanyService->CompanyState; ?>">
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="CompanyZipCode">Zip code:</label>
                                        <input type="text" class="form-control" id="CompanyZipCode" name="CompanyZipCode"  aria-describedby="CompanyZipCode" placeholder="Enter the zip code" value="<?= $CompanyService->CompanyZipCode; ?>">
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label text-danger" for="CompanyPhone1">*Phone #1:</label>
                                        <input type="text" class="form-control phone" id="CompanyPhone1" name="CompanyPhone1"  aria-describedby="CompanyPhone1" placeholder="(555) 555-555" value="<?= $CompanyService->CompanyPhone1; ?>" required>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="CompanyPhone2">Phone #2:</label>
                                        <input type="text" class="form-control phone" id="CompanyPhone2" name="CompanyPhone2"  aria-describedby="CompanyPhone2" placeholder="(555) 555-555 (optional)" value="<?= $CompanyService->CompanyPhone2; ?>">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="CompanyEmail">Email:</label>
                                        <input type="email" class="form-control" id="CompanyEmail" name="CompanyEmail"  aria-describedby="CompanyEmail" placeholder="Enter the email (optional)" value="<?= $CompanyService->CompanyEmail; ?>">
                                    </div>
                                   
                                    <?php if($CompanyService->Id != null){?>
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
<script src="assets/js/jquery.mask.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOHEjweqW61WAqGaXKZzuQS7sbOakgpT0&libraries=places"></script>

<script type="text/javascript">

    $(document).ready(function($){

        $('.phone').mask('(000) 000-0000');
        var IsActive = "<?=$CompanyService->IsActive?>";
     
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
                 setTimeout(function(){  $("#frm-companyServices").submit();}, 2000)
                
            }else{
                $("#IsActive").val(1);
            }

         
        });
        let autocomplete4;
        let address1Field4;
        let postalField4;

        address1Field4 = document.querySelector("#CompanyAddress");
        postalField4 = document.querySelector("#CompanyZipCode");

        autocomplete4 = new google.maps.places.Autocomplete(address1Field4, {
            componentRestrictions: { country: ["us", "ca"] },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });

        autocomplete4.addListener("place_changed", fillInAddress4);

        function fillInAddress4() {
        // Get the place details from the autocomplete object.
        const place4 = autocomplete4.getPlace();
        let address14 = "";
        let postcode4 = "";
      
        $("#CompanyState, #CompanyCity, #CompanyZipCode").css("border-color", "#e3ebf6;");

        for (const component4 of place4.address_components) {

            const componentType4 = component4.types[0];

            switch (componentType4) {
                case "street_number":
                    {
                        address14 = `${component4.long_name} ${address14}`;
                        break;
                    }

                case "route":
                    {
                        address14 += component4.short_name;
                        break;
                    }

                case "postal_code":
                    {
                        postcode4 = `${component4.long_name}${postcode4}`;
                        break;
                    }

                case "postal_code_suffix":
                    {
                        postcode4 = `${postcode4}-${component4.long_name}`;
                        break;
                    }
                case "locality":

                    if (component4.long_name != '') {
                        document.querySelector("#CompanyCity").value = component4.long_name;
                        $("#CompanyCity").css("border-color", "green");
                    } else {
                        $("#CompanyCity").css("border-color", "orange");
                        document.querySelector("#CompanyCity").value = "";
                    }

                    break;
                case "administrative_area_level_1":
                    {

                        if (component4.short_name != '') {
                            document.querySelector("#CompanyState").value = component4.short_name;
                            $("#CompanyState").css("border-color", "green");
                        } else {
                            $("#CompanyState").css("border-color", "orange");
                            document.querySelector("#CompanyState").value = "";
                        }

                        break;

                    }
          
            }

            if (postcode4 != '') {
                postalField4.value = postcode4;
                $("#CompanyZipCode").css("border-color", "green");
            } else {
                $("#CompanyZipCode").css("border-color", "orange");
                postalField4.value = "";
            }

        }
    }



    });

</script>


