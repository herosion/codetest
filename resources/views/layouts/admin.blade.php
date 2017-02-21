<html>
    <head>
        <title>App Name - @yield('title')</title>
    
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col s12">
          @include('partials.header')
          </div>

          <div class="col s6">
          @include('partials.flash')
          </div>

        </div>
        <div class="row">
          <div class="col m3 s12">
            @include('partials.sidenav')
          </div>
          <div class="col m9 s12">
            @yield('content')
          </div>
        </div>
    </div>
  
     <script
         src="https://code.jquery.com/jquery-3.1.1.min.js"
         integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
         crossorigin="anonymous">
     </script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <script type="text/javascript">

      'use strict';

    $( document ).ready(function(){

        let id = 0;
        let id_f = 0;
        let lien = '';
        let lien_f = '';
        let l = '';
        let token = '';
        let name = '';
        let status = '';

        $('.ben').material_select();
        $('.button-collapse').sideNav();
        $('.modal').modal();

        $('.supr').on('click', function(){ //au click sur icone supprimer
          name = $(this).attr('data-title');

          $('.title-dlt').append('<h5>Voulez-vous supprimer la question '+ name +'?</h5>');

          $('.title-dlt h5').prev().remove();

          $(this).each(function(){

            id = $(this).data('id'); //id de la question
            $('.dlt').attr('data-id', id); //ajout attribut data-id avec la valeur de l'id de la question
            id_f = $('.dlt').attr('data-id');

            lien = $(this).data('href');
            //lien = encodeURIComponent(l);
            $('.dlt').attr('data-href', lien); 
            lien_f = $('.dlt').attr('data-href');
          });
        });

        $('.dlt').on('click', function(){ 

          $.ajax({
              url: lien_f,
              method: 'DELETE',
              dataType: 'JSON',
              data: {
                  '_token': $('input[name="_token"]').val(),
                  'id': id_f,
                  '_method': 'DELETE'
              },
              success: function(data) {
                 $('#question-' + data).fadeOut(500, function(){
                    
                    $('.flash').text('Question bien supprimée').fadeIn(1000, function(){
                      $(this).fadeOut(1000);
                      });
                });

              },
              error: function(){
                  alert('La requête n\'a pas abouti'); 
              }
          });

        });
        
        $('.flash').delay(1000).css({
           position: 'fixed',
           top: '46%',
           left: '42%',
           width: '15%',
           height: '50px',
           backgroundColor: '#ffa726',
           display: 'flex',
           textAlign: 'center',
           alignItems: 'center',
           color: '#fff',
           fontWeight: '800',
           borderRadius: '10px',
           zindex: '50'
        }).fadeOut(1000);


        /*$('.filled-in').on('click', function(){ //au click sur icone supprimer
          status = $(this).attr('value');

          console.log(status);

         $(this).each(function(){

            var id = $(this).data('id'); //id de la question
            $('.dlt').attr('data-id', id); //ajout attribut data-id avec la valeur de l'id de la question
            id_f = $('.dlt').attr('data-id');

            l = $(this).data('href');
            lien = encodeURIComponent(l);
            $('.dlt').attr('data-href', lien); 
            lien_f = $('.dlt').attr('data-href');
          });
        });*/
  
    });
      
      
    </script>

    </body>
</html>