// <!-- font size  -->

var buttonPlus = $(".quantity__plus");
var buttonMinus = $(".quantity__minus");
var inputField = $(".quantity__input");

var incrementPlus = buttonPlus.click(function () {
  var $n = $(this).parent(".qty-container").find(".quantity__input");
  $n.val(Number($n.val()) + 1);
  if ($n.val() > 800) {
    $n.val(800);
  }
});

var incrementMinus = buttonMinus.click(function () {
  var $n = $(this).parent(".qty-container").find(".quantity__input");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount - 1);
  }
});

// Listen for the "input" event on the input field
inputField.on("input", function () {
  // Get the input value and remove any non-numeric characters
  var inputValue = $(this)
    .val()
    .replace(/[^0-9]/g, "");

  // Convert the input value to a number
  var inputNumber = parseInt(inputValue);

  // Check if the input value is not a number or is less than 1
  if (isNaN(inputNumber) || inputNumber < 1) {
    // Set the input value to 1
    inputNumber = 1;
  }
  // Limit the input value to a maximum of 800
  else if (inputNumber > 800) {
    inputNumber = 800;
  }

  // Update the input field value with the sanitized input value
  $(this).val(inputNumber);
});

// <!-- qr generator  -->

const qrcodegen = document.getElementById("qrcodegenerated");
const qrTextInput = document.getElementById("qrtext");

const qrcodegenerate = new QRCode(qrcodegen);

qrTextInput.oninput = (e) => {
  qrcodegenerate.makeCode(e.target.value.trim());
};

qrcodegenerate.makeCode(qrTextInput.value.trim());

// <!-- tabs  -->

$(document).ready(function () {
  $(".tab_reel1").click(function () {
    // Toggle active class for Tab 1
    $(".tab_reel1").toggleClass("active");
    $(".tab_content1").toggleClass("active");
    // Remove active class from other tabs
    $(".tab_reel2, .tab_reel3").removeClass("active");
    $(".tab_content2, .tab_content3").removeClass("active");
  });

  $(".tab_reel2").click(function () {
    // Toggle active class for Tab 2
    $(".tab_reel2").toggleClass("active");
    $(".tab_content2").toggleClass("active");
    // Remove active class from other tabs
    $(".tab_reel1, .tab_reel3").removeClass("active");
    $(".tab_content1, .tab_content3").removeClass("active");
  });

  $(".tab_reel3").click(function () {
    // Toggle active class for Tab 3
    $(".tab_reel3").toggleClass("active");
    $(".tab_content3").toggleClass("active");
    // Remove active class from other tabs
    $(".tab_reel1, .tab_reel2").removeClass("active");
    $(".tab_content1, .tab_content2").removeClass("active");
  });
});

// <!-- hori scroll script  -->

const tags_box_cont = document.querySelector(".tags_box_cont"),
  allTabs = tags_box_cont.querySelectorAll(".tab"),
  arrowIcons = document.querySelectorAll(".scrolldiv_icon i");

let isDragging = false;

const handleIcons = (scrollVal) => {
  let maxScrollableWidth =
    tags_box_cont.scrollWidth - tags_box_cont.clientWidth;
  arrowIcons[0].parentElement.style.display = scrollVal <= 0 ? "none" : "flex";
  arrowIcons[1].parentElement.style.display =
    maxScrollableWidth - scrollVal <= 1 ? "none" : "flex";
};

arrowIcons.forEach((icon) => {
  icon.addEventListener("click", () => {
    let scrollWidth = (tags_box_cont.scrollLeft +=
      icon.id === "left" ? -140 : 140);
    handleIcons(scrollWidth);
  });
});

const dragging = (e) => {
  if (!isDragging) return;
  tags_box_cont.classList.add("dragging");
  tags_box_cont.scrollLeft -= e.movementX;
  handleIcons(tags_box_cont.scrollLeft);
};

const dragStop = () => {
  isDragging = false;
  tags_box_cont.classList.remove("dragging");
};

tags_box_cont.addEventListener("mousedown", () => (isDragging = true));
tags_box_cont.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);

// <!-- filter open  -->

$(document).ready(function () {
  $("#filtersearch").click(function () {
    $(".select-wrapper1").toggleClass("activedrp");
  });
  $(document).click(function (event) {
    if (!$(event.target).closest(".select-wrapper1, #filtersearch").length) {
      $(".select-wrapper1").removeClass("activedrp");
    }
  });
});

// <!-- focued dropdown  -->

$(document).ready(function () {
  // Add the "activedrp" class when the search input is focused

  $("#searchinput").focus(function () {
    $(".select-wrapper2").addClass("activedrp");
  });

  // Remove the "activedrp" class when the search input loses focus
  $("#searchinput").blur(function () {
    $(".select-wrapper2").removeClass("activedrp");
  });
});

// <!-- clear search  -->

$(document).ready(function () {
  // Hide clear search button initially
  $(".clear-search").hide();

  // Show or hide clear search button based on input value
  $(".search-input").on("input", function () {
    if ($(this).val().length > 0) {
      $(this).siblings(".clear-search").show();
    } else {
      $(this).siblings(".clear-search").hide();
    }
  });

  // Clear search input when clear search button is clicked
  $(".clear-search").on("click", function () {
    $(this).siblings(".search-input").val("");
    $(this).hide();
  });
});

// <!-- tippy template  -->

tippy.createSingleton(tippy("[data-tippy-content]"), {
  delay: [500, 0],
  placement: "bottom",
  arrow:
    ' <svg class="tippy_arrow" width="16" height="6"><path class= "svg-arrow"d="M0 6s1.796-.013 4.67-3.615C5.851.9 6.93.006 8 0c1.07-.006 2.148.887 3.343 2.385C14.233 6.005 16 6 16 6H0z"/><path class="svg-content"          d="m0 7s2 0 5-4c1-1 2-2 3-2 1 0 2 1 3 2 3 4 5 4 5 4h-16z"/></svg> ',
  allowHTML: true,
  moveTransition: "transform 0.2s cubic-bezier(0.22, 1, 0.36, 1)",
});

//  tabs script
$(document).ready(function () {
  // listen for clicks on elements with ID
  $("[istab]").click(function () {
    // get ID of clicked element
    var istab = $(this).attr("istab");
    // remove active class from all elements that have it
    $(".activesideitem").removeClass("activesideitem");
    // add active class to clicked element
    $(this).addClass("activesideitem");
    // remove activesubsidebartabs class from all fortab elements
    $("[fortab]").removeClass("activesubsidebartabs");
    // add activesubsidebartabs class to matching fortab element
    $('[fortab="' + istab + '"]').addClass("activesubsidebartabs");
  });
});
