<br>
<style>
    .modal-body {
    padding: 0.2rem !important;
    }

</style>
<link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css"/>
<script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<div class="modal fade" id="ModalNewCustomer" role="dialog" aria-labelledby="ModalNewCustomerLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h6 class="modal-title m-0" id="ModalNewCustomerLabel"> <i class="fas fa-user-plus me-2"></i> New
                    customer</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
         
                            <div class="mb-1">
                                <label class="form-label text-danger" for="NameNewCustomer">*Name:</label>
                                <input class="form-control" type="text" id="NameNewCustomer" name="NameNewCustomer">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="LastNameNewCustomer">Last name:</label>
                                <input class="form-control" type="text" id="LastNameNewCustomer" name="LastNameNewCustomer">
                            </div>
                            <div class="mb-1">
                                <label class="form-label text-danger" for="Phone1NewCustomer">*Phone #1</label>
                                <div class="input-group"> <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                    <input type="tel" class="form-control phone" id="Phone1NewCustomer" name="Phone1NewCustomer" placeholder="(555) 555-5555">
                                </div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="Phone2NewCustomer">Phone #2</label>
                                <div class="input-group"> <span class="input-group-text"><i class="las la-phone"></i></span>
                                    <input type="tel" class="form-control phone" id="Phone2NewCustomer" name="Phone2NewCustomer" placeholder="(555) 555-5555">
                                </div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="EmailNewCustomer">Email address</label>
                                <div class="input-group"> <span class="input-group-text"><i class="las la-at"></i></span>
                                    <input type="email" class="form-control" id="EmailNewCustomer" name="EmailNewCustomer" placeholder="customer@domain.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
                <button type="button" onclick="newCustomer()" class="btn btn-soft-primary btn-sm">Save changes</button>
                <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
            <!--end modal-footer-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>

<div class="modal fade" id="ModalNewVehicle" role="dialog" aria-labelledby="ModalNewVehicleLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h6 class="modal-title m-0" id="ModalNewVehicleLabel"> <i class="fas fa-car me-2"></i> New
                    vehicle</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="mb-1">
                                <label class="form-label text-danger" for="BrandNewVehicle">*Brand:</label>
                                <input class="form-control" type="text" id="BrandNewVehicle" name="BrandNewVehicle">
                            </div>
                            <div class="mb-1">
                                <label class="form-label text-danger" for="ModelNewVehicle">*Model:</label>
                                <input class="form-control" type="text" id="ModelNewVehicle" name="ModelNewVehicle">
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
                <button type="button" onclick="newVehicle()" class="btn btn-soft-primary btn-sm">Save changes</button>
                <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
            <!--end modal-footer-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>

<div class="modal fade" id="ModalNewCompanyService" role="dialog" aria-labelledby="ModalNewCompanyServiceLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h6 class="modal-title m-0" id="ModalNewCompanyServiceLabel"> <i class="fa fa-truck me-2"></i> New Trucker Company</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">

                            <div class="mb-1">
                                <label class="form-label text-danger" for="CompanyNameNewCompany">*Company name:</label>
                                <input class="form-control" type="text" id="CompanyNameNewCompany" name="CompanyNameNewCompany">
                            </div>

                            <div class="mb-1">
                                <label class="form-label text-danger" for="CompanyAddressNewCompany">*Address:</label>
                                <input class="form-control" type="text" id="CompanyAddressNewCompany" name="CompanyAddressNewCompany">
                            </div>

                            
                            <div class="mb-1">
                                <label class="form-label text-danger" for="CompanyCityNewCompany">*City:</label>
                                <input class="form-control" type="text" id="CompanyCityNewCompany" name="CompanyCityNewCompany">
                            </div>

                            <div class="mb-1">
                                <label class="form-label text-danger" for="CompanyStateNewCompany">*State:</label>
                                <input class="form-control" type="text" id="CompanyStateNewCompany" name="CompanyStateNewCompany">
                            </div>

                            <div class="mb-1">
                                <label class="form-label text-danger" for="CompanyZipCodeNewCompany">*Zip Code:</label>
                                <input class="form-control" type="text" id="CompanyZipCodeNewCompany" name="CompanyZipCodeNewCompany">
                            </div>

                            <div class="mb-1">
                                <label class="form-label text-danger" for="CompanyPhone1NewCompany">*Phone #1</label>
                                <div class="input-group"> <span class="input-group-text"><i class="las la-phone"></i></span>
                                    <input type="text" class="form-control phone" id="CompanyPhone1NewCompany" name="CompanyPhone1NewCompany" placeholder="(555) 555-5555">
                                </div>
                            </div>

                            <div class="mb-1">
                                <label class="form-label" for="CompanyPhone2NewCompany">Phone #2</label>
                                <div class="input-group"> <span class="input-group-text"><i class="las la-phone"></i></span>
                                    <input type="text" class="form-control phone" id="CompanyPhone2NewCompany" name="CompanyPhone2NewCompany" placeholder="(555) 555-5555">
                                </div>
                            </div>

                            <div class="mb-1">
                                <label class="form-label" for="CompanyEmailNewCompany">Email address</label>
                                <div class="input-group"> <span class="input-group-text"><i class="las la-at"></i></span>
                                    <input type="email" class="form-control" id="CompanyEmailNewCompany" name="CompanyEmailNewCompany" placeholder="company@domain.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
                <button type="button" onclick="newCompany()" class="btn btn-soft-primary btn-sm">Save changes</button>
                <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
            <!--end modal-footer-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>

<div class="modal fade" id="ModalNewDriver" role="dialog" aria-labelledby="ModalNewDriverLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h6 class="modal-title m-0" id="ModalNewDriverLabel"> <i class="fa fa-bus me-2"></i> New driver
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">

                            <div class="mb-1">
                                <label class="form-label text-danger" for="DriverNameNewDriver">*Driver name:</label>
                                <input class="form-control" type="text" id="DriverNameNewDriver" name="DriverNameNewDriver">
                            </div>

                            <div class="mb-1">
                                <label class="form-label text-danger" for="DriverPhone1NewDriver">*Phone #1</label>
                                <div class="input-group"> <span class="input-group-text"><i class="las la-phone"></i></span>
                                    <input type="text" class="form-control phone" id="DriverPhone1NewDriver" name="DriverPhone1NewDriver" placeholder="(555) 555-5555">
                                </div>
                            </div>

                            <div class="mb-1">
                                <label class="form-label" for="DriverPhone2NewDriver">Phone #2</label>
                                <div class="input-group"> <span class="input-group-text"><i class="las la-phone"></i></span>
                                            <input type="text" class="form-control phone" id="DriverPhone2NewDriver" name="DriverPhone2NewDriver" placeholder="(555) 555-5555">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
                <button type="button" onclick="newDriver()" class="btn btn-soft-primary btn-sm">Save changes</button>
                <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
            <!--end modal-footer-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>


