$(function () {
  // Initialize the dashboard

  const ctx = $("#myChart");

  $.ajax({
    url: "http://localhost/takampus/public/Dashboard/getDataAll",
    dataType: "json",
    method: "GET",
    success: function (data) {
      chartData(data.data);
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
    },
  });

  function chartData(data) {
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: data?.map((item) => item.label),
        datasets: [
          {
            label: "DataSet",
            data: data?.map((item) => item.data.length),
            borderWidth: 1,
            borderColor: "rgba(75, 192, 192, 1)",
            backgroundColor: "rgba(75, 192, 192, 0.2)",
          },
        ],
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  }
});
