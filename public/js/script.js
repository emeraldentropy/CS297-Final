"use strict";
window.onload = function(){
   
	$(document).ready(function() {
    // height of each .post-frame
    var containerHeight = $('.post-frame').height() - 100;
    // if the content is larger then the post-frame zoom out
    // and add a see more button 
    $('.post-frame').each(function(){
      if($('.body', this).height() > containerHeight){
          $('.body', this).css({'zoom': '0.5'});
          var fixedBottom = $('.buttons', this)
          $('<button class="btn">See More</button>').appendTo(fixedBottom); 
    }
    });
    //function that displays the larger version of the post
      var popUp = function(){
        //grays out background 
     $('.gray').css({'display': 'block', 'height': $(document).height()});
     var top = $(document).scrollTop() + 90;
     //displays the larger full post and positions it at the current spot on the page
     $('.show-big').css({'display': 'block', 'top' : top });
     
     var clone = $(this).clone();
     $(clone).removeClass('col-sm-6 col-md-4 col-lg-3 post-frame');
     $('.body', clone).css({'zoom': 1.0});
     $(clone).addClass('make-big').appendTo('.show-post');
     //removes the larger version of the post and returns the
     //page to it's previous state
     $('.cancel').click(close);
     $(document).keydown(function(e){
        if (e.keyCode == 27) {
          close();
          console.log('its not happening');
        }
      });
    }
    var close = function(){
      $('.show-big').css({'display': 'none'});
       $('.show-post').empty();
       $('.gray').css({'display': 'none'});
    }
    $('.post-frame').click(popUp);
    });
}
