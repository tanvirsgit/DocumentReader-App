$(document).ready(function() {
  $("#sidebarCollapse, #sidebarCollapse2").on("click", function() {
    $("#sidebar").toggleClass("active");
    $(this).toggleClass("active");
  });
});