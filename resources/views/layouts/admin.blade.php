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

        $('.ben').material_select();
        
        $('.modal').modal();

        let id = 0;
        let id_f = 0;
        let lien = '';
        let lien_f = '';
        let token = '';

        $('.supr').on('click', function(){ //au click sur icone supprimer
          $(this).each(function(){

            id = $(this).data('id'); //id de la question
            $('.dlt').attr('data-id', id); //ajout attribut data-id avec la valeur de l'id de la question
            id_f = $('.dlt').attr('data-id');

            lien = $(this).data('href'); //id de la question
            $('.dlt').attr('data-href', lien); //ajout attribut data-id avec la valeur de l'id de la question
            lien_f = $('.dlt').attr('data-href');
          });
        });

        $('.dlt').on('click', function(){ 

          console.log(id_f);
          console.log(lien_f);

          $.ajax({
              url: lien_f,
              method: 'DELETE',
              dataType: 'JSON',
              data: {
                  '_token': $('input[name="_token"]').val(),
                  'id': id_f,
                  /*'_method': $('input[name="_method"]').val()*/
              }
          })

        });
        



       let id_dlt = 0;

        $('input[name="status"]').on('click', function(){

          $(this).toggleClass('filled-in');

          if ($(this).is('.filled-in')) {

              id_dlt = $(this).attr('id'); 
              console.log(id_dlt);
          }


        });

    




       $('.flash').delay(1000).css({
           position: 'fixed',
           top: '45%',
           left: '40%',
           width: '15%',
           height: '50px',
           backgroundColor: '#000',
           display: 'flex',
           textAlign: 'center',
           alignItems: 'center',
           color: '#fff',
           fontWeight: '800',
           borderRadius: '10px'
        }).fadeOut(1000);
      });
      
      
    </script>

    </body>
</html>