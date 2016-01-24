/*
 *  Document   : compMaps.js
 *  Description: Custom javascript code used in Maps page
 */

var CompMaps = function() {
    return {
        init: function() {
            $("#searchDataToMarker").on('keydown', function() {
                document.getElementById('directionsDiv').innerHTML = "";
                document.getElementById('residentInfoDiv').innerHTML = "";
                document.getElementById('dataTitle').innerHTML = "";
                var value = $(this).val();
                $.ajax({
                    type: "POST",
                    url: window.location.origin + "/Maps/mapSearchDataInMarker",
                    data: {
                        'searchDataToMarker': value
                    },
                    dataType: "JSON",
                    success: function(searchMapDataResults) {
                        if (searchMapDataResults.length === 0 || $("#searchDataToMarker").val() === null) {
                            document.getElementById('directionsDiv').innerHTML = "";
                            document.getElementById('residentInfoDiv').innerHTML = "";
                            document.getElementById('dataTitle').innerHTML = "";
                            document.getElementById('directionsDiv').innerHeight = "0%";
                            document.getElementById('residentInfoDiv').innerHeight = "0%";
                            document.getElementById('dataTitle').innerHeight = "0%";
                            $.bootstrapGrowl("<h4><strong>Resident not found!</strong></h4> <p>Search result empty!</p>", {
                                type: "warning",
                                delay: 2500,
                                width: "auto",
                                allow_dismiss: true,
                                offset: {
                                    from: 'top',
                                    amount: 20
                                }
                            });
                            return;
                        } else {
                            var directionsDisplay = new google.maps.DirectionsRenderer({
                                suppressMarkers: true
                            });
                            var directionsService = new google.maps.DirectionsService;
                            var myCenter = new google.maps.LatLng(7.285764, 125.680568)
                            var myOptions = {
                                    zoom: 15,
                                    streetViewControl: false,
                                    center: myCenter,
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
                                (function(marker, data) {
                                    google.maps.event.addListener(marker, "click", function() {
                                        document.getElementById('directionsDiv').innerHTML = '';
                                        document.getElementById('residentInfoDiv').innerHTML = '';
                                        document.getElementById('dataTitle').innerHTML = "<h2 class='text-center'><strong>Resident's Data</strong><br></h2>";
                                        document.getElementById('residentInfoDiv').innerHTML = "<div class='row text-center'><h4 class='text-center' style='text-decoration: underline;'><strong>Information</strong></h4><div class='col-sm-6' id='resInfoTitleDist'>" + "<b>First Name: </b>" + data.name + "<br><br>" + "<b>Middle Name: </b>" + data.mname + "<br><br>" + "<b>Last Name: </b>" + data.lname + "<br><br>" + "<b>Gender: </b>" + data.gender + "<br><br>" + "<b>Birthdate: </b>" + data.bday + "<br><br>" + "<b>Age: </b>" + data.age + "<br><br>" + "<b>Citizenship: </b>" + data.citizenship + "<br><br>" + "<b>Occupation: </b>" + data.occupation + "<br><br>" + "</div><div class='col-sm-6' id='resInfoTitleDist'><b>Status: </b>" + data.status + "<br><br>" + "<b>Purok: </b>" + data.purok + "<br><br>" + "<b>Residential Address: </b>" + data.resAddress + "<br><br>" + "<b>Permanent Address: </b>" + data.perAddress + "<br><br>" + "<b>Email: </b>" + data.email + "<br><br>" + "<b>Telephone #: </b>" + data.telNum + "<br><br>" + "<b>Cellphone #: </b>" + data.cpNum + "<br><br>" + "</div></div>";
                                        directionsDisplay.setMap(map);
                                        calculateAndDisplayRoute(data.latlong);
                                        document.getElementById('directionsDiv').innerHTML = "<h4 class='text-center' style='text-decoration: underline;'><strong>Location</strong><br><br></h4>";
                                        directionsDisplay.setPanel(document.getElementById('directionsDiv'));
                                        var bounds = new google.maps.LatLngBounds(myLatLong, myCenter);

                                        google.maps.event.addListener(map, 'bounds_changed', function() {
                                            if (bounds.contains(map.getCenter()))
                                                return;
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

                                        //  marker.set("myZIndex", marker.getZIndex());

                                        //  google.maps.event.addListener(marker, "mouseover", function() {
                                        //   getHighestZIndex();
                                        //   this.setOptions({zIndex:highestZIndex+1});
                                        // });

                                        //  google.maps.event.addListener(marker, "mouseout", function() {
                                        //   this.setOptions({zIndex:this.get("myZIndex")});
                                        // });

                                        //  function getHighestZIndex() {
                                        //   if (highestZIndex==0) {
                                        //     if (markers.length>0) {
                                        //       for (var i=0; i<markers.length; i++) {
                                        //         tempZIndex = markers[i].getZIndex();
                                        //         if (tempZIndex>highestZIndex) {
                                        //           highestZIndex = tempZIndex;
                                        //         }
                                        //       }
                                        //     }
                                        //   }
                                        //   return highestZIndex;
                                        // }
                                    });
                                })(marker, data);

                                function calculateAndDisplayRoute(latLongDest) {
                                    var start = new google.maps.LatLng(7.282397, 125.683499);
                                    var end = latLongDest;
                                    directionsService.route({
                                        origin: start,
                                        destination: end,
                                        travelMode: google.maps.TravelMode.DRIVING
                                    }, function(response, status) {
                                        if (status === google.maps.DirectionsStatus.OK) {
                                            directionsDisplay.setDirections(response);
                                        } else {
                                            // alertify.alert('Directions request failed due to ' + status + ',' + myLatLong).set('modal', false, 'movable', false);
                                            $.bootstrapGrowl('<h4><strong>Error!</strong></h4> <p>Directions request failed due to ' + status + ',' + myLatLong + '!</p>', {
                                                type: "danger",
                                                delay: 2500,
                                                width: "auto",
                                                allow_dismiss: true,
                                                offset: {
                                                    from: 'top',
                                                    amount: 20
                                                }
                                            });
                                        }
                                    });
                                }
                            }
                            var flightPlanCoordinates = [{
                                lat: 7.292363,
                                lng: 125.667018
                            }, {
                                lat: 7.291958,
                                lng: 125.671030
                            }, {
                                lat: 7.292022,
                                lng: 125.673777
                            }, {
                                lat: 7.291532,
                                lng: 125.675864
                            }, {
                                lat: 7.292884,
                                lng: 125.676464
                            }, {
                                lat: 7.292809,
                                lng: 125.677291
                            }, {
                                lat: 7.292682,
                                lng: 125.680069
                            }, {
                                lat: 7.292283,
                                lng: 125.682475
                            }, {
                                lat: 7.291916,
                                lng: 125.684653
                            }, {
                                lat: 7.290319,
                                lng: 125.685536
                            }, {
                                lat: 7.290787,
                                lng: 125.688089
                            }, {
                                lat: 7.292937,
                                lng: 125.689033
                            }, {
                                lat: 7.294427,
                                lng: 125.689951
                            }, {
                                lat: 7.296428,
                                lng: 125.691737
                            }, {
                                lat: 7.295853,
                                lng: 125.692123
                            }, {
                                lat: 7.295300,
                                lng: 125.692273
                            }, {
                                lat: 7.293703,
                                lng: 125.694247
                            }, {
                                lat: 7.294001,
                                lng: 125.694612
                            }, {
                                lat: 7.294172,
                                lng: 125.697123
                            }, {
                                lat: 7.291000,
                                lng: 125.698678
                            }, {
                                lat: 7.289723,
                                lng: 125.697091
                            }, {
                                lat: 7.287808,
                                lng: 125.695717
                            }, {
                                lat: 7.285573,
                                lng: 125.691866
                            }, {
                                lat: 7.284466,
                                lng: 125.690793
                            }, {
                                lat: 7.282657,
                                lng: 125.689763
                            }, {
                                lat: 7.279996,
                                lng: 125.688411
                            }, {
                                lat: 7.278123,
                                lng: 125.686930
                            }, {
                                lat: 7.277208,
                                lng: 125.686287
                            }, {
                                lat: 7.276059,
                                lng: 125.685600
                            }, {
                                lat: 7.274207,
                                lng: 125.683604
                            }, {
                                lat: 7.274037,
                                lng: 125.683175
                            }, {
                                lat: 7.275675,
                                lng: 125.678412
                            }, {
                                lat: 7.275697,
                                lng: 125.673975
                            }, {
                                lat: 7.280188,
                                lng: 125.674565
                            }, {
                                lat: 7.280156,
                                lng: 125.672009
                            }, {
                                lat: 7.286728,
                                lng: 125.674788
                            }, {
                                lat: 7.287308,
                                lng: 125.673302
                            }, {
                                lat: 7.288127,
                                lng: 125.669896
                            }, {
                                lat: 7.287137,
                                lng: 125.669834
                            }, {
                                lat: 7.287196,
                                lng: 125.665787
                            }, {
                                lat: 7.288962,
                                lng: 125.666312
                            }, {
                                lat: 7.288718,
                                lng: 125.667889
                            }, {
                                lat: 7.290819,
                                lng: 125.667830
                            }, {
                                lat: 7.291123,
                                lng: 125.668512
                            }, {
                                lat: 7.289612,
                                lng: 125.668116
                            }, {
                                lat: 7.289734,
                                lng: 125.668899
                            }, {
                                lat: 7.290080,
                                lng: 125.668830
                            }, {
                                lat: 7.290309,
                                lng: 125.669729
                            }, {
                                lat: 7.290271,
                                lng: 125.670128
                            }, {
                                lat: 7.290301,
                                lng: 125.670828
                            }, {
                                lat: 7.291330,
                                lng: 125.670852
                            }, {
                                lat: 7.291793,
                                lng: 125.666922
                            }, {
                                lat: 7.291916,
                                lng: 125.666885
                            }, {
                                lat: 7.292363,
                                lng: 125.667018
                            }];
                            var flightPath = new google.maps.Polyline({
                                path: flightPlanCoordinates,
                                geodesic: true,
                                strokeColor: '#FF0000',
                                strokeOpacity: 1.0,
                                strokeWeight: 2
                            });
                            flightPath.setMap(map);

                            var strictBounds = new google.maps.LatLngBounds(new google.maps.LatLng(7.274053, 125.666105), new google.maps.LatLng(7.296828, 125.698691));

                            google.maps.event.addListener(map, 'bounds_changed', function() {
                                if (strictBounds.contains(map.getCenter()))
                                    return;
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
                    },
                    error: function() {
                        $("#searchResult").html('');
                        $.bootstrapGrowl("<h4><strong>Resident not found!</strong></h4> <p>Search result empty!</p>", {
                            type: "warning",
                            delay: 2500,
                            width: "auto",
                            allow_dismiss: true,
                            offset: {
                                from: 'top',
                                amount: 20
                            }
                        });
                        return;
                    }
                });
            });
        }
    };
}();

$('iframe').load(function() {
    iFrameResize({
        log: false,
        heightCalculationMethod: 'bodyScroll'
    });
});

if ('matchMedia' in window) {
    // Chrome, Firefox, and IE 10 support mediaMatch listeners
    window.matchMedia('print').addListener(function(media) {
        if (media.matches) {
            beforePrint();
        } else {
            // Fires immediately, so wait for the first mouse movement
            $(document).one('mouseover', afterPrint);
        }
    });
} else {
    // IE and Firefox fire before/after events
    $(window).on('beforeprint', beforePrint);
    $(window).on('afterprint', afterPrint);
}

function beforePrint() {
    $(this).style.display = 'none';
}

function afterPrint() {
    $(this).style.display = '';
}
