<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>

            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script>
            var myCenter = new google.maps.LatLng(7.281300, 125.684750);
            var marker;
            function initialize() {
                var mapProp = {
                    center: myCenter,
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                marker = new google.maps.Marker({
                    position: myCenter,
                    draggable: true
                });
                marker.setMap(map);
                google.maps.event.addListener(marker, "drag", function() {
                    document.getElementById("grid").value = marker.getPosition().toUrlValue(); //set lat current longitude where the marker is plotted
                });
//        google.maps.event.addListener(marker, "ondragend", function() {       
//        var myLatlong =  document.getElementById("grid");
//                    // document.getElementById("grid").value = marker.position.toUrlValue();
//               
//    var directionsDisplay = new google.maps.DirectionsRenderer;
//                var directionsService = new google.maps.DirectionsService;
//                console.log(myLatlong);
//
//                var myLatlong = latlong.split(',');
//                var latitude = parseFloat(myLatlong[0]);
//                var longitude = parseFloat(myLatlong[1]);
//
//                function calculateAndDisplayRoute(directionsService, directionsDisplay) {
//                    var start = new google.maps.LatLng(7.281300, 125.684750);
//                    var end = new google.maps.LatLng(latitude,longitude);
//                    directionsService.route({
//                        origin: start,
//                        destination: end,
//                        travelMode: google.maps.TravelMode.DRIVING
//                    }, function(response, status) {
//                        if (status === google.maps.DirectionsStatus.OK) {
//                            directionsDisplay.setDirections(response);
//                        } else {
//                            alertify.alert('Directions request failed due to ' + status + ',' + myLatLong).set('modal', false);
//                        }
//                    });
//                }
//                google.maps.event.addListener(marker, "click", function() {
//
//                    calculateAndDisplayRoute(directionsService, directionsDisplay);
//                    directionsDisplay.setMap(map);
//                    $('directionsDiv');
//                    directionsDisplay.setPanel(document.getElementById('directionsDiv'));
//                });
//
////    });


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

                //sunkist
                var PurokSunkist = [{lat: 7.286877, lng: 125.674819},
                    {lat: 7.286781, lng: 125.674996},
                    {lat: 7.286712, lng: 125.675229},
                    {lat: 7.286584, lng: 125.675473},
                    {lat: 7.286448, lng: 125.675632},
                    {lat: 7.284572, lng: 125.676616},
                    {lat: 7.289338, lng: 125.678617},
                    {lat: 7.289348, lng: 125.675876},
                    {lat: 7.286877, lng: 125.674819}
                ];
                var flightPath2 = new google.maps.Polyline({
                    path: PurokSunkist,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
                //mansanas

                var PurokMansanas = [{lat: 7.284455, lng: 125.676637},
                    {lat: 7.283266, lng: 125.677008},
                    {lat: 7.282947, lng: 125.677163},
                    {lat: 7.282439, lng: 125.677734},
                    {lat: 7.282319, lng: 125.678131},
                    {lat: 7.285091, lng: 125.678577},
                    {lat: 7.284876, lng: 125.679395},
                    {lat: 7.284804, lng: 125.679400},
                    {lat: 7.285275, lng: 125.679408},
                    {lat: 7.285959, lng: 125.677292},
                    {lat: 7.284455, lng: 125.676637}
                ];
                var flightPath3 = new google.maps.Polyline({
                    path: PurokMansanas,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//lanzones

                var PurokLanzones = [{lat: 7.288149, lng: 125.669822},
                    {lat: 7.287217, lng: 125.669796},
                    {lat: 7.287196, lng: 125.665787},
                    {lat: 7.288962, lng: 125.666312},
                    {lat: 7.288718, lng: 125.667889},
                    {lat: 7.288672, lng: 125.667813},
                    {lat: 7.290819, lng: 125.667825},
                    {lat: 7.291123, lng: 125.668512},
                    {lat: 7.289612, lng: 125.668116},
                    {lat: 7.289694, lng: 125.668921},
                    {lat: 7.290085, lng: 125.668830},
                    {lat: 7.290322, lng: 125.669795},
                    {lat: 7.290311, lng: 125.670120},
                    {lat: 7.289385, lng: 125.670077},
                    {lat: 7.289377, lng: 125.669943},
                    {lat: 7.288149, lng: 125.669822}];
                var flightPath4 = new google.maps.Polyline({
                    path: PurokLanzones,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });

                //tambis
                var PurokTambis = [{lat: 7.288212, lng: 125.669896},
                    {lat: 7.287430, lng: 125.673277},
                    {lat: 7.286922, lng: 125.674677},
                    {lat: 7.289811, lng: 125.675927},
                    {lat: 7.290077, lng: 125.675243},
                    {lat: 7.289324, lng: 125.674897},
                    {lat: 7.289319, lng: 125.673656},
                    {lat: 7.289079, lng: 125.673613},
                    {lat: 7.289345, lng: 125.669971},
                    {lat: 7.288212, lng: 125.669896}];
                var flightPath5 = new google.maps.Polyline({
                    path: PurokTambis,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//mangosteen

                var PurokMangosteen = [{lat: 7.292363, lng: 125.667018},
                    {lat: 7.291916, lng: 125.671186},
                    {lat: 7.291389, lng: 125.671178},
                    {lat: 7.291330, lng: 125.670852},
                    {lat: 7.291793, lng: 125.666922},
                    {lat: 7.291916, lng: 125.666885},
                    {lat: 7.292363, lng: 125.667018}];
                var flightPath6 = new google.maps.Polyline({
                    path: PurokMangosteen,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//macopa

                var PurokMacopa = [{lat: 7.275314, lng: 125.680040},
                    {lat: 7.275203, lng: 125.680053},
                    {lat: 7.275123, lng: 125.680233},
                    {lat: 7.275059, lng: 125.680520},
                    {lat: 7.274934, lng: 125.681021},
                    {lat: 7.274578, lng: 125.681947},
                    {lat: 7.274365, lng: 125.682403},
                    {lat: 7.274221, lng: 125.683519},
                    {lat: 7.275065, lng: 125.684253},
                    {lat: 7.275768, lng: 125.684945},
                    {lat: 7.276890, lng: 125.681727},
                    {lat: 7.276012, lng: 125.681249},
                    {lat: 7.275690, lng: 125.680903},
                    {lat: 7.275519, lng: 125.680488},
                    {lat: 7.275373, lng: 125.680252},
                    {lat: 7.275304, lng: 125.680040}];
                var flightPath7 = new google.maps.Polyline({
                    path: PurokMacopa,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//chico

                var PurokChico = [{lat: 7.291389, lng: 125.671178},
                    {lat: 7.291330, lng: 125.670852},
                    {lat: 7.290301, lng: 125.670828},
                    {lat: 7.290311, lng: 125.670120},
                    {lat: 7.289385, lng: 125.670077},
                    {lat: 7.289287, lng: 125.671805},
                    {lat: 7.291288, lng: 125.671977},
                    {lat: 7.291389, lng: 125.671178}];
                var flightPath8 = new google.maps.Polyline({
                    path: PurokChico,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//avocado

                var PurokAvocado = [{lat: 7.289379, lng: 125.676738},
                    {lat: 7.289400, lng: 125.675904},
                    {lat: 7.292840, lng: 125.677355},
                    {lat: 7.292776, lng: 125.678165},
                    {lat: 7.289379, lng: 125.676738}];
                var flightPath9 = new google.maps.Polyline({
                    path: PurokAvocado,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//kaimito

                var PurokKaimito = [{lat: 7.292817, lng: 125.677185},
                    {lat: 7.289811, lng: 125.675927},
                    {lat: 7.290077, lng: 125.675243},
                    {lat: 7.289324, lng: 125.674897},
                    {lat: 7.289319, lng: 125.673656},
                    {lat: 7.289079, lng: 125.673613},
                    {lat: 7.289287, lng: 125.671805},
                    {lat: 7.291288, lng: 125.671977},
                    {lat: 7.291389, lng: 125.671178},
                    {lat: 7.291916, lng: 125.671186},
                    {lat: 7.292022, lng: 125.673777},
                    {lat: 7.291532, lng: 125.675864},
                    {lat: 7.292884, lng: 125.676464}];
                var flightPath10 = new google.maps.Polyline({
                    path: PurokKaimito,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//pomelo

                var PurokPomelo = [{lat: 7.289379, lng: 125.676738},
                    {lat: 7.289306, lng: 125.678605},
                    {lat: 7.291592, lng: 125.679562},
                    {lat: 7.292156, lng: 125.677977},
                    {lat: 7.289379, lng: 125.676738}];
                var flightPath11 = new google.maps.Polyline({
                    path: PurokPomelo,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//atis

                var PurokAtis = [{lat: 7.292778, lng: 125.678237},
                    {lat: 7.292510, lng: 125.681394},
                    {lat: 7.291156, lng: 125.680874},
                    {lat: 7.292177, lng: 125.677985},
                    {lat: 7.292778, lng: 125.678237}];
                var flightPath12 = new google.maps.Polyline({
                    path: PurokAtis,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//rambutan

                var PurokRambutan = [{lat: 7.290847, lng: 125.681829},
                    {lat: 7.291209, lng: 125.680984},
                    {lat: 7.292446, lng: 125.681448},
                    {lat: 7.292241, lng: 125.682438},
                    {lat: 7.290858, lng: 125.681834},
                    {lat: 7.290847, lng: 125.681829}];
                var flightPath13 = new google.maps.Polyline({
                    path: PurokRambutan,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//melon

                var PurokMelon = [{lat: 7.292268, lng: 125.682542},
                    {lat: 7.290834, lng: 125.681898},
                    {lat: 7.290491, lng: 125.682858},
                    {lat: 7.291353, lng: 125.682880},
                    {lat: 7.291581, lng: 125.684210},
                    {lat: 7.291964, lng: 125.684173},
                    {lat: 7.292268, lng: 125.682542}];
                var flightPath14 = new google.maps.Polyline({
                    path: PurokMelon,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//santol

                var PurokSantol = [{lat: 7.283940, lng: 125.687737},
                    {lat: 7.283488, lng: 125.687477},
                    {lat: 7.283009, lng: 125.687579},
                    {lat: 7.282968, lng: 125.688141},
                    {lat: 7.282064, lng: 125.689515},
                    {lat: 7.284466, lng: 125.690793},
                    {lat: 7.285575, lng: 125.688420},
                    {lat: 7.285686, lng: 125.688008},
                    {lat: 7.283868, lng: 125.688832}];
                var flightPath15 = new google.maps.Polyline({
                    path: PurokSantol,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//sereguellas

                var PurokSereguellas = [{lat: 7.291964, lng: 125.684173},
                    {lat: 7.291581, lng: 125.684210},
                    {lat: 7.291353, lng: 125.682880},
                    {lat: 7.290491, lng: 125.682858},
                    {lat: 7.288678, lng: 125.682802},
                    {lat: 7.290319, lng: 125.685536},
                    {lat: 7.291916, lng: 125.684653}];
                var flightPath16 = new google.maps.Polyline({
                    path: PurokSereguellas,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//fish pond

                var Fishpond = [{lat: 7.284466, lng: 125.690793},
                    {lat: 7.285613, lng: 125.688408},
                    {lat: 7.286145, lng: 125.688161},
                    {lat: 7.286486, lng: 125.688241},
                    {lat: 7.286693, lng: 125.688944},
                    {lat: 7.286534, lng: 125.689127},
                    {lat: 7.287410, lng: 125.689317},
                    {lat: 7.288368, lng: 125.689048},
                    {lat: 7.289226, lng: 125.689035},
                    {lat: 7.290507, lng: 125.687975},
                    {lat: 7.290787, lng: 125.688089},
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
                    {lat: 7.279996, lng: 125.688411}];
                var flightPath17 = new google.maps.Polyline({
                    path: Fishpond,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//ubas

                var PurokUbas = [{lat: 7.289310, lng: 125.678681},
                    {lat: 7.289278, lng: 125.679735},
                    {lat: 7.287565, lng: 125.680247},
                    {lat: 7.285363, lng: 125.679422},
                    {lat: 7.285275, lng: 125.679408},
                    {lat: 7.285959, lng: 125.677292},
                    {lat: 7.289310, lng: 125.678681}];
                var flightPath18 = new google.maps.Polyline({
                    path: PurokUbas,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//bayabas

                var PurokBayabas = [{lat: 7.289095, lng: 125.681504},
                    {lat: 7.288678, lng: 125.682802},
                    {lat: 7.290491, lng: 125.682858},
                    {lat: 7.291156, lng: 125.680874},
                    {lat: 7.289278, lng: 125.679735},
                    {lat: 7.287565, lng: 125.680247},
                    {lat: 7.287558, lng: 125.681054}];
                var flightPath19 = new google.maps.Polyline({
                    path: PurokBayabas,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//kasoy

                var PurokKasoy = [{lat: 7.291575, lng: 125.679636},
                    {lat: 7.291156, lng: 125.680874},
                    {lat: 7.289278, lng: 125.679735},
                    {lat: 7.289310, lng: 125.678681}];
                var flightPath20 = new google.maps.Polyline({
                    path: PurokKasoy,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//boongon

                var PurokBoongon = [{lat: 7.284079, lng: 125.683373},
                    {lat: 7.284057, lng: 125.684456},
                    {lat: 7.282543, lng: 125.684363},
                    {lat: 7.282149, lng: 125.689615},
                    {lat: 7.279839, lng: 125.688108},
                    {lat: 7.278502, lng: 125.687332},
                    {lat: 7.280543, lng: 125.683911},
                    {lat: 7.281906, lng: 125.684834},
                    {lat: 7.282491, lng: 125.684008},
                    {lat: 7.281536, lng: 125.683327},
                    {lat: 7.284079, lng: 125.683373}];
                var flightPath21 = new google.maps.Polyline({
                    path: PurokBoongon,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//durian


                var PurokDurian = [{lat: 7.285019, lng: 125.684404},
                    {lat: 7.283488, lng: 125.687477},
                    {lat: 7.283009, lng: 125.687579},
                    {lat: 7.282968, lng: 125.688141},
                    {lat: 7.282064, lng: 125.689515},
                    {lat: 7.282543, lng: 125.684363}];
                var flightPath22 = new google.maps.Polyline({
                    path: PurokDurian,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//manga

                var PurokManga = [{lat: 7.286714, lng: 125.674719},
                    {lat: 7.286437, lng: 125.675513},
                    {lat: 7.284479, lng: 125.676564},
                    {lat: 7.282989, lng: 125.676972},
                    {lat: 7.282989, lng: 125.676972},
                    {lat: 7.281050, lng: 125.679919},
                    {lat: 7.283551, lng: 125.681432},
                    {lat: 7.280374, lng: 125.680914},
                    {lat: 7.279863, lng: 125.681638},
                    {lat: 7.281523, lng: 125.682754},
                    {lat: 7.280631, lng: 125.683673},
                    {lat: 7.278502, lng: 125.687332},
                    {lat: 7.275768, lng: 125.684945},
                    {lat: 7.276890, lng: 125.681727},
                    {lat: 7.276012, lng: 125.681249},
                    {lat: 7.275690, lng: 125.680903},
                    {lat: 7.275519, lng: 125.680488},
                    {lat: 7.275373, lng: 125.680252},
                    {lat: 7.275314, lng: 125.680040},
                    {lat: 7.275326, lng: 125.679912},
                    {lat: 7.275841, lng: 125.674060},
                    {lat: 7.280226, lng: 125.674532},
                    {lat: 7.280258, lng: 125.672065},
                    {lat: 7.286714, lng: 125.674719}];
                var flightPath23 = new google.maps.Polyline({
                    path: PurokManga,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//mabolo

                var PurokMabolo = [{lat: 7.282997, lng: 125.678267},
                    {lat: 7.283051, lng: 125.679844},
                    {lat: 7.282093, lng: 125.680584},
                    {lat: 7.281050, lng: 125.679919},
                    {lat: 7.282173, lng: 125.678307},
                    {lat: 7.282316, lng: 125.678082},
                    {lat: 7.282997, lng: 125.678267}];
                var flightPath24 = new google.maps.Polyline({
                    path: PurokMabolo,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//lomboy


                var PurokLomboy = [{lat: 7.280374, lng: 125.680914},
                    {lat: 7.283551, lng: 125.681432},
                    {lat: 7.284051, lng: 125.683406},
                    {lat: 7.281327, lng: 125.683264},
                    {lat: 7.281523, lng: 125.682754},
                    {lat: 7.279863, lng: 125.681638},
                    {lat: 7.280342, lng: 125.680914}];
                var flightPath25 = new google.maps.Polyline({
                    path: PurokLomboy,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//guyabano

                var PurokGuyabano = [{lat: 7.287669, lng: 125.683073},
                    {lat: 7.286084, lng: 125.683127},
                    {lat: 7.286009, lng: 125.683953},
                    {lat: 7.285073, lng: 125.683975},
                    {lat: 7.285019, lng: 125.684404},
                    {lat: 7.284057, lng: 125.684456},
                    {lat: 7.284051, lng: 125.683406},
                    {lat: 7.283551, lng: 125.681432},
                    {lat: 7.282093, lng: 125.680584},
                    {lat: 7.283051, lng: 125.679844},
                    {lat: 7.282997, lng: 125.678267},
                    {lat: 7.285091, lng: 125.678577},
                    {lat: 7.284876, lng: 125.679395},
                    {lat: 7.285275, lng: 125.679408},
                    {lat: 7.287565, lng: 125.680247}];
                var flightPath26 = new google.maps.Polyline({
                    path: PurokGuyabano,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
                //marangjoesil

                var PurokMarangJoesil = [{lat: 7.281523, lng: 125.682754},
                    {lat: 7.281327, lng: 125.683264},
                    {lat: 7.282491, lng: 125.684008},
                    {lat: 7.281906, lng: 125.684834},
                    {lat: 7.280543, lng: 125.683911}];
                var flightPath27 = new google.maps.Polyline({
                    path: PurokMarangJoesil,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });

//marang
                var PurokMarang = [{lat: 7.288233, lng: 125.683835},
                    {lat: 7.285924, lng: 125.685562},
                    {lat: 7.286818, lng: 125.686432},
                    {lat: 7.285686, lng: 125.688008},
                    {lat: 7.283868, lng: 125.688832},
                    {lat: 7.283940, lng: 125.687737},
                    {lat: 7.283488, lng: 125.687477},
                    {lat: 7.285019, lng: 125.684404},
                    {lat: 7.285073, lng: 125.683975},
                    {lat: 7.285019, lng: 125.684404},
                    {lat: 7.285073, lng: 125.683975},
                    {lat: 7.286009, lng: 125.683953},
                    {lat: 7.286084, lng: 125.683127},
                    {lat: 7.287669, lng: 125.683073}];
                var flightPath28 = new google.maps.Polyline({
                    path: PurokMarang,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
//nangka
                var PurokNangka = [{lat: 7.290319, lng: 125.685536},
                    {lat: 7.290787, lng: 125.688089},
                    {lat: 7.290507, lng: 125.687975},
                    {lat: 7.289226, lng: 125.689035},
                    {lat: 7.288368, lng: 125.689048},
                    {lat: 7.287410, lng: 125.689317},
                    {lat: 7.286534, lng: 125.689127},
                    {lat: 7.286693, lng: 125.688944},
                    {lat: 7.286486, lng: 125.688241},
                    {lat: 7.286145, lng: 125.688161},
                    {lat: 7.285613, lng: 125.688408},
                    {lat: 7.285686, lng: 125.688008},
                    {lat: 7.286818, lng: 125.686432},
                    {lat: 7.285924, lng: 125.685562},
                    {lat: 7.288233, lng: 125.683835},
                    {lat: 7.287669, lng: 125.683073},
                    {lat: 7.287558, lng: 125.681054},
                    {lat: 7.289095, lng: 125.681504},
                    {lat: 7.288678, lng: 125.682802}];
                var flightPath29 = new google.maps.Polyline({
                    path: PurokNangka,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });




                flightPath.setMap(map);
                flightPath2.setMap(map);
                flightPath3.setMap(map);
                flightPath4.setMap(map);
                flightPath5.setMap(map);
                flightPath6.setMap(map);
                flightPath7.setMap(map);
                flightPath8.setMap(map);
                flightPath9.setMap(map);
                flightPath10.setMap(map);
                flightPath11.setMap(map);
                flightPath12.setMap(map);
                flightPath13.setMap(map);
                flightPath14.setMap(map);
                flightPath15.setMap(map);
                flightPath16.setMap(map);
                flightPath17.setMap(map);
                flightPath18.setMap(map);
                flightPath19.setMap(map);
                flightPath20.setMap(map);
                flightPath21.setMap(map);
                flightPath22.setMap(map);
                flightPath23.setMap(map);
                flightPath24.setMap(map);
                flightPath25.setMap(map);
                flightPath26.setMap(map);
                flightPath27.setMap(map);
                flightPath28.setMap(map);
                flightPath29.setMap(map);

            }

            google.maps.event.addDomListener(window, 'load', initialize);
            function ageCount() {
                var date1 = new Date();
                var bday = document.getElementById("bday").value;
                var date2 = new Date(bday);
                var pattern = /^\d{4}-\d{2}-\d{2}$/;
                if (pattern.test(bday)) {
                    var y1 = date1.getFullYear();
                    var y2 = date2.getFullYear();
                    var age = y1 - y2;
                    document.getElementById("age").value = age;
                } else {
                    alertify.alert("invalid date format.!! Please enter in (YYYY-MM-DD) format").set('modal', false);
                    document.getElementById("age").value = "";
                    return false;
                }
            }


            function fillAddress() {
                var purok = document.getElementById("purok").value;
                if (purok === "") {
                    document.getElementById("resAddress").value = "";
                    document.getElementById("perAddress").value = "";
                } else {
                    document.getElementById("resAddress").value = "Prk. " + purok + ", Panabo City, Davao del Norte, Philippines 8105";
                    document.getElementById("perAddress").value = "Prk. " + purok + ", Panabo City, Davao del Norte, Philippines 8105";
                }
            }
        </script>
    </head>
    <body id="body" class="body">
        <div id="googleMap" style="width:560px;height:380px;"></div>
        <div id="directionsDiv"></div>  
        <div class="block full" style="margin:0 0 0px;">
            <div class="block-content-full">
                <?php echo $output; ?>
            </div>
        </div>
        <div class="block footer"></div>
    </body>
</html>
