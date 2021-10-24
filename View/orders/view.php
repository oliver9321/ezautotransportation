<br>
<style>
    .modal-body {
        padding: 0.2rem !important;
    }
</style>


<div class="position-fixed top-0 end-0 p-3" style=" z-index: 9999999 !important;">
    <div id="toastSuccess" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body toast-success">
                <!-- Message from js -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div id="toastError" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body toast-error">
                <!-- Message from js -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>


<span class="text-dark">
    <h4>Order # <?= $Order->Id ?></h4>
</span>
<div class="modal-body d-print-non">
    <div class="card">
        <!-- <a href="javascript:window.print()" class="d-print-none btn btn-info"><i class="fa fa-print"></i> Print</a> -->
        <!--end card-header-->
        <div class="card-body">
            <form id="form-horizontal" class="form-horizontal">
                <input type="text" name="Id" id="Id" value="<?= $Order->Id ?>" hidden>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6"> <span class="text-dark"><b><i data-feather="map-pin"></i> Origin information</b></span>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-1"><i class="fa fa-user"></i> Origin customer name<b class="text-danger">*</b></label>
                                    <div class="input-group">
                                        <select readonly style="width: 100%;" id="IdCustomerOrigin" name="IdCustomerOrigin" class="select2 form-control mb-3 custom-select originInput">
                                            <?php foreach ($CustomerList  as $key => $value) : ?>
                                                <option value="<?= $value['Id']; ?>" <?php if ($value['Id'] == $Order->IdCustomerOrigin) : ?> selected="selected" <?php endif; ?>><?= $value['Customer']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end row -->
                            <br>
                        </div>
                        <!--end col-->
                        <div class="col-md-6"> <span class="text-dark"><b><i data-feather="arrow-right-circle"></i> Destination information</b></span>
                            <hr>
                            <div class="row">

                                <div class="col-md-12">
                                    <label class="mb-1"><i class="fa fa-user"></i> Destination customer name<b class="text-danger">*</b></label>
                                    <div class="input-group">
                                        <select style="width: 100%;" id="IdCustomerDestination" name="IdCustomerDestination" class="select2 form-control mb-3 custom-select DestinationInput" readonly>
                                            <?php foreach ($CustomerList  as $key => $value) : ?>
                                                <option value="<?= $value['Id']; ?>" <?php if ($value['Id'] == $Order->IdCustomerDestination) : ?> selected="selected" <?php endif; ?>><?= $value['Customer']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <!--end form-group-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Origin address<b class="text-danger">*</b></label>
                                        <input style="display:none;" />
                                        <input id="OriginAddress" name="OriginAddress" type="text" class="form-control originInput" placeholder="Ex. 12141 Pembroke Rd,..." readonly value="<?= $Order->OriginAddress; ?>">
                                    </div>
                                    <!-- end row -->
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City<b class="text-danger">*</b></label>
                                                <input style="display:none;" />
                                                <input autocomplete="off" id="OriginCity" name="OriginCity" type="text" class="form-control originInput" placeholder="City" readonly value="<?= $Order->OriginCity; ?>">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State<b class="text-danger">*</b></label>
                                                <input style="display:none;" />
                                                <input autocomplete="off" id="OriginState" name="OriginState" type="text" class="form-control originInput" placeholder="State" readonly value="<?= $Order->OriginState; ?>">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                                                <input style="display:none;" />
                                                <input autocomplete="off" id="OriginZip" name="OriginZip" type="text" class="form-control originInput" placeholder="00000" readonly value="<?= $Order->OriginZip; ?>">
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-mobile"></i> Phone
                                                    #1<b class="text-danger">*</b></label>
                                                <input id="OriginPhone1" name="OriginPhone1" type="text" class="form-control originInput phone" placeholder="(555) 555-5555" readonly value="<?= $CustomerOrigin->Phone1; ?>">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone
                                                    #2</label>
                                                <input style="display:none;" />
                                                <input autocomplete="off" id="OriginPhone2" name="OriginPhone2" type="text" class="form-control originInput phone" placeholder="(555) 555-5555" readonly value="<?= $CustomerOrigin->Phone2; ?>">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-envelope"></i> Email</label>
                                                <input style="display:none;" />
                                                <input autocomplete="off" id="OriginEmail" name="OriginEmail" type="email" class="form-control originInput" placeholder="cus@domain.com" readonly value="<?= $CustomerOrigin->Email; ?>">
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1"><i class="fa fa-sticky-note"></i> Note</label>
                                        <textarea id="OriginNote" name="OriginNote" class="form-control originInput" placeholder="Opcional information" rows="3" readonly><?= $Order->OriginNote; ?></textarea>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Address<b class="text-danger">*</b></label>
                                        <input style="display:none;" />
                                        <input id="DestinationAddress" name="DestinationAddress" type="text" class="form-control DestinationInput" placeholder="Ex. 1600 Pennsylvania..." readonly value="<?= $Order->DestinationAddress; ?>">
                                    </div>
                                    <!-- end row -->
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City<b class="text-danger">*</b></label>
                                                <input id="DestinationCity" name="DestinationCity" type="text" class="form-control DestinationInput" placeholder="City" readonly value="<?= $Order->DestinationCity; ?>">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State<b class="text-danger">*</b></label>
                                                <input id="DestinationState" name="DestinationState" type="text" class="form-control DestinationInput" placeholder="State" readonly value="<?= $Order->DestinationState; ?>">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                                                <input id="DestinationZip" name="DestinationZip" type="text" class="form-control DestinationInput" placeholder="00000" readonly value="<?= $Order->DestinationZip; ?>">
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-mobile"></i> Phone
                                                    #1<b class="text-danger">*</b></label>
                                                <input id="DestinationPhone1" name="DestinationPhone1" type="text" class="form-control DestinationInput phone" placeholder="(555) 555-5555" readonly value="<?= $CustomerDestination->Phone1; ?>">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone
                                                    #2</label>
                                                <input id="DestinationPhone2" name="DestinationPhone2" type="text" class="form-control DestinationInput phone" placeholder="(555) 555-5555" readonly value="<?= $CustomerDestination->Phone2; ?>">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-envelope"></i> Email</label>
                                                <input id="DestinationEmail" name="DestinationEmail" type="email" class="form-control DestinationInput" placeholder="cus@domain.com" readonly value="<?= $CustomerDestination->Email; ?>">
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1"><i class="fa fa-sticky-note"></i> Note</label>
                                        <textarea id="DestinationNote" name="DestinationNote" class="form-control DestinationInput" placeholder="Opcional information" rows="3" readonly><?= $Order->DestinationNote; ?></textarea>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <br>
                            </div>
                        </div>
                </fieldset>

                <!--end fieldset-->
                <fieldset>
                    <div class="row">
                        <div class="col-md-12"> <span class="text-dark"><b><i class="fa fa-car fa-2x"></i> Vehicles list</b></span>
                            <div class="col-md-12">
                                <hr>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="mb-1"><b>Pick up date</b><b class="text-danger">*</b></label>
                                        <input id="PickUpDate" name="PickUpDate" type="text" class="form-control" readonly value="<?= $Order->PickUpDate; ?>">
                                    </div>
                                    <!-- end row -->
                                    <div class="col-md-3">
                                        <label class="mb-1"><b>Delivery date</b><b class="text-danger">*</b></label>
                                        <input id="DeliveryDate" name="DeliveryDate" type="text" class="form-control" readonly value="<?= $Order->DeliveryDate; ?>">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-1"><b>Order date (Today)</b></label>
                                        <input id="PickUpOrderDateDate" name="OrderDate" type="text" class="form-control" value="<?= $Order->OrderDate; ?>" readonly>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-1"><b>Order status</b><b class="text-danger">*</b></label>
                                        <select style="width: 100%;" id="OrderStatusID" name="OrderStatusID" class="form-control" readonly>
                                            <?php foreach ($OrderStatusList  as $key => $value) : ?>
                                                <option value="<?= $value['Id']; ?>" <?php if ($value['Id'] == $Order->OrderStatusID) : ?> selected="selected" <?php endif; ?>><?= $value['Status']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div><br />

                                <div class="col-md-12">
                                    <div class="card">
                                        <!--end card-header-->
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div data-repeater-list="car">
                                                    <div data-repeater-item="">
                                                        <div class="form-group row d-flex align-items-end">
                                                            <div class="row">

                                                                <div class="row registroVehiculo" id="templateVehiculo" style="padding-bottom:10px !important" hidden>

                                                                    <div class="col-sm-2">
                                                                        <label class="mb-1"><b>Brand</b><b class="text-danger">*</b></label>
                                                                        <select style="width: 90%;" name="Brand" class="select2 form-control mb-3 custom-select BrandVehicle vehicleList" readonly>
                                                                            <option value="" selected>Select brand</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <label class="mb-1"><b>Model</b><b class="text-danger">*</b></label>
                                                                        <select style="width: 90%;" name="Model" class="select2 form-control mb-3 custom-select ModelVehicle vehicleList" readonly>
                                                                            <option value="" selected>Select model</option>
                                                                        </select>
                                                                    </div>

                                                                    <!--end col-->
                                                                    <div class="col-sm-1">
                                                                        <label class="mb-1"><b>Year</b><b class="text-danger">*</b></label>
                                                                        <input type="number" min="1900" name="Year" class="form-control YearVehicle vehicleList" placeholder="" readonly>
                                                                    </div>

                                                                    <!-- end row -->
                                                                    <div class="col-sm-1">
                                                                        <label class="mb-1"><b>Color</b><b class="text-danger">*</b></label>
                                                                        <select style="width: 100%;" name="Color" class="form-control ColorVehicle vehicleList" readonly>
                                                                            <option value="" selected></option>
                                                                            <option value="White"> White</option>
                                                                            <option value="Black"> Black</option>
                                                                            <option value="Gray"> Gray</option>
                                                                            <option value="Silver"> Silver</option>
                                                                            <option value="Blue"> Blue</option>
                                                                            <option value="Red"> Red</option>
                                                                            <option value="Brown/Beige"> Brown/Beige</option>
                                                                            <option value="Yellow/Gold"> Yellow/Gold</option>
                                                                            <option value="Green"> Green</option>
                                                                            <option value="Other"> Other</option>

                                                                        </select>
                                                                    </div>

                                                                    <div class="col-sm-1">
                                                                        <label class="mb-1"><b>Carrier</b><b class="text-danger">*</b></label>
                                                                        <select style="width: 100%;" name="CarrierType" class="form-control CarrierTypeVehicle vehicleList" readonly>
                                                                            <option value="" selected></option>
                                                                            <option value="Open">Open</option>
                                                                            <option value="Enclosed">Enclosed</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-sm-1">
                                                                        <label class="mb-1"><b>Condition</b><b class="text-danger">*</b></label>
                                                                        <select style="width: 100%;" name="ConditionVehicle" class="form-control ConditionVehicle vehicleList" readonly>
                                                                            <option value="" selected></option>
                                                                            <option value="Running">Running</option>
                                                                            <option value="Non-running">Non-running</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <label class="mb-1"><b>Vin</b></label>
                                                                        <div class="input-group">
                                                                            <input type="text" name="Vin" class="form-control VinVehicle vehicleList" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <!--end col-->

                                                                </div>

                                                                <!--- HASTA AQUI-->
                                                                <div class="col-md-12" id="contentVehicle" style="overflow-y: auto;"></div>

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
                <br>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6"> <span class="text-dark"><b><i data-feather="credit-card"></i> Payment</b></span>
                            <hr>
                            <div class="row">
                                <input type="text" id="PaymentID" name="PaymentID" value="<?= $Payment->Id; ?>" hidden />
                                
                                <div class="col-md-6">
                                    <label class="mb-1"> Card holder name<b class="text-danger">*</b></label>
                                    <input type="text" class="form-control" name="CardHolderName" id="CardHolderName" style="text-transform:uppercase" readonly value="<?= trim($Payment->CardHolderName); ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="mb-1">Reference</label>
                                    <input id="Reference" name="Reference" type="text" class="form-control" placeholder="0000000" readonly value="<?= $Payment->Reference; ?>">
                                </div>

                                        <div class="col-md-5 inputpadding">
                                            <label class="mb-1"><i class="fa fa-credit-card"></i> Credit card number<b class="text-danger">*</b></label>
                                            <input id="CreditCard" name="CreditCard" type="text" class="form-control" placeholder="#### #### #### ####" readonly value="<?= $Payment->CreditCard; ?>">
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-3 inputpadding">
                                            <label class="mb-1">Expiration date<b class="text-danger">*</b></label>
                                            <input id="ExpDate" name="ExpDate" type="text" class="form-control" placeholder="00/00" readonly value="<?= trim($Payment->ExpDate); ?>">
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4 inputpadding">
                                            <label class="mb-1">CVV<b class="text-danger">*</b></label>
                                            <input id="Cvv" name="Cvv" type="text" class="form-control" placeholder="" readonly value="<?= $Payment->Cvv; ?>">
                                        </div>

                                        <div class="col-md-12 inputpadding">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Billing address<b class="text-danger">*</b></label>
                                            <input id="BillingAddress" name="BillingAddress" type="text" class="form-control" placeholder="Ex. 12141 Pembroke Rd...." autocomplete="disabled" readonly value="<?= $Payment->BillingAddress; ?>">
                                        </div>

                                        <div class="col-md-4 inputpadding">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City<b class="text-danger">*</b></label>
                                            <input id="BillingCity" name="BillingCity" type="text" class="form-control BillingInput" placeholder="City" readonly value="<?= $Payment->BillingCity; ?>">
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4 inputpadding">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State<b class="text-danger">*</b></label>
                                            <input id="BillingState" name="BillingState" type="text" class="form-control BillingInput" placeholder="State" readonly value="<?= $Payment->BillingState; ?>">
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4 inputpadding">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                                            <input id="BillingZipCode" name="BillingZipCode" type="text" class="form-control BillingInput" placeholder="00000" readonly value="<?= $Payment->BillingZipCode; ?>">
                                        </div>

                                        <div class="col-md-4 inputpadding">
                                            <label class="mb-1"><i class="fa fa-mobile"></i> Phone number #1<b class="text-danger">*</b></label>
                                            <input id="Tel1" name="Tel1" type="text" class="form-control phone" placeholder="(555) 555-5555" readonly value="<?= $Payment->Tel1; ?>">
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4 inputpadding">
                                            <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone number #2</label>
                                            <input id="Tel2" name="Tel2" type="text" class="form-control phone" placeholder="(555) 555-5555" readonly value="<?= $Payment->Tel2; ?>">
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-4 inputpadding">
                                            <label class="mb-1"><i class="fa fa-envelope"></i> Email</label>
                                            <input id="PaymentEmail" name="PaymentEmail" type="email" class="form-control" placeholder="us@domain.com" readonly value="<?= $Payment->PaymentEmail; ?>">
                                        </div>

                            </div>
                            <br>
                        </div>
                        <!--end col-->

                        <div class="col-md-6"> <span class="text-dark"><b><i data-feather="dollar-sign"></i> Customer payment </b></span>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-lock text-secondary"></i> <b>Total</b></label>
                                    <input type="number" class="form-control" name="TotalOrder" id="TotalOrder" placeholder="$0000" readonly value="<?= $Order->Total ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-1"><i class="fa fa-lock text-secondary"></i> <b>Deposit</b></label>
                                    <input id="DepositOrder" name="DepositOrder" type="number" class="form-control" placeholder="$0000" readonly value="<?= $Order->Deposit ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-1"><i class="fa fa-money-bill"></i><b class="text-success"> Earnings</b></label>
                                    <input id="Earnings" name="Earnings" type="text" class="form-control" placeholder="$0000" readonly value="<?= $Order->Earnings ?>">
                                </div>

                            </div><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-lock text-secondary"></i> Cod</label>
                                    <input id="Cod" name="Cod" type="number" class="form-control" placeholder="$0000" readonly value="<?= $Order->Cod ?>" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-lock text-secondary"></i> Truker rate</label>
                                    <input id="TrukerRate" name="TrukerRate" type="number" class="form-control" placeholder="$0000" value="<?= $Order->TrukerRate ?>" readonly>
                                </div>
                            </div>

                            <div class="row inputpadding">
                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-dollar-sign"></i><b class="text-warning"> Extra truker Fee</b></label>
                                    <input id="ExtraTrukerFee" name="ExtraTrukerFee" type="number" class="form-control" placeholder="$0000" value="<?= $Order->ExtraTrukerFee ?>" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-truck"></i> <b class="text-danger">Truker owes us</b></label>
                                    <input id="TrukerOwesUs" name="TrukerOwesUs" type="number" class="form-control" placeholder="$0000" value="<?= $Order->TrukerOwesUs ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-12 inputpadding">
                                    <label class="mb-1"><i class="fa fa-sticky-note"></i> Payment note</label>
                                    <textarea id="PaymentNote" name="PaymentNote" class="form-control" placeholder="Opcional information" rows="4" readonly><?= $Payment->PaymentNote; ?></textarea>
                                </div>

                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
        
                </fieldset>
                <hr />
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="text-dark"><b><i data-feather="truck"></i> Company services</b></span><br>
                            <hr>
                            <div class="row">
                                <label class="mb-1">Company name</label>
                                <div class="input-group">
                                    <select style="width: 100%;" id="IdCompanyService" name="IdCompanyService" class="select2 form-control mb-3 custom-select" readonly>
                                        <option value="" selected>Select a truker company</option>
                                        <?php foreach ($Companies  as $key => $value) : ?>
                                            <option value="<?= $value['Id']; ?>" <?php if ($value['Id'] == $Order->IdCompanyService) : ?> selected="selected" <?php endif; ?>><?= $value['CompanyName']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="row inputpadding">
                                <div class="col-md-12">
                                    <label class="mb-1">Company address</label>
                                    <input id="CompanyAddress" name="CompanyAddress" type="text" class="form-control" placeholder="Input the company's address" readonly value="<?= $CompanyService->CompanyAddress; ?>">
                                </div>
                            </div>

                            <div class="row inputpadding">
                                <div class="col-md-4">
                                    <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City<b class="text-danger">*</b></label>
                                    <input id="CompanyCity" name="CompanyCity" type="text" class="form-control CompanyInput" placeholder="City" readonly value="<?= $CompanyService->CompanyCity; ?>">
                                </div>
                                <!-- end row -->
                                <div class="col-md-4">
                                    <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State<b class="text-danger">*</b></label>
                                    <input id="CompanyState" name="CompanyState" type="text" class="form-control CompanyInput" placeholder="State" readonly value="<?= $CompanyService->CompanyState; ?>">
                                </div>
                                <!-- end row -->
                                <div class="col-md-4">
                                    <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                                    <input id="CompanyZipCode" name="CompanyZipCode" type="text" class="form-control CompanyInput" placeholder="00000" readonly value="<?= $CompanyService->CompanyZipCode; ?>">
                                </div>
                                <!-- end row -->
                            </div>

                            <div class="row inputpadding">

                                <div class="col-md-4">
                                    <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone #1</label>
                                    <input id="CompanyPhone1" name="CompanyPhone1" type="text" class="form-control" placeholder="+1 (555) 555-5555" readonly value="<?= $CompanyService->CompanyPhone1; ?>">
                                </div>


                                <div class="col-md-4">
                                    <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone #2</label>
                                    <input id="CompanyPhone2" name="CompanyPhone2" type="text" class="form-control" placeholder="+1 (555) 555-5555" readonly value="<?= $CompanyService->CompanyPhone2; ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="mb-1"><i class="fa fa-envelope"></i> Email</label>
                                    <input id="CompanyEmail" name="CompanyEmail" type="email" class="form-control" placeholder="ez@domain.com" readonly value="<?= $CompanyService->CompanyEmail; ?>">
                                </div>
                            </div>
                                        
                        </div>

                        <!--end col-->
                        <div class="col-md-6">
                        <span class="text-dark"><b><i class="fa fa-bus fa-2x"></i> Driver</b></span>
                            <hr>
                            <div class="row">
                                <div class="row">
                                    <label class="mb-1">Driver name</label>
                                    <div class="input-group">
                                        <select style="width: 100%;" id="IdDriver" name="IdDriver" class="select2 form-control mb-3 custom-select" readonly>
                                            <option value="" selected>Select a driver</option>
                                            <?php foreach ($DriverList  as $key => $value) : ?>
                                                <option value="<?= $value['Id']; ?>" <?php if ($value['Id'] == $Order->IdDriver) : ?> selected="selected" <?php endif; ?>><?= $value['Driver']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row inputpadding">
                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-mobile"></i> Phone #1</label>
                                    <input id="DriverPhone1" name="DriverPhone1" type="text" class="form-control" placeholder="+1 (555) 555-5555" readonly value="<?= $Driver->DriverPhone1 ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone #2</label>
                                    <input id="DriverPhone2" name="DriverPhone2" type="text" class="form-control" placeholder="+1 (555) 555-5555" readonly value="<?= $Driver->DriverPhone2 ?>">
                                </div>

                                <div class="col-md-12 inputpadding">
                                    <label class="mb-1"><i class="fa fa-exclamation-triangle"></i> Cancelation Note</label>
                                    <textarea id="CancelledNote" class="form-control" rows="4" readonly><?= $Order->CancelledNote ?></textarea>
                                </div>

                            </div>
                        </div>
                        <!--end form-group-->
                    </div>

                </fieldset>
                <!--end fieldset-->

            </form>
            <!--end form-->
        </div>
        <!--end card-body-->
        <a href="index.php?c=Orders&a=Edit&Id=<?= $Order->Id ?>" class="d-print-none btn btn-warning text-white"><i class="fa fa-edit text-white"></i> Update order</a>
    </div>
    <!--end card-->
