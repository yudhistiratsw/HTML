
let ratingChart;

function createChart(labels, values) {
  const ctx = document.getElementById("radarChart").getContext("2d");
  ratingChart = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: labels,
      datasets: [{
        label: "Skill Levels",
        data: values,
        backgroundColor: "rgba(255,99,132,0.2)",
        borderColor: "rgba(255,99,132,1)",
        pointBackgroundColor: "rgba(255,99,132,1)"
      }]
    },
    options: {
      responsive: true,
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
}

async function fetchDataAndUpdateChart() {
  try {
    const response = await fetch('php/get_statistics.php');
    if (!response.ok) throw new Error('Network response was not ok');

    const data = await response.json();

    if (!Array.isArray(data)) throw new Error('Data bukan array!');

    const labels = data.map(item => item.label);
    const values = data.map(item => item.value);

    if (!ratingChart) {
      createChart(labels, values);
    } else {
      ratingChart.data.labels = labels;
      ratingChart.data.datasets[0].data = values;
      ratingChart.update();
    }
  } catch (error) {
    console.error('Fetch error:', error);
  }
}

// Mulai update chart
fetchDataAndUpdateChart();
setInterval(fetchDataAndUpdateChart, 500);
