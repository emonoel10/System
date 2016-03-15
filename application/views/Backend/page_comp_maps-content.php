<?php
include 'assets/Backend/inc/config.php';
$template['header_link'] = 'BARANGAY MAP';
$template['title'] = 'BCGIS | MAP';
?>

<?php include 'assets/Backend/inc/template_start.php';?>
<?php echo $map['js']; ?>

<div class="row">
  <div class="col-sm-12">
    <div class="map-block full">
      <div class="row" id="map-container">
        <div id="mapTitle">
          <div class="row" id="mapTitleHeader">
            <div class="col-sm-6 text-center" style="float: left; margin-left: 6%">
              <img src="<?=base_url();?>assets/Backend/images/CagangohanPics/logoCagangohan.png" style="width: 110px; height: 110px;"/>
            </div>
            <div class="col-sm-6 text-center" style="float: left">
              <b>REPUBLIC OF THE PHILIPPINES</b><br/>
              <b>PROVINCE OF DAVAO DEL NORTE</b><br/>
              <b>CITY OF PANABO</b><br/>
              <b>BARANGAY CAGANGOHAN</b><br/>
              <b>-oOo-</b><br/>
              <b>OFFICE OF THE BARANGAY COUNCIL</b><br/>
            </div>
          </div>
          <hr/>
          <!-- div class="text-center">
          <br/><br/><br/>
            <h1><b>Brgy. Cagangohan Residence Location</b></h1>
          <br/><br/><br/><br/><br/><br/>
          </div> -->
        </div>
        <div id="gmap-satellite" class="col-sm-12 gmap">
          <div class="row" id="searchBoxContent">
            <div class="col-sm-10 col-md-7 col-lg-10">
              <div class="input-group" id="searchBox">
                <input type="text" id="searchDataToMarker" name="example-input1-group2 searchDataToMarker" class="form-control" placeholder="Search Here..." style="overflow: hidden; position: relative;">
                <span class="input-group-btn">
                  <button type="button" id="searchBtn" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </div>
            <div class="col-sm-0 col-md-5 col-lg-2"></div>`
          </div>
          <?php echo $map['html']; ?>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12" id="dataTitle"></div>
        <div class="col-sm-12 col-md-6 col-lg-6" id="residentInfoDiv"></div>
        <div class="col-sm-12 col-md-6 col-lg-6" id="directionsDiv"></div>
        <div class="col-sm-12 text-center" id="print">
          <button type="button" id="print" onclick="window.print();" class="btn btn-effect-ripple btn-info text-center" style="overflow: hidden; position: relative; float: left;"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'assets/Backend/inc/page_footer.php';?>
<?php include 'assets/Backend/inc/template_scripts.php';?>

<script src="<?=base_url()?>assets/Backend/js/pages/compMaps.js"></script>
<script type="text/javascript">
  $(function () {
    CompMaps.init();
  });
</script>

<?php include 'assets/Backend/inc/template_end.php';?>
