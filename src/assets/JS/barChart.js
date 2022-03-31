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
        legend: { position: 'top' },
        hAxis: {
            format: 'decimal'
        },
        height: 400,
        colors: ['#0F305B', '#9c9c9c']
    };


    var chart = new google.charts.Bar(document.getElementById('mybar'));

    chart.draw(data, google.charts.Bar.convertOptions(options));



}
/*
google.charts.load("current", { packages: ['bar'] });
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
        legend: { position: 'top' },
        hAxis: {
            format: 'decimal'
        },
        height: 400,
        colors: ['#0F305B', '#9c9c9c']
    };

    var chart_div = document.getElementById('mybar');
    var chart = new google.visualization.ColumnChart(chart_div);

    // Wait for the chart to finish drawing before calling the getImageURI() method.
    google.visualization.events.addListener(chart, 'ready', function() {
        chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
        console.log(chart_div.outerHTML);
    });

    chart.draw(data, options);
}*/