<div class="modal-body bg-dark d-print-non">
    <div class="card">
        <div class="card-header d-print-none">
            <button type="button" class="btn btn-sm btn-soft-info" data-bs-toggle="modal" data-bs-target="#ModalNewCustomer"><i class="fas fa-user-plus me-2"></i>New customer</button>
            <button type="button" class="btn btn-sm btn-soft-info" data-bs-toggle="modal" data-bs-target="#ModalNewVehicle"><i class="fas fa-car me-2"></i>New vehicle</button>
            <button type="button" class="btn btn-sm btn-soft-info" data-bs-toggle="modal" data-bs-target="#ModalNewCompanyService"><i class="fa fa-truck me-2"></i>New company</button>
            <button type="button" class="btn btn-sm btn-soft-info" data-bs-toggle="modal" data-bs-target="#ModalNewDriver"><i class="fa fa-bus me-2"></i>New driver</button>
            <button type="button" class="btn btn-soft-danger btn-sm" onclick="$('input, textarea, select').val('');">Clear all fields</button>
             <button type="button" id="LoadingButton" class="btn btn-soft-light btn-sm"><div class="spinner-border spinner-border-sm text-info" role="status"></div></button>
        </div>
        <!--end card-header-->
        <div class="card-body">
            <form id="form-horizontal" class="form-horizontal form-wizard-wrapper" autocomplete="off">
            <input type="text" name="Id" id="Id" value="" hidden>
                <h3>Basic info</h3>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6"> <span class="text-dark"><b><i data-feather="map-pin"></i> Origin information</b></span>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                <label class="mb-1"><i class="fa fa-user"></i> Origin customer name<b class="text-danger">*</b></label>
                                    <div class="input-group">
                                        <select id="IdCustomerOrigin" name="IdCustomerOrigin" class="select2 form-control mb-3 custom-select originInput" onchange="onchangeOriginCustomer()">
                                                <option value="" selected>Select a origin customer</option>
                                                <?php foreach($CustomerList  as $key => $value): ?>
                                                    <option value="<?= $value['Id']; ?>"> <?= $value['Customer']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                            <button class="btn btn-dark" type="button" id="SearchCustomerName"><i class="ti ti-reload"></i></button>
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
                                        <select  id="IdCustomerDestination" name="IdCustomerDestination" class="select2 form-control mb-3 custom-select DestinationInput" onchange="onchangeDestinationCustomer()">
                                                <option value="" selected>Select a destination customer</option>
                                                <?php foreach($CustomerList  as $key => $value): ?>
                                                    <option value="<?= $value['Id']; ?>"><?= $value['Customer']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <button class="btn btn-dark" type="button" id="SearchDestinationCustomer"><i class="ti ti-reload"></i></button>
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
                                    <div class="col-md-12" >
                                        <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Origin address<b class="text-danger">*</b></label>
                                        <input style="display:none;" />
                                        <input id="OriginAddress" name="OriginAddress" type="text" class="form-control originInput" placeholder="Ex. 12141 Pembroke Rd,..."  maxlength="200" minlength="10">
                                    </div>
                                    <!-- end row -->
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4" >
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City<b class="text-danger">*</b></label>
                                                <input type="text" style="display:none;" />
                                                <input id="OriginCity" name="OriginCity" type="text"  class="form-control originInput pac-target-input" placeholder="City" minlength="2" maxlength="80" required>
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4" >
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State<b class="text-danger">*</b></label>
                                                <input style="display:none;" />
                                                <input autocomplete="off" id="OriginState" name="OriginState" type="text"  class="form-control originInput" placeholder="State" minlength="1" maxlength="25" required>
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                                                <input style="display:none;" />
                                                <input autocomplete="off" id="OriginZip" name="OriginZip" type="text"  class="form-control originInput" placeholder="00000" maxlength="20">
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
                                                <label class="mb-1"><i class="fa fa-mobile"></i> Phone #1<b class="text-danger">*</b></label>
                                                <input id="OriginPhone1" name="OriginPhone1" type="text" class="form-control originInput phone" placeholder="(555) 555-5555" minlength="4" maxlength="16" required>
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone #2</label>
                                                    <input style="display:none;" />
                                                <input autocomplete="off" id="OriginPhone2" name="OriginPhone2" type="text" class="form-control originInput phone" placeholder="(555) 555-5555">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-envelope"></i> Email</label>
                                                <input style="display:none;" />
                                                <input autocomplete="off" id="OriginEmail" name="OriginEmail" type="email" class="form-control originInput" placeholder="cus@domain.com">
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1"><i class="fa fa-sticky-note"></i> Note</label>
                                        <textarea id="OriginNote" name="OriginNote" class="form-control originInput" placeholder="Opcional information" maxlength="300" rows="3"></textarea>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Destination address<b class="text-danger">*</b></label>
                                            <input style="display:none;" />
                                            <input id="DestinationAddress" name="DestinationAddress" type="text" class="form-control DestinationInput" placeholder="Ex. 1600 Pennsylvania..." minlength="10" maxlength="300" required>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City<b class="text-danger">*</b></label>
                                                <input id="DestinationCity" name="DestinationCity" type="text" class="form-control DestinationInput" placeholder="City" minlength="4" maxlength="80" required>
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State<b class="text-danger">*</b></label>
                                                <input id="DestinationState" name="DestinationState" type="text"  class="form-control DestinationInput" placeholder="State" minlength="1" maxlength="30" required>
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                            <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                                                <input id="DestinationZip" name="DestinationZip" type="text" class="form-control DestinationInput" placeholder="00000">
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
                                                <label class="mb-1"><i class="fa fa-mobile"></i> Phone #1<b class="text-danger">*</b></label>
                                                <input id="DestinationPhone1" name="DestinationPhone1" type="text"  class="form-control DestinationInput phone" placeholder="(555) 555-5555" minlength="4" maxlength="16" required>
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone #2</label>
                                                <input id="DestinationPhone2" name="DestinationPhone2" type="text" class="form-control DestinationInput phone" placeholder="(555) 555-5555">
                                            </div>
                                            <!-- end row -->
                                            <div class="col-md-4">
                                                <label class="mb-1"><i class="fa fa-envelope"></i> Email</label>
                                                <input id="DestinationEmail" name="DestinationEmail" type="email" class="form-control DestinationInput" placeholder="cus@domain.com">
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1"><i class="fa fa-sticky-note"></i> Note</label>
                                        <textarea id="DestinationNote" name="DestinationNote" class="form-control DestinationInput" maxlength="300" placeholder="Optional information" rows="3"></textarea>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <br>
                            </div>
                        </div>
                </fieldset>
                <!--end fieldset-->
                <h3>Vehicles</h3>
                <fieldset>
                    <div class="row">
                    <div class="col-md-12"> 
                    <span class="text-dark"><b><i data-feather="file-text"></i> Vehicles to order</b></span>
                            <hr>
                            </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-1"><b>Pick up date</b><b class="text-danger">*</b></label>
                                            <input id="PickUpDate" name="PickUpDate" type="text" class="form-control inputDate" placeholder="mm/dd/yyyy" minlength="8" required>
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-6">
                                            <label class="mb-1"><b>Delivery date</b><b class="text-danger">*</b></label>
                                            <input id="DeliveryDate" name="DeliveryDate" type="text" class="form-control inputDate" placeholder="mm/dd/yyyy" minlength="8" required>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label class="mb-1"><b>Order date (Today)</b></label>
                                            <input id="PickUpOrderDateDate" name="OrderDate" type="text"  placeholder="mm/dd/yyyy" class="form-control" value="<?= date('m/d/Y'); ?>" readonly>
                                        </div>
                                        <!-- end row -->
                                        <div class="col-md-6">
                                            <label class="mb-1"><b>Order status</b><b class="text-danger">*</b></label>
                                            <select  id="OrderStatusID" name="OrderStatusID" class="form-control" readonly>
                                                <?php foreach($OrderStatusList  as $key => $value): ?>
                                                <option value="<?= $value['Id']; ?>"> <?= $value['Status']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <button title="Refresh brand and model list" data-tippy-size="large" class="btn btn-sm btn-dark tippy-btn" type="button" id="SearchVehicles"><i class="ti ti-reload"></i></button>
                                    <button type="button" onclick="AddVehicleList()" class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus"></i> Add vehicles</button>
                                </div>
                                <!--end card-header-->
                                <div class="card-body">
                                    <div class="repeater-default">
                                        <div data-repeater-list="car">
                                            <div data-repeater-item="">
                                                <div class="form-group row d-flex align-items-end">
                                                    <div class="row">

                                                    <div class="row registroVehiculo" id="templateVehiculo" style="padding-bottom:20px !important" hidden>

                                                        <div class="col-sm-2">
                                                            <label class="mb-1 text-danger"><b>Brand</b></label>
                                                            <select  name="Brand" onchange="GetModelsByBrand(this)" class="select2 form-control mb-3 custom-select BrandVehicle vehicleList">
                                                                <option value="">Select brand</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <label class="mb-1 text-danger"><b>Model</b></label>
                                                            <select  name="Model" class="select2 form-control mb-3 custom-select ModelVehicle vehicleList">
                                                                <option value="">Select model</option>
                                                            </select>
                                                        </div>

                                                            <!--end col-->
                                                         <div class="col-sm-1">
                                                            <label class="mb-1 text-danger"><b>Year</b></label>
                                                            <input type="text"  name="Year"  minlength="4" maxlength="5" class="form-control YearVehicle vehicleList" placeholder="">
                                                        </div>

                                                              <!-- end row -->
                                                         <div class="col-sm-1">
                                                            <label class="mb-1 text-danger"><b>Color</b></label>
                                                            <select  name="Color" class="form-control ColorVehicle vehicleList">
                                                            <option value="">Colors</option>
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

                                                        <div class="col-sm-1" >
                                                            <label class="mb-1 text-danger"><b>Carrier</b></label>
                                                            <select  name="CarrierType" class="form-control CarrierTypeVehicle vehicleList">
                                                            <option value="">Carriers</option>
                                                                <option value="Open">Open</option>
                                                                <option value="Enclosed">Enclosed</option>
                                                            </select>
                                                        </div>

                                                

                                                        <div class="col-sm-1" >
                                                            <label class="mb-1 text-danger"><b>Condition</b></label>
                                                            <select  name="ConditionVehicle" class="form-control ConditionVehicle vehicleList">
                                                                <option value="">Conditions</option>
                                                                <option value="Running">Running</option>
                                                                <option value="Non-running">Non-running</option>
                                                            </select>
                                                        </div>


                                                        <div class="col-sm-3">
                                                        <label class="mb-1"><b>Vin</b></label>
                                                            <div class="input-group">
                                                                <input type="text" name="Vin" class="form-control VinVehicle vehicleList" style="text-transform:uppercase" maxlength="20">
                                                                <button type="button" title="Delete vehicle" onclick="EliminarVehiculo(this)"  class="btn btn-outline-danger"> <span class="far fa-trash-alt me-1"></span> </button>
                                                            </div>
                                                        </div>

                                                        <!--end col-->

                                                        </div>

                                                 
                                                        <!--- HASTA AQUI-->
                                                        <div class="col-md-12" id="contentVehicle" style="overflow-y: auto; height:210px"></div>
                                                        <hr>
                                                        <p class="text-secondary"><i class="fa fa-trash text-danger"></i>
                                                            Don't delete the first row.</p>
                                                            <p class="text-secondary"><i class="fa fa-info text-warning"></i>
                                                            When you refresh the list of cars, the selected ones are cleared.</p>
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
                </fieldset>
                <!--end fieldset-->
                <h3>Payment</h3>
                <fieldset>

