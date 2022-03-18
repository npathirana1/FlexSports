google.charts.load('current', { 'packages': ['bar'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Registraions'],
        ['Jan', 2],
        ['Feb', 5],
        ['Mar', 10],
        ['Apr', 8],
        ['May', 1],
        ['Jun', 5],
        ['Jul', 4],
        ['Aug', 6],
        ['Sep', 5],
        ['Oct', 9],
        ['Nov', 4],
        ['Dec', 6]
    ]);
    var options = {
        legend: { position: 'top' },
        hAxis: {
            format: 'decimal'
        },

        colors: ['#0F305B', '#9c9c9c']
    };


    var reg = new google.charts.Bar(document.getElementById('myLine'));

    reg.draw(data, google.charts.Bar.convertOptions(options));

}