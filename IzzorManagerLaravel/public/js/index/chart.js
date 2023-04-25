const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Marinho', 'Mescla', 'Preta', 'Branca', 'Vermelha'],
        datasets: [{
            label: 'Camisetas vendidas',
            data: [12, 19, 3, 5, 2],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});