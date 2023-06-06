$(function() {
    "use strict";
    //This is for the Notification top right
   /* $.toast({
        heading: 'Welcome to Realoneinvest',
        text: 'Use the predefined ones, or specify a custom position object.',
        position: 'top-right',
        loaderBg: '#f17f29',
        icon: 'info',
        hideAfter: 3500,
        stack: 6
    })*/
    // Morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2023',
            Construction: 75,
            CashFlow: 65,
            Land: 40,
            Mulitifamily:20
        }],
        xkey: 'y',
        ykeys: [ 'Construction', 'CashFlow', 'Land','Mulitifamily'],
        labels: [ 'Construction', 'CashFlow', 'Land','Mulitifamily'],
        barColors: ['#b8edf0', '#b4c1d7', '#fcc9ba','#f17f29'],
        hideHover: 'auto', 

        gridLineColor: '#eef0f2',
        resize: true
    });


});
// This is for the sparkline chart

var sparklineLogin = function() {

    $('#sparkline2dash').sparkline([6, 10, 9, 11, 9, 10, 12], {
        type: 'bar',
        height: '154',
        barWidth: '4',
        resize: true,
        barSpacing: '10',
        barColor: '#25a6f7'
    });
    $('#sales1').sparkline([6, 10, 9, 11, 9, 10, 12], {
        type: 'bar',
        height: '154',
        barWidth: '4',
        resize: true,
        barSpacing: '10',
        barColor: '#fff'
    });

}
var sparkResize;

$(window).resize(function(e) {
    clearTimeout(sparkResize);
    sparkResize = setTimeout(sparklineLogin, 500);
});
sparklineLogin();