let ctx = document.getElementById('myChart');

let labels = ['Tennis Court', 'Basketball Court', 'Billiards', 'Badminton Court', 'Vollyball Court', 'Swimming Pool'];
let colorHex = ['#FF4069', '#FF9020', '#FFC234', '#22CFCF', '#36A2EB', '#9966FF'];

let myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [2, 5, 10, 8, 1, 5],
            backgroundColor: colorHex
        }],
        labels: labels
    },
    options: {
        responsive: true,
        legend: {
            position: 'bottom'
        },
        plugins: {
            datalabels: {
                color: '#fff',
                anchor: 'end',
                align: 'start',
                offset: -10,
                borderWidth: 2,
                borderColor: '#fff',
                borderRadius: 25,
                backgroundColor: (context) => {
                    return context.dataset.backgroundColor;
                },
                font: {
                    weight: 'bold',
                    size: '10'
                },
                formatter: (value) => {
                    return value + ' %';
                }
            }
        }
    }
})