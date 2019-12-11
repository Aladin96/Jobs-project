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

    $('.candidates-listing-item').on('submit','form',function (event) {
      event.preventDefault();
      let form = $(this);
      let heart = form.children('button').children().children()
      heart.toggleClass('active');
      $.ajax({
        url : 'favoris',
        method : 'POST',
        data :   form.serialize(),
        success : function (data) {
          if (data == "failed") {
            heart.toggleClass('active');

            $('.unlimited-alert').css({
              opacity : '1',
              pointerEvents : 'auto'
            })
            $('.unlimited-box').css({
              animation: "alert .5s ease-in forwards"
            })
          }
          else {
            if(heart.hasClass('active')){

              $('body').append('<div class="added-f">Added to favoris</div>');

              setTimeout(function(){
                $('.added-f').fadeOut(300).remove()
              },3000);


            }else{

              $('body').append('<div class="removed-f">Removed From favoris</div>');

              setTimeout(function(){
                $('.removed-f').fadeOut(300).remove()
              },3000);

            }

            $('#reload').load(' #reload');
          }
          $('.close-alert').click(function () {
            $('.unlimited-alert').css({
              opacity : '0',
              pointerEvents : 'none'
            })
            $('.unlimited-box').css({
              animation: "none"
            })
          })
        }
      })
    })

    $('a[href=apply].choices').click(function (event) {
      event.preventDefault();
      $('.apply-wrapper').css({
        opacity : "1",
        pointerEvents : "auto"
      })

      // submit apply ith choices
      $('.btn-danger').click(function (event) {
        event.preventDefault();
        $('.apply-wrapper').css({
          opacity : "0",
          pointerEvents : "none"
        })
      })

      $('.apply .btn-primary').click(function (event) {
        event.preventDefault();
        $.ajax({
          method : "POST",
          url : "../candidater",
          data : $('.apply').serialize(),
          success : function (data) {
            if (data == 'error') {
              alert('minable hacker')
            }
            else {
              $('.apply-wrapper').css({
                opacity : "0",
                pointerEvents : "none"
              })
              switch_btn();
            }
          }
        })

      })
    })

    // submit direct apply
    $('a[href=apply].direct').click(function (event) {
      event.preventDefault();
      swwitch_btn();
    })

    function switch_btn () {
      $('a[href=apply]').removeClass('btn-primary');
      $('a[href=apply]').addClass('btn-danger');
      $('a[href=apply]').html('Annuler candidature');
      $('body').append('<div class="added-f">Success</div>');

      setTimeout(function(){
        $('.added-f').fadeOut(300).remove()
      },3000);
    }


})(jQuery)
