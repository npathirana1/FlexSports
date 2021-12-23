google.charts.load('current', { 'packages': ['bar'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Facility', 'This Week', 'Last Week'],
        ['Badminton', 2, 10],
        ['Table tennis', 5, 14],
        ['Basketball', 10, 5],
        ['Billiards', 8, 12],
        ['Vollyball', 1, 7],
        ['Swimmimg pool', 5, 13]
    ]);
    var options = {
        legend: { position: 'up' },
        hAxis: {
            format: 'decimal'
        },
        height: 400,
        colors: ['#0F305B', '#9c9c9c']
    };


    var reservation = new google.charts.Bar(document.getElementById('mybar'));

    reservation.draw(data, google.charts.Bar.convertOptions(options));

}