<div class="row">
    <div class="col-md-6"> <span class="text-dark"><b><i data-feather="credit-card"></i> Credit Card info</b></span>
        <hr>
        <div class="row">	

            <div class="col-md-6">
                <label class="mb-1"> Card holder name<b class="text-danger">*</b></label>
                <input type="text" class="form-control" name="CardHolderName" id="CardHolderName" style="text-transform:uppercase" maxlength="60" minlength="2" required>
            </div>

            <div class="col-md-6">
                        <label class="mb-1">Reference</label>
                        <input id="Reference" name="Reference" type="text" class="form-control" placeholder="0000000" maxlength="50">
            </div>

            <!-- end row -->
        </div>
        <br>
    </div>
    <!--end col-->
    <div class="col-md-6"> <span class="text-dark"><b><i data-feather="dollar-sign"></i>
                 Customer payment </b></span>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label class="mb-1"><b>Total</b><b class="text-danger">*</b></label>
                <input type="text" class="form-control inputNumber" name="Total" id="Total"  placeholder="$0000" value="0" required>
            </div>
            <div class="col-md-6">
                <label class="mb-1"><b>Deposit</b><b class="text-danger">*</b></label>
                <input id="Deposit" name="Deposit" type="text" class="form-control inputNumber" placeholder="$0000" value="0" required>
            </div>
            <!-- end row -->
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
                <div class="row">
                    <div class="col-md-5">
                        <label class="mb-1"><i class="fa fa-credit-card"></i> Credit card number<b class="text-danger">*</b></label>
                        <input id="CreditCard" name="CreditCard" type="text" class="form-control" placeholder="#### #### #### ####" minlength="8" required>
                    </div>
                    <!-- end row -->
                    <div class="col-md-3">
                        <label class="mb-1">Expiration date<b class="text-danger">*</b></label>
                        <input id="ExpDate" name="ExpDate" type="text" class="form-control" placeholder="00/00" minlength="5" required>
                    </div>
                    <!-- end row -->
                    <div class="col-md-4">
                        <label class="mb-1">CVV<b class="text-danger">*</b></label>
                        <input id="Cvv" name="Cvv" type="text" class="form-control"  placeholder="000" maxlength="5" minlength="3" required>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Billing address<b class="text-danger">*</b></label>
                        <input style="display:none;" />
                        <input id="BillingAddress" name="BillingAddress" type="text" class="form-control" placeholder="Ex. 12141 Pembroke Rd...." autocomplete="disabled" maxlength="200" required>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                        <label class="mb-1"><i class="fa fa-map-marker-alt"></i> City<b class="text-danger">*</b></label>
                            <input id="BillingCity" name="BillingCity" type="text" class="form-control BillingInput" placeholder="City" maxlength="80">
                        </div>
                        <!-- end row -->
                        <div class="col-md-4">
                        <label class="mb-1"><i class="fa fa-map-marker-alt"></i> State<b class="text-danger">*</b></label>
                            <input id="BillingState" name="BillingState" type="text" class="form-control BillingInput" placeholder="State" maxlength="25">
                        </div>
                        <!-- end row -->
                        <div class="col-md-4">
                        <label class="mb-1"><i class="fa fa-map-marker-alt"></i> Zip Code</label>
                            <input id="BillingZipCode" name="BillingZipCode" type="text" class="form-control BillingInput" placeholder="00000" maxlength="10">
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
                        <label class="mb-1"><i class="fa fa-mobile"></i> Phone number #1<b class="text-danger">*</b></label>
                        <input id="Tel1" name="Tel1" type="text" class="form-control phone" placeholder="(555) 555-5555" maxlength="15">
                    </div>
                    <!-- end row -->
                    <div class="col-md-4">
                        <label class="mb-1"><i class="fa fa-phone-alt"></i> Phone number #2</label>
                        <input id="Tel2" name="Tel2" type="text" class="form-control phone" placeholder="(555) 555-5555" maxlength="15">
                    </div>
                    <!-- end row -->
                    <div class="col-md-4">
                        <label class="mb-1"><i class="fa fa-envelope"></i> Email</label>
                        <input id="PaymentEmail" name="PaymentEmail" type="email"  class="form-control" placeholder="us@domain.com" maxlength="50">
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-6">
    <div class="row">
            <div class="col-md-12">
                <label class="mb-1"><i class="fa fa-sticky-note"></i> Payment note</label>
                <textarea id="PaymentNote" name="PaymentNote" class="form-control" placeholder="Opcional information" rows="5" maxlength="200"></textarea>
            </div>
            <!-- end row -->
        </div>
    </div>

</div>
</fieldset>

