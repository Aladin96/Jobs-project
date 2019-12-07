/* Theme Name: Jobya - Responsive Landing Page Template
   Author: Themesdesign
   Version: 1.0.0
   File Description: Main JS file of the template
*/


(function ($) {

    'use strict';

    // Loader
    $(window).on('load', function() {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({
            'overflow': 'visible'
        });
    });

    // Selectize
    $('#select-category, #select-lang,#select-country').selectize({
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        },
        dropdownParent: 'body'
    });

    // Checkbox all select
    $("#customCheckAll").click(function() {
        $(".all-select").prop('checked', $(this).prop('checked'));
    });

    // Nice Select
    $('.nice-select').niceSelect();

    // Back to top
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
    $('.back-to-top').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 3000);
        return false;
    });


    // adding a training
    $(".add-more").click(function (event) {
      event.preventDefault();
      let element = $(this).parent().parent().parent().children('.section-wrapper');
      element.children('input , textarea').value = "";
      element.append("<div class='col-12'><hr class='sep'></div> <div class ='row'>"
                      + element.children().first().html() + "</div>" );
      element.children('.row').last().children().children().children('input , textarea').val('');
      element.children('.row').last().children().children().children().children().children('input').val('');
    })

    $("i.fa-trash-alt").click(function () {
      $('section.delete').css({
        opacity : "1",
        pointerEvents : "auto"
      })
      $('section.delete span , .btn-primary').click(function () {
        $('section.delete').css({
          opacity : "0",
          pointerEvents : "none"
        })
      })
    })

    /*$('.candidates-list-fav-btn form , .candidates-profile-details form').submit(function (event) {
      event.preventDefault();
      let form = $(this);
      let heart = form.children('button').children().children()
      heart.toggleClass('active');
      $.ajax({
        url : 'favoris',
        method : 'POST',
        data :   form.serialize(),
        success : function () {
          $('#reload').load(' #reload');
        }
      })
    })*/

})(jQuery)
