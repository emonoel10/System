<?php echo $map['js']; ?>
<?php include 'assets/Frontend/inc/config.php';?>
<?php include 'assets/Frontend/inc/template_start.php';?>
<?php /*include 'assets/Frontend/inc/page_head.php';*/?>

<section class="site-content site-section">
  <div class="container">
    <div class="site-block" id="site-block">
      <div class="row" id="map-container">
        <div id="mapTitle"><center><h2>Brgy. Cagangohan Residence Location</h2></center></div>
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
            <div class="col-sm-0 col-md-5 col-lg-2">
              <button type="button" id="print" onclick="javascript:this.style.display='none';window.print();this.style.display='';" class="btn btn-effect-ripple btn-info" style="overflow: hidden; position: relative; float: right;"><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
          <!-- <div id="map" style="width:106%; padding-left: -10%;"> -->
          <?php echo $map['html']; ?>
          <!-- </div> -->
        </div>
        <!-- <div class="col-sm-2 col-md-4 col-lg-0"></div> -->
        <div class="col-sm-12 col-md-12 col-lg-12" id="dataDiv"></div>
        <div class="col-sm-12 col-md-6 col-lg-6" id="residentInfoDiv"></div>
        <div class="col-sm-12 col-md-6 col-lg-6" id="directionsDiv"></div>
        <!-- <div class="col-sm-2 col-md-4 col-lg-0"></div> -->
      </div>
    </div>
  </div>
</section>

<?php include 'assets/Frontend/inc/template_scripts.php';?>

