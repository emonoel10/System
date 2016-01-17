$('#clearanceForm').validate({
    errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
    errorElement: 'div',
    errorPlacement: function(error, e) {
        // e.preventDefault();
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        // e.preventDefault();
        // $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        // $(e).closest('.help-block shake animated').remove();
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
        // $('.form-group').removeClass('has-success has-error').addClass('has-error');
        // $('.help-block').remove();
    },
    success: function() {
        // e.preventDefault();
        // $(e).closest('.form-group').removeClass('has-success has-error');
        // $(e).closest('.help-block').remove();
        $('.form-group').removeClass('has-success has-error');
        $('.help-block').remove();
    },
    rules: {
        'fname': {
            required: true
        },
        'nname': {
            required: true
        },
        'status': {
            required: true
        },
        'bday': {
            required: true
        },
        'bPlace': {
            required: true
        },
        'comAddress': {
            required: true
        },
        'yearPresentAddress': {
            required: true
        },
        'purpose': {
            required: true
        }
    },
    messages: {
        'fname': {
            required: "Please fill your full name."
        },
        'nname': {
            required: "Please fill your nickname or alias."
        },
        'status': {
            required: "Please fill your civil status."
        },
        'bday': {
            required: "Please fill your birthdate."
        },
        'bPlace': {
            required: "Please fill your birthplace."
        },
        'comAddress': {
            required: "Please fill your complete present address."
        },
        'yearPresentAddress': {
            required: "Please fill the no. of years of your present address."
        },
        'purpose': {
            required: "Please fill your purpose of filing a certificate of clearance."
        }
    }
});

function activaTab(tab) {
    if (proceedStep() === true) {
        $('.nav-tabs a[data-target="#' + tab + '"]').tab('show');
    } else {
        if (!alertify.errorAlert) {
            alertify.dialog('errorAlert', function factory() {
                return {
                    build: function() {
                        var errorHeader = '<span class="fa fa-times-circle fa-2x" ' + 'style="vertical-align:middle;color:#e10000;">' + '</span> Form Error';
                        this.setHeader(errorHeader);
                    }
                };
            }, true, 'alert');
        }
        alertify.errorAlert("You missed something on the form.<br/><br/><br/>").set('modal', true).set('movable', false);
        $('.nav-tabs #step2 a').removeAttr("data-toggle").attr("data-toggle", "tab disabled");
    }
};

function proceedStep() {
    if (document.getElementById('fname').value === "" || document.getElementById('nname').value === "" || $('#status :selected').text() === "" || document.getElementById('bday').value === "" || document.getElementById('bPlace').value === "" || document.getElementById('comAddress').value === "" || document.getElementById('yearPresentAddress').value === "" || document.getElementById('purpose').value === "") {
        $('.nav-tabs #step2 a').removeAttr("data-toggle").attr("data-toggle", "tab disabled");
        return false;
    } else {
        return true;
    }
}

if (document.getElementById('fnamePrintLabel').innerHTML === " ") {
    document.getElementById('fnamePrintLabel').innerHTML = "None";
}

if (document.getElementById('nnamePrintLabel').innerHTML === " ") {
    document.getElementById('nnamePrintLabel').innerHTML = "None";
}

if (document.getElementById('statusPrintLabel').innerHTML === " ") {
    document.getElementById('statusPrintLabel').innerHTML = "None";
}

if (document.getElementById('bdayPrintLabel').innerHTML === " ") {
    document.getElementById('bdayPrintLabel').innerHTML = "None";
}

if (document.getElementById('bPlacePrintLabel').innerHTML === " ") {
    document.getElementById('bPlacePrintLabel').innerHTML = "None";
}

if (document.getElementById('comAddressPrintLabel').innerHTML === " ") {
    document.getElementById('comAddressPrintLabel').innerHTML = "None";
}

if (document.getElementById('yearPresentAddressPrintLabel').innerHTML === " ") {
    document.getElementById('yearPresentAddressPrintLabel').innerHTML = "None";
}

if (document.getElementById('purposePrintLabel').innerHTML === " ") {
    document.getElementById('purposePrintLabel').innerHTML = "None";
}

