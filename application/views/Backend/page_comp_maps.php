<?php include 'assets/Backend/inc/config.php'; $template['header_link'] = 'MAP'; $template['title'] = 'BCGIS | MAP'; ?>
<?php include 'assets/Backend/inc/template_start.php'; ?>
<?php include 'assets/Backend/inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Google Maps Header -->
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
                        <li>Map</li>
                        <li><a href="">Barangay Map</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Google Maps Header -->

    <!-- Google Maps Content -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Satellite Map Block -->
            <div class="block">
                <!-- Satellite Map Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <div class="btn-group">
                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Settings"><i class="fa fa-gear"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="javascript:void(0)">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Remove
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2><i class="fa fa-globe"></i> Satellite Map</h2>
                </div>
                <!-- END Satellite Map Title -->

                <!-- Satellite Map Content -->
                <!-- Gmaps.js (initialized in js/pages/compMaps.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html -->
                <div class="block-content-full">
                    <div id="gmap-satellite" class="gmap" style="height: 360px;"></div>
                </div>
                <!-- END Satellite Map Content -->
            </div>
            <!-- END Satellite Map Block -->
        </div>
        <div class="col-sm-6">
            <!-- Map with Markers Block -->
            <div class="block">
                <!-- Map with Markers Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <div class="btn-group">
                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Settings"><i class="fa fa-gear"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="javascript:void(0)">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Remove
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2><i class="fa fa-map-marker"></i> Markers Map</h2>
                </div>
                <!-- END Map with Markers Title -->

                <!-- Map with Markers Content -->
                <!-- Gmaps.js (initialized in js/pages/compMaps.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html -->
                <div class="block-content-full">
                    <div id="gmap-markers" class="gmap" style="height: 360px;"></div>
                </div>
                <!-- END Map with Markers Content -->
            </div>
            <!-- END Map with Markers Block -->
        </div>
        <div class="col-sm-6">
            <!-- Overlay Map Block -->
            <div class="block">
                <!-- Overlay Map Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <div class="btn-group">
                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Settings"><i class="fa fa-gear"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="javascript:void(0)">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Remove
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2><i class="fa fa-info-circle"></i> Overlay Map</h2>
                </div>
                <!-- END Overlay Map Title -->

                <!-- Overlay Map Content -->
                <!-- Gmaps.js (initialized in js/pages/compMaps.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html -->
                <div class="block-content-full">
                    <div id="gmap-overlay" class="gmap" style="height: 360px;"></div>
                </div>
                <!-- END Overlay Map Content -->
            </div>
            <!-- END Overlay Map Block -->
        </div>
        <div class="col-sm-12">
            <!-- Geolocation Block -->
            <div class="block">
                <!-- Geolocation Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <div class="btn-group">
                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Settings"><i class="fa fa-gear"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="javascript:void(0)">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Remove
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2><i class="fa fa-map-marker"></i> Geolocation Map</h2>
                </div>
                <!-- END Geolocation Title -->

                <!-- Geolocation Content -->
                <!-- Gmaps.js (initialized in js/pages/compMaps.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html -->
                <div class="block-content-full">
                    <div id="gmap-geolocation" class="gmap" style="height: 360px;"></div>
                </div>
                <!-- END Geolocation Content -->
            </div>
            <!-- END Geolocation Block -->
        </div>
    </div>
    <!-- END Google Maps Content -->
</div>
<!-- END Page Content -->

<?php include 'assets/Backend/inc/page_footer.php'; ?>
<?php include 'assets/Backend/inc/template_scripts.php'; ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?=base_url()?>assets/Backend/js/plugins/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url()?>assets/Backend/js/pages/compMaps.js"></script>
<script>
    $(function(){
        CompMaps.init();
    });
</script>

<?php include 'assets/Backend/inc/template_end.php'; ?>