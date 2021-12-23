google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Facility', 'No of Reservations'],
        ['Table tennis Court', 7],
        ['Basketball Court', 7],
        ['Billiards', 2],
        ['Badminton Court', 10],
        ['Vollyball Court', 10],
        ['Swimming Pool', 10]
    ]);

    var options = {
        legend: {
            position: 'top',
            maxLines: 3
        },
        pieHole: 0.4,
        colors: ['#0F305B', '#7A7A7A', '#1A539E', '#9C9C9C', '#3E84E0', '#CCCCCC']
    };

    var curRes = new google.visualization.PieChart(document.getElementById('myChart'));
    curRes.draw(data, options);
}