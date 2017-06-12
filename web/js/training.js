$(document).ready(function() {
  $('#btn-earth').click(function () {
    $('#earth-link').addClass('active-type');
    $('#ice-link').removeClass('active-type');
    $('.ice').addClass('earth-ice-none');
    $('.earth').removeClass('earth-ice-none');
  });

  $('#btn-ice').click(function () {
    $('#earth-link').removeClass('active-type');
    $('#ice-link').addClass('active-type');
    $('.ice').removeClass('earth-ice-none');
    $('.earth').addClass('earth-ice-none');
  });
})
