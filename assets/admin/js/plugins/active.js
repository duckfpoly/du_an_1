const module = new URLSearchParams(window.location.search).get("module");
if (module) {
  if (module == "categories") {
    $("#categories").addClass("active fw-bold");
  } 
  else if (module == "courses") {
    $("#courses").addClass("active fw-bold");
  } 
  else if (module == "teachers") {
    $("#teachers").addClass("active fw-bold");
  } 
  else if (module == "students") {
    $("#students").addClass("active fw-bold");
  } 
  else if (module == "bills") {
    $("#bills").addClass("active fw-bold");
  } 
  else if (module == "staffs") {
    $("#staffs").addClass("active fw-bold");
  } 
} 
else {
  $("#dashboard").addClass("active fw-bold");
}
