google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Inquiry Type', 'No of Inquiries Recieved'],
        ['Finantial', 7],
        ['Facility', 7],
        ['Staff', 2],
        ['Other', 10]
    ]);

    var options = {
        legend: {
            position: 'top',
            fontName: 'Roboto',
            fontSize: 15,
            maxLines: 3
        },
        pieHole: 0.4,
        colors: ['#0F305B', '#7A7A7A', '#1A539E', '#9C9C9C']
    };

    var Inq = new google.visualization.PieChart(document.getElementById('noInquiry'));
    Inq.draw(data, options);
}