<h3>Confirm order</h3>
                <fieldset>
                    <div class="row">
                        <div class="col-lg-12" id="zonaPrint">
                            <div class="card">
                            <div class="card-body">
                                    <img src="assets/images/logopdf1.png" alt="Logo" id="imgLogoPDF" class="rounded float-start" width="30%">

                                    <div class="rounded float-end">
                                        <br>
                                        <h6 class="card-text mb-0 text-muted"><i class="mdi mdi-web text-dark"></i> <?= URL_WEBSITE ?></h6>
                                        <h6 class="card-text mb-0 text-muted"><i class="mdi mdi-phone text-dark"></i> <?= TELEFONO ?></h6>
                                        <h6 class="card-text mb-0 text-muted"><i class="mdi mdi-map-marker text-dark"></i> <?= DIRECCION ?></h6>
                                    </div>
                                </div>
                                <!--end card-body-->

                                <div class="card-body invoice-head">

                                    <div class="card"></div>
                                    <!--end card-->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <center><h6 style="padding-top: 8px;"><b>Order ID: </b><span class="OrderIDForm"></span> <b> | Order date: </b><span class="OrderDateForm">00/00/0000</span><b> | Pick up date: </b><span class="PickUpDateForm">00/00/0000</span><b> | Delivery date: </b><span class="DeliveryDateForm">00/00/0000</span></h6></center>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                        <h6 class="mb-0"><b>Origin: </b><span class="OriginNameForm"></span></h6>
                                                        <h6 class="mb-0"><b><i class="fa fa-phone-alt"></i> </b><span class="OriginPhone1Form"></span><span class="OriginPhone2Form"></span></h6>
                                                        <h6 class="mb-0"><b><i class="fa fa-envelope"></i> </b><span class="OriginEmailForm"></span></h6>
                                                        <h6 class="mb-0"><b><i class="fa fa-map-marker-alt"> </i> </b><span class="OriginAddressForm"></span></h6>
                                                </div>
                                            
                                                <div class="col">
                                                        <h6 class="mb-0"><b>Destination: </b><span class="DestinationNameForm"></span></h6>
                                                        <h6 class="mb-0"><b><i class="fa fa-phone-alt"></i> </b><span class="DestinationPhone1Form"></span> <span class="DestinationPhone2Form"></span></h6>
                                                        <h6 class="mb-0"><b><i class="fa fa-envelope"></i> </b><span class="DestinationEmailForm"></span></h6>
                                                        <h6 class="mb-0"><b><i class="fa fa-map-marker-alt"> </i> </b><span class="DestinationAddressForm"></span></h6>
                                                </div>
                                            </div>
                                     </div>
                                  
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                
                                    <div class="row">
                                    
                                        <div class="col-lg-12">
                                            <div class="table-responsive project-invoice">
                                                <table class="table table-bordered mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th><b>Brand</b></th>
                                                            <th><b>Model</b></th>
                                                            <th><b>Color</b></th>
                                                            <th><b>Year</b></th>
                                                            <th><b>Condition</b></th>
                                                            <th><b>Carrier type</b></th>
                                                        </tr>
                                                        <!--end tr-->
                                                    </thead>
                                                    <tbody class="ListVehiclesPDF">
                                                        <!--end tr-->
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                            <td colspan="2" class="border-0"></td>
                                                            <th colspan="2" class="border-0"></th>
                                                            <td class="border-0 font-14 text-dark"><b></b></td>
                                                            <td class="border-0 font-14 text-dark"><b></b>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-secondary text-white">
                                                            <th colspan="2" class="border-0"></th>
                                                            <th colspan="2" class="border-0"></th>
                                                            <td class="border-0 font-14" style="text-align:right !important"><b>Deposit</b></td>
                                                            <td class="border-0 font-14"><b class="DepositForm">$00.00</b></td>
                                                        </tr>

                                                        <tr class="bg-black text-white">
                                                            <th colspan="2" class="border-0"></th>
                                                            <th colspan="2" class="border-0"></th>
                                                            <td class="border-0 font-14" style="text-align:right !important"><b>Total</b></td>
                                                            <td class="border-0 font-14"><b class="TotalForm">$00.00</b></td>
                                                        </tr>
                                                      
                                                    </tfoot>
                                                </table>
                                                <br>

                                             
                                                <!--end table-->
                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end col-->
                                    </div>

                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive project-invoice">
                                                    <table class="table mb-0" border="0" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th style="border-style: none;"><b><i class="fa fa-money-check"></i> Payment information</b></th>
                                                            <tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-style: none;">
                                                                    <h6 class="mt-0 mb-1 font-14"><b>Card holder name</b></h6>
                                                                    <p class="mb-0 text-muted CardHolderNameForm"></p>
                                                                </td>

                                                                <td style="border-style: none;"> 
                                                                    <h5 class="mt-0 mb-1 font-14"><b>Credit card number</b></h5>
                                                                    <p class="mb-0 text-muted CreditCardNumberForm"></p>
                                                                </td>

                                                                <td style="border-style: none;">
                                                                    <h5 class="mt-0 mb-1 font-14"><b>City</b></h5>
                                                                    <p class="mb-0 text-muted BillingCityForm"></p>
                                                                </td>

                                                                <td style="border-style: none;">
                                                                    <h5 class="mt-0 mb-1 font-14"><b>Billing address</b></h5>
                                                                    <p class="mb-0 text-muted BillingAddressForm"></p>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td style="border-style: none;">
                                                                    <h5 class="mt-0 mb-1 font-14"><b>Expiration date</b></h5>
                                                                    <p class="mb-0 text-muted ExperationDateForm"></p>
                                                                </td>

                                                                <td style="border-style: none;">
                                                                    <h5 class="mt-0 mb-1 font-14"><b>Cvv</b></h5>
                                                                    <p class="mb-0 text-muted CVVForm"></p>
                                                                </td>

                                                                <td style="border-style: none;">
                                                                    <h5 class="mt-0 mb-1 font-14"><b>State</b></h5>
                                                                    <p class="mb-0 text-muted BillingStateForm"></p>
                                                                </td>

                                                                <td style="border-style: none;">
                                                                    <h5 class="mt-0 mb-1 font-14"><b>Zip code</b></h5>
                                                                    <p class="mb-0 text-muted BillingZipCodeForm"></p>
                                                                </td>

                                                            </tr>

                                                            <!--end tr-->
                                                        </tbody>   
                                                    </table>
                                        </div>
                                    </div>
                                    
                                    </div>

                                    <div class="row">
                                         <div class="col-md-8" style="width: 900px;">
                                            <div class="card-body">
                                                <span class="d-flew justify-content OriginDestinationNotesForm"></span>
                                            </div>
                                         </div>
                                    </div>
                                    <!--end row-->
                                    <hr>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                                            <div class="text-center text-muted"><small class="font-12">Thank you very much for doing business with us.</small></div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12 col-xl-4">
                                            <div class="float-end d-print-none"> 
                                            <a href="index.php?c=Orders&a=Index" class="btn btn-success btn-sm" id="ButtonExit"><i class="fa fa-document"></i> Go to Order List</a> 
                                            <button id="BtnPrintOrder" onclick="printJS({printable: 'zonaPrint', type:'html', css: ['assets/css/bootstrap.min.css','assets/css/app.min.css','assets/css/icons.min.css','assets/css/print.css' ],  style: '@page {margin: 4mm}', scanStyles: false})" type="button" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </fieldset>
                <!--end fieldset-->
            </form>
            <!--end form-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
<!--end modal-body-->



<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOHEjweqW61WAqGaXKZzuQS7sbOakgpT0&libraries=places">
</script>
<script src="plugins/select2/select2.min.js"></script>
<script src="plugins/jquery-steps/jquery.steps.min.js"></script>

<script src="assets/js/orders.js"></script>
<script src="assets/js/jquery.mask.js"></script>

<script type="text/javascript"> 
  $("#LoadingButton").hide();
  $("#ButtonExit").hide();
  $("#BtnPrintOrder").hide();

