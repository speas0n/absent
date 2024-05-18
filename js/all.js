document.addEventListener('DOMContentLoaded', function () {
    const subjects = document.querySelectorAll('.subjectname');
    const absents = document.querySelectorAll('.absent');

    const labels = [];
    const data = [];
    const sub_name=[];

    subjects.forEach(function (subject) {
        labels.push(subject.value.replace(/\b\w/g, l => l.toUpperCase()).toLowerCase());
    });

    for (let i = 0; i < labels.length; i++) {
        console.log(labels[i]);
        sub_name[i]=labels[i];
    }

    absents.forEach(function (absent) {
        data.push(parseInt(absent.value));
    });

    var backgroundColors = labels.map(function () {
        return getRandomColor();
    });

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: labels,
            datasets: [{
                data: data,
                label: labels,
                backgroundColor: backgroundColors,
                borderColor: '#101820',
                borderWidth: 3,
            }],
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        usePointStyle: true,
                        font: {
                            family: 'Orbitron, sans-serif',
                            size: 15,
                        },
                        color: '#f8f5d8',
                        padding: 10,
                    }
                },
            },
            scales: {
                x: {
                    beginAtZero: true
                },
                y: { // Switched y and x scales
                    grid: {
                        display: false
                    }
                },
            },
            animation: {
                delay: function (context) {
                    return context.dataIndex * 300;
                },
            },
        },
    });
});
