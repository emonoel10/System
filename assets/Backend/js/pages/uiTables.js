/*
 *  Document   : uiTables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables page
 */

var UiTables = function () {

    return {
        init: function () {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $('#example-datatable').dataTable({
                columnDefs: [{orderable: false, targets: [4]}],
                pageLength: 10,
                lengthMenu: [[5, 10, 20], [5, 10, 20]]
            });

            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');

            /* Select/Deselect all checkboxes in tables */
            $('thead input:checkbox').click(function () {
                var checkedStatus = $(this).prop('checked');
                var table = $(this).closest('table');

                $('tbody input:checkbox', table).each(function () {
                    $(this).prop('checked', checkedStatus);
                });
            });

            /* Table Styles Switcher */
            var genTable = $('#general-table');
            var styleBorders = $('#style-borders');

            $('#style-default').on('click', function () {
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');

                genTable.removeClass('table-bordered').removeClass('table-borderless');
            });

            $('#style-bordered').on('click', function () {
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');

                genTable.removeClass('table-borderless').addClass('table-bordered');
            });

            $('#style-borderless').on('click', function () {
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');

                genTable.removeClass('table-bordered').addClass('table-borderless');
            });

            $('#style-striped').on('click', function () {
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) {
                    genTable.addClass('table-striped');
                } else {
                    genTable.removeClass('table-striped');
                }
            });

            $('#style-condensed').on('click', function () {
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

            $(".addBtn").click(function () {
                $('#addFrame').attr('src', "/InfoTable/add");
            });
            
            $(".editBtn").click(function () {
                $('#editFrame').attr('src',"/InfoTable/edit/"+$(this).data('resident_id'));
//                $('#editFrame').attr('src',"<?php echo $row->edit_url; ?>");
            });
            
            $(".viewBtn").click(function () {
                $('#viewFrame').attr('src',"/InfoTable/read/"+$(this).data('resident_id'));
//                $('#viewFrame').attr('src',"<?php echo $row->read_url; ?>");
            });
        }
    };
}();
