<?php
include 'assets/Backend/inc/config.php';
$template['header_link'] = 'BARANGAY MAP';
$template['title'] = 'MAP(Admin) | BCGIS';
?>

<?php include 'assets/Backend/inc/template_start.php';?>
<?php include 'assets/Backend/inc/page_head.php';?>

<div id="page-content">
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Barangay Map</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li><a href="javascript:void(0)">Barangay Map</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="block full">
        <div class="row">
            <div class="col-sm-12">
                <div class="block" id="block">
                    <div class="block-title" id="map-header">
                        <h2><i class="fa fa-globe"></i> Satellite Map</h2>
                    </div>
                    <iframe src="<?php echo base_url(); ?>/Maps/index_content" id="frontMapContent" style="zoom:0; height: 100%; width: 103.8%; margin-left: -1.9%;" scrolling="no" frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'assets/Backend/inc/page_footer.php';?>
<?php include 'assets/Backend/inc/template_scripts.php';?>

<script src="<?=base_url()?>assets/Backend/js/pages/compMaps.js"></script>
<script>
    $(function () {
        CompMaps.init();
    });
</script>

<?php include 'assets/Backend/inc/template_end.php';?>
