$(function () {
  // Initialize the dashboard

  const ctx = $("#myChart");

  $.ajax({
    url: "http://localhost/takampus/public/Dashboard/getDataAll",
    dataType: "json",
    method: "GET",
    success: function (data) {
      console.log(data);
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
    },
  });

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});