</div>
<!--end modal-body-->



<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="plugins/select2/select2.min.js"></script>
<script src="assets/js/ordersview.js"></script>
<script src="assets/js/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.select2').select2({
            disabled: 'readonly'
        });
        $("body").addClass("enlarge-menu");
        $(".ListVehiclesPDF").html("");

    });


    //GetListCustomer();
    GetListVehicles();


    function GetListVehicles() {

        $.ajax({
            type: 'POST',
            url: "index.php?c=vehicles&a=GetListVehicles",
        }).then(function(response) {

            $('.BrandVehicle, .ModelVehicle').empty();

            var data = JSON.parse(response);

            if (data.BrandsList.length > 0) {

                data.BrandsList.forEach(element => {
                    var optionBucle = new Option(element.Brand, element.Brand, true, true);
                    $('.BrandVehicle').append(optionBucle); //.trigger('change');
                });
            }

            if (data.ModelsList.length > 0) {

                data.ModelsList.forEach(element => {
                    var optionBucle = new Option(element.Model, element.Model, true, true);
                    $('.ModelVehicle').append(optionBucle); //.trigger('change');
                });

            }

            var optionDefault = new Option("Select brand", "", true, true);
            $('.BrandVehicle').append(optionDefault);
            $('.BrandVehicle').val("").trigger('change');

            $('.ModelVehicle').val("").trigger('change');
            var optionDefault2 = new Option("Select model", "", true, true);
            $('.ModelVehicle').append(optionDefault2);

            $(".toast-success").html("View order ready");
            var myAlert = document.getElementById('toastSuccess');
            var bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();

        });

    }


    function LoadEditFields() {

        $("#LoadingButton").show();
        //Colocarel ID de la orden para hacer el update

        $('#IdCustomerOrigin').select2().trigger('change');
        $('#IdCustomerDestination').select2().trigger('change');
        $('#IdCompanyService').select2().trigger('change');
        $('#IdDriver').select2().trigger('change');

        //Vehicles Step
        <?php
        $js_array = json_encode($OrderDetail);
        echo "var vehicleJSON = JSON.parse(" . $js_array . ");";
        ?>

        if (vehicleJSON.length > 0) {

            vehicleJSON.forEach(element => {
                EditVehicleList(element.Brand, element.Model, element.Year, element.Color, element.ConditionVehicle, element.CarrierType, element.Vin);
            });
        }

        $("#LoadingButton").hide();

    }


    function EditVehicleList(Brand, Model, Year, Color, ConditionVehicle, CarrierType, Vin) {
        //#contentVehicle"
        $("#templateVehiculo").find(".select2").each(function(index) {
            if ($(this).data('select2')) {
                $(this).select2('destroy');
            }
        });


        var clonado = $('#templateVehiculo').clone().val('');
        clonado.removeAttr('hidden');
        clonado.appendTo("#contentVehicle");

        $(clonado).find(".BrandVehicle").val(Brand);
        $(clonado).find(".BrandVehicle").select2().trigger('change');

        $(clonado).find(".ModelVehicle").val(Model);
        $(clonado).find(".ModelVehicle").select2().trigger('change');

        $(clonado).find(".YearVehicle").val(Year);
        $(clonado).find(".CarrierTypeVehicle ").val(CarrierType);
        $(clonado).find(".ConditionVehicle ").val(ConditionVehicle);
        $(clonado).find(".ColorVehicle").val(Color);
        $(clonado).find(".VinVehicle").val(Vin);
        $(clonado).find(".select2").select2();

    }


    $(document).ready(function($) {
        setTimeout(() => {
            LoadEditFields();
        }, 2500);
        $('.phone, #DriverPhone1, #DriverPhone2').mask('(000) 000-0000');
        $("#Cvv").mask('0000');
        $("#CreditCard").mask("0000 0000 0000 0000");
        $('.inputNumber').mask("#,##0.00", {
            reverse: true
        });
    });
</script>