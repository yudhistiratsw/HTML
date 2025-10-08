fetch('php/get_statistics.php')
  .then(response => response.json())
  .then(data => {
    console.log("Data from server:", data);  // lihat output di console

    if (!Array.isArray(data)) {
      throw new Error("Data bukan array!");
    }

    const labels = data.map(item => item.label);
    const values = data.map(item => item.value);

    const ctx = document.getElementById("radarChart").getContext("2d");
    new Chart(ctx, {
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
  })
  .catch(error => console.error('Fetch error:', error));



  