const absentLabel = document.getElementById('absentLabel');
const absentInput = document.getElementById('absentInput');
const total_class = document.querySelector(".total_class");
const container = document.getElementById('flick');
const es = document.querySelector(".else");


const data = {
    labels: ['欠席', '授業'],
    datasets: [{
        label: ['欠席', '授業'],
        data: [absentInput.value, total_class.value],
        backgroundColor: [
            '#fb2100',
            '#FEE715',
        ],
    }]
};

if (absentInput.value <= (0.4 * total_class.value)) {
    es.style.display = 'none';
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#fff', 
                    }
                },
                y: {
                    ticks: {
                        color: '#fff', 
                    }
                }
            },
            animation: {
                delay: function (context) {
                    return context.dataIndex * 300; 
                },
            }
        },
        plugins: {
            animation: {
                duration: 0, 
            },
            delay: {
                
            },
        },
    });
} else {
    document.getElementById('myChart').style.display = 'none';
}


var hammer = new Hammer(container);

currentAbsentValue = parseInt(absentInput.value);
document.querySelector(".newab").value=currentAbsentValue;

hammer.get('swipe').set({ direction: Hammer.DIRECTION_HORIZONTAL });

hammer.on('swipeleft swiperight', function(event) {
  if (event.type === 'swipeleft') {
    currentAbsentValue++;
    document.querySelector(".newab").value=currentAbsentValue;

  } else if (event.type === 'swiperight' && currentAbsentValue > 0) {
    currentAbsentValue--;
    document.querySelector(".newab").value=currentAbsentValue;
  }

  absentLabel.textContent = currentAbsentValue;
  absentInput.value = currentAbsentValue;
});
