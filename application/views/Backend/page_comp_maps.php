<?php
include 'assets/Backend/inc/config.php';
$template['header_link'] = 'BARANGAY MAP';
$template['title'] = 'BCGIS | MAP(Admin)';
?>

<?php include 'assets/Backend/inc/template_start.php';?>
<?php include 'assets/Backend/inc/page_head.php';?>
<?php /*echo $map['js'];*/?>

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
                        <!--                        <li>Map</li>-->
                        <li><a href="">Barangay Map</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Google Maps Header -->

    <iframe src="<?php echo base_url('Maps/index_content') ?>" style="zoom:0; height: 100%; width: 106%; margin-left: -3%;" scrolling="no" frameborder="0"></iframe>

</div>
<!-- END Page Content -->

<?php include 'assets/Backend/inc/page_footer.php';?>
<?php include 'assets/Backend/inc/template_scripts.php';?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
<!--<script src="<?=base_url()?>assets/Backend/js/plugins/gmaps.min.js?key=AIzaSyCOEI2-8_3KLD-2ATEQc9bZVcQgiw52Z7g"></script>-->
<script type="text/javascript">

    $('iframe').load(function() {
       iFrameResize({log: false, heightCalculationMethod: 'bodyScroll'});
    });

                                    // $(document).ready(function () {
                                    //     $("#searchDataToMarker").on('keydown', function () {
                                    //         var value = $(this).val();
                                    //         $.ajax({
                                    //             type: "POST",
                                    //             url: "<?php echo base_url('Maps/mapSearchDataInMarker') ?>",
                                    //             data: {
                                    //                 'searchDataToMarker': value
                                    //             },
                                    //             dataType: "JSON",
                                    //             success: function (searchMapDataResults) {
                                    //                 if (searchMapDataResults.length === 0) {
                                    //                     alertify.set('notifier', 'position', 'top-right');
                                    //                     alertify.error('Search result empty!');
                                    //                     return;
                                    //                 } else {
                                    //                     var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
                                    //                     var directionsService = new google.maps.DirectionsService;
                                    //                     var myOptions = {
                                    //                         zoom: 15,
                                    //                         center: new google.maps.LatLng(7.285764, 125.680568),
                                    //                         mapTypeId: google.maps.MapTypeId.HYBRID
                                    //                     },
                                    //                     map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                                    //                     for (var i = 0, length = searchMapDataResults.length; i < length; i++) {
                                    //                         var iw = new google.maps.InfoWindow();
                                    //                         var data = searchMapDataResults[i],
                                    //                                 latlong = searchMapDataResults[i]['latlong'],
                                    //                                 latLngArray = latlong.split(','),
                                    //                                 latitude = parseFloat(latLngArray[0]),
                                    //                                 longitude = parseFloat(latLngArray[1]),
                                    //                                 myLatLong = new google.maps.LatLng(latitude, longitude);
                                    //                         var markerOptions = {
                                    //                             map: map,
                                    //                             animation: google.maps.Animation.DROP,
                                    //                             position: myLatLong,
                                    //                             zoom: 15
                                    //                         },
                                    //                         marker = new google.maps.Marker(markerOptions);
                                    //                         (function (marker, data) {
                                    //                             google.maps.event.addListener(marker, "click", function () {
                                    //                                 iw.setContent("<div class='row'><h4 class='text-center'><strong>Resident's Data</strong></h4><div class='col-sm-6'>"
                                    //                                         + "<b>First Name: </b>" + data.name + "<br>"
                                    //                                         + "<b>Middle Name: </b>" + data.mname + "<br>"
                                    //                                         + "<b>Last Name: </b>" + data.lname + "<br>"
                                    //                                         + "<b>Gender: </b>" + data.gender + "<br>"
                                    //                                         + "<b>Birthdate: </b>" + data.bday + "<br>"
                                    //                                         + "<b>Age: </b>" + data.age + "<br>"
                                    //                                         + "<b>Citizenship: </b>" + data.citizenship + "<br>"
                                    //                                         + "<b>Occupation: </b>" + data.occupation + "<br>"
                                    //                                         + "<b>Status: </b>" + data.status + "<br>"
                                    //                                         + "</div><div class='col-sm-6'><b>Purok: </b>" + data.purok + "<br>"
                                    //                                         + "<b>Residential Address: </b>" + data.resAddress + "<br>"
                                    //                                         + "<b>Permanent Address: </b>" + data.perAddress + "<br>"
                                    //                                         + "<b>Email: </b>" + data.email + "<br>"
                                    //                                         + "<b>Telephone #: </b>" + data.telNum + "<br>"
                                    //                                         + "<b>Cellphone #: </b>" + data.cpNum + "<br>"
                                    //                                         + "</div></div>");
                                    //                                 iw.open(map, marker);
                                    //                                 calculateAndDisplayRoute(directionsService, directionsDisplay);
                                    //                                 directionsDisplay.setMap(map);
                                    //                                 directionsDisplay.setPanel(document.getElementById('directionsDiv'));
                                    //                             });
                                    //                         })(marker, data);
                                    //                         function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                                    //                             var start = new google.maps.LatLng(7.282397, 125.683499);
                                    //                             var end = myLatLong;
                                    //                             directionsService.route({
                                    //                                 origin: start,
                                    //                                 destination: end,
                                    //                                 travelMode: google.maps.TravelMode.DRIVING
                                    //                             }, function (response, status) {
                                    //                                 if (status === google.maps.DirectionsStatus.OK) {
                                    //                                     directionsDisplay.setDirections(response);
                                    //                                 } else {
                                    //                                     alertify.alert('Directions request failed due to ' + status + ',' + myLatLong).set('modal', false);
                                    //                                 }
                                    //                             });
                                    //                         }
                                    //                     }
                                    //                     var flightPlanCoordinates = [{lat: 7.292363, lng: 125.667018},
                                    //                         {lat: 7.291958, lng: 125.671030},
                                    //                         {lat: 7.292022, lng: 125.673777},
                                    //                         {lat: 7.291532, lng: 125.675864},
                                    //                         {lat: 7.292884, lng: 125.676464},
                                    //                         {lat: 7.292809, lng: 125.677291},
                                    //                         {lat: 7.292682, lng: 125.680069},
                                    //                         {lat: 7.292283, lng: 125.682475},
                                    //                         {lat: 7.291916, lng: 125.684653},
                                    //                         {lat: 7.290319, lng: 125.685536},
                                    //                         {lat: 7.290787, lng: 125.688089},
                                    //                         {lat: 7.292937, lng: 125.689033},
                                    //                         {lat: 7.294427, lng: 125.689951},
                                    //                         {lat: 7.296428, lng: 125.691737},
                                    //                         {lat: 7.295853, lng: 125.692123},
                                    //                         {lat: 7.295300, lng: 125.692273},
                                    //                         {lat: 7.293703, lng: 125.694247},
                                    //                         {lat: 7.294001, lng: 125.694612},
                                    //                         {lat: 7.294172, lng: 125.697123},
                                    //                         {lat: 7.291000, lng: 125.698678},
                                    //                         {lat: 7.289723, lng: 125.697091},
                                    //                         {lat: 7.287808, lng: 125.695717},
                                    //                         {lat: 7.285573, lng: 125.691866},
                                    //                         {lat: 7.284466, lng: 125.690793},
                                    //                         {lat: 7.282657, lng: 125.689763},
                                    //                         {lat: 7.279996, lng: 125.688411},
                                    //                         {lat: 7.278123, lng: 125.686930},
                                    //                         {lat: 7.277208, lng: 125.686287},
                                    //                         {lat: 7.276059, lng: 125.685600},
                                    //                         {lat: 7.274207, lng: 125.683604},
                                    //                         {lat: 7.274037, lng: 125.683175},
                                    //                         {lat: 7.275675, lng: 125.678412},
                                    //                         {lat: 7.275697, lng: 125.673975},
                                    //                         {lat: 7.280188, lng: 125.674565},
                                    //                         {lat: 7.280156, lng: 125.672009},
                                    //                         {lat: 7.286728, lng: 125.674788},
                                    //                         {lat: 7.287308, lng: 125.673302},
                                    //                         {lat: 7.288127, lng: 125.669896},
                                    //                         {lat: 7.287137, lng: 125.669834},
                                    //                         {lat: 7.287196, lng: 125.665787},
                                    //                         {lat: 7.288962, lng: 125.666312},
                                    //                         {lat: 7.288718, lng: 125.667889},
                                    //                         {lat: 7.290819, lng: 125.667830},
                                    //                         {lat: 7.291123, lng: 125.668512},
                                    //                         {lat: 7.289612, lng: 125.668116},
                                    //                         {lat: 7.289734, lng: 125.668899},
                                    //                         {lat: 7.290080, lng: 125.668830},
                                    //                         {lat: 7.290309, lng: 125.669729},
                                    //                         {lat: 7.290271, lng: 125.670128},
                                    //                         {lat: 7.290301, lng: 125.670828},
                                    //                         {lat: 7.291330, lng: 125.670852},
                                    //                         {lat: 7.291793, lng: 125.666922},
                                    //                         {lat: 7.291916, lng: 125.666885},
                                    //                         {lat: 7.292363, lng: 125.667018}
                                    //                     ];
                                    //                     var flightPath = new google.maps.Polyline({
                                    //                         path: flightPlanCoordinates,
                                    //                         geodesic: true,
                                    //                         strokeColor: '#FF0000',
                                    //                         strokeOpacity: 1.0,
                                    //                         strokeWeight: 1
                                    //                     });
                                    //                     flightPath.setMap(map);
                                    //                 }
                                    //             }, error: function () {
                                    //                 $("#searchResult").html('');
                                    //                 alertify.set('notifier', 'position', 'top-right');
                                    //                 alertify.error('Search result empty!');
                                    //                 return;
                                    //             }
                                    //         });
                                    //     });
                                    // });
</script>
<!-- Load and execute javascript code used only in this page -->
<!--<script src="<?=base_url()?>assets/Backend/js/pages/compMaps.js"></script>
<script>
    $(function () {
        CompMaps.init();
    });
</script>-->

<?php include 'assets/Backend/inc/template_end.php';?>
