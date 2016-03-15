/*
 *  Document   : uiTables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables page
 */
var UiTables = function() {
    return {
        init: function() {
            var save_method;
            App.datatables();
            var table = $('#table').DataTable({
                "oLanguage": {
                    "sProcessing": '<center><i class="fa fa-asterisk fa-2x fa-spin text-primary"></i></center>'
                },
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [
                    [0, 'asc']
                ], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": window.location.origin + "/InfoTable/ajax_list",
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1, 0], //last column
                    "orderable": false //set not orderable
                }],
                "lengthMenu": [
                    [5, 10, 15, 20, 25],
                    [5, 10, 15, 20, 25]
                ]
            });
            //set input/textarea/select event when change value, remove class error and remove text help block
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $('#table').on('process', function() {
                $(this).addClass();
            });
            
            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');
            /* Select/Deselect all checkboxes in tables */
            $('thead input:checkbox').click(function() {
                var checkedStatus = $(this).prop('checked');
                var table = $(this).closest('table');
                $('tbody input:checkbox', table).each(function() {
                    $(this).prop('checked', checkedStatus);
                });
            });
            /* Table Styles Switcher */
            var genTable = $('#general-table');
            var styleBorders = $('#style-borders');
            $('#style-default').on('click', function() {
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');
                genTable.removeClass('table-bordered').removeClass('table-borderless');
            });
            $('#style-bordered').on('click', function() {
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');
                genTable.removeClass('table-borderless').addClass('table-bordered');
            });
            $('#style-borderless').on('click', function() {
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');
                genTable.removeClass('table-bordered').addClass('table-borderless');
            });
            $('#style-striped').on('click', function() {
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    genTable.addClass('table-striped');
                } else {
                    genTable.removeClass('table-striped');
                }
            });
            $('#style-condensed').on('click', function() {
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    genTable.addClass('table-condensed');
                } else {
                    genTable.removeClass('table-condensed');
                }
            });
            $('#style-hover').on('click', function() {
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    genTable.addClass('table-hover');
                } else {
                    genTable.removeClass('table-hover');
                }
            });
            // $('#addRow').click(function() {
            //     $('<div/>', {
            //         'class': 'extraPerson',
            //         html: GetHtml()
            //     }).hide().appendTo('#container').slideDown('slow');
            // });
            // $(document).on('click', "#removeRow", function() {
            //     var len = $('.extraPerson').length;
            //     console.log(len);
            //     if (len <= -1) {
            //         $('.extraPerson [name=firstname]').slideUp('slow');
            //         $('.extraPerson [name=lastname]').slideUp('slow');
            //         $('.extraPerson [name=gender]').slideUp('slow');
            //     } else {
            //         console.log($('.extraPerson [name=firstname' + (len - 1) + ']').parent().parent('div'));
            //         $('.extraPerson [name=firstname' + (len - 1) + ']').slideUp('slow');
            //         $('.extraPerson [name=lastname' + (len - 1) + ']').slideUp('slow');
            //         $('.extraPerson [name=gender' + (len - 1) + ']').slideUp('slow');
            //         $(this).fadeOut('slow');
            //     }
            // });
            $('#table tbody').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                if (row.child.isShown()) {
                    // This row is already open - close it
                    $('div.slider', row.child()).slideUp(function() {
                        row.child.hide();
                        tr.removeClass('shown');
                    });
                } else {
                    // Open this row
                    row.child(format(row.data()), 'no-padding').show();
                    tr.addClass('shown');
                    $('div.slider', row.child()).slideDown();
                }
            });
        }
    };
}();
// $('#addRow').click(function() {
//     $('<div/>', {
//         'class': 'extraPerson',
//         html: GetHtml()
//     }).hide().appendTo('#container').slideDown('slow');
// });
// $(document).on('click', "#removeRow", function() {
//     var len = $('.extraPerson').length;
//     console.log(len);
//     if (len <= -1) {
//         $('.extraPerson [name=firstname]').slideUp('slow');
//         $('.extraPerson [name=lastname]').slideUp('slow');
//         $('.extraPerson [name=gender]').slideUp('slow');
//     } else {
//         console.log($('.extraPerson [name=firstname' + (len - 1) + ']').parent().parent('div'));
//         $('.extraPerson [name=firstname' + (len - 1) + ']').slideUp('slow');
//         $('.extraPerson [name=lastname' + (len - 1) + ']').slideUp('slow');
//         $('.extraPerson [name=gender' + (len - 1) + ']').slideUp('slow');
//         $(this).fadeOut('slow');
//     }
// });
function format(d) {
    // `d` is the original data object for the row
    return '<div class="slider">' + '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' + '<tr>' + '<td>Full name:</td>' + '<td>' + d.name + '</td>' + '</tr>' + '<tr>' + '<td>Extension number:</td>' + '<td>' + d.extn + '</td>' + '</tr>' + '<tr>' + '<td>Extra info:</td>' + '<td>And any further details here (images etc)...</td>' + '</tr>' + '</table>' + '</div>';
    // return "if you see kaye";
}
// function GetHtml() {
//     var len = $('.extraPerson').length;
//     var $html = $('.extraPersonTemplate').clone();
//     $html.find('[name=firstname]')[0].name = "firstname" + len;
//     $html.find('[name=lastname]')[0].name = "lastname" + len;
//     $html.find('[name=gender]')[0].name = "gender" + len;
//     return $html.html();
// }
function reload_table() {
    $('#table').dataTable().fnDraw();
}

