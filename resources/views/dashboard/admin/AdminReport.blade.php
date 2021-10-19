@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark"><i class="far fa-chart-bar mr-2"></i>Junior Spoken English</div>
                <div class="card-body">
                    <div id="juniorchart" width="100%" height="100%"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark"><i class="far fa-chart-bar mr-2"></i>Adult Spoken English</div>
                <div class="card-body">
                    <div id="adultchart" width="100%" height="100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark"><i class="far fa-chart-bar mr-2"></i>Students Payments</div>
                <div class="card-body">
                    <div id="piechart" width="100%" height="100%"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
var junior = <?php echo json_encode($junior)?>;
Highcharts.chart('juniorchart',{
    chart: {
        type: 'column'
    },

    title: {
        text: 'Students Attendance Junior Spoken English, 2021'
    },
    subtitle: {
        text: 'Source: positronx.io'
    },
    xAxis: {
        categories: [
            'October', 'November', 'December'
        ]
    },
    yAxis: {
        title: {
            text: 'Attendance'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [{
        name: 'Attendance',
        data: junior
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
</script>

<script>
var adult = <?php echo json_encode($adult)?>;
Highcharts.chart('adultchart',{
    chart: {
        type: 'column'
    },

    title: {
        text: 'Students Attendance - Adult Spoken English, 2021'
    },
    subtitle: {
        text: 'Source: positronx.io'
    },
    xAxis: {
        categories: [
            'October', 'November', 'December'
        ]
    },
    yAxis: {
        title: {
            text: 'Attendance'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [{
        name: 'Attendance',
        data: adult
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
</script>

<script>
    Highcharts.chart('piechart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Students Payments, 2021'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Sogou Explorer',
            y: 1.64
        }, {
            name: 'Opera',
            y: 1.6
        }, {
            name: 'QQ',
            y: 1.2
        }, {
            name: 'Other',
            y: 2.61
        }]
    }]
});
</script>
    

@endsection