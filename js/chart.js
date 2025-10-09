document.addEventListener('DOMContentLoaded', () => {
  const ctx = document.getElementById('radarChart').getContext('2d');

  const radarChart = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: [],
      datasets: [{
        label: "Skill Levels",
        data: [],
        backgroundColor: "rgba(255,99,132,0.2)",
        borderColor: "rgba(255,99,132,1)",
        pointBackgroundColor: "rgba(255,99,132,1)"
      }]
    },
    options: {
      responsive: true,
      animation: false,
      scales: {
        r: {
          angleLines: { color: '#444' },
          grid: { color: '#666' },
          pointLabels: { color: '#fff', font: { size: 14 } },
          suggestedMin: 0,
          suggestedMax: 100
        }
      },
      plugins: {
        legend: {
          labels: { color: '#fff' }
        }
      }
    }
  });

  function fetchDataAndUpdateChart() {
    fetch('php/get_statistics.php')
      .then(response => response.json())
      .then(data => {
        const labels = data.map(item => item.label);
        const values = data.map(item => item.value);

        radarChart.data.labels = labels;
        radarChart.data.datasets[0].data = values;
        radarChart.update();
      })
      .catch(error => console.error('Error fetching data:', error));
  }

  fetchDataAndUpdateChart();
  setInterval(fetchDataAndUpdateChart, 1000);

  // Tambahkan listener resize supaya chart ikut resize
  window.addEventListener('resize', () => {
    radarChart.resize();
  });
});