function ageCount() {
    var date1 = new Date();
    var bday = document.getElementById("bday").value;
    var date2 = new Date(bday);
    var pattern = /^\d{4}-\d{2}-\d{2}$/; // yyyy-MM-dd
    if (pattern.test(bday)) {
        var y1 = date1.getFullYear();
        var y2 = date2.getFullYear();
        var age = y1 - y2;
        document.getElementById("age").value = age;
    } else {
        $.bootstrapGrowl("<h4><strong>Error!</strong></h4> <p>Please fill in (MM/DD/YYYY) format!</p>", {
            type: "danger",
            delay: 2500,
            width: "auto",
            allow_dismiss: true,
            offset: {
                from: 'top',
                amount: 20
            }
        });
        document.getElementById("age").value = "";
        return false;
    }
}

function add_resident() {
    save_method = 'add';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('label[class="btn btn-info active"]').removeClass('active');
    $('label[class="btn btn-danger active"]').removeClass('active');
    $('.help-block').empty();
    $('#modal_form').modal('show');
    $('.modal-title').text('Add Resident');
}

function edit_resident(id) {
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $.ajax({
        url: window.location.origin + "/InfoTable/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="resident_id"]').val(data.resident_id);
            $('[name="name"]').val(data.name);
            $('[name="lname"]').val(data.lname);
            if (data.gender === "Male") {
                $('input[type="radio"][name="gender"][id="genderMale"]').prop("checked", true);
                $('input[type="radio"][name="gender"][id="genderFemale"]').prop("checked", false);
                $('label[class="btn btn-danger active"][id="labelGenderFemale"]').removeClass('active');
                $('label[class="btn btn-info"][id="labelGenderMale"]').addClass('active');
            } else if (data.gender === "Female") {
                $('input[type="radio"][name="gender"][id="genderFemale"]').prop("checked", true);
                $('input[type="radio"][name="gender"][id="genderMale"]').prop("checked", false);
                $('label[class="btn btn-info active"][id="labelGenderMale"]').removeClass('active');
                $('label[class="btn btn-danger"][id="labelGenderFemale"]').addClass('active');
            } else {
                $('input[type="radio"][name="gender"][id="genderMale"]').prop("checked", false);
                $('input[type="radio"][name="gender"][id="genderFemale"]').prop("checked", false);
                $('label[class="btn btn-info"]').removeClass('active');
                $('label[class="btn btn-danger"]').removeClass('active');
                return;
            }
            $('select[name="gender"]').val(data.gender);
            $('[name="bday"]').val(data.bday);
            $('[name="age"]').val(data.age);
            $('[name="citizenship"]').val(data.citizenship);
            $('[name="occupation"]').val(data.occupation);
            $('[name="status"]').val(data.status);
            $('select[name="purok"]').val(data.purok);
            $('[name="resAddress"]').val(data.resAddress);
            $('[name="perAddress"]').val(data.perAddress);
            $('[name="telNum"]').val(data.telNum);
            $('[name="cpNum"]').val(data.cpNum);
            $('[name="latlong"]').val(data.latlong);
            $('#modal_form').modal('show');
            $('.modal-title').text('Edit Resident');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.bootstrapGrowl("<h4><strong>Error!</strong></h4> <p>Problem retrieving resident's data!</p>", {
                type: "danger",
                delay: 2500,
                width: "auto",
                allow_dismiss: true,
                offset: {
                    from: 'top',
                    amount: 20
                }
            });
        }
    });
}

