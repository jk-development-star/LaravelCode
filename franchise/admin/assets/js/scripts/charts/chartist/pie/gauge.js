

// Gauge chart
// ------------------------------
$(window).on("load", function(){

    new Chartist.Pie('#gauge-chart', {
        series: [20, 10, 30, 40]
    }, {
        donut: true,
        donutWidth: 60,
        startAngle: 270,
        total: 200,
        showLabel: false
    });
});