$(document).ready(function($){

    $('.phone').mask("(000) 000-0000", {placeholder: "(000) 000-0000"});
    $("#Cvv").mask('0000');
    $("#CreditCard").mask("0000 0000 0000 0000");

    $('.inputNumber').on("keypress blur change",function() {
            $('.inputNumber').mask("#,##0.00", { reverse: true });
        });


    $('.inputDate').mask("00/00/0000", {placeholder: "MM/DD/YYYY"});

    $('#ExpDate').mask("AB/CD", {
      placeholder: "MM/YY",
      translation: {
        A: { pattern: /[0-9]/ },
        B: { pattern: /[0-9]/ },
        C: { pattern: /[2-9]/ },
        D: { pattern: /[0-9]/ }
      },
      onKeyPress: function(a, b, c, d) {
        if (!a) return;
        let m = a.match(/(\d{1})/g);
        if (!m) return;
        if (parseInt(m[0]) === 0) {
          d.translation.B.pattern = /[1-9]/;
        } else if (parseInt(m[0]) === 1) {
          d.translation.B.pattern = /[0-2]/;
        } else if (parseInt(m[0]) > 1) {
          c.val("0" + m[0] + "/");
        } else {
          d.translation.B.pattern = /[0-9]/;
        }
        let temp_value = c.val();
        c.val("");
        c.unmask().mask("AB/CD", d);
        c.val(temp_value);
      }
    }).keyup();

    $("#DeliveryDate").change(function(){

        let PickUpOrderDateDate = new Date($("#PickUpOrderDateDate").val());
        let DeliveryDate        = new Date($("#DeliveryDate").val());
        let MonthDeliveryDate = $("#DeliveryDate").val().substr(0,2);

        let PickUpDate = new Date($("#PickUpDate").val());
        let MonthPickUpDate = $("#PickUpDate").val().substr(0,2);

        if(MonthDeliveryDate > 12){
            $(".toast-error").html("(!) invalid format [Delivery date]");
            var myAlert2 = document.getElementById('toastError');
            var bsAlert2 = new bootstrap.Toast(myAlert2);
            bsAlert2.show();
        }

        if(MonthPickUpDate > 12){
            $(".toast-error").html("(!) invalid format [PickUp date]");
            var myAlert2 = document.getElementById('toastError');
            var bsAlert2 = new bootstrap.Toast(myAlert2);
            bsAlert2.show();
        }

        if(+DeliveryDate < +PickUpOrderDateDate){

            $(".toast-error").html("(!) The delivery date cannot be less than Today");
            var myAlert2 = document.getElementById('toastError');
            var bsAlert2 = new bootstrap.Toast(myAlert2);
            bsAlert2.show();
        }

        if(+DeliveryDate < +PickUpDate){

            $(".toast-error").html("(!) The delivery date cannot be less than Pick Up date");
            var myAlert2 = document.getElementById('toastError');
            var bsAlert2 = new bootstrap.Toast(myAlert2);
            bsAlert2.show();
       }


        });

        $("#PickUpDate").change(function(){

        let PickUpOrderDateDate = new Date($("#PickUpOrderDateDate").val());
        let DeliveryDate        = new Date($("#DeliveryDate").val());
        let MonthDeliveryDate   = $("#DeliveryDate").val().substr(0,2);

        let PickUpDate = new Date($("#PickUpDate").val());
        let MonthPickUpDate = $("#PickUpDate").val().substr(0,2);

        if(MonthDeliveryDate > 12){
            $(".toast-error").html("(!) invalid format [Delivery date]");
            var myAlert2 = document.getElementById('toastError');
            var bsAlert2 = new bootstrap.Toast(myAlert2);
            bsAlert2.show();
        }

        if(MonthPickUpDate > 12){
            $(".toast-error").html("(!) invalid format [PickUp date]");
            var myAlert2 = document.getElementById('toastError');
            var bsAlert2 = new bootstrap.Toast(myAlert2);
            bsAlert2.show();
        }

        if(+DeliveryDate < +PickUpOrderDateDate){

            $(".toast-error").html("(!) The delivery date cannot be less than Today");
            var myAlert2 = document.getElementById('toastError');
            var bsAlert2 = new bootstrap.Toast(myAlert2);
            bsAlert2.show();
        }

        if(+DeliveryDate < +PickUpDate){

            $(".toast-error").html("(!) The delivery date cannot be less than Pick Up date");
            var myAlert2 = document.getElementById('toastError');
            var bsAlert2 = new bootstrap.Toast(myAlert2);
            bsAlert2.show();
       }

             let DayDeliveryDate = $("#DeliveryDate").val().substr(3, 2);
            let DayPickUpDate = $("#PickUpDate").val().substr(3, 2);
            
            if (DayPickUpDate > 31) {
                $(".toast-error").html("(!) Invalid format [PickUp date]");
                var myAlert2 = document.getElementById('toastError');
                var bsAlert2 = new bootstrap.Toast(myAlert2);
                bsAlert2.show();
            }

            if (DayDeliveryDate > 31) {
                $(".toast-error").html("(!) Invalid format [Delivery date]");
                var myAlert2 = document.getElementById('toastError');
                var bsAlert2 = new bootstrap.Toast(myAlert2);
                bsAlert2.show();
            }
        }); 
});

function GetModelsByBrand(e){

    let Brand = $(e).val();

    if(Brand != ""){

        $.ajax({
            type: 'POST',
            url: "index.php?c=vehicles&a=GetModelsByBrand",
            data: {'Brand':Brand},
            beforeSend: function() {
                $("#LoadingButton").show();
        }}).then(function(response) {

            if(response){
                 
                var newOptions = JSON.parse(response);

                var count = $('.BrandVehicle:not(:hidden)').closest('div').next().find('.ModelVehicle:not(:hidden)').length-1;
                var htmlSelect = $('.BrandVehicle:not(:hidden)').closest('div').next().find('.ModelVehicle:not(:hidden)')[count];
                $(htmlSelect).empty();

                var optionDefault = new Option("Select the model", "", true, true);
                 $(htmlSelect).append(optionDefault);

                 newOptions.forEach(element => {
                    var optionBucle = new Option(element.Model, element.Model, true, true);
                    $(htmlSelect).append(optionBucle); 
                });

                 $(htmlSelect).val("").trigger('change');
                 $("#LoadingButton").hide();
            }

          
        })
    }
}

