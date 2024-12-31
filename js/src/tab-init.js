import $ from "jquery";

$(".tab-link").click(function () {
  var tabId = $(this).attr("data-tab");

  $(".tab-link").removeClass("active");
  $(".tab-content").removeClass("active");

  $(this).addClass("active");
  $("#" + tabId).addClass("active");
});

$(".accordion-link").click(function (e) {
  e.preventDefault();

  var tabId = $(this).attr("data-tab");
  var accordionContent = $("#" + tabId);

  if (accordionContent.is(":visible")) {
    accordionContent.slideUp();
    $(this).removeClass("active");
  } else {
    $(".accordion-content").slideUp();
    $(".accordion-link").removeClass("active");

    accordionContent.slideDown();
    $(this).addClass("active");
  }
});
