$(document).ready(function() {
    $('.nav_toggle').click(function() {
      $('.nav_menu').toggleClass('active');
    });
    $('#drop1').click(function() {
      $('.dropdown').toggleClass('active');
    });
    $('.avatar').click(function() {
      $('.bubble').toggleClass('active');
    });
    $(document).click(function(event) {
      if (!$(event.target).closest('.dropdown, #drop1, .bubble, .avatar').length) {
        $('.dropdown, .bubble').removeClass('active');
      }
    });
  });