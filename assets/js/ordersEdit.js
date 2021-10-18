//Customer functions
function newCustomer() {

    $.ajax({
        url: "index.php?c=customers&a=NewCustomer",
        type: "POST",
        data: {
            Name: $("#NameNewCustomer").val(),
            LastName: $("#LastNameNewCustomer").val(),
            Phone1: $("#Phone1NewCustomer").val(),
            Phone2: $("#Phone2NewCustomer").val(),
            Email: $("#EmailNewCustomer").val()
        },
        success: function(data) {

            var responseCustomer = data.split('"').join('');
            
            if (isNumber(responseCustomer)) {

                $("#ModalNewCustomer").modal('hide');
                $(".toast-success").html("Customer created");
                var myAlert = document.getElementById('toastSuccess');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();

            } else {

                $(".toast-error").html(data);
                var myAlert = document.getElementById('toastError');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();
            }
        }
    });
}

function isNumber(value) {
    return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
  }

//companyServices
function newCompany() {

    $.ajax({
        url: "index.php?c=companyServices&a=NewCompany",
        type: "POST",
        data: {
            CompanyName: $("#CompanyNameNewCompany").val(),
            CompanyAddress: $("#CompanyAddressNewCompany").val(),
            CompanyCity: $("#CompanyCityNewCompany").val(),
            CompanyState: $("#CompanyStateNewCompany").val(),
            CompanyZipCode: $("#CompanyZipCodeNewCompany").val(),
            CompanyPhone1: $("#CompanyPhone1NewCompany").val(),
            CompanyPhone2: $("#CompanyPhone2NewCompany").val(),
            CompanyEmail: $("#CompanyEmailNewCompany").val()
        },
        success: function(data) {

            var response1 = data.split('"').join('');

            if (isNumber(response1)) {

                $("#ModalNewCompanyService").modal('hide');
                $(".toast-success").html("Company created");
                var myAlert = document.getElementById('toastSuccess');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();

            } else {

                $(".toast-error").html(data);
                var myAlert = document.getElementById('toastError');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();
            }
        }
    });
}

//End companyServices

//Drivers functions

function newDriver() {


    $.ajax({
        url: "index.php?c=Drivers&a=NewDriver",
        type: "POST",
        data: {
            DriverName: $("#DriverNameNewDriver").val(),
            DriverPhone1: $("#DriverPhone1NewDriver").val(),
            DriverPhone2: $("#DriverPhone2NewDriver").val()
        },
        success: function(data) {

            if (data) {

                $("#ModalNewDriver").modal('hide');
                $(".toast-success").html("Driver created");
                var myAlert = document.getElementById('toastSuccess');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();

            } else {

                $(".toast-error").html(data);
                var myAlert = document.getElementById('toastError');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();
            }
        }
    });
}

//End drivers

//Vehicles functions
function newVehicle() {

    $.ajax({
        url: "index.php?c=Vehicles&a=newVehicle",
        type: "POST",
        data: {
            Brand: $("#BrandNewVehicle").val(),
            Model: $("#ModelNewVehicle").val()
        },
        success: function(data) {

            if (data) {

                $("#ModalNewVehicle").modal('hide');
                $(".toast-success").html("Vehicle created");
                var myAlert = document.getElementById('toastSuccess');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();

            } else {

                $(".toast-error").html(data);
                var myAlert = document.getElementById('toastError');
                var bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();
            }
        }
    });
}

//End vehicles

//Google Maps Origin Info

