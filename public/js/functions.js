$(document).scroll(function() { 
    if($(window).scrollTop() !== 0) {
      $(".topmenu").addClass('scroll');
    } else {
        $(".topmenu").removeClass('scroll');
    }
 });