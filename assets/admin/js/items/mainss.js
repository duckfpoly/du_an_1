$(document).ready(function () {
  var table = $("#example").DataTable({
    "lengthMenu": [ 5, 15, 25, 40, 55, 100 ],
    language: {
      paginate: {
        previous: '<span class="prev-icon"><</span>',
        next: '<span class="next-icon">></span>',
      },
      lengthMenu: "Hiển thị _MENU_ mục",
      zeroRecords: "Nothing found - sorry",
      info: "Đang xem _PAGE_ trên _PAGES_ trang",
      infoEmpty: "Không có dữ liệu",
      infoFiltered: "(lọc trong _MAX_ dữ liệu)",
      search: "Tìm kiếm _INPUT_",
    },
    searching: false,
    paging: true,
    info: true,
    responsive: true,
    dom: "Blfrtip",
    buttons: [""],
  });
});
new VenoBox({
  selector: ".my-image-links",
  numeration: true,
  infinigall: true,
  share: true,
  spinner: "rotating-plane",
});
