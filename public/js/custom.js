$(document).ready(function () {

    jQuery.validator.setDefaults({
        errorPlacement: function (error, element) {
            if (element.hasClass('select2') && element.parent().hasClass('input-group')) {
                error.insertAfter(element.parent());
            } else if (element.hasClass('select2')) {
                error.insertAfter(element.next('span.select2-container'));
            } else if (element.parent().hasClass('input-group')) {
                error.insertAfter(element.parent());
            } else if (element.parent().hasClass('multi-input')) {
                error.insertAfter(element.closest('.multi-input'));
            } else if (element.parent().hasClass('input_inline')) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },

        invalidHandler: function () {
            toastr.error('Some Error in input');
        },

        errorClass: "is-invalid",
        errorElement: "span",
        validClass: "success",
    });
    //custom rules added
    jQuery.validator.addMethod("alpha", function (value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/u.test(value);
    }, "Only alphabets and whitespace are allowed");

    jQuery.validator.addMethod("alpha_num", function (value, element) {
        return this.optional(element) || /^[a-zA-Z \d]+$/u.test(value);
    }, "Only alphabets and numbers are allowed");

    jQuery.validator.addMethod("number", function (value, element) {
        return this.optional(element) || /^\d+\.?\d*$/.test(value);
    }, "Only numbers are allowed");

    //extract rules from form

    let validator = $('.validate-form').validate({
        errorClass: "is-invalid",
        errorElement: "span",
        validClass: "success",
    });

    if ($('.validate-form').length) {

        $('.validate-form').on('submit', function (e) {
            e.preventDefault();

            addRules('.validate-form');

            if ($('form.validate-form').valid()) {
                $('form.validate-form')[0].submit();
            }

        })

    }


    //toast
    //Toastr setting
    toastr.options.preventDuplicates = true;
    toastr.options.timeOut = "3000";

    //Play notification sound on success, error and warning
    toastr.options.onShown = function () {
        let audio;
        if ($(this).hasClass('toast-success')) {
            audio = $('#success-audio')[0];
            if (audio !== undefined) {
                audio.play();
            }
        } else if ($(this).hasClass('toast-error')) {
            audio = $('#error-audio')[0];
            if (audio !== undefined) {
                audio.play();
            }
        } else if ($(this).hasClass('toast-warning')) {
            audio = $('#warning-audio')[0];
            if (audio !== undefined) {
                audio.play();
            }
        }
    };

})


$(document).on('click', '.delete-item-btn', function () {

    let url = $(this).data('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#4e90bd',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: 'delete',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    toastr.success(res.message);
                    window.location.reload();
                },
                error: function (er) {
                    console.log(er)
                }
            });

        }
    })
});

function getClonedRow(table, name = "items", template = null) {
    let temp = '';
    if (template) {
        temp = $(template);
    } else {
        temp = $(table).find('tbody>tr:last')
    }

    let index = Number($(temp).find('input[name=index]').val()) + 1;
    let prefix = `${name}[${index}]`;

    let cloned = $(temp).clone().find('input, select')
        .each(function () {
            this.name = this.name.replace(/\d/g, index);

            if (this.name === 'index') {
                $(this).val(index);
            } else {
                this.value = '';
            }
        }).end().find('.sl').text(index + 1)
        .end();

    $(table).append(cloned)

}

let buttons = [
    {
        extend: 'csv',
        text: '<i class="fa fa-file-csv" aria-hidden="true"></i> csv',
        className: 'btn-sm',
        exportOptions: {
            columns: ':visible',
        },
        footer: true,
    },
    {
        extend: 'excel',
        text: '<i class="fa fa-file-excel" aria-hidden="true"></i>export',
        className: 'btn-sm',
        exportOptions: {
            columns: ':visible',
        },
        footer: true,
    },
]

//data table default setup
jQuery.extend($.fn.dataTable.defaults, {
    //Uncomment below line to enable save state of datatable.
    //stateSave: true,
    fixedHeader: true,
    dom:
        '<"row margin-bottom-20 text-center"<"col-sm-2"l><"col-sm-7"B><"col-sm-3"f> r>tip',
    buttons: buttons
});

function addRules(form) {
    let rules = {};
    $(form).find('input, select').each(function () {
        let ruleObj = {};
        let inputRules = $(this).data('rules');
        if (inputRules && inputRules.length) {
            let ruleArray = inputRules.split('|');
            ruleArray.forEach(function (item) {
                let splitRules = item.split(':');
                ruleObj[splitRules[0]] = splitRules[1] ? splitRules[1] : true
            })
            //rules[this.name] = ruleObj
        }
        //console.log({ruleObj: ruleObj})
        $(this).rules('add', ruleObj)
    });

    return rules;
}

//get selected rows

//watch for td row select

$(document).on('click', '.row-select', function () {
    let selectedRows = getSelectedRows();
    console.log({selectedRows})
    if (selectedRows.length) {
        $('.action-buttons button').each(function () {
            $(this).removeAttr('disabled')
        })
    } else {
        $('.action-buttons button').each(function () {
            $(this).attr('disabled', 'disabled')
        })
    }
})

function getSelectedRows() {
    let selectedRows = [];
    let i = 0;
    $('.row-select:checked').each(function () {
        selectedRows[i++] = $(this).val();
    });
    return selectedRows;
}