$("#form-horizontal").steps({
    saveState: true,
    autoFocus: true,
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slide",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        switch (newIndex) {
            case 1:
                $("#ManualUpdateButton").show();
                if($("#IdCustomerOrigin").val() !="" && $("#OriginAddress").val() != "" &&  $("#OriginCity").val() != "" && $("#OriginState").val() != "" &&  $("#OriginPhone1").val() != "" && $("#IdCustomerDestination").val() !="" && $("#DestinationAddress").val() != "" &&  $("#DestinationCity").val() != "" && $("#DestinationState").val() != "" &&  $("#DestinationPhone1").val() != ""){
                      return true;
                }else{
                   
                    $(".toast-error").html("(*) empty required fields [Step 1]");
                      var myAlert = document.getElementById('toastError');
                      var bsAlert = new bootstrap.Toast(myAlert);
                      bsAlert.show();

                    return false;
                }
                
                break;

                case 2:
                  
                    $("#ManualUpdateButton").show();

                        let continueCase = true;
                        let vehicleEmpty = false;

                        var Vin1, Brand1, Model1, ConditionVehicle1, CarrierType1, Color1, Year1, Vin1 = "";

                        if($(".registroVehiculo").is(":visible")){

                            $(".registroVehiculo:visible").each(function(){

                                Brand1       = $(this).find("select[name='Brand']").val();
                                Model1              = $(this).find("select[name='Model']").val();
                                Color1              = $(this).find("select[name='Color']").val();
                                Year1               = $(this).find("input[name='Year']").val();
                                ConditionVehicle1   = $(this).find("select[name='ConditionVehicle']").val();
                                CarrierType1 = $(this).find("select[name='CarrierType']").val();

                                if(Brand1 != "" && Model1 != "" && Color1 != "" && ConditionVehicle1 != "" && Year1 != "" && CarrierType1 != ""){
                                }else{
                                    vehicleEmpty = true;
                                    return;
                                }

                                });

                        }else{
                            vehicleEmpty = true;
                        }
                        
                            if(vehicleEmpty){
                               
                                  $(".toast-error").html("(!) Check vehicle list. Field required empty");
                                    var myAlert2 = document.getElementById('toastError');
                                    var bsAlert2 = new bootstrap.Toast(myAlert2);
                                    bsAlert2.show();
                                    continueCase = false;
                             }else{
                                let continueCase = true;
                             }

                        let PickUpOrderDateDate = new Date($("#PickUpOrderDateDate").val());
                        let DeliveryDate        = new Date($("#DeliveryDate").val());
                        let MonthDeliveryDate = $("#DeliveryDate").val().substr(0,2);

                        let PickUpDate = new Date($("#PickUpDate").val());
                        let MonthPickUpDate = $("#PickUpDate").val().substr(0,2);

                        if($("#DeliveryDate").val() == "" || $("#PickUpDate").val() == ""){
                            $(".toast-error").html("(!) PickUpDate or DeliveryDate empty");
                            var myAlert2 = document.getElementById('toastError');
                            var bsAlert2 = new bootstrap.Toast(myAlert2);
                            bsAlert2.show();
                            continueCase = false;
                        }

                        if(MonthDeliveryDate > 12){
                            $(".toast-error").html("(!) invalid format [Delivery date]");
                            var myAlert2 = document.getElementById('toastError');
                            var bsAlert2 = new bootstrap.Toast(myAlert2);
                            bsAlert2.show();
                            continueCase = false;
                        }

                        if(MonthPickUpDate > 12){
                            $(".toast-error").html("(!) invalid format [PickUp date]");
                            var myAlert2 = document.getElementById('toastError');
                            var bsAlert2 = new bootstrap.Toast(myAlert2);
                            bsAlert2.show();
                            continueCase = false;
                        }

                        if(+DeliveryDate < +PickUpOrderDateDate){

                            $(".toast-error").html("(!) The delivery date cannot be less than Today");
                            var myAlert2 = document.getElementById('toastError');
                            var bsAlert2 = new bootstrap.Toast(myAlert2);
                            bsAlert2.show();
                           continueCase = false;
                        }

                        if(+PickUpDate < +PickUpOrderDateDate){

                        $(".toast-error").html("(!) The PickUpDate cannot be less than Today");
                        var myAlert2 = document.getElementById('toastError');
                        var bsAlert2 = new bootstrap.Toast(myAlert2);
                        bsAlert2.show();
                        continueCase = false;
                      }

                        if(+DeliveryDate < +PickUpDate){

                            $(".toast-error").html("(!) The delivery date cannot be less than Pick Up date");
                            var myAlert2 = document.getElementById('toastError');
                            var bsAlert2 = new bootstrap.Toast(myAlert2);
                            bsAlert2.show();
                            continueCase = false;
                         }

                         if(+PickUpDate > +DeliveryDate){

                            $(".toast-error").html("(!) The PickUp Date cannot be greater than Delivery Date");
                            var myAlert2 = document.getElementById('toastError');
                            var bsAlert2 = new bootstrap.Toast(myAlert2);
                            bsAlert2.show();
                            continueCase = false;
                         }
                         let DayDeliveryDate = $("#DeliveryDate").val().substr(3, 2);
                        let DayPickUpDate = $("#PickUpDate").val().substr(3, 2);
                    
                    if (DayPickUpDate > 31) {
                        $(".toast-error").html("(!) Invalid format [PickUp date]");
                        var myAlert2 = document.getElementById('toastError');
                        var bsAlert2 = new bootstrap.Toast(myAlert2);
                        bsAlert2.show();
                        continueCase = false;
                    }

                    if (DayDeliveryDate > 31) {
                        $(".toast-error").html("(!) Invalid format [Delivery date]");
                        var myAlert2 = document.getElementById('toastError');
                        var bsAlert2 = new bootstrap.Toast(myAlert2);
                        bsAlert2.show();
                        continueCase = false;
                    }


                    if(continueCase == true){
                        return true;
                    }else{
                        return false;
                    }
                 
                    break;

                    case 3:
                     $("#ManualUpdateButton").show();
                    let continueCase3 = true;
                   
                    if($("#CardHolderName").val() != "" &&  $("#ExpDate").val() != "" && $("#CreditCard").val() != ""  &&  $("#Cvv").val() != ""  &&  $("#BillingAddress").val() != "" &&  $("#BillingCity").val() != "" && $("#BillingState").val() != "" &&  $("#Tel1").val() != "" &&  $("#Total").val() != "0" && $("#Deposit").val() != "0"){

                       let ExpDate =  $("#ExpDate").val();
                       let month = ExpDate.substr(0,2);
                       let year  = ExpDate.substr(3,2);
                       let day   = 28;

                       ExpDate = month+'/'+day+'/'+year;
                       let ExpDateConverted    = new Date(ExpDate);
                       //ExpDateConverted = ExpDateConverted.toLocaleDateString("en-US");

                       let OrderDate = new Date($("#PickUpOrderDateDate").val());
                      // OrderDate = OrderDate.toLocaleDateString("en-US");

                       if($("#ExpDate").val().length != 5){
                       
                        $(".toast-error").html("(!) Expiration date of credit card invalid");
                        var myAlert5 = document.getElementById('toastError');
                        var bsAlert5 = new bootstrap.Toast(myAlert5);
                        bsAlert5.show();
                        continueCase3 = false;    
                        return false;

                       }


                    if(ConvertNumber($("#Deposit").val()) > ConvertNumber($("#Total").val())){

                        $(".toast-error").html("(!) the deposit is greater than the total [Step 3]");
                        var myAlert4 = document.getElementById('toastError');
                        var bsAlert4 = new bootstrap.Toast(myAlert4);
                        bsAlert4.show();
                        continueCase3 = false;
                        return false;

                    }

                    if($("#ExpDate").val().length == 5){

                        if (+ExpDateConverted <= +OrderDate) {

                            $(".toast-error").html("(!) ExpDate of credit card less than today");
                            var myAlert6 = document.getElementById('toastError');
                            var bsAlert6 = new bootstrap.Toast(myAlert6);
                            bsAlert6.show();
                            continueCase3 = false;
                            return false;

                         }
                    }
                    

                } else{

                    $(".toast-error").html("(*) empty required fields [Step 3]");
                    var myAlert5 = document.getElementById('toastError');
                    var bsAlert5 = new bootstrap.Toast(myAlert5);
                    bsAlert5.show();
                    continueCase3 = false;
                    return false;
                }

                if(continueCase3){
                    loadInfoPDF1();
                     return true;
                }

                break;

            default:
                return true;
                break;
        }

    }, onContentLoaded: function() {},
            onInit: function() {},
            labels: { cancel: "Cancel", current: "current step:", pagination: "Pagination", finish: "Save order", next: "Next Step", previous: "Previous Step", loading: "Loading ..." },         
            onFinishing: function(event, currentIndex) {
                $("#form-horizontal .actions a[href='#finish']").hide();
                saveOrder();
                $("#BtnPrintOrder").show();
                return true;
            }
});

//Execute select2 functions 
//GetListCustomer();
GetListVehicles();