$("#fname").on("keyup", function() {
    if (document.getElementById('fname').value === "") {
        document.getElementById('fnamePrint').value = "None";
        document.getElementById('fnamePrintLabel').innerHTML = "None";
    } else {
        document.getElementById('fnamePrint').value = document.getElementById('fname').value;
        document.getElementById('fnamePrintLabel').innerHTML = document.getElementById('fname').value;
    }
});

$("#nname").on("keyup", function() {
    if (document.getElementById('nname').value === "") {
        document.getElementById('nnamePrint').value = "None";
        document.getElementById('nnamePrintLabel').innerHTML = "None";
    } else {
        document.getElementById('nnamePrint').value = document.getElementById('nname').value;
        document.getElementById('nnamePrintLabel').innerHTML = document.getElementById('nname').value;
    }
});

$("#status").on("change", function() {
    if ($('#status :selected').text() === "") {
        document.getElementById('statusPrint').value = "None";
        document.getElementById('statusPrintLabel').innerHTML = "None";
    } else {
        document.getElementById('statusPrint').value = $('#status :selected').text();
        document.getElementById('statusPrintLabel').innerHTML = $('#status :selected').text();
    }
});

$("#bday").on("change", function() {
    if (document.getElementById('bday').value === "") {
        document.getElementById('bdayPrint').value = "None";
        document.getElementById('bdayPrintLabel').innerHTML = "None";
    } else {
        document.getElementById('bdayPrint').value = document.getElementById('bday').value;
        document.getElementById('bdayPrintLabel').innerHTML = document.getElementById('bday').value;
    }
});

$("#bPlace").on("keyup", function() {
    if (document.getElementById('bPlace').value === "") {
        document.getElementById('bPlacePrint').value = "None";
        document.getElementById('bPlacePrintLabel').innerHTML = "None";
    } else {
        document.getElementById('bPlacePrint').value = document.getElementById('bPlace').value;
        document.getElementById('bPlacePrintLabel').innerHTML = document.getElementById('bPlace').value;
    }
});

$("#comAddress").on("keyup", function() {
    if (document.getElementById('comAddress').value === "") {
        document.getElementById('comAddressPrint').value = "None";
        document.getElementById('comAddressPrintLabel').innerHTML = "None";
    } else {
        document.getElementById('comAddressPrint').value = document.getElementById('comAddress').value;
        document.getElementById('comAddressPrintLabel').innerHTML = document.getElementById('comAddress').value;
    }
});

$("#yearPesentAddress").on("keyup", function() {
    if (document.getElementById('yearPesentAddress').value === "") {
        document.getElementById('yearPresentAddressPrint').value = "None";
        document.getElementById('yearPresentAddressPrintLabel').innerHTML = "None";
    } else {
        document.getElementById('yearPresentAddressPrint').value = document.getElementById('yearPesentAddress').value;
        document.getElementById('yearPresentAddressPrintLabel').innerHTML = document.getElementById('yearPesentAddress').value;
    }
});

$("#purpose").on("keyup", function() {
    if (document.getElementById('purpose').value === "") {
        document.getElementById('purposePrint').value = "None";
        document.getElementById('purposePrintLabel').innerHTML = "None";
    } else {
        document.getElementById('purposePrint').value = document.getElementById('purpose').value;
        document.getElementById('purposePrintLabel').innerHTML = document.getElementById('purpose').value;
    }
});

$('iframe').load(function() {
    iFrameResize({
        log: false,
        heightCalculationMethod: 'bodyScroll'
    });
});

if ('matchMedia' in window) {
    // Chrome, Firefox, and IE 10 support mediaMatch listeners
    window.matchMedia('print').addListener(function(media) {
        if (media.matches) {
            beforePrint();
        } else {
            // Fires immediately, so wait for the first mouse movement
            $(document).one('mouseover', afterPrint);
        }
    });
} else {
    // IE and Firefox fire before/after events
    $(window).on('beforeprint', beforePrint);
    $(window).on('afterprint', afterPrint);
}

function beforePrint() {
    $('#page-header').css('display: none;');
    // $(this).style.display = 'none';
}

function afterPrint() {
    // $(this).style.display = '';
}
