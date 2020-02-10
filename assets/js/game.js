function game() {
  $('body').append("<div class='timer'></div>");
  let all = $('body *:not(.timer)').length - 6;

  $(document).on('click', 'body *', function() {
    $(this).remove();
    count = $('body *').length - 6;
    $('.timer').text(count + '/' + all)
    if (count === 0) {
      $('body').html('WOW');
    }
  });

  var c = 0;
  notify('GAME START', 'black', 5000);
  var start_game = setInterval(function() {
    c++;
    if (c >= 10) {
      clearInterval(start_game);
      $('body *').off('click');
      notify('GAME OVER', 'black', 5000);
    }
  }, 1000);
}
