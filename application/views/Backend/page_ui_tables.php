<?php include 'assets/Backend/inc/config.php'; $template['header_link'] = 'INFORMATION TABLE'; $template['title'] = 'BCGIS | INFO. TABLE'; ?>
<?php include 'assets/Backend/inc/template_start.php'; ?>
<?php include 'assets/Backend/inc/page_head.php'; ?>

        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>

            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Barangay Residence Data</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Information Table</li>
                        <li><a href="">Barangay Residence Data</a></li>
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
    <!--    <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover table-featured">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">ID</th>
                        <th>User</th>
                        <th>Email</th>
                        <th style="width: 120px;">Status</th>
                        <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $labels['0']['class'] = "label-success";
                    $labels['0']['text'] = "Active";
                    $labels['1']['class'] = "label-info";
                    $labels['1']['text'] = "On hold..";
                    $labels['2']['class'] = "label-danger";
                    $labels['2']['text'] = "Disabled";
                    $labels['3']['class'] = "label-warning";
                    $labels['3']['text'] = "Pending..";
                    ?>
                    <?php for($i=1; $i<31; $i++) { ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><strong>AppUser<?php echo $i; ?></strong></td>
                        <td>app.user<?php echo $i; ?>@example.com</td>
                        <?php $rand = rand(0, 3); ?>
                        <td><span class="label<?php echo ($labels[$rand]['class']) ? " " . $labels[$rand]['class'] : ""; ?>"><?php echo $labels[$rand]['text'] ?></span></td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>-->
     <!--END Datatables Block--> 
     
     
     <?php echo $output; ?>
     
</div>
 <!--END Page Content-->


<?php include 'assets/Backend/inc/page_footer.php'; ?>
<?php include 'assets/Backend/inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url();?>assets/Backend/js/pages/uiTables.js"></script>
<script>
    $(function(){
        UiTables.init();
    });
</script>

<?php include 'assets/Backend/inc/template_end.php'; ?>