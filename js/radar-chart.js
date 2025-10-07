
ctx = document.getElementById('radarChart').getContext('2d');

new Chart(ctx, {
  type: 'radar',
  data: {
      labels: ['CAD', 'CAM', 'Electrical', 'Programming', 'Design'],
      datasets: [{
          label: 'Skill Level',
          data: [90, 90, 85, 70, 75],
          fill: true,
          backgroundColor: 'rgba(255, 0, 79, 0.2)',
          borderColor: '#ff004f',
          pointBackgroundColor: '#ff004f',
          borderWidth: 2
      }]
  },
  options: {
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