<script type="text/javascript">
  $(document).ready(function () {
    checkMapConnection();
    $("#searchDataToMarker").on('keydown', function () {
      document.getElementById('directionsDiv').innerHTML = '';
      document.getElementById('residentInfoDiv').innerHTML = '';
      document.getElementById('dataDiv').innerHTML = "";
      var value = $(this).val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Maps/mapSearchDataInMarker') ?>",
        data: {
          'searchDataToMarker': value
        },
        dataType: "JSON",
        success: function (searchMapDataResults) {
          if (searchMapDataResults.length === 0 || $("#searchDataToMarker").val() === null) {
            document.getElementById('directionsDiv').innerHTML = '';
            document.getElementById('residentInfoDiv').innerHTML = '';
            document.getElementById('dataDiv').innerHTML = "";
            alertify.set('notifier', 'position', 'top-right');
            alertify.error('Search result empty!');
            return;
          } else {
            var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
            var directionsService = new google.maps.DirectionsService;
            var myOptions = {
              zoom: 15,
              // map_height: 100%,
              // map_width: 100%,
              streetViewControl: false,
              center: new google.maps.LatLng(7.285764, 125.680568),
              mapTypeId: google.maps.MapTypeId.HYBRID
            },
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            for (var i = 0, length = searchMapDataResults.length; i < length; i++) {
              var iw = new google.maps.InfoWindow();
              var data = searchMapDataResults[i];
              var latlong = searchMapDataResults[i]['latlong'],
              latLngArray = latlong.split(','),
              latitude = parseFloat(latLngArray[0]),
              longitude = parseFloat(latLngArray[1]),
              myLatLong = new google.maps.LatLng(latitude, longitude);
              var markerOptions = {
                map: map,
                animation: google.maps.Animation.DROP,
                position: myLatLong,
                zoom: 14
              },
              marker = new google.maps.Marker(markerOptions);
              (function (marker, data) {
                google.maps.event.addListener(marker, "click", function () {
                 document.getElementById('directionsDiv').innerHTML = '';
                 document.getElementById('residentInfoDiv').innerHTML = '';
                 document.getElementById('dataDiv').innerHTML = "<h3 class='text-center'><strong>Resident's Data</strong></h3>";
                 document.getElementById('residentInfoDiv').innerHTML = "<div class='row'><h4 class='text-center'><strong>Information</strong></h4><div class='col-sm-6' id='resInfoTitleDist'>"
                 + "<b>First Name: </b>" + data.name + "<br><br>"
                 + "<b>Middle Name: </b>" + data.mname + "<br><br>"
                 + "<b>Last Name: </b>" + data.lname + "<br><br>"
                 + "<b>Gender: </b>" + data.gender + "<br><br>"
                 + "<b>Birthdate: </b>" + data.bday + "<br><br>"
                 + "<b>Age: </b>" + data.age + "<br><br>"
                 + "<b>Citizenship: </b>" + data.citizenship + "<br><br>"
                 + "<b>Occupation: </b>" + data.occupation + "<br><br>"
                 + "<b>Status: </b>" + data.status + "<br><br>"
                 + "</div><div class='col-sm-6' id='resInfoTitleDist'><b>Purok: </b>" + data.purok + "<br><br>"
                 + "<b>Residential Address: </b>" + data.resAddress + "<br><br>"
                 + "<b>Permanent Address: </b>" + data.perAddress + "<br><br>"
                 + "<b>Email: </b>" + data.email + "<br><br>"
                 + "<b>Telephone #: </b>" + data.telNum + "<br><br>"
                 + "<b>Cellphone #: </b>" + data.cpNum + "<br><br>"
                 + "</div></div>";
                 directionsDisplay.setMap(map);
                 calculateAndDisplayRoute(data.latlong);
                 document.getElementById('directionsDiv').innerHTML = "<h4 class='text-center'><strong>Location</strong></h4>";
                 directionsDisplay.setPanel(document.getElementById('directionsDiv'));
                 var bounds = new google.maps.LatLngBounds(myLatLong, myLatLong);

                 google.maps.event.addListener(map, 'bounds_changed', function () {
                   if (bounds.contains(map.getCenter())) return;
                   var c = map.getCenter(),
                   x = c.lng(),
                   y = c.lat(),
                   maxX = bounds.getNorthEast().lng(),
                   maxY = bounds.getNorthEast().lat(),
                   minX = bounds.getSouthWest().lng(),
                   minY = bounds.getSouthWest().lat();
                   if (x < minX) {
                     x = minX
                   };
                   if (x > maxX) {
                     x = maxX
                   };
                   if (y < minY) {
                     y = minY
                   };
                   if (y > maxY) {
                     y = maxY
                   };
                   map.setCenter(new google.maps.LatLng(y, x));
                 });
               });
})(marker, data);
function calculateAndDisplayRoute(latLongDest) {
  var start = new google.maps.LatLng(7.282397, 125.683499);
  var end = latLongDest;
  directionsService.route({
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  }, function (response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      alertify.alert('Directions request failed due to ' + status + ',' + myLatLong).set('modal', false);
    }
  });
}
}
var flightPlanCoordinates = [{lat: 7.292363, lng: 125.667018},
{lat: 7.291958, lng: 125.671030},
{lat: 7.292022, lng: 125.673777},
{lat: 7.291532, lng: 125.675864},
{lat: 7.292884, lng: 125.676464},
{lat: 7.292809, lng: 125.677291},
{lat: 7.292682, lng: 125.680069},
{lat: 7.292283, lng: 125.682475},
{lat: 7.291916, lng: 125.684653},
{lat: 7.290319, lng: 125.685536},
{lat: 7.290787, lng: 125.688089},
{lat: 7.292937, lng: 125.689033},
{lat: 7.294427, lng: 125.689951},
{lat: 7.296428, lng: 125.691737},
{lat: 7.295853, lng: 125.692123},
{lat: 7.295300, lng: 125.692273},
{lat: 7.293703, lng: 125.694247},
{lat: 7.294001, lng: 125.694612},
{lat: 7.294172, lng: 125.697123},
{lat: 7.291000, lng: 125.698678},
{lat: 7.289723, lng: 125.697091},
{lat: 7.287808, lng: 125.695717},
{lat: 7.285573, lng: 125.691866},
{lat: 7.284466, lng: 125.690793},
{lat: 7.282657, lng: 125.689763},
{lat: 7.279996, lng: 125.688411},
{lat: 7.278123, lng: 125.686930},
{lat: 7.277208, lng: 125.686287},
{lat: 7.276059, lng: 125.685600},
{lat: 7.274207, lng: 125.683604},
{lat: 7.274037, lng: 125.683175},
{lat: 7.275675, lng: 125.678412},
{lat: 7.275697, lng: 125.673975},
{lat: 7.280188, lng: 125.674565},
{lat: 7.280156, lng: 125.672009},
{lat: 7.286728, lng: 125.674788},
{lat: 7.287308, lng: 125.673302},
{lat: 7.288127, lng: 125.669896},
{lat: 7.287137, lng: 125.669834},
{lat: 7.287196, lng: 125.665787},
{lat: 7.288962, lng: 125.666312},
{lat: 7.288718, lng: 125.667889},
{lat: 7.290819, lng: 125.667830},
{lat: 7.291123, lng: 125.668512},
{lat: 7.289612, lng: 125.668116},
{lat: 7.289734, lng: 125.668899},
{lat: 7.290080, lng: 125.668830},
{lat: 7.290309, lng: 125.669729},
{lat: 7.290271, lng: 125.670128},
{lat: 7.290301, lng: 125.670828},
{lat: 7.291330, lng: 125.670852},
{lat: 7.291793, lng: 125.666922},
{lat: 7.291916, lng: 125.666885},
{lat: 7.292363, lng: 125.667018}
];
var flightPath = new google.maps.Polyline({
  path: flightPlanCoordinates,
  geodesic: true,
  strokeColor: '#FF0000',
  strokeOpacity: 1.0,
  strokeWeight: 2
});
flightPath.setMap(map);

var strictBounds = new google.maps.LatLngBounds(new google.maps.LatLng(7.274053,125.666105),new google.maps.LatLng(7.296828,125.698691));

google.maps.event.addListener(map, 'bounds_changed', function () {
 if (strictBounds.contains(map.getCenter())) return;
 var c = map.getCenter(),
 x = c.lng(),
 y = c.lat(),
 maxX = strictBounds.getNorthEast().lng(),
 maxY = strictBounds.getNorthEast().lat(),
 minX = strictBounds.getSouthWest().lng(),
 minY = strictBounds.getSouthWest().lat();
 if (x < minX) {
   x = minX
 };
 if (x > maxX) {
   x = maxX
 };
 if (y < minY) {
   y = minY
 };
 if (y > maxY) {
   y = maxY
 };
 map.setCenter(new google.maps.LatLng(y, x));
});
}
}, error: function () {
  $("#searchResult").html('');
  alertify.set('notifier', 'position', 'top-right');
  alertify.error('Search result empty!');
  return;
}
});
});

