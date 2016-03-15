<?php echo $map['js']; ?>
<?php include 'assets/Frontend/inc/config.php';?>
<?php include 'assets/Frontend/inc/template_start.php';?>

<section>
    <!-- <div class="container"> -->
        <div class="map-block" id="map-block">
            <div class="row" id="map-container">
                <div id="mapTitle" class="text-center">
                    <div class="row text-center" id="mapTitleHeader">
                        <div class="col-sm-6 text-center" id="mapTitleImage" style="float: left; margin-left: 9%;">
                            <img src="<?=base_url();?>assets/Frontend/images/CagangohanPics/logoCagangohan.png" style="width: 110px; height: 110px;"/>
                        </div>
                        <div class="col-sm-6 text-center" style="float: left;">
                            <b>REPUBLIC OF THE PHILIPPINES</b><br/>
                            <b>PROVINCE OF DAVAO DEL NORTE</b><br/>
                            <b>CITY OF PANABO</b><br/>
                            <b>BARANGAY CAGANGOHAN</b><br/>
                            <b>-oOo-</b><br/><br/><br/>
                            <b>OFFICE OF THE BARANGAY COUNCIL</b><br/>
                        </div>
                    </div>
                    <hr/>
                    <!-- <div id="mapLocationTitle" class="text-center">
                    <br/><br/>
                        <h1><b>Brgy. Cagangohan Residence Location</b></h1>
                    <br/><br/><br/><br/><br/>
                    </div> -->
                </div>
                <!-- <div class="col-sm-12 text-center" id="print">
                    <button type="button" id="print" onclick="clearMarkers()" class="btn btn-effect-ripple btn-info text-center"><i class="fa fa-print"></i> Print</button>
                </div> -->
                <div id="gmap-satellite" class="col-sm-12 gmap">
                    <div class="row" id="searchBoxContent">
                        <div class="col-sm-10 col-md-7 col-lg-10">
                            <form onsubmit="search()" class="form-control-borderless" id="searchDataToMarkerForm">
                                <div class="input-group" id="searchBox">
                                    <input type="text" id="searchDataToMarker" name="searchDataToMarker" class="form-control" placeholder="Search Here..." style="overflow: hidden; position: relative;">
                                    <span class="input-group-btn">
                                        <button type="submit" id="searchBtn" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-0 col-md-5 col-lg-2"></div>
                    </div>
                    <!-- <div id="map" style="height: 110%"> -->
                        <?php echo $map['html']; ?>
                    <!-- </div> -->
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" id="dataTitle"></div>
                <div class="col-sm-12 col-md-6 col-lg-6" id="residentInfoDiv"></div>
                <div class="col-sm-12 col-md-6 col-lg-6" id="directionsDiv"></div>
                <div class="col-sm-12 text-center" id="print">
                    <button type="button" id="print" onclick="window.print();" class="btn btn-effect-ripple btn-info text-center"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    <!-- </div> -->
</section>


<!-- OLD -->

<!-- <section class="site-content" id="mapForm">
    <div class="container">
        <div class="site-block" id="site-block">
            <div class="row" id="map-container">
                <div id="mapTitle">
                    <div class="row" id="mapTitleHeader">
                        <div class="col-sm-6 text-center" style="float: left">
                            <img src="<?=base_url();?>assets/Backend/images/CagangohanPics/logoCagangohan.png" style="width: 110px; height: 110px;"/>
                        </div>
                        <div class="col-sm-6 text-center" style="float: left">
                            <b>REPUBLIC OF THE PHILIPPINES</b><br/>
                            <b>PROVINCE OF DAVAO DEL NORTE</b><br/>
                            <b>CITY OF PANABO</b><br/>
                            <b>BARANGAY CAGANGOHAN</b><br/>
                            <b>-oOo-</b><br/><br/><br/>
                            <b>OFFICE OF THE BARANGAY COUNCIL</b><br/>
                        </div>
                    </div>
                    <hr/>
                    <br/><br/><br/>
                    <div class="text-center">
                        <h1><b>Brgy. Cagangohan Residence Location</b></h1>
                    </div>
                    <br/><br/><br/><br/><br/><br/>
                </div>
                <div id="gmap-satellite" class="col-sm-12 gmap">
                    <div class="row">
                        <div class="col-sm-12 col-md-7 col-lg-10">
                            <div class="input-group" id="searchBox">
                                <input type="text" id="searchDataToMarker" name="example-input1-group2 searchDataToMarker" class="form-control" placeholder="Search Here..." style="overflow: hidden; position: relative;">
                                <span class="input-group-btn">
                                    <button type="button" id="searchBtn" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-0 col-md-5 col-lg-2"></div>
                    </div>
                    <div id="map" style="width:118%; margin-left: -5%;">
                        <?php // echo $map['html']; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" id="dataTitle"></div>
                <div class="col-sm-12 col-md-6 col-lg-6" id="residentInfoDiv"></div>
                <div class="col-sm-12 col-md-6 col-lg-6" id="directionsDiv"></div>
                <div class="col-sm-12">
                    <button type="button" id="print" onclick="window.print();" class="btn btn-effect-ripple btn-info" style="overflow: hidden; position: relative; float: center;"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
</section> -->

<?php include 'assets/Frontend/inc/template_scripts.php';?>

<script type="text/javascript" src="<?=base_url();?>assets/Frontend/js/pages/map.js"></script>
<!-- <script>
    // $(function () {
    //     Map.init();
    // });
</script> -->

<?php include 'assets/Frontend/inc/template_end.php';?>
