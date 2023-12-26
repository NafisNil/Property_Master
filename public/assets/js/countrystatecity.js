function AjaxCall() {
    this.send = function (data, url, method, success, type) {
        type = 'json';
        const successRes = function (data) {
            success(data);
        };

        const errorRes = function (xhr, ajaxOptions, thrownError) {

            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);

        };
        jQuery.ajax({
            url: url,
            type: method,
            data: data,
            success: successRes,
            error: errorRes,
            dataType: type,
            timeout: 60000
        });

    }

}

function LocationInfo() {
    const rootUrl = "https://geodata.phplift.net/api/index.php";
    const call = new AjaxCall();


    this.getCities = function (id, parentCountrySelection) {


        jQuery(parentCountrySelection).find(".cities option:gt(0)").remove();
        //get additional fields

        const url = rootUrl + '?type=getCities&countryId=' + '&stateId=' + id;
        const method = "post";
        const data = {};
        jQuery(parentCountrySelection).find('.cities option:first').html("Please wait..");
        call.send(data, url, method, function (data) {
            jQuery(parentCountrySelection).find('.cities option:first').html("Select City");
            const listLength = Object.keys(data['result']).length;

            if (listLength > 0) {
                jQuery.each(data['result'], function (key, val) {
                    const option = jQuery('<option />');
                    option.attr('value', val.name).text(val.name);
                    jQuery(parentCountrySelection).find('.cities').append(option);
                });
            }


            jQuery(parentCountrySelection).find(".cities").prop("disabled", false);

        });
    };

    this.getStates = function (id, parentCountrySelection) {

        //now try to find out parent of this

        jQuery(parentCountrySelection).find(".states option:gt(0)").remove();
        jQuery(parentCountrySelection).find(".cities option:gt(0)").remove();

        //get additional fields
        const stateClasses = jQuery('#stateId').attr('class');


        const url = rootUrl + '?type=getStates&countryId=' + id;
        const method = "post";
        const data = {};
        jQuery(parentCountrySelection).find('.states option:first').html("Please wait..");
        call.send(data, url, method, function (data) {
            jQuery(parentCountrySelection).find('.states option:first').html("Select State");

            jQuery.each(data['result'], function (key, val) {
                const option = jQuery('<option />');
                option.attr('value', val.name).text(val.name);
                option.attr('stateid', val.id);
                jQuery(parentCountrySelection).find('.states').append(option);
            });
            jQuery(parentCountrySelection).find(".states").prop("disabled", false);

        });
    };

    this.getCountries = function () {
        const url = rootUrl + '?type=getCountries';
        const method = "post";
        const data = {};
        jQuery('.countries').find("option:first").html("Please wait..");
        call.send(data, url, method, function (data) {
            jQuery('.countries').find("option:first").html("Select Country");

            jQuery.each(data['result'], function (key, val) {
                const option = jQuery('<option />');

                option.attr('value', val.name).text(val.name);
                option.attr('countryid', val.id);

                jQuery('.countries').append(option);
            });
            // jQuery(".countries").prop("disabled",false);

        });
    };

}

jQuery(function () {
    const loc = new LocationInfo();
    loc.getCountries();

    jQuery(".countries").on("change", function (ev) {

        let parentCountrySelection = jQuery(this).closest('.parent-country-selection');

        if (parentCountrySelection.length <= 0) {
            parentCountrySelection = jQuery('body');
        }

        const countryId = jQuery("option:selected", this).attr('countryid');
        if (countryId !== '') {
            loc.getStates(countryId, parentCountrySelection);
        } else {
            jQuery(parentCountrySelection).find(".states option:gt(0)").remove();
        }
    });
    jQuery(".states").on("change", function (ev) {
        const stateId = jQuery("option:selected", this).attr('stateid');

        let parentCountrySelection = jQuery(this).closest('.parent-country-selection');

        if (parentCountrySelection.length <= 0) {
            parentCountrySelection = jQuery('body');
        }

        if (stateId !== '') {
            loc.getCities(stateId, $(parentCountrySelection));
        } else {
            jQuery(parentCountrySelection).find(".cities option:gt(0)").remove();
        }
    });
});

