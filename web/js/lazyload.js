if(document.readyState||document.body.readyState=='complete'){
  $(document).ready(function() {
    $('img.lazy').lazyload({
      effect:  'fadeIn'
    });

    $('div.wrap').css('display','block');
    $('footer').css('display','block');
    $('.block').css('display','none');
  });
}