function AddVehicleList() {

    $('#templateVehiculo').find(".select2").each(function(index) {
        if ($(this).data('select2')) {
            $(this).select2('destroy');
        }
    });

   var clonado =  $('#templateVehiculo').clone().val('');
   clonado.removeAttr('hidden');
   clonado.appendTo("#contentVehicle");
   $(clonado).find(".select2").select2({ width:'100%'});

}


function EliminarVehiculo(e) {
    $(e).parent().parent().parent().remove();
}


//Input Search Select2
$(document).ready(function() {
   
    $("body").addClass("enlarge-menu");
    $(".steps, .actions").addClass("d-print-none");
    $(".ListVehiclesPDF").html("");   
     $('.select2').select2({width:'94%'});
   
    $(".originInput, .DestinationInput").change(function() {
        $(this).css("border-color", "#A6A6A6");
    });

});

$("#SearchVehicles").click(function() {
    GetListVehicles();
});

//Destination Customer
$("#SearchDestinationCustomer, #SearchCustomerName").click(function() {
    GetListCustomer();
});


function GetListVehicles() {

    $.ajax({
        type: 'POST',
        url: "index.php?c=vehicles&a=GetListVehicles",
        beforeSend: function() {
            $("#LoadingButton").show();
    }}).then(function(response) {

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

        var optionDefault2 = new Option("Select model", "", true, true);
        $('.ModelVehicle').append(optionDefault2);
        $('.ModelVehicle').val("").trigger('change');   
        $(".toast-success").html("Wait 5 seconds...");
        var myAlert = document.getElementById('toastSuccess');
        var bsAlert = new bootstrap.Toast(myAlert);
        bsAlert.show(); 
        $("#LoadingButton").hide();
    });

}

function GetListCustomer() {

    var IdCustomerOriginTemp = $("#IdCustomerOrigin").val();
    var IdCustomerDestinationTemp = $("#IdCustomerDestination").val();

    $.ajax({
        type: 'POST',
        url: "index.php?c=customers&a=GetListCustomers",
        beforeSend: function() {
            $("#LoadingButton").show();
   
       }}).then(function(response) {

        $("#LoadingButton").hide();
        var data = JSON.parse(response);

        if (data.length > 0) {

            $('#IdCustomerOrigin, #IdCustomerDestination').empty();

            var optionDefault = new Option("Select origin customer", "", true, true);
            $('#IdCustomerOrigin, #IdCustomerDestination').append(optionDefault); 
      
            data.forEach(element => {
                var optionBucle = new Option(element.Customer, element.Id, true, true);
                $('#IdCustomerOrigin, #IdCustomerDestination').append(optionBucle); 
            });
                 
                 $(".toast-success").html("(!) Customer lists updated");
                var myAlert = document.getElementById('toastSuccess');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();

                $('#IdCustomerOrigin').val(IdCustomerOriginTemp).trigger('change');
                $("#IdCustomerDestination").val(IdCustomerDestinationTemp).trigger("change");
            
        }else{

                $(".toast-error").html("(x) Error to load customer list");
                var myAlert = document.getElementById('toastError');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();

                $('#IdCustomerOrigin').val("").trigger('change');
                $("#IdCustomerDestination").val("").trigger("change");
        }

      
        })
}

function loadInfoPDF1(){

    $(".OrderDateForm").text($("#PickUpOrderDateDate").val());
    $(".ListVehiclesPDF").html("");

    //Origin Info
    $(".OriginNameForm").html($("#IdCustomerOrigin :selected").text() != "" ? $("#IdCustomerOrigin :selected").text() : "<span class='text-danger'>Check origin customer name</span>");
    $(".OriginAddressForm").html($("#OriginAddress").val() != "" ? $("#OriginAddress").val() : "<span class='text-danger'>Check origin address</span>");

    $(".PickUpDateForm").html($("#PickUpDate").val() != "" ? $("#PickUpDate").val() : "<span class='text-danger'>Check pick up date</span>");
    $(".DeliveryDateForm").html($("#DeliveryDate").val() != "" ? $("#DeliveryDate").val() : "<span class='text-danger'>Check delivery date</span>");

    if($("#OriginZip").val() != ""){
        $(".OriginAddressForm").html($("#OriginAddress").val() != "" ? $("#OriginAddress").val() + "<br> Zip code: "+$("#OriginZip").val() :  "<span class='text-danger'>Check origin address</span>");
    }
   
    $(".OriginPhone1Form").html($("#OriginPhone1").val() != "" ? $("#OriginPhone1").val() : "<span class='text-danger'>Check origin phone1</span>");
    $(".OriginPhone2Form").html($("#OriginPhone2").val() != "" ? " / " + $("#OriginPhone2").val() : "");

     //Destination Info
    $(".DestinationNameForm").html($("#IdCustomerDestination :selected").text() != "" ? $("#IdCustomerDestination :selected").text() : "<span class='text-danger'>Check destination customer name</span>");
    
    $(".DestinationAddressForm").html($("#DestinationAddress").val() != "" ? $("#DestinationAddress").val() :  "<span class='text-danger'>Check destination address</span>");

    if($("#DestinationZip").val() != ""){
        $(".DestinationAddressForm").html($("#DestinationAddress").val() != "" ? $("#DestinationAddress").val() + "<br> Zip code: "+$("#DestinationZip").val() :  "<span class='text-danger'>Check destination address</span>");
    }
   
    $(".DestinationPhone1Form").html($("#DestinationPhone1").val() != "" ? $("#DestinationPhone1").val() :  "<span class='text-danger'>Check destination phone1</span>");
    $(".DestinationPhone2Form").html($("#DestinationPhone2").val() != "" ? " / " + $("#DestinationPhone2").val() : "");

    
    $(".OriginEmailForm").html($("#OriginEmail").val() != "" ? $("#OriginEmail").val() : "");
    $(".DestinationEmailForm").html($("#DestinationEmail").val() != "" ? $("#DestinationEmail").val() : "");

    //Vehicles Step info

    var Vin, Brand, Model, ConditionVehicle, CarrierType, Color, Year, Vin = "";
    var markup = "";

    $(".registroVehiculo").each(function(){
       
       Brand       = $(this).find("select[name='Brand']").val();
       Vin         = $(this).find("input[name^='Vin']").val();
       Model       = $(this).find("select[name='Model']").val();
       Color       = $(this).find("select[name='Color']").val();
       Year        = $(this).find("input[name='Year']").val();
       ConditionVehicle   = $(this).find("select[name='ConditionVehicle']").val();
       CarrierType = $(this).find("select[name='CarrierType']").val();

       if(Brand != "" && Model != ""){

        markup += "<tr>"
                     +"<td><h5 class='mt-0 mb-1 font-14'>"+Brand+"</h5><p class='mb-0 text-muted'>Vin "+Vin+"</p></td>"
                     +"<td>" + Model + "</td>"
                     +"<td>" + Color + "</td>"
                     +"<td>" + Year + "</td>"
                     +"<td>" + ConditionVehicle + "</td>"
                     +"<td>" + CarrierType + "</td>"
                     +"</tr>";
       }
       
      
    });

     $(".ListVehiclesPDF").append(markup);

     //Payment info
    $(".TotalForm").html($("#Total").val() != "" ? "US$ "+$("#Total").val() :  "<span class='text-danger'>Check total payment</span>");
    $(".DepositForm").html($("#Deposit").val() != "" ? "US$ "+$("#Deposit").val() :  "<span class='text-danger'>Check deposit payment</span>");
    $(".CardHolderNameForm").html($("#CardHolderName").val() != "" ? $("#CardHolderName").val() :  "<span class='text-danger'>Check card holder name</span>");
    $(".CreditCardNumberForm").html($("#CreditCard").val() != "" ? $("#CreditCard").val() :  "<span class='text-danger'>Check credit card number</span>");
    $(".ExperationDateForm").html($("#ExpDate").val() != "" ? $("#ExpDate").val() :  "<span class='text-danger'>Check experation date</span>");
    $(".CVVForm").html($("#Cvv").val() != "" ? $("#Cvv").val() :  "<span class='text-danger'>Check CVV code</span>");
  
    $(".BillingAddressForm").html($("#BillingAddress").val() != "" ? $("#BillingAddress").val() :  "<span class='text-danger'>Check billing address</span>");
    $(".BillingCityForm").html($("#BillingCity").val() != "" ? $("#BillingCity").val() :  "<span class='text-danger'>Check billing city</span>");
    $(".BillingStateForm").html($("#BillingState").val() != "" ? $("#BillingState").val() :  "<span class='text-danger'>Check billing state</span>");
    $(".BillingZipCodeForm").html($("#BillingZipCode").val() != "" ? $("#BillingZipCode").val() :  "");

    var OriginNote = "";
    var DestinationNote = "";
    var OriginDestinationNote = "";

    if($("#OriginNote").val() != ""){
        OriginNote ="<b class='font-14'>Origin notes:</b><br> "+$("#OriginNote").val()+"<br>";
    }

    if($("#DestinationNote").val() != ""){
        DestinationNote ="<b class='font-14'>Destination notes:</b></br> "+$("#DestinationNote").val();
    }

    OriginDestinationNote = OriginNote + "<br>" + DestinationNote;
    $(".OriginDestinationNotesForm").html(OriginDestinationNote != "" ? OriginDestinationNote :  "");
                                                  
}

