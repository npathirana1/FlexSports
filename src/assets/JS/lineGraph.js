let lineChart1 = document.getElementById('myLine');
let myLine = new Chart(lineChart1, {
    type: 'line',
    data: {
        datasets: [{
            data: [1, 7, 9, 5, 8],
            label: "Regestrations",
            borderColor: '#0F305B'
        }],
        labels: ["June", "July", "August", "September", "October"],
        options: {
            responsive: true

        },
    }


})