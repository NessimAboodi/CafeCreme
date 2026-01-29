document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('monthChart');
    if (!canvas) return;

    // Récupération directe des données préparées par le Contrôleur
    const labels = JSON.parse(canvas.dataset.labels);
    const data = JSON.parse(canvas.dataset.values);

    new Chart(canvas.getContext('2d'), {
        type: 'bar', // ou 'line' si vous préférez une courbe
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre de réservations',
                data: data,
                backgroundColor: '#967969',
                borderRadius: 4,
                hoverBackgroundColor: '#f4d06f'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1, // Pas de nombres à virgule pour les réservations
                        precision: 0
                    },
                    grid: {
                        color: '#f1ece1'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Cache la légende si on n'a qu'une seule couleur
                }
            }
        }
    });
});
