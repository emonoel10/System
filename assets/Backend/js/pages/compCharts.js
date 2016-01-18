/*
 *  Document   : compCharts.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Charts page
 */

var CompCharts = function() {

    // Get random number function from a given range
    var getRandomInt = function(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    };

    return {
        init: function() {
            /* Mini Line Charts with jquery.sparkline plugin, for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about */
            var miniChartLineOptions = {
                type: 'line',
                width: '120px',
                height: '65px',
                tooltipOffsetX: -25,
                tooltipOffsetY: 20,
                lineColor: '#de815c',
                fillColor: '#de815c',
                spotColor: '#555555',
                minSpotColor: '#555555',
                maxSpotColor: '#555555',
                highlightSpotColor: '#555555',
                highlightLineColor: '#555555',
                spotRadius: 3,
                tooltipPrefix: '',
                tooltipSuffix: ' Tickets',
                tooltipFormat: '{{prefix}}{{y}}{{suffix}}'
            };
            $('#mini-chart-line1').sparkline('html', miniChartLineOptions);

            miniChartLineOptions['lineColor'] = '#5ccdde';
            miniChartLineOptions['fillColor'] = '#5ccdde';
            miniChartLineOptions['tooltipPrefix'] = '$ ';
            miniChartLineOptions['tooltipSuffix'] = '';
            $('#mini-chart-line2').sparkline('html', miniChartLineOptions);

            /* Mini Bar Charts with jquery.sparkline plugin, for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about */
            var miniChartBarOptions = {
                type: 'bar',
                barWidth: 7,
                barSpacing: 6,
                height: '65px',
                tooltipOffsetX: -25,
                tooltipOffsetY: 20,
                barColor: '#de815c',
                tooltipPrefix: '',
                tooltipSuffix: ' Tickets',
                tooltipFormat: '{{prefix}}{{value}}{{suffix}}'
            };
            $('#mini-chart-bar1').sparkline('html', miniChartBarOptions);

            miniChartBarOptions['barColor'] = '#5ccdde';
            miniChartBarOptions['tooltipPrefix'] = '$ ';
            miniChartBarOptions['tooltipSuffix'] = '';
            $('#mini-chart-bar2').sparkline('html', miniChartBarOptions);

            // Randomize easy pie charts values
            var random;

            $('.toggle-pies').click(function() {
                $('.pie-chart').each(function() {
                    random = getRandomInt(1, 100);
                    $(this).data('easyPieChart').update(random);
                });
            });

            /**
             * Chart.js Pie Chart & Bar Graph
             */


            /*
             * (Chart.js) Total Population by Purok Bar Graph
             */

            var totalPopulation,
                totalPopulationByPurok,
                totalPopulationByMale,
                totalPopulationByFemale,
                ageRangesByMale,
                ageRangesByFemale;

            $.getJSON("Charts/getTotalPopulation", function(json) {
                totalPopulation = json;
            });

            $.getJSON("Charts/getPopulationByPurok", function(json) {
                totalPopulationByPurok = json;
                getPopulationByPurok();
            });

            $.getJSON("Charts/getTotalPopulationByMale", function(json) {
                totalPopulationByMale = json;
            });

            $.getJSON("Charts/getTotalPopulationByFemale", function(json) {
                totalPopulationByFemale = json;
            });

            $.getJSON("Charts/getAgeRangeByMale", function(json) {
                ageRangesByMale = json;
                checkAgeRangeByMale();
            });

            $.getJSON("Charts/getAgeRangeByFemale", function(json) {
                ageRangesByFemale = json;
                checkAgeRangeByFemale();
            });

            function getPopulationByPurok() {
                var barData = {
                    labels: ["Prk. Atis", "Prk. Avocado", "Prk. Bayabas", "Prk. Boongon", "Prk. Chico", "Prk. Durian", "Prk. Guyabano", "Prk. Kaimito", "Prk. Kasoy", "Prk. Lanzones", "Prk. Lomboy", "Prk. Mabolo", "Prk. Macopa", "Prk. Mangga", "Prk. Mangosteen", "Prk. Mansanas", "Prk. Marang", "Prk. Marang Joesil", "Prk. Melon", "Prk. Nangka", "Prk. Pomelo", "Prk. Rambutan", "Prk. Santol", "Prk. Sereguellas", "Prk. Sunkist", "Prk. Tambis", "Prk. Ubas", "Fishpond/Sea wall"],
                    datasets: [{
                        data: [totalPopulationByPurok['Prk. Atis'], totalPopulationByPurok['Prk. Avocado'], totalPopulationByPurok['Prk. Bayabas'], totalPopulationByPurok['Prk. Boongon'], totalPopulationByPurok['Prk. Chico'], totalPopulationByPurok['Prk. Durian'], totalPopulationByPurok['Prk. Guyabano'], totalPopulationByPurok['Prk. Kaimito'], totalPopulationByPurok['Prk. Kasoy'], totalPopulationByPurok['Prk. Lanzones'], totalPopulationByPurok['Prk. Lomboy'], totalPopulationByPurok['Prk. Mabolo'], totalPopulationByPurok['Prk. Macopa'], totalPopulationByPurok['Prk. Mangga'], totalPopulationByPurok['Prk. Mangosteen'], totalPopulationByPurok['Prk. Mansanas'], totalPopulationByPurok['Prk. Marang'], totalPopulationByPurok['Prk. Marang Joesil'], totalPopulationByPurok['Prk. Melon'], totalPopulationByPurok['Prk. Nangka'], totalPopulationByPurok['Prk. Pomelo'], totalPopulationByPurok['Prk. Rambutan'], totalPopulationByPurok['Prk. Santol'], totalPopulationByPurok['Prk. Sereguellas'], totalPopulationByPurok['Prk. Sunkist'], totalPopulationByPurok['Prk. Tambis'], totalPopulationByPurok['Prk. Ubas'], totalPopulationByPurok['Fishpond/Sea wall']]
                    }]
                };

                var barDataOption = {
                    responsive: true,
                    scaleBeginAtZero: true,
                    scaleShowGridLines: true,
                    scaleShowHorizontalLines: true,
                    scaleShowVerticalLines: true,
                    animateRotate: true,
                    animateScale: true,
                    maintainAspectRatio: true,
                    percentageInnerCutout: 50
                        // legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%>" + " - " + "<%=segments[i].value%>%</li><%}%></ul>"
                        // legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                };

                var puroksBarData = document.getElementById("totalPopulationByPurok").getContext("2d");
                var totalPopulationByPuroks = new Chart(puroksBarData).Bar(barData, barDataOption);
                var legendHTML = '';
                barData.labels.forEach(function(label, i) {
                    barData.datasets.forEach(function(value) {
                        legendHTML += ('<li><span style="background: ' + getFillColor(i) + '"></span>' + label + ': </li>' + value['data'][i] + ' (' + Math.round(value['data'][i] / 100 * totalPopulation) + '%)<br>');
                    });
                });
                document.getElementById("totalPopulationByPurokLegend").innerHTML = '<ul class="bar-legend">' + legendHTML + '</ul>';
            }

            /*
             * (Chart.js) Male & Female Age Range Pie Chart
             */

            function checkAgeRangeByMale() {
                var pieData = [{
                    value: ageRangesByMale['Under 20'],
                    label: 'Under 20',
                    highlight: "#20B2AA",
                    color: "#878BB6"
                }, {
                    value: ageRangesByMale['20 - 29'],
                    label: '20 - 29',
                    highlight: "#20B2AA",
                    color: "#4ACAB4"
                }, {
                    value: ageRangesByMale['30 - 39'],
                    label: '30 - 39',
                    title: '30 - 39',
                    highlight: "#20B2AA",
                    color: "#90EE90"
                }, {
                    value: ageRangesByMale['40 - 49'],
                    label: '40 - 49',
                    highlight: "#20B2AA",
                    color: "#66CD00"
                }, {
                    value: ageRangesByMale['50 - 59'],
                    label: '50 - 59',
                    highlight: "#20B2AA",
                    color: "#FFC125"
                }, {
                    value: ageRangesByMale['60 - 69'],
                    label: '60 - 69',
                    highlight: "#20B2AA",
                    color: "#EE6AA7"
                }, {
                    value: ageRangesByMale['70 - 79'],
                    label: '70 - 79',
                    labelColor: 'white',
                    labelFontSize: '16',
                    highlight: "#20B2AA",
                    color: "#BA55D3"
                }, {
                    value: ageRangesByMale['Over 80'],
                    label: 'Over 80',
                    title: 'Over 80',
                    highlight: "#20B2AA",
                    color: "#FFEA88"
                }];

                var pieOptions = {
                    responsive: true,
                    segmentShowStroke: false,
                    animation: true,
                    animationEasing: "easeOutQuart",
                    animateRotate: true,
                    animateScale: true,
                    labelAlign: 'center',
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%>" + ": " + "<%=segments[i].value%> (<%=Math.round(segments[i].value / 100 * " + totalPopulationByMale + ")%> %)</li><br><%}%></ul>"
                        // legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
                };
                var ageRangePie = document.getElementById("ageRangesPieMale").getContext("2d");
                var ageRangesPieMaleLegend = new Chart(ageRangePie).Pie(pieData, pieOptions);
                document.getElementById('ageRangesPieMaleLegend').innerHTML = ageRangesPieMaleLegend.generateLegend();
            }

            function checkAgeRangeByFemale() {
                var doughnutData = [{
                    value: ageRangesByFemale['Under 20'],
                    label: 'Under 20',
                    highlight: "#20B2AA",
                    color: "#878BB6"
                }, {
                    value: ageRangesByFemale['20 - 29'],
                    label: '20 - 29',
                    highlight: "#20B2AA",
                    color: "#4ACAB4"
                }, {
                    value: ageRangesByFemale['30 - 39'],
                    label: '30-39',
                    highlight: "#20B2AA",
                    color: "#90EE90"
                }, {
                    value: ageRangesByFemale['40 - 49'],
                    label: '40 - 49',
                    highlight: "#20B2AA",
                    color: "#66CD00"
                }, {
                    value: ageRangesByFemale['50 - 59'],
                    label: '50 - 59',
                    highlight: "#20B2AA",
                    color: "#FFC125"
                }, {
                    value: ageRangesByFemale['60 - 69'],
                    label: '60 - 69',
                    highlight: "#20B2AA",
                    color: "#EE6AA7"
                }, {
                    value: ageRangesByFemale['70 - 79'],
                    label: '70 - 79',
                    highlight: "#20B2AA",
                    color: "#BA55D3"
                }, {
                    value: ageRangesByFemale['Over 80'],
                    label: 'Over 80',
                    highlight: "#20B2AA",
                    color: "#FFEA88"
                }];

                var doughnutOptions = {
                    responsive: true,
                    segmentShowStroke: true,
                    animateRotate: true,
                    animateScale: true,
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%>" + ": " + "<%=segments[i].value%> (<%=Math.round(segments[i].value / 100 * " + totalPopulationByMale + ")%> %)</li><br><%}%></ul>"
                        // legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
                };
                var ageRangePie = document.getElementById("ageRangesPieFemale").getContext("2d");
                var ageRangesPieFemaleLegend = new Chart(ageRangePie).Doughnut(doughnutData, doughnutOptions);
                document.getElementById('ageRangesPieFemaleLegend').innerHTML = ageRangesPieFemaleLegend.generateLegend();
            }

        }
    };
}();
