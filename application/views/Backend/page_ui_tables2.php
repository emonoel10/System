<?php
include 'assets/Backend/inc/config.php';
$template['header_link'] = 'INFORMATION TABLE';
$template['title'] = 'BCGIS | INFO. TABLE';
?>
<?php include 'assets/Backend/inc/template_start.php'; ?>
<?php include 'assets/Backend/inc/page_head.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Barangay Housing Data</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Information Table</li>
                        <li><a href="">Barangay Housing Data</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->

    <!-- Datatables Block -->
    <!-- Datatables is initialized in js/pages/uiTables.js -->
    <div class="block full">
        <div class="block-title">
            <h2>Datatables</h2>
        </div>
        <div class="table-responsive">
            <div>
                <a role="button" class="add_button btn btn-small btn-effect-ripple btn-primary" href="#modal-fadeAdd" data-toggle="modal" style="overflow: hidden; position: relative;">
                    <span class="fa fa-plus-circle"></span>&nbsp;&nbsp;Add Resident
                </a>
            </div>
            <br><br>
            <table id="example-datatable" class="table table-striped table-borderless table-vcenter table-hover table-responsive table-featured">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">First Name</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Middle Name</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Last Name</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Gender</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Birthdate</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Age</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Citizenship</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Occupation</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Status</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Purok</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Residencial Address</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Permanent Address</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Email</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Tel. #</th>
                        <th class="text-center" style="width: 74px;" rowspan="1" colspan="1">Cell. #</th>
                        <th class="text-center sorting_asc_disabled sorting_desc_disabled" style="width: 74px;" rowspan="1" colspan="1"><i class="fa fa-flash"></i></th>
                    </tr>
                </thead>
                <tbody style="max-width: 100px;">
                    <?php foreach ($sql->result() as $list) { ?>
                        <tr>
                            <td><?php echo $list->name ?></td>
                            <td><?php echo $list->mname ?></td>
                            <td><?php echo $list->lname ?></td>
                            <td><?php echo $list->gender ?></td>
                            <td><?php echo $list->bday ?></td>
                            <td><?php echo $list->age ?></td>
                            <td><?php echo $list->citizenship ?></td>
                            <td><?php echo $list->occupation ?></td>
                            <td><?php echo $list->status ?></td>
                            <td><?php echo $list->purok ?></td>
                            <td><?php echo $list->resAddress ?></td>
                            <td><?php echo $list->perAddress ?></td>
                            <td><?php echo $list->email ?></td>
                            <td><?php echo $list->telNum ?></td>
                            <td><?php echo $list->cpNum ?></td>
                            <td class="text-center">
                                <a href="javascript:void(0)" title="View Resident" class="btn btn-effect-ripple btn-xs btn-info"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" title="Edit Resident" class="btn btn-effect-ripple btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" title="Delete Resident" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="modal-fadeAdd" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title"><strong></strong></h3>
                        </div>
                        <div class="modal-body">
                            Content..
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-effect-ripple btn-primary">Save</button>
                            <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Datatables Block -->
</div>
<!-- END Page Content -->

<?php include 'assets/Backend/inc/page_footer.php'; ?>
<?php include 'assets/Backend/inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?= base_url(); ?>assets/Backend/js/pages/uiTables.js"></script>
<script>
    $(function () {
        UiTables.init();
    });
</script>

<?php include 'assets/Backend/inc/template_end.php'; ?>