// function getLocation(location) {
//     marker = new google.maps.Marker({
//         position: location,
//         map: map,
//         draggable: true
//     });
//     marker.setPosition(location);
//     map.setCenter(location);
// }

function save() {
    $('#btnSave').text('Saving...');
    $('#btnSave').attr('disabled', true);
    var url;
    if (save_method == 'add') {
        url = window.location.origin + "/InfoTable/ajax_add";
    } else {
        url = window.location.origin + "/InfoTable/ajax_update";
    }
    $.ajax({
        url: url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                $('#modal_form').modal('hide');
                reload_table();
                if (save_method == 'add') {
                    swal({
                        title: "Success!",
                        text: "Resident data successfully added!",
                        type: "success"
                    });
                    reload_table();
                } else if (save_method == 'update') {
                    swal({
                        title: "Success!",
                        text: "Resident data successfully updated!",
                        type: "success"
                    });
                    reload_table();
                }
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Save');
            $('#btnSave').attr('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.bootstrapGrowl("<h4><strong>Error!</strong></h4> <p>Problem adding/updating resident's data!</p>", {
                type: "danger",
                delay: 2500,
                width: "auto",
                allow_dismiss: true,
                offset: {
                    from: 'top',
                    amount: 20
                }
            });
            $('#btnSave').text('Retry');
            $('#btnSave').attr('disabled', false);
        }
    });
}

function cancel() {
    if (save_method == 'add') {
        $.bootstrapGrowl("<h4><strong>Aw Snap!</strong></h4> <p>You cancelled adding resident data!</p>", {
            type: "warning",
            delay: 2500,
            width: "auto",
            allow_dismiss: true,
            offset: {
                from: 'top',
                amount: 20
            }
        });
    } else if (save_method == 'update') {
        $.bootstrapGrowl("<h4><strong>Jeez!</strong></h4> <p>You cancelled updating resident data!</p>", {
            type: "warning",
            delay: 2500,
            width: "auto",
            allow_dismiss: true,
            offset: {
                from: 'top',
                amount: 20
            }
        });
    }
}

function delete_resident(id) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this resident data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#C43902",
        confirmButtonText: "Yes!",
        cancelButtonText: "No!",
        showLoaderOnConfirm: true,
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: window.location.origin + "/InfoTable/ajax_delete/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    $('#modal_form').modal('hide');
                    reload_table();
                    swal({
                        title: "Success!",
                        text: "Resident data succesfully deleted!",
                        type: "success"
                    });
                    reload_table();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $.bootstrapGrowl("<h4><strong>Error!</strong></h4> <p>Problem deleting resident's data!</p>", {
                        type: "danger",
                        delay: 2500,
                        width: "auto",
                        align: "center",
                        allow_dismiss: true,
                        offset: {
                            from: 'top',
                            amount: 20
                        }
                    });
                }
            });
            swal("Deleted!", "Resident's data succesfully deleted!", "success");
        } else {
            $.bootstrapGrowl("<h4><strong>Cancelled!</strong></h4> <p>Resident's data deletion cancelled!</p>", {
                type: "warning",
                delay: 2500,
                width: "auto",
                allow_dismiss: true,
                offset: {
                    from: 'top',
                    amount: 20
                }
            });
        }
    });
}