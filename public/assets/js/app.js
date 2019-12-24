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

    // recruiter switcher
    $(".recruiter-switch").click(function () {
      if ( !$(this).hasClass('active') ) {
        $(".recruiter-switch").removeClass('active');
        $(this).addClass('active');
        if ($(this).html() == "Statistiques") {
          $("#offers").hide();
          $("#statistics").show();
        }
        else {
          $("#statistics").hide();
          $("#offers").show();
        }

      }

    })
    ///  |-> Recruiter own statistics

    $('.offersStat select').on("change" ,function () {
      let data = $(this).parent().serialize();
      let year = $(this).val();
      let type = $(this).attr('name');
      let id = $('input[name=id_rec]').val();
      $.ajax ({
        url : '/recruteur/'+id+'/chart',
        method : 'GET',
        data : data,
        success : function (results) {
          alert(results)
          updateCharts(results , type , year);
        }
      })
    })
    /// |-> Dashboard statistics

    $('.year-form select').on('change' , function () {
      let data = $(this).parent().serialize();
      let year =$(this).val();
      let type = $(this).attr('name');
      $.ajax ({
        url : '/dashboard/update',
        method : 'GET',
        data : data,
        success : function (results) {
          updateCharts(results , type , year);
        }
      })
    })

    function updateCharts( data , type , year) {
      if (type == "line") {
        line.data.datasets[0].label = "offers - "+year;
        line.data.datasets[0].data = data;
        line.update();
      }
      else if (type == "pie") {
        console.log(data);
        pie.data.labels = Array.from(Object.keys(data));
        pie.data.datasets[0].data = Array.from(Object.values(data));
        pie.update();
      }
      else {
        groupedBar.data.datasets[0].data = data['cdi'];
        groupedBar.data.datasets[1].data = data['cdd'];
        groupedBar.data.datasets[2].data = data['stage'];
        groupedBar.update();
      }
    }
    ///  |-> End Recruiter own statistics

    function checkSection(element) {
      if (element.hasClass('formation'))
        return "f";
      if (element.hasClass('experience'))
        return "e";
      if (element.hasClass('competence'))
        return "c";
    }
    let counter = {
      f : $('.section-wrapper.formation').children('.row').length,
      e : $('.section-wrapper.experience').children('.row').length,
      c : $('.section-wrapper.competence').find('.row').length
    };
    // edit RESUME
    $('.section-wrapper').on('click' , 'i.minus-btn' ,function () {
      let row = $(this).parent();
      let wrapper = row.parent();
      if (counter[checkSection(wrapper)] == 1 ) {
        row.find('input , textarea').val('');
      }
      else {
        counter[checkSection(wrapper)]--;
        if (counter[checkSection(wrapper)] == 1) {
            $('.section-wrapper .sep').remove();
        }
        if( row.find('.action').length ) {
          row.find('input[value=update]').val('remove');
          row.hide();
        }
        else {
          row.prev().remove();
          row.remove();
        }
      }
    })





    // adding a training
    $(".add-more").click(function (event) {
      event.preventDefault();
      let element = $(this).parent().parent().parent().children('.section-wrapper');
      counter[checkSection(element)]++;
      element.append("<div class='col-12'><hr class='sep'></div> <div class ='row relative'>"
                      + element.children().first().html() + "</div>" );
      element.children('.row').last().find('input , textarea').val('');
      element.children('.row').last().find('.action').val('new');
      element.children('.row').last().find('.action').removeAttr('class');
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

    // Statistics

    $('#select-year').on('change', function(e){
      //e.preventDefault();
      let datas = $('#chart-form').serialize();
      $.ajax({
        method : "GET",
        url : "/dashboard/statistics/offers",
        data : datas,
        dataType:'JSON',
        success : function (r) {
          if( r != ''){

            $('canvas').remove()
            $('.chart-section').append('<canvas id="myChart" style="height:500px"></canvas>')

            var ctx = document.getElementById('myChart');

            var data = r.month;

            const myChart =  new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre','Decembre'],
                    datasets: [{
                        label: 'Offers ' + r.year,
                        data: data,
                        backgroundColor: 'transparent',
                        borderColor: '#FF6384',
                        borderWidth: 3
                    },
                  ]
                },
                options: {
                  responsive: true,
                  maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }]
                    }
                }
            });

          } // End r != ''
        } // End Success
      }); // End AJAX
    }); // End Select on chage [ Statistics offers ]

})(jQuery)