function checkMapConnection() {
  $.getScript("http://maps.googleapis.com/maps/api/js?key=AIzaSyAqDAnQp7hT_6HEnwQc8GgE7ApXHMpPny4")
  .done(function( script, textStatus ) {
    console.log('Google maps is online!');
  })
  .fail(function( jqxhr, settings, exception ) {
    console.log('Google maps is offline!');
        // alertify.alert('Google maps is offline!');
        $('#map-container').remove();
        document.getElementById('site-block').innerHTML = '<div class="row text-center"><div class="col-sm-12"><image src="<?php echo base_url() ?>assets/Frontend/images/noConnection.png"/><br/><br/><h3>It seems you dont have a internet connection, please connect to the internet.</h3></div></div>';
      });
}

// if ('matchMedia' in window) {
//     // Chrome, Firefox, and IE 10 support mediaMatch listeners
//     window.matchMedia('print').addListener(function(media) {
//       if (media.matches) {
//         beforePrint();
//       } else {
//         // Fires immediately, so wait for the first mouse movement
//         $(document).one('mouseover', afterPrint);
//       }
//     });
//   } else {
//     // IE and Firefox fire before/after events
//     $(window).on('beforeprint', beforePrint);
//     $(window).on('afterprint', afterPrint);
//   }

//   function beforePrint() {
//     // $("#AllContent").hide();
//     // $(".PrintMessage").show();
//     // $('.site-section .container h1').hide();
//     // $('img[src="http://maps.gstatic.com/mapfiles/google_white.png"').css('display','none !important');
//     // $('#map-report div.gmnoprint, #map-report div.gmnoscreen').css('display','none !important');
//     // $('#map-canvas').css('width','700px');
//     // $(window).style.display='none';
//     this.style.display='none';
//   }

//   function afterPrint() {
//   // $(".PrintMessage").hide();
//   // $("#AllContent").show();
//   // $('#map-container').css('width','100%');
//   // $('#map-container').css('height','100%');
//   // $('.site-section .container h1').show();
//   // $('#map-container').css('width','100%');
//   // $(window).style.display='';
//   this.style.display='';
// }

});
</script>

<?php include 'assets/Frontend/inc/template_end.php';?>