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
        <div class="table-responsive">
            <?php echo $output; ?>
        </div>
        
    </div>
     <!--END Datatables Block--> 
     
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
