<br>
<style>
.modal-body {
    padding: 0.2rem !important;
}
</style>

<span class="text-dark">
    <h4>Quote # <?= $Quote->Id ?></h4>
</span>
<div class="modal-body d-print-non bg-dark">
    <div class="card">
        <!-- <a href="javascript:window.print()" class="d-print-none btn btn-info"><i class="fa fa-print"></i> Print</a> -->
        <!--end card-header-->
        <div class="card-body">
            <form id="form-horizontal" class="form-horizontal">
                <input type="text" name="Id" id="Id" value="<?= $Quote->Id ?>" hidden>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6"> <span class="text-primary"><b><i data-feather="user"></i> Customer information</b></span>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-user"></i> Customer First Name</label>
                                    <div class="input-group">
                                        <input type="text" id="FirstName" name="FirstName" class="form-control"
                                            value="<?= $Quote->FirstName?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-user"></i> Customer Last Name</label>
                                    <div class="input-group">
                                        <input type="text" id="LastName" name="LastName" class="form-control"
                                            value="<?= $Quote->LastName?>" readonly>
                                    </div>
                                </div>
                            </div><!-- end row -->
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-1"><i class="fa fa-mobile"></i> Phone #1</label>
                                            <input id="Phone" name="Phone" type="text"
                                                class="form-control originInput phone" placeholder="(555) 555-5555"
                                                value="<?= $Quote->Phone; ?>" readonly>
                                        </div>

                                        <!-- end row -->
                                        <div class="col-md-6">
                                            <label class="mb-1"><i class="fa fa-envelope"></i> Email</label>
                                            <input style="display:none;" />
                                            <input autocomplete="off" id="Email" name="Email" type="email"
                                                class="form-control originInput" placeholder="cus@domain.com"
                                                value="<?= $Quote->Email; ?>" readonly>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                       <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mb-1"><b>Shipping Date</b></label>
                                            <input id="ShippingDate" name="ShippingDate" type="text" class="form-control" value="<?= $Quote->ShippingDate; ?>" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <label class="mb-1"><b>Status</b></label>
                                            <input id="Status" name="Status" type="text" class="form-control" value="<?= $Quote->Status; ?>" readonly>
                                        </div>
                                    </div>
 
                                </div>
                            </div>

                            <br>
                        </div>
                        <!--end col-->
                        <div class="col-md-6"> <span class="text-primary"><b><i data-feather="map-pin"></i> Location
                                    information</b></span>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-1"><i class="fa fa-map-marker-alt"></i> <b>Origin
                                            Address</b></label>
                                    <input style="display:none;" />
                                    <input id="PickUpLocation" name="PickUpLocation" type="text"
                                        class="form-control originInput" placeholder="Ex. 12141 Pembroke Rd,..."
                                        value="<?= $Quote->PickUpLocation; ?>" readonly>
                                </div>
                                <!-- end row -->
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City</label>
                                            <input style="display:none;" />
                                            <input autocomplete="off" id="OriginCity" name="OriginCity" type="text"
                                                class="form-control originInput" placeholder="City"
                                                value="<?= $Quote->OriginCity; ?>" readonly>
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State</label>
                                            <input style="display:none;" />
                                            <input autocomplete="off" id="OriginState" name="OriginState" type="text"
                                                class="form-control originInput" placeholder="State"
                                                value="<?= $Quote->OriginState; ?>" readonly>
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                                            <input style="display:none;" />
                                            <input autocomplete="off" id="OriginZipCode" name="OriginZipCode"
                                                type="text" class="form-control originInput" placeholder="00000"
                                                value="<?= $Quote->OriginZipCode; ?>" readonly>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-1"><i class="fa fa-map-marker-alt"></i><b> Destination
                                            Address</b></label>
                                    <input style="display:none;" />
                                    <input id="DestinationAddress" name="DestinationAddress" type="text"
                                        class="form-control DestinationInput" placeholder="Ex. 1600 Pennsylvania..."
                                        value="<?= $Quote->DeliveryLocation; ?>" readonly>
                                </div>
                                <!-- end row -->
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City</label>
                                            <input id="DestinyCity" name="DestinyCity" type="text"
                                                class="form-control DestinationInput" placeholder="City"
                                                value="<?= $Quote->DestinyCity; ?>" readonly>
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State</label>
                                            <input id="DestinyState" name="DestinyState" type="text"
                                                class="form-control DestinationInput" placeholder="State"
                                                value="<?= $Quote->DestinyState; ?>" readonly>
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                                            <input id="DestinyZipCode" name="DestinyZipCode" type="text"
                                                class="form-control DestinationInput" placeholder="00000"
                                                value="<?= $Quote->DestinyZipCode; ?>" readonly>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>

                            <!--end col-->
                        </div>

                </fieldset>

                <!--end fieldset-->
                <fieldset>
                    <div class="row">
                                 <div class="col-md-12">
                                 <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-1"><i class="fa fa-sticky-note"></i> Comments</label>
                                            <textarea id="Comments" name="Comments" class="form-control originInput"
                                                placeholder="Comments information"
                                                rows="3"><?= $Quote->Comments; ?></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="mb-1"><i class="fa fa-sticky-note"></i> Answer</label>
                                            <textarea id="Answer" name="Answer" class="form-control originInput"
                                                placeholder="Answer information"
                                                rows="3"><?= $Quote->Answer; ?></textarea>
                                        </div>
                                        <!-- end row -->
                                    </div>

                                 </div>
                            </div>
                            <br />


                            <div class="col-md-12">
                                <span class="text-primary"><b><i class="fa fa-car fa-2x"></i> Vehicles
                                        List</b></span><br></br>
                                <div class="card">
                                    <!--end card-header-->
                                    <div class="card-body">
                                        <div class="repeater-default">
                                            <div data-repeater-list="car">
                                                <div data-repeater-item="">
                                                    <div class="form-group row d-flex align-items-end">
                                                        <div class="row">
                                                            <!--- HASTA AQUI-->
                                                            <div class="col-md-12" id="contentVehicle"
                                                                style="overflow-y: auto; height:210px">

                                                                <?php foreach($QuoteDetail as $key1=>$value): 
                                                                        $BrandSelected = $value['Brand'];
                                                                        $ModelSelected = $value['Model'];
                                                                        $YearSelected = $value['Year'];
                                                                        $CarrierTypeSelected = $value['CarrierType'];
                                                                        $ConditionVehicleSelected = $value['ConditionVehicle'];
                                                                        $StatusVehicle = $value['StatusVehicle'];
                                                                    ?>

                                                                <div class="row registroVehiculo" id="templateVehiculo"
                                                                    style="padding-bottom:20px !important">

                                                                    <div class="col-sm-2">
                                                                        <label class="mb-1 "><b>Brand</b></label>
                                                                        <input class="form-control" type="text"
                                                                            id="Brand" name="Brand"
                                                                            value="<?= $BrandSelected?>" readonly>
                                                                    </div>

                                                                    <div class="col-sm-2">
                                                                        <label class="mb-1 "><b>Model</b></label>
                                                                        <input class="form-control" type="text"
                                                                            id="ModelSelected" name="ModelSelected"
                                                                            value="<?= $ModelSelected?>" readonly>
                                                                    </div>

                                                                    <!--end col-->
                                                                    <div class="col-sm-2">
                                                                        <label class="mb-1 "><b>Year</b></label>
                                                                        <input type="text" name="Year" minlength="4"
                                                                            maxlength="5"
                                                                            class="form-control YearVehicle vehicleList"
                                                                            value="<?=$YearSelected?>" readonly>
                                                                    </div>


                                                                    <div class="col-sm-2">
                                                                        <label class="mb-1 "><b>Carrier</b></label>
                                                                        <input class="form-control" type="text"
                                                                            id="CarrierType" name="CarrierType"
                                                                            value="<?= $CarrierTypeSelected?>" readonly>
                                                                    </div>

                                                                    <div class="col-sm-2">
                                                                        <label class="mb-1 "><b>Condition</b></label>
                                                                        <input class="form-control" type="text"
                                                                            id="ConditionVehicle"
                                                                            name="ConditionVehicle"
                                                                            value="<?= $ConditionVehicleSelected?>"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-2">
                                                                        <label class="mb-1 "><b>Status</b></label>
                                                                        <input class="form-control" type="text"
                                                                            id="StatusVehicle" name="StatusVehicle"
                                                                            value="<?= $StatusVehicle?>" readonly>
                                                                    </div>
                                                                </div>

                                                                <?php endforeach; ?>


                                                            </div>

                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end /div-->
                                            </div>
                                            <!--end repet-list-->
                                        </div>
                                        <!--end repeter-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                        </div>
                    </div>
                </fieldset>
                                                             
                <!--end fieldset-->

            </form>
            <!--end form-->
        </div>
        
        <!--end card-body-->
        <!--<a href="index.php?c=Orders&a=Edit&Id=<?= $Quote->Id ?>" class="d-print-none btn btn-dark text-white"><i
                class="fa fa-edit text-white"></i> Update quote</a>-->
    </div>
    <!--end card-->
</div>
<!--end modal-body-->

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("body").addClass("enlarge-menu");
});
</script>