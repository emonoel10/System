<?php
include 'assets/Backend/inc/config.php';
$template['header_link'] = 'DASHBOARD';
$template['title'] = 'BCGIS | CHARTS';
?>

<?php include 'assets/Backend/inc/template_start.php'; ?>
<?php include 'assets/Backend/inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Charts Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Barangay Statistical Charts</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Dashboard</li>
                        <li><a href="Charts">Barangay Statistical Charts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Charts Header -->
    
    <div class="block full">
        <!--<div class="block-title"><h2 class="center-block">Total Population by Purok</h2></div>-->
        <div class="row">
            <center><h1 class="center-block">Total Population by Purok</h1></center><br>
            <div class="col-sm-12 col-md-8 col-lg-8" id="barCol">
                <canvas id="totalPopulationByPurok" class="center-block" height="350"></canvas>
            </div>
            <div class="col-sm-4 col-md-0 col-lg-0"></div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div id="totalPopulationByPurokLegend" class="center-block chart-legend"></div>
            </div>
            <div class="col-sm-4 col-md-0 col-lg-0"></div>
        </div>
    </div>

    <div class="block full">
        <div class="row">
            <center><h1 class="center-block">Total Male Population by Age Ranges</h1></center><br>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <canvas id="ageRangesPieMale" class="center-block"></canvas>
            </div>
            <div class="col-sm-4 col-md-0 col-lg-0"></div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div id="ageRangesPieMaleLegend" class="center-block chart-legend"></div>
            </div>
            <div class="col-sm-4 col-md-0 col-lg-0"></div>
        </div>
    </div>
    <div class="block full">
        <div class="row">
            <center><h1 class="center-block">Total Female Population by Age Ranges</h1></center><br>
            <div class="co-sm-12 col-md-8 col-lg-8">
                <canvas id="ageRangesPieFemale" class="center-block"></canvas>
            </div>
            <div class="col-sm-4 col-md-0 col-lg-0"></div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div id="ageRangesPieFemaleLegend" class="center-block chart-legend"></div>
            </div>
            <div class="col-sm-4 col-md-0 col-lg-0"></div>
        </div>
    </div>
</div>

</div>
<!-- END Page Content -->

<style type="text/css">
</style>

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<?php include 'assets/Backend/inc/page_footer.php'; ?>
<?php include 'assets/Backend/inc/template_scripts.php'; ?>
<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo base_url(); ?>assets/Backend/js/pages/compCharts.js"></script>
<script>$(function () {
    CompCharts.init();
});</script>
<?php include 'assets/Backend/inc/template_end.php'; ?>