function saveOrder(){

    vehiclesArray = new Array();

    $(".registroVehiculo").each(function(){
       
       Brand       = $(this).find("select[name='Brand']").val();
       Vin         = $(this).find("input[name^='Vin']").val();
       Model       = $(this).find("select[name='Model']").val();
       Color       = $(this).find("select[name='Color']").val();
       Year        = $(this).find("input[name='Year']").val();
       ConditionVehicle   = $(this).find("select[name='ConditionVehicle']").val();
       CarrierType = $(this).find("select[name='CarrierType']").val();
       
       if(Brand!=""){
           vehiclesArray.push({'Brand':Brand, 'Model':Model, 'Year':Year, 'Color':Color, 'ConditionVehicle':ConditionVehicle,'CarrierType':CarrierType, 'Vin':Vin  });
       }
});


    $.ajax({
        type: 'POST',
        url: "index.php?c=orders&a=SaveOrder",
        data: {'order': $("#form-horizontal").serialize(), 'vehicles': vehiclesArray},
         beforeSend: function() {
            $("#LoadingButton").show();
        },
        success: function(data) {
                
                if(data){

                    var response = JSON.parse(data);
                               
                    if(response.Error == false){

                        $(".OrderIDForm").html(response.OrderId);
                        $(".toast-success").html(response.Message);
                        var myAlert = document.getElementById('toastSuccess');
                        var bsAlert = new bootstrap.Toast(myAlert);
                        bsAlert.show();
                        setTimeout(() => { bsAlert.hide();}, 3000);
                        setTimeout(() => {
                            printJS({printable: 'zonaPrint', type:'html', css: ['assets/css/bootstrap.min.css','assets/css/app.min.css','assets/css/icons.min.css','assets/css/print.css' ],  style: '@page {margin: 4mm}', scanStyles: false});
                        }, 4000);

                    }else{

                        $(".toast-error").html(response.Message);
                        var myAlert = document.getElementById('toastError');
                        var bsAlert = new bootstrap.Toast(myAlert);
                        bsAlert.show();

                    }   
                    $("#ButtonExit").show();
                    $("#LoadingButton").hide();
                 
                }else{
                   // console.log(data);
                }
            }
        })
    }

function onchangeOriginCustomer(){

var CustomerOrigin = $("#IdCustomerOrigin").val();

if (CustomerOrigin != '') {

    $("#OriginPhone1, #OriginEmail,#OriginPhone2 ").css("border-color", "#e3ebf6");
    $("#OriginPhone2, #OriginPhone1, #OriginEmail").val("");

    $.ajax({
        url: "index.php?c=customers&a=GetInfoCustomerById",
        type: "POST",
        data: {
            Id: CustomerOrigin
        },
        success: function(data) {

            $("#OriginPhone1, #OriginEmail,#OriginPhone2 ").css("border-color", "orange");

            var value = JSON.parse(data);

            if (value.Email != '' && value.Email != null) {
                $("#OriginEmail").val(value.Email);
                $("#OriginEmail").css("border-color", "green");
            }
            if (value.Phone1 != '' && value.Phone1 != null) {
                $("#OriginPhone1").val(value.Phone1);
                $("#OriginPhone1").css("border-color", "green");
            }

            if (value.Phone2 != '' && value.Phone2 != null) {
                $("#OriginPhone2").val(value.Phone2);
                $("#OriginPhone2").css("border-color", "green");
            }


        }
    });

}else{
    $("#OriginPhone1, #OriginEmail,#OriginPhone2 ").css("border-color", "#e3ebf6");
    $("#OriginPhone2, #OriginPhone1, #OriginEmail").val("");
}
}

function onchangeDestinationCustomer(){

var CustomerDestination = $("#IdCustomerDestination").val();

if (CustomerDestination != '') {

    $("#DestinationPhone1, #DestinationEmail,#DestinationPhone2").css("border-color", "#e3ebf6");
    $("#DestinationPhone2, #DestinationPhone1, #DestinationEmail").val("");

    $.ajax({
        url: "index.php?c=customers&a=GetInfoCustomerById",
        type: "POST",
        data: {
            Id: CustomerDestination
        },
        success: function(data) {

            $("#DestinationPhone2, #DestinationPhone1, #DestinationEmail").css("border-color", "orange");

            var value = JSON.parse(data);

            if (value.Email != '' && value.Email != null) {
                $("#DestinationEmail").val(value.Email);
                $("#DestinationEmail").css("border-color", "green");
            }

            if (value.Phone1 != '' && value.Phone1 != null) {
                $("#DestinationPhone1").val(value.Phone1);
                $("#DestinationPhone1").css("border-color", "green");
            }

            if (value.Phone2 != '' && value.Phone2 != null) {
                $("#DestinationPhone2").val(value.Phone2);
                $("#DestinationPhone2").css("border-color", "green");
            }

        }
    });
}else{
    $("#DestinationPhone1, #DestinationEmail,#DestinationPhone2").css("border-color", "#e3ebf6");
    $("#DestinationPhone2, #DestinationPhone1, #DestinationEmail").val("");
}

}
function SumNumber(number1, number2){

var x1, x2 = 0;

    if(!number1 || number1 == undefined || number1 == "" || number1.length == 0){
        x1 = 0;
    }else{
        x1 = parseFloat(number1.toString().replace(',',''));
    }

    if(!number2 || number2 == undefined || number2 == "" || number2.length == 0){
        x2 = 0;
    }else{
        x2 = parseFloat(number2.toString().replace(',',''));
    }

    return (x1 + x2).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

function ConvertNumber(number1){

var x1 = 0;

    if(!number1 || number1 == undefined || number1 == "" || number1.length == 0){
        x1 = 0;
    }else{
        x1 = parseFloat(number1.toString().replace(',',''));
    }

    return x1;
}

function RestNumber(number1, number2){

var x1, x2 = 0;

if(!number1 || number1 == undefined || number1 == "" || number1.length == 0){
    x1 = 0;
}else{
    x1 = parseFloat(number1.toString().replace(',',''));
}

if(!number2 || number2 == undefined || number2 == "" || number2.length == 0){
    x2 = 0;
}else{
    x2 = parseFloat(number2.toString().replace(',',''));
}

return (x1 - x2).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

}

</script>