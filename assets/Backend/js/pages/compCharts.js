/*
 *  Document   : compCharts.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Charts page
 */

var CompCharts = function () {

    // Get random number function from a given range
    var getRandomInt = function (min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    };

    return {
        init: function () {
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

            $('.toggle-pies').click(function () {
                $('.pie-chart').each(function () {
                    random = getRandomInt(1, 100);
                    $(this).data('easyPieChart').update(random);
                });
            });

            /**
             * Chart.js Pie Chart & Bar Graph
             */

            /*
             * (Chart.js) Male & Female Age Range Pie Chart
             */
            var totalPopulation;
            var ageRangesByMale;
            var ageRangesByFemale;

            $.getJSON("Charts/getTotalPopulation", function (json) {
                totalPopulation = json;
            });

            $.getJSON("Charts/getAgeRangeByMale", function (json) {
                ageRangesByMale = json;
                checkAgeRangeByMale();
            });

            $.getJSON("Charts/getAgeRangeByFemale", function (json) {
                ageRangesByFemale = json;
                checkAgeRangeByFemale();
            });

            function checkAgeRangeByMale() {
                var pieData = [
                    {
                        value: ageRangesByMale['Under 20'],
                        label: 'Under 20',
                        title: 'Under 20',
                        highlight: "#20B2AA",
                        color: "#878BB6"
                    },
                    {
                        value: ageRangesByMale['20 - 29'],
                        label: '20 - 29',
                        title: '20 - 29',
                        highlight: "#20B2AA",
                        color: "#4ACAB4"
                    },
                    {
                        value: ageRangesByMale['30 - 39'],
                        label: '30 - 39',
                        title: '30 - 39',
                        highlight: "#20B2AA",
                        color: "#90EE90"
                    },
                    {
                        value: ageRangesByMale['40 - 49'],
                        label: '40 - 49',
                        title: '40 - 49',
                        highlight: "#20B2AA",
                        color: "#66CD00"
                    },
                    {
                        value: ageRangesByMale['50 - 59'],
                        label: '50 - 59',
                        title: '50 - 59',
                        highlight: "#20B2AA",
                        color: "#FFC125"
                    },
                    {
                        value: ageRangesByMale['60 - 69'],
                        label: '60 - 69',
                        title: '60 - 69',
                        highlight: "#20B2AA",
                        color: "#EE6AA7"
                    },
                    {
                        value: ageRangesByMale['70 - 79'],
                        label: '70 - 79',
                        title: '70 - 79',
                        highlight: "#20B2AA",
                        color: "#BA55D3"
                    },
                    {
                        value: ageRangesByMale['Over 80'],
                        label: 'Over 80',
                        title: 'Over 80',
                        highlight: "#20B2AA",
                        color: "#FFEA88"
                    }
                ];

                var pieOptions = {
                    responsive: true,
                    segmentShowStroke: false,
                    animationEasing: "easeOutQuart",
                    animateRotate: true,
                    animateScale: true,
                    labelAlign: 'center',
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%>" + " - " + "<%=segments[i].value%>%</li><%}%></ul>"
                };

//                legend(document.getElementById("ageRangesPieMaleLegend"), pieData);
                var ageRangePie = document.getElementById("ageRangesPieMale").getContext("2d");
                var ageRangesPieMaleLegend = new Chart(ageRangePie).Pie(pieData, pieOptions);
                document.getElementById('ageRangesPieMaleLegend').innerHTML = ageRangesPieMaleLegend.generateLegend();
            }

            function checkAgeRangeByFemale() {
                var doughnutData = [
                    {
                        value: ageRangesByFemale['Under 20'],
                        label: 'Under 20',
                        title: "Under 20",
                        highlight: "#20B2AA",
                        color: "#878BB6"
                    },
                    {
                        value: ageRangesByFemale['20 - 29'],
                        label: '20 - 29',
                        title: '20 - 29',
                        highlight: "#20B2AA",
                        color: "#4ACAB4"
                    },
                    {
                        value: ageRangesByFemale['30 - 39'],
                        label: '30-39',
                        title: '30-39',
                        highlight: "#20B2AA",
                        color: "#90EE90"
                    },
                    {
                        value: ageRangesByFemale['40 - 49'],
                        label: '40 - 49',
                        title: '40 - 49',
                        highlight: "#20B2AA",
                        color: "#66CD00"
                    },
                    {
                        value: ageRangesByFemale['50 - 59'],
                        label: '50 - 59',
                        title: '50 - 59',
                        highlight: "#20B2AA",
                        color: "#FFC125"
                    },
                    {
                        value: ageRangesByFemale['60 - 69'],
                        label: '60 - 69',
                        title: '60 - 69',
                        highlight: "#20B2AA",
                        color: "#EE6AA7"
                    },
                    {
                        value: ageRangesByFemale['70 - 79'],
                        label: '70 - 79',
                        title: '70 - 79',
                        highlight: "#20B2AA",
                        color: "#BA55D3"
                    },
                    {
                        value: ageRangesByFemale['Over 80'],
                        label: 'Over 80',
                        title: 'Over 80',
                        highlight: "#20B2AA",
                        color: "#FFEA88"
                    }
                ];

                var doughnutOptions = {
                    responsive: true,
                    segmentShowStroke: true,
                    animateRotate: true,
                    animateScale: true,
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%>" + " - " + "<%=segments[i].value%>%</li><%}%></ul>"
                };

                var ageRangePie = document.getElementById("ageRangesPieFemale").getContext("2d");
                var ageRangesPieFemaleLegend = new Chart(ageRangePie).Doughnut(doughnutData, doughnutOptions);
                document.getElementById('ageRangesPieFemaleLegend').innerHTML = ageRangesPieFemaleLegend.generateLegend();
            }

            /*
             * (Chart.js) Total Population by Purok Bar Graph
             */

            var totalPopulationByPurok;

            $.getJSON("Charts/getPopulationByPurok", function (json) {
                totalPopulationByPurok = json;
                getPopulationByPurok();
            });

            function getPopulationByPurok() {
                var barData = {
                    labels: ["Prk. Atis", "Prk. Avocado", "Prk. Bayabas", "Prk. Boongon", "Prk. Chico", "Prk. Durian", "Prk. Guyabano", "Prk. Kaimito", "Prk. Kasoy", "Prk. Lanzones", "Prk. Lomboy", "Prk. Mabolo", "Prk. Macopa", "Prk. Mangga", "Prk. Mangosteen", "Prk. Mansanas", "Prk. Marang", "Prk. Marang Joesil", "Prk. Melon", "Prk. Nangka", "Prk. Pomelo", "Prk. Rambutan", "Prk. Santol", "Prk. Sereguellas", "Prk. Sunkist", "Prk. Tambis", "Prk. Ubas", "Fishpond/Sea wall"],
                    datasets: [
                        {
//                            fillColor: ["#A52A2A", "#FF7F50", "#E9967A", "#DAA520", "#6B8E23", "#ADFF2F", "#228B22", "#8FBC8F", "#2E8B57", "#2F4F4F", "#00CED1", "#48D1CC", "#4682B4", "#191970", "#4169E1", "#6A5ACD", "#BA55D3", "#DC143C", "yellow", "blue", "#A52A2A", "#DDA0DD", "#DB7093", "#FFC0CB", "#A0522D", "#DEB887", "#B0C4DE", "#696969"],
//                            strokeColor: ["#8B0000", "#FF6347", "#FA8072", "#FFA500", "#008000", "#006400", "#00FF00", "#98FB98", "#66CDAA", "#008080", "#40E0D0", "#AFEEEE", "#5F9EA0", "#0000CD", "#0000FF", "#483D8B", "#800080", "#DC143C", "yellow", "blue", "#A52A2A", "#EE82EE", "#C71585", "#FFB6C1", "#8B4513", "#F4A460", "#708090", "#000000"],
//                            highlightFill: ["#DC143C", "#F08080", "#FF4500", "#FFA500", "#7FFF00", "#008000", "#98FB98", "#00FF7F", "#3CB371", "#008B8B", "#00FFFF", "#7FFFD4", "#6495ED", "#1E90FF", "#8A2BE2", "#9370DB", "#9370DB", "#DC143C", "yellow", "blue", "#A52A2A", "#DA70D6", "#FF69B4", "#FFE4C4", "#CD853F", "#D2B48C", "#E6E6FA", "#C0C0C0"],
//                            highlightStroke: ["#B22222", "#CD5C5C", "#FFA07A", "#FFD700", "#ADFF2F", "#228B22", "#8FBC8F", "#00FA9A", "#20B2AA", "#00FFFF", "#E0FFFF", "#B0E0E6", "#00BFFF", "#ADD8E6", "#4B0082", "#7B68EE", "#8B008B", "#DC143C", "yellow", "blue", "#A52A2A", "#FF00FF", "#FF1493", "#F5DEB3", "#D2691E", "#BC8F8F", "#778899", "#A9A9A9"],
//                            fillColor: "#008080",
//                            strokeColor: "#48A4D1",
//                            highlightFill: "#20B2AA",
//                            highlightStroke: "#00CED1",
                            data: [totalPopulationByPurok['Prk. Atis'], totalPopulationByPurok['Prk. Avocado'], totalPopulationByPurok['Prk. Bayabas'], totalPopulationByPurok['Prk. Boongon'], totalPopulationByPurok['Prk. Chico'], totalPopulationByPurok['Prk. Durian'], totalPopulationByPurok['Prk. Guyabano'], totalPopulationByPurok['Prk. Kaimito'], totalPopulationByPurok['Prk. Kasoy'], totalPopulationByPurok['Prk. Lanzones'], totalPopulationByPurok['Prk. Lomboy'], totalPopulationByPurok['Prk. Mabolo'], totalPopulationByPurok['Prk. Macopa'], totalPopulationByPurok['Prk. Mangga'], totalPopulationByPurok['Prk. Mangosteen'], totalPopulationByPurok['Prk. Mansanas'], totalPopulationByPurok['Prk. Marang'], totalPopulationByPurok['Prk. Marang Joesil'], totalPopulationByPurok['Prk. Melon'], totalPopulationByPurok['Prk. Nangka'], totalPopulationByPurok['Prk. Pomelo'], totalPopulationByPurok['Prk. Rambutan'], totalPopulationByPurok['Prk. Santol'], totalPopulationByPurok['Prk. Sereguellas'], totalPopulationByPurok['Prk. Sunkist'], totalPopulationByPurok['Prk. Tambis'], totalPopulationByPurok['Prk. Ubas'], totalPopulationByPurok['Fishpond/Sea wall']]
                        }
                    ]
                };

                var barDataOption = {
                    responsive: true,
                    scaleBeginAtZero: true,
                    scaleShowGridLines: true,
                    scaleShowHorizontalLines: true,
                    scaleShowVerticalLines: true,
                    segmentShowStroke: true,
                    animateRotate: true,
                    animateScale: true,
//                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%>" + " - " + "<%=segments[i].value%>%</li><%}%></ul>"
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                };

                var puroksBarData = document.getElementById("totalPopulationByPurok").getContext("2d");
                var totalPopulationByPurokLegend = new Chart(puroksBarData).Bar(barData, barDataOption);
                document.getElementById('totalPopulationByPurokLegend').innerHTML = totalPopulationByPurokLegend.generateLegend();
//                var legendHolder = totalPopulationByPurokLegend.generateLegend();
//                document.getElementById('totalPopulationByPurokLegend').appendChild(legendHolder.firstChild);
            }
        }
    };
}();
