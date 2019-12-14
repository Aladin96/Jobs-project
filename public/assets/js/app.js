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

    $('form.directApply').on('click' , 'button[name=choiceApply]' , function (event) {
      event.preventDefault();
      $('.apply-wrapper').css({
        opacity : "1",
        pointerEvents : "auto"
      })


      $('.btn-danger').click(function (event) {
        event.preventDefault();
        $('.apply-wrapper').css({
          opacity : "0",
          pointerEvents : "none"
        })
      })
    })
      // submit apply with choices
      $('.apply .btn-primary').click(function (event) {
        event.preventDefault();
        let btn = $('button[name=choiceApply]');
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
              $('#form').load(' #form')
              $('body').append('<div class="added-f">Candidature envoyé avec succés</div>');

              setTimeout(function(){
                $('.added-f').fadeOut(300).remove()
              },3000);
            }
          }
        })

      })

    // submit direct apply
    $('form.directApply').on('click' , 'button[name=directApply]' , function (event) {
      event.preventDefault();
      let btn = $(this);
      $.ajax({
        method : 'POST',
        url : '../candidater',
        data : $('form.directApply').serialize(),
        success : function (data) {
          if(data == "error")
            alert('nice attempt')
          else {
            $('#form').load(' #form');
            $('body').append('<div class="added-f">Candidature envoyé avec succés</div>');

            setTimeout(function(){
              $('.added-f').fadeOut(300).remove()
            },3000);
          }
        }
      })
    })


    // unapply
    $('form.directApply').on('click' , 'button[name=unapply]' , function (event) {
      event.preventDefault();
      $.ajax({
        method : 'get',
        url : '../annuler/'+$('input[name=offer_id]').val(),
        success : function (data) {
          if (data == "error") {
            alert('nice try')
          }
          else {
            $('#form').load(' #form');
            $('body').append('<div class="removed-f">Candidature supprimer avec succés</div>');

            setTimeout(function(){
              $('.removed-f').fadeOut(300).remove()
            },3000);
          }
        }
      })
    })

    /*================= DASHBOARD ================*/

    $('#toggle-menu').click(function () {
    $('nav , #dash-content').toggleClass('toggled');
  })

    $('li[data-toggle="collapse"]').click(function () {
      $(this).children('i').toggleClass('collapsed')
    })

})(jQuery)
