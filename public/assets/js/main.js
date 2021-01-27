// Menú responsive
$(function () {
  $('[data-toggle="offcanvas"]').on("click", function () {
    $(".offcanvas-collapse").toggleClass("open");
    $("body").toggleClasss("offcanvas-expanded");
  });


  $(".hamburger").on("click", function () {
    $(this).toggleClass("is-active");
  });

  $(".nav-link").click(function () {
    $(".offcanvas-collapse").removeClass("open");
    $(".hamburger").toggleClass("is-active");
    $("body").removeClass("offcanvas-expanded");
  });


});
