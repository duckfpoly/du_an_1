$(document).ready(function () {
  var table = $("#example").DataTable({
    language: {
      paginate: {
        previous: '<span class="prev-icon"><</span>',
        next: '<span class="next-icon">></span>',
      },
      lengthMenu: "Hiển thị _MENU_ mục",
      zeroRecords: "Nothing found - sorry",
      info: "Đang xem _PAGE_ trên _PAGES_ mục",
      infoEmpty: "Không có dữ liệu",
      infoFiltered: "(lọc trong _MAX_ dữ liệu)",
      search: "Tìm kiếm _INPUT_",
    },
    searching: false,
    paging: true,
    info: false,
    responsive: true,
    dom: "Blfrtip",
    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });
});
new VenoBox({
  selector: ".my-image-links",
  numeration: true,
  infinigall: true,
  share: true,
  spinner: "rotating-plane",
});

if (document.getElementById("chart-line")) {
  var ctx1 = document.getElementById("chart-line").getContext("2d");
  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
  gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
  gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
  gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
  new Chart(ctx1, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [
        {
          // Tên để thống kê
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          // giá trị thống kê
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        },
      },
      interaction: {
        intersect: false,
        mode: "index",
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
          },
          ticks: {
            display: true,
            padding: 10,
            color: "#fbfbfb",
            font: {
              size: 11,
              family: "Open Sans",
              style: "normal",
              lineHeight: 2,
            },
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5],
          },
          ticks: {
            display: true,
            color: "#ccc",
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: "normal",
              lineHeight: 2,
            },
          },
        },
      },
    },
  });
}
