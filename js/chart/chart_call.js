function requestDataTemperatura() {
    $.ajax({
        url: 'php/chart_json.php?argument=temperatura',
        success: function(point) {
            var series = chart1.series[0],
                shift = series.data.length > 4;
            chart1.series[0].setData(point,true,shift);
            setTimeout(requestDataTemperatura, 1000);
        },
        cache: false
    });
}
function requestDataCisnienie() {
    $.ajax({
        url: 'php/chart_json.php?argument=cisnienie',
        success: function(point) {
            var series = chart2.series[0],
                shift = series.data.length > 4;
            chart2.series[0].setData(point,true,shift);
            setTimeout(requestDataCisnienie, 1000);
        },
        cache: false
    });
}
function requestDataWilgotnosc() {
    $.ajax({
        url: 'php/chart_json.php?argument=wilgotnosc',
        success: function(point) {
            var series = chart3.series[0],
                shift = series.data.length > 4;
            chart3.series[0].setData(point,true,shift);

            // call it again after one second
            setTimeout(requestDataWilgotnosc, 1000);
        },
        cache: false
    });
}
function requestDataPylki() {
    $.ajax({
        url: 'php/chart_json.php?argument=PM10',
        success: function(point) {
            var series = chart4.series[0],
                shift = series.data.length > 4;
            chart4.series[0].setData(point,true,false);
            setTimeout(requestDataPylki, 1000);
        },
        cache: false
    });
}
function requestMultipleData() {
    $.ajax({
        url: 'php/chart_json.php?argument=PM10',
        success: function(point) {
            var series = chart5.series[0],
                shift = series.data.length > 4;
            chart5.series[0].setData(point,true,false);
            setTimeout(requestMultipleData, 1000);
        },
        cache: false
    });
}