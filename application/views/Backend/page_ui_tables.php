<?php
include 'assets/Backend/inc/config.php';
$template['header_link'] = 'INFORMATION TABLE';
$template['title'] = 'BCGIS | INFO. TABLE';
?>
<?php include 'assets/Backend/inc/template_start.php';?>
<?php include 'assets/Backend/inc/page_head.php';?>

<!-- <script src="http://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyAqDAnQp7hT_6HEnwQc8GgE7ApXHMpPny4"></script> -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAqDAnQp7hT_6HEnwQc8GgE7ApXHMpPny4"></script>
<script>
    var myCenter = new google.maps.LatLng(7.282397, 125.683499);
    var marker;
    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 15,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        var map = new google.maps.Map(document.getElementById("map"), mapProp);
        // google.maps.event.addDomListener(window, "resize", function() {
        //    google.maps.event.trigger(map, "resize");
        //    map.setCenter(myCenter);
        // });
marker = new google.maps.Marker({
    position: myCenter,
    draggable: true
});
marker.setMap(map);

$("#map").on("click", function(){
    google.maps.event.trigger(map,'resize');
        // map.setCenter(myCenter);
    });
google.maps.event.addListener(marker, "drag", function() {
                    document.getElementById("latlong").value = marker.getPosition().toUrlValue(); //set lat current longitude where the marker is plotted
                });

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

$('#modal_form').on('shown.bs.modal', function () {
    initialize();
});

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

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
            <div>
                <br />
                <button class="btn btn-success" id="addBtn" onclick="add_resident()"><i class="glyphicon glyphicon-plus"></i> Add Resident</button>
                <button class="btn btn-default" id="cancelBtn" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
            </div>
            <br />
            <br />
            <table id="table" class="table table-striped table-bordered table-center table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Citizenship</th>
                        <th>Occupation</th>
                        <th>Status</th>
                        <th>Purok</th>
                        <th>Residencial Address</th>
                        <th>Permanent Address</th>
                        <th>Email</th>
                        <th>Tel. #</th>
                        <th>Mobile. #</th>
                        <th style="width:125px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>


            <!-- Bootstrap modal -->
            <div class="modal fade" id="modal_form" role="dialog">
                <div class="modal-dialog" style="width: 75%; z-index: 1151;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title text-center">Resident Form</h3>
                        </div>
                        <div id="map"></div>
                        <div class="modal-body form">
                            <form action="#" class="form-horizontal form-control-borderless" id="form">
                                <div class="form-body">
                                    <div class="col-lg-6">
                                        <input type="hidden" value="" name="resident_id" id="resident_id"/>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">First Name</label>
                                            <div class="col-md-9">
                                                <input name="name" id="name" placeholder="First Name" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Middle Name</label>
                                            <div class="col-md-9">
                                                <input name="mname" id="mname" placeholder="Middle Name" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Last Name</label>
                                            <div class="col-md-9">
                                                <input name="lname" id="lname" placeholder="Last Name" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Gender</label>
                                            <div class="col-md-9">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-info" id="labelGenderMale" for="genderMale">
                                                        <input type="radio" id="genderMale" name="gender" value="Male" /><i class="gi gi-old_man"></i> Male
                                                    </label>
                                                    <label class="btn btn-danger" id="labelGenderFemale" for="genderFemale">
                                                        <input type="radio" id="genderFemale" name="gender" value="Female" /><i class="gi gi-woman"></i> Female
                                                    </label>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date of Birth</label>
                                            <div class="col-md-9">
                                                <input type="date" name="bday" id="bday" placeholder="dd MM yyyy" onchange="ageCount()" class="form-control bday-datepicker" max="2005-12-31">
                                                <!-- <div id="datetimepicker1" class="input-append date">
                                                  <input id="bday" class="form-control bday-datepicker" data-date-format="dd/MM/yyyy" format="mm/dd/yyyy" onchange="ageCount()"></input>
                                                  <span class="add-on fa fa-calendar"><i data-time-icon="icon-time" data-date-icon="fa fa-calendar"></i></span>
                                              </div> -->
                                              <span class="help-block"><span/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3">Age</label>
                                            <div class="col-md-9">
                                                <input readonly name="age" id="age" placeholder="Age" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Citizenship</label>
                                            <div class="col-md-9">
                                                <input name="citizenship" id="citizenship" placeholder="Citizenship" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Occupation</label>
                                            <div class="col-md-9">
                                                <input name="occupation" id="occupation" placeholder="Occupation" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Civil Status</label>
                                            <div class="col-md-9">
                                                <input name="status" id="status" placeholder="Civil Status" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Purok Designated</label>
                                            <div class="col-md-9">
                                                <select id="purok" name="purok" class="form-control" onchange="fillAddress()">
                                                    <option value=""></option>
                                                    <option value="Atis">Atis</option>
                                                    <option value="Avocado">Avocado</option>
                                                    <option value="Bayabas">Bayabas</option>
                                                    <option value="Boongon">Boongon</option>
                                                    <option value="Chico">Chico</option>
                                                    <option value="Durian">Durian</option>
                                                    <option value="Guyabano">Guyabano</option>
                                                    <option value="Kaimito">Kaimito</option>
                                                    <option value="Kasoy">Kasoy</option>
                                                    <option value="Lanzones">Lanzones</option>
                                                    <option value="Lomboy">Lomboy</option>
                                                    <option value="Mabolo">Mabolo</option>
                                                    <option value="Macopa">Macopa</option>
                                                    <option value="Mangga">Mangga</option>
                                                    <option value="Mangosteen">Mangosteen</option>
                                                    <option value="Mansanas">Mansanas</option>
                                                    <option value="Marang">Marang</option>
                                                    <option value="Marang Joesil">Marang Joesil</option>
                                                    <option value="Melon">Melon</option>
                                                    <option value="Nangka">Nangka</option>
                                                    <option value="Pomelo">Pomelo</option>
                                                    <option value="Rambutan">Rambutan</option>
                                                    <option value="Santol">Santol</option>
                                                    <option value="Sereguellas">Sereguellas</option>
                                                    <option value="Sunkist">Sunkist</option>
                                                    <option value="Tambis">Tambis</option>
                                                    <option value="Ubas">Ubas</option>
                                                    <option value="Fishpond/Sea wall">Fishpond/Sea wall</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Residencial Address</label>
                                            <div class="col-md-9">
                                                <textarea name="resAddress" id="resAddress" placeholder="Residencial Address" class="form-control"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Permanent Address</label>
                                            <div class="col-md-9">
                                                <textarea name="perAddress" id="perAddress" placeholder="Permanent Address" class="form-control"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email</label>
                                            <div class="col-md-9">
                                                <input name="email" id="email" placeholder="Email" class="form-control"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Telephone #</label>
                                            <div class="col-md-9">
                                                <input name="telNum" id="telNum" placeholder="Telephone #" class="form-control"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Mobile #</label>
                                            <div class="col-md-9">
                                                <input name="cpNum" id="cpNum" placeholder="Mobile #" class="form-control"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Geolocation</label>
                                            <div class="col-md-9">
                                                <input readonly name="latlong" id="latlong" placeholder="Geolocation" class="form-control"></input>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                <button type="button" id="btnCancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </center>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End Bootstrap modal -->
        </div>
    </div>
    <!-- END Datatables Block -->
</div>
<!-- END Page Content -->

<?php include 'assets/Backend/inc/page_footer.php';?>
<?php include 'assets/Backend/inc/template_scripts.php';?>

<!-- Load and execute javascript code used only in this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<link rel="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css">

<script src="<?=base_url();?>assets/Backend/js/pages/uiTables.js"></script>
<script>
    $(function () {
        UiTables.init();
    });
</script>

<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').dataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('InfoTable/ajax_list') ?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        }, ],

    });

    // $("#datetimepicker1").datetimepicker();

    // datepicker
    // $('.bday-datepicker').datepicker({
    //     // autoclose: true,
    //     // dateFormat: "mm/dd/yy",
    //     // // altFormat: "mm/dd/yy",
    //     // orientation: "top auto",
    //     // // todayBtn: true,
    //     // // todayHighlight: true,
    //     // changeMonth: true,
    //     // changeYear: true,
    //     // minDate: "01/01/1930",
    //     // maxDate: "12/31/2005"
    // });

    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function() {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function() {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function() {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    $('#table').on('process', function() {
        $(this).addClass();
    });

});

function ageCount() {
 var date1 = new Date();
 var bday = document.getElementById("bday").value;
 var date2 = new Date(bday);
     var pattern = /^\d{4}-\d{2}-\d{2}$/; // yyyy-MM-dd
     // var pattern = /(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$/;
     if (pattern.test(bday)) {
         var y1 = date1.getFullYear();
         var y2 = date2.getFullYear();
         var age = y1 - y2;
         document.getElementById("age").value = age;
     } else {
         // alertify.alert("Invalid Date format!!! Please fill in (MM/DD/YYYY) format").set('modal', false);
         if(!alertify.errorAlert){
           alertify.dialog('errorAlert',function factory(){
             return{
                 build:function(){
                     var errorHeader = '<span class="fa fa-times-circle fa-2x" '
                     +    'style="vertical-align:middle;color:#e10000;">'
                     + '</span> Date Format Error';
                     this.setHeader(errorHeader);
                 }
             };
         },true,'alert');
       }
       alertify.errorAlert("Please fill date of birth in (MM/DD/YYYY) format.<br/><br/><br/>").set('modal', false);
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

function add_resident() {
    if (checkMapConnection() === true) {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('label[class="btn btn-info active"]').removeClass('active');
        $('label[class="btn btn-danger active"]').removeClass('active');
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Resident'); // Set Title to Bootstrap modal title
        // $('#modal_form').on('shown', function () {
        //     google.maps.event.trigger(map, "resize");
        //     map.setCenter(myCenter);
        // });
        // google.maps.event.trigger(map, "resize");
    } else {
        if(!alertify.errorAlert){
           alertify.dialog('errorAlert',function factory(){
             return{
                 build:function(){
                     var errorHeader = '<span class="fa fa-times-circle fa-2x" '
                     +    'style="vertical-align:middle;color:#e10000;">'
                     + '</span> Connection Error';
                     this.setHeader(errorHeader);
                 }
             };
         },true,'alert');
       }
       alertify.errorAlert("Please connect to the Internet to Add Resident.<br/><br/><br/>").set('modal', true);
    }
}

function edit_resident(id) {
    if (checkMapConnection() === true) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('InfoTable/ajax_edit/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="resident_id"]').val(data.resident_id);
                $('[name="name"]').val(data.name);
                $('[name="mname"]').val(data.mname);
                $('[name="lname"]').val(data.lname);
                if (data.gender === "Male") {
                    $('input[type="radio"][name="gender"][id="genderMale"]').prop("checked", true);
                    $('input[type="radio"][name="gender"][id="genderFemale"]').prop("checked", false);
                    $('label[class="btn btn-danger active"][id="labelGenderFemale"]').removeClass('active');
                    $('label[class="btn btn-info"][id="labelGenderMale"]').addClass('active');
                } else if (data.gender === "Female") {
                    $('input[type="radio"][name="gender"][id="genderFemale"]').prop("checked", true);
                    $('input[type="radio"][name="gender"][id="genderMale"]').prop("checked", false);
                    $('label[class="btn btn-info active"][id="labelGenderMale"]').removeClass('active');
                    $('label[class="btn btn-danger"][id="labelGenderFemale"]').addClass('active');
                } else {
                    $('input[type="radio"][name="gender"][id="genderMale"]').prop("checked", false);
                    $('input[type="radio"][name="gender"][id="genderFemale"]').prop("checked", false);
                    $('label[class="btn btn-info"]').removeClass('active');
                    $('label[class="btn btn-danger"]').removeClass('active');
                    return;
                }
                $('[name="bday"]').val(data.bday);
                $('[name="age"]').val(data.age);
                $('[name="citizenship"]').val(data.citizenship);
                $('[name="occupation"]').val(data.occupation);
                $('[name="status"]').val(data.status);
                $('select[name="purok"]').val(data.purok);
                $('[name="resAddress"]').val(data.resAddress);
                $('[name="perAddress"]').val(data.perAddress);
                $('[name="email"]').val(data.email);
                $('[name="telNum"]').val(data.telNum);
                $('[name="cpNum"]').val(data.cpNum);
                $('[name="latlong"]').val(data.latlong);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Resident'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    } else {
        if(!alertify.errorAlert){
           alertify.dialog('errorAlert',function factory(){
             return{
                 build:function(){
                     var errorHeader = '<span class="fa fa-times-circle fa-2x" '
                     +    'style="vertical-align:middle;color:#e10000;">'
                     + '</span> Connection Error';
                     this.setHeader(errorHeader);
                 }
             };
         },true,'alert');
       }
       alertify.errorAlert("Please connect to the Internet to Edit Resident.<br/><br/><br/>").set('modal', true);
    }
}

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax
}

function save() {
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable
    var url;

    if (save_method == 'add') {
        url = "<?php echo site_url('InfoTable/ajax_add') ?>";
    } else {
        url = "<?php echo site_url('InfoTable/ajax_update') ?>";
    }

    // ajax adding data to database
    $.ajax({
        url: url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data) {

            if (data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('Retry'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable

        }
    });
}

function delete_resident(id) {
    if (confirm('Are you sure delete this data?')) {
        // ajax delete data to database
        $.ajax({
            url: "<?php echo site_url('InfoTable/ajax_delete') ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });

    }
}

function checkMapConnection() {
    $.getScript( "http://maps.googleapis.com/maps/api/js?key=AIzaSyAqDAnQp7hT_6HEnwQc8GgE7ApXHMpPny4" )
    .done(function( script, textStatus ) {
    console.log('Google maps is online!');
    return true;
})
    .fail(function( jqxhr, settings, exception ) {
    console.log('Google maps is offline!');
    // $('#map-container').remove();
    // document.getElementById('block').innerHTML = '<div class="row text-center"><div class="col-sm-12"><image src="<?php echo base_url() ?>assets/Backend/images/noConnection.png"/><br/><br/><h3>It seems you dont have a internet connection, please connect to the internet.</h3></div></div>';
    return false;
});
}


</script>

<?php include 'assets/Backend/inc/template_end.php';?>
