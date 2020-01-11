function stringGen(len) {
  var text = "";
  var charset = "abcdefghijklmnopqrstuvwxyz0123456789";
  for (var i = 0; i < len; i++)
    text += charset.charAt(Math.floor(Math.random() * charset.length));
  return text;
}

function notify(msg, mode, duration) {
  var classy = stringGen(9);
  $('.notifications').append(`<div id='${classy}' class='notification is-${mode} slideInRight'>${msg}</div>`)
  $('.notification').click(function() {
    $(this).removeClass('slideInRight');
    $(this).addClass('slideOutRight');
    setTimeout(function() {
      $(this).remove();
    }, 350);
  });
  setTimeout(function() {
    $(`#${classy}`).removeClass('slideInRight');
    $(`#${classy}`).addClass('slideOutRight');
    setTimeout(function() {
      $(`#${classy}`).remove();
    }, 350);
  }, duration);
}

document.fonts.load('1rem "Patua One"').then(() => {
  console.log('fonts ready');
  $('.load-me').removeClass('load-me');
})

$(function() {

  $(".navbar-burger").click(function() {
    $(".navbar-burger").toggleClass("is-active");
    $(".navbar-menu").slideToggle();
  });

  $('body').append("<div class='notifications'></div>");

  $('.button').click(function() {
    notify('Did you press a button?', 'black', 5000);
  });

  $('.clients-logos').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    swipe:false,
    dots: false,
    pauseOnHover: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    }]
  });

});