$(document).ready(function() {

    //Google Maps API Origin Address
    let autocomplete;
    let address1Field;
    let postalField;

    //Google Maps API Destination Address
    let autocomplete2;
    let address1Field2;
    let postalField2;

    //Google Maps API Billing Address
    let autocomplete3;
    let address1Field3;
    let postalField3;

    let autocomplete4;
    let address1Field4;
    let postalField4;

    let autocomplete5;
    let address1Field5;
    let postalField5;

    function initAutocomplete() {

        address1Field = document.querySelector("#OriginAddress");
        postalField = document.querySelector("#OriginZip");

        address1Field2 = document.querySelector("#DestinationAddress");
        postalField2 = document.querySelector("#DestinationZip");

        address1Field3 = document.querySelector("#BillingAddress");
        postalField3 = document.querySelector("#BillingZipCode");

        address1Field4 = document.querySelector("#CompanyAddress");
        postalField4 = document.querySelector("#CompanyZipCode");

        address1Field5 = document.querySelector("#CompanyAddressNewCompany");
        postalField5 = document.querySelector("#CompanyZipCodeNewCompany");
      
  
        autocomplete = new google.maps.places.Autocomplete(address1Field, {
            componentRestrictions: { country: ["us", "ca"] },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });

        autocomplete2 = new google.maps.places.Autocomplete(address1Field2, {
            componentRestrictions: { country: ["us", "ca"] },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });

        autocomplete3 = new google.maps.places.Autocomplete(address1Field3, {
            componentRestrictions: { country: ["us", "ca"] },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });

        autocomplete4 = new google.maps.places.Autocomplete(address1Field4, {
            componentRestrictions: { country: ["us", "ca"] },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });

        autocomplete5 = new google.maps.places.Autocomplete(address1Field5, {
            componentRestrictions: { country: ["us", "ca"] },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });

        autocomplete.addListener("place_changed", fillInAddress);
        autocomplete2.addListener("place_changed", fillInAddress2);
        autocomplete3.addListener("place_changed", fillInAddress3);
        autocomplete4.addListener("place_changed", fillInAddress4);
        autocomplete5.addListener("place_changed", fillInAddress5);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();
        let address1 = "";
        let postcode = "";

        $("#OriginState, #OriginCity, #OriginZip").css("border-color", "#e3ebf6;");

        for (const component of place.address_components) {

            const componentType = component.types[0];

            switch (componentType) {
                case "street_number":
                    {
                        address1 = `${component.long_name} ${address1}`;
                        break;
                    }

                case "route":
                    {
                        address1 += component.short_name;
                        break;
                    }

                case "postal_code":
                    {
                        postcode = `${component.long_name}${postcode}`;
                        break;
                    }

                case "postal_code_suffix":
                    {
                        postcode = `${postcode}-${component.long_name}`;
                        break;
                    }
                case "locality":

                    if (component.long_name != '') {
                        document.querySelector("#OriginCity").value = component.long_name;
                        $("#OriginCity").css("border-color", "green");
                    } else {
                        $("#OriginCity").css("border-color", "orange");
                        document.querySelector("#OriginCity").value = "";
                    }

                    break;
                case "administrative_area_level_1":
                    {

                        if (component.short_name != '') {
                            document.querySelector("#OriginState").value = component.short_name;
                            $("#OriginState").css("border-color", "green");
                        } else {
                            $("#OriginState").css("border-color", "orange");
                            document.querySelector("#OriginState").value = "";
                        }

                        break;

                    }

            }

            if (postcode != '') {
                postalField.value = postcode;
                $("#OriginZip").css("border-color", "green");
            } else {
                $("#OriginZip").css("border-color", "orange");
                postalField.value = "";
            }

        }
    }

    /**************************************************** */

    //Destination Info Google Maps

    function fillInAddress2() {
        // Get the place details from the autocomplete object.
        const place2 = autocomplete2.getPlace();
        let address12 = "";
        let postcode2 = "";
        $("#DestinationState, #DestinationCity, #DestinationZip").css("border-color", "#e3ebf6;");

        for (const component2 of place2.address_components) {

            const componentType2 = component2.types[0];

            switch (componentType2) {
                case "street_number":
                    {
                        address12 = `${component2.long_name} ${address12}`;
                        break;
                    }

                case "route":
                    {
                        address12 += component2.short_name;
                        break;
                    }

                case "postal_code":
                    {
                        postcode2 = `${component2.long_name}${postcode2}`;
                        break;
                    }

                case "postal_code_suffix":
                    {
                        postcode2 = `${postcode}-${component2.long_name}`;
                        break;
                    }
                case "locality":

                    if (component2.long_name != '') {
                        document.querySelector("#DestinationCity").value = component2.long_name;
                        $("#DestinationCity").css("border-color", "green");
                    } else {
                        $("#DestinationCity").css("border-color", "orange");
                        document.querySelector("#DestinationCity").value = "";
                    }

                    break;
                case "administrative_area_level_1":
                    {

                        if (component2.short_name != '') {
                            document.querySelector("#DestinationState").value = component2.short_name;
                            $("#DestinationState").css("border-color", "green");
                        } else {
                            $("#DestinationState").css("border-color", "orange");
                            document.querySelector("#DestinationState").value = "";
                        }

                        break;

                    }
                    /*	case "country":
                    		document.querySelector("#country").value = component.long_name;
                    		break;
                    	}*/
            }

            if (postcode2 != '') {
                postalField2.value = postcode2;
                $("#DestinationZip").css("border-color", "green");
            } else {
                $("#DestinationZip").css("border-color", "orange");
                postalField2.value = "";
            }

        }
    }


    function fillInAddress3() {
        // Get the place details from the autocomplete object.
        const place3 = autocomplete3.getPlace();
        let address13 = "";
        let postcode3 = "";
        $("#BillingState, #BillingCity, #BillingnZipCode").css("border-color", "#e3ebf6;");

        for (const component3 of place3.address_components) {

            const componentType3 = component3.types[0];

            switch (componentType3) {
                case "street_number":
                    {
                        address13 = `${component3.long_name} ${address13}`;
                        break;
                    }

                case "route":
                    {
                        address13 += component3.short_name;
                        break;
                    }

                case "postal_code":
                    {
                        postcode3 = `${component3.long_name}${postcode3}`;
                        break;
                    }

                case "postal_code_suffix":
                    {
                        postcode3 = `${postcode}-${component3.long_name}`;
                        break;
                    }
                case "locality":

                    if (component3.long_name != '') {
                        document.querySelector("#BillingCity").value = component3.long_name;
                        $("#BillingCity").css("border-color", "green");
                    } else {
                        $("#BillingCity").css("border-color", "orange");
                        document.querySelector("#BillingCity").value = "";
                    }

                    break;
                case "administrative_area_level_1":
                    {

                        if (component3.short_name != '') {
                            document.querySelector("#BillingState").value = component3.short_name;
                            $("#BillingState").css("border-color", "green");
                        } else {
                            $("#BillingState").css("border-color", "orange");
                            document.querySelector("#BillingState").value = "";
                        }

                        break;

                    }
                    /*	case "country":
                    		document.querySelector("#country").value = component.long_name;
                    		break;
                    	}*/
            }

            if (postcode3 != '') {
                postalField3.value = postcode3;
                $("#BillingZipCode").css("border-color", "green");
            } else {
                $("#BillingZipCode").css("border-color", "orange");
                postalField3.value = "";
            }

        }
    }


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

    function fillInAddress5() {
        // Get the place details from the autocomplete object.
        const place5 = autocomplete5.getPlace();
        let address15 = "";
        let postcode5 = "";

        $("#CompanyStateNewCompany, #CompanyCityNewCompany, #CompanyZipCodeNewCompany").css("border-color", "#e3ebf6;");

        for (const component5 of place5.address_components) {

            const componentType5 = component5.types[0];

            switch (componentType5) {
                case "street_number":
                    {
                        address15 = `${component5.long_name} ${address15}`;
                        break;
                    }

                case "route":
                    {
                        address15 += component5.short_name;
                        break;
                    }

                case "postal_code":
                    {
                        postcode5 = `${component5.long_name}${postcode5}`;
                        break;
                    }

                case "postal_code_suffix":
                    {
                        postcode5 = `${postcode5}-${component5.long_name}`;
                        break;
                    }
                case "locality":

                    if (component5.long_name != '') {
                        document.querySelector("#CompanyCityNewCompany").value = component5.long_name;
                        $("#CompanyCityNewCompany").css("border-color", "green");
                    } else {
                        $("#CompanyCityNewCompany").css("border-color", "orange");
                        document.querySelector("#CompanyCityNewCompany").value = "";
                    }

                    break;
                case "administrative_area_level_1":
                    {

                        if (component5.short_name != '') {
                            document.querySelector("#CompanyStateNewCompany").value = component5.short_name;
                            $("#CompanyStateNewCompany").css("border-color", "green");
                        } else {
                            $("#CompanyStateNewCompany").css("border-color", "orange");
                            document.querySelector("#CompanyStateNewCompany").value = "";
                        }

                        break;

                    }
          
            }

            if (postcode5 != '') {
                postalField5.value = postcode5;
                $("#CompanyZipCodeNewCompany").css("border-color", "green");
            } else {
                $("#CompanyZipCodeNewCompany").css("border-color", "orange");
                postalField5.value = "";
            }

        }
    }


    initAutocomplete();

});