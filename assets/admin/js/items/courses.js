function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#image_course_preview").attr("src", e.target.result);
      $("#preview_img").attr